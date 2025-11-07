<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Siswa;
use App\Models\Answer;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function startQuestionnaire(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:100',
            'nis' => 'required|string|max:20|unique:siswa,nis',
        ]);

        // Create Siswa record
        Siswa::create([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'kelas' => 'X',
        ]);

        // Store in session
        session(['nis' => $request->nis]);

        return redirect()->route('user.questionnaire');
    }

    public function questionnaire(Request $request)
    {
        // Check if session exists
        if (!session()->has('nis')) {
            return redirect('/')->with('error', 'Silakan mulai kuisioner terlebih dahulu.');
        }

        $questions = Question::all()->keyBy('id_soal');
        $currentIndex = $request->query('index', 0);
        $totalQuestions = 45; // Fixed to 45 questions

        if ($currentIndex >= $totalQuestions) {
            return redirect()->route('user.submit.page');
        }

        // Get question by index (0-based) from the collection
        $questionKeys = $questions->keys()->toArray();
        $currentQuestionKey = $questionKeys[$currentIndex] ?? null;
        $currentQuestion = $currentQuestionKey ? $questions->get($currentQuestionKey) : null;

        $progress = (($currentIndex + 1) / $totalQuestions) * 100;

        // Get siswa data
        $siswa = Siswa::where('nis', session('nis'))->first();

        // Get all answers for this nis
        $answers = Answer::where('nis', session('nis'))->get()->keyBy('id_soal');

        // Count answered questions
        $answeredCount = $answers->count();

        // Get selected answer for current question
        $selectedAnswer = $currentQuestionKey ? $answers->get($currentQuestionKey) : null;

        return view('user.questionnaire', compact('currentQuestion', 'currentIndex', 'totalQuestions', 'progress', 'siswa', 'answeredCount', 'answers', 'selectedAnswer', 'questions'));
    }

    public function submitPage()
    {
        if (!session()->has('nis')) {
            return redirect('/')->with('error', 'Silakan mulai kuisioner terlebih dahulu.');
        }

        return view('user.submit');
    }

    public function submit(Request $request)
    {
        $nis = session('nis');
        if (!$nis) {
            return redirect('/')->with('error', 'Session expired. Silakan mulai kuisioner kembali.');
        }

        // Check if user has answered at least some questions
        $answers = Answer::where('nis', $nis)->get();
        if ($answers->isEmpty()) {
            return redirect()->back()->with('error', 'Anda belum menjawab pertanyaan apapun. Silakan isi kuisioner terlebih dahulu.');
        }

        // Clear session except nis for category result
        session()->forget(['answer_code']);

        // Redirect to category result page
        return redirect()->route('user.category.result', ['nis' => $nis]);
    }

    public function hasil(Request $request)
    {
        $nis = $request->query('nis');
        if (!$nis) {
            return redirect('/')->with('error', 'NIS tidak ditemukan.');
        }

        $siswa = Siswa::where('nis', $nis)->first();
        if (!$siswa) {
            return redirect('/')->with('error', 'Data siswa tidak ditemukan.');
        }

        $answers = Answer::where('nis', $nis)->with('question')->get();

        // Calculate results - for now, just count answers
        $totalQuestions = 45; // Fixed total
        $answeredQuestions = $answers->count();
        $completionPercentage = ($answeredQuestions / $totalQuestions) * 100;

        // Simple categorization based on answer patterns (placeholder logic)
        $category = 'Belum dapat ditentukan';
        $description = 'Hasil asesmen sedang diproses.';

        // Update answers with nama_siswa if not set
        foreach ($answers as $answer) {
            if (empty($answer->nama_siswa)) {
                $answer->update(['nama_siswa' => $siswa->nama_siswa]);
            }
        }

        return view('user.hasil', compact('siswa', 'answers', 'totalQuestions', 'answeredQuestions', 'completionPercentage', 'category', 'description'));
    }

    public function categoryResult(Request $request)
    {
        $nis = $request->query('nis');
        if (!$nis) {
            return redirect('/')->with('error', 'NIS tidak ditemukan.');
        }

        $siswa = Siswa::where('nis', $nis)->first();
        if (!$siswa) {
            return redirect('/')->with('error', 'Data siswa tidak ditemukan.');
        }

        $answers = Answer::where('nis', $nis)->with('question')->get();

        // Calculate category based on answers (similar to HasilController logic)
        $totalAnswers = $answers->count();
        $category = 'Belum dapat ditentukan';
        $description = 'Hasil asesmen sedang diproses.';

        if ($totalAnswers > 0) {
            $optionCounts = $answers->groupBy('id_option_chosen')->map->count();
            $mostFrequentCount = $optionCounts->max();
            $mostFrequentOption = $optionCounts->filter(fn ($count) => $count === $mostFrequentCount)->keys();

            $sortedOptions = $mostFrequentOption->toArray();

            // Determine category based on combinations
            if (count($sortedOptions) == 1) {
                // Dominant single answer
                $dominantOption = $sortedOptions[0];
                $category = $dominantOption == 1 ? 'A' : ($dominantOption == 2 ? 'B' : 'C');
            } elseif (count($sortedOptions) == 2) {
                // Two options with same frequency
                sort($sortedOptions); // Sort to ensure consistent order
                if ($sortedOptions == [1, 2]) {
                    $category = 'A dan B';
                } elseif ($sortedOptions == [1, 3]) {
                    $category = 'A dan C';
                } elseif ($sortedOptions == [2, 3]) {
                    $category = 'B dan C';
                }
            }

            // Get recommendation from categories table
            $categoryModel = \App\Models\Category::where('name', $category)->first();
            if ($categoryModel) {
                $description = $categoryModel->description;
            } else {
                // Fallback if category not found
                $description = 'Kategori ditemukan tetapi deskripsi belum tersedia.';
            }
        }

        // Update answers with nama_siswa if not set
        foreach ($answers as $answer) {
            if (empty($answer->nama_siswa)) {
                $answer->update(['nama_siswa' => $siswa->nama_siswa]);
            }
        }

        return view('user.category-result', compact('siswa', 'category', 'description'));
    }
}

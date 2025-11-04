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
        if (!session()->has('answer_code') || !session()->has('nis')) {
            return redirect('/')->with('error', 'Silakan mulai kuisioner terlebih dahulu.');
        }

        return view('user.submit');
    }

    public function submit(Request $request)
    {
        $nis = session('nis');

        // Clear session
        session()->forget(['answer_code', 'nis']);

        // Redirect to hasil page with NIS
        return redirect()->route('user.hasil', ['nis' => $nis])->with('success', 'Kuisioner telah selesai. Berikut adalah hasil asesmen Anda.');
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

        return view('user.hasil', compact('siswa', 'answers', 'totalQuestions', 'answeredQuestions', 'completionPercentage', 'category', 'description'));
    }
}

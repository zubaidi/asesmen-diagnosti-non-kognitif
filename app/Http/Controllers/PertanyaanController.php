<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class PertanyaanController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('admin.pertanyaan.index', compact('questions'));
    }

    public function create()
    {
        // Generate next id_soal
        $maxIdSoal = Question::where('id_soal', 'like', 'ADNK%')->max('id_soal');
        $nextNumber = 1;
        if ($maxIdSoal) {
            $number = (int) substr($maxIdSoal, 4);
            $nextNumber = $number + 1;
        }
        $nextIdSoal = 'ADNK' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

        return view('admin.pertanyaan.tambah-pertanyaan', compact('nextIdSoal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question_text' => 'required|string',
            'id_option_a' => 'nullable|string',
            'option_a' => 'nullable|string',
            'id_option_b' => 'nullable|string',
            'option_b' => 'nullable|string',
            'id_option_c' => 'nullable|string',
            'option_c' => 'nullable|string',
            'category' => 'nullable|string',
        ]);

        // Generate auto id_soal
        $maxIdSoal = Question::where('id_soal', 'like', 'ADNK%')->max('id_soal');
        $nextNumber = 1;
        if ($maxIdSoal) {
            $number = (int) substr($maxIdSoal, 4);
            $nextNumber = $number + 1;
        }
        $idSoal = 'ADNK' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

        $data = $request->all();
        $data['id_soal'] = $idSoal;
        $data['id_option_a'] = '1';
        $data['id_option_b'] = '2';
        $data['id_option_c'] = '3';

        Question::create($data);

        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan berhasil ditambahkan.');
    }

    public function show(Question $pertanyaan)
    {
        return view('admin.pertanyaan.index', compact('pertanyaan'));
    }

    public function edit(Question $pertanyaan)
    {
        return view('admin.pertanyaan.edit-pertanyaan', compact('pertanyaan'));
    }

    public function update(Request $request, Question $pertanyaan)
    {
        $request->validate([
            'question_text' => 'required|string',
            'option_a' => 'nullable|string',
            'option_b' => 'nullable|string',
            'option_c' => 'nullable|string',
            'category' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['id_option_a'] = '1';
        $data['id_option_b'] = '2';
        $data['id_option_c'] = '3';

        $pertanyaan->update($data);

        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan berhasil diperbarui.');
    }

    public function destroy(Question $pertanyaan)
    {
        $pertanyaan->delete();

        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan berhasil dihapus.');
    }
}

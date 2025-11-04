<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;

class HasilController extends Controller
{
    public function index()
    {
        $answers = Answer::with('question')->get();
        return view('admin.hasil.index', compact('answers'));
    }

    public function create()
    {
        return view('admin.hasil.tambah-hasil');
    }

    public function store(Request $request)
    {
        $request->validate([
            'answer_code' => 'required|string|max:255|unique:answers,answer_code',
            'nis' => 'required|string|max:255',
            'nama_siswa' => 'required|string|max:255',
            'id_soal' => 'required|string|max:255',
            'id_option_chosen' => 'required|integer',
        ]);

        Answer::create($request->all());

        return redirect()->route('hasil.index')->with('success', 'Hasil berhasil ditambahkan.');
    }

    public function show(Answer $hasil)
    {
        return view('admin.hasil.index', compact('hasil'));
    }

    public function edit(Answer $hasil)
    {
        return view('admin.hasil.edit-hasil', compact('hasil'));
    }

    public function update(Request $request, Answer $hasil)
    {
        $request->validate([
            'answer_code' => 'required|string|max:255|unique:answers,answer_code,' . $hasil->id,
            'nis' => 'required|string|max:255',
            'nama_siswa' => 'required|string|max:255',
            'id_soal' => 'required|string|max:255',
            'id_option_chosen' => 'required|integer',
        ]);

        $hasil->update($request->all());

        return redirect()->route('hasil.index')->with('success', 'Hasil berhasil diperbarui.');
    }

    public function destroy(Answer $hasil)
    {
        $hasil->delete();

        return redirect()->route('hasil.index')->with('success', 'Hasil berhasil dihapus.');
    }
}

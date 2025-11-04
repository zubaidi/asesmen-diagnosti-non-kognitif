<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;

class HasilController extends Controller
{
    public function index()
    {
        $answers = Answer::all();
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
            'id_option_selected_1' => 'nullable|string',
            'id_option_selected_2' => 'nullable|string',
            'id_option_selected_3' => 'nullable|string',
            'id_option_selected_4' => 'nullable|string',
            'id_option_selected_5' => 'nullable|string',
            'id_option_selected_6' => 'nullable|string',
            'id_option_selected_7' => 'nullable|string',
            'id_option_selected_8' => 'nullable|string',
            'id_option_selected_9' => 'nullable|string',
            'id_option_selected_10' => 'nullable|string',
            'id_option_selected_11' => 'nullable|string',
            'id_option_selected_12' => 'nullable|string',
            'id_option_selected_13' => 'nullable|string',
            'id_option_selected_14' => 'nullable|string',
            'id_option_selected_15' => 'nullable|string',
            'id_option_selected_16' => 'nullable|string',
            'output_category' => 'nullable|string',
            'output_description' => 'nullable|string',
            'category_id' => 'nullable|integer',
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
            'id_option_selected_1' => 'nullable|string',
            'id_option_selected_2' => 'nullable|string',
            'id_option_selected_3' => 'nullable|string',
            'id_option_selected_4' => 'nullable|string',
            'id_option_selected_5' => 'nullable|string',
            'id_option_selected_6' => 'nullable|string',
            'id_option_selected_7' => 'nullable|string',
            'id_option_selected_8' => 'nullable|string',
            'id_option_selected_9' => 'nullable|string',
            'id_option_selected_10' => 'nullable|string',
            'id_option_selected_11' => 'nullable|string',
            'id_option_selected_12' => 'nullable|string',
            'id_option_selected_13' => 'nullable|string',
            'id_option_selected_14' => 'nullable|string',
            'id_option_selected_15' => 'nullable|string',
            'id_option_selected_16' => 'nullable|string',
            'output_category' => 'nullable|string',
            'output_description' => 'nullable|string',
            'category_id' => 'nullable|integer',
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

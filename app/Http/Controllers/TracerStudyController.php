<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TracerStudy;
use App\Exports\TracerStudyExport;
use Maatwebsite\Excel\Facades\Excel;

class TracerStudyController extends Controller
{
    public function index()
    {
        $tracerStudies = TracerStudy::with('siswa')->get();
        return view('admin.tracer-study.index', compact('tracerStudies'));
    }

    public function create()
    {
        return view('admin.tracer-study.tambah-tracer-study');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|string|max:20',
            'nama_siswa' => 'nullable|string|max:100',
            'option' => 'required|in:BEKERJA,KULIAH,WIRAUSAHA',
            'answer' => 'required|string',
        ]);

        TracerStudy::create($request->all());

        return redirect()->route('tracer-study.index')->with('success', 'Tracer Study berhasil ditambahkan.');
    }

    public function show(TracerStudy $tracerStudy)
    {
        return view('admin.tracer-study.index', compact('tracerStudy'));
    }

    public function edit(TracerStudy $tracerStudy)
    {
        return view('admin.tracer-study.edit-tracer-study', compact('tracerStudy'));
    }

    public function update(Request $request, TracerStudy $tracerStudy)
    {
        $request->validate([
            'nis' => 'required|string|max:20',
            'nama_siswa' => 'nullable|string|max:100',
            'option' => 'required|in:BEKERJA,KULIAH,WIRAUSAHA',
            'answer' => 'required|string',
        ]);

        $tracerStudy->update($request->all());

        return redirect()->route('tracer-study.index')->with('success', 'Tracer Study berhasil diperbarui.');
    }

    public function destroy(TracerStudy $tracerStudy)
    {
        $tracerStudy->delete();

        return redirect()->route('tracer-study.index')->with('success', 'Tracer Study berhasil dihapus.');
    }

    public function export()
    {
        $tracerStudies = TracerStudy::with('siswa')->get();
        $filename = 'tracer_study_' . date('Y-m-d_H-i-s');

        return Excel::download(new TracerStudyExport($tracerStudies), $filename . '.xlsx');
    }
}

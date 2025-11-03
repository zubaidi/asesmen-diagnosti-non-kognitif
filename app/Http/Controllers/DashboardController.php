<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Answer;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = Siswa::count();
        $sudahMengerjakan = Answer::distinct('nis')->count('nis');
        $belumMengerjakan = $totalSiswa - $sudahMengerjakan;

        // Fetch category data
        $categories = Answer::select('output_category')
            ->selectRaw('COUNT(DISTINCT nis) as count')
            ->groupBy('output_category')
            ->get()
            ->map(function ($item) use ($sudahMengerjakan) {
                $percentage = $sudahMengerjakan > 0 ? round(($item->count / $sudahMengerjakan) * 100, 2) : 0;
                return [
                    'category' => $item->output_category,
                    'count' => $item->count,
                    'percentage' => $percentage
                ];
            });

        return view('admin.dashboard', compact('totalSiswa', 'sudahMengerjakan', 'belumMengerjakan', 'categories'));
    }
}

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

        // Fetch all categories from categories table
        $allCategories = \App\Models\Category::all();

        // Fetch category data from answers
        $answerCategories = Answer::select('output_category')
            ->selectRaw('COUNT(DISTINCT nis) as count')
            ->groupBy('output_category')
            ->pluck('count', 'output_category');

        // Build categories array with all categories, defaulting to 0 if no answers
        $categories = $allCategories->map(function ($category) use ($answerCategories, $sudahMengerjakan) {
            $count = $answerCategories->get($category->name, 0);
            $percentage = $sudahMengerjakan > 0 ? round(($count / $sudahMengerjakan) * 100, 2) : 0;
            return [
                'category' => $category->name,
                'count' => $count,
                'percentage' => $percentage
            ];
        });

        return view('admin.dashboard', compact('totalSiswa', 'sudahMengerjakan', 'belumMengerjakan', 'categories'));
    }
}

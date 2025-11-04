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

        // Fetch category distribution from answers table - temporarily disabled due to missing column
        $categoryCounts = collect(); // Empty collection for now

        // Build categories array with all categories from categories table
        $categories = $allCategories->map(function ($category) use ($categoryCounts, $sudahMengerjakan) {
            $count = $categoryCounts->get($category->name, 0);
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

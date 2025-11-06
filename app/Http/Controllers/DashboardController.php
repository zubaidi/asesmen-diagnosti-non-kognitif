<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Answer;

class DashboardController extends Controller
{

    // Menampilkan statsitik di dashboard admin
    // Jumlah siswa terdaftar, yang sudah mengerjakan, yang belum mengerjakan
    // Distribusi kategori jawaban dan prosentasenya

    public function index()
    {
        $totalSiswa = Siswa::count();
        $sudahMengerjakan = Answer::distinct('nis')->count('nis');
        $belumMengerjakan = $totalSiswa - $sudahMengerjakan;

        // Menampilkan kategori jawaban beserta prosentasenya
        $allCategories = \App\Models\Category::all();

        // Hitung kategori berdasarkan jawaban siswa
        $groupedAnswers = Answer::selectRaw('nis, COUNT(*) as total_answers')
            ->groupBy('nis')
            ->get()
            ->map(function ($group) {
                $nis = $group->nis;
                $answers = Answer::where('nis', $nis)->get();

                // Menghitung jawaban terbanyak
                $optionCounts = $answers->groupBy('id_option_chosen')->map->count();
                $mostFrequentCount = $optionCounts->max();
                $mostFrequentOptions = $optionCounts->filter(fn ($count) => $count === $mostFrequentCount)->keys()->toArray();

                // Menentukan kategori berdasarkan kombinasi
                $category = 'Belum dapat ditentukan';
                if (count($mostFrequentOptions) == 1) {
                    $dominantOption = $mostFrequentOptions[0];
                    $category = $dominantOption == 1 ? 'A' : ($dominantOption == 2 ? 'B' : 'C');
                } elseif (count($mostFrequentOptions) == 2) {
                    sort($mostFrequentOptions);
                    if ($mostFrequentOptions == [1, 2]) {
                        $category = 'A dan B';
                    } elseif ($mostFrequentOptions == [1, 3]) {
                        $category = 'A dan C';
                    } elseif ($mostFrequentOptions == [2, 3]) {
                        $category = 'B dan C';
                    }
                }

                return $category;
            });

        $categoryCounts = $groupedAnswers->groupBy(function ($item) {
            return $item;
        })->map->count();

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

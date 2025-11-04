<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $table = 'answers';

    protected $fillable = [
        'answer_code',
        'nis',
        'nama_siswa',
        'id_soal',
        'id_option_selected_1',
        'id_option_selected_2',
        'id_option_selected_3',
        'id_option_selected_4',
        'id_option_selected_5',
        'id_option_selected_6',
        'id_option_selected_7',
        'id_option_selected_8',
        'id_option_selected_9',
        'id_option_selected_10',
        'id_option_selected_11',
        'id_option_selected_12',
        'id_option_selected_13',
        'id_option_selected_14',
        'id_option_selected_15',
        'id_option_selected_16',
        'output_category',
        'output_description',
        'category_id',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'id_soal', 'id_soal');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

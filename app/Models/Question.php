<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = [
        'id_soal',
        'question_text',
        'id_option_a',
        'option_a',
        'id_option_b',
        'option_b',
        'id_option_c',
        'option_c',
        'category',
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class, 'id_soal', 'id_soal');
    }
}

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
        'id_soal',
        'id_option_chosen',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'id_soal', 'id_soal');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }
}

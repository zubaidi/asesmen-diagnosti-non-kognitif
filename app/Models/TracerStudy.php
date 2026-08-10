<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TracerStudy extends Model
{
    protected $table = 'tracer_studies';

    protected $fillable = [
        'nis',
        'nama_siswa',
        'option',
        'answer',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'nilai';

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'matakuliah_id', 'id');
    }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Matakuliah extends Model
{
    use HasFactory;
    protected $table = 'matakuliah';

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'matakuliah_id', 'id');
    }
}

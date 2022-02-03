<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalTes extends Model
{
    use HasFactory;
    protected $table = 'soal_tes';
    protected $guarded = [];

    public function tes()
    {
        return $this->belongsTo(Tes::class);
    }
}

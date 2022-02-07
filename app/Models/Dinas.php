<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dinas extends Model
{
    use HasFactory;
    protected $table = 'dinas';
    protected $guarded = [];


    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }

    public function prestasi()
    {
        return $this->hasMany(Prestasi::class);
    }

    public function jenis()
    {
        return $this->hasMany(Jenis::class);
    }

}

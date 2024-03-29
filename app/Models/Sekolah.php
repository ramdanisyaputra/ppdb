<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    protected $table = 'sekolah';
    protected $guarded = [];

    public function panitia()
    {
        return $this->hasMany(Panitia::class);
    }

    public function tes()
    {
        return $this->hasMany(Tes::class);
    }

    public function nilaiTes()
    {
        return $this->hasMany(NilaiTes::class);
    }

    public function profil()
    {
        return $this->hasMany(Profil::class);
    }
}

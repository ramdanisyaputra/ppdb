<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Peserta extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'peserta';
    protected $guarded = [];

    public function profil()
    {
        return $this->hasOne(Profil::class);
    }

    public function dinas()
    {
        return $this->hasOne(Dinas::class);
    }

    public function nilaiTes()
    {
        return $this->hasMany(NilaiTes::class);
    }
}

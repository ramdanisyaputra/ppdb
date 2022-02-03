<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tes extends Model
{
    use HasFactory;
    protected $table = 'tes';
    protected $guarded = [];

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }

    public function panitia()
    {
        return $this->belongsTo(Panitia::class);
    }

    public function soalTes()
    {
        return $this->hasMany(SoalTes::class);
    }
}

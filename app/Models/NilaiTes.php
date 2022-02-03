<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiTes extends Model
{
    use HasFactory;
    protected $table = 'nilai_tes';
    protected $guarded = [];

    public function tes()
    {
        return $this->belongsTo(Tes::class);
    }

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }
}

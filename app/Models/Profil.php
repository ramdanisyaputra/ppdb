<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;
    protected $table = 'profil';
    protected $guarded = [];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }

}

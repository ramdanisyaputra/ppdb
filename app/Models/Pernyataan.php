<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pernyataan extends Model
{
    use HasFactory;
    protected $table = 'pernyataan';
    protected $guarded = [];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }

}

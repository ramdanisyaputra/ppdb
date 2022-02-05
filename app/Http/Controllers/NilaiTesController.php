<?php

namespace App\Http\Controllers;

use App\Models\NilaiTes;
use App\Models\Sekolah;
use App\Models\SoalTes;
use App\Models\Tes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TesController extends Controller
{
    public function index()
    {
        $data['tes'] = Tes::all();
        $data['sekolah'] = Sekolah::all();
        return view('tes.index', $data);
    }

}

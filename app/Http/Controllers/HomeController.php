<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('checkThird');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if((session()->get('role') == 'panitia') || (session()->get('role') == 'admin')){
            $sekolah = Sekolah::all();

            $data_x = array();
            $data_y = array();
            foreach($sekolah as $s){
                $peserta = Peserta::whereHas('profil',function ($query) use ($s){
                    $query->where('sekolah_id', $s->id);
                })->count();

                $data_x[] = $s->nama;
                $data_y[] = $peserta;
            }

            $data['data_x'] = json_encode($data_x);
            $data['data_y'] = json_encode($data_y);	
        }else{
            $data['data_x'] = json_encode([]);
            $data['data_y'] = json_encode([]);	
        }
        return view('home' ,$data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Panitia;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkThird');
    }

    public function index()
    {
        return view('change_password.index');
    }

    public function update(Request $request)
    {
        $auth = Auth::guard(session()->get('role'))->user();
        if(session()->get('role') == 'admin'){
            if (!(Hash::check($request->current_password, $auth->password))) {
            // The passwords matches
                return redirect()->back()->with("error","Password lama tidak sesuai ");
            }
            if(!(strcmp($request->new_password, $request->new_password_confirmation)) == 0){
                        //New password and confirm password are not same
                        return redirect()->back()->with("error","Password baru dan konfirmasi password baru harus sama.");
            }
            $user = Admin::find($auth->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->back()->with("success","Password berhasil diubah !");
        }elseif(session()->get('role') == 'panitia'){
            if (!(Hash::check($request->current_password, $auth->password))) {
                return redirect()->back()->with("error","Password lama tidak sesuai ");
            }
            if(!(strcmp($request->new_password, $request->new_password_confirmation)) == 0){
                        //New password and confirm password are not same
                        return redirect()->back()->with("error","Password baru dan konfirmasi password baru harus sama.");
            }
            $user = Panitia::find($auth->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->back()->with("success","Password berhasil diubah !");
        }else{
            if (!(Hash::check($request->current_password, $auth->password))) {
                return redirect()->back()->with("error","Password lama tidak sesuai ");
            }
            if(!(strcmp($request->new_password, $request->new_password_confirmation)) == 0){
                        //New password and confirm password are not same
                        return redirect()->back()->with("error","Password baru dan konfirmasi password baru harus sama.");
            }
            $user = Peserta::find($auth->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->back()->with("success","Password berhasil diubah !");
        }
    }
}

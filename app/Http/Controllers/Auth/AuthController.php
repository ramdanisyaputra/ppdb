<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function loginForm()
    {
        if (Auth::guard(session()->get('role'))->user() != null) {
            return redirect()->route('home');
        }

        return view('auth.login');
    }

    public function validator(Request $request)
    {
        $rules = [
            'username' => 'required|string|exists:' . $request->role . ',username',
            'password' => 'required|string',
            'role' => 'required|string'
        ];

        $messages = [
            'username.exists' => 'Identitas tersebut tidak cocok dengan data kami.',
        ];

        $request->validate($rules, $messages);
    }

    public function login(Request $request)
    {
        $this->validator($request);

        if (session()->has('role')) {
            Auth::guard(session()->get('role'))->logout();
            session()->flush('role');
        }
        if (Auth::guard($request->role)->attempt(['username' => $request->username, 'password' => $request->password], $request->filled('remember'))) {
            session()->put('role', $request->role);

            return redirect()
                ->intended(route('home')); 
        }
        
        return redirect()->back()->withErrors(['username' => 'Identitas tersebut tidak cocok dengan data kami.']);
    }

    public function logout()
    {
        Auth::guard(session()->get('role'))->logout();
        session()->flush();
        return redirect('/login')
            ->with('status', 'Anda telah keluar!');
    }
    
}

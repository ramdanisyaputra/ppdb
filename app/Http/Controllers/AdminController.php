<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data['admin'] = Admin::all();
        return view('admin.index', $data);
    }

    public function store(Request $request)
    {
        Admin::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->back()->with('success','Data Berhasil Ditambahkan');
    }

    public function update(Request $request)
    {
        Admin::find($request->id)->update([
            'nama' => $request->nama
        ]);

        return redirect()->back()->with('success','Data Berhasil Dirubah');
    }

    public function delete($id)
    {
        Admin::find($id)->delete();

        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('page.auth.login');
    }
    public function login(Request $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {;
            return redirect('/lanjut')->with('message', 'Berhasil Login');
        } else {
            return redirect('/login')->with('error', 'Username atau Password Salah')
            ->with('message', 'Username atau Password Salah');
        };
    }

    public function register()
    {
        return view('page.auth.register');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);
        User::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'level' => 'Customer',
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'no_telp' => $request->no_telp,
            $request->except(['_token'])
        ]);
        return redirect('/login')->with('message', 'Data Berhasil Ditambahkan')->with($validateData);
    }

    public function logout()
    {
        Auth::logout();
        return view('page.auth.login');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard');
    }

    public function login_view()
    {
        return view('auth.login');
    }

    public function register_view_admin()
    {
        return view('auth.register_admin');
    }

    public function register_view_pelanggan()
    {
        return view('auth.register_pelanggan');
    }

    //Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login Gagal');
    }

    //logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    //pendaftaran untuk admin
    public function register_admin(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'password' => ['required', 'min:5'],
        ]);

        $post['username'] = $request->username;
        $post['password'] = Hash::make($validatedData['password']);
        $post['role'] = 0;

        //create pada tabel user
        $register = User::create($post);
        //create pada tabel admin
        $admin = Admin::create([
            'id_admin' => $register->id,
            'email' => $request->email
        ]);

        return redirect('/login')->with('success', 'Pendaftaran berhasil');
    }

    //pendaftaran untuk pengguna
    public function register_pengguna(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'password' => ['required', 'min:5'],
        ]);

        $post['username'] = $request->username;
        $post['password'] = Hash::make($validatedData['password']);
        $post['role'] = 1;

        //create pada tabel user
        $register = User::create($post);
        //create pada tabel admin
        $admin = Pelanggan::create([
            'id_pelanggan' => $register->id,
            'nama_pelanggan' => $request->nama_pelanggan,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp' => $request->no_telp,
            'tgl_lahir' => $request->tgl_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'alamat' => $request->alamat
        ]);

        return redirect('/login')->with('success', 'Pendaftaran berhasil');
    }
}

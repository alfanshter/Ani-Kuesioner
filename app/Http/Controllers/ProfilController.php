<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Pelanggan;
use App\Models\Pemilik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function profil_admin()
    {
        return view('profil.profil_admin');
    }

    public function profil_pemilik()
    {
        return view('profil.profil_pemilik');
    }

    public function profil_pelanggan()
    {
        return view('profil.profil_pelanggan');
    }


    public function update_profil_admin(Request $request)
    {
        $user['username'] = $request->username;

        //cek user
        $cekuser = User::where('id', $request->id)->first();
        if ($request->username != $cekuser->username) {
            $validatedData = $request->validate([
                'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            ]);
        }
        if ($request->password) {
            $user['password'] = Hash::make($request->password);
        }

        //update di user
        $update = User::where('id', $request->id)->update($user);

        //update di admin
        $update_admin = Admin::where('id_admin', $request->id)->update(['email' => $request->email]);

        return redirect('/profil_admin')->with('success', 'Edit Data berhasil');
    }

    public function update_profil_pelanggan(Request $request)
    {
        $user['username'] = $request->username;

        //cek user
        $cekuser = User::where('id', $request->id)->first();
        if ($request->username != $cekuser->username) {
            $validatedData = $request->validate([
                'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            ]);
        }
        if ($request->password) {
            $user['password'] = Hash::make($request->password);
        }

        //update di user
        $update = User::where('id', $request->id)->update($user);

        //update di pelanggan
        $update_pelanggan = Pelanggan::where('id_pelanggan', $request->id)->update(
            [
                'nama_pelanggan' => $request->nama_pelanggan,
                'email' => $request->email,
                'jenis_kelamin' => $request->jenis_kelamin,
                'no_telp' => $request->no_telp,
                'tgl_lahir' => $request->tgl_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'alamat' => $request->alamat
            ]
        );

        return redirect('/profil_pelanggan')->with('success', 'Edit Data berhasil');
    }
    public function update_profil_pemilik(Request $request)
    {
        $user['username'] = $request->username;

        //cek user
        $cekuser = User::where('id', $request->id)->first();
        if ($request->username != $cekuser->username) {
            $validatedData = $request->validate([
                'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            ]);
        }
        if ($request->password) {
            $user['password'] = Hash::make($request->password);
        }

        //update di user
        $update = User::where('id', $request->id)->update($user);

        //update di pemilik
        $update_pemilik = Pemilik::where('id_pemilik', $request->id)->update(
            [
                'nama_pemilik' => $request->nama_pemilik,
                'email' => $request->email,
                'jenis_kelamin' => $request->jenis_kelamin,
                'no_telp' => $request->no_telp,
                'tgl_lahir' => $request->tgl_lahir,
                'tempat_lahir' => $request->tempat_lahir
            ]
        );

        return redirect('/profil_pemilik')->with('success', 'Edit Data berhasil');
    }
}

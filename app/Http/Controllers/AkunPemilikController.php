<?php

namespace App\Http\Controllers;

use App\Models\Pemilik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunPemilikController extends Controller
{
    public function akun_pemilik(Request $request)
    {
        $data = User::where('role', 2)
            ->with('pemilik')
            ->get();
        return view('akunpemilik.akunpemilik', ['pemilik' => $data]);
    }

    //Pendaftaran akun pemilik
    public function daftar_pemilik(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'password' => ['required', 'min:5'],
        ]);

        $post['username'] = $request->username;
        $post['password'] = Hash::make($validatedData['password']);
        $post['role'] = 2;

        //create pada tabel user
        $register = User::create($post);
        //create pada tabel admin
        $admin = Pemilik::create([
            'id_pemilik' => $register->id,
            'email' => $request->email,
            'nama_pemilik' => $request->nama_pemilik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp' => $request->no_telp,
            'tgl_lahir' => $request->tgl_lahir,
            'tempat_lahir' => $request->tempat_lahir
        ]);

        return redirect('/akun_pemilik')->with('success', 'Pendaftaran berhasil');
    }

    //Update akun pemilik
    public function edit_akun_pemilik(Request $request)
    {
        $validatedData = $request->validate([
            'username' => ['required']
        ]);

        $updateuser['username'] = $request->username;
        //cek data ? 
        $getuser = User::where('id', $request->id)->first();
        if ($request->username != $getuser->username) {
            $validatedData['username'] = 'required|unique:users';
            $validation = $request->validate($validatedData);
        }

        $update['username'] = $request->username;


        if ($request->password) {
            $update['password'] = Hash::make($request->password);
        }

        User::where('id', $request->id)
            ->update($update);
        //update data pemilik
        $admin = Pemilik::where('id_pemilik', $request->id)->update([
            'email' => $request->email,
            'nama_pemilik' => $request->nama_pemilik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp' => $request->no_telp,
            'tgl_lahir' => $request->tgl_lahir,
            'tempat_lahir' => $request->tempat_lahir
        ]);

        return redirect('/akun_pemilik')->with('success', 'Edit berhasil');
    }

    public function hapus_akun_pemilik($id)
    {
        User::destroy($id);
        Pemilik::where('id_pemilik', $id)->delete();
        return redirect('/akun_pemilik')->with('success', 'Akun Pemilik berhasil di hapus ');
    }
}

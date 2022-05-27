<?php

namespace App\Http\Controllers;

use App\Models\Kuesioner;
use App\Models\User;
use Illuminate\Http\Request;

class KuesionerController extends Controller
{
    public function kuesioner()
    {
        return view('kuesioner.kuesioner');
    }

    public function kuesioner_admin()
    {
        $produk = Kuesioner::where('is_kategori', 'Produk')->get();
        $kepuasan_pelanggan = Kuesioner::where('is_kategori', 'Kepuasan Pelanggan')->get();
        $pelayanan = Kuesioner::where('is_kategori', 'Pelayanan')->get();

        return view('kuesioner.kuesioner_admin', ['produk' => $produk, 'kepuasan_pelanggan' => $kepuasan_pelanggan, 'pelayanan' => $pelayanan]);
    }

    public function tambah_kuesioner(Request $request)
    {

        $validatedData = $request->validate([
            'pertanyaan' => 'required',
            'is_kategori' => 'required',
        ]);


        $save = Kuesioner::create($validatedData);
        return redirect('/kuesioner_admin')->with('success', 'Pendaftaran berhasil');
    }

    public function edit_kuesioner(Request $request)
    {

        $validatedData = $request->validate([
            'pertanyaan' => 'required',
            'is_kategori' => 'required',
        ]);


        $update = Kuesioner::where('id', $request->id)->update($validatedData);
        return redirect('/kuesioner_admin')->with('success', 'Edit Data berhasil');
    }

    public function delete(Request $request)
    {
        $delete = Kuesioner::where('id', $request->id)->delete();
        return redirect('/kuesioner_admin')->with('success', 'Berhasil di hapus');
    }
}

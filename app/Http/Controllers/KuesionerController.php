<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Kuesioner;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KuesionerController extends Controller
{
    public function kuesioner()
    {
        $produk = Kuesioner::where('is_kategori', 'Produk')->get();
        $kepuasan_pelanggan = Kuesioner::where('is_kategori', 'Kepuasan Pelanggan')->get();
        $pelayanan = Kuesioner::where('is_kategori', 'pelayanan')->get();

        if (auth()->user()->pelanggan->is_status == 0) {
            return view(
                'kuesioner.kuesioner',
                [
                    'produk' => $produk,
                    'kepuasan_pelanggan' => $kepuasan_pelanggan,
                    'pelayanan' => $pelayanan
                ]
            );
        } else {
            return view('kuesioner.kuesioner-selesai');
        }
    }

    public function kuesioner_admin()
    {
        $produk = Kuesioner::where('is_kategori', 'Produk')->get();
        $kepuasan_pelanggan = Kuesioner::where('is_kategori', 'Kepuasan Pelanggan')->get();
        $pelayanan = Kuesioner::where('is_kategori', 'Pelayanan')->get();

        return view('kuesioner.kuesioner_admin', ['produk' => $produk, 'kepuasan_pelanggan' => $kepuasan_pelanggan, 'pelayanan' => $pelayanan]);
    }

    public function hasil_kuesioner_admin()
    {
        $pelanggan = Pelanggan::where('is_status', '1')
            ->orderBy('created_at', 'desc')
            ->with('jawaban')
            ->withCount([
                'jawaban as jawabans' => function ($query) {
                    $query->select(DB::raw('SUM(jawaban)'));
                }
            ])
            ->get();


        return view('kuesioner.hasil_kuesioner_admin', ['pelanggan' => $pelanggan]);
    }

    public function lihat_hasil_kuesioner($id)
    {
        $produk = Kuesioner::where('is_kategori', 'Produk')->with(["jawaban" => function ($q) use ($id) {
            $q->where('pelanggan_id', '=', $id);
        }])->get();

        $kepuasan_pelanggan = Kuesioner::where('is_kategori', 'Kepuasan Pelanggan')->with(["jawaban" => function ($q) use ($id) {
            $q->where('pelanggan_id', '=', $id);
        }])->get();

        $pelayanan = Kuesioner::where('is_kategori', 'Pelayanan')->with(["jawaban" => function ($q) use ($id) {
            $q->where('pelanggan_id', '=', $id);
        }])->get();

        return view(
            'kuesioner.lihat_hasil_kuesioner',
            [
                'produk' => $produk,
                'kepuasan_pelanggan' => $kepuasan_pelanggan,
                'pelayanan' => $pelayanan
            ]
        );
    }



    public function tambah_kuesioner(Request $request)
    {

        $validatedData = $request->validate([
            'pertanyaan' => 'required',
            'is_kategori' => 'required',
        ]);


        $save = Kuesioner::create($validatedData);
        return redirect('/kuesioner_admin')->with('success', 'Data berhasil ditambah');
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

    public function jawaban_pelanggan(Request $request)
    {
        $soal = $request->soal;
        $jawab = $request->jawab;

        foreach (array_combine($soal, $jawab) as $soals => $jawabs) {
            $insertdata = Jawaban::create([
                'kuesioner_id' => $soals,
                'pelanggan_id' => auth()->user()->id,
                'jawaban' => $jawabs
            ]);
        }

        //update status
        Pelanggan::where('id_pelanggan', auth()->user()->id)->update([
            'is_status' => 1
        ]);

        return redirect('/kuesioner');
    }
}

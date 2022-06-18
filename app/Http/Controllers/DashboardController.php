<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Jawaban;
use App\Models\Kuesioner;
use App\Models\Pelanggan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index()
    {
        function percentageOf($number, $everything, $decimals = 2)
        {
            return round($number / $everything * 100, $decimals);
        }

        $tahun = ['2020', '2021', '2022'];
        //5 
        $data_ss_2022 = Jawaban::where('jawaban', '5')->whereYear('created_at', '2022')->sum('jawaban');
        $data_ss_2021 = Jawaban::where('jawaban', '5')->whereYear('created_at', '2021')->sum('jawaban');
        $data_ss_2020 = Jawaban::where('jawaban', '5')->whereYear('created_at', '2020')->sum('jawaban');

        //4 
        $data_s_2022 = Jawaban::where('jawaban', '4')->whereYear('created_at', '2022')->sum('jawaban');
        $data_s_2021 = Jawaban::where('jawaban', '4')->whereYear('created_at', '2021')->sum('jawaban');
        $data_s_2020 = Jawaban::where('jawaban', '4')->whereYear('created_at', '2020')->sum('jawaban');


        //3 
        $data_n_2022 = Jawaban::where('jawaban', '3')->whereYear('created_at', '2022')->sum('jawaban');
        $data_n_2021 = Jawaban::where('jawaban', '3')->whereYear('created_at', '2021')->sum('jawaban');
        $data_n_2020 = Jawaban::where('jawaban', '3')->whereYear('created_at', '2020')->sum('jawaban');

        //2 
        $data_ts_2022 = Jawaban::where('jawaban', '2')->whereYear('created_at', '2022')->sum('jawaban');
        $data_ts_2021 = Jawaban::where('jawaban', '2')->whereYear('created_at', '2021')->sum('jawaban');
        $data_ts_2020 = Jawaban::where('jawaban', '2')->whereYear('created_at', '2020')->sum('jawaban');

        //1 
        $data_sts_2022 = Jawaban::where('jawaban', '1')->whereYear('created_at', '2022')->sum('jawaban');
        $data_sts_2021 = Jawaban::where('jawaban', '1')->whereYear('created_at', '2021')->sum('jawaban');
        $data_sts_2020 = Jawaban::where('jawaban', '1')->whereYear('created_at', '2020')->sum('jawaban');

        $sum_2022 = $data_ss_2022 + $data_s_2022 + $data_n_2022 + $data_ts_2022 + $data_sts_2022;
        $ss_2022 = 0;
        $s_2022 = 0;
        $n_2022 = 0;
        $ts_2022 = 0;
        $sts_2022 = 0;
        if ($sum_2022 > 0) {
            $numbers_2022 = array($data_ss_2022, $data_s_2022, $data_n_2022, $data_ts_2022, $data_sts_2022);
            $everything_2022 = array_sum($numbers_2022);
            $ss_2022 = percentageOf($numbers_2022[0], $everything_2022);
            $s_2022 = percentageOf($numbers_2022[1], $everything_2022);
            $n_2022 = percentageOf($numbers_2022[2], $everything_2022);
            $ts_2022 = percentageOf($numbers_2022[3], $everything_2022);
            $sts_2022 = percentageOf($numbers_2022[4], $everything_2022);
        }

        $sum_2021 = $data_ss_2021 + $data_s_2021 + $data_n_2021 + $data_ts_2021 + $data_sts_2021;
        $ss_2021 = 0;
        $s_2021 = 0;
        $n_2021 = 0;
        $ts_2021 = 0;
        $sts_2021 = 0;
        if ($sum_2021 > 0) {
            $numbers_2021 = array($data_ss_2021, $data_s_2021, $data_n_2021, $data_ts_2021, $data_sts_2021);
            $everything_2021 = array_sum($numbers_2021);
            $ss_2021 = percentageOf($numbers_2021[0], $everything_2021);
            $s_2021 = percentageOf($numbers_2021[1], $everything_2021);
            $n_2021 = percentageOf($numbers_2021[2], $everything_2021);
            $ts_2021 = percentageOf($numbers_2021[3], $everything_2021);
            $sts_2021 = percentageOf($numbers_2021[4], $everything_2021);
        }
        $sum_2020 = $data_ss_2020 + $data_s_2020 + $data_n_2020 + $data_ts_2020 + $data_sts_2020;
        $ss_2020 = 0;
        $s_2020 = 0;
        $n_2020 = 0;
        $ts_2020 = 0;
        $sts_2020 = 0;

        if ($sum_2020 > 0) {
            $numbers_2020 = array($data_ss_2020, $data_s_2020, $data_n_2020, $data_ts_2020, $data_sts_2020);
            $everything_2020 = array_sum($numbers_2020);
            $ss_2020 = percentageOf($numbers_2020[0], $everything_2020);
            $s_2020 = percentageOf($numbers_2020[1], $everything_2020);
            $n_2020 = percentageOf($numbers_2020[2], $everything_2020);
            $ts_2020 = percentageOf($numbers_2020[2], $everything_2020);
            $sts_2020 = percentageOf($numbers_2020[2], $everything_2020);
        }

        $max_chart = max($ss_2022, $ss_2021, $ss_2020, $s_2022, $s_2021, $s_2020, $n_2022, $n_2021, $n_2020, $ts_2022, $ts_2021, $ts_2020, $sts_2022, $sts_2021, $sts_2020);
        $step = (int)round($max_chart / 4);

        //Diagram chart al year
        $diagram_st = Jawaban::where('jawaban', '5')->sum('jawaban');
        $diagram_s = Jawaban::where('jawaban', '4')->sum('jawaban');
        $diagram_n = Jawaban::where('jawaban', '3')->sum('jawaban');
        $diagram_ts = Jawaban::where('jawaban', '2')->sum('jawaban');
        $diagram_sts = Jawaban::where('jawaban', '1')->sum('jawaban');
        $puas = $diagram_st + $diagram_s;
        $tidak_puas = $diagram_n + $diagram_ts + $diagram_sts;
        if ($puas > 0) {
            $numbers_diagram = array($puas, $tidak_puas);
            $everything_diagram = array_sum($numbers_diagram);
            $puas = percentageOf($numbers_diagram[0], $everything_diagram);
            $tidak_puas = percentageOf($numbers_diagram[1], $everything_diagram);
        }

        //Diagram sesuai kategori
        //Produk
        $produk_ss = Jawaban::whereHas('pertanyaan', function ($query) {
            $query->where('is_kategori', 'Produk');
        })->where('jawaban', '5')->sum('jawaban');

        $produk_s = Jawaban::whereHas('pertanyaan', function ($query) {
            $query->where('is_kategori', 'Produk');
        })->where('jawaban', '4')->sum('jawaban');

        $produk_n = Jawaban::whereHas('pertanyaan', function ($query) {
            $query->where('is_kategori', 'Produk');
        })->where('jawaban', '3')->sum('jawaban');

        $produk_ts = Jawaban::whereHas('pertanyaan', function ($query) {
            $query->where('is_kategori', 'Produk');
        })->where('jawaban', '2')->sum('jawaban');

        $produk_sts = Jawaban::whereHas('pertanyaan', function ($query) {
            $query->where('is_kategori', 'Produk');
        })->where('jawaban', '1')->sum('jawaban');

        //Kepuasan Pelanggan
        $kepuasan_pelanggan_ss = Jawaban::whereHas('pertanyaan', function ($query) {
            $query->where('is_kategori', 'Kepuasan Pelanggan');
        })->where('jawaban', '5')->sum('jawaban');

        $kepuasan_pelanggan_s = Jawaban::whereHas('pertanyaan', function ($query) {
            $query->where('is_kategori', 'Kepuasan Pelanggan');
        })->where('jawaban', '4')->sum('jawaban');

        $kepuasan_pelanggan_n = Jawaban::whereHas('pertanyaan', function ($query) {
            $query->where('is_kategori', 'Kepuasan Pelanggan');
        })->where('jawaban', '3')->sum('jawaban');

        $kepuasan_pelanggan_ts = Jawaban::whereHas('pertanyaan', function ($query) {
            $query->where('is_kategori', 'Kepuasan Pelanggan');
        })->where('jawaban', '2')->sum('jawaban');

        $kepuasan_pelanggan_sts = Jawaban::whereHas('pertanyaan', function ($query) {
            $query->where('is_kategori', 'Kepuasan Pelanggan');
        })->where('jawaban', '1')->sum('jawaban');

        //Pelayanan
        $pelayanan_ss = Jawaban::whereHas('pertanyaan', function ($query) {
            $query->where('is_kategori', 'Pelayanan');
        })->where('jawaban', '5')->sum('jawaban');

        $pelayanan_s = Jawaban::whereHas('pertanyaan', function ($query) {
            $query->where('is_kategori', 'Pelayanan');
        })->where('jawaban', '4')->sum('jawaban');

        $pelayanan_n = Jawaban::whereHas('pertanyaan', function ($query) {
            $query->where('is_kategori', 'Pelayanan');
        })->where('jawaban', '3')->sum('jawaban');

        $pelayanan_ts = Jawaban::whereHas('pertanyaan', function ($query) {
            $query->where('is_kategori', 'Pelayanan');
        })->where('jawaban', '2')->sum('jawaban');

        $pelayanan_sts = Jawaban::whereHas('pertanyaan', function ($query) {
            $query->where('is_kategori', 'Pelayanan');
        })->where('jawaban', '1')->sum('jawaban');

        //User
        $jumlah_user = Pelanggan::count('id');
        $jumlah_responden = Jawaban::count('id');
        $jumlah_complaint = Complaint::count('id');
        $jumlah_reponden_total = Pelanggan::where('is_status', 1)->count();
        return view(
            'dashboard.dashboard',
            [
                'ss_2022' => $ss_2022,
                'ss_2021' => $ss_2021,
                'ss_2020' => $ss_2020,
                's_2022' => $s_2022,
                's_2021' => $s_2021,
                's_2020' => $s_2020,
                'n_2022' => $n_2022,
                'n_2021' => $n_2021,
                'n_2020' => $n_2020,
                'ts_2022' => $ts_2022,
                'ts_2021' => $ts_2021,
                'ts_2020' => $ts_2020,
                'sts_2022' => $sts_2022,
                'sts_2021' => $sts_2021,
                'sts_2020' => $sts_2020,
                'max_chart' => $max_chart,
                'step' => $step,
                'puas' => $puas,
                'tidak_puas' => $tidak_puas,
                'produk_ss' => $produk_ss,
                'produk_s' => $produk_s,
                'produk_n' => $produk_n,
                'produk_ts' => $produk_ts,
                'produk_sts' => $produk_sts,
                'kepuasan_pelanggan_ss' => $kepuasan_pelanggan_ss,
                'kepuasan_pelanggan_s' => $kepuasan_pelanggan_s,
                'kepuasan_pelanggan_n' => $kepuasan_pelanggan_n,
                'kepuasan_pelanggan_ts' => $kepuasan_pelanggan_ts,
                'kepuasan_pelanggan_sts' => $kepuasan_pelanggan_sts,
                'pelayanan_ss' => $pelayanan_ss,
                'pelayanan_s' => $pelayanan_s,
                'pelayanan_n' => $pelayanan_n,
                'pelayanan_ts' => $pelayanan_ts,
                'pelayanan_sts' => $pelayanan_sts,
                'jumlah_user' => $jumlah_user,
                'jumlah_responden' => $jumlah_responden,
                'jumlah_complaint' => $jumlah_complaint,
                'jumlah_reponden_total' => $jumlah_reponden_total
            ]
        );
    }

    public function unduh_grafik()
    {

        return Excel::download(new UsersExport, 'users.xlsx');
        ////get data
        //$complaint = Complaint::all();
        ////idpelatih;
        //$pdf = Pdf::loadview('dashboard.unduh_grafik', [
        //    'complaint' => $complaint

        //])->setPaper('A4', 'potrait');
        //return $pdf->stream();
    }
}

class UsersExport implements FromView
{
    public function view(): View
    {
        $user = Jawaban::select('*', 'pelanggan_id')->groupBy('pelanggan_id')->with('pelanggan', function ($query) {
            $query->with('jawaban');
        })->orderBy('pelanggan_id', 'asc')->get();


        $soal_produk = Kuesioner::where('is_kategori', 'Produk')->orderBy('id', 'asc')->get();
        $jumlah_soal_produk = Kuesioner::where('is_kategori', 'Produk')->count();
        $kepuasan_pelanggan = Kuesioner::where('is_kategori', 'Kepuasan Pelanggan')->orderBy('id', 'asc')->get();
        $jumlah_kepuasan_pelanggan = Kuesioner::where('is_kategori', 'Kepuasan Pelanggan')->count();
        $pelayanan = Kuesioner::where('is_kategori', 'Pelayanan')->orderBy('id', 'asc')->get();
        $jumlah_pelayanan = Kuesioner::where('is_kategori', 'Pelayanan')->count();


        //produk
        //jawaban 
        $jawaban_produk = Jawaban::select('pelanggan_id')->groupBy('pelanggan_id')->with('pelanggan', function ($query) {
            $query->with('jawaban');
        })->orderBy('pelanggan_id', 'asc')->get();

        //hasil persentase
        $jawaban_sangat_suka = Jawaban::where('jawaban', 5)->count();
        $jawaban_suka = Jawaban::where('jawaban', 4)->count();
        $jawaban_normal = Jawaban::where('jawaban', 3)->count();
        $jawaban_tidak_suka = Jawaban::where('jawaban', 2)->count();
        $jawaban_sangat_tidak_suka = Jawaban::where('jawaban', 1)->count();

        $jumlah_responden = $jawaban_sangat_suka + $jawaban_suka + $jawaban_normal + $jawaban_tidak_suka + $jawaban_sangat_tidak_suka;

        $jawaban_sangat_suka = $jawaban_sangat_suka * 5;
        $jawaban_suka = $jawaban_suka * 4;
        $jawaban_normal = $jawaban_normal * 3;
        $jawaban_tidak_suka = $jawaban_tidak_suka * 2;
        $jawaban_sangat_tidak_suka = $jawaban_sangat_tidak_suka * 4;

        $total_skor = $jawaban_sangat_suka + $jawaban_suka + $jawaban_normal + $jawaban_tidak_suka + $jawaban_sangat_tidak_suka;

        $Y = 5 * $jumlah_responden;

        $rumus_index = $total_skor / $Y * 100;
        $jumlah_keseluruhan = Jawaban::sum('jawaban');
        return view('dashboard.unduh_grafik', [
            'user' => $user,
            'soal_produk' => $soal_produk,
            'jumlah_soal_produk' => $jumlah_soal_produk,
            'kepuasan_pelanggan' => $kepuasan_pelanggan,
            'jumlah_kepuasan_pelanggan' => $jumlah_kepuasan_pelanggan,
            'pelayanan' => $pelayanan,
            'jumlah_pelayanan' => $jumlah_pelayanan,
            'jawaban_produk' => $jawaban_produk,
            'rumus_index' => $rumus_index,
            'jumlah_keseluruhan' => $jumlah_keseluruhan
        ]);
    }
    public function collection()
    {
        return Complaint::all();
    }
}

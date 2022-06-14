<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th rowspan="2">NO</th>
                <th rowspan="2">Nama</th>
                <th colspan="{{$jumlah_soal_produk}}">Produk</th>
                <th colspan="{{$jumlah_kepuasan_pelanggan}}">Kepuasan Pelanggan</th>
                <th colspan="{{$jumlah_pelayanan}}">Pelayanan</th>
                <th rowspan="2">Tanggal</th>
            </tr>
            <tr>
                @foreach ($soal_produk as $soal_produks)
                    <th>{{$soal_produks->pertanyaan}}</th>
                @endforeach
                @foreach ($kepuasan_pelanggan as $kepuasan_pelanggans)
                    <th>{{$kepuasan_pelanggans->pertanyaan}}</th>
                @endforeach
                @foreach ($pelayanan as $pelayanans)
                    <th>{{$pelayanans->pertanyaan}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->pelanggan->nama_pelanggan}}</td>
                @foreach ($item->pelanggan->jawaban as $items)
                    <td>{{$items->jawaban}}</td>
                @endforeach
               <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('Y-m-d')}}</td>
            </tr>

            @endforeach


            <tr>
            </tr>
            <tr>
                <td  style="text-align: center" colspan="{{$jumlah_soal_produk + $jumlah_kepuasan_pelanggan + $jumlah_pelayanan + 3}}">Nilai Keseluruhan : {{$jumlah_keseluruhan}}</td>
            </tr>

                        <tr>
                <td  style="text-align: center" colspan="{{$jumlah_soal_produk + $jumlah_kepuasan_pelanggan + $jumlah_pelayanan + 3}}">Presentase : {{$rumus_index}} %</td>
            </tr>

        </tbody>
    </table>
</body>

</html>
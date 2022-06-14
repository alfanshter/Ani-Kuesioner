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
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            @endforeach
        </tbody>
    </table>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:9px 19px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:9px 19px;word-break:normal;}
.tg .tg-9wq8{border-color:inherit;text-align:center;vertical-align:middle}
.tg .tg-9o1m{border-color:inherit;font-size:12px;text-align:center;vertical-align:middle}
</style>
<center>
 <center>
        <div>
                <p style=" font-weight: bold;text-transform:uppercase">DAFTAR COMPLAINT</p>

        </div>
        <br>
    
    </center>
    
<table class="tg" style="width: 100%">
<thead>
  <tr>
    <th class="tg-9o1m">NO</th>
    <th class="tg-9wq8">Pesan</th>
    <th class="tg-9wq8">Nama</th>
  </tr>
</thead>
<tbody>
    @foreach ($complaint as $item)
  <tr>
    <td class="tg-9wq8">{{$loop->iteration}}</td>
    <td class="tg-9wq8"><span style="font-weight:400;font-style:normal">{{$item->pesan}}</span></td>
    <td class="tg-9wq8">{{$item->pelanggan->nama_pelanggan}}</td>
  </tr>        
    @endforeach

</tbody>
</table>
</center>
    
</body>
</html>
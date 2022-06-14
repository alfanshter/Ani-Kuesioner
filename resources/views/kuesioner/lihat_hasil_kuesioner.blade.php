 @extends('layout.master')


 @section('konten')
 <div class="page-header">

     <h3 class="page-title">
         <span class="page-title-icon bg-gradient-primary text-white me-2">
             <i class="mdi mdi-home"></i>
         </span>
         Kuesioner
     </h3>
     <nav aria-label="breadcrumb">
         <ul class="breadcrumb">
             <li class="breadcrumb-item active" aria-current="page">
                 <span></span>Overview
                 <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
             </li>
         </ul>
     </nav>
 </div>

 <div class="row">
     <div class="col-12 grid-margin">
         <div class="card">
             <div class="card-body">
                 <h4>Produk</h4>
                 <table class="table table-bordered ">
                     <thead>
                         <tr class="table-danger">
                             <th> No</th>
                             <th> Pernyataan </th>
                             <th> Jawaban </th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($produk as $item)
                         <tr>
                             <td> {{$loop->iteration}} </td>
                             <td> {{$item->pertanyaan}} </td>
                             <td> {{$item->jawaban->jawaban}} </td>
                         </tr>

                         <!-- EDIT Modal -->
                         <div class="modal fade" id="editpelanggan{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h4 class="card-title">Edit Akun</h4>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                     </div>
                                     <form action="/edit_akun_pelanggan" method="POST">
                                         @csrf
                                         <input type="hidden" name="id" value="{{$item->id}}">
                                         <div class="modal-body">
                                             <div class="card-body">
                                                 <div class="form-group">
                                                     <label for="exampleInputName1">Nama Lengkap</label>
                                                     <input type="text" class="form-control" id="exampleInputName1" name="nama_pelanggan" value="{{old('nama_pelanggan',$item->nama_pelanggan)}}" placeholder="Name" required>
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="exampleInputEmail3">Email address</label>
                                                     <input type="email" class="form-control" value="{{old('email',$item->email)}}" id="exampleInputEmail3" name="email" placeholder="Email" required>
                                                 </div>

                                                 <div class="form-group">
                                                     <label for="exampleInputEmail3">Username</label>
                                                     <input type="text" class="form-control" id="exampleInputEmail3" value="{{old('username',$item->username)}}" name="username" placeholder="Username" required>
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="exampleInputPassword4">Password Baru</label>
                                                     <input type="password" name="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="exampleSelectGender">Jenis Kelamin</label>
                                                     <select class="form-control" name="jenis_kelamin" id="exampleSelectGender">
                                                         <option>{{$item->jenis_kelamin}}</option>
                                                         <option>Laki-Laki</option>
                                                         <option>Perempuan</option>
                                                     </select>
                                                 </div>

                                                 <div class="form-group">
                                                     <label for="exampleInputCity1">Tempat Lahir</label>
                                                     <input type="text" class="form-control" value="{{old('tempat_lahir',$item->tempat_lahir)}}" name="tempat_lahir" required id="exampleInputCity1" placeholder="Tempat Lahir">
                                                 </div>

                                                 <div class="form-group">
                                                     <label for="exampleInputCity1">No Telepon</label>
                                                     <input type="text" class="form-control" name="no_telp" value="{{old('no_telp',$item->no_telp)}}" required id="exampleInputCity1" placeholder="No HP">
                                                 </div>

                                                 <div class="form-group">
                                                     <label for="exampleInputCity1">Tanggal Lahir</label>
                                                     <input type="date" class="form-control" name="tgl_lahir" value="{{old('tgl_lahir',$item->tgl_lahir)}}" required id="tgl_lahir" placeholder="Tanggal Lahir">
                                                 </div>

                                             </div>
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-primary">Save changes</button>
                                         </div>

                                     </form>
                                 </div>
                             </div>
                         </div>
                         @endforeach

                     </tbody>
                 </table>
                 <br><br>
                   <h4>Kepuasan Pelanggan</h4>
                 <table class="table table-bordered ">
                     <thead>
                         <tr class="table-danger">
                             <th> No</th>
                             <th> Pernyataan </th>
                             <th> Jawaban </th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($kepuasan_pelanggan as $item)
                         <tr>
                             <td> {{$loop->iteration}} </td>
                             <td> {{$item->pertanyaan}} </td>
                             <td> {{$item->jawaban->jawaban}} </td>
                         </tr>

                         <!-- EDIT Modal -->
                         <div class="modal fade" id="editpelanggan{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h4 class="card-title">Edit Akun</h4>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                     </div>
                                     <form action="/edit_akun_pelanggan" method="POST">
                                         @csrf
                                         <input type="hidden" name="id" value="{{$item->id}}">
                                         <div class="modal-body">
                                             <div class="card-body">
                                                 <div class="form-group">
                                                     <label for="exampleInputName1">Nama Lengkap</label>
                                                     <input type="text" class="form-control" id="exampleInputName1" name="nama_pelanggan" value="{{old('nama_pelanggan',$item->nama_pelanggan)}}" placeholder="Name" required>
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="exampleInputEmail3">Email address</label>
                                                     <input type="email" class="form-control" value="{{old('email',$item->email)}}" id="exampleInputEmail3" name="email" placeholder="Email" required>
                                                 </div>

                                                 <div class="form-group">
                                                     <label for="exampleInputEmail3">Username</label>
                                                     <input type="text" class="form-control" id="exampleInputEmail3" value="{{old('username',$item->username)}}" name="username" placeholder="Username" required>
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="exampleInputPassword4">Password Baru</label>
                                                     <input type="password" name="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="exampleSelectGender">Jenis Kelamin</label>
                                                     <select class="form-control" name="jenis_kelamin" id="exampleSelectGender">
                                                         <option>{{$item->jenis_kelamin}}</option>
                                                         <option>Laki-Laki</option>
                                                         <option>Perempuan</option>
                                                     </select>
                                                 </div>

                                                 <div class="form-group">
                                                     <label for="exampleInputCity1">Tempat Lahir</label>
                                                     <input type="text" class="form-control" value="{{old('tempat_lahir',$item->tempat_lahir)}}" name="tempat_lahir" required id="exampleInputCity1" placeholder="Tempat Lahir">
                                                 </div>

                                                 <div class="form-group">
                                                     <label for="exampleInputCity1">No Telepon</label>
                                                     <input type="text" class="form-control" name="no_telp" value="{{old('no_telp',$item->no_telp)}}" required id="exampleInputCity1" placeholder="No HP">
                                                 </div>

                                                 <div class="form-group">
                                                     <label for="exampleInputCity1">Tanggal Lahir</label>
                                                     <input type="date" class="form-control" name="tgl_lahir" value="{{old('tgl_lahir',$item->tgl_lahir)}}" required id="tgl_lahir" placeholder="Tanggal Lahir">
                                                 </div>

                                             </div>
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-primary">Save changes</button>
                                         </div>

                                     </form>
                                 </div>
                             </div>
                         </div>
                         @endforeach

                     </tbody>
                 </table>

                     <br><br>
                   <h4>Pelayanan</h4>
                 <table class="table table-bordered ">
                     <thead>
                         <tr class="table-danger">
                             <th> No</th>
                             <th> Pernyataan </th>
                             <th> Jawaban </th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($pelayanan as $item)
                         <tr>
                             <td> {{$loop->iteration}} </td>
                             <td> {{$item->pertanyaan}} </td>
                             <td> {{$item->jawaban->jawaban}} </td>
                         </tr>

                         <!-- EDIT Modal -->
                         <div class="modal fade" id="editpelanggan{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h4 class="card-title">Edit Akun</h4>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                     </div>
                                     <form action="/edit_akun_pelanggan" method="POST">
                                         @csrf
                                         <input type="hidden" name="id" value="{{$item->id}}">
                                         <div class="modal-body">
                                             <div class="card-body">
                                                 <div class="form-group">
                                                     <label for="exampleInputName1">Nama Lengkap</label>
                                                     <input type="text" class="form-control" id="exampleInputName1" name="nama_pelanggan" value="{{old('nama_pelanggan',$item->nama_pelanggan)}}" placeholder="Name" required>
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="exampleInputEmail3">Email address</label>
                                                     <input type="email" class="form-control" value="{{old('email',$item->email)}}" id="exampleInputEmail3" name="email" placeholder="Email" required>
                                                 </div>

                                                 <div class="form-group">
                                                     <label for="exampleInputEmail3">Username</label>
                                                     <input type="text" class="form-control" id="exampleInputEmail3" value="{{old('username',$item->username)}}" name="username" placeholder="Username" required>
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="exampleInputPassword4">Password Baru</label>
                                                     <input type="password" name="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="exampleSelectGender">Jenis Kelamin</label>
                                                     <select class="form-control" name="jenis_kelamin" id="exampleSelectGender">
                                                         <option>{{$item->jenis_kelamin}}</option>
                                                         <option>Laki-Laki</option>
                                                         <option>Perempuan</option>
                                                     </select>
                                                 </div>

                                                 <div class="form-group">
                                                     <label for="exampleInputCity1">Tempat Lahir</label>
                                                     <input type="text" class="form-control" value="{{old('tempat_lahir',$item->tempat_lahir)}}" name="tempat_lahir" required id="exampleInputCity1" placeholder="Tempat Lahir">
                                                 </div>

                                                 <div class="form-group">
                                                     <label for="exampleInputCity1">No Telepon</label>
                                                     <input type="text" class="form-control" name="no_telp" value="{{old('no_telp',$item->no_telp)}}" required id="exampleInputCity1" placeholder="No HP">
                                                 </div>

                                                 <div class="form-group">
                                                     <label for="exampleInputCity1">Tanggal Lahir</label>
                                                     <input type="date" class="form-control" name="tgl_lahir" value="{{old('tgl_lahir',$item->tgl_lahir)}}" required id="tgl_lahir" placeholder="Tanggal Lahir">
                                                 </div>

                                             </div>
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-primary">Save changes</button>
                                         </div>

                                     </form>
                                 </div>
                             </div>
                         </div>
                         @endforeach

                     </tbody>
                 </table>

             </div>
         </div>
     </div>
 </div>

 @endsection
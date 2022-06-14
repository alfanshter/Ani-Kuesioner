 @extends('layout.master')


 @section('konten')
 <div class="page-header">

     <h3 class="page-title">
         <span class="page-title-icon bg-gradient-primary text-white me-2">
             <i class="mdi mdi-home"></i>
         </span>
         Hasil Kuesioner
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

                 @if (session()->has('success'))
                 <div class="alert alert-success" role="alert">
                     {{session('success')}}
                 </div>
                 @endif
                 @error('username')
                 <div class="alert alert-danger mt-2" role="alert">
                     {{$message}}
                 </div>
                 @enderror
                 {{--Produk--}}
                 <h4 class="card-title">Daftar Pelanggan</h4>
                 <table class="table table-bordered ">
                     <thead>
                         <tr class="table-danger">
                             <th> No</th>
                             <th> Nama pelanggan </th>
                             <th class="text-center"> Total Nilai </th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($pelanggan as $item)
                         <tr>
                             <td> {{$loop->iteration}} </td>
                             <td> {{$item->nama_pelanggan}} </td>
                             <td class="align-middle text-center">
                                 {{$item->jawabans}}
                                 {{--<div class="d-flex justify-content-sm-center mt-2">
                                     <a href="/lihat_hasil_kuesioner/{{$item->id_pelanggan}}" class="btn btn-info" style="margin-left: 10px">Cek Kuesioner</a>
                                 </div>--}}
                             </td>
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
 <!-- Modal -->

 <!-- Tambah Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="card-title">Tambah Kuesioner</h4>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="/tambah_kuesioner" method="POST">
                 @csrf
                 <div class="modal-body">
                     <div class="card-body">
                         <div class="form-group">
                             <label for="exampleInputName1">Pertanyaan</label>
                             <input type="text" class="form-control" id="exampleInputName1" name="pertanyaan" placeholder="pertanyaan" required>
                         </div>

                         <div class="form-group">
                             <label for="exampleSelectGender">Kategori</label>
                             <select class="form-control" name="is_kategori" id="exampleSelectGender">
                                 <option value="Produk">Produk</option>
                                 <option value="Kepuasan Pelanggan">Kepuasan Pelanggan</option>
                                 <option value="Pelayanan">Pelayanan</option>

                             </select>
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
 @endsection
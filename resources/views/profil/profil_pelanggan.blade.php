 @extends('layout.master')


 @section('konten')
 <div class="page-header">

     <h3 class="page-title">
         <span class="page-title-icon bg-gradient-primary text-white me-2">
             <i class="mdi mdi-home"></i>
         </span>
         Profil
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
     <div class="col-12 grid-margin stretch-card">
         <div class="card">
             <div class="card-body">
                 <h4 class="card-title">Profil Pelanggan</h4>
                 <br>
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

                 <form class="forms-sample" method="POST" action="/update_profil_pelanggan">
                     <input type="hidden" name="id" value="{{auth()->user()->id}}">
                     @csrf
                     <div class="form-group">
                         <label for="exampleInputName1">Username</label>
                         <input type="text" class="form-control" id="exampleInputName1" required name="username" value="{{old('username',auth()->user()->username)}}" placeholder="Username">
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail3">Email address</label>
                         <input type="email" name="email" class="form-control" value="{{old('email',auth()->user()->pelanggan->email)}}" required id="exampleInputEmail3" placeholder="Email">
                     </div>

                     <div class="form-group">
                         <label for="exampleInputEmail3">Nama Pelanggan</label>
                         <input type="text" name="nama_pelanggan" class="form-control" value="{{old('nama_pelanggan',auth()->user()->pelanggan->nama_pelanggan)}}" required id="exampleInputEmail3" placeholder="Nama Pelanggan">
                     </div>

                     <div class="form-group">
                         <label for="exampleInputEmail3">Jenis Kelamin</label>

                         <select class="form-control text-dark" aria-label="Default select example" name="jenis_kelamin" id="jenis_kelamin">
                             <option value="{{auth()->user()->pelanggan->jenis_kelamin}}">{{auth()->user()->pelanggan->jenis_kelamin}}</option>
                             <option value="Perempuan">Perempuan</option>
                             <option value="Laki - laki">Laki - laki</option>
                         </select>
                     </div>

                     <div class="form-group">
                         <label for="exampleInputEmail3">No Telp</label>
                         <input type="text" name="no_telp" class="form-control" value="{{old('no_telp',auth()->user()->pelanggan->no_telp)}}" required id="exampleInputEmail3" placeholder="Nomor Telepon">
                     </div>

                     <div class="form-group">
                         <label for="message-text">Tanggal Lahir:</label>
                         <input type="date" required name="tgl_lahir" value="{{old('tgl_lahir',auth()->user()->pelanggan->tgl_lahir)}}" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Tanggal Lahir">
                     </div>

                     <div class="form-group">
                         <label for="message-text">Tempat Lahir:</label>

                         <input type="text" required name="tempat_lahir"  value="{{old('tempat_lahir',auth()->user()->pelanggan->tempat_lahir)}}" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Tempat Lahir">
                     </div>

                     <div class="form-group">
                         <label for="message-text">Alamat:</label>

                         <input type="text" required name="alamat" value="{{old('alamat',auth()->user()->pelanggan->alamat)}}" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Alamat">
                     </div>

                     <div class="form-group">
                         <label for="exampleInputPassword4">Ubah Password</label>
                         <input type="password" name="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                     </div>
                     <br><br>
                     <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                     <a href="/" class="btn btn-light">Cancel</a>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- Modal -->

 @endsection
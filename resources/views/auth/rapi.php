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
                 <div class="card-description">
                     <button class="btn btn-rounded btn-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                         Tambah Kuesioner
                     </button>

                 </div>

                 <h4 class="card-title">Daftar Kuesioner</h4>
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

                 <div class="table-responsive">
                     <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                         <thead>
                             <tr class="table-danger">
                                 <th> No</th>
                                 <th> Pertanyaan </th>
                                 <th> Kategori </th>
                                 <th class="text-center"> Aksi </th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($produk as $item)
                             <tr>
                                 <td> {{$loop->iteration}} </td>
                                 <td> {{$item->pertanyaan}} </td>
                                 <td> {{$item->is_kategori}} </td>

                                 <td class="align-middle text-center">
                                     <div class="d-flex justify-content-sm-center mt-2">
                                         <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editkuesioner{{$item->id}}">Edit</button>
                                         <a href="/hapus_akun_pemilik/{{$item->id}}" onclick="return confirm('Apakah anda akan menghapus data ?')" class="btn btn-danger" style="margin-left: 10px">Hapus</a>
                                     </div>
                                 </td>
                             </tr>

                             <!-- EDIT Modal -->
                             <div class="modal fade" id="editkuesioner{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h4 class="card-title">Edit Kuesioner</h4>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                         </div>
                                         <form action="/edit_akun_pemilik" method="POST">
                                             @csrf
                                             <input type="hidden" name="id" value="{{$item->id}}">
                                             <div class="modal-body">
                                                 <div class="card-body">
                                                     <div class="form-group">
                                                         <label for="exampleInputName1">Pertanyaan</label>
                                                         <input type="text" class="form-control" id="exampleInputName1" name="pertanyaan" value="{{old('pertanyaan',$item->pertanyaan)}}" placeholder="pertanyaan" required>
                                                     </div>

                                                     <div class="form-group">
                                                         <label for="exampleSelectGender">Kategori</label>
                                                         <select class="form-control" name="is_kategori" id="exampleSelectGender">
                                                             <option>{{$item->is_kategori}}</option>
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
                             @endforeach

                         </tbody>
                     </table>
                 </div>
                 <br>
                 <h4 class="card-title">Daftar Kuesioner</h4>
                 <div class="table-responsive">
                     <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                         <thead>
                             <tr class="table-danger">
                                 <th> No</th>
                                 <th> Pertanyaan </th>
                                 <th> Kategori </th>
                                 <th class="text-center"> Aksi </th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($produk as $item)
                             <tr>
                                 <td> {{$loop->iteration}} </td>
                                 <td> {{$item->pertanyaan}} </td>
                                 <td> {{$item->is_kategori}} </td>

                                 <td class="align-middle text-center">
                                     <div class="d-flex justify-content-sm-center mt-2">
                                         <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editkuesioner{{$item->id}}">Edit</button>
                                         <a href="/hapus_akun_pemilik/{{$item->id}}" onclick="return confirm('Apakah anda akan menghapus data ?')" class="btn btn-danger" style="margin-left: 10px">Hapus</a>
                                     </div>
                                 </td>
                             </tr>

                             <!-- EDIT Modal -->
                             <div class="modal fade" id="editkuesioner{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h4 class="card-title">Edit Kuesioner</h4>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                         </div>
                                         <form action="/edit_akun_pemilik" method="POST">
                                             @csrf
                                             <input type="hidden" name="id" value="{{$item->id}}">
                                             <div class="modal-body">
                                                 <div class="card-body">
                                                     <div class="form-group">
                                                         <label for="exampleInputName1">Pertanyaan</label>
                                                         <input type="text" class="form-control" id="exampleInputName1" name="pertanyaan" value="{{old('pertanyaan',$item->pertanyaan)}}" placeholder="pertanyaan" required>
                                                     </div>

                                                     <div class="form-group">
                                                         <label for="exampleSelectGender">Kategori</label>
                                                         <select class="form-control" name="is_kategori" id="exampleSelectGender">
                                                             <option>{{$item->is_kategori}}</option>
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
                             @endforeach

                         </tbody>
                     </table>
                 </div>
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
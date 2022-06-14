 @extends('layout.master')


 @section('konten')
 <div class="page-header">

     <h3 class="page-title">
         <span class="page-title-icon bg-gradient-primary text-white me-2">
             <i class="mdi mdi-home"></i>
         </span>
         Complaint
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
                 <h4 class="card-title">Daftar complaint</h4>
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

                 <div class="card-description">
                     <button class="btn btn-rounded btn-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                         Tambah complaint
                     </button>

                 </div>
                 <table class="table table-bordered ">
                     <thead>
                         <tr class="table-danger">
                             <th> No</th>
                             <th> Pesan </th>
                             <th class="text-center"> Keterangan </th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($data as $item)
                         <tr>
                             <td> {{$loop->iteration}} </td>
                             <td> {{$item->pesan}} </td>
                             <td class="align-middle text-center">
                                 {{$item->is_status}}
                                 {{--<div class="d-flex justify-content-sm-center mt-2">
                                     <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editcomplaint{{$item->id}}">Edit</button>
                                     <a href="/hapus_complaint/{{$item->id}}" onclick="return confirm('Apakah anda akan menghapus data ?')" class="btn btn-danger" style="margin-left: 10px">Hapus</a>
                                 </div>--}}
                             </td>
                         </tr>
    <!-- EDIT Modal -->
                         <div class="modal fade" id="editcomplaint{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h4 class="card-title">Edit complaint</h4>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                     </div>
                                     <form action="/edit_complaint" method="POST">
                                         @csrf
                                         <input type="hidden" name="id" value="{{$item->id}}">
                                         <div class="modal-body">
                                             <div class="card-body">
                                                 <div class="form-group">
                                                     <label for="exampleTextarea1">Pesan</label>
                                                     <textarea class="form-control" name="pesan" id="exampleTextarea1" rows="4">{{$item->pesan}}</textarea>
                                                 </div>

                                             </div>
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-primary">Edit</button>
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
         <!-- Modal -->
         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h4 class="card-title">Tambah complaint</h4>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <form action="/tambah_complaint" method="POST">
                         @csrf
                         <div class="modal-body">
                             <div class="card-body">
                                 <div class="form-group">
                                     <label for="exampleTextarea1">Pesan</label>
                                     <textarea class="form-control" name="pesan" id="exampleTextarea1" rows="4"></textarea>
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
     </div>

 </div>

 @endsection
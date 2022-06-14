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
                <div class="d-flex justify-content-between">
                     <h4 class="card-title align-self-start">Daftar complaint</h4>
                    {{--<a href="/complaint_pdf" class="btn btn-gradient-primary btn-icon-text align-self-end">
                    <i class="mdi mdi-file-check btn-icon-prepend"></i> Unduh </a>--}}
                </div>
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

                
                 <table class="table table-bordered ">
                     <thead>
                         <tr class="table-danger">
                             <th> No</th>
                             <th> Pesan </th>
                             <th> Nama </th>
                             <th class="text-center"> Aksi </th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($data as $item)
                         <tr>
                             <td> {{$loop->iteration}} </td>
                             <td> {{$item->pesan}} </td>
                             <td> {{$item->pelanggan->nama_pelanggan}} </td>
                             <td class="align-middle text-center">
                                @if ($item->is_status == "Menunggu")
                                    <div class="d-flex justify-content-sm-center mt-2">
                                        <a href="/complaint_ditolak/{{$item->id}}" onclick="return confirm('Apakah anda akan menolak complaint ?')" class="btn btn-danger" style="margin-left: 10px">Hapus</a>
                                        <a href="/complaint_diterima/{{$item->id}}" onclick="return confirm('Apakah anda akan menerima complaint ?')" class="btn btn-primary" style="margin-left: 10px">Diterima</a>
                                    </div>
                                @else 
                                {{$item->is_status}}
                                @endif
                                 
                             </td>
                         </tr>

                         @endforeach

                  
                     </tbody>
                 </table>
             </div>
         </div>
       
     </div>

 </div>

 @endsection
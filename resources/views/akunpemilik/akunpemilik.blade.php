 @extends('layout.master')


 @section('konten')
 <div class="card">
     <div class="card-body">
         <h4 class="card-title">Daftar Akun Pemilik</h4>
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
                 Tambah Akun
             </button>

         </div>
         <table class="table table-bordered ">
             <thead>
                 <tr class="table-danger">
                     <th> No</th>
                     <th> Nama Pemilik </th>
                     <th> Email </th>
                     <th> Jenis Kelamin </th>
                     <th> Username </th>
                     <th class="text-center"> Aksi </th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($pemilik as $item)
                 <tr>
                     <td> {{$loop->iteration}} </td>
                     <td> {{$item->pemilik->nama_pemilik}} </td>
                     <td> {{$item->pemilik->email}} </td>
                     <td> {{$item->pemilik->jenis_kelamin}} </td>
                     <td> {{$item->username}} </td>
                     <td class="align-middle text-center">
                         <div class="d-flex justify-content-sm-center mt-2">
                             <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editpemilik{{$item->id}}">Edit</button>
                             <a href="/hapus_akun_pemilik/{{$item->id}}" onclick="return confirm('Apakah anda akan menghapus data ?')" class="btn btn-danger" style="margin-left: 10px">Hapus</a>
                         </div>
                     </td>
                 </tr>

                 <!-- EDIT Modal -->
                 <div class="modal fade" id="editpemilik{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h4 class="card-title">Edit Akun</h4>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                             </div>
                             <form action="/edit_akun_pemilik" method="POST">
                                 @csrf
                                 <input type="hidden" name="id" value="{{$item->id}}">
                                 <div class="modal-body">
                                     <div class="card-body">
                                         <div class="form-group">
                                             <label for="exampleInputName1">Nama Lengkap</label>
                                             <input type="text" class="form-control" id="exampleInputName1" name="nama_pemilik" value="{{old('nama_pemilik',$item->pemilik->nama_pemilik)}}" placeholder="Name" required>
                                         </div>
                                         <div class="form-group">
                                             <label for="exampleInputEmail3">Email address</label>
                                             <input type="email" class="form-control" value="{{old('email',$item->pemilik->email)}}" id="exampleInputEmail3" name="email" placeholder="Email" required>
                                         </div>

                                         <div class="form-group">
                                             <label for="exampleInputEmail3">Username</label>
                                             <input type="text" class="form-control" id="exampleInputEmail3" value="{{old('username',$item->username)}}" name="username" placeholder="Username" required>
                                         </div>
                                         <div class="form-group">
                                             <label for="exampleInputPassword4">Password Baru</label>
                                             <input type="password" name="password"  class="form-control"  id="exampleInputPassword4" placeholder="Password">
                                         </div>
                                         <div class="form-group">
                                             <label for="exampleSelectGender">Jenis Kelamin</label>
                                             <select class="form-control" name="jenis_kelamin" id="exampleSelectGender">
                                                <option >{{$item->pemilik->jenis_kelamin}}</option>
                                                <option>Laki-Laki</option>
                                                 <option>Perempuan</option>
                                             </select>
                                         </div>

                                         <div class="form-group">
                                             <label for="exampleInputCity1">Tempat Lahir</label>
                                             <input type="text" class="form-control" value="{{old('tempat_lahir',$item->pemilik->tempat_lahir)}}" name="tempat_lahir" required id="exampleInputCity1" placeholder="Tempat Lahir">
                                         </div>

                                         <div class="form-group">
                                             <label for="exampleInputCity1">No Telepon</label>
                                             <input type="text" class="form-control" name="no_telp" value="{{old('no_telp',$item->pemilik->no_telp)}}" required id="exampleInputCity1" placeholder="No HP">
                                         </div>

                                         <div class="form-group">
                                             <label for="exampleInputCity1">Tanggal Lahir</label>
                                             <input type="date" class="form-control" name="tgl_lahir" value="{{old('tgl_lahir',$item->pemilik->tgl_lahir)}}" required id="tgl_lahir" placeholder="Tanggal Lahir">
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
 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="card-title">Tambah Akun</h4>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="/akun_pemilik" method="POST">
                 @csrf
                 <div class="modal-body">
                     <div class="card-body">
                         <div class="form-group">
                             <label for="exampleInputName1">Nama Lengkap</label>
                             <input type="text" class="form-control" id="exampleInputName1" name="nama_pemilik" placeholder="Name" required>
                         </div>
                         <div class="form-group">
                             <label for="exampleInputEmail3">Email address</label>
                             <input type="email" class="form-control" id="exampleInputEmail3" name="email" placeholder="Email" required>
                         </div>

                         <div class="form-group">
                             <label for="exampleInputEmail3">Username</label>
                             <input type="text" class="form-control" id="exampleInputEmail3" name="username" placeholder="Username" required>
                         </div>
                         <div class="form-group">
                             <label for="exampleInputPassword4">Password</label>
                             <input type="password" name="password" required class="form-control" id="exampleInputPassword4" placeholder="Password">
                         </div>
                         <div class="form-group">
                             <label for="exampleSelectGender">Jenis Kelamin</label>
                             <select class="form-control" name="jenis_kelamin" id="exampleSelectGender">
                                 <option>Laki-Laki</option>
                                 <option>Perempuan</option>
                             </select>
                         </div>

                         <div class="form-group">
                             <label for="exampleInputCity1">Tempat Lahir</label>
                             <input type="text" class="form-control" name="tempat_lahir" required id="exampleInputCity1" placeholder="Tempat Lahir">
                         </div>

                         <div class="form-group">
                             <label for="exampleInputCity1">No Telepon</label>
                             <input type="text" class="form-control" name="no_telp" required id="exampleInputCity1" placeholder="Tempat Lahir">
                         </div>

                         <div class="form-group">
                             <label for="exampleInputCity1">Tanggal Lahir</label>
                             <input type="date" class="form-control" name="tgl_lahir" required id="tgl_lahir" placeholder="Tanggal Lahir">
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
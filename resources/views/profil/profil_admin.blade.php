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
                    <h4 class="card-title">Profil Admin</h4>
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

                    <form class="forms-sample" method="POST" action="/update_profil_admin">
                        <input type="hidden" name="id" value="{{auth()->user()->id}}">
                        @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Username</label>
                        <input type="text" class="form-control" id="exampleInputName1" required name="username" value="{{old('username',auth()->user()->username)}}" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" name="email" class="form-control" value="{{old('email',auth()->user()->admin->email)}}" required id="exampleInputEmail3" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Ubah Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                      </div>
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
 </div>
 <!-- Modal -->

 @endsection
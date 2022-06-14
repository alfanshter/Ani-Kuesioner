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

                 <form action="/jawaban_pelanggan" method="post">
                     <h4 class="card-title">
                         Produk
                     </h4>
                     @csrf
                     @foreach ($produk as $produks)
                     <div style="margin-top: 1rem">
                         <p>{{$loop->iteration}}. {{$produks->pertanyaan}}</p>
                         <div class="form-check-quiz">
                             <input type="hidden" name="soal[{{$produks->id}}]" value="{{$produks->id}}">
                             <input class="form-check-input" type="radio" required name="jawab[{{$produks->id}}]" id="q1_r1" value="5">
                             <label class="form-check-label-quiz" for="q1_r1">
                                 Sangat Setuju
                             </label>
                         </div>
                         <div class="form-check-quiz">
                             <input type="hidden" name="soal[{{$produks->id}}]" value="{{$produks->id}}">
                             <input class="form-check-input" type="radio" required name="jawab[{{$produks->id}}]" id="q1_r2" value="4">
                             <label class="form-check-label-quiz" for="q1_r2">
                                 Setuju
                             </label>
                         </div>
                         <div class="form-check-quiz">
                             <input type="hidden" name="soal[{{$produks->id}}]" value="{{$produks->id}}">
                             <input class="form-check-input" type="radio" required name="jawab[{{$produks->id}}]" id="q1_r3" value="3">
                             <label class="form-check-label-quiz" for="q1_r3">
                                 Normal
                             </label>
                         </div>
                         <div class="form-check-quiz">
                             <input type="hidden" name="soal[{{$produks->id}}]" value="{{$produks->id}}">

                             <input class="form-check-input" type="radio" required name="jawab[{{$produks->id}}]" id="q1_r4" value="2">
                             <label class="form-check-label-quiz" for="q1_r3">
                                 Tidak Setuju
                             </label>
                         </div>

                         <div class="form-check-quiz">
                             <input type="hidden" name="soal[{{$produks->id}}]" value="{{$produks->id}}">

                             <input class="form-check-input" type="radio" required name="jawab[{{$produks->id}}]" id="q1_r5" value="1">
                             <label class="form-check-label-quiz" for="q1_r3">
                                 Sangat Tidak Setuju
                             </label>
                         </div>
                     </div>
                     @endforeach
                     <br><br>

                        <h4 class="card-title">
                         Kepuasan Pelanggan
                     </h4>
                     @csrf
                     @foreach ($kepuasan_pelanggan as $kepuasan_pelanggans)
                     <div style="margin-top: 1rem">
                         <p>{{$loop->iteration}}. {{$kepuasan_pelanggans->pertanyaan}}</p>
                         <div class="form-check-quiz">
                             <input type="hidden" name="soal[{{$kepuasan_pelanggans->id}}]" value="{{$kepuasan_pelanggans->id}}">
                             <input class="form-check-input" type="radio" required name="jawab[{{$kepuasan_pelanggans->id}}]" id="q1_r1" value="5">
                             <label class="form-check-label-quiz" for="q1_r1">
                                 Sangat Setuju
                             </label>
                         </div>
                         <div class="form-check-quiz">
                             <input type="hidden" name="soal[{{$kepuasan_pelanggans->id}}]" value="{{$kepuasan_pelanggans->id}}">
                             <input class="form-check-input" type="radio" required name="jawab[{{$kepuasan_pelanggans->id}}]" id="q1_r2" value="4">
                             <label class="form-check-label-quiz" for="q1_r2">
                                 Setuju
                             </label>
                         </div>
                         <div class="form-check-quiz">
                             <input type="hidden" name="soal[{{$kepuasan_pelanggans->id}}]" value="{{$kepuasan_pelanggans->id}}">
                             <input class="form-check-input" type="radio" required name="jawab[{{$kepuasan_pelanggans->id}}]" id="q1_r3" value="3">
                             <label class="form-check-label-quiz" for="q1_r3">
                                 Normal
                             </label>
                         </div>
                         <div class="form-check-quiz">
                             <input type="hidden" name="soal[{{$kepuasan_pelanggans->id}}]" value="{{$kepuasan_pelanggans->id}}">

                             <input class="form-check-input" type="radio" required name="jawab[{{$kepuasan_pelanggans->id}}]" id="q1_r4" value="2">
                             <label class="form-check-label-quiz" for="q1_r3">
                                 Tidak Setuju
                             </label>
                         </div>

                         <div class="form-check-quiz">
                             <input type="hidden" name="soal[{{$kepuasan_pelanggans->id}}]" value="{{$kepuasan_pelanggans->id}}">

                             <input class="form-check-input" type="radio" required name="jawab[{{$kepuasan_pelanggans->id}}]" id="q1_r5" value="1">
                             <label class="form-check-label-quiz" for="q1_r3">
                                 Sangat Tidak Setuju
                             </label>
                         </div>
                     </div>
                     @endforeach
                     <br><br>


                        <h4 class="card-title">
                         Pelayanan
                     </h4>
                     @csrf
                     @foreach ($pelayanan as $pelayanans)
                     <div style="margin-top: 1rem">
                         <p>{{$loop->iteration}}. {{$pelayanans->pertanyaan}}</p>
                         <div class="form-check-quiz">
                             <input type="hidden" name="soal[{{$pelayanans->id}}]" value="{{$pelayanans->id}}">
                             <input class="form-check-input" type="radio" required name="jawab[{{$pelayanans->id}}]" id="q1_r1" value="5">
                             <label class="form-check-label-quiz" for="q1_r1">
                                 Sangat Setuju
                             </label>
                         </div>
                         <div class="form-check-quiz">
                             <input type="hidden" name="soal[{{$pelayanans->id}}]" value="{{$pelayanans->id}}">
                             <input class="form-check-input" type="radio" required name="jawab[{{$pelayanans->id}}]" id="q1_r2" value="4">
                             <label class="form-check-label-quiz" for="q1_r2">
                                 Setuju
                             </label>
                         </div>
                         <div class="form-check-quiz">
                             <input type="hidden" name="soal[{{$pelayanans->id}}]" value="{{$pelayanans->id}}">
                             <input class="form-check-input" type="radio" required name="jawab[{{$pelayanans->id}}]" id="q1_r3" value="3">
                             <label class="form-check-label-quiz" for="q1_r3">
                                 Normal
                             </label>
                         </div>
                         <div class="form-check-quiz">
                             <input type="hidden" name="soal[{{$pelayanans->id}}]" value="{{$pelayanans->id}}">

                             <input class="form-check-input" type="radio" required name="jawab[{{$pelayanans->id}}]" id="q1_r4" value="2">
                             <label class="form-check-label-quiz" for="q1_r3">
                                 Tidak Setuju
                             </label>
                         </div>

                         <div class="form-check-quiz">
                             <input type="hidden" name="soal[{{$pelayanans->id}}]" value="{{$pelayanans->id}}">

                             <input class="form-check-input" type="radio" required name="jawab[{{$pelayanans->id}}]" id="q1_r5" value="1">
                             <label class="form-check-label-quiz" for="q1_r3">
                                 Sangat Tidak Setuju
                             </label>
                         </div>
                     </div>
                     @endforeach
                     <br><br>

                     <button class="btn btn-primary">Submit</button>
                 </form>

             </div>
         </div>
     </div>
 </div>

 @endsection
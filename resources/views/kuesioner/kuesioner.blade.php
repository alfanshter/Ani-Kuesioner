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
                 <h4 class="card-title">
                     Produk
                 </h4>
                 <div>
                     <p>1. Cistik Resep Eyang dapat memberikan menu produk dengan cita rasa yang enak</p>
                     <div class="form-check-quiz">
                         <input class="form-check-input" type="radio" name="q1" id="q1_r1" value="r2">
                         <label class="form-check-label-quiz" for="q1_r1">
                             Sangat Setuju
                         </label>
                     </div>
                     <div class="form-check-quiz">
                         <input class="form-check-input" type="radio" name="q1" id="q1_r2" value="r2">
                         <label class="form-check-label-quiz" for="q1_r2">
                             Setuju
                         </label>
                     </div>
                     <div class="form-check-quiz">
                         <input class="form-check-input" type="radio" name="q1" id="q1_r3" value="r3">
                         <label class="form-check-label-quiz" for="q1_r3">
                             Normal
                         </label>
                     </div>
                     <div class="form-check-quiz">
                         <input class="form-check-input" type="radio" name="q1" id="q1_r4" value="r3">
                         <label class="form-check-label-quiz" for="q1_r3">
                             Tidak Setuju
                         </label>
                     </div>

                     <div class="form-check-quiz">
                         <input class="form-check-input" type="radio" name="q1" id="q1_r5" value="r3">
                         <label class="form-check-label-quiz" for="q1_r3">
                             Sangat Tidak Setuju
                         </label>
                     </div>
                 </div>
                 <div style="margin-top: 1rem">
                     <p>2. Cistik Resep Eyang menyajikan produk makanan cemilan yang baru atau fresh produksi</p>
                     <div class="form-check-quiz">
                         <input class="form-check-input" type="radio" name="q2" id="q2_r1" value="r2">
                         <label class="form-check-label-quiz" for="q1_r1">
                             Sangat Setuju
                         </label>
                     </div>
                     <div class="form-check-quiz">
                         <input class="form-check-input" type="radio" name="q2" id="q2_r2" value="r2">
                         <label class="form-check-label-quiz" for="q1_r2">
                             Setuju
                         </label>
                     </div>
                     <div class="form-check-quiz">
                         <input class="form-check-input" type="radio" name="q2" id="q2_r3" value="r3">
                         <label class="form-check-label-quiz" for="q1_r3">
                             Normal
                         </label>
                     </div>
                     <div class="form-check-quiz">
                         <input class="form-check-input" type="radio" name="q2" id="q2_r4" value="r3">
                         <label class="form-check-label-quiz" for="q1_r3">
                             Tidak Setuju
                         </label>
                     </div>

                     <div class="form-check-quiz">
                         <input class="form-check-input" type="radio" name="q2" id="q2_r5" value="r3">
                         <label class="form-check-label-quiz" for="q1_r3">
                             Sangat Tidak Setuju
                         </label>
                     </div>
                 </div>


             </div>
         </div>
     </div>
 </div>

 @endsection
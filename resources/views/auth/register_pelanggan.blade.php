<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <img src="../../assets/images/logo.svg">
                            </div>
                             @error('username')
                 <div class="alert alert-danger mt-2" role="alert">
                     {{$message}}
                 </div>
                 @enderror
                            <h4>Akun Baru Pelanggan?</h4>
                            <h6 class="font-weight-light">Silahkan isi formulir berikut</h6>
                            <form action="/register" method="POST" class="pt-3">
                                @csrf
                                <div class="form-group">
                                    <input type="text" required name="username" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" required class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <input type="text" required name="nama_pelanggan" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Nama Pelanggan">
                                </div>

                                <div class="form-group">
                                 <select class="form-control text-dark" aria-label="Default select example" name="jenis_kelamin" id="jenis_kelamin">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Perempuan">Perempuan</option>
                                    <option value="Laki - laki">Laki - laki</option>
                                </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" required name="no_telp" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Nomor Telepon">
                                </div>

                                <div class="form-group">
                                    <label for="message-text">Tanggal Lahir:</label>
                                    <input type="date" required name="tgl_lahir" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Tanggal Lahir">
                                </div>

                                 <div class="form-group">
                                    <input type="text" required name="tempat_lahir" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Tempat Lahir">
                                </div>

                                 <div class="form-group">
                                    <input type="text" required name="alamat" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Alamat">
                                </div>




                                <div class="form-group">
                                    <input type="password" name="password" required class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                                </div>

                                <center>
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                                    </div>

                                </center>
                                <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="/login" class="text-primary">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
</body>

</html>
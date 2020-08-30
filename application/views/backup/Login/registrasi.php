<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Registrasi</title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/icon.ico'); ?>">

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/fontfamily.css') ?>" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Daftar Akun</h1>
                <p class="text-danger"><?php echo $this->session->flashdata('message'); ?></p>
              </div>
              <div class="text-center">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 20rem;" src="<?php echo base_url('assets/img/svg/daftar.svg') ?>" alt="">
              </div>
              <form class="user" action="<?php echo site_url('register') ?>" method="POST">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" autocomplete="off" class="form-control form-control-user" name="username" minlength="6" placeholder="Username" required>
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" autocomplete="off" class="form-control form-control-user" name="nama" minlength="8" placeholder="Nama Lengkap" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="input-group">
                      <input id="pass" type="password" autocomplete="off" class="form-control form-control-user" name="pass" minlength="6" placeholder="Masukkan Password" required>
                      <div class="input-group-append">
                          <span id="show" style="border-radius: 0px 50px 50px 0px;" class="input-group-text bg-white"><i id="eye" class="fas fa-fw fa-eye"></i></span>
                       </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <input id="pass2" type="password" autocomplete="off" class="form-control form-control-user" name="pass2" minlength="6" placeholder="Konfirmasi Password" required="">
                      <div class="input-group-append">
                          <span id="show2" class="input-group-text bg-white" style="border-radius: 0px 50px 50px 0px;"><i id="eye2" class="fas fa-fw fa-eye"></i></span>
                       </div>
                    </div>
                  </div>
                </div>
                <button class="btn btn-primary btn-user btn-block">Buat akun</button>
              </form>
              <hr>
              <div class="text-center">
                <p>Sudah punya akun? Login <a class="text-decoration-none" href="<?php echo site_url('login') ?>">disini</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/js/sb-admin-2.min.js') ?>"></script>

  <script>
    var eye = document.getElementById('eye');
    $('#show').on('click', function(){
      if($('#pass').attr('type') == 'password'){
        $('#pass').attr('type', 'text');
        eye.className = 'fas fa-fw fa-eye-slash';
      }else{
        $('#pass').attr('type', 'password');
        eye.className = 'fas fa-fw fa-eye';
      }
    });

    var eye2 = document.getElementById('eye2');
    $('#show2').on('click', function(){
      if($('#pass2').attr('type') == 'password'){
        $('#pass2').attr('type', 'text');
        eye2.className = 'fas fa-fw fa-eye-slash';
      }else{
        $('#pass2').attr('type', 'password');
        eye2.className = 'fas fa-fw fa-eye';
      }
    });
  </script>

</body>
</html>

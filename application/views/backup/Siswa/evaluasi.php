<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Evaluasi</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/icon.ico'); ?>">
    
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/fontfamily.css') ?>" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('siswa') ?>">
          <div class="sidebar-brand-icon">
              <img style="height: 40px" src="<?php echo base_url('assets/img/logo-fill.png') ?>">
          </div>
          <div class="sidebar-brand-text mx-1" style="font-size: 12px">
              Media Pembelajaran Makhorijul Huruf
          </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('siswa') ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('dashboard') ?>">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">Materi</div>

        <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('pengertian') ?>">
          <i class="fas fa-fw fa-book-open"></i>
          <span>Pengertian</span></a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-fw fa-quran"></i>
              <span>Macam-macam</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Ada 5 macam:</h6>
                  <a class="collapse-item" href="<?php echo site_url('materi/1/1')?>">Al-Jauf (الجوف)</a>
                  <a class="collapse-item" href="<?php echo site_url('materi/2/6')?>">Al-Halq (الحَلْقُ)</a>
                  <a class="collapse-item" href="<?php echo site_url('materi/3/3')?>">Al-Lisan (اللِّسَانُ)</a>
                  <a class="collapse-item" href="<?php echo site_url('materi/4/2')?>">Asy-Syafatain (الشفت)</a>
                  <a class="collapse-item" href="<?php echo site_url('materi/5/25')?>">Al-Khaisyum (الخيشوم)</a>
              </div>
            </div>
        </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Penugasan
      </div>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('tugas') ?>">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Tugas</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('evaluasi') ?>">
          <i class="fas fa-fw fa-pen-alt"></i>
          <span>Evaluasi</span></a>
      </li>

      <hr class="sidebar-divider my-0">

      <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('forum') ?>">
          <i class="fas fa-fw fa-comments"></i>
          <span>Forum Diskusi</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-lg-inline text-gray-600 small">
                  <?php echo $this->session->userdata('nama'); ?>
                </span>
                <img class="img-profile rounded-circle" src="<?php echo base_url('assets/img/profile/'.$profile[0]->foto_user) ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo site_url('profile') ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?php
          $hasil = 0;
            for ($i=1; $i <= 33; $i++) { 
              if ($cek['tugas'.$i] == 3) {
                $hasil++;
              }
            }
          ?>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold text-primary">Evaluasi</h3>
            </div>
            <div class="card-body text-justify">
              <?php if ($cek['evaluasi'] == 1){ ?>
                <div class="text-center">
                  <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 20rem;" src="<?php echo base_url('assets/img/svg/evaluasiwait.svg') ?>" alt="">
                </div>
                <p style="font-size: 14pt">Anda sudah mengerjakan evaluasi. Silahkan menunggu penilaian dari guru Anda.</p>
              <?php }else if ($cek['evaluasi'] == 2){ ?>
                <div class="row">
                  <div class="col-md">
                    <div class="text-center">
                      <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 20rem;" src="<?php echo base_url('assets/img/svg/evaluasicompleted.svg') ?>" alt="">
                    </div>
                  </div>
                  <div class="col-md d-flex align-items-center justify-content-center text-center">
                    <div style="font-size:14pt">
                    Selamat Anda telah menyelesaikan evaluasi.<br>Nilai Anda<br><br>
                    <p class="font-weight-bold" style="font-size:20pt"><?php echo $rekaman['nilai']; ?></p><br>
                    <small>Pemeriksa: <?php foreach ($guru as $namaguru){ echo $pemeriksa = ($namaguru->id_user == $rekaman['guru']) ? $namaguru->nama_user : false ;} ?><br>Pesan: <?php echo $rekaman['pesan_guru']; ?></small>
                    </div>
                  </div>
                </div>
              <?php }else{ ?>
              <div class="text-center">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 20rem;" src="<?php echo base_url('assets/img/svg/evaluasi.svg') ?>" alt="">
              </div>
              <p style="font-size: 14pt">
                Evaluasi dalam media pembelajaran ini berupa membuat rekaman Anda membaca surah Al-Fatihah. Apabila Anda telah menyelesaikan dan benar dalam pengucapan semua tugas Makhorijul Huruf, Anda dapat mulai melakukan evaluasi dengan mencentang form dibawah dan klik tombol rekam.
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="setuju">
                  <label class="custom-control-label" id="label" for="setuju">Saya siap!</label>
                </div>
              </p>
              <button class="btn btn-block btn-danger" id="lanjut" disabled>Rekam</button>
            <?php } ?>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; MPMH 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin mau logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik "logout" untuk keluar.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?php echo site_url('logout') ?>">Logout</a>
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
      if (<?php echo $hasil ?> != 33){
        document.getElementById('label').innerHTML = 'Anda belum menyelesaikan semua tugas';
        document.getElementById('setuju').disabled = true;
      }else{
        $('#setuju').on('click', function(){
            if($('#setuju').is(':checked')){
                $('#lanjut').removeAttr('disabled')
            }
            else{
                $('#lanjut').prop('disabled', true)
            }
        });

        $('#lanjut').on('click', function(){
            window.location.assign('rekamevaluasi');
        });
      }
    </script>
</body>
</html>
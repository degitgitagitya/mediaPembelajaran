<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard</title>
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
            <a class="nav-link" href="<?php echo site_url('creative') ?>">
            <i class="fab fa-fw fa-creative-commons-sa"></i>
            <span>Creative Learning</span></a>
        </li>

        <li class="nav-item active">
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
          <span>Pengertian & Manfaat</span></a>
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
      <li class="nav-item">
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

          <div class="row">
            <?php
              $belum = 0;
              $sudah = 0;
              $salah = 0;
              $benar = 0;
              for ($i=1; $i <= 33; $i++) { 
                if ($status['tugas'.$i] == 0/* || $status['tugas'.$i] == -1*/) { //0 Belum
                  $belum++;
                }elseif ($status['tugas'.$i] == 1) { //1 Sudah
                  $sudah++;
                }elseif ($status['tugas'.$i] == 2) { //2 Salah
                  $salah++;
                }elseif ($status['tugas'.$i] == 3) { //3 Benar
                  $benar++;
                }
              }
            ?>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tugas Benar</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $benar?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-check-double fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tugas dikerjakan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sudah?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-check fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tugas Belum Benar</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $salah?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-times fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Tugas Belum Dikerjakan</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $belum?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <?php 
            $aljauf = array(1, 28, 32);
            $aljaufbenar = 0;
            $alhalq = array(6, 7, 18, 19, 30, 31);
            $alhalqbenar = 0;
            $allisan = array(3, 4, 5, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 21, 22, 23, 26, 33);
            $allisanbenar = 0;
            $asysyafatain = array(2, 20, 24, 29);
            $asysyafatainbenar = 0;
            $alkhaisyum = array(25, 27);
            $alkhaisyumbenar = 0;

            for ($i=1; $i <= 33; $i++){
              for ($j=0, $jcount = count($aljauf); $j <= $jcount-1; $j++){ //Aljauf
                if ($i == $aljauf[$j]){
                  if($status['tugas'.$i] == 3){
                    $aljaufbenar++;
                  }
                }
              }

              for ($k=0, $kcount = count($alhalq); $k <= $kcount-1; $k++){ //Alhalq
                if ($i == $alhalq[$k]){
                  if($status['tugas'.$i] == 3){
                    $alhalqbenar++;
                  }
                }
              }

              for ($l=0, $lcount = count($allisan); $l <= $lcount-1; $l++){ //Allisan
                if ($i == $allisan[$l]){
                  if($status['tugas'.$i] == 3){
                    $allisanbenar++;
                  }
                }
              }

              for ($m=0, $mcount = count($asysyafatain); $m <= $mcount-1; $m++){ //Asysyafatain
                if ($i == $asysyafatain[$m]){
                  if($status['tugas'.$i] == 3){
                    $asysyafatainbenar++;
                  }
                }
              }

              for ($n=0, $ncount = count($alkhaisyum); $n <= $ncount-1; $n++){ //Alkhaisyum
                if ($i == $alkhaisyum[$n]){
                  if($status['tugas'.$i] == 3){
                    $alkhaisyumbenar++;
                  }
                }
              }
            }

            function percent($hasil){
              $percent = number_format($hasil*100, 0);
              return $percent;
            }

            function bg($p){
              $bg = '';
              if ($p <= 20) {
                $bg = "bg-danger";
              }elseif ($p > 20 && $p <= 40) {
                $bg = "bg-warning";
              }elseif ($p > 40 && $p <= 60) {
                $bg = "bg-primary";
              }elseif ($p > 60 && $p <= 80) {
                $bg = "bg-info";
              }elseif ($p > 80 && $p <= 100) {
                $bg = "bg-success";
              }
              return $bg;
            }

            $aljaufper = percent($aljaufbenar/$jcount);
            $alhalqper = percent($alhalqbenar/$kcount);
            $allisanper = percent($allisanbenar/$lcount);
            $asysyafatainper = percent($asysyafatainbenar/$mcount);
            $alkhaisyumper = percent($alkhaisyumbenar/$ncount);
          ?>

          <div class="row">
            <div class="col-md-8">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Rincian Tugas Benar</h6>
                </div>
                <div class="card-body" style="font-size:14pt">
                  <h4 class="small font-weight-bold">Al-Jauf (الجوف)<span class="float-right"><?php echo $aljaufbenar.' dari '.$jcount?></span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar <?php echo bg($aljaufper) ?>" role="progressbar" style="width:<?php echo $aljaufper.'%'?>" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Al-Halq (الحَلْقُ)<span class="float-right"><?php echo $alhalqbenar.' dari '.$kcount?></span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar <?php echo bg($alhalqper) ?>" role="progressbar" style="width:<?php echo $alhalqper.'%'?>" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Al-Lisan (اللِّسَانُ)<span class="float-right"><?php echo $allisanbenar.' dari '.$lcount?></span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar <?php echo bg($allisanper) ?>" role="progressbar" style="width:<?php echo $allisanper.'%'?>" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Asy-Syafatain (الشفت)<span class="float-right"><?php echo $asysyafatainbenar.' dari '.$mcount?></span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar <?php echo bg($asysyafatainper) ?>" role="progressbar" style="width:<?php echo $asysyafatainper.'%'?>" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Al-Khaisyum (الخيشوم)<span class="float-right"><?php echo $alkhaisyumbenar.' dari '.$ncount?></span></h4>
                  <div class="progress">
                    <div class="progress-bar <?php echo bg($alkhaisyumper) ?>" role="progressbar" style="width:<?php echo $alkhaisyumper.'%'?>" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Evaluasi</h6>
                </div>
                <div class="card-body text-center" style="font-size:14pt">
                  <?php if ($status['evaluasi'] == 1) { ?>
                    <div class="text-center">
                      <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 10rem;" src="<?php echo base_url('assets/img/svg/evaluasiwait.svg') ?>" alt="">
                    </div>
                    Anda sudah mengerjakan evaluasi. Silahkan menunggu penilaian dari guru Anda.
                  <?php }elseif ($status['evaluasi'] == 2) { ?>
                    <div class="text-center">
                      <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="<?php echo base_url('assets/img/svg/evaluasicompleted.svg') ?>" alt="">
                    </div>
                    Nilai Anda: <b><?php echo $evaluasi['nilai']; ?></b>
                  <?php }else{ ?>
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 10rem;" src="<?php echo base_url('assets/img/svg/evaluasibelum.svg') ?>" alt="">
                  </div>
                  Anda belum mengerjakan evaluasi
                  <?php } ?>
                </div>
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
</body>
</html>
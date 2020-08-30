<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Soal</title>
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
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('guru') ?>">
          <div class="sidebar-brand-icon">
              <img style="height: 40px" src="<?php echo base_url('assets/img/logo-fill.png') ?>">
          </div>
          <div class="sidebar-brand-text mx-1" style="font-size: 12px">
              Media Pembelajaran Makhorijul Huruf
          </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <?php if ($this->session->userdata('level') == 1) { ?>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('admin') ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Daftar Pengguna</span></a>
        </li>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('forum') ?>">
          <i class="fas fa-fw fa-comments"></i>
          <span>Forum Diskusi</span></a>
        </li>

        <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('guru/materi'); ?>">
          <i class="fas fa-fw fa-book-open"></i>
          <span>Daftar Materi</span></a>
        </li>

        <?php }else{ ?>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('guru') ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Beranda</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('guru/creative') ?>">
          <i class="fab fa-fw fa-creative-commons-sa"></i>
          <span>Creative Learning</span></a>
        </li>

        <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('guru/materi'); ?>">
          <i class="fas fa-fw fa-book-open"></i>
          <span>Daftar Materi</span></a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('guru/tugassiswa'); ?>">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Tugas Siswa</span></a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('guru/evalsiswa'); ?>">
          <i class="fas fa-fw fa-pen-alt"></i>
          <span>Evaluasi Siswa</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('forum') ?>">
          <i class="fas fa-fw fa-comments"></i>
          <span>Forum Diskusi</span></a>
        </li>

        <?php } ?>

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
                  <?php echo $this->session->userdata('nama'); ?> (Guru)
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

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col">
                  <?php if ($materi == 'Pengertian & Manfaat') { ?>
                    <h3 class="m-0 font-weight-bold text-primary">Tambah Soal <?php echo $materi.' Makhorijul Huruf'; ?></h3>
                  <?php }else if ($huruf == 'null'){ ?>
                    <h3 class="m-0 font-weight-bold text-primary">Tambah Soal <?php echo $materi ?></h3>
                  <?php }else{ ?>
                    <h3 class="m-0 font-weight-bold text-primary">Tambah Soal <?php echo $materi.' Huruf '.$huruf; ?></h3>
                  <?php } ?>
                </div>
                <div class="col-auto">
                  <span id="message" class="text-danger"><?php echo $this->session->flashdata('message'); ?></span>
                  <?php if ($materi == 'Pengertian & Manfaat') { ?>
                    <a href="<?php echo site_url('guru/soal/pengertian/null') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                  <?php }else{ ?>
                    <a href="<?php echo site_url('guru/soal/'.$materi.'/'.$huruf) ?>" class="btn btn-sm btn-secondary btn-icon-split">
                  <?php } ?>
                      <span class="icon">
                          <i class="fa fa-angle-left"></i>
                      </span>
                      <span class="text">
                        Kembali
                      </span>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <?php if ($materi == 'Pengertian & Manfaat') { ?>
                <form action="<?php echo site_url('guru/tambahsoal/pengertian/null') ?>" method="POST" enctype="multipart/form-data">
              <?php }else if ($huruf == 'null'){ ?>
                <form action="<?php echo site_url('guru/tambahsoal/'.$materi.'/null') ?>" method="POST" enctype="multipart/form-data">
              <?php }else{ ?>
                <form action="<?php echo site_url('guru/tambahsoal/'.$materi.'/'.$huruf) ?>" method="POST" enctype="multipart/form-data">
              <?php } ?>
              <form action="<?php echo site_url('') ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="tipe" id="tipe">
                <div class="row form-group">
                  <label class="col-md-2 text-md-right" for="username">Pertanyaan</label>
                  <div class="col-md-10">
                    <textarea name="pertanyaan" rows="5" class="form-control mb-2"></textarea>
                    <input type="file" name="gambarpertanyaan" class="form-control-file">
                    <small class="form-text text-muted text-left">Gambar pertanyaan dapat Anda kosongkan (opsional)</small>
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-md-2 text-md-right" for="username">Tipe Jawaban</label>
                  <div class="col-md-2">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="teks" checked>
                      <label class="form-check-label" for="inlineRadio1">Teks</label>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="gambar">
                      <label class="form-check-label" for="inlineRadio2">Gambar</label>
                    </div>
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-md-2 text-md-right" for="username">Pilihan a</label>
                  <div class="col-md-5" id="pilihan1">
                    <textarea id="teks1" name="teks1" rows="3" class="form-control"></textarea>
                  </div>
                  <div class="col-md-5">
                    <input type="file" id="gambar1" name="gambar1" class="form-control-file">
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-md-2 text-md-right" for="username">Pilihan b</label>
                  <div class="col-md-5" id="pilihan2">
                    <textarea id="teks2" name="teks2" rows="3" class="form-control"></textarea>
                  </div>
                  <div class="col-md-5">
                    <input type="file" id="gambar2" name="gambar2" class="form-control-file">
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-md-2 text-md-right" for="username">Pilihan c</label>
                  <div class="col-md-5" id="pilihan3">
                    <textarea id="teks3" name="teks3" rows="3" class="form-control"></textarea>
                  </div>
                  <div class="col-md-5">
                    <input type="file" id="gambar3" name="gambar3" class="form-control-file">
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-md-2 text-md-right" for="username">Pilihan d</label>
                  <div class="col-md-5" id="pilihan4">
                    <textarea id="teks4" name="teks4" rows="3" class="form-control"></textarea>
                  </div>
                  <div class="col-md-5">
                    <input type="file" id="gambar4" name="gambar4" class="form-control-file">
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-md-2 text-md-right" for="username">Pilihan e</label>
                  <div class="col-md-5" id="pilihan5">
                    <textarea id="teks5" name="teks5" rows="3" class="form-control"></textarea>
                  </div>
                  <div class="col-md-5">
                    <input type="file" id="gambar5" name="gambar5" class="form-control-file">
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-md-2 text-md-right" for="username">Jawaban</label>
                  <div class="col-md-5">
                    <select class="form-control" name="jawaban">
                      <option value="a" selected>Pilihan a</option>
                      <option value="b">Pilihan b</option>
                      <option value="c">Pilihan c</option>
                      <option value="d">Pilihan d</option>
                      <option value="e">Pilihan e</option>
                    </select>
                  </div>
                </div>
                <button type="submin" class="btn btn-block btn-primary">Tambah Soal</button>
              </form>
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
      for (var i = 1; i <= 5; i++) {
        document.getElementById('gambar'+i).disabled = true;
      }
      $('input[name="inlineRadioOptions"]').on('change', function(){
          if ($(this).val() == 'teks') {
            var output = '';
            for (var i = 1; i <= 5; i++) {
              document.getElementById('teks'+i).disabled = false;
              document.getElementById('gambar'+i).disabled = true;
            }
          } else  {
            for (var i = 1; i <= 5; i++) {
              document.getElementById('teks'+i).disabled = true;
              document.getElementById('gambar'+i).disabled = false;
            }
          }
      });
    </script>
</body>
</html>
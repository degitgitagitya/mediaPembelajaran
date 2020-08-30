<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Materi</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/icon.ico'); ?>">
    
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/fontfamily.css') ?>" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <style>
      .gambar {
        position: relative;
        width: 100%;
      }

      .image {
        opacity: 1;
        display: block;
        width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
        text-align: center;
      }

      .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        display: inline-block;
      }

      .gambar:hover .image {
        opacity: 0.3;
      }

      .gambar:hover .middle {
        opacity: 1;
      }

      .middle input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
      }
      </style>
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

        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('guru') ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Beranda</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('guru/creative') ?>">
          <i class="fab fa-fw fa-creative-commons-sa"></i>
          <span>Creative Learing</span></a>
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

        <!-- Nav Item - Dashboard -->
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

          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <form id="fileform" method="POST" enctype="multipart/form-data">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <div class="row">
                    <div class="col">
                      <h3 class="m-0 font-weight-bold text-primary">Sunting <?php echo $materi->nama_materi.' '.$materi->arab_materi; ?></h3>
                      <span><?php echo $this->session->flashdata('message'); ?></span>
                    </div>
                    <div class="col-auto">
                      <button type="submit" id="simpan" data-toggle="tooltip" title="Anda belum membuat perubahan apapun" class="btn btn-sm btn-success btn-icon-split" disabled>
                          <span class="icon">
                              <i class="fa fa-save"></i>
                          </span>
                          <span class="text">
                              Simpan
                          </span>
                      </button>
                      <a href="<?php echo site_url('guru/materi') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <!-- Card Body -->
                <div class="card-body">
                  <div class="row">
                    <?php if ($materi->nama_materi == 'Pengertian & Manfaat') { ?>
                    <div class="gambar col-xl-6 col-lg-6">
                      <img class="image mb-4" src="<?php echo base_url ('assets/img/materi/pengertian/'.$materi->gambar) ?>">
                      <div class="middle">
                        <span><i class="fa fa-camera fa-3x"></i></span>
                        <input type="file" id="gambar" name="gambar" onchange="tombol()">
                      </div>
                    </div>
                    <?php } ?>
                    <div class="form-group col-xl-6 col-lg-6">
                      <label>Uraian Materi</label>
                      <textarea class="form-control" name="uraian_materi" rows="5" onchange="tombol()" style="color: #212121;"><?php echo $materi->uraian_materi; ?></textarea>
                    </div>
                    <?php if ($materi->nama_materi != 'Pengertian & Manfaat') { ?>
                    <div class="form-group col-xl-6 col-lg-6">
                      <label>Tips&Trick</label>
                      <textarea class="form-control" name="tipstrik_materi" rows="5" onchange="tombol()" style="color: #212121;"><?php echo $materi->tipstrik_materi; ?></textarea>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
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

    <div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="d-flex modal-body text-center align-items-center" id="loading">
                  <i class="fa fa-spinner fa-5x fa-spin"></i>&nbsp;&nbsp;&nbsp;Sedang mengunggah...
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
      function tombol(){
        var simpan = document.getElementById('simpan');
        simpan.disabled = false;
        $('#simpan').attr('title', '');
      }

      var link = window.location.href;
      var form = document.getElementById('fileform');
      fileform.addEventListener("submit", function(event){
        event.preventDefault();
        var xhr=new XMLHttpRequest();
        xhr.onload = function(e) {
          if(this.readyState === 4) {
            console.log("Server returned: ",e.target.responseText);
          }
        };
        var fd = new FormData(form);
        xhr.open("POST","<?php echo site_url('Controller_guru/editmateri/'.$materi->id_materi); ?>",true);
        xhr.send(fd);
        if ($('#gambar').val() != ''){
          $('#loadingModal').modal('show');

          xhr.addEventListener('error', function(){
            document.getElementById('loading').innerHTML = '<i class="fa fa-times fa-5x"></i>&nbsp;&nbsp;&nbsp;Gambar gagal diunggah';
            setTimeout(function(){
              window.location.reload();
            }, 3000);
          });

          xhr.addEventListener('load', function(){
            document.getElementById('loading').innerHTML = '<i class="fa fa-check fa-5x"></i>&nbsp;&nbsp;&nbsp;Gambar berhasil terunggah';
            setTimeout(function(){
              window.location.replace(link);
            }, 3000);
          });
        }else{
          window.location.replace(link);
        }
      });
    </script>
</body>
</html>
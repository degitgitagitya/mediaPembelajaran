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
          <a class="nav-link" href="<?php echo site_url('guru/alatukur') ?>">
          <i class="fas fa-fw fa-chart-line"></i>
          <span>Aktivitas Siswa</span></a>
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
                  <h3 class="m-0 mb-2 font-weight-bold text-primary">Pengertian</h3>
                </div>
                <div class="col-auto">
                  <span id="message" class="text-danger"><?php echo $this->session->flashdata('message'); ?></span>
                  <a href="<?php echo site_url('pengertian') ?>" class="btn btn-sm btn-info btn-icon-split">
                      <span class="icon">
                          <i class="fa fa-eye"></i>
                      </span>
                      <span class="text">
                          Lihat halaman
                      </span>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" width="100%" cellspacing="0">
                  <thead class="text-center">
                    <tr>
                      <th class="align-middle" width="70%">Uraian Materi</th>
                      <th class="align-middle">Gambar</th>
                      <th class="align-middle">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $listmateri[5]->uraian_materi; ?></td>
                      <td class="align-middle text-center">
                        <?php if (isset($listmateri[5]->gambar)) { ?>
                        <a href="#" data-toggle="modal" data-target="#gambarModal" class="btn btn-info"><i class="fa fa-image"></i></a>
                        <?php } ?>
                      </td>
                      <td class="align-middle text-center">
                        <a href="<?php echo site_url('guru/edit/6') ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="modal fade" id="gambarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Pengertian</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <img width="100%" src="<?php echo base_url('assets/img/materi/pengertian/'.$listmateri[5]->gambar) ?>">
                      </div>
                      <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                      </div>
                  </div>
              </div>
            </div>

          </div>

          <?php
            foreach ($listmateri as $materi){
              if ($materi->nama_materi != 'Pengertian') {
          ?>
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="row">
                  <div class="col">
                    <h3 class="m-0 mb-2 font-weight-bold text-primary"><?php echo $materi->nama_materi.' '.$materi->arab_materi; ?></h3>
                  </div>
                  <div class="col-auto">
                    <span id="message" class="text-danger"><?php echo $this->session->flashdata('message'); ?></span>
                    <a href="<?php echo site_url ('guru/edit/'.$materi->id_materi) ?>" class="btn btn-sm btn-success btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-edit"></i>
                        </span>
                        <span class="text">
                            Sunting Deskripsi
                        </span>
                    </a>
                    <?php 
                    $no = '';
                    if ($materi->id_materi == 1) {
                      $no = 1;
                    }elseif ($materi->id_materi == 2) {
                      $no = 6;
                    }elseif ($materi->id_materi == 3) {
                      $no = 3;
                    }elseif ($materi->id_materi == 4) {
                      $no = 2;
                    }elseif ($materi->id_materi == 5) {
                      $no = 25;
                    } ?>
                    <a href="<?php echo site_url ('materi/'.$materi->id_materi.'/'.$no) ?>" class="btn btn-sm btn-info btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-eye"></i>
                        </span>
                        <span class="text">
                            Lihat halaman
                        </span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="text-justify">
                  <p><?php echo $materi->uraian_materi; ?></p>
                  <p>
                    Tips&Trick<img src="<?php echo base_url('assets/img/lamp.png') ?>" style="width: 20px; height: auto;"><br>
                    <?php echo $materi->tipstrik_materi; ?>
                  </p>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped" width="100%" cellspacing="0">
                    <thead class="text-center">
                      <tr>
                        <th class="align-middle" width="30">No</th>
                        <th class="align-middle">Nama</th>
                        <th class="align-middle">Huruf</th>
                        <th class="align-middle">Video</th>
                        <th class="align-middle">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no = 1;
                        $id = $materi->id_materi;
                        foreach ($submateri as $sub) {
                          if ($id == $sub->id_materi) {
                      ?>
                      <tr>
                        <td class="align-middle text-center"><?php echo $no; ?></td>
                        <td class="align-middle"><?php echo $sub->nama_submateri; ?></td>
                        <td class="align-middle text-center"><b><?php echo $sub->huruf_submateri; ?></b></td>
                        <td class="align-middle text-center">
                          <a href="<?php echo site_url('materi/'.$materi->id_materi.'/'.$sub->id_submateri) ?>" class="btn btn-danger"><i class="fa fa-play"></i></a>
                        </td>
                        <td class="align-middle text-center">
                          <a href="<?php echo site_url ('guru/editsub/'.$sub->id_submateri) ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                        </td>
                      </tr>
                      <?php
                          $no++; }
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          <?php
              }
            }
          ?>

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
<?php date_default_timezone_set('Asia/Jakarta'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Aktivitas Siswa</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/icon.ico'); ?>">
    
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/fontfamily.css') ?>" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/bootstrap/datepicker/css/datepicker.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
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

        <li class="nav-item active">
          <a class="nav-link" href="<?php echo site_url('guru/creative') ?>">
          <i class="fab fa-fw fa-creative-commons-sa"></i>
          <span>Creative Learning</span></a>
        </li>

        <li class="nav-item">
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

          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md">
                      <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 20rem;" src="<?php echo base_url('assets/img/svg/alatukur.svg') ?>" alt="">
                      </div>
                    </div>
                    <div class="col-md d-flex align-items-center">
                      <p>Di halaman ini Anda dapat melihat nilai <i>Creative Learning</i> masing-masing siswa. Anda juga dapat mengunduh laporan nilai <i>Creative Learning</i> seluruh siswa <a href="<?php echo site_url('Controller_guru/report') ?>" class="btn btn-success">disini</a></p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h3 class="m-0 font-weight-bold text-primary">Daftar Siswa</h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive"> 
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                      <thead class="text-center">
                        <tr>
                          <th class="align-middle" width="30">No</th>
                          <th class="align-middle" width="60">Foto</th>
                          <th class="align-middle">Nama</th>
                          <th class="align-middle">Username</th>
                          <th class="align-middle">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $no = 1;
                          foreach ($siswa as $data) {
                        ?>
                          <tr>
                            <td class="text-center align-middle"><?php echo $no; ?></td>
                            <td class="align-middle text-center">
                              <img style="width:60px;height:60px" src="<?php echo base_url('assets/img/profile/'.$data->foto_user) ?>" alt="" class="rounded-circle">
                            </td>
                            <td class="align-middle"><?php echo $data->nama_user; ?></td>
                            <td class="align-middle"><?php echo $data->username_user; ?></td>
                            <td class="text-center align-middle"><a href="<?php echo site_url('guru/aktivitassiswa/'.$data->id_user) ?>" class="btn btn-primary">Lihat Aktivitas</a></td>
                          </tr>
                        <?php $no++; } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Login Siswa</h6>
                </div>
                <div class="card-body">
                  <div class="row form-group align-items-center">
                    <label class="col-md-1">Siswa</label>
                    <div class="col-md-4 mb-2">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-fw fa-user"></i></span>
                        </div>
                        <select name="siswa" id="siswalogin" class="form-control">
                          <option value="semua" selected>Semua</option>
                          <?php foreach ($siswa as $data) { ?>
                            <option value="<?php echo $data->id_user ?>"><?php echo $data->nama_user; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <label class="col-md-1">Waktu</label>
                    <div class="col-md-4 mb-2">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-fw fa-clock"></i></span>
                        </div>
                        <select name="waktu" id="waktulogin" class="form-control">
                          <option value="hari" selected>Hari ini</option>
                          <option value="minggu">7 hari terakhir</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2 mb-2">
                      <button class="btn btn-primary btn-block" id="lihatlogin">Lihat</button>
                    </div>
                  </div>
                  <div id="chartlogin"></div>
                </div>
              </div>

              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Siswa Memutar Video Materi (Tahapan <i>Imagine</i>)</h6>
                </div>
                <div class="card-body">
                  <div class="row form-group align-items-center">
                    <label class="col-md-1">Siswa</label>
                    <div class="col-md-4 mb-2">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-fw fa-user"></i></span>
                        </div>
                        <select name="siswa" id="siswavideo" class="form-control">
                          <option value="semua" selected>Semua</option>
                          <?php foreach ($siswa as $data) { ?>
                            <option value="<?php echo $data->id_user ?>"><?php echo $data->nama_user; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <label class="col-md-1">Waktu</label>
                    <div class="col-md-4 mb-2">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-fw fa-clock"></i></span>
                        </div>
                        <select name="waktu" id="waktuvideo" class="form-control">
                          <option value="hari" selected>Hari ini</option>
                          <option value="minggu">7 hari terakhir</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2 mb-2">
                      <button class="btn btn-primary btn-block" id="lihatvideo">Lihat</button>
                    </div>
                  </div>
                  <div id="chartplayvideo"></div>
                </div>
              </div>

              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Siswa Mencoba Membuat Rekaman (Tahapan <i>Create</i>)</h6>
                </div>
                <div class="card-body">
                  <div class="row form-group align-items-center">
                    <label class="col-md-1">Siswa</label>
                    <div class="col-md-4 mb-2">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-fw fa-user"></i></span>
                        </div>
                        <select name="siswa" id="siswarekaman" class="form-control">
                          <option value="semua" selected>Semua</option>
                          <?php foreach ($siswa as $data) { ?>
                            <option value="<?php echo $data->id_user ?>"><?php echo $data->nama_user; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <label class="col-md-1">Waktu</label>
                    <div class="col-md-4 mb-2">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-fw fa-clock"></i></span>
                        </div>
                        <select name="waktu" id="wakturekaman" class="form-control">
                          <option value="hari" selected>Hari ini</option>
                          <option value="minggu">7 hari terakhir</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2 mb-2">
                      <button class="btn btn-primary btn-block" id="lihatrekaman">Lihat</button>
                    </div>
                  </div>
                  <div id="chartrekaman"></div>
                </div>
              </div>

              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Siswa Memutar Video Rekamannya Sendiri (Tahapan <i>Play</i>)</h6>
                </div>
                <div class="card-body">
                  <div class="row form-group align-items-center">
                    <label class="col-md-1">Siswa</label>
                    <div class="col-md-4 mb-2">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-fw fa-user"></i></span>
                        </div>
                        <select name="siswa" id="siswaplayrecord" class="form-control">
                          <option value="semua" selected>Semua</option>
                          <?php foreach ($siswa as $data) { ?>
                            <option value="<?php echo $data->id_user ?>"><?php echo $data->nama_user; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <label class="col-md-1">Waktu</label>
                    <div class="col-md-4 mb-2">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-fw fa-clock"></i></span>
                        </div>
                        <select name="waktu" id="waktuplayrecord" class="form-control">
                          <option value="hari" selected>Hari ini</option>
                          <option value="minggu">7 hari terakhir</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2 mb-2">
                      <button class="btn btn-primary btn-block" id="lihatplayrecord">Lihat</button>
                    </div>
                  </div>
                  <div id="chartplayrecord"></div>
                </div>
              </div>

              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Siswa Membagikan Video Rekamannya (Tahapan <i>Share</i>)</h6>
                </div>
                <div class="card-body">
                  <div class="row form-group align-items-center">
                    <label class="col-md-1">Siswa</label>
                    <div class="col-md-4 mb-2">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-fw fa-user"></i></span>
                        </div>
                        <select name="siswa" id="siswabagikan" class="form-control">
                          <option value="semua" selected>Semua</option>
                          <?php foreach ($siswa as $data) { ?>
                            <option value="<?php echo $data->id_user ?>"><?php echo $data->nama_user; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <label class="col-md-1">Waktu</label>
                    <div class="col-md-4 mb-2">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-fw fa-clock"></i></span>
                        </div>
                        <select name="waktu" id="waktubagikan" class="form-control">
                          <option value="hari" selected>Hari ini</option>
                          <option value="minggu">7 hari terakhir</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2 mb-2">
                      <button class="btn btn-primary btn-block" id="lihatbagikan">Lihat</button>
                    </div>
                  </div>
                  <div id="chartbagikan"></div>
                </div>
              </div>

              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Siswa yang Berdiskusi (Tahapan <i>Reflect</i>)</h6>
                </div>
                <div class="card-body">
                  <div class="row form-group align-items-center">
                    <label class="col-md-1">Siswa</label>
                    <div class="col-md-4 mb-2">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-fw fa-user"></i></span>
                        </div>
                        <select name="siswa" id="siswadiskusi" class="form-control">
                          <option value="semua" selected>Semua</option>
                          <?php foreach ($siswa as $data) { ?>
                            <option value="<?php echo $data->id_user ?>"><?php echo $data->nama_user; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <label class="col-md-1">Waktu</label>
                    <div class="col-md-4 mb-2">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-fw fa-clock"></i></span>
                        </div>
                        <select name="waktu" id="waktudiskusi" class="form-control">
                          <option value="hari" selected>Hari ini</option>
                          <option value="minggu">7 hari terakhir</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2 mb-2">
                      <button class="btn btn-primary btn-block" id="lihatdiskusi">Lihat</button>
                    </div>
                  </div>
                  <div id="chartdiskusi"></div>
                </div>
              </div> -->

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
    <script src="<?php echo base_url('assets/vendor/bootstrap/datepicker/js/bootstrap-datepicker.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin-2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/chart.js/Chart.min.js') ?>"></script>
    <script>
      $(document).ready(function(){
        $('#dataTable').DataTable();

        function load_chart(siswa, waktu, tipe) {
          $.ajax({
            url:"<?php echo site_url('Controller_guru/chart') ?>",
            method:"POST",
            data:{siswa:siswa, waktu:waktu, tipe:tipe},
            cache: false,
            success:function(data){
              $('#chart'+tipe).html(data);
            }
          });
        }

        load_chart('semua', 'hari', 'login');

        $('#lihatlogin').click(function(event){
          event.preventDefault();
          var select1 = document.getElementById('siswalogin').value;
          var select2 = document.getElementById('waktulogin').value;
          load_chart(select1, select2, 'login');
        });

        load_chart('semua', 'hari', 'playvideo');

        $('#lihatvideo').click(function(event){
          event.preventDefault();
          var select1 = document.getElementById('siswavideo').value;
          var select2 = document.getElementById('waktuvideo').value;
          load_chart(select1, select2, 'playvideo');
        });

        load_chart('semua', 'hari', 'rekaman');

        $('#lihatrekaman').click(function(event){
          event.preventDefault();
          var select1 = document.getElementById('siswarekaman').value;
          var select2 = document.getElementById('wakturekaman').value;
          load_chart(select1, select2, 'rekaman');
        });

        load_chart('semua', 'hari', 'playrecord');

        $('#lihatplayrecord').click(function(event){
          event.preventDefault();
          var select1 = document.getElementById('siswaplayrecord').value;
          var select2 = document.getElementById('waktuplayrecord').value;
          load_chart(select1, select2, 'playrecord');
        });

        load_chart('semua', 'hari', 'bagikan');

        $('#lihatbagikan').click(function(event){
          event.preventDefault();
          var select1 = document.getElementById('siswabagikan').value;
          var select2 = document.getElementById('waktubagikan').value;
          load_chart(select1, select2, 'bagikan');
        });

        load_chart('semua', 'hari', 'diskusi');

        $('#lihatdiskusi').click(function(event){
          event.preventDefault();
          var select1 = document.getElementById('siswadiskusi').value;
          var select2 = document.getElementById('waktudiskusi').value;
          load_chart(select1, select2, 'diskusi');
        });

      });
    </script>
</body>
</html>
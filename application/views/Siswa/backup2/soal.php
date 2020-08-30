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

            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <?php if ($materi == 'Pengertian & Manfaat') { ?>
                    <h3 class="m-0 font-weight-bold text-primary">Soal <?php echo $materi.' Makhorijul Huruf'; ?></h3>
                  <?php }else{ ?>
                    <h3 class="m-0 font-weight-bold text-primary">Soal <?php echo $materi.' Huruf '.$huruf; ?></h3>
                  <?php } ?>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  Jawaban Anda akan otomatis terkirim jika Anda meninggalkan halaman ini.<br><br>
                  <div class="table-responsive">
                    <form action="<?php echo site_url('simpanjawaban') ?>" method="POST">
                      <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                              <th class="text-center">No</th>
                              <th class="text-center" colspan="5">Pertanyaan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $j = 1; $k = 1;
                          foreach ($soal as $key) { ?>
                            <tr>
                                <td class="text-center" rowspan="2" width="30"><?php echo $j ?></td>
                                <th colspan="5" class="text-left"><?php echo $key->pertanyaan ?></th>
                            </tr>
                            <tr>
                              <input type="hidden" name="jawaban[<?php echo $j - 1 ?>][id]" value="<?php echo $key->id ?>">
                              <input type="hidden" name="jawaban[<?php echo $j - 1 ?>][materi]" value="<?php echo $key->materi ?>">
                              <?php if (isset($key->huruf)) { ?>
                                <input type="hidden" name="jawaban[<?php echo $j - 1 ?>][huruf]" value="<?php echo $key->huruf ?>">
                              <?php }else{ ?>
                                <input type="hidden" name="jawaban[<?php echo $j - 1 ?>][huruf]" value="">
                              <?php } ?>
                              <td width="250">
                                <input type="hidden" name="jawaban[<?php echo $j - 1 ?>][<?php echo $key->id ?>]" class="form-check-input position-static" value="tidak menjawab">
                                <div class="custom-control custom-radio">
                                  <input type="radio" class="custom-control-input" id="customRadio<?php echo $key->id ?><?php echo $k ?>" name="jawaban[<?php echo $j - 1 ?>][<?php echo $key->id ?>]" value="a">
                                  <label class="custom-control-label" for="customRadio<?php echo $key->id ?><?php echo $k; $k++; ?>"><?php echo $key->p1 ?></label>
                                </div>
                              </td>
                              <td width="250">
                                <div class="custom-control custom-radio">
                                  <input type="radio" class="custom-control-input" id="customRadio<?php echo $key->id ?><?php echo $k ?>" name="jawaban[<?php echo $j - 1 ?>][<?php echo $key->id ?>]" value="b">
                                  <label class="custom-control-label" for="customRadio<?php echo $key->id ?><?php echo $k; $k++; ?>"><?php echo $key->p2 ?></label>
                                </div>
                              </td>
                              <td width="250">
                                <div class="custom-control custom-radio">
                                  <input type="radio" class="custom-control-input" id="customRadio<?php echo $key->id ?><?php echo $k ?>" name="jawaban[<?php echo $j - 1 ?>][<?php echo $key->id ?>]" value="c">
                                  <label class="custom-control-label" for="customRadio<?php echo $key->id ?><?php echo $k; $k++; ?>"><?php echo $key->p3 ?></label>
                                </div>
                              </td>
                              <td width="250">
                                <div class="custom-control custom-radio">
                                  <input type="radio" class="custom-control-input" id="customRadio<?php echo $key->id ?><?php echo $k ?>" name="jawaban[<?php echo $j - 1 ?>][<?php echo $key->id ?>]" value="d">
                                  <label class="custom-control-label" for="customRadio<?php echo $key->id ?><?php echo $k; $k++; ?>"><?php echo $key->p4 ?></label>
                                </div>
                              </td>
                              <td width="250">
                                <div class="custom-control custom-radio">
                                  <input type="radio" class="custom-control-input" id="customRadio<?php echo $key->id ?><?php echo $k ?>" name="jawaban[<?php echo $j - 1 ?>][<?php echo $key->id ?>]" value="e">
                                  <label class="custom-control-label" for="customRadio<?php echo $key->id ?><?php echo $k; $k++; ?>"><?php echo $key->p5 ?></label>
                                </div>
                              </td>
                            </tr>
                            <?php $j++;
                          } ?>
                        </tbody>
                      </table>
                      <input type="submit" class="btn btn-primary btn-block" value="Kirim">
                    </form>
                  </div>
                </div>
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
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
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
      $(document).ready(function(){
        window.onbeforeunload = function(){
          
        };
      });
    </script>
</body>
</html>
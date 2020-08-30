<?php
date_default_timezone_set('Asia/Jakarta');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Kiriman yang Dilaporkan</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/icon.ico'); ?>">
    
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/fontfamily.css') ?>" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">

    <!-- Animasi Loading Post -->
    <style type="text/css">
    @-webkit-keyframes placeHolderShimmer {
        0% {
          background-position: -468px 0;
        }
        100% {
          background-position: 468px 0;
        }
      }

      @keyframes placeHolderShimmer {
        0% {
          background-position: -468px 0;
        }
        100% {
          background-position: 468px 0;
        }
      }

      .content-placeholder {
        display: inline-block;
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-fill-mode: forwards;
        animation-fill-mode: forwards;
        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite;
        -webkit-animation-name: placeHolderShimmer;
        animation-name: placeHolderShimmer;
        -webkit-animation-timing-function: linear;
        animation-timing-function: linear;
        background: #f6f7f8;
        background: -webkit-gradient(linear, left top, right top, color-stop(8%, #eeeeee), color-stop(18%, #dddddd), color-stop(33%, #eeeeee));
        background: -webkit-linear-gradient(left, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
        background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
        -webkit-background-size: 800px 104px;
        background-size: 800px 104px;
        height: inherit;
        position: relative;
      }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="
          <?php
            if ($this->session->userdata('level') == 1){
              echo site_url('admin');
            }elseif ($this->session->userdata('level') == 2){
              echo site_url('guru');
            }else{
              echo site_url('siswa');
            }
          ?>
        ">
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
          <a class="nav-link" href="<?php echo site_url('admin') ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Daftar Pengguna</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('admin/alatukur') ?>">
          <i class="fas fa-fw fa-chart-line"></i>
          <span>Aktivitas Pengguna</span></a>
        </li>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('forum') ?>">
          <i class="fas fa-fw fa-comments"></i>
          <span>Forum Diskusi</span></a>
        </li>

        <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('admin/dilaporkan'); ?>">
          <i class="fas fa-fw fa-envelope"></i>
          <span>Kiriman yang Dilaporkan</span></a>
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
                  <?php
                    if ($this->session->userdata('level') == 1) {
                      echo "Admin";
                    }elseif ($this->session->userdata('level') == 2){
                      echo $this->session->userdata('nama') . " (Guru)";
                    }else{
                      echo $this->session->userdata('nama');
                    }
                  ?>
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

          <div id="load_data"></div>
          <div id="load_data_message"></div>

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
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.sticky.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin-2.min.js') ?>"></script>

    <script>
    $(document).ready(function(){
      var batas = 0; // untuk posting baru
      var limit = 5;
      var start = 0;
      var action = 'inactive';

      lazzy_loader();

      function lazzy_loader(){
        var output = '';
        for(var count = 0; count < 2; count++){
output += '<div class="row">';
output +=  '<div class="col-xl-8 col-lg-7">';
output +=    '<div class="card shadow mb-4">';
output +=      '<div class="card-header py-3 d-flex flex-row align-items-center';
output +=      'justify-content-between bg-white">';
output +=        '<table>';
output +=          '<tbody>';
output +=            '<tr>';
output +=              '<td rowspan="2" style="width: 50px; padding-right: 10px">';
output +=                '<span class="content-placeholder" style="border-radius: 100%; width:';
output +=                '50px; height: 50px"></span>';
output +=              '</td>';
output +=              '<td>';
output +=              '<h6 class="m-0 font-weight-bold text-primary">Sedang memuat,'
output +=              ' tunggu sebentar...</h6>';
output +=              '</td>';
output +=            '</tr>';
output +=            '<tr>';
output +=              '<td>';
output +=                 '<span class="content-placeholder" style="width: 50px; height: 10px">';
output +=                 '</span>';
output +=              '</td>';
output +=             '<tr>';
output +=          '</tbody>';
output +=        '</table>';
output +=      '</div>';
output +=      '<div class="card-body">';
output +=        '<p><span class="content-placeholder" style="width: 50%; height: 12px"></span>';
output +=        '</p>';
output +=      '</div>';
output +=    '</div>';
output +=  '</div>';
output +='</div>';
}
        $('#load_data_message').html(output);
      }

      function load_data(limit, start){
        $.ajax({
          url:"<?php echo site_url('Controller_admin/load_data')?>",
          method:"POST",
          data:{limit:limit, start:start},
          cache: false,
          success:function(data){
            if(data == ''){
              $('#load_data_message').html("");
              action = 'active';
            }else{
              $('#load_data').append(data).show();
              $('#load_data_message').html("");
              action = 'inactive';
            }
          }
        })
      }

      if(action == 'inactive'){
        action = 'active';
        load_data(limit, start);
      }

      $(window).scroll(function(){
        if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
        {
          lazzy_loader();
          action = 'active';
          start = start + limit;
          setTimeout(function(){
            load_data(limit, start);
          }, 2000);
        }
      });

    });

    $(window).on('load',function(){
      $("#notif").sticky({ topSpacing: 10, bottomSpacing: 100 });
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
          $('#notif').fadeIn();
        }else{
          $('#notif').fadeOut();
        }
    });
    </script>
</body>
</html>
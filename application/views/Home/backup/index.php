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
    <title>Forum Diskusi</title>
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
          <a class="nav-link" href="
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
          <?php if ($this->session->userdata('level') == 1) { ?>
            <i class="fas fa-fw fa-users"></i>
            <span>Daftar Pengguna</span></a>
          <?php }else{ ?>
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
          <?php } ?>
        </li>

        <?php
          if ($this->session->userdata('level') == 3) { ?>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('creative') ?>">
            <i class="fab fa-fw fa-creative-commons-sa"></i>
            <span>Creative Learning</span></a>
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
        <a class="nav-link" href="<?php echo site_url('pengertian'); ?>">
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
          <a class="nav-link" href="<?php echo site_url('tugas');?>">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Tugas</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('evaluasi');?>">
            <i class="fas fa-fw fa-pen-alt"></i>
            <span>Evaluasi</span></a>
        </li>

        <hr class="sidebar-divider my-0">

        <li class="nav-item active">
          <a class="nav-link" href="<?php echo site_url('forum') ?>">
            <i class="fas fa-fw fa-comments"></i>
            <span>Forum Diskusi</span></a>
        </li>

        <?php
          }elseif ($this->session->userdata('level') == 2) { ?>

          <li class="nav-item">
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

          <li class="nav-item active">
            <a class="nav-link" href="<?php echo site_url('forum') ?>">
              <i class="fas fa-fw fa-comments"></i>
              <span>Forum Diskusi</span></a>
          </li>
        <?php
          }else{
        ?>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('admin/alatukur') ?>">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Aktivitas Pengguna</span></a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="<?php echo site_url('forum') ?>">
              <i class="fas fa-fw fa-comments"></i>
              <span>Forum Diskusi</span></a>
          </li>

          <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('admin/dilaporkan'); ?>">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Kiriman yang Dilaporkan</span></a>
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

          <!-- Content Row -->

          <div class="row">
            <div class="col-12 d-lg-none" style="z-index:99" id="xs">
              <div class="card shadow mb-4 bg-light" id="cardnotifxs">
                <a href="#" class="text-decoration-none" id="notifxs">
                  <div class="card-body text-dark" id="jumlahnotifxs">
                    Terdapat 0 kiriman baru. Klik disini untuk memuat.
                  </div>
                </a>
              </div>
            </div>

            <!-- Area Tulis Posting -->
            <div class="col-xl-8 col-lg-7" style="z-index:0">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Buat diskusi</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="text-center">
                    <form id="posting_form" method="POST">
                      <div class="form-group">
                        <input type="hidden" name="username" value="<?php echo $this->session->userdata('username') ?>">
                        <input type="hidden" name="nama" value="<?php echo $this->session->userdata('nama') ?>">
                        <textarea autocomplete="off" class="form-control-plaintext" placeholder="Tulis bahan diskusi" name="isi" id="isi" style="resize: none;"></textarea>
                        <hr>
                        <div style="display: none;" id="validasi" class="text-danger mb-2">Kiriman tidak boleh kosong</div>
                        <button type="submit" id="submit" class="btn btn-primary btn-block">Kirim</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <div id="display_posting"></div>
              <div id="load_data"></div>
              <div id="load_data_message"></div>
            </div>

            <!-- Area Kanan -->
            <div class="col-xl-4 col-lg-5 d-none d-lg-block">
              <div id="kanan">
                <div class="card shadow mb-4" id="cardnotif">
                  <a href="#" class="text-decoration-none" id="notif">
                    <div class="card-body text-dark" id="jumlahnotif">
                      Terdapat 0 kiriman baru. Klik disini untuk memuat.
                    </div>
                  </a>
                </div>
                <?php if ($profile[0]->forum_check == 0) { ?>
                <div class="card shadow mb-4" id="penjelasan">
                  <!-- Card Header - Dropdown -->
                  <div class="card-body text-justify">
                    <div class="text-center">
                      <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 20rem;" src="<?php echo base_url('assets/img/svg/timeline.svg') ?>" alt="">
                    </div>
                    Dalam halaman ini Anda dapat membuat kiriman berupa bahan diskusi, berinteraksi dengan guru dan atau siswa lainnya, menyunting serta menghapus kiriman Anda, lalu Anda juga dapat melaporkan kiriman atau komentar apabila dirasa perlu.<br>
                    <div class="text-center">
                    <a href="#" id="sembunyi" class="text-decoration-none">Sembunyikan</a> | 
                    <a href="#" id="jangantampil" class="text-decoration-none">Jangan tampilkan lagi</a>
                    </div>
                  </div>
                </div>
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
    <!-- <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a> -->

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
      $('#cardnotif').hide();
      $('#cardnotifxs').hide();
      var batas = 0; // untuk posting baru
      var limit = 5; // limit memuat post lama
      var start = 0; // 
      var baru = 0; // jumlah post baru
      var tmp = 0;
      var action = 'inactive';

      setInterval(function(){
        $.ajax({
          url:"<?php echo site_url('Controller_home/hitungpostbaru') ?>",
          method:"POST",
          data:{postlama:<?php echo $jumlah->hasil; ?>+batas},
          dataType:"JSON",
          success:function(data){
            if (data.error == '') {
              baru = data.jumlah;
              if (tmp != baru) {
                start = start + baru;
              }
              if (baru > 0) {
                tmp = baru;
                document.getElementById('jumlahnotif').innerHTML = "Terdapat "+baru+" kiriman baru. Klik disini untuk memuat.";
                document.getElementById('jumlahnotifxs').innerHTML = "Terdapat "+baru+" kiriman baru. Klik disini untuk memuat.";
                $('#cardnotif').fadeIn();
                $('#cardnotifxs').fadeIn();
                $('#xs').fadeIn();
              }
            }
          }
        })
      }, 10000);

      $('#notif').click(function(event){
        event.preventDefault();
        batas = batas + baru;
        document.getElementById('jumlahnotif').innerHTML = "Terdapat 0 kiriman baru. Klik disini untuk memuat.";
        load_posting(batas,0);
        $('#cardnotif').fadeOut();

        var hash = $('#display_posting').hash;
        $('html, body').animate({
          scrollTop: 0
        }, 800, function(){
          window.location.hash = 0;
        });
      });

      $('#notifxs').click(function(event){
        event.preventDefault();
        batas = batas + baru;
        document.getElementById('jumlahnotifxs').innerHTML = "Terdapat 0 kiriman baru. Klik disini untuk memuat.";
        load_posting(batas,0);
        $('#cardnotifxs').fadeOut();
        $('#xs').hide();

        $('html, body').animate({
          scrollTop: 0
        }, 800, function(){
          window.location.hash = 0;
        });
      });

      $('#posting_form').on('submit', function(event){
        event.preventDefault();
        var isi = $('#isi').val();
        if ($.trim(isi) != '') {
          var form_data = $(this).serialize();
          $.ajax({
           url:"<?php echo site_url('Controller_home/posting') ?>",
           method:"POST",
           data:form_data,
           dataType:"JSON",
           success:function(data){
            if (data.error == ''){
              batas++;
              $('#posting_form')[0].reset();
              alert('Postingan berhasil dikirim');
              load_posting(batas, 0);
            }
           }
          })
        }else{
          $('#posting_form')[0].reset();
          $('#validasi').fadeIn('slow');
          setTimeout(function(){
            $('#validasi').fadeOut('slow');
          }, 2000);
        }
      });

      function load_posting(limit, start){
        $.ajax({
         url:"<?php echo site_url('Controller_home/load_data') ?>",
         method:"POST",
         data:{limit:limit, start:start},
         cache: false,
         success:function(data){
          $('#display_posting').html(data);
         }
        });
      }

      lazzy_loader();

      function lazzy_loader(){
        var output = '';
        for(var count = 0; count < 2; count++){
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
}
        $('#load_data_message').html(output);
      }

      function load_data(limit, start){
        $.ajax({
          url:"<?php echo site_url('Controller_home/load_data')?>",
          method:"POST",
          data:{limit:limit, start:start},
          cache: false,
          success:function(data){
            if(data == ''){
              $('#load_data_message').html("");
              action = 'active';
            }else{
              $('#load_data').append(data);
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
        if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive'){
          lazzy_loader();
          action = 'active';
          start = start + limit;
          setTimeout(function(){
            load_data(limit, start);
          }, 2000);
        }

        if ($(window).scrollTop() > 200) {
          $("#cardnotifxs").sticky({topSpacing: 10});
        }else{
          $("#cardnotifxs").unstick();
        }
      });

    });

    $(window).on('load',function(){
      $("#kanan").sticky({topSpacing: 10, bottomSpacing: 100 });
    });

    $('#sembunyi').click(function(event){
      event.preventDefault();
      $('#penjelasan').fadeOut('slow');
    });

    $('#jangantampil').click(function(event) {
      event.preventDefault();
      $.ajax({
       url:"<?php echo site_url('Controller_home/jangantampil/forum_check') ?>",
       method:"POST",
       data:{id:<?php echo $this->session->userdata('id'); ?>},
       dataType:"JSON",
       success:function(data){
        if (data.error == ''){
          $('#penjelasan').fadeOut('slow');
        }else{
          alert(data.error);
        }
       }
      });
    });
    </script>
</body>
</html>
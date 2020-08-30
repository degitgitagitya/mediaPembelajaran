<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Beranda</title>
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

        <?php
          if ($this->session->userdata('level') == 3) {
        ?>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo site_url('siswa'); ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
        </li>

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
        <a class="nav-link" href="<?php echo site_url('pengertian');?>">
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

      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('forum') ?>">
        <i class="fas fa-fw fa-comments"></i>
        <span>Forum Diskusi</span></a>
      </li>

      <?php
        }elseif ($this->session->userdata('level') == 2) { ?>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo site_url('guru') ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
          </li>

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

          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('forum') ?>">
            <i class="fas fa-fw fa-comments"></i>
            <span>Forum Diskusi</span></a>
          </li>
      <?php
        }
      ?>

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
          <button id="sidebarToggleTop" data-toggle="tooltip" data-placement="bottom" title="Coba aja diklik" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-lg-inline text-gray-600 small">
                  <?php
                    if ($this->session->userdata('level') == 2){
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

          <div class="row">

            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h3 class="m-0 font-weight-bold text-primary">Selamat datang <?php echo $profile[0]->nama_user; ?></h3>
                </div>
                <!-- Card Body -->
                <div class="card-body text-justify" style="font-size: 14pt">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 20rem;" src="<?php echo base_url('assets/img/svg/beranda.svg') ?>" alt="">
                  </div>
                  <p>Media Pembelajaran Makhorijul Huruf (MPMH) adalah media pembelajaran berbasis web dengan menggunakan metode <i>Creative Learning</i> yang memuat materi pengertian dan macam-macam Makhorijul Huruf, lengkap dengan cara pengucapannya berupa video. Semoga dengan adanya media ini, dapat membantu siswa meningkatkan kualitas belajar khususnya dalam materi Makhorijul Huruf.</p><br>
                  <p>Tahap pembelajarannya adalah sebagai berikut:<br></p>
                  <p>1. Tahap <i>imagine</i>:<br>
                  Setelah login, silahkan menuju halaman Pengertian & Manfaat untuk memahami dasar materi makhorijul huruf. Setelah membaca materi tersebut, silahkan mengerjakan soal evaluasi pada halaman bawah tersebut dengan mengklik tombol kerjakan soal.<br>
                  Kemudian klik menu macam-macam dan silahkan memilih materi makhorijul huruf yang terdiri dari 5 macam. Setelah berapa pada halaman tersebut, silahkan menonton video materi huruf dan kemudian mengerjakan soal evaluasi pada halaman bawah.
                  </p>
                  <p>2. Tahap <i>create</i>:<br>
                  Setelah memahami materi dan evaluasi pada huruf, silahkan menuju menu <b>Tugas</b>, kemudian mengklik ikon rekam video untuk melakukan perekaman tugas video pada huruf tersebut.<br>
                  </p>
                  <p>3. Tahap <i>play</i>:<br>
                  Setelah melakukan rekaman, siswa dapat memainkan video rekamannya untuk mengecek hasil rekaman video nya pada bagian bawah halaman. Siswa akan menilai hasil rekamannya sebagai penilaian diri pada huruf tersebut pada saat pengumpulan tugas. Setelah melakukan penilaian, video tugas akan dinilai oleh guru. Apabila tugas tersebut sudah benar, maka video tugas akan otomatis dibagikan pada forum diskusi.
                  </p>
                  <p>4. Tahap <i>share</i>:<br>
                  Pada halaman forum diskusi, siswa dapat menilai video tugas huruf milik temannya. Cara menilai video tugas pada forum diskusi ialah dengan klik beri nilai kemudian mengisi aspek penilaian. Kolom komentar juga terdapat pada forum diskusi untuk memberi kritik dan saran terhadap video tugas teman sebaya.<br>
                  </p>
                  <p>5. Tahap <i>reflect</i>:<br>
                  Tahap ini merupakan penilaian guru terhadap video tugas siswa. Guru mendapatkan rekomendasi penilaian video berdasarkan penilaian siswa pada tahap <i>share</i>. Pada tahap ini guru dapat menyarankan perbaikan berupa teks naratif maupun rekaman video.<br>
                  </p>
                  <p>6. Evaluasi:<br>
                  Setelah siswa menyelesaikan seluruh tugas rekaman video, maka yang selanjutnya adalah menuju menu evaluasi. Evaluasi dalam media pembelajaran ini berupa membuat rekaman Anda membaca surah Al-Fatihah. Apabila Anda telah menyelesaikan dan benar dalam pengucapan semua tugas Makhorijul Huruf, Anda dapat mulai melakukan evaluasi dengan mencentang form dibawah dan klik tombol rekam.<br>
                  </p>
                  <p class="text-left">Terimakasih, <br>Tim Penelitian Skripsi Makhorijul Huruf</p>
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
      <?php if ($profile[0]->sidebar_check == 0) { ?>
        $('#sidebarToggleTop').tooltip('show');
        $('#sidebarToggleTop').click(function(event){
          event.preventDefault();
          $.ajax({
           url:"<?php echo site_url('Controller_home/jangantampil/sidebar_check') ?>",
           method:"POST",
           data:{id:<?php echo $this->session->userdata('id'); ?>},
           dataType:"JSON",
           success:function(data){
            if (data.error == ''){
              $('#sidebarToggleTop').tooltip('hide');
            }else{
              alert(data.error);
            }
           }
          });
        });
      <?php } ?>
      
      var timer;
      var timerStart;
      var timeBeranda = getTimeBeranda();

      function getTimeBeranda(){
          timeBeranda = parseInt(localStorage.getItem('timeBeranda'));
          timeBeranda = isNaN(timeBeranda) ? 0 : timeBeranda;
          return timeBeranda;
      }

      function startCounting(){
          timerStart = Date.now();
          timer = setInterval(function(){
              timeBeranda = getTimeBeranda()+(Date.now()-timerStart);
              localStorage.setItem('timeBeranda',timeBeranda);
              timerStart = parseInt(Date.now());
              // Convert to seconds
              console.log(parseInt(timeBeranda/1000));
          },1000);
      }

      startCounting();

      window.addEventListener('beforeunload', function(e) {
        localStorage.removeItem('timeBeranda');
      });
    </script>
</body>
</html>
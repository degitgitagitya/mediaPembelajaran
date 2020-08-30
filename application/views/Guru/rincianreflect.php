<?php
function tanggal_indo($tanggal, $cetak_hari = false){
  $hari = array ( 1 =>    'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
      );
      
  $bulan = array (1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
  $split    = explode('-', $tanggal);
  $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
  
  if ($cetak_hari) {
    $num = date('N', strtotime($tanggal));
    return $hari[$num] . ', ' . $tgl_indo;
  }
  return $tgl_indo;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Rincian Tahap Reflect <?php echo $siswa->nama_user; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/icon.ico'); ?>">
    
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/fontfamily.css') ?>" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
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
                <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h3 class="m-0 font-weight-bold text-primary">Rincian Tahap <i>Reflect</i> <?php echo $siswa->nama_user; ?></h3>
                  </div>
                  <div class="col-auto">
                    <a href="<?php echo site_url('guru/aktivitassiswa/'.$siswa->id_user) ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <div class="card-body text-justify">
                  Pada halaman ini Anda dapat memberikan nilai tahap <i>Reflect</i> untuk siswa berdasarkan video rekaman yang sudah dibagikan oleh siswa ke forum, silahkan lihat tabel ranking dibawah untuk dijadikan bahan pertimbangan Anda dalam menilai. Tabel ranking dibawah mengurutkan berdasarkan <b>nilai akhir</b> video rekaman siswa yang telah dihitung oleh sistem secara <i>default</i>, Anda dapat mengurutkannya berdasarkan kolom yang Anda pilih.
                </div>
              </div>

              <div class="card shadow mb-4">
                <div class="card-header">
                  <h3 class="m-0 font-weight-bold text-primary">Ranking Video Rekaman Huruf <?php echo $nama_sub; ?> Siswa</h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr class="text-center">
                          <th class="align-middle">Ranking</th>
                          <th class="align-middle">Nama</th>
                          <th class="align-middle">Nilai Akhir</th>
                          <th class="align-middle">Jumlah Video</th>
                          <th class="align-middle">Jumlah Penilai</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $no = 1;
                          foreach ($ranking as $datrank) {
                        ?>
                        <tr>
                          <td class="text-center align-middle"><?php echo $no; $no++; ?></td>
                          <td class="align-middle text-center"><?php echo $datrank->nama_user; ?></td>
                          <td class="align-middle text-center">
                            <?php 
                              if ($datrank->nilai_akhir == 0) {
                                echo "Belum terlewati";
                              }elseif ($datrank->nilai_akhir > 0 && $datrank->nilai_akhir <= 1) {
                                echo "Kurang";
                              }elseif ($datrank->nilai_akhir > 1 && $datrank->nilai_akhir <= 2) {
                                echo "Cukup";
                              }elseif ($datrank->nilai_akhir > 2 && $datrank->nilai_akhir <= 3) {
                                echo "Bagus";
                              }elseif ($datrank->nilai_akhir > 3 && $datrank->nilai_akhir <= 4) {
                                echo "Sangat Bagus";
                              }
                            ?>
                          </td>
                          <td class="align-middle text-center"><?php echo $datrank->jumlah_video; ?></td>
                          <td class="align-middle text-center"><?php echo $datrank->jumlah_penilai; ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h3 class="m-0 font-weight-bold text-primary">Daftar Post</h3>
                </div>
                <div class="card-body">
                  <p class="text-justify"><b>Nilai tahap <i>reflect</i> siswa akan muncul pada halaman Aktivitas siswa jika Anda sudah menilai satu atau semua video rekaman yang ada dibawah.</b> Jangan khawatir apabila Anda salah melakukan dalam penilaian karna Anda dapat memberikan penilaian ulang setelah Anda menilai video rekaman.</p>
                  <?php foreach ($forum as $datforum) { ?>
                    <div class="row">
                      <div class="col-xl-6">
                        <video style="width: 100%; height: auto;" controls>
                          <source src="<?php echo base_url('uploads/home/'.$datforum->video) ?>" type="video/webm">
                        </video>
                        <?php 
                          $tanggal = date("Y-m-d", strtotime($datforum->waktu_posting));
                          echo tanggal_indo($tanggal, true) . ' pukul ' . date("H.i", strtotime($datforum->waktu_posting)) ?>
                      </div>
                      <div class="col-xl-6" style="height:300px;overflow-y:auto;">
                          <table class="table table-striped">
                            <thead>
                              <tr class="text-center">
                                <th class="align-middle">No</th>
                                <th class="align-middle">Penilai</th>
                                <th class="align-middle">Tempat keluarnya huruf</th>
                                <th class="align-middle">Sifat</th>
                                <th class="align-middle">Suara</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                              $no = 1;
                              foreach ($share as $datshare) {
                                if ($datshare->id_posting == $datforum->id_posting) {
                            ?>
                              <tr>
                                <td class="text-center align-middle"><?php echo $no; $no++ ?></td>
                                <td class="align-middle"><?php echo $datshare->nama_user; ?></td>
                                <td class="text-center align-middle">
                                  <?php
                                    if ($datshare->tempat == 1) {
                                      echo "Kurang";
                                    }elseif ($datshare->tempat == 2) {
                                      echo "Cukup";
                                    }elseif ($datshare->tempat == 3) {
                                      echo "Bagus";
                                    }elseif ($datshare->tempat == 4) {
                                      echo "Sangat Bagus";
                                    }
                                   ?>
                                </td>
                                <td class="text-center align-middle">
                                  <?php
                                    if ($datshare->sifat == 1) {
                                      echo "Kurang";
                                    }elseif ($datshare->sifat == 2) {
                                      echo "Cukup";
                                    }elseif ($datshare->sifat == 3) {
                                      echo "Bagus";
                                    }elseif ($datshare->sifat == 4) {
                                      echo "Sangat Bagus";
                                    }
                                   ?>
                                </td>
                                <td class="text-center align-middle">
                                  <?php
                                    if ($datshare->suara == 1) {
                                      echo "Kurang";
                                    }elseif ($datshare->suara == 2) {
                                      echo "Cukup";
                                    }elseif ($datshare->suara == 3) {
                                      echo "Bagus";
                                    }elseif ($datshare->suara == 4) {
                                      echo "Sangat Bagus";
                                    }
                                   ?>
                                </td>
                              </tr>
                            <?php 
                                }
                              }
                            ?>
                            </tbody>
                          </table>
                      </div>
                    </div>
                    <button id="berinilai<?php echo $datforum->id_posting ?>" class=" btn btn-block btn-info mb-2">Beri Nilai</button>
                    <div id="penilaian<?php echo $datforum->id_posting ?>">
                      <div class="row">
                        <div class="col-4 text-center">
                          Tempat keluarnya huruf
                        </div>
                        <div class="col-4 text-center">
                          Sifat
                        </div>
                        <div class="col-4 text-center">
                          Suara
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4 text-center">
                          <select class="form-control" id="tempat<?php echo $datforum->id_posting ?>">
                            <option value="1">Kurang</option>
                            <option value="2">Cukup</option>
                            <option value="3">Bagus</option>
                            <option value="4">Sangat Bagus</option>
                          </select>
                        </div>
                        <div class="col-4 text-center">
                          <select class="form-control" id="sifat<?php echo $datforum->id_posting ?>">
                            <option value="1">Kurang</option>
                            <option value="2">Cukup</option>
                            <option value="3">Bagus</option>
                            <option value="4">Sangat Bagus</option>
                          </select>
                        </div>
                        <div class="col-4 text-center">
                          <select class="form-control" id="suara<?php echo $datforum->id_posting ?>">
                            <option value="1">Kurang</option>
                            <option value="2">Cukup</option>
                            <option value="3">Bagus</option>
                            <option value="4">Sangat Bagus</option>
                          </select>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-12 text-center">
                          Tulis saran Anda pada kolom dibawah ini
                          <textarea class="form-control" rows="3" id="saran<?php echo $datforum->id_posting ?>" placeholder="(Saran ini dapat Anda kosongkan)"></textarea>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-6">
                          <button id="submitnilai<?php echo $datforum->id_posting ?>" class="btn btn-block btn-success">Nilai</button>
                        </div>
                        <div class="col-6">
                          <button id="tutupnilai<?php echo $datforum->id_posting ?>" class="btn btn-block btn-secondary">Tutup</button>
                        </div>
                      </div>
                    </div>
                    <hr>
                  <?php } ?>
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
    <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
    <script>
      $(document).ready(function() {
        $('#dataTable').DataTable();

        <?php foreach ($forum as $datforum) { ?>

          $.ajax({
            url:"<?php echo site_url('Controller_guru/statusnilaireflect') ?>",
            method:"POST",
            data:{id_posting:<?php echo $datforum->id_posting?>},
            cache: false,
            dataType: "JSON",
            success:function(data){
              document.getElementById('tempat<?php echo $datforum->id_posting ?>').value = data.tempat;
              document.getElementById('sifat<?php echo $datforum->id_posting ?>').value = data.sifat;
              document.getElementById('suara<?php echo $datforum->id_posting ?>').value = data.suara;
              document.getElementById('saran<?php echo $datforum->id_posting ?>').value = data.saran;
              $('#berinilai<?php echo $datforum->id_posting ?>').html('Nilai ulang');
              $('#submitnilai<?php echo $datforum->id_posting ?>').html('Nilai ulang');
            }
          });

          $('#penilaian<?php echo $datforum->id_posting ?>').hide();

          $('#berinilai<?php echo $datforum->id_posting ?>').on('click', function(event){
            event.preventDefault();
            $('#penilaian<?php echo $datforum->id_posting ?>').show(100);
            $('#berinilai<?php echo $datforum->id_posting ?>').hide(100);
          });

          $('#submitnilai<?php echo $datforum->id_posting ?>').on('click', function(event) {
            event.preventDefault();
            var konfirmasi = confirm('Nilai rekaman ini?');
            var materi = "<?php echo $datforum->video_materi; ?>";
            var submateri = "<?php echo $datforum->video_submateri; ?>";
            var tempat = $('#tempat<?php echo $datforum->id_posting ?>').val();
            var sifat = $('#sifat<?php echo $datforum->id_posting ?>').val();
            var suara = $('#suara<?php echo $datforum->id_posting ?>').val();
            var saran = $('#saran<?php echo $datforum->id_posting ?>').val();
            if (konfirmasi) {
              $.ajax({
                url: "<?php echo site_url('Controller_guru/nilaireflect') ?>",
                method: "POST",
                data: {id_posting:<?php echo $datforum->id_posting?>, id_user:<?php echo $datforum->id_user; ?>, id_penilai:<?php echo $this->session->userdata('id')?>, video_materi:materi, video_submateri: submateri, tempat:tempat, sifat:sifat, suara:suara, saran:saran},
                dataType: "JSON",
                success:function(data){
                  $('#penilaian<?php echo $datforum->id_posting ?>').hide(100);
                  $('#berinilai<?php echo $datforum->id_posting ?>').show(100);
                  $('#berinilai<?php echo $datforum->id_posting ?>').html('Nilai ulang');
                }
              });
            }
          });

          $('#tutupnilai<?php echo $datforum->id_posting ?>').on('click', function(event) {
            event.preventDefault();
            $('#berinilai<?php echo $datforum->id_posting ?>').show(100);
            $('#penilaian<?php echo $datforum->id_posting ?>').hide(100);
          });
        <?php } ?>
      });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Aktivitas <?php echo $siswa->nama_user; ?></title>
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
					<div class="card-header">
						<div class="row">
							<div class="col">
								<h3 class="m-0 font-weight-bold text-primary">Aktivitas <?php echo $siswa->nama_user; ?></h3>
							</div>
							<div class="col-auto">
								<a href="<?php echo site_url('guru/creative') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
						Semua nilai tahapan <i>Creative Learning</i> yang terdapat pada halaman ini merupakan hasil yang sudah terhitung otomatis oleh sistem dan tidak dapat Anda ubah. Nilai yang sudah tertera dibawah merupakan rekam jejak digital seberapa aktif siswa tersebut dalam melakukan aktivitas pada media pembelajaran ini. Terdapat 4 paratemer nilai, yaitu kurang, cukup, bagus, dan sangat bagus.
					</div>
				</div>

				<?php
					$totalimagine = 0;
					$totalcreateplay = 0;
					$totalshare = 0;
					$totalreflect = 0;
					foreach ($materi as $datmateri) {
						if ($datmateri->nama_materi != 'Pengertian & Manfaat') {
				?>
				<div class="card shadow mb-4">
					<div class="card-header">
						<h3 class="m-0 font-weight-bold text-primary"><?php echo $datmateri->nama_materi.' '.$datmateri->arab_materi; ?></h3>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped" width="100%" cellpadding="0">
								<thead class="text-center">
									<tr>
										<th class="align-middle" width="30">No</th>
										<th class="align-middle">Nama</th>
										<th class="align-middle">Tahap<br><i>Imagine</i></th>
										<th class="align-middle">Tahap<br><i>Create</i> & <i>Play</i></th>
										<th class="align-middle">Tahap<br><i>Share</i></th>
										<th class="align-middle">Tahap<br><i>Reflect</i></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no = 1;
										$id = $datmateri->id_materi;
										$materi_no_space = str_replace('-', '', $datmateri->nama_materi);
										foreach ($submateri as $datsub) {
											if ($id == $datsub->id_materi) {
									?>
									<tr>
										<td class="align-middle text-center"><?php echo $no; ?></td>
										<td class="align-middle"><?php echo $datsub->nama_submateri.' (<b>'.$datsub->huruf_submateri.'</b>)'; ?></td>
										<td class="align-middle text-center">
											<?php
												$imagine = 0;
												$nonton = 0;
												foreach ($aktivitas as $dataktivitas) {
													if ($dataktivitas->id_user == $siswa->id_user && $dataktivitas->materi == $datmateri->nama_materi && $dataktivitas->huruf == $datsub->nama_submateri && $dataktivitas->kegiatan == 'playvideo') {
														$nonton++;
													}
												}
												if ($nonton == 1) {
													$imagine = 25;
												}else if ($nonton == 2){
													$imagine = 50;
												}else if ($nonton == 3){
													$imagine = 75;
												}else if ($nonton == 4){
													$imagine = 100;
												}
												$nilaipengertian = $status['Pengertian'];
												$nilaipengertianhuruf = $status[$materi_no_space];
												$nilaisoalhuruf = $nilai[$datsub->id_submateri];
												$nilaiimagine = ($imagine * 30 / 100) + ($nilaipengertian * 10 / 100) + ($nilaipengertianhuruf * 10 / 100) + ($nilaisoalhuruf * 50 / 100);
												$totalimagine = $totalimagine + $nilaiimagine;
												if ($nilaiimagine <= 0) {
													echo "Belum terlewati";
												}else if ($nilaiimagine > 0 && $nilaiimagine <= 25) {
													echo "Kurang";
												}else if ($nilaiimagine > 25 && $nilaiimagine <= 50) {
													echo "Cukup";
												}else if ($nilaiimagine > 50 && $nilaiimagine <= 75) {
													echo "Bagus";
												}else if ($nilaiimagine > 75 && $nilaiimagine <= 100) {
													echo "Sangat Bagus";
												}
												if ($nilaiimagine > 0) {
											?>
												<br><a href="#" data-toggle="modal" data-target="#tahapimagine<?php echo $datsub->id_submateri ?>" class="text-decoration-none">Rincian</a>
											<?php } ?>
										</td>
										<td class="align-middle text-center">
											<?php
												$create = 0;
												foreach ($aktivitas as $dataktivitas) {
													if ($dataktivitas->id_user == $siswa->id_user && $dataktivitas->materi == $datmateri->nama_materi && $dataktivitas->huruf == $datsub->nama_submateri && $dataktivitas->kegiatan == 'rekam') {
														$create++;
													}
												}
												/*echo "Create: ";
												if ($create == 0) {
													echo "Belum terlewati";
												}else if ($create == 1){
													echo "Kurang";
												}else if ($create == 2){
													echo "Cukup";
												}else if ($create == 3){
													echo "Bagus";
												}else if ($create == 4){
													echo "Sangat bagus";
												}*/
												$play = 0;
												foreach ($aktivitas as $dataktivitas) {
													if ($dataktivitas->id_user == $siswa->id_user && $dataktivitas->materi == $datmateri->nama_materi && $dataktivitas->huruf == $datsub->nama_submateri && $dataktivitas->kegiatan == 'playrecord') {
														$play++;
													}
												}
												/*echo "Play: ";
												if ($play == 0) {
													echo "Belum terlewati";
												}else if ($play > 0 && $play <= 2){
													echo "Kurang";
												}else if ($play == 3){
													echo "Cukup";
												}else if ($play == 4){
													echo "Bagus";
												}else if ($play == 5){
													echo "Sangat bagus";
												}*/
												$tempat = 0;
												$sifat = 0;
												$suara = 0;
												foreach ($createplay as $datcreateplay) {
		                							if ($datcreateplay->id_user == $siswa->id_user && $datcreateplay->id_materi == $datmateri->id_materi && $datcreateplay->id_submateri == $datsub->id_submateri) {
		                								$tempat =  $datcreateplay->tempat;
		                								$sifat = $datcreateplay->sifat;
		                								$suara = $datcreateplay->suara;
		                							}
		                						}
		                						$hasil = ($create+$play+$tempat+$sifat+$suara) / 5;
		                						$totalcreateplay = $totalcreateplay + $hasil;
		                						if ($hasil == 0) {
		                							echo "Belum terlewati";
		                						}elseif ($hasil > 0 && $hasil <= 1.2) {
		                							echo "Kurang";
		                						}elseif ($hasil > 1.2 && $hasil <= 2.2) {
		                							echo "Cukup";
		                						}elseif ($hasil > 2.2 && $hasil <= 3.2) {
		                							echo "Bagus";
		                						}elseif ($hasil > 3.2 && $hasil <= 4.2) {
		                							echo "Sangat Bagus";
		                						}
		                						if ($hasil != 0) {
											?>
												<br><a href="#" data-toggle="modal" data-target="#tahapcreateplay<?php echo $datsub->id_submateri ?>" class="text-decoration-none">Rincian</a>
											<?php } ?>
										</td>
										<td class="align-middle text-center">
											<?php
												$postshare = 0;
												$idpost = array();
												$rowtempatshare = 0;
												$rowsifatshare = 0;
												$rowsuarashare = 0;
												$row = 0;
												$totalavgpost = 0;
												$totalpenilai = 0;
												$avg = 0;
												foreach ($forum as $datforum) {
													if ($datforum->status_posting == 0 && $datforum->username_user == $siswa->username_user && $datforum->video_materi == $datmateri->nama_materi && $datforum->video_submateri == $datsub->nama_submateri) {
														$postshare++;
														$idpost[$datforum->id_posting] = $datforum->id_posting;
													}
												}
												foreach ($idpost as $postid) {
													$totalnilaipost[$postid] = 0;
													$penilai[$postid] = 0;
													$avgpost[$postid] = 0;
												}
												foreach ($share as $datshare) {
													foreach ($idpost as $postid) {
														if ($postid == $datshare->id_posting && $datshare->video_materi == $datmateri->nama_materi && $datshare->video_submateri == $datsub->nama_submateri) {
																$rowtempatshare = $datshare->tempat;
																$rowsifatshare = $datshare->sifat;
																$rowsuarashare = $datshare->suara;
																$row = ($rowtempatshare+$rowsifatshare+$rowsuarashare) / 3;
																$totalnilaipost[$postid] += $row;
																$penilai[$postid]++;
																$totalpenilai++;
														}
														if ($totalnilaipost[$postid] != 0 && $penilai[$postid] != 0) {
															$avgpost[$postid] = $totalnilaipost[$postid] / $penilai[$postid];
														}
													}
												}

												foreach ($idpost as $postid) {
													$totalavgpost += $avgpost[$postid];
												}

												if ($totalavgpost == 0 || $postshare == 0) {
													$avg = 0;
												}else{
													$avg = $totalavgpost / $postshare;
												}
												if ($avg == 0) {
													echo "Belum terlewati";
												}elseif ($avg > 0 && $avg <= 1) {
													echo "Kurang";
												}elseif ($avg > 1 && $avg <= 2) {
													echo "Cukup";
												}elseif ($avg > 2 && $avg <= 3) {
													echo "Bagus";
												}elseif ($avg > 3 && $avg <= 4) {
													echo "Sangat Bagus";
												}
												$totalshare = $totalshare + $avg;
												if ($avg != 0) {
											?>
												<br><a href="<?php echo site_url('guru/rincianshare/'.$siswa->id_user.'/'.$datmateri->nama_materi.'/'.$datsub->nama_submateri) ?>" class="text-decoration-none">Rincian</a>
											<?php } ?>
										</td>
										<td class="align-middle text-center">
											<?php
												$idreflect = array();
												$jumlahreflect = 0;
												$tempatreflect = 0;
												$sifatreflect = 0;
												$suarareflect = 0;
												$totalavgreflect = 0;
												$refflect = 0;
												foreach ($reflect as $datreflect) {
													if ($datreflect->video_materi == $datmateri->nama_materi && $datreflect->video_submateri == $datsub->nama_submateri) {
														$idreflect[$datreflect->id] = $datreflect->id;
														$jumlahreflect++;
													}
												}
												foreach ($idreflect as $reflectid) {
													$totalnilairowreflect[$reflectid] = 0;
												}
												foreach ($reflect as $datreflect) {
													foreach ($idreflect as $reflectid) {
														if ($datreflect->id == $reflectid && $datreflect->video_materi == $datmateri->nama_materi && $datreflect->video_submateri && $datsub->nama_submateri) {
															$tempatreflect = $datreflect->tempat;
															$sifatreflect = $datreflect->sifat;
															$suarareflect = $datreflect->suara;
															$totalnilairowreflect[$reflectid] = ($tempatreflect+$sifatreflect+$suarareflect) / 3;
															$totalavgreflect += $totalnilairowreflect[$reflectid];
														}
														/*echo "<br>row".$reflectid.'='.$totalavgreflect;*/
													}
												}

												if ($totalavgreflect == 0 || $jumlahreflect == 0) {
													$refflect = 0;
												}else{
													$refflect = $totalavgreflect / $jumlahreflect;
												}
												$totalreflect = $totalreflect + $refflect;

												/*$totalreflect = $avgreflect / $jumlahreflect;
												echo $jumlahreflect;
												$post = 0;
												$comment = 0;
												$reflect = 0;
												foreach ($forum as $datforum) {
													if ($datforum->status_posting == 0 && $datforum->video_materi == $datmateri->nama_materi && $datforum->video_submateri == $datsub->nama_submateri) {
														$post++;
													}
													if ($datforum->status_posting != 0 && $datforum->video_materi == $datmateri->nama_materi && $datforum->video_submateri == $datsub->nama_submateri) {
														$comment++;
													}
												}
												if ($comment != 0) {
													$reflect = $comment / $post;
													$totalreflect = $totalreflect + $reflect;
												}*/
												if ($totalpenilai == 0) {
													echo "Belum terlewati";
												}else{
													if ($refflect == 0) {
														echo "Belum Anda nilai";
													}else if ($refflect > 0 && $refflect <= 1){
														echo "Kurang";
													}else if ($refflect > 1 && $refflect <= 2){
														echo "Cukup";
													}else if ($refflect > 2 && $refflect <= 3){
														echo "Bagus";
													}else if ($refflect > 3 && $refflect <= 4){
														echo "Sangat bagus";
													}
											?>
											<br><a href="<?php echo site_url('guru/rincianreflect/'.$siswa->id_user.'/'.$datmateri->nama_materi.'/'.$datsub->nama_submateri) ?>" <?php echo $datsub->id_submateri ?>" class="text-decoration-none">Rincian</a>
											<?php
												} 
											?>
										</td>
									</tr>
	<?php
		$tahap = array("imagine", "createplay");
		foreach ($tahap as $dattahap) {
	?>
	<div class="modal fade" id="tahap<?php echo $dattahap.$datsub->id_submateri ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rincian Tahap <?php echo $dattahap; ?><br>Materi <?php echo $datmateri->nama_materi.' Huruf '.$datsub->nama_submateri; ?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-justify">
                	<?php if ($dattahap == 'imagine') { ?>
	                	<div class="row">
		                	<div class="col-8 text-center">
		                		<b>Kriteria</b>
		                	</div>
		                	<div class="col-4 text-center">
		                		<b>Nilai</b>
		                	</div>
		                </div>
	                	<div class="row bg-light">
		                	<div class="col-8">
		                		Soal Pengertian & Manfaat Makhorijul Huruf
		                	</div>
		                	<div class="col-4 text-center">
		                		<?php echo $nilaipengertian; ?>
		                	</div>
		                </div>
		                <div class="row">
		                	<div class="col-8">
		                		Soal materi <?php echo $datmateri->nama_materi; ?>
		                	</div>
		                	<div class="col-4 text-center">
		                		<?php
		                			if ($nilaipengertianhuruf == -1) {
		                				echo "0";
		                			}else{
		                				echo $nilaipengertianhuruf;
		                			}
		                		?>
		                	</div>
		                </div>
		                <div class="row bg-light">
		                	<div class="col-8">
		                		Soal huruf <?php echo $datsub->nama_submateri; ?>
		                	</div>
		                	<div class="col-4 text-center">
		                		<?php echo $nilaisoalhuruf; ?>
		                	</div>
		                </div>
		                <div class="row">
		                	<div class="col-8">
		                		Jumlah menonton video huruf <?php echo $datsub->nama_submateri; ?>
		                	</div>
		                	<div class="col-4 text-center">
		                		<?php echo $nonton; ?>
		                	</div>
		                </div>
		                <br>
		                Untuk kriteria soal, apabila bernilai 0 dapat berarti siswa tersebut belum mengerjakan soal tersebut.
		            <?php }else if ($dattahap == 'createplay'){ ?>
		            	Tahap ini melibatkan penilaian dari siswa itu sendiri (<i>Self Correction</i>) serta jumlah rekaman yang ia buat pada huruf ini dan jumlah ia menonton rekamannya sendiri.<br>
		            	<div class="row mt-2">
		                	<div class="col-8 text-center">
		                		<b><i>Self Correction</i></b>
		                	</div>
		                	<div class="col-4 text-center">
		                		<b>Nilai</b>
		                	</div>
		                </div>
		                <?php 
		                foreach ($createplay as $datcreateplay) {
		                	if ($datcreateplay->id_user == $siswa->id_user && $datcreateplay->id_materi == $datmateri->id_materi && $datcreateplay->id_submateri == $datsub->id_submateri) {
		                ?>
			                <div class="row bg-light">
			                	<div class="col-8">
			                		Tempat keluarnya huruf
			                	</div>
			                	<div class="col-4 text-center">
			                		<?php if ($datcreateplay->tempat == 1) {
			                			echo "Kurang";
			                		}elseif ($datcreateplay->tempat == 2) {
			                			echo "Cukup";
			                		}elseif ($datcreateplay->tempat == 3) {
			                			echo "Bagus";
			                		}elseif ($datcreateplay->tempat == 4) {
			                			echo "Sangat Bagus";
			                		} ?>
			                	</div>
			                </div>
			                <div class="row">
			                	<div class="col-8">
			                		Sifat
			                	</div>
			                	<div class="col-4 text-center">
			                		<?php if ($datcreateplay->sifat == 1) {
			                			echo "Kurang";
			                		}elseif ($datcreateplay->sifat == 2) {
			                			echo "Cukup";
			                		}elseif ($datcreateplay->sifat == 3) {
			                			echo "Bagus";
			                		}elseif ($datcreateplay->sifat == 4) {
			                			echo "Sangat Bagus";
			                		} ?>
			                	</div>
			                </div>
			                <div class="row bg-light">
			                	<div class="col-8">
			                		Suara
			                	</div>
			                	<div class="col-4 text-center">
			                		<?php if ($datcreateplay->suara == 1) {
			                			echo "Kurang";
			                		}elseif ($datcreateplay->suara == 2) {
			                			echo "Cukup";
			                		}elseif ($datcreateplay->suara == 3) {
			                			echo "Bagus";
			                		}elseif ($datcreateplay->suara == 4) {
			                			echo "Sangat Bagus";
			                		} ?>
			                	</div>
			                </div>
		                <?php }} ?>
		                <br>
		            	<div class="row">
		                	<div class="col-8 text-center">
		                		<b>Kriteria</b>
		                	</div>
		                	<div class="col-4 text-center">
		                		<b>Jumlah</b>
		                	</div>
		                </div>
		                <div class="row bg-light">
		                	<div class="col-8">
		                		Membuat rekaman
		                	</div>
		                	<div class="col-4 text-center">
		                		<?php echo $create; ?>
		                	</div>
		                </div>
		                <div class="row">
		                	<div class="col-8">
		                		Memutar rekaman
		                	</div>
		                	<div class="col-4 text-center">
		                		<?php echo $play; ?>
		                	</div>
		                </div>
		            <?php } ?>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
									<?php 
											$no++; }
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<?php }} ?>

				<div class="card shadow mb-4">
					<div class="card-header">
						<h3 class="m-0 font-weight-bold text-primary">Total Keseluruhan Tahapan</h3>
					</div>
					<div class="card-body">
					    Tabel dibawah ini merupakan hasil rekap semua tahapan Creative Learning Anda yang sudah di kalkulasi otomatis oleh sistem.
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr class="text-center">
										<th class="align-middle">Tahap <i>Imagine</i></th>
										<th class="align-middle">Tahap <i>Create</i> & <i>Play</i></th>
										<th class="align-middle">Tahap <i>Share</i></th>
										<th class="align-middle">Tahap <i>Reflect</i></th>
									</tr>
								</thead>
								<tbody>
									<tr class="text-center">
										<td class="align-middle">
											<?php
												$totalimagine = $totalimagine / 33;
												/*echo $totalimagine;*/
												if ($totalimagine <= 25) {
													echo "Kurang";
												}else if ($totalimagine > 25 && $totalimagine <= 50) {
													echo "Cukup";
												}else if ($totalimagine > 50 && $totalimagine <= 75) {
													echo "Bagus";
												}else if ($totalimagine > 75 && $totalimagine <= 100) {
													echo "Sangat Bagus";
												}
											?>
										</td>
										<td class="align-middle">
											<?php
												
												$totalcreateplay = $totalcreateplay / 33;
												/*echo $totalcreateplay;*/
												if ($totalcreateplay >= 0 && $totalcreateplay <= 1.2) {
		                							echo "Kurang";
		                						}elseif ($totalcreateplay > 1.2 && $totalcreateplay <= 2.2) {
		                							echo "Cukup";
		                						}elseif ($totalcreateplay > 2.2 && $totalcreateplay <= 3.2) {
		                							echo "Bagus";
		                						}elseif ($totalcreateplay > 3.2 && $totalcreateplay <= 4.2) {
		                							echo "Sangat Bagus";
		                						}
											?>
										</td>
										<td class="align-middle">
											<?php
												
												$totalshare = $totalshare / 33;
												/*echo $totalshare;*/
												if ($totalshare >= 0 && $totalshare <= 1) {
													echo "Kurang";
												}else if ($totalshare > 1 && $totalshare <= 2){
													echo "Cukup";
												}else if ($totalshare > 2 && $totalshare <= 3){
													echo "Bagus";
												}else if ($totalshare > 3 && $totalshare <= 4){
													echo "Sangat bagus";
												}
											?>
										</td>
										<td class="align-middle">
											<?php
												
												$totalreflect = $totalreflect / 33;
												/*echo $totalreflect;*/
												if ($totalreflect >= 0 && $totalreflect <= 1) {
													echo "Kurang";
												}else if ($totalreflect > 1 && $totalreflect <= 2){
													echo "Cukup";
												}else if ($totalreflect > 2 && $totalreflect <= 3){
													echo "Bagus";
												}else if ($totalreflect > 3 && $totalreflect <= 4){
													echo "Sangat bagus";
												}
											?>
										</td>
									</tr>
								</tbody>
							</table>
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
</body>
</html>
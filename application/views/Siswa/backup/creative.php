<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Creative Learning</title>
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
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('siswa') ?>">
          <div class="sidebar-brand-icon">
              <img style="height: 40px" src="<?php echo base_url('assets/img/logo-fill.png') ?>">
          </div>
          <div class="sidebar-brand-text mx-1" style="font-size: 12px">
              Media Pembelajaran Makhorijul Huruf
          </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('siswa') ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
        </li>

        <li class="nav-item active">
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
        <a class="nav-link" href="<?php echo site_url('pengertian') ?>">
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
                  <a class="collapse-item" href="<?php echo site_url('materi/1/6')?>">Al-Halq (الحَلْقُ)</a>
                  <a class="collapse-item" href="<?php echo site_url('materi/1/3')?>">Al-Lisan (اللِّسَانُ)</a>
                  <a class="collapse-item" href="<?php echo site_url('materi/1/2')?>">Asy-Syafatain (الشفت)</a>
                  <a class="collapse-item" href="<?php echo site_url('materi/1/25')?>">Al-Khaisyum (الخيشوم)</a>
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
        <a class="nav-link" href="<?php echo site_url('tugas') ?>">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Tugas</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('evaluasi') ?>">
          <i class="fas fa-fw fa-pen-alt"></i>
          <span>Evaluasi</span></a>
      </li>

      <hr class="sidebar-divider my-0">

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
					<div class="card-header">
						<h3 class="m-0 font-weight-bold text-primary">Nilai <i>Creative Learning</i></h3>
					</div>
					<div class="card-body text-justify">
						Semua nilai tahapan <i>Creative Learning</i> yang terdapat pada halaman ini merupakan hasil yang sudah terhitung otomatis oleh sistem. Nilai yang sudah tertera dibawah merupakan rekam jejak digital seberapa aktif Anda dalam melakukan aktivitas pada media pembelajaran ini. Terdapat 4 paratemer nilai, yaitu kurang, cukup, bagus, dan sangat bagus.
					</div>
				</div>

				<?php
					$totalimagine = 0;
					$totalcreate = 0;
					$totalplay = 0;
					$totalshare = 0;
					$totalreflect = 0;
					foreach ($materi as $datmateri) {
						if ($datmateri->nama_materi != 'Pengertian') {
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
										<th class="align-middle">Tahap<br><i>Create</i></th>
										<th class="align-middle">Tahap<br><i>Play</i></th>
										<th class="align-middle">Tahap<br><i>Share</i></th>
										<th class="align-middle">Tahap<br><i>Reflect</i></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no = 1;
										$id = $datmateri->id_materi;
										foreach ($submateri as $datsub) {
											if ($id == $datsub->id_materi) {
									?>
									<tr>
										<td class="align-middle text-center"><?php echo $no; ?></td>
										<td class="align-middle"><?php echo $datsub->nama_submateri.' (<b>'.$datsub->huruf_submateri.'</b>)'; ?></td>
										<td class="align-middle text-center"></td>
										<td class="align-middle text-center">
											<?php
												$create = 0;
												foreach ($aktivitas as $dataktivitas) {
													if ($dataktivitas->id_user == $siswa->id_user && $dataktivitas->materi == $datmateri->nama_materi && $dataktivitas->huruf == $datsub->nama_submateri && $dataktivitas->kegiatan == 'rekam') {
														$create++;
														$totalcreate++;
													}
												}
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
												}
											?>
										</td>
										<td class="align-middle text-center">
											<?php
												$play = 0;
												foreach ($aktivitas as $dataktivitas) {
													if ($dataktivitas->id_user == $siswa->id_user && $dataktivitas->materi == $datmateri->nama_materi && $dataktivitas->huruf == $datsub->nama_submateri && $dataktivitas->kegiatan == 'playrecord') {
														$play++;
														$totalplay++;
													}
												}
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
												}
											?>
										</td>
										<td class="align-middle text-center">
											<?php
												$share = 0;
												foreach ($aktivitas as $dataktivitas) {
													if ($dataktivitas->id_user == $siswa->id_user && $dataktivitas->materi == $datmateri->nama_materi && $dataktivitas->huruf == $datsub->nama_submateri && $dataktivitas->kegiatan == 'bagikan') {
														$share++;
														$totalshare++;
													}
												}
												if ($share == 0){
													echo "Belum terlewati";
												}else if ($share == 1){
													echo "Cukup";
												}else if ($share == 2){
													echo "Bagus";
												}else if ($share == 3){
													echo "Sangat bagus";
												}
											?>
										</td>
										<td class="align-middle text-center">
											<?php
												$post = 0;
												$comment = 0;
												$reflect = 0;
												/*foreach ($aktivitas as $dataktivitas) {
													if ($dataktivitas->id_user == $siswa->id_user && $dataktivitas->materi == $datmateri->nama_materi && $dataktivitas->huruf == $datsub->nama_submateri && $dataktivitas->kegiatan == 'diskusi') {
														$reflect++;
													}
												}*/
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
												}
												if ($reflect == 0) {
													echo "Belum terlewati";
												}else if ($reflect == 1){
													echo "Kurang";
												}else if ($reflect == 2){
													echo "Cukup";
												}else if ($reflect == 3){
													echo "Bagus";
												}else if ($reflect >= 4){
													echo "Sangat bagus";
												}
											?>
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
				<?php }} ?>

				<div class="card shadow mb-4">
					<div class="card-header">
						<h3 class="m-0 font-weight-bold text-primary">Total Keseluruhan Tahapan</h3>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr class="text-center">
										<th class="align-middle">Tahap <i>Imagine</i></th>
										<th class="align-middle">Tahap <i>Create</i></th>
										<th class="align-middle">Tahap <i>Play</i></th>
										<th class="align-middle">Tahap <i>Share</i></th>
										<th class="align-middle">Tahap <i>Reflect</i></th>
									</tr>
								</thead>
								<tbody>
									<tr class="text-center">
										<td class="align-middle"></td>
										<td class="align-middle">
											<?php
												$totalcreate = $totalcreate / 33;
												if ($totalcreate <= 7) {
													echo "Kurang";
												}else if ($totalcreate >= 8 && $totalcreate <= 13){
													echo "Cukup";
												}else if ($totalcreate >= 14 && $totalcreate <= 20){
													echo "Bagus";
												}else if ($totalcreate >= 21 && $totalcreate <= 26){
													echo "Sangat bagus";
												}
											?>
										</td>
										<td class="align-middle">
											<?php
												$totalplay = $totalplay / 33;
												if ($totalplay <= 13) {
													echo "Kurang";
												}else if ($totalplay >= 14 && $totalplay <= 20){
													echo "Cukup";
												}else if ($totalplay >= 21 && $totalplay <= 26){
													echo "Bagus";
												}else if ($totalplay >= 27 && $totalplay <= 33){
													echo "Sangat bagus";
												}
											?>
										</td>
										<td class="align-middle">
											<?php
												$totalshare = $totalshare / 33;
												if ($totalshare >= 0) {
													echo "Kurang";
												}else if ($totalshare >= 1 && $totalshare <= 7){
													echo "Cukup";
												}else if ($totalshare >= 8 && $totalshare <= 13){
													echo "Bagus";
												}else if ($totalshare >= 14 && $totalshare <= 20){
													echo "Sangat bagus";
												}
											?>
										</td>
										<td class="align-middle">
											<?php
												$totalreflect = $totalreflect / 33;
												if ($totalreflect <= 7) {
													echo "Kurang";
												}else if ($totalreflect > 8 && $totalreflect <= 13){
													echo "Cukup";
												}else if ($totalreflect > 14 && $totalreflect <= 20){
													echo "Bagus";
												}else if ($totalreflect > 21 && $totalreflect <= 26){
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
    <script>
      $(document).ready(function(){
        
      });
    </script>
</body>
</html>
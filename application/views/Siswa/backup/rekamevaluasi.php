<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Rekam Evaluasi</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/icon.ico'); ?>">
    
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/fontfamily.css') ?>" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/rtc/css/main.css') ?>" rel="stylesheet">
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
        <a class="nav-link" href="<?php echo site_url('tugas') ?>">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Tugas</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item active">
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
            <!-- Area Recorder -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h3 class="m-0 font-weight-bold text-primary">Rekam Evaluasi</h3>
                </div>
                <!-- Card Body -->
                <div class="card-body text-center">
                  <video class="mirror" id="gum" playsinline autoplay muted></video>
                  <p class="hidden">Echo cancellation: <input type="checkbox" id="echoCancellation" checked></p>

                  <div>
                      <button class="btn btn-danger" id="start">Buka Kamera</button>
                      <button class="btn btn-danger" id="record" disabled>Rekam</button>
                  </div>

                  <div>
                      <span id="errorMsg"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <!-- Area Recorder Result -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h3 class="m-0 font-weight-bold text-primary">Hasil Rekaman</h3>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="table-responsive text-center">
                  <table class="table" width="100%">
                     <thead>
                      <tr>
                        <th>No</th>
                        <th>Rekaman</th>
                      </tr>
                    </thead>
                    <tbody id="mytable">
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
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
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

    <!-- <script src="<?php echo base_url('assets/vendor/rtc/js/main.js') ?>"></script> -->
    <script src="<?php echo base_url('assets/vendor/rtc/js/adapter-latest.js') ?>"></script>

    <script>
      'use strict';

      const mediaSource = new MediaSource();
      mediaSource.addEventListener('sourceopen', handleSourceOpen, false);
      let mediaRecorder;
      let recordedBlobs;
      let sourceBuffer;

      const errorMsgElement = document.querySelector('span#errorMsg');
      const recordButton = document.querySelector('button#record');

      recordButton.addEventListener('click', () => {
        if (recordButton.textContent === 'Rekam') {
          cameraButton.disabled = true;
          startRecording();
        } else {
          cameraButton.disabled = false;
          recordButton.textContent = 'Rekam';
          stopRecording();
        }
      });

      function handleSourceOpen(event) {
        console.log('MediaSource opened');
        sourceBuffer = mediaSource.addSourceBuffer('video/webm; codecs="vp8"');
        console.log('Source buffer: ', sourceBuffer);
      }

      function handleDataAvailable(event) {
        console.log('handleDataAvailable', event);
        if (event.data && event.data.size > 0) {
          recordedBlobs.push(event.data);
        }
      }

      function startRecording() {
        recordedBlobs = [];
        let options = {mimeType: 'video/webm;codecs=vp9'};
        if (!MediaRecorder.isTypeSupported(options.mimeType)) {
          console.error(`${options.mimeType} is not Supported`);
          errorMsgElement.innerHTML = `${options.mimeType} is not Supported`;
          options = {mimeType: 'video/webm;codecs=vp8'};
          if (!MediaRecorder.isTypeSupported(options.mimeType)) {
            console.error(`${options.mimeType} is not Supported`);
            errorMsgElement.innerHTML = `${options.mimeType} is not Supported`;
            options = {mimeType: 'video/webm'};
            if (!MediaRecorder.isTypeSupported(options.mimeType)) {
              console.error(`${options.mimeType} is not Supported`);
              errorMsgElement.innerHTML = `${options.mimeType} is not Supported`;
              options = {mimeType: ''};
            }
          }
        }

        try {
          mediaRecorder = new MediaRecorder(window.stream, options);
        } catch (e) {
          console.error('Exception while creating MediaRecorder:', e);
          errorMsgElement.innerHTML = `Exception while creating MediaRecorder: ${JSON.stringify(e)}`;
          return;
        }

        console.log('Created MediaRecorder', mediaRecorder, 'with options', options);
        recordButton.textContent = 'Berhenti';
        mediaRecorder.onstop = (event) => {
          console.log('Recorder stopped: ', event);
          console.log('Recorded Blobs: ', recordedBlobs);
        };
        mediaRecorder.ondataavailable = handleDataAvailable;
        mediaRecorder.start(10); // collect 10ms of data
        console.log('MediaRecorder started', mediaRecorder);
      }

      function stopRecording() {
        mediaRecorder.stop();

        $.ajax({
         url:"<?php echo site_url('Controller_siswa/analitik/rekam') ?>",
         method:"POST",
         data:{id:<?php echo $this->session->userdata('id'); ?>},
         dataType:"JSON",
         success:function(data){
          console.log('Berhasil');
         }
        });

        const blob = new Blob(recordedBlobs, {type: 'video/mp4'});
        const url = window.URL.createObjectURL(blob);
        const tables = document.getElementsByTagName('table');
        const row = document.createElement('tr');
        const col2 = document.createElement('td');
        const video = document.createElement('video');
        const upld = document.createElement('a');
        const br = document.createElement('br');
        const filename = '<?php echo $this->session->userdata('username').'evaluasi' ?>';

        const table = tables[tables.length - 1];
        const rows = table.rows;
        for(var i = 0, td; i < rows.length; i++){
            var col1 = document.createElement('td');
            var dnld = document.createElement('a');
            dnld.download = "evaluasi"+(i+1)+".mp4";
            video.onplaying = function(){playvideo()};
            function playvideo(){
              $.ajax({
               url:"<?php echo site_url('Controller_siswa/analitik/playrecord') ?>",
               method:"POST",
               data:{id:<?php echo $this->session->userdata('id'); ?>},
               dataType:"JSON",
               success:function(data){
                console.log('Berhasil');
               }
              });
            }
            col1.appendChild(document.createTextNode(i + 1));
        }

        video.src = url;
        video.controls = true;
        video.tabindex = -1;
        col2.appendChild(video);
        col2.appendChild(br);

        dnld.className = "btn btn-primary m-1";
        dnld.href = url;
        dnld.innerHTML = "<i class='fa fa-download'></i> Unduh";
        col2.appendChild(dnld);

        upld.className = "btn btn-primary m-1";
        upld.href = "#";
        upld.innerHTML = "<i class='fa fa-upload'></i> Kumpulkan";
        upld.addEventListener("click", function(event){
          event.preventDefault();
          var konfirmasi = confirm("Apakah Anda yakin akan menggunggah video ini untuk dikumpulkan?");
          if (konfirmasi) {
            var xhr=new XMLHttpRequest();
            xhr.onload = function(e) {
              if(this.readyState === 4) {
                console.log("Server returned: ",e.target.responseText);
              }
            };
            var fd = new FormData();
            fd.append("video_data", blob, filename);
            fd.append("materi", 'materi');
            xhr.open("POST","<?php echo site_url('Controller_siswa/uploadevaluasi') ?>",true);
            xhr.send(fd);
            $('#loadingModal').modal('show');

            xhr.addEventListener('error', function(){
              document.getElementById('loading').innerHTML = '<i class="fa fa-times fa-5x"></i>&nbsp;&nbsp;&nbsp;Video gagal diunggah';
              setTimeout(function(){
                window.location.reload();
              }, 3000);
            });

            xhr.addEventListener('load', function(){
              document.getElementById('loading').innerHTML = '<i class="fa fa-check fa-5x"></i>&nbsp;&nbsp;&nbsp;Video berhasil terunggah';
              setTimeout(function(){
                window.location.replace("<?php echo site_url('evaluasi') ?>");
              }, 3000);
            });
          }
        });
        col2.appendChild(upld);

        col1.className = "align-middle text-center";
        col2.className = "align-middle text-center";
        row.appendChild(col1);
        row.appendChild(col2);
        document.getElementById('mytable').appendChild(row);
        
        var hash = video.hash;
        $('html, body').animate({
          scrollTop: $(video).offset().top
        }, 800, function(){
          window.location.hash = hash;
        });

      }

      function handleSuccess(stream) {
        recordButton.disabled = false;
        console.log('getUserMedia() got stream:', stream);
        window.stream = stream;

        const gumVideo = document.querySelector('video#gum');
        gumVideo.srcObject = stream;
      }

      async function init(constraints) {
        try {
          const stream = await navigator.mediaDevices.getUserMedia(constraints);
          handleSuccess(stream);
        } catch (e) {
          console.error('navigator.getUserMedia error:', e);
          errorMsgElement.innerHTML = `navigator.getUserMedia error:${e.toString()}`;
        }
      }

      const cameraButton = document.querySelector('button#start');
      cameraButton.addEventListener('click', async () => {
        if (cameraButton.textContent == 'Buka Kamera') {
          cameraButton.textContent = 'Tutup Kamera';
          const hasEchoCancellation = document.querySelector('#echoCancellation').checked;
          const constraints = {
            audio: {
              echoCancellation: {exact: hasEchoCancellation}
            },
            video: {
              width: 1280, height: 720
            }
          };
          console.log('Using media constraints:', constraints);
          await init(constraints);
        }else{
          cameraButton.textContent = 'Buka Kamera';
          recordButton.disabled = true;
          stream.getTracks().forEach(function(track) {
            track.stop();
          });
        }
      });
    </script>
</body>
</html>
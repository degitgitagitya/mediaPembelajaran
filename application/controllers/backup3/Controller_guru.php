<?php
date_default_timezone_set('Asia/Jakarta');

class Controller_guru extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		if (empty($this->session->userdata('id'))) {
			$this->session->set_flashdata('message', 'Sesi Anda telah habis, silahkan login kembali');
			redirect('login');
		}else if($this->session->userdata('level') == 3){
			redirect('siswa');
		}

		$this->load->model('Model_siswa');
		$this->load->model('Model_guru');
		$this->load->model('Model_home');
	}

	function index(){
		$data['profile'] = $this->Model_guru->profile($this->session->userdata('username'));
		$this->load->view('Home/beranda', $data);
	}

	function alatukur(){
		$data['profile'] = $this->Model_guru->profile($this->session->userdata('username'));
		$data['siswa'] = $this->Model_guru->siswa();
		$this->load->view('Guru/alatukur', $data);
	}

	function aktivitassiswa($id){
		$data['profile'] = $this->Model_guru->profile($this->session->userdata('username'));
		$data['siswa'] = $this->Model_guru->siswabyId($id);
		$data['materi'] = $this->Model_guru->listmateri();
		$data['submateri'] = $this->Model_guru->submateri();
		$data['aktivitas'] = $this->Model_guru->aktivitasbyId($id);
		$data['forum'] = $this->Model_guru->forumbyUser($data['siswa']->username_user);
		$data['status'] = $this->Model_siswa->selectstatusbyUsername($data['siswa']->username_user);
		$id_user = $data['siswa']->id_user;
		foreach ($data['materi'] as $datmateri) {
			$id = $datmateri->id_materi;
			foreach ($data['submateri'] as $datsub) {
				if ($id == $datsub->id_materi) {
					$data['nilai'][$datsub->id_submateri] = $this->Model_siswa->nilaisoalhuruf($id_user, $datmateri->nama_materi, $datsub->nama_submateri);
				}
			}
		}
		$this->load->view('Guru/aktivitas', $data);
	}

	function report(){
		$data['siswa'] = $this->Model_guru->siswa();
		$data['materi'] = $this->Model_guru->listmateri();
		$data['submateri'] = $this->Model_guru->submateri();
		$data['aktivitas'] = $this->Model_guru->aktivitas();
		$data['forum'] = $this->Model_guru->forum();
		foreach ($data['siswa'] as $datsiswa) {
			$data['status'][$datsiswa->id_user] = $this->Model_siswa->selectstatusbyUsername($datsiswa->username_user);
			$id_user = $datsiswa->id_user;
			foreach ($data['materi'] as $datmateri) {
				$id = $datmateri->id_materi;
				foreach ($data['submateri'] as $datsub) {
					if ($id == $datsub->id_materi) {
						$data['nilai'][$datsiswa->id_user][$datsub->id_submateri] = $this->Model_siswa->nilaisoalhuruf($id_user, $datmateri->nama_materi, $datsub->nama_submateri);
					}
				}
			}
		}
		$this->load->view('Guru/report', $data);
	}

	function chart(){
		$siswa = $this->input->post('siswa');
		if ($this->input->post('tipe') == 'login') {
			if ($this->input->post('waktu') == 'hari') {
				for ($i=0; $i <= 23; $i++) { 
					$data['jam'][] = $i;
					$data['login'][] = $this->Model_guru->loginperjam($siswa, $i);
				}
				$data['labelx'] = 'Jam';
				$data['label'] = 'login';
				$this->load->view('Guru/chart', $data);
			}elseif($this->input->post('waktu') == 'minggu'){
				$awal = date('d')-6;
				$akhir = date('d');
				for ($i=$awal; $i <= $akhir; $i++) { 
					$data['tanggal'][] = $i;
					$data['login'][] = $this->Model_guru->loginperminggu($siswa, $i);
				}
				$data['labelx'] = 'Tanggal';
				$data['label'] = 'login';
				$this->load->view('Guru/chart', $data);
			}
		}elseif ($this->input->post('tipe') == 'playvideo') {
			if ($this->input->post('waktu') == 'hari') {
				for ($i=0; $i <= 23; $i++) { 
					$data['jam'][] = $i;
					$data['login'][] = $this->Model_guru->playperjam($siswa, $i);
				}
				$data['labelx'] = 'Jam';
				$data['label'] = 'memutar video';
				$this->load->view('Guru/chart', $data);
			}elseif ($this->input->post('waktu') == 'minggu') {
				$awal = date('d')-6;
				$akhir = date('d');
				for ($i=$awal; $i <= $akhir; $i++) { 
					$data['tanggal'][] = $i;
					$data['login'][] = $this->Model_guru->playperminggu($siswa, $i);
				}
				$data['labelx'] = 'Tanggal';
				$data['label'] = 'memutar video';
				$this->load->view('Guru/chart', $data);
			}
		}elseif ($this->input->post('tipe') == 'rekaman') {
			if ($this->input->post('waktu') == 'hari') {
				for ($i=0; $i <= 23; $i++) { 
					$data['jam'][] = $i;
					$data['login'][] = $this->Model_guru->rekamanperjam($siswa, $i);
				}
				$data['labelx'] = 'Jam';
				$data['label'] = 'rekaman';
				$this->load->view('Guru/chart', $data);
			}elseif ($this->input->post('waktu') == 'minggu') {
				$awal = date('d')-6;
				$akhir = date('d');
				for ($i=$awal; $i <= $akhir; $i++) { 
					$data['tanggal'][] = $i;
					$data['login'][] = $this->Model_guru->rekamanperminggu($siswa, $i);
				}
				$data['labelx'] = 'Tanggal';
				$data['label'] = 'rekaman';
				$this->load->view('Guru/chart', $data);
			}
		}elseif ($this->input->post('tipe') == 'playrecord') {
			if ($this->input->post('waktu') == 'hari') {
				for ($i=0; $i <= 23; $i++) { 
					$data['jam'][] = $i;
					$data['login'][] = $this->Model_guru->playrecordperjam($siswa, $i);
				}
				$data['labelx'] = 'Jam';
				$data['label'] = 'memutar rekaman sendiri';
				$this->load->view('Guru/chart', $data);
			}elseif ($this->input->post('waktu') == 'minggu') {
				$awal = date('d')-6;
				$akhir = date('d');
				for ($i=$awal; $i <= $akhir; $i++) { 
					$data['tanggal'][] = $i;
					$data['login'][] = $this->Model_guru->playrecordperminggu($siswa, $i);
				}
				$data['labelx'] = 'Tanggal';
				$data['label'] = 'memutar rekaman sendiri';
				$this->load->view('Guru/chart', $data);
			}
		}elseif ($this->input->post('tipe') == 'bagikan') {
			if ($this->input->post('waktu') == 'hari') {
				for ($i=0; $i <= 23; $i++) { 
					$data['jam'][] = $i;
					$data['login'][] = $this->Model_guru->bagikanperjam($siswa, $i);
				}
				$data['labelx'] = 'Jam';
				$data['label'] = 'membagikan hasil rekaman';
				$this->load->view('Guru/chart', $data);
			}elseif ($this->input->post('waktu') == 'minggu') {
				$awal = date('d')-6;
				$akhir = date('d');
				for ($i=$awal; $i <= $akhir; $i++) { 
					$data['tanggal'][] = $i;
					$data['login'][] = $this->Model_guru->bagikanperminggu($siswa, $i);
				}
				$data['labelx'] = 'Tanggal';
				$data['label'] = 'membagikan hasil rekaman';
				$this->load->view('Guru/chart', $data);
			}
		}elseif ($this->input->post('tipe') == 'diskusi') {
			if ($this->input->post('waktu') == 'hari') {
				for ($i=0; $i <= 23; $i++) { 
					$data['jam'][] = $i;
					$data['login'][] = $this->Model_guru->diskusiperjam($siswa, $i);
				}
				$data['labelx'] = 'Jam';
				$data['label'] = 'diskusi';
				$this->load->view('Guru/chart', $data);
			}elseif ($this->input->post('waktu') == 'minggu') {
				$awal = date('d')-6;
				$akhir = date('d');
				for ($i=$awal; $i <= $akhir; $i++) { 
					$data['tanggal'][] = $i;
					$data['login'][] = $this->Model_guru->diskusiperminggu($siswa, $i);
				}
				$data['labelx'] = 'Tanggal';
				$data['label'] = 'diskusi';
				$this->load->view('Guru/chart', $data);
			}
		}
	}

	function materi(){
		$data['profile'] = $this->Model_guru->profile($this->session->userdata('username'));
		$data['listmateri'] = $this->Model_guru->listmateri();
		$data['submateri'] = $this->Model_guru->submateri();

		$this->load->view('Guru/materi', $data);
	}

	function soal($materi, $huruf){
		if ($materi == 'pengertian') {
			$materi = 'Pengertian & Manfaat';
			$huruf = NULL;
		}else if($huruf == 'null'){
			$huruf = NULL;
		}
		$data['profile'] = $this->Model_guru->profile($this->session->userdata('username'));
		$data['soal'] = $this->Model_siswa->soal($materi, $huruf);
		$data['materi'] = $materi;
		$data['huruf'] = $huruf;
		$this->load->view('Guru/soal', $data);
	}

	function tambahsoal($materi, $huruf){
		if ($materi == 'pengertian') {
			$materi = 'Pengertian & Manfaat';
			$huruf = NULL;
		}
		$data['profile'] = $this->Model_guru->profile($this->session->userdata('username'));
		$data['materi'] = $materi;
		$data['huruf'] = $huruf;
		$this->load->view('Guru/tambahsoal', $data);
	}

	function addsoal($materi, $huruf){
		if ($materi == 'pengertian') {
			$materi = 'Pengertian & Manfaat';
			$huruf = NULL;
		}else if($huruf == 'null'){
			$huruf = NULL;
		}
		$data['materi'] = $materi;
		$data['huruf'] = $huruf;

		if ($this->input->post('inlineRadioOptions') == 'teks') {
			if (empty($_FILES['gambarpertanyaan']['name'])) {
				$data['pertanyaan'] = $this->input->post('pertanyaan');
				for ($i=1; $i <= 5; $i++){
					$data['p'.$i] = $this->input->post('teks'.$i);
				}
				$data['jawaban'] = $this->input->post('jawaban');

			}else{
				$input = $_FILES['gambarpertanyaan']['tmp_name'];
				$temp = explode(".", $_FILES["gambarpertanyaan"]["name"]);
				$name = random_string('alpha', 8);
				$output = $name. '.' . end($temp);
				
				$folder = "./assets/img/soal/";
				$terupload = move_uploaded_file($input, $folder.$output);

				$data['pertanyaan'] = '<img style="width:30%;height:auto;" src="https://mpmh.sayagi.my.id/assets/img/soal/'.$output.'"><br>'.$this->input->post('pertanyaan');
				for ($i=1; $i <= 5; $i++){
					$data['p'.$i] = $this->input->post('teks'.$i);
				}
				$data['jawaban'] = $this->input->post('jawaban');
			}
		}else{
			if (empty($_FILES['gambarpertanyaan']['name'])) {
				$data['pertanyaan'] = $this->input->post('pertanyaan');
				for ($i=1; $i <= 5; $i++) { 
					$input = $_FILES['gambar'.$i]['tmp_name'];
					$temp = explode(".", $_FILES["gambar".$i]["name"]);
					$name = random_string('alpha', 8);
					$output = $name. '.' . end($temp);
					
					$folder = "./assets/img/soal/";
					$terupload = move_uploaded_file($input, $folder.$output);
					$data['p'.$i] = '<img style="width:100%;height:auto;" src="https://mpmh.sayagi.my.id/assets/img/soal/'.$output.'">';
				}
				$data['jawaban'] = $this->input->post('jawaban');

			}else{
				$input = $_FILES['gambarpertanyaan']['tmp_name'];
				$temp = explode(".", $_FILES["gambarpertanyaan"]["name"]);
				$name = random_string('alpha', 8);
				$output = $name. '.' . end($temp);
				
				$folder = "./assets/img/soal/";
				$terupload = move_uploaded_file($input, $folder.$output);

				$data['pertanyaan'] = '<img style="width:30%;height:auto;" src="https://mpmh.sayagi.my.id/assets/img/soal/'.$output.'"><br>'.$this->input->post('pertanyaan');

				for ($i=1; $i <= 5; $i++) { 
					$input = $_FILES['gambar'.$i]['tmp_name'];
					$temp = explode(".", $_FILES["gambar".$i]["name"]);
					$name = random_string('alpha', 8);
					$output = $name. '.' . end($temp);
					
					$folder = "./assets/img/soal/";
					$terupload = move_uploaded_file($input, $folder.$output);
					$data['p'.$i] = '<img style="width:100%;height:auto;" src="https://mpmh.sayagi.my.id/assets/img/soal/'.$output.'">';
				}

				$data['jawaban'] = $this->input->post('jawaban');
			}
		}

		$this->Model_guru->addsoal($data);
		if ($materi == 'Pengertian & Manfaat') {
			redirect(site_url('guru/soal/pengertian/null'));
		}else if ($huruf != NULL){
			redirect(site_url('guru/soal/'.$materi.'/'.$huruf));
		}else{
			redirect(site_url('guru/soal/'.$materi.'/null'));
		}
	}

	function hapussoal($id){
		$this->Model_guru->deletesoal($id);
		redirect($_SERVER['HTTP_REFERER']);
	}

	function edit($id){
		$data['profile'] = $this->Model_guru->profile($this->session->userdata('username'));
		$data['materi'] = $this->Model_guru->materibyId($id);

		$this->load->view('Guru/editmateri', $data);
	}

	function editmateri($id){
		if (empty($_FILES['gambar']['name'])){
			$data['uraian_materi'] = $this->input->post('uraian_materi');
			$data['tipstrik_materi'] = $this->input->post('tipstrik_materi');
			$this->session->set_flashdata('message', '<span class="text-success">Berhasil disimpan</span>');
		}else{
			$input = $_FILES['gambar']['tmp_name'];
			$temp = explode(".", $_FILES["gambar"]["name"]);
			$output = 'pengertian.' . end($temp);
			$data['uraian_materi'] = $this->input->post('uraian_materi');
			$data['tipstrik_materi'] = $this->input->post('tipstrik_materi');
			$data['gambar'] = $output;
			
			$folder = "./assets/img/materi/pengertian/";
			$terupload = move_uploaded_file($input, $folder.$output);

			if ($terupload) {
				$this->session->set_flashdata('message', '<span class="text-success">Berhasil disimpan</span>');
			}else{
				$this->session->set_flashdata('message', '<span class="text-danger">Gambar gagal diunggah</span>');
			}
		}
		$this->Model_guru->editmateri($data, $id);
	}

	function editsub($id){
		$data['profile'] = $this->Model_guru->profile($this->session->userdata('username'));
		$data['hijaiyah'] = $this->Model_guru->hijaiyah();
		$data['submateri'] = $this->Model_guru->submateribyId($id);

		$this->load->view('Guru/editsubmateri', $data);
	}

	function editsubmateri($id){
		if (empty($_FILES['video']['name'])){
			$data['nama_submateri'] = $this->input->post('nama');
			$data['huruf_submateri'] = $this->input->post('huruf');
			$data['icon'] = $this->input->post('icon');
			$data['uraian_singkat'] = $this->input->post('uraian');
			$this->session->set_flashdata('message', '<span class="text-success">Berhasil disimpan</span>');
		}else{
			$input = $_FILES['video']['tmp_name'];
			$temp = explode(".", $_FILES["video"]["name"]);
			$output = $this->input->post('nama') . '.' . end($temp);
			$data['nama_submateri'] = $this->input->post('nama');
			$data['huruf_submateri'] = $this->input->post('huruf');
			$data['icon'] = $this->input->post('icon');
			$data['uraian_singkat'] = $this->input->post('uraian');
			
			$folder = "./assets/video/submateri/";
			$terupload = move_uploaded_file($input, $folder.$output);

			if ($terupload) {
			    $data['video'] = $output;
				$this->session->set_flashdata('message', '<span class="text-success">Berhasil disimpan</span>');
				
			}else{
				$this->session->set_flashdata('message', '<span class="text-danger">Video gagal diunggah</span>');
			}
		}
		$this->Model_guru->editsubmateri($data, $id);
	}

	function tugas(){
		$data['profile'] = $this->Model_guru->profile($this->session->userdata('username'));
		$data['listmateri'] = $this->Model_guru->listmateri();
		$data['submateri'] = $this->Model_guru->submateri();
		$data['rekaman'] = $this->Model_guru->hasilrekaman();
		$data['guru'] = $this->Model_guru->guru();
		$this->load->view('Guru/tugas', $data);
	}

	function videotugas($id){
		$data['profile'] = $this->Model_guru->profile($this->session->userdata('username'));
		$data['listmateri'] = $this->Model_guru->listmateri();
		$data['rekaman'] = $this->Model_guru->hasilrekamanbyId($id);
		$this->load->view('Guru/videotugas', $data);
	}

	function nilaitugas($id, $username_user, $id_submateri){
		if ($this->input->post('status') == 'benar') {
			$data['status'] = "Sudah benar";
			$status = 3;
			$data['guru'] = $this->session->userdata('id');
			$data['pesan_guru'] = $this->input->post('pesan');
			$this->Model_guru->nilaitugas($data, $id);
			$this->Model_guru->updatetugas($id_submateri, $username_user, $status);
			$home['status_posting'] = 0;
			$home['username_user'] = $this->input->post('username_user');
			$home['nama_user'] = $this->input->post('nama_user');
			$home['isi_posting'] = $this->input->post('isi_posting');
			$home['video'] = $this->input->post('video');
			$home['video_materi'] = $this->input->post('video_materi');
			$home['video_submateri'] = $this->input->post('video_submateri');
			$this->Model_home->posting($home);
			$file = 'uploads/tugas/'.$this->input->post('video');
			$newfile = 'uploads/home/'.$this->input->post('video');
			copy($file, $newfile);
			$analitik['id_user'] = $id;
			$analitik['level_user'] = 3;
			$analitik['kegiatan'] = "bagikan";
			$analitik['materi'] = $this->input->post('video_materi');
			$analitik['huruf'] = $this->input->post('video_submateri');
			$this->Model_login->analitik($analitik);
			redirect(site_url('guru/tugassiswa'));
		}else{
			$input = $_FILES['video_guru']['tmp_name'];
			$output = $_FILES['video_guru']['name'].".webm";

			$folder = "uploads/koreksi/";
			$terupload = move_uploaded_file($input, $folder.$output);

			if ($terupload) {
				$data['status'] = "Belum benar";
				$data['guru'] = $this->session->userdata('id');
				$data['pesan_guru'] = $this->input->post('pesan');
				$data['video_guru'] = $output;
				$status = 2;
				$this->Model_guru->nilaitugas($data, $id);
				$this->Model_guru->updatetugas($id_submateri, $username_user, $status);
			}
		}
	}

	function evaluasi(){
		$data['profile'] = $this->Model_guru->profile($this->session->userdata('username'));
		$data['listmateri'] = $this->Model_guru->listmateri();
		$data['rekaman'] = $this->Model_guru->hasilevaluasi();
		$data['guru'] = $this->Model_guru->guru();

		$this->load->view('Guru/evaluasi', $data);
	}

	function videoevaluasi($id){
		$data['profile'] = $this->Model_guru->profile($this->session->userdata('username'));
		$data['listmateri'] = $this->Model_guru->listmateri();
		$data['rekaman'] = $this->Model_guru->hasilevaluasibyId($id);
		$this->load->view('Guru/videoevaluasi', $data);
	}

	function nilaievaluasi($id, $username_user){
		if ($this->input->post('nilai') < 0) {
			$this->session->set_flashdata('message', 'Nilai tidak boleh lebih kecil dari 0');
			redirect($_SERVER['HTTP_REFERER']);
		}else if ($this->input->post('nilai') > 100) {
			$this->session->set_flashdata('message', 'Nilai tidak boleh lebih besar dari 100');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$data['status'] = 'Sudah diperiksa';
			$data['guru'] = $this->session->userdata('id');
			$data['pesan_guru'] = $this->input->post('pesan');
			$data['nilai'] = $this->input->post('nilai');
			$this->Model_guru->nilaievaluasi($data, $id);
			$this->Model_guru->updateevaluasi($username_user);
			redirect(site_url('guru/evalsiswa'));
		}
	}
}
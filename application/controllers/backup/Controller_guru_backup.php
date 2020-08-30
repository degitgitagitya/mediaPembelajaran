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
		}else{
			$data['status'] = "Belum benar";
			$status = 2;
		}
		$data['guru'] = $this->session->userdata('id');
		$data['pesan_guru'] = $this->input->post('pesan');
		$this->Model_guru->nilaitugas($data, $id);
		$this->Model_guru->updatetugas($id_submateri, $username_user, $status);
		redirect(site_url('guru/tugassiswa'));
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
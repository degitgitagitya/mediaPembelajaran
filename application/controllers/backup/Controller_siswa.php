<?php
date_default_timezone_set('Asia/Jakarta');

class Controller_siswa extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		if (empty($this->session->userdata('id'))) {
			$this->session->set_flashdata('message', 'Sesi Anda telah habis, silahkan login kembali');
			redirect ('login');
		}

		$this->load->model('Model_siswa');
		$this->load->model('Model_guru');
		$this->load->model('Model_home');
		$this->load->model('Model_login');
	}

	function index(){
		$data['profile'] = $this->Model_siswa->profile($this->session->userdata('username'));
		$this->load->view('Home/beranda', $data);
	}

	function dashboard(){
		$data['profile'] = $this->Model_siswa->profile($this->session->userdata('username'));
		$data['status'] = $this->Model_siswa->selectstatusbyUsername($this->session->userdata('username'));
		$data['submateri'] = $this->Model_siswa->listsubmateri();
		$data['evaluasi'] = $this->Model_siswa->hasilevaluasi();
		$this->load->view('Siswa/dashboard', $data);
	}

	function pengertian(){
		$data['profile'] = $this->Model_siswa->profile($this->session->userdata('username'));
		$data['listmateri'] = $this->Model_siswa->listmateri();
		$this->load->view('Home/pengertian', $data);
	}

	function materi($no, $id){
		$data['profile'] = $this->Model_siswa->profile($this->session->userdata('username'));
		$data['listmateri'] = $this->Model_siswa->listmateri();
		$data['huruf'] = $this->Model_siswa->submateribyId($no, $id);
		$data['submateri'] = $this->Model_siswa->submateri($no);
		if ($no == 1) {
			$this->load->view('Siswa/aljauf', $data);
		}elseif ($no == 2) {
			$this->load->view('Siswa/alhalq', $data);
		}elseif ($no == 3) {
			$this->load->view('Siswa/allisan', $data);
		}elseif ($no == 4) {
			$this->load->view('Siswa/asysyafatain', $data);
		}else{
			$this->load->view('Siswa/alkhaisyum', $data);
		}
	}

	function tugas(){
		$data['profile'] = $this->Model_siswa->profile($this->session->userdata('username'));
		$data['listmateri'] = $this->Model_siswa->listmateri();
		$data['submateri'] = $this->Model_guru->submateri();
		$data['rekaman'] = $this->Model_siswa->hasilrekaman();
		$data['status'] = $this->Model_siswa->selectstatusbyUsername($this->session->userdata('username'));
		$data['guru'] = $this->Model_guru->guru();
		$this->load->view('Siswa/tugas', $data);
	}

	function rekamtugas($id_materi, $id_submateri){
		$data['profile'] = $this->Model_siswa->profile($this->session->userdata('username'));
		$data['listmateri'] = $this->Model_siswa->listmateri();
		$data['materi'] = $this->Model_guru->materibyId($id_materi);
		$data['submateri'] = $this->Model_guru->submateribyId($id_submateri);
		$data['status'] = $this->Model_siswa->koreksitugasbyid($id_materi, $id_submateri);
		$this->load->view('Siswa/rekamtugas', $data);
	}

	function uploadtugas($id){
		$input = $_FILES['video_data']['tmp_name'];
		$output = $_FILES['video_data']['name'].".webm";

		$folder = "uploads/tugas/";
		$terupload = move_uploaded_file($input, $folder.$output);

		if ($terupload) {
			$data['username'] = $this->session->userdata('id');
			$data['materi'] = $this->input->post('materi');
			$data['submateri'] = $this->input->post('submateri');
			$data['status'] = 'Sudah dikerjakan. Menunggu penilaian guru';
			$data['video'] = $output;
			$this->Model_siswa->uploadtugas($data, $id);
			$this->Model_siswa->updatetugas($id);
		}
	}

	function sharetugas(){
		$input = $_FILES['video_data']['tmp_name'];
		$output = $_FILES['video_data']['name'].".webm";

		$folder = "uploads/home/";
		$terupload = move_uploaded_file($input, $folder.$output);

		if ($terupload) {
			$data['status_posting'] = 0;
			$data['username_user'] = $this->session->userdata('username');
			$data['nama_user'] = $this->session->userdata('nama');
			$data['isi_posting'] = $this->input->post('isi');
			$data['video'] = $output;
			$data['waktu_posting'] = date('Y-m-d H:i:s');
			$this->Model_home->posting($data);
			$analitik['id_user'] = $this->session->userdata('id');
			$analitik['level_user'] = $this->session->userdata('level');
			$analitik['kegiatan'] = 'diskusi';
			$this->Model_login->analitik($analitik);
			$analitik2['id_user'] = $this->session->userdata('id');
			$analitik2['level_user'] = $this->session->userdata('level');
			$analitik2['kegiatan'] = 'bagikan';
			$this->Model_login->analitik($analitik2);
		}
	}
	
	function evaluasi(){
		$data['profile'] = $this->Model_siswa->profile($this->session->userdata('username'));
		$data['listmateri'] = $this->Model_siswa->listmateri();
		$data['rekaman'] = $this->Model_siswa->hasilevaluasi();
		$data['cek'] = $this->Model_siswa->selectstatusbyUsername($this->session->userdata('username'));
		$data['guru'] = $this->Model_guru->guru();
		$this->load->view('Siswa/evaluasi', $data);
	}

	function rekamevaluasi(){
		$data['profile'] = $this->Model_siswa->profile($this->session->userdata('username'));
		$data['listmateri'] = $this->Model_siswa->listmateri();
		$this->load->view('Siswa/rekamevaluasi', $data);
	}

	function uploadevaluasi(){
		$input = $_FILES['video_data']['tmp_name'];
		$output = $_FILES['video_data']['name'].".webm";

		$folder = "uploads/evaluasi/";
		$terupload = move_uploaded_file($input, $folder.$output);

		if ($terupload) {
			$data['username'] = $this->session->userdata('id');
			$data['status'] = 'Sudah mengerjakan';
			$data['video'] = $output;
			$this->Model_siswa->uploadevaluasi($data);
			$this->Model_siswa->updateevaluasi();
		}
	}

	function analitik($kegiatan){
		$data['id_user'] = $this->session->userdata('id');
		$data['level_user'] = $this->session->userdata('level');
		$data['kegiatan'] = $kegiatan;
		if ($this->Model_login->analitik($data)) {
			echo json_encode(['error' => '']);
		}else{
			echo json_encode(['error' => 'Terjadi kesalahan']);
		}
	}
}
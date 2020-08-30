<?php
date_default_timezone_set('Asia/Jakarta');

class Controller_home extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		if (empty($this->session->userdata('id'))) {
			$this->session->set_flashdata('message', 'Sesi Anda telah habis, silahkan login kembali');
			redirect ('login');
		}

		$this->load->model('Model_home');
		$this->load->model('Model_guru');
		$this->load->model('Model_login');
	}

	function index(){
		$data['profile'] = $this->Model_home->profile($this->session->userdata('username'));
		$data['jumlah'] = $this->Model_home->jumlahpost();
		$this->load->view('Home/index', $data);
	}

	function hitungpostbaru(){
		$jumlahbaru = $this->Model_home->jumlahpost()->hasil;
		$jumlahlama = $this->input->post('postlama');
		$kirim = $jumlahbaru-$jumlahlama;
		$dat = array(
			'error' => '',
			'jumlah' => $kirim
		);
		echo json_encode($dat);
	}

	function load_data(){
		$data['posting'] = $this->Model_home->listposting($this->input->post('limit'), $this->input->post('start'));
		/*$data['comment'] = $this->Model_home->listcomment(0, 0, 0);*/

		if ($data['posting']->num_rows() > 0){
			$dat['posting'] = $data['posting']->result();
			/*$dat['comment'] = $data['comment']->result();*/
			$this->load->view('Home/load_data', $dat);
		}
	}
	
	function posting(){
		$data['status_posting'] = 0;
		$data['username_user'] = $this->input->post('username');
		if ($this->session->userdata('level') == 1) {
			$data['nama_user'] = "Admin";
		}elseif ($this->session->userdata('level') == 2) {
			$data['nama_user'] = $this->input->post('nama') . " (Guru)";
		}else{
			$data['nama_user'] = $this->input->post('nama');
		}
		$data['isi_posting'] = $this->input->post('isi');
		$data['waktu_posting'] = date('Y-m-d H:i:s');

		$analitik['id_user'] = $this->session->userdata('id');
		$analitik['level_user'] = $this->session->userdata('level');
		$analitik['kegiatan'] = 'diskusi';
		$analitik['materi'] = NULL;
		$analitik['huruf'] = NULL;
		
		$this->Model_login->analitik($analitik);
		$this->Model_home->posting($data);
		echo json_encode(['error' => '']);
	}

	function editpost($id){
		$data['isi_posting'] = $this->input->post('isiedit');
		$data['edit_status'] = 1;
		if ($this->Model_home->editpost($data, $id)) {
			echo json_encode(['error' => '']);
		}else{
			echo json_encode(['error' => 'Terjadi kesalahan']);
		}
	}

	function hapuspost(){
		$id = $this->input->post('id');
		if ($this->Model_home->deletepost($id)) {
			echo json_encode(['error' => '']);
		}else{
			echo json_encode(['error' => 'Terjadi kesalahan']);
		}
	}

	function reportpost(){
		$data['id_posting'] = $this->input->post('id_posting');
		$data['id_user'] = $this->input->post('id_user');
		if ($this->Model_home->reportpost($data)) {
			echo json_encode(['error' => '']);
		}else{
			echo json_encode(['error' => 'Terjadi kesalahan']);
		}
	}

	function hapuscomment(){
		$id = $this->input->post('id');
		if ($this->Model_home->deletecomment($id)) {
			echo json_encode(['error' => '']);
		}else{
			echo json_encode(['error' => 'Terjadi kesalahan']);
		}
	}

	function reportcomment(){
		$data['id_posting'] = $this->input->post('id_posting');
		$data['id_user'] = $this->input->post('id_user');
		if ($this->Model_home->reportcomment($data)) {
			echo json_encode(['error' => '']);
		}else{
			echo json_encode(['error' => 'Terjadi kesalahan']);
		}
	}

	function comment(){
		$data['status_posting'] = $this->input->post('status');
		$data['username_user'] = $this->input->post('username');
		if ($this->session->userdata('level') == 1) {
			$data['nama_user'] = "Admin";
		}elseif ($this->session->userdata('level') == 2) {
			$data['nama_user'] = $this->input->post('nama') . " (Guru)";
		}else{
			$data['nama_user'] = $this->input->post('nama');
		}
		$data['isi_posting'] = $this->input->post('isi');
		if ($this->input->post('ada') == 'adavideo') {
			$data['video_materi'] = $this->input->post('video_materi');
			$data['video_submateri'] = $this->input->post('video_submateri');
		}
		$data['waktu_posting'] = date('Y-m-d H:i:s');
		/*$offset = $this->input->post('offset');*/
		$analitik['id_user'] = $this->session->userdata('id');
		$analitik['level_user'] = $this->session->userdata('level');
		$analitik['kegiatan'] = 'diskusi';
		$analitik['materi'] = NULL;
		$analitik['huruf'] = NULL;
		
		$this->Model_login->analitik($analitik);
		$this->Model_home->posting($data);
		$dat = array(
			'error' => '',
			/*'offset' => $offset,*/
			'id' => $this->input->post('status')
		);
		echo json_encode($dat);
	}

	function load_comment(){
		$data = $this->Model_home->listcomment($this->input->post('id')/*, $this->input->post('limit'), $this->input->post('offset')*/);

		if ($data->num_rows() > 0) {
			$dat['comment'] = $data->result();
			$this->load->view('Home/load_comment', $dat);
		}
	}

	function statusnilaishare(){
		$status = $this->Model_home->statusnilaishare($this->input->post('id_penilai'), $this->input->post('id_posting'));
		if ($status > 0) {
			echo json_encode(['ada' => 'ada']);
		}else{
			echo json_encode(['ada' => 'tidak ada']);
		}
	}

	function nilaishare(){
		$data['id_user'] = $this->input->post('id_user');
		$data['id_penilai'] = $this->input->post('id_penilai');
		$data['id_posting'] = $this->input->post('id_posting');
		$data['video_materi'] = $this->input->post('video_materi');
		$data['video_submateri'] = $this->input->post('video_submateri');
		$data['tempat'] = $this->input->post('tempat');
		$data['sifat'] = $this->input->post('sifat');
		$data['suara'] = $this->input->post('suara');
		if ($this->Model_home->nilaishare($data)) {
			echo json_encode(['error' => '']);
		}else{
			echo json_encode(['error' => 'Terjadi kesalahan']);
		}
	}

	function profile(){
		$data['profile'] = $this->Model_guru->profile($this->session->userdata('username'));
		$this->load->view('Home/profile', $data);
	}

	function sunting(){
		$data['profile'] = $this->Model_guru->profile($this->session->userdata('username'));
		$this->load->view('Home/suntingprofile', $data);
	}

	function suntingprofile($id){
		if ($this->input->post('username') != $this->session->userdata('username') && $this->Model_login->cekusername($this->input->post('username'))) {
			$this->session->set_flashdata('message', 'Username sudah terdaftar');
			redirect('suntingprofile');
		}else{
			if (empty($_FILES['gambar']['name'])){
				$data['username_user'] = $this->input->post('username');
				$data['nama_user'] = $this->input->post('nama');
				$this->session->set_flashdata('message', '<span class="text-success mt-2">Berhasil disimpan</span>');
			}else{
				$input = $_FILES['gambar']['tmp_name'];
				$temp = explode(".", $_FILES["gambar"]["name"]);
				$output = $this->input->post('username') . '.' . end($temp);
				$folder = "assets/img/profile/";
				$terupload = move_uploaded_file($input, $folder.$output);

				if ($terupload) {
					$this->session->set_flashdata('message', '<span class="text-success mt-2">Berhasil disimpan</span>');
				}else{
					$this->session->set_flashdata('message', '<span class="text-danger mt-2">Gambar gagal diunggah</span>');
				}

				$data['username_user'] = $this->input->post('username');
				$data['nama_user'] = $this->input->post('nama');
				$data['foto_user'] = $output;
			}

			$userdata = array(
				'username'    => $data['username_user'], 
				'nama'        => $data['nama_user']
			);
			$this->session->set_userdata($userdata);
			$this->Model_home->suntingprofile($data, $id);
		}
	}

	function password(){
		$data['profile'] = $this->Model_guru->profile($this->session->userdata('username'));
		$this->load->view('Home/ubahpassword', $data);
	}

	function ubahpassword($id){
		if ($this->input->post('pass') != $this->session->userdata('password')) {
			$this->session->set_flashdata('message', 'Password lama Anda salah');
			redirect('ubahpassword');
		}else if($this->input->post('pass2') != $this->input->post('pass3')){
			$this->session->set_flashdata('message', 'Password dan Konfirmasi Password tidak sama, silahkan ulang lagi');
			redirect('ubahpassword');
		}else{
			$data['password_user'] = $this->input->post('pass2');
			$this->Model_home->suntingprofile($data, $id);
		}

		$userdata = array(
			'password'    => $data['password_user'], 
		);
		$this->session->set_userdata($userdata);
		redirect('profile');
	}

	function jangantampil($kolom){
		$id = $this->input->post('id');
		if ($this->Model_home->jangantampil($id, $kolom)) {
			echo json_encode(['error' => '']);
		}else{
			echo json_encode(['error' => 'Terjadi kesalahan']);
		}
	}

}
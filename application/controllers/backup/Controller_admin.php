<?php
date_default_timezone_set('Asia/Jakarta');

class Controller_admin extends CI_Controller{
	
	function __construct(){
		parent::__construct();

		if (empty($this->session->userdata('id'))) {
			$this->session->set_flashdata('message', 'Sesi Anda telah habis, silahkan login kembali');
			redirect('login');
		}else if($this->session->userdata('level') == 2){
			redirect('guru');
		}else if ($this->session->userdata('level') == 3){
			redirect('siswa');
		}

		$this->load->model('Model_home');
		$this->load->model('Model_admin');
		$this->load->model('Model_guru');
		$this->load->model('Model_siswa');
	}

	function index(){
		$data['user'] = $this->Model_admin->alluser();
		$this->load->view('Admin/index', $data);
	}

	function tambahuser(){
		$this->load->view('Admin/tambahuser');
	}

	function adduser(){
		if($this->Model_login->cekusername($this->input->post('username'))){
			$this->session->set_flashdata('message', 'Username sudah terdaftar');
			redirect($_SERVER['HTTP_REFERER']);
		}elseif($this->input->post('pass') != $this->input->post('pass2')){
			$this->session->set_flashdata('message', 'Password dan Konfirmasi Password tidak sama, silahkan ulang lagi');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$data['username_user'] = $this->input->post('username');
			$data['nama_user'] = $this->input->post('nama');
			$data['password_user'] = $this->input->post('pass');
			$data['level_user'] = $this->input->post('level');
			$this->Model_admin->adduser($data);
			$this->session->set_flashdata('message', '<span class="text-success">Pengguna berhasil ditambahkan</span>');
			redirect('admin');
		}
	}

	function suntinguser($id){
		$data['user'] = $this->Model_admin->userbyId($id);
		$this->load->view('Admin/edituser', $data);
	}

	function edituser($id){
		if ($this->input->post('username') != $this->input->post('cek') && $this->Model_login->cekusername($this->input->post('username'))){
			$this->session->set_flashdata('message', 'Username sudah terdaftar');
			redirect($_SERVER['HTTP_REFERER']);
		}elseif($this->input->post('pass2') != $this->input->post('pass3')){
			$this->session->set_flashdata('message', 'Password dan Konfirmasi Password tidak sama, silahkan ulang lagi');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$data['username_user'] = $this->input->post('username');
			$data['nama_user'] = $this->input->post('nama');
			$data['password_user'] = $this->input->post('pass');
			$data['level_user'] = $this->input->post('level');
			$this->Model_admin->edituser($data, $id);
			$this->session->set_flashdata('message', '<span class="text-success">Pengguna berhasil disimpan</span>');
			redirect('admin');
		}
	}

	function deleteuser($id){
		$this->Model_admin->deleteuser($id);
		$this->session->set_flashdata('message', '<span class="text-success">Pengguna berhasil dihapus</span>');
		redirect($_SERVER['HTTP_REFERER']);
	}

	function alatukur(){
		$data['user'] = $this->Model_admin->alluser();
		$data['siswa'] = $this->Model_guru->siswa();
		$this->load->view('Admin/alatukur', $data);
	}

	function chart(){
		$user = $this->input->post('user');
		if ($this->input->post('tipe') == 'login') {
			if ($this->input->post('waktu') == 'hari') {
				for ($i=0; $i <= 23; $i++) { 
					$data['jam'][] = $i;
					$data['login'][] = $this->Model_admin->loginperjam($user, $i);
				}
				$data['labelx'] = 'Jam';
				$data['label'] = 'login';
				$this->load->view('Admin/chart', $data);
			}elseif($this->input->post('waktu') == 'minggu'){
				$awal = date('d')-6;
				$akhir = date('d');
				for ($i=$awal; $i <= $akhir; $i++) { 
					$data['tanggal'][] = $i;
					$data['login'][] = $this->Model_admin->loginperminggu($user, $i);
				}
				$data['labelx'] = 'Tanggal';
				$data['label'] = 'login';
				$this->load->view('Admin/chart', $data);
			}
		}elseif ($this->input->post('tipe') == 'playvideo') {
			if ($this->input->post('waktu') == 'hari') {
				for ($i=0; $i <= 23; $i++) { 
					$data['jam'][] = $i;
					$data['login'][] = $this->Model_admin->playperjam($user, $i);
				}
				$data['labelx'] = 'Jam';
				$data['label'] = 'memutar video';
				$this->load->view('Admin/chart', $data);
			}elseif ($this->input->post('waktu') == 'minggu') {
				$awal = date('d')-6;
				$akhir = date('d');
				for ($i=$awal; $i <= $akhir; $i++) { 
					$data['tanggal'][] = $i;
					$data['login'][] = $this->Model_admin->playperminggu($user, $i);
				}
				$data['labelx'] = 'Tanggal';
				$data['label'] = 'memutar video';
				$this->load->view('Admin/chart', $data);
			}
		}elseif ($this->input->post('tipe') == 'rekaman') {
			if ($this->input->post('waktu') == 'hari') {
				for ($i=0; $i <= 23; $i++) { 
					$data['jam'][] = $i;
					$data['login'][] = $this->Model_admin->rekamanperjam($user, $i);
				}
				$data['labelx'] = 'Jam';
				$data['label'] = 'rekaman';
				$this->load->view('Admin/chart', $data);
			}elseif ($this->input->post('waktu') == 'minggu') {
				$awal = date('d')-6;
				$akhir = date('d');
				for ($i=$awal; $i <= $akhir; $i++) { 
					$data['tanggal'][] = $i;
					$data['login'][] = $this->Model_admin->rekamanperminggu($user, $i);
				}
				$data['labelx'] = 'Tanggal';
				$data['label'] = 'rekaman';
				$this->load->view('Admin/chart', $data);
			}
		}elseif ($this->input->post('tipe') == 'playrecord') {
			if ($this->input->post('waktu') == 'hari') {
				for ($i=0; $i <= 23; $i++) { 
					$data['jam'][] = $i;
					$data['login'][] = $this->Model_guru->playrecordperjam($user, $i);
				}
				$data['labelx'] = 'Jam';
				$data['label'] = 'memutar rekaman sendiri';
				$this->load->view('Guru/chart', $data);
			}elseif ($this->input->post('waktu') == 'minggu') {
				$awal = date('d')-6;
				$akhir = date('d');
				for ($i=$awal; $i <= $akhir; $i++) { 
					$data['tanggal'][] = $i;
					$data['login'][] = $this->Model_guru->playrecordperminggu($user, $i);
				}
				$data['labelx'] = 'Tanggal';
				$data['label'] = 'memutar rekaman sendiri';
				$this->load->view('Guru/chart', $data);
			}
		}elseif ($this->input->post('tipe') == 'bagikan') {
			if ($this->input->post('waktu') == 'hari') {
				for ($i=0; $i <= 23; $i++) { 
					$data['jam'][] = $i;
					$data['login'][] = $this->Model_guru->bagikanperjam($user, $i);
				}
				$data['labelx'] = 'Jam';
				$data['label'] = 'membagikan hasil rekaman';
				$this->load->view('Guru/chart', $data);
			}elseif ($this->input->post('waktu') == 'minggu') {
				$awal = date('d')-6;
				$akhir = date('d');
				for ($i=$awal; $i <= $akhir; $i++) { 
					$data['tanggal'][] = $i;
					$data['login'][] = $this->Model_guru->bagikanperminggu($user, $i);
				}
				$data['labelx'] = 'Tanggal';
				$data['label'] = 'membagikan hasil rekaman';
				$this->load->view('Guru/chart', $data);
			}
		}elseif ($this->input->post('tipe') == 'diskusi') {
			if ($this->input->post('waktu') == 'hari') {
				for ($i=0; $i <= 23; $i++) { 
					$data['jam'][] = $i;
					$data['login'][] = $this->Model_admin->diskusiperjam($user, $i);
				}
				$data['labelx'] = 'Jam';
				$data['label'] = 'diskusi';
				$this->load->view('Admin/chart', $data);
			}elseif ($this->input->post('waktu') == 'minggu') {
				$awal = date('d')-6;
				$akhir = date('d');
				for ($i=$awal; $i <= $akhir; $i++) { 
					$data['tanggal'][] = $i;
					$data['login'][] = $this->Model_admin->diskusiperminggu($user, $i);
				}
				$data['labelx'] = 'Tanggal';
				$data['label'] = 'diskusi';
				$this->load->view('Admin/chart', $data);
			}
		}
	}

	function reported(){
		$data['profile'] = $this->Model_home->profile($this->session->userdata('username'));
		$this->load->view('Admin/reported', $data);
	}

	function load_data(){
		$data['posting'] = $this->Model_admin->listposting($this->input->post('limit'), $this->input->post('start'));
		$data['pelapor'] = $this->Model_admin->listpelapor();

		if ($data['posting']->num_rows() > 0){
			$dat['posting'] = $data['posting']->result();
			$dat['pelapor'] = $data['pelapor']->result();
			$this->load->view('Admin/load_data', $dat);
		}
	}
}

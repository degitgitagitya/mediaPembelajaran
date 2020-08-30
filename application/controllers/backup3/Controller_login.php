<?php

class Controller_login extends CI_Controller{

	function getlogin(){

		if($this->Model_login->getloginadmin($this->input->post('username'), $this->input->post('password'))){

			$data = $this->Model_login->selectByUsernameadmin($this->input->post('username'))->row_array();

			$userdata = array(
				'id'		  => $data['id_user'], 
				'username'    => $data['username_user'], 
				'password'    => $data['password_user'], 
				'nama'        => $data['nama_user'],
				'level'       => $data['level_user']
			);

			$this->session->set_userdata($userdata);
			redirect('admin');

		}elseif($this->Model_login->getloginguru($this->input->post('username'), $this->input->post('password'))){

			$data = $this->Model_login->selectByUsernameguru($this->input->post('username'))->row_array();

			$userdata = array(
				'id'	      => $data['id_user'], 
				'username'    => $data['username_user'], 
				'password'    => $data['password_user'], 
				'nama'        => $data['nama_user'],
				'level'       => $data['level_user']
			);

			$this->session->set_userdata($userdata);
			$analitik['id_user'] = $this->session->userdata('id');
			$analitik['level_user'] = $this->session->userdata('level');
			$analitik['kegiatan'] = 'login';
			$this->Model_login->analitik($analitik);
			redirect('guru');

		}elseif($this->Model_login->getloginsiswa($this->input->post('username'), $this->input->post('password'))){

			$data = $this->Model_login->selectByUsernamesiswa($this->input->post('username'))->row_array();

			$userdata = array(
				'id'		  => $data['id_user'], 
				'username'    => $data['username_user'], 
				'password'    => $data['password_user'], 
				'nama'        => $data['nama_user'],
				'level'       => $data['level_user']
			);

			$this->session->set_userdata($userdata);
			$analitik['id_user'] = $this->session->userdata('id');
			$analitik['level_user'] = $this->session->userdata('level');
			$analitik['kegiatan'] = 'login';
			$this->Model_login->analitik($analitik);
			redirect('siswa');

		}else{
			$this->session->set_flashdata('message', 'Username atau Password salah');
			redirect('login');
		}
	}

	function registrasi(){
		$this->load->view('Login/registrasi');
	}

	function regis(){
		if ($this->Model_login->cekusername($this->input->post('username'))){
			$this->session->set_flashdata('message', 'Username sudah terdaftar');
			redirect('register');
		}else if($this->input->post('pass') != $this->input->post('pass2')){
			$this->session->set_flashdata('message', 'Password dan Konfirmasi Password tidak sama, silahkan ulang lagi');
			redirect('register');
		}else{
			$data['username_user'] = $this->input->post('username');
			$data['password_user'] = $this->input->post('pass');
			$data['nama_user'] = $this->input->post('nama');
			$data['level_user'] = 3;

			$this->Model_login->regis($data);
			redirect('login');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

	function index(){
		if ($this->session->userdata('level') == 3) {
            redirect(site_url('siswa'));
        } else if ($this->session->userdata('level') == 2) {
            redirect(site_url('guru'));
        } else if ($this->session->userdata('level') == 1) {
            redirect(site_url('admin'));
        } else {
            $this->load->view('Login/login');
        }
	}

}
<?php

class Model_login extends CI_Model{

	function getloginadmin($username, $pwd){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('level_user', 1);
		$this->db->where('username_user', $username);
		$this->db->where('password_user', $pwd);

		if($this->db->get()->num_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}

	function getloginguru($username, $pwd){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('level_user', 2);
		$this->db->where('username_user', $username);
		$this->db->where('password_user', $pwd);

		if($this->db->get()->num_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}

	function getloginsiswa($username, $pwd){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('level_user', 3);
		$this->db->where('username_user', $username);
		$this->db->where('password_user', $pwd);

		if($this->db->get()->num_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}

	function selectByUsernameadmin($username){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('level_user', 1);
		$this->db->where('username_user', $username);

		return $this->db->get();
	}

	function selectByUsernameguru($username){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('level_user', 2);
		$this->db->where('username_user', $username);

		return $this->db->get();
	}

	function selectByUsernamesiswa($username){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('level_user', 3);
		$this->db->where('username_user', $username);

		return $this->db->get();
	}

	function cekusername($username){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username_user', $username);

		if($this->db->get()->num_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	function regis($data = array()){
		$this->db->insert('user', $data);
	}

	function analitik($data){
		$id_user = $this->session->userdata('id');
		$kegiatan = $data['kegiatan'];
		$materi = $data['materi'];
		$huruf = $data['huruf'];
		$query = $this->db->query("SELECT * FROM analitik WHERE id_user = '$id_user' AND kegiatan = '$kegiatan' AND materi = '$materi' AND huruf = '$huruf'");
		if (($kegiatan == 'rekam' && $query->num_rows() < 4) || ($kegiatan == 'playrecord' && $query->num_rows() < 5) || ($kegiatan == 'bagikan' && $query->num_rows() < 3) || $kegiatan == 'diskusi' || $kegiatan == 'login' || ($kegiatan == 'playvideo' && $query->num_rows() < 4) ) {
				$this->db->insert('analitik', $data);
		}
	}
	
}
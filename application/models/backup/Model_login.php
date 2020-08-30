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
		$this->db->insert('analitik', $data);
	}
	
}
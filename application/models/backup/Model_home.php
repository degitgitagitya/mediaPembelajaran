<?php

class Model_home extends CI_Model{

	function profile($username){
		$query = $this->db->query("SELECT * FROM user WHERE username_user = '$username'");
		return $query->result();
	}

	/*public function listposting(){
		$this->db->select('home.id_posting, home.status_posting, home.username_user, home.nama_user, home.isi_posting, home.waktu_posting, user.foto_user');
		$this->db->from('home');
		$this->db->join('user', 'home.username_user = user.username_user', 'inner');
		$this->db->where('status_posting', 0);
		$this->db->order_by('id_posting', 'desc');
		$query = $this->db->get();
        return $query->result();
	}*/

	/*public function listposting(){
		$query = $this->db->query("SELECT home.id_posting, home.status_posting, home.username_user, home.nama_user, home.isi_posting, home.waktu_posting, user.foto_user FROM home INNER JOIN user ON home.username_user = user.username_user WHERE status_posting = 0 ORDER BY id_posting DESC");
		return $query->result();
	}*/

	/*public function listposting($limit, $start){
		$query = $this->db->query("SELECT home.id_posting, home.status_posting, home.username_user, home.nama_user, home.isi_posting, home.waktu_posting, user.foto_user FROM home INNER JOIN user ON home.username_user = user.username_user WHERE status_posting = 0 ORDER BY id_posting DESC LIMIT $limit, $start");
		return $query;
	}*/
	
	function listposting($limit, $start){
		$this->db->select('home.id_posting, home.status_posting, home.username_user, home.nama_user, home.isi_posting, home.video, home.waktu_posting, home.edit_status, user.id_user, user.foto_user');
		$this->db->from('home');
		$this->db->join('user', 'home.username_user = user.username_user', 'inner');
		$this->db->where('status_posting', 0);
		$this->db->order_by('id_posting', 'desc');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query;
	}

	function jumlahpost(){
		$query = $this->db->query("SELECT count(id_posting) as hasil FROM home where status_posting = 0");
		return $query->row();
	}

	function editpost($data, $id){
		$this->db->set($data);
		$this->db->where('id_posting', $id);

		if ($this->db->update('home')) {
			return true;
		}else{
			return false;
		}
	}

	function deletepost($id){
		$query = $this->db->query("SELECT * FROM home WHERE id_posting = '$id'")->row();
		$this->db->where('id_posting', $id);
		if ($this->db->delete('home')) {
			if ($query->video != NULL){
				unlink("./uploads/home/$query->video");
			}
			$this->db->where('status_posting', $id);
			$this->db->delete('home');
			return true;
		}else{
			return false;
		}
	}

	function reportpost($data){
		$user = $data['id_user'];
		$id = $data['id_posting'];

		$report = $this->db->query("SELECT * FROM reported_post WHERE id_posting = '$id'");
		$reporter = $this->db->query("SELECT * FROM reporter_post WHERE id_user = '$user' AND id_posting = '$id'");

		if ($report->num_rows() == 0) {
			$this->db->query("INSERT INTO reported_post SELECT * FROM home WHERE id_posting = '$id'");
			$this->db->insert('reporter_post', $data);
			return true;
		}elseif ($reporter->num_rows() == 0) {
			if ($this->db->insert('reporter_post', $data)) {
				return true;
			}else{
				return false;
			}
		}else{
			return true;
		}
	}

	function listcomment($id/*, $limit, $start*/){
		$this->db->select('home.id_posting, home.status_posting, home.username_user, home.nama_user, home.isi_posting, home.waktu_posting, user.id_user, user.foto_user');
		$this->db->from('home');
		$this->db->join('user', 'home.username_user = user.username_user', 'inner');
		if ($id != 0) {
			$this->db->where('status_posting', $id);
			/*$this->db->limit($limit, $start);*/
		}
		$query = $this->db->get();
		return $query;
	}

	function deletecomment($id){
		$this->db->where('id_posting', $id);
		if ($this->db->delete('home')){
			return true;
		}else{
			return false;
		}
	}

	function reportcomment($data){
		$user = $data['id_user'];
		$id = $data['id_posting'];

		$report = $this->db->query("SELECT * FROM reported_post WHERE id_posting = '$id'");
		$reporter = $this->db->query("SELECT * FROM reporter_post WHERE id_user = '$user' AND id_posting = '$id'");
		$count = $this->db->query("SELECT * FROM reporter_post WHERE id_posting = '$id'");

		if($count->num_rows() >= 9) {
			$this->db->where('id_posting', $id);
			if ($this->db->delete('home')){
				$this->db->where('id_posting', $id);
				return true;
			}
		}elseif ($report->num_rows() == 0) {
			$this->db->query("INSERT INTO reported_post SELECT * FROM home WHERE id_posting = '$id'");
			$this->db->insert('reporter_post', $data);
			return true;
		}elseif($reporter->num_rows() == 0) {
			$this->db->insert('reporter_post', $data);
			return true;
		}else{
			return true;
		}
	}

	function posting($data = array()){
		$this->db->insert('home', $data);
	}

	function suntingprofile($data, $id){
		$this->db->set($data);
		$this->db->where('id_user', $id);
		$this->db->update('user');
	}

	function jangantampil($id, $kolom){
		$this->db->set($kolom, 1);
		$this->db->where('id_user', $id);
		if ($this->db->update('user')) {
			return true;
		}else{
			return false;
		}
	}
}
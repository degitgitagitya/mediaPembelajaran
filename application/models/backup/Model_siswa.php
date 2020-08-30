<?php

class Model_siswa extends CI_Model{

	function profile($username){
		$query = $this->db->query("SELECT * FROM user WHERE username_user = '$username'");
		return $query->result();
	}

	function editprofile($data, $username){
        $this->db->set($data);
        $this->db->where('username_user', $username);
        $this->db->update('user');
    }

	function upload($data = array()){
		$this->db->insert('recorder', $data);
	}

	function listmateri(){
		$query = $this->db->query("SELECT * FROM materi");
		return $query->result();
	}

	function listsubmateri(){
		$query = $this->db->query("SELECT * FROM submateri");
		return $query->result();
	}

	function submateri($no){
		$query = $this->db->query("SELECT * FROM submateri WHERE id_materi = '$no'");
		return $query->result();
	}

	function submateribyId($no, $id){
		$query = $this->db->query("SELECT * FROM submateri WHERE id_materi = '$no' AND id_submateri = '$id'");
		return $query->row();
	}

	function terkecil($no){
		$query = $this->db->query("SELECT min(id_submateri) as terkecil FROM submateri WHERE id_materi = '$no'");
		return $query->result();
	}

	function selectstatusbyUsername($username){
		$query = $this->db->query("SELECT * FROM status_tugas WHERE username = '$username'");
		return $query->row_array();
	}

	function hasilrekaman(){
		$user = $this->session->userdata('id');
		$query = $this->db->query("SELECT * FROM rekaman_tugas WHERE username = '$user'");
		return $query->result();
	}

	function koreksitugasbyid($id_materi, $id_submateri){
		$username = $this->session->userdata('username');
		$id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->from('status_tugas');
		$this->db->where('username', $username);
		$this->db->where('tugas'.$id_submateri, '2');
		/*$status = $this->db->query("SELECT * FROM status_tugas WHERE username = '$username' AND tugas'$id_submateri' = 2");*/
		$status = $this->db->get();
		if ($status->num_rows() > 0) {
		}
			$query = $this->db->query("SELECT * FROM rekaman_tugas WHERE username = '$id' AND materi = '$id_materi' AND submateri = '$id_submateri'");
			return $query->row();
	}

	function uploadtugas($data, $id){
		$id_user = $this->session->userdata('id');

		$query = $this->db->query("SELECT * FROM rekaman_tugas WHERE username = '$id_user' AND submateri = '$id'");
		if ($query->num_rows() > 0) {
			$data['guru'] = null;
			$data['pesan_guru'] = null;
			$data['video_guru'] = null;
			$this->db->set($data);
			$this->db->where('username', $id_user);
			$this->db->where('submateri', $id);
			$this->db->update('rekaman_tugas');
		}else{
			$this->db->insert('rekaman_tugas', $data);
		}
	}

	function updatetugas($id){
		$user = $this->session->userdata('username');
		$this->db->set('tugas'.$id, '1');
		$this->db->where('username', $user);
		$this->db->update('status_tugas');
	}

	function hasilevaluasi(){
		$user = $this->session->userdata('id');
		$query = $this->db->query("SELECT * FROM rekaman_evaluasi WHERE username = '$user'");
		return $query->row_array();
	}

	function uploadevaluasi($data){
		$id_user = $this->session->userdata('id');

		$query = $this->db->query("SELECT * FROM rekaman_evaluasi WHERE username = '$id_user'");
		if ($query->num_rows() > 0) {
			$data['guru'] = null;
			$data['pesan_guru'] = null;
			$this->db->set($data);
			$this->db->where('username', $id_user);
			$this->db->update('rekaman_evaluasi');
		}else{
			$this->db->insert('rekaman_evaluasi', $data);
		}
	}

	function updateevaluasi(){
		$user = $this->session->userdata('username');
		$this->db->set('evaluasi', '1');
		$this->db->where('username', $user);
		$this->db->update('status_tugas');
	}
}
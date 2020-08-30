<?php

class Model_admin extends CI_Model{
	
	function alluser(){
		$query = $this->db->query("SELECT * FROM user");
		return $query->result();
	}

	function adduser($data){
		$this->db->insert('user', $data);
	}

	function userbyId($id){
		$query = $this->db->query("SELECT * FROM user WHERE id_user = '$id'");
		return $query->row();
	}

	function edituser($data, $id){
		$this->db->set($data);
		$this->db->where('id_user', $id);
		$this->db->update('user');
	}

	function deleteuser($id){
		$query = $this->db->query("SELECT * FROM user WHERE id_user = '$id'");
		$cek = $query->row();

		if ($cek->foto_user != 'default.png') {
			unlink("./assets/img/profile/$cek->foto_user");
		}

		$this->db->where('id_user', $id);
		$this->db->delete('user');
	}

	function listposting($limit, $start){
		$this->db->select('reported_post.id_posting,reported_post.status_posting, reported_post.username_user, reported_post.nama_user, reported_post.isi_posting, reported_post.video, reported_post.waktu_posting, reported_post.edit_status, user.id_user, user.foto_user');
		$this->db->from('reported_post');
		$this->db->join('user', 'reported_post.username_user = user.username_user', 'inner');
		$this->db->where('status_posting', 0);
		$this->db->order_by('id_posting', 'desc');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query;
	}

	function listpelapor(){
		$this->db->select('reporter_post.id_posting, reporter_post.id_user as pelapor, user.nama_user, user.foto_user');
		$this->db->from('user');
		$this->db->join('reporter_post', 'user.id_user = reporter_post.id_user', 'inner');
		$query = $this->db->get();
		return $query;
	}

	function loginperjam($user, $jam){
		if ($user == 'semua') {
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE kegiatan = 'login' AND date(waktu) = date(now()) AND hour(waktu) = '$jam'");
		}else{
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE id_user = '$user' AND kegiatan = 'login' AND date(waktu) = date(now()) AND hour(waktu) = '$jam'");
		}
		return $query->row();
	}

	function loginperminggu($user, $hari){
		if ($user == 'semua') {
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE kegiatan = 'login' AND year(waktu) = year(now()) AND month(waktu) = month(now()) AND day(waktu) = '$hari'");
		}else{
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE id_user = '$user' AND kegiatan = 'login' AND year(waktu) = year(now()) AND month(waktu) = month(now()) AND day(waktu) = '$hari'");
		}
		return $query->row();
	}

	function playperjam($user, $jam){
		if ($user == 'semua') {
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE kegiatan = 'playvideo' AND date(waktu) = date(now()) AND hour(waktu) = '$jam'");
		}else{
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE id_user = '$user' AND kegiatan = 'playvideo' AND date(waktu) = date(now()) AND hour(waktu) = '$jam'");
		}
		return $query->row();
	}

	function playperminggu($user, $hari){
		if ($user == 'semua') {
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE kegiatan = 'playvideo' AND year(waktu) = year(now()) AND month(waktu) = month(now()) AND day(waktu) = '$hari'");
		}else{
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE id_user = '$user' AND kegiatan = 'playvideo' AND year(waktu) = year(now()) AND month(waktu) = month(now()) AND day(waktu) = '$hari'");
		}
		return $query->row();
	}

	function rekamanperjam($user, $jam){
		if ($user == 'semua') {
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE kegiatan = 'rekam' AND date(waktu) = date(now()) AND hour(waktu) = '$jam'");
		}else{
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE id_user = '$user' AND kegiatan = 'rekam' AND date(waktu) = date(now()) AND hour(waktu) = '$jam'");
		}
		return $query->row();
	}

	function rekamanperminggu($user, $hari){
		if ($user == 'semua') {
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE kegiatan = 'rekam' AND year(waktu) = year(now()) AND month(waktu) = month(now()) AND day(waktu) = '$hari'");
		}else{
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE id_user = '$user' AND kegiatan = 'rekam' AND year(waktu) = year(now()) AND month(waktu) = month(now()) AND day(waktu) = '$hari'");
		}
		return $query->row();
	}

	function diskusiperjam($user, $jam){
		if ($user == 'semua') {
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE kegiatan = 'diskusi' AND date(waktu) = date(now()) AND hour(waktu) = '$jam'");
		}else{
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE id_user = '$user' AND kegiatan = 'diskusi' AND date(waktu) = date(now()) AND hour(waktu) = '$jam'");
		}
		return $query->row();
	}

	function diskusiperminggu($user, $hari){
		if ($user == 'semua') {
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE kegiatan = 'diskusi' AND year(waktu) = year(now()) AND month(waktu) = month(now()) AND day(waktu) = '$hari'");
		}else{
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE id_user = '$user' AND kegiatan = 'diskusi' AND year(waktu) = year(now()) AND month(waktu) = month(now()) AND day(waktu) = '$hari'");
		}
		return $query->row();
	}
}
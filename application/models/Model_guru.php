<?php

class Model_guru extends CI_Model{
	
	function profile($username){
		$query = $this->db->query("SELECT * FROM user WHERE username_user = '$username'");
		return $query->result();
	}

	function siswa(){
		$query = $this->db->query("SELECT * FROM user WHERE level_user = 3");
		return $query->result();
	}

	function siswabyId($id){
		$query = $this->db->query("SELECT * FROM user WHERE id_user = '$id'");
		return $query->row();
	}

	function aktivitas(){
		$query = $this->db->query("SELECT * FROM analitik WHERE level_user = '3'");
		return $query->result();
	}

	function aktivitasbyId($id){
		$query = $this->db->query("SELECT * FROM analitik WHERE id_user = '$id'");
		return $query->result();
	}

	function forum(){
		$query = $this->db->query("SELECT * FROM home");
		return $query->result();
	}

	function forumbyUser($username){
		$query = $this->db->query("SELECT * FROM home WHERE username_user = '$username'");
		return $query->result();
	}

	function listmateri(){
		$query = $this->db->query("SELECT * FROM materi");
		return $query->result();
	}

	function submateri(){
		$query = $this->db->query("SELECT * FROM submateri");
		return $query->result();
	}

	function materibyId($id){
		$query = $this->db->query("SELECT * FROM materi WHERE id_materi = '$id'");
		return $query->row();
	}

	function submateribyId($id){
		$query = $this->db->query("SELECT * FROM submateri WHERE id_submateri = '$id'");
		return $query->row();
	}

	function hijaiyah(){
		$query = $this->db->query("SELECT * FROM hijaiyah");
		return $query->result();	
	}

	function editmateri($data, $id){
		$this->db->set($data);
		$this->db->where('id_materi', $id);
		$this->db->update('materi');
	}

	function editsubmateri($data, $id){
		$this->db->set($data);
		$this->db->where('id_submateri', $id);
		$this->db->update('submateri');
	}

	function addsoal($data){
		$this->db->insert('soal', $data);
	}

	function deletesoal($id){
		$this->db->where('id', $id);
		$this->db->delete('soal');
	}

	function ranking($data){
		$id = $data['id_user'];
		$materi = $data['video_materi'];
		$sub = $data['video_submateri'];
		$query = $this->db->query("SELECT * FROM ranking WHERE id_user = '$id' AND video_materi = '$materi' AND video_submateri = '$sub'");
		if ($query->num_rows() > 0) {
			$this->db->set($data);
			$this->db->where('id_user', $id);
			$this->db->where('video_materi', $materi);
			$this->db->where('video_submateri', $sub);
			$this->db->update('ranking');
		}else{
			$this->db->insert('ranking', $data);
		}
	}

	function rankingAll($materi, $sub){
		$query = $this->db->query("SELECT user.nama_user, ranking.id_user, ranking.video_materi, ranking.video_submateri, ranking.nilai_akhir, ranking.jumlah_video, ranking.jumlah_penilai FROM ranking JOIN user ON ranking.id_user = user.id_user WHERE ranking.video_materi = '$materi' AND ranking.video_submateri = '$sub' ORDER BY nilai_akhir DESC");
		return $query->result();
	}

	function nilaireflect($data){
		$id = $data['id_user'];
		$id_posting = $data['id_posting'];
		$query = $this->db->query("SELECT * FROM penilaianreflect WHERE id_user = '$id' AND id_posting = '$id_posting'");
		if ($query->num_rows() > 0) {
			$this->db->set($data);
			$this->db->where('id_user', $id);
			$this->db->where('id_posting', $id_posting);
			$this->db->update('penilaianreflect');
		}else{
			$this->db->insert('penilaianreflect', $data);
		}
	}

	function statusnilaireflect($data){
		$id_posting = $data['id_posting'];
		$query = $this->db->query("SELECT * FROM penilaianreflect WHERE id_posting = '$id_posting'");
		return $query;
	}

	function createplaybyId($id){
		$query = $this->db->query("SELECT * FROM penilaiancreateplay WHERE id_user = '$id'");
		return $query->result();
	}

	function sharebyId($id){
		$query = $this->db->query("SELECT user.nama_user, penilaianshare.id_user, penilaianshare.id_penilai, penilaianshare.id_posting, penilaianshare.video_materi, penilaianshare.video_submateri, penilaianshare.tempat, penilaianshare.sifat, penilaianshare.suara FROM penilaianshare JOIN user ON user.id_user = penilaianshare.id_penilai WHERE penilaianshare.id_user = '$id'");
		return $query->result();
	}

	function reflectbyId($id){
		$query = $this->db->query("SELECT * FROM penilaianreflect WHERE id_user = '$id'");
		return $query->result();
	}

	function forumbyMateriSub($username, $materi, $sub){
		$query = $this->db->query("SELECT user.id_user, home.id_posting, home.status_posting, home.video, home.video_materi, home.video_submateri, home.waktu_posting FROM home JOIN user ON home.username_user = user.username_user WHERE home.status_posting = 0 AND home.username_user = '$username' AND video_materi = '$materi' AND video_submateri = '$sub' ORDER BY id_posting DESC");
		return $query->result();
	}

	function hasilrekaman(){
		/*$query = $this->db->query("SELECT * FROM submateri RIGHT JOIN rekaman_tugas ON submateri.id_submateri = rekaman_tugas.submateri");*/
		$query = $this->db->query("SELECT submateri.id_materi, submateri.nama_submateri, submateri.huruf_submateri, rekaman_tugas.id, rekaman_tugas.status, rekaman_tugas.guru, rekaman_tugas.pesan_guru, user.nama_user FROM submateri RIGHT JOIN rekaman_tugas ON submateri.id_submateri = rekaman_tugas.submateri RIGHT JOIN user ON rekaman_tugas.username = user.id_user ORDER BY rekaman_tugas.id DESC");
		return $query->result();
	}

	function hasilrekamanbyId($id){
		$query = $this->db->query("SELECT submateri.id_materi, submateri.nama_submateri, submateri.huruf_submateri, rekaman_tugas.id, rekaman_tugas.materi, rekaman_tugas.submateri, rekaman_tugas.video, materi.nama_materi, materi.arab_materi, user.username_user, user.nama_user FROM submateri RIGHT JOIN rekaman_tugas ON submateri.id_submateri = rekaman_tugas.submateri RIGHT JOIN user ON rekaman_tugas.username = user.id_user RIGHT JOIN materi ON rekaman_tugas.materi = materi.id_materi WHERE rekaman_tugas.id = '$id'");
		return $query->row();
	}

	function guru(){
		$query = $this->db->query("SELECT id_user, nama_user FROM user WHERE level_user = '2'");
		return $query->result();
	}

	function nilaitugas($data, $id){
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('rekaman_tugas');
	}

	function updatetugas($id_submateri, $username_user, $status){
		$this->db->set('tugas'.$id_submateri, $status);
		$this->db->where('username', $username_user);
		$this->db->update('status_tugas');	
	}

	function hasilevaluasi(){
		$query = $this->db->query("SELECT rekaman_evaluasi.id, rekaman_evaluasi.status, rekaman_evaluasi.guru, rekaman_evaluasi.pesan_guru, rekaman_evaluasi.nilai, user.id_user, user.nama_user FROM rekaman_evaluasi JOIN user ON rekaman_evaluasi.username = user.id_user ORDER BY rekaman_evaluasi.id DESC");
		return $query->result();
	}

	function hasilevaluasibyId($id){
		$query = $this->db->query("SELECT rekaman_evaluasi.id, rekaman_evaluasi.video, user.username_user, user.nama_user FROM rekaman_evaluasi JOIN user ON rekaman_evaluasi.username = user.id_user WHERE rekaman_evaluasi.id = '$id'");
		return $query->row();
	}

	function nilaievaluasi($data, $id){
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('rekaman_evaluasi');
	}

	function updateevaluasi($username_user){
		$this->db->set('evaluasi', 2);
		$this->db->where('username', $username_user);
		$this->db->update('status_tugas');
	}

	function loginperjam($siswa, $jam){
		if ($siswa == 'semua') {
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE level_user = 3 AND kegiatan = 'login' AND date(waktu) = date(now()) AND hour(waktu) = '$jam'");
		}else{
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE id_user = '$siswa' AND kegiatan = 'login' AND date(waktu) = date(now()) AND hour(waktu) = '$jam'");
		}
		return $query->row();
	}

	function loginperminggu($siswa, $hari){
		if ($siswa == 'semua') {
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE level_user = 3 AND kegiatan = 'login' AND year(waktu) = year(now()) AND month(waktu) = month(now()) AND day(waktu) = '$hari'");
		}else{
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE id_user = '$siswa' AND kegiatan = 'login' AND year(waktu) = year(now()) AND month(waktu) = month(now()) AND day(waktu) = '$hari'");
		}
		return $query->row();
	}

	function playperjam($siswa, $jam){
		if ($siswa == 'semua') {
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE level_user = 3 AND kegiatan = 'playvideo' AND date(waktu) = date(now()) AND hour(waktu) = '$jam'");
		}else{
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE id_user = '$siswa' AND kegiatan = 'playvideo' AND date(waktu) = date(now()) AND hour(waktu) = '$jam'");
		}
		return $query->row();
	}

	function playperminggu($siswa, $hari){
		if ($siswa == 'semua') {
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE level_user = 3 AND kegiatan = 'playvideo' AND year(waktu) = year(now()) AND month(waktu) = month(now()) AND day(waktu) = '$hari'");
		}else{
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE id_user = '$siswa' AND kegiatan = 'playvideo' AND year(waktu) = year(now()) AND month(waktu) = month(now()) AND day(waktu) = '$hari'");
		}
		return $query->row();
	}

	function rekamanperjam($siswa, $jam){
		if ($siswa == 'semua') {
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE level_user = 3 AND kegiatan = 'rekam' AND date(waktu) = date(now()) AND hour(waktu) = '$jam'");
		}else{
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE id_user = '$siswa' AND kegiatan = 'rekam' AND date(waktu) = date(now()) AND hour(waktu) = '$jam'");
		}
		return $query->row();
	}

	function rekamanperminggu($siswa, $hari){
		if ($siswa == 'semua') {
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE level_user = 3 AND kegiatan = 'rekam' AND year(waktu) = year(now()) AND month(waktu) = month(now()) AND day(waktu) = '$hari'");
		}else{
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE id_user = '$siswa' AND kegiatan = 'rekam' AND year(waktu) = year(now()) AND month(waktu) = month(now()) AND day(waktu) = '$hari'");
		}
		return $query->row();
	}

	function playrecordperjam($siswa, $jam){
		if ($siswa == 'semua') {
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE level_user = 3 AND kegiatan = 'playrecord' AND date(waktu) = date(now()) AND hour(waktu) = '$jam'");
		}else{
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE id_user = '$siswa' AND kegiatan = 'playrecord' AND date(waktu) = date(now()) AND hour(waktu) = '$jam'");
		}
		return $query->row();
	}

	function playrecordperminggu($siswa, $hari){
		if ($siswa == 'semua') {
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE level_user = 3 AND kegiatan = 'playrecord' AND year(waktu) = year(now()) AND month(waktu) = month(now()) AND day(waktu) = '$hari'");
		}else{
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE id_user = '$siswa' AND kegiatan = 'playrecord' AND year(waktu) = year(now()) AND month(waktu) = month(now()) AND day(waktu) = '$hari'");
		}
		return $query->row();
	}

	function bagikanperjam($siswa, $jam){
		if ($siswa == 'semua') {
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE level_user = 3 AND kegiatan = 'bagikan' AND date(waktu) = date(now()) AND hour(waktu) = '$jam'");
		}else{
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE id_user = '$siswa' AND kegiatan = 'bagikan' AND date(waktu) = date(now()) AND hour(waktu) = '$jam'");
		}
		return $query->row();
	}

	function bagikanperminggu($siswa, $hari){
		if ($siswa == 'semua') {
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE level_user = 3 AND kegiatan = 'bagikan' AND year(waktu) = year(now()) AND month(waktu) = month(now()) AND day(waktu) = '$hari'");
		}else{
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE id_user = '$siswa' AND kegiatan = 'bagikan' AND year(waktu) = year(now()) AND month(waktu) = month(now()) AND day(waktu) = '$hari'");
		}
		return $query->row();
	}

	function diskusiperjam($siswa, $jam){
		if ($siswa == 'semua') {
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE level_user = 3 AND kegiatan = 'diskusi' AND date(waktu) = date(now()) AND hour(waktu) = '$jam'");
		}else{
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE id_user = '$siswa' AND kegiatan = 'diskusi' AND date(waktu) = date(now()) AND hour(waktu) = '$jam'");
		}
		return $query->row();
	}

	function diskusiperminggu($siswa, $hari){
		if ($siswa == 'semua') {
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE level_user = 3 AND kegiatan = 'diskusi' AND year(waktu) = year(now()) AND month(waktu) = month(now()) AND day(waktu) = '$hari'");
		}else{
			$query = $this->db->query("SELECT count(waktu) as waktu FROM analitik WHERE id_user = '$siswa' AND kegiatan = 'diskusi' AND year(waktu) = year(now()) AND month(waktu) = month(now()) AND day(waktu) = '$hari'");
		}
		return $query->row();
	}
}
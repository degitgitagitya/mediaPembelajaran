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

	function creativelearning(){
		$id_user = $this->session->userdata('id');
		$data['profile'] = $this->Model_siswa->profile($this->session->userdata('username'));
		$data['siswa'] = $this->Model_guru->siswabyId($id_user);
		$data['materi'] = $this->Model_guru->listmateri();
		$data['submateri'] = $this->Model_guru->submateri();
		$data['aktivitas'] = $this->Model_guru->aktivitasbyId($id_user);
		$data['forum'] = $this->Model_guru->forumbyUser($this->session->userdata('username'));
		$data['status'] = $this->Model_siswa->selectstatusbyUsername($this->session->userdata('username'));
		$data['createplay'] = $this->Model_guru->createplaybyId($id_user);
		$data['share'] = $this->Model_guru->sharebyId($id_user);
		$data['reflect'] = $this->Model_guru->reflectbyId($id_user);
		foreach ($data['materi'] as $datmateri) {
			$id = $datmateri->id_materi;
			foreach ($data['submateri'] as $datsub) {
				if ($id == $datsub->id_materi) {
					$data['nilai'][$datsub->id_submateri] = $this->Model_siswa->nilaisoalhuruf($id_user, $datmateri->nama_materi, $datsub->nama_submateri);
				}
			}
		}
		$this->load->view('Siswa/creative', $data);
	}

	function rincianshare($id, $nama_materi, $nama_submateri){
		$data['profile'] = $this->Model_guru->profile($this->session->userdata('username'));
		$data['siswa'] = $this->Model_guru->siswabyId($this->session->userdata('id'));
		$username = $data['siswa']->username_user;
		$data['forum'] = $this->Model_guru->forumbyMateriSub($username, $nama_materi, $nama_submateri);
		$data['share'] = $this->Model_guru->sharebyId($this->session->userdata('id'));
		$data['nama_sub'] = $nama_submateri;
		$this->load->view('Siswa/rincianshare', $data);
	}

	function rincianreflect($id, $nama_materi, $nama_submateri){
		$data['profile'] = $this->Model_guru->profile($this->session->userdata('username'));

		$data['siswa'] = $this->Model_guru->siswabyId($this->session->userdata('id'));
		$username = $data['siswa']->username_user;
		$data['forum'] = $this->Model_guru->forumbyMateriSub($username, $nama_materi, $nama_submateri);
		$data['ranking'] = $this->Model_guru->rankingAll($nama_materi, $nama_submateri);
		$data['share'] = $this->Model_guru->sharebyId($this->session->userdata('id'));
		$data['nama_materi'] = $nama_materi;
		$data['nama_sub'] = $nama_submateri;
		$this->load->view('Siswa/rincianreflect', $data);
	}

	function statusnilaireflect(){
		$data['id_posting'] = $this->input->post('id_posting');
		$status = $this->Model_siswa->statusnilaireflect($data);
		if ($status->num_rows() > 0) {
			$data = $status->row();
			echo json_encode(['tempat' => $data->tempat, 'sifat' => $data->sifat, 'suara' => $data->suara, 'saran' => $data->saran_guru]);
		}
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
		$data['status'] = $this->Model_siswa->selectstatusbyUsername($this->session->userdata('username'));
		$this->load->view('Home/pengertian', $data);
	}

	function soal($materi, $huruf){
		if ($materi == 'pengertian') {
			$materi = 'Pengertian & Manfaat';
			$huruf = NULL;
		}else if($huruf == 'null'){
			$huruf = NULL;
		}
		$data['profile'] = $this->Model_siswa->profile($this->session->userdata('username'));
		$data['soal'] = $this->Model_siswa->soal($materi, $huruf);
		$data['materi'] = $materi;
		$data['huruf'] = $huruf;
		$this->load->view('Siswa/soal', $data);
	}

	function simpanjawaban(){
		$data = $this->input->post();
        foreach ($data['jawaban'] as $key) {
            $dataa[] = array(
                'id_user' => $this->session->userdata('id'),
                'id_soal' => $key['id'],
                'materi' => $key['materi'],
                'huruf' => $key['huruf'],
                'jawaban' => $key[$key['id']]
            );
        }

        $id_user = $dataa[0]['id_user'];
        $materi = $dataa[0]['materi'];
        $huruf = $dataa[0]['huruf'];
        if ($this->Model_siswa->simpanjawaban($dataa)) {
            $this->Model_siswa->nilaisoal($id_user, $materi, $huruf);
            if ($materi == 'Al-Jauf') {
            	if ($huruf == "") {
    	        	redirect(site_url('materi/1/1'));
            	}else{
	            	$sub = $this->Model_siswa->submateribyName(1, $huruf);
	            	$this->Model_siswa->updatetugas($sub->id_submateri, 0);
    	        	redirect(site_url('materi/1/'.$sub->id_submateri));
            	}
            }elseif ($materi == 'Al-Halq') {
            	if ($huruf == "") {
    	        	redirect(site_url('materi/2/6'));
            	}else{
	            	$sub = $this->Model_siswa->submateribyName(2, $huruf);
	            	$this->Model_siswa->updatetugas($sub->id_submateri, 0);
    	        	redirect(site_url('materi/2/'.$sub->id_submateri));
            	}
            }elseif ($materi == 'Al-Lisan') {
            	if ($huruf == "") {
    	        	redirect(site_url('materi/3/3'));
            	}else{
	            	$sub = $this->Model_siswa->submateribyName(3, $huruf);
	            	$this->Model_siswa->updatetugas($sub->id_submateri, 0);
    	        	redirect(site_url('materi/3/'.$sub->id_submateri));
            	}
            }elseif ($materi == 'Asy-Syafatain') {
            	if ($huruf == "") {
    	        	redirect(site_url('materi/4/2'));
            	}else{
	            	$sub = $this->Model_siswa->submateribyName(4, $huruf);
	            	$this->Model_siswa->updatetugas($sub->id_submateri, 0);
    	        	redirect(site_url('materi/4/'.$sub->id_submateri));
            	}
            }elseif ($materi == 'Al-Khaisyum') {
            	if ($huruf == "") {
    	        	redirect(site_url('materi/5/25'));
            	}else{
	            	$sub = $this->Model_siswa->submateribyName(5, $huruf);
	            	$this->Model_siswa->updatetugas($sub->id_submateri, 0);
    	        	redirect(site_url('materi/5/'.$sub->id_submateri));
            	}
            }else{
            	redirect(site_url('pengertian'));
            }
        }
	}

	function materi($no, $id){
		$data['profile'] = $this->Model_siswa->profile($this->session->userdata('username'));
		$data['listmateri'] = $this->Model_siswa->listmateri();
		$data['huruf'] = $this->Model_siswa->submateribyId($no, $id);
		$data['submateri'] = $this->Model_siswa->submateri($no);
		$data['status'] = $this->Model_siswa->selectstatusbyUsername($this->session->userdata('username'));
		$id_user = $this->session->userdata('id');
		if ($no == 1) {
			$data['nilai'] = $this->Model_siswa->nilaisoalhuruf($id_user, 'Al-Jauf', $data['huruf']->nama_submateri);
			$this->load->view('Siswa/aljauf', $data);
		}elseif ($no == 2) {
			$data['nilai'] = $this->Model_siswa->nilaisoalhuruf($id_user, 'Al-Halq', $data['huruf']->nama_submateri);
			$this->load->view('Siswa/alhalq', $data);
		}elseif ($no == 3) {
			$data['nilai'] = $this->Model_siswa->nilaisoalhuruf($id_user, 'Al-Lisan', $data['huruf']->nama_submateri);
			$this->load->view('Siswa/allisan', $data);
		}elseif ($no == 4) {
			$data['nilai'] = $this->Model_siswa->nilaisoalhuruf($id_user, 'Asy-Syafatain', $data['huruf']->nama_submateri);
			$this->load->view('Siswa/asysyafatain', $data);
		}else{
			$data['nilai'] = $this->Model_siswa->nilaisoalhuruf($id_user, 'Al-Khaisyum', $data['huruf']->nama_submateri);
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
			$data['video_materi'] = $this->input->post('materi');
			$data['video_submateri'] = $this->input->post('huruf');
			$data['waktu_posting'] = date('Y-m-d H:i:s');
			$this->Model_home->posting($data);
			$analitik['id_user'] = $this->session->userdata('id');
			$analitik['level_user'] = $this->session->userdata('level');
			$analitik['kegiatan'] = 'diskusi';
			$this->Model_login->analitik($analitik);
			$analitik2['id_user'] = $this->session->userdata('id');
			$analitik2['level_user'] = $this->session->userdata('level');
			$analitik2['kegiatan'] = 'bagikan';
			$analitik2['materi'] = $this->input->post('materi');
			$analitik2['huruf'] = $this->input->post('huruf');
			$this->Model_login->analitik($analitik2);
		}
	}

	function selfcorrection(){
		$data['id_user'] = $this->session->userdata('id');
		$data['id_materi'] = $this->input->post('id_materi');
		$data['id_submateri'] = $this->input->post('id_submateri');
		$data['tempat'] = $this->input->post('tempat');
		$data['sifat'] = $this->input->post('sifat');
		$data['suara'] = $this->input->post('suara');
		$this->Model_siswa->selfcorrection($data);
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

	function analitik($kegiatan, $materi = NULL, $huruf = NULL){
		$data['id_user'] = $this->session->userdata('id');
		$data['level_user'] = $this->session->userdata('level');
		$data['kegiatan'] = $kegiatan;
		$data['materi'] = $materi;
		$data['huruf'] = $huruf;
		if ($this->Model_login->analitik($data)) {
			echo json_encode(['error' => '']);
		}else{
			echo json_encode(['error' => 'Terjadi kesalahan']);
		}
	}
}
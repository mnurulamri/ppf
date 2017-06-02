<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StatusPinjam extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		//$this->load->model('backend/pegawaimodel');
		//$this->load->library('servicefisip');
		date_default_timezone_set('Asia/Jakarta');

	}

	public function statusPinjamRuangKuliah(){
		$this->load->model('peminjaman/statuspeminjamanmodel');
		$data['header'] = $this->load->view('layout/2-header', null, true);
		$data['menu'] = $this->load->view('layout/3_menu', null, true);
		$data['footer'] = $this->load->view('layout/3-footer', null, true);
		$data['status'] = $this->statuspeminjamanmodel->getStatusPinjamRuangKuliah();
		$this->load->view('peminjaman/status_pinjam_ruang_kuliah', $data);
	}

	public function statusPinjamRuangRapat(){
		$this->load->model('peminjaman/statuspeminjamanmodel');
		$data['header'] = $this->load->view('layout/2-header', null, true);
		$data['menu'] = $this->load->view('layout/3_menu', null, true);
		$data['footer'] = $this->load->view('layout/3-footer', null, true);
		$data['status'] = $this->statuspeminjamanmodel->getStatusPinjamRuangRapat();
		$this->load->view('peminjaman/status_pinjam_ruang_rapat', $data);
	}
}
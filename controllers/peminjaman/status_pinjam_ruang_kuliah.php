<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status_pinjam extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		//$this->load->model('backend/pegawaimodel');
		//$this->load->library('servicefisip');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index(){
		$this->load->view('peminjaman/status_pinjam_ruang_kuliah');
	}
}
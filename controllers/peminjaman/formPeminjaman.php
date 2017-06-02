<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FormPeminjaman extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();	

		// Load database
		$this->load->database();
		$this->load->model('peminjaman/formPeminjamanModel');
	}

	public function index()
	{
		$data['ruang'] = $this->formPeminjamanModel->getRuangRapat();
		$this->load->view('layout/1-head-title');
		$this->load->view('layout/2-header');
		$data['menu'] = $this->load->view('layout/3_menu', null, true);
		$this->load->view('layout/3-menu', $data);
		//$this->load->view('peminjaman/form_peminjaman_ruang', $data);
		$this->load->view('peminjaman/form_test', $data);
		$this->load->view('layout/template-2');
/*
		echo '
			<script src="<?=base_url();?>assets/AdminLTE/plugins/iCheck/icheck.min.js"></script>
			<script>
			  $(function () {
			    $("input").iCheck({
			      checkboxClass: "icheckbox_square-blue",
			      radioClass: "iradio_square-blue",
			      increaseArea: "20%" // optional
			    });
			  });
			</script>
		';
*/
		/* yang lama 
		$data['menu'] = $this->load->view('themes/menu', NULL, TRUE);
		$data['head'] = $this->load->view('themes/layout-1', NULL, TRUE);
		$data['header'] = $this->load->view('themes/layout-header', NULL, TRUE);
		$data['sidebar'] = $this->load->view('themes/layout-sidebar', NULL, TRUE);
		$data['content'] = $this->load->view('themes/layout-content', NULL, TRUE);
		$data['content_end'] = $this->load->view('themes/layout-content-end', NULL, TRUE);
		$data['ruang'] = $this->formPeminjamanModel->getRuang();
		$this->load->view('peminjaman/form_peminjaman_ruang', $data);
		*/
	}
}
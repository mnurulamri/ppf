<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['menu'] = $this->load->view('themes/menu', NULL, TRUE);
		$data['head'] = $this->load->view('themes/layout-1', NULL, TRUE);
		$data['header'] = $this->load->view('themes/layout-header', NULL, TRUE);
		$data['sidebar'] = $this->load->view('themes/layout-sidebar', NULL, TRUE);
		$data['content'] = $this->load->view('themes/layout-content', NULL, TRUE);
		$this->load->view('themes/template', $data);
	}
}

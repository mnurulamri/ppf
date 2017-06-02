<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	dhtmlxScheduler, without Model
*/

require_once("./assets/dhtmlx/dhtmlxScheduler/codebase/connector/scheduler_connector.php");
require_once("./assets/dhtmlx/dhtmlxScheduler/codebase/connector/db_phpci.php");
DataProcessor::$action_param ="dhx_editor_status";


class Scheduler_rapat extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		//$this->load->model('backend/pegawaimodel');
		//$this->load->library('servicefisip');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function beforeRender($action){
		//formatting data before output
		if ($action->get_id() == 10) 
			$action->set_userdata("color", "pink"); //mark event
	}
	public function beforeProcessing($action){
		//validation before saving
		if ($action->get_value("event_name") == ""){
			$action->invalid();
			$action->set_response_attribute("details", "Empty data not allowed");
		}
	}
	public function index()
	{
		//scheduler's view
		//$data['jadwal'] = $this->load->view('peminjaman/ruang_jadwal');
		$data['template_1'] = $this->load->view('layout/template-1', NULL, TRUE);
		$data['template_2'] = $this->load->view('layout/template-2', NULL, TRUE);
		$this->load->view('peminjaman/scheduler_rapat', $data);
	}
	
	public function data()
	{
		error_reporting(E_ALL ^ E_NOTICE);
		header("Content-type:text/xml, charset=utf-8");

		//if(!session_id()) session_start();
		//if(empty($username)){header('location:login.php');} 
		//$thsmt = $_SESSION['thsmt'] = 20142;
		//$jenis_ujian = $_SESSION['jenis_ujian'] = 'UAS';

		$sql = "SELECT a.*, nm_ruang 
				FROM jadwal_rapat a, ruang_rapat b 
				WHERE a.kd_ruang = b.kd_ruang 
				ORDER BY a.kd_ruang, start_date";

		$result = mysql_query($sql) or die(mysql_error());
		while($row = mysql_fetch_assoc($result)){
			$_data[$row['id']][] = $row;
		}

		$xml = "<data>";

		foreach ($_data as $keys => $values) {
			//echo $keys.'<br>';
			$id = $keys;
			foreach ($values as $k => $v) {
				//set field
				$start_date = $v['start_date'];
				$end_date = $v['end_date'];    
				$event_name = $v['event_name'];
				$nama_peminjam = $v['nama_peminjam'];
				$unit_kerja = $v['unit_kerja'];
				$level = $v['status'];
				$html = $event_name.'<br>'.$unit_kerja.'<br>'.$nama_peminjam;
				//print xml
				$xml .= "<event>";
				$xml .= "<start_date><![CDATA[".$start_date."]]></start_date>";
				$xml .= "<end_date><![CDATA[".$end_date."]]></end_date>";
				$xml .= "<text><![CDATA[".$html."]]></text>";
				$xml .= "<flag><![CDATA[".$flag."]]></flag>";
				$xml .= "<level><![CDATA[".$level."]]></level>";
				$xml .= "<section_id>".$ruang."</section_id>";				
				$xml .= "</event>";		
			}
		}
		$xml .= "</data>";
		print $xml;
	}

	public function data_biasa()
	{
		//data feed
		$this->load->database();

		$connector = new SchedulerConnector($this->db, "PHPCI");
		$connector->configure("jadwal_rapat","event_id","start_date,end_date,event_name,details, id_petugas, id_peminjam, nama_peminjam, unit_kerja, no_telp, email, kd_ruang");
		$connector->event->attach($this);
		$connector->render();
	}
}
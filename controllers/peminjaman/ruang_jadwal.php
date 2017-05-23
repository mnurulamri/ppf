<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	dhtmlxScheduler, without Model
*/

require_once("./assets/dhtmlx/dhtmlxScheduler/codebase/connector/scheduler_connector.php");
require_once("./assets/dhtmlx/dhtmlxScheduler/codebase/connector/db_phpci.php");
DataProcessor::$action_param ="dhx_editor_status";


class Ruang_jadwal extends CI_Controller {
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
		$data['menu'] = $this->load->view('themes/menu', NULL, TRUE);
		$data['head'] = $this->load->view('themes/layout-1', NULL, TRUE);
		$data['header'] = $this->load->view('themes/layout-header', NULL, TRUE);
		$data['sidebar'] = $this->load->view('themes/layout-sidebar', NULL, TRUE);
		$data['content'] = $this->load->view('themes/layout-content', NULL, TRUE);
		//scheduler's view
		//$this->load->view('themes/layout-content-ruang_jadwal', $data);
		$this->load->view('peminjaman/ruang_jadwal', $data);

	}
	
	public function data()
	{
		error_reporting(E_ALL ^ E_NOTICE);
		//include("conn.php");
		header("Content-type:text/xml, charset=utf-8");

		//if(!session_id()) session_start();
		//if(empty($username)){header('location:login.php');} 
		//$thsmt = $_SESSION['thsmt'] = 20142;
		//$jenis_ujian = $_SESSION['jenis_ujian'] = 'UAS';

		$sql = "SELECT a.*, nm_ruang 
				FROM jadwal a, ruang b 
				WHERE ruang = kd_ruang AND flag = 0 AND ruang <> 'x' AND hari <> ''
				ORDER BY ruang, start";

		$result = mysql_query($sql) or die(mysql_error());
		while($row = mysql_fetch_assoc($result)){
			$_data[$row['id']][] = $row;
		}

		/*	set tanggal, jika jenisnya adalah mata kuliah maka set tanggal pada saat awal kuliah dan akhir kuliah */
		$date1 = "20-02-2017";
		$date2 = "12-05-2017";

		$array_hari = array(
				'Senin' => '1',
				'Selasa' => '2',
				'Rabu' => '3',
				'Kamis' => '4',
				'Jumat' => '5',
				'Sabtu' => '6'
			);

		$xml = "<data>";

		foreach ($_data as $keys => $values) {
			//echo $keys.'<br>';
			$id = $keys;
			foreach ($values as $k => $v) {
				
				$hari = $v['hari'];
				$kd_hari = $array_hari[$v['hari']]; //tentukan kode hari		
				$ruang = $v['nm_ruang'];    
				$start = $v['start'];
				$lama = $v['lama'];
				$html = $v['html'];

				$ruang = str_replace('F.F', 'F.', $ruang);
				$ruang = str_replace('E.E', 'E.', $ruang);
				$ruang = str_replace('H.H', 'H.', $ruang);
				$ruang = str_replace('G.G', 'G.', $ruang);
				$ruang = str_replace('G-', 'G.', $ruang);
				$ruang = str_replace('M', 'M.', $ruang);
				$ruang = str_replace('M-', 'M.', $ruang);	

				//tanggalnya_hari($isi, $result, $date1, $date2, $hari, $array_hari, $id);
				//tanggalnya_hari($hari, $kd_hari, $ruang, $start, $lama, $html, $date1, $date2, $hari, $array_hari, $id);

				/* menentukan tanggal pada setiap mata kuliah */
				// memecah bagian-bagian dari tanggal $date1
				$pecahTgl1 = explode("-", $date1);

				// membaca bagian-bagian dari $date1
				$tgl1 = $pecahTgl1[0];
				$bln1 = $pecahTgl1[1];
				$thn1 = $pecahTgl1[2];

				$i = 0; // counter looping
				$sum = 0;// counter untuk jumlah hari

				do {
				   // mengenerate tanggal berikutnya
				   $tanggal = date("d-m-Y", mktime(0, 0, 0, $bln1, $tgl1+$i, $thn1));

				   // cek jika harinya mata kuliah, maka counter $sum bertambah satu, lalu tampilkan tanggalnya
				   if (date("w", mktime(0, 0, 0, $bln1, $tgl1+$i, $thn1)) == $kd_hari)  {
				    	
				    	$sum++;	//increment untuk jumlah hari

					    //cetak data
						$jam_awal = floor($v['start'] / 100) ;
						$menit_awal = $v['start'] % 100;
						$lama_menit = (($v['lama'] - ($v['lama'] % 60)) / 60 * 100) + ($v['lama'] % 60);
						$interval = $v['start'] + $lama_menit;
						$jam_akhir = floor($interval / 100) ;
						$menit_akhir = $interval % 100;
						
						$jam_awal = (strlen($jam_awal) == 1) ? '0'.$jam_awal : $jam_awal ;
						$menit_awal = (strlen($menit_awal) == 1) ? '0'.$menit_awal.':00' : $menit_awal.':00' ;
						$jam_akhir = (strlen($jam_akhir) == 1) ? '0'.$jam_akhir : $jam_akhir ;
						$menit_akhir = (strlen($menit_akhir) == 1) ? '0'.$menit_akhir.':00' : $menit_akhir.':00' ;


						//rubah format tanggal
						$_tgl = date_create($tanggal);
						$tgl_kegiatan = date_format($_tgl,"Y/m/d");

						$start_date = $tgl_kegiatan.' '.$jam_awal.':'.$menit_awal;
						$end_date = $tgl_kegiatan.' '.$jam_akhir.':'.$menit_akhir;

						$xml .= "<event>";
						$xml .= "<start_date><![CDATA[".$start_date."]]></start_date>";
						$xml .= "<end_date><![CDATA[".$end_date."]]></end_date>";
						$xml .= "<text><![CDATA[".$html."]]></text>";
						
						//-----------tes tambahan--------------
						/*
						$xml .= "<pengajar><![CDATA[".$rows['pengajar']."]]></pengajar>";
						$xml .= "<kelas><![CDATA[".$rows['kelas']."]]></kelas>";
						
						//-------------------------------------
						*/
						$xml .= "<section_id>".$ruang."</section_id>";
						
						$xml .= "</event>";		

				   }

				   $i++;  //increment untuk counter looping
				}
				// looping di atas akan terus dilakukan selama tanggal yang digenerate tidak sama dengan $date2.
				while ($tanggal != $date2); 
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
		$connector->configure("jadwal_ajs","event_id","start_date,end_date,event_name,details");
		$connector->event->attach($this);
		$connector->render();
	}
}

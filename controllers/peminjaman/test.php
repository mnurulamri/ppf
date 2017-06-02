<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();	

		// Load database
		$this->load->database();
		$this->load->model('peminjaman/formPeminjamanModel');

		date_default_timezone_set('Asia/Jakarta');
	}

	// Show view Page
	public function index(){
		$data['ruang'] = $this->formPeminjamanModel->getRuang();
		$this->load->view("peminjaman/test", $data);
	}

	// This function call from AJAX
	public function update() {
		$crud			 	= $this->input->post('crud');
		$hari 				= $this->input->post('hari');
		$_tgl_kegiatan 		= $this->input->post('tgl_kegiatan');
		$ruang 				= $this->input->post('ruang');
		$nama_kegiatan 		= $this->input->post('nama_kegiatan');
		$prodi 				= $this->input->post('prodi');
		$jam_mulai 			= $this->input->post('jam_mulai');
		$menit_mulai 		= $this->input->post('menit_mulai');
		$jam_selesai		= $this->input->post('jam_selesai');
		$menit_selesai 		= $this->input->post('menit_selesai');
		$crud 				= $this->input->post('crud');

		$start = (int) ($jam_mulai.$menit_mulai);
		$end = (int) ($jam_selesai.$menit_selesai);
		$durasi = (($end - $start) - ( ($end - $start) % 100)) / 100 * 60 + ( ($end - $start) % 100);

		$nama_kegiatan = "KP:\n".$nama_kegiatan."\n".$prodi."\n".$_tgl_kegiatan;

		//rubah format 
		$_tgl = date_create($_tgl_kegiatan);
		$tgl_kegiatan = date_format($_tgl,"Y/m/d");

		$data = array(
			'start' => $start,
			'end' => $end,
			'lama' => $durasi,
			'html' => $nama_kegiatan,
			'ruang' => $ruang,
			'hari' => $hari,
			'tgl_kegiatan' => $tgl_kegiatan,
			'flag' => 1,
			'status' => 1
		);
		//print_r($data);
		//Transfering data to Model
		$this->formPeminjamanModel->insertKelas($data);
		echo '<div>data sudah di simpan!...</div>';
	}

	public function update_scheduler_rapat() {
		$crud			 = $this->input->post('crud');
		$nomor 			= $this->input->post('nomor');
		$id_petugas		= $this->input->post('id_petugas');
		$id_peminjam	= $this->input->post('id_peminjam');
		$_tgl_kegiatan 	= $this->input->post('tgl_kegiatan');
		$kd_ruang 		= $this->input->post('ruang');
		$event_name 	= $this->input->post('nama_kegiatan');
		$nama_peminjam 	= $this->input->post('nama_peminjam');
		$unit_kerja 	= $this->input->post('unit_kerja');
		$no_telp 		= $this->input->post('no_telp');
		$email 			= $this->input->post('email');
		$jam_awal 		= $this->input->post('jam_mulai');
		$menit_awal 	= $this->input->post('menit_mulai');
		$jam_akhir	= $this->input->post('jam_selesai');
		$menit_akhir 	= $this->input->post('menit_selesai');
		$crud 			= $this->input->post('crud');

		$jam_awal = (strlen($jam_awal) == 1) ? '0'.$jam_awal : $jam_awal ;
		$menit_awal = (strlen($menit_awal) == 1) ? '0'.$menit_awal.':00' : $menit_awal.':00' ;
		$jam_akhir = (strlen($jam_akhir) == 1) ? '0'.$jam_akhir : $jam_akhir ;
		$menit_akhir = (strlen($menit_akhir) == 1) ? '0'.$menit_akhir.':00' : $menit_akhir.':00' ;

		//rubah format tanggal
		date_default_timezone_set("Asia/Jakarta");
		$_tgl = date_create($_tgl_kegiatan);
		$tgl_kegiatan = date_format($_tgl,"Y/m/d");

		$start_date = $tgl_kegiatan.' '.$jam_awal.':'.$menit_awal;
		$end_date = $tgl_kegiatan.' '.$jam_akhir.':'.$menit_akhir;

		$data = array(
			'event_name' 	=> $event_name,
			'start_date' 	=> $start_date,
			'end_date' 		=> $end_date,
			'id_petugas' 	=> $id_petugas,
			'id_peminjam' 	=> $id_peminjam,
			'nama_peminjam' => $nama_peminjam,
			'unit_kerja' 	=> $unit_kerja,
			'no_telp' 		=> $no_telp,
			'email' 		=> $email,
			'kd_ruang' 		=> $kd_ruang,
			'status' 		=> 1,
			'nomor' 		=> $nomor
		);
		//return '<pre>'.print_r($data).'</pre>';
		//Transfering data to Model
		$this->formPeminjamanModel->insertSchedulerRapat($data);
		echo '<div>data sudah di simpan!...</div>';
	}

	public function testing(){
		$start_date		= $this->input->post('start_date');
		$end_date		= $this->input->post('end_date');
		$html			= $this->input->post('event_name');
		$id_petugas		= $this->input->post('id_petugas');
		$id_peminjam	= $this->input->post('id_peminjam');
		$nama_peminjam	= $this->input->post('nama_peminjam');
		$prodi			= $this->input->post('prodi');
		$no_telp		= $this->input->post('no_telp');
		$email			= $this->input->post('email');
		$ruang			= $this->input->post('ruang');
		//$kd_ruang		= $this->input->post('kd_ruang');
		$crud			= $this->input->post('crud');
		$flag			= 1;
		$status			= 1;

		$array_ruang = array(
			"E.103A" => 0,
			"E.103B" => 1,
			"E.201" => 2,
			"E.202" => 3,
			"E.203A" => 4,
			"E.203B" => 5,
			"E.204" => 6,
			"E.301" => 7,
			"E.302" => 8,
			"E.303" => 9,
			"E.304" => 10,
			"F.201" => 11,
			"F.202" => 12,
			"G.106" => 13,
			"G.201" => 14,
			"G.202" => 15,
			"G.203" => 16,
			"G.203A" => 17,
			"G.203B" => 18,
			"G.204" => 19,
			"G.205" => 20,
			"G.205A" => 21,
			"G.205B" => 22,
			"G.301" => 23,
			"G.302" => 24,
			"G.303" => 25,
			"G.304" => 26,
			"G.401" => 27,
			"G.402" => 28,
			"G.403" => 29,
			"G.404" => 30,
			"G.405" => 31,
			"H.101" => 32,
			"H.102" => 33,
			"H.103" => 34,
			"H.201" => 35,
			"H.202" => 36,
			"H.203" => 37,
			"H.204" => 38,
			"H.205" => 39,
			"H.301" => 40,
			"H.302" => 41,
			"H.303" => 42,
			"H.304" => 43,
			"H.305" => 44,
			"H.401" => 45,
			"H.402" => 46,
			"H.403" => 47,
			"H.404" => 48,
			"H.405" => 49,
			"H.501" => 50,
			"H.502" => 51,
			"H.503" => 52,
			"H.504" => 53,
			"M.101" => 54,
			"M.102" => 55,
			"M.103" => 56,
			"M.104" => 57,
			"M.301" => 58,
			"M.302" => 59,
			"M.303" => 60,
			"M.304" => 61,
			"N1.301A" => 62,
			"N1.301B" => 63,
			"N1.301C" => 64,
			"N1.302" => 65,
			"N1.303" => 66,
			"N1.304" => 67,
			"N1.305" => 68,
			"N1.306" => 69,
			"N2.101" => 70,
			"N2.102" => 71,
			"N2.301" => 72,
			"N2.302" => 73,
			"N2.303" => 74,
			"N2.304" => 75,
			"N2.305" => 76,
			"N2.306" => 77,
			"Gd. Kom Lt 1" => 78,
			"Gd. Kom Lt 3" => 79,
			"Gd. Kom. 303" => 80,
			"Kom-Cocacola" => 81,
			"Kom-Fanta" => 82,
			"Kom-Fresty" => 83,
			"Kom-Sprite" => 84,
			"Lab. AV" => 85,
			"B.301" => 86,
			"Lab. MM" => 87,
			"Audito.Kom." => 88,
			"X" => 89
		);

		//get kode ruang
		$kd_ruang = $array_ruang[$ruang];

		//test data
		//echo $event_name.' '.$start_date.' '.$end_date.' '.$id_petugas.' '.$id_peminjam.' '.$nama_peminjam.' '.$prodi.' '.$email.' '.$ruang.' '.$crud;

		//manipulasi tanggal untuk menyesuaikan format table dalam database
		$array_start_date = explode(' ', $start_date);
		$array_end_date = explode(' ', $end_date);

		$tgl = explode('-', $array_start_date[0]);
		$d = $tgl[0];
		$m = $tgl[1];
		$y = $tgl[2];
		$tgl_kegiatan = $y.'-'.$m.'-'.$d;
		
		//manipulasi waktu untuk menyesuaikan format table dalam database
		$start = str_replace(':', '', $array_start_date[1]);
		$end = str_replace(':', '', $array_end_date[1]);

		$start = intval($start);
		$end = intval($end);

		$start_time = explode(':', $array_start_date[1]);
		$end_time = explode(':', $array_end_date[1]);

		$lama = (($end - $start) - ( ($end - $start) % 100)) / 100 * 60 + ( ($end - $start) % 100);	//set durasi atau alama waktu 

		//set hari
		$nama_hari = array( '1' => 'Senin', '2' => 'Selasa', '3' => 'Rabu', '4' => 'Kamis', '5' => 'Jumat', '6' => 'Sabtu' );
		$kd_hari = date("w", mktime(0, 0, 0, $m, $d, $y));
		$hari = $nama_hari[$kd_hari];

		//prepare untuk database
		$data = array(
			'start' 		=> $start,
			'end' 			=> $end,
			'lama'			=> $lama,
			'html' 			=> $html,
			'ruang' 		=> $kd_ruang,
			'hari' 			=> $hari,
			'prodi' 		=> $prodi,			
			'tgl_kegiatan' 	=> $tgl_kegiatan,
			'id_petugas' 	=> $id_petugas,
			'id_peminjam' 	=> $id_peminjam,
			'nama_peminjam' => $nama_peminjam,
			'no_telp' 		=> $no_telp,
			'email' 		=> $email,
			'flag' 			=> $flag,
			'status' 		=> $status
		);

		//INSERT DATA
		$this->formPeminjamanModel->insertTesting($data);
		echo 'Data sudah disimpan';
		//echo "start=$start - end=$end - lama=$lama - html=$html - kd_ruang=$kd_ruang - hari=$hari - tgl_kegiatan=$tgl_kegiatan - prodi=$prodi - email=$email - flag=$flag - status=$status";
	}
}
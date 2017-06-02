<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!session_id()) session_start();

class FormPeminjamanModel extends CI_Model 
{
    function __construct()
    {
        parent::__construct();	
    }

    function getRuang()
    {
		$sql = "SELECT * FROM ruang";
		$result = mysql_query($sql);
        $data = array();
		while($rows = mysql_fetch_object($result)){
			//$data[] = '<option value="'.$rows->kd_ruang.'">'.$rows->nm_ruang.'</option>';
            $data[] = $rows;
		}
		return $data;
    }

    function getRuangRapat()
    {
        $sql = "SELECT * FROM ruang_rapat";
        $result = mysql_query($sql);
        $data = array();
        while($rows = mysql_fetch_object($result)){
            //$data[] = '<option value="'.$rows->kd_ruang.'">'.$rows->nm_ruang.'</option>';
            $data[] = $rows;
        }
        return $data;
    }

    function insertKelas($data){
        //$sql = "INSERT INTO jadwal (start, end, lama, html, ruang, hari, tgl_kegiatan,flag)
                //VALUES ('$start', '$end', '$durasi', '$nama_kegiatan', '$ruang', '$hari','$tgl_kegiatan',1)";
        //$result = mysql_query($sql) or die (mysql_error());
        $this->db->insert('jadwal', $data);
    }

    function insertSchedulerRapat($data){
        $this->db->insert('jadwal_rapat', $data);
    }

    function insertTesting($data){
        $this->db->insert('jadwal', $data);
    }
}

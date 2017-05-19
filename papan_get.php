<?
error_reporting(E_ALL ^ E_NOTICE);
include("conn.php");
header("Content-type:text/xml, charset=utf-8");

if(!session_id()) session_start();
//if(empty($username)){header('location:login.php');} 
$thsmt = $_SESSION['thsmt'] = 20142;
$jenis_ujian = $_SESSION['jenis_ujian'] = 'UAS';

//$query = "SELECT * FROM ujian_draft where thsmt=20141";
$query = "SELECT hari, jam, ruang, mata_kuliah, kelas, mhs, pengajar FROM ujian_draft WHERE thsmt='$thsmt' AND jenis_ujian='$jenis_ujian'
	UNION
	SELECT hari, jam, ruang2, mata_kuliah, kelas, mhs, pengajar FROM ujian_draft WHERE thsmt='$thsmt' AND jenis_ujian='$jenis_ujian' AND ruang2 <> ''";

$result = mysql_query($query) or die ("Pesan Error: ".mysql_error());

/*echo('<?xml version="1.0" encoding="utf-8"?>');*/

$xml = "<data>";

while($rows = mysql_fetch_array($result)){
	$vwaktu = $rows['jam'];
	$waktu = str_replace(" ","",$vwaktu);
	$jam_mulai = substr($waktu,0,5);
	$start_time = str_replace(".",":",$jam_mulai);
	$jam_selesai = substr($waktu,-5);
	$end_time = str_replace(".",":",$jam_selesai);
	
	$hari = $rows['hari'];
	$tanggal = trim(strstr($hari," ")); //ambil karakter setelah spasi untuk menghilangkan nama hari
	$day = trim(substr($tanggal,0,2)); //potong 2 karakter untuk ambil tanggal
	$year = substr($tanggal, -4); //ambil karakter tahun
	$vmonth = trim(strstr($tanggal," "));
	$month = trim(str_replace($year,"",$vmonth));
	$bulan = bulan($month);
	$start_date = $year."-".$bulan."-".$day." ".$start_time.":00";
	$end_date = $year."-".$bulan."-".$day." ".$end_time.":00";
	
	$xml .= "<event>";
	$xml .= "<start_date><![CDATA[".$start_date."]]></start_date>";
	$xml .= "<end_date><![CDATA[".$end_date."]]></end_date>";
	$xml .= "<text><![CDATA[Jml = ".$rows['mhs']."<br>".$rows['mata_kuliah']."]]></text>";
	
	//-----------tes tambahan--------------
	$xml .= "<pengajar><![CDATA[".$rows['pengajar']."]]></pengajar>";
	$xml .= "<kelas><![CDATA[".$rows['kelas']."]]></kelas>";
	
	//-------------------------------------
	
	$xml .= "<section_id>".$rows['ruang']."</section_id>";
	$xml .= "</event>";

}

$xml .= "</data>";

print $xml;

function bulan($vmonth) {
	switch ($vmonth) {
		case "Januari":
			$bulan = "01";
			break;
		case "Februari":
			$bulan = "02";
			break;
		case "Maret":
			$bulan = "03";
			break;
		case "April":
			$bulan = "04";
			break;
		case "Mei":
			$bulan = "05";
			break;
		case "Juni":
			$bulan = "06";
			break;
		case "Juli":
			$bulan = "07";
			break;
		case "Agustus":
			$bulan = "08";
			break;
		case "September":
			$bulan = "09";
			break;
		case "Oktober":
			$bulan = "10";
			break;
		case "Nopember":
			$bulan = "11";
			break;
		case "November":
			$bulan = "11";
			break;
		case "Desember":
			$bulan = "12";
			break;
	}
	
	return $bulan;
}

//echo mysql_errno().": ".mysql_error()." at ".__LINE__." line in ".__FILE__." file<br>";

?>
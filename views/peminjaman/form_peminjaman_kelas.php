<?php 
//session_start();

//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
	//redirect ke halaman login
	//header('location:login.php');
}

//include('conn.php');
//include('ruang.php');
?>

<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
<script src="<?=base_url();?>assets/js/jquery-1.11.2.min.js"></script>

<script type="text/javascript">
//$.noConflict();

$(document).ready(function() {
	$(".test").click(function(event) {
		event.preventDefault();
		vhari			= $('#hari').val();
		vtgl_kegiatan	= $('#tgl_kegiatan').val();
		vruang			= $('#ruang').val();
		vnama_kegiatan	= $('#nama_kegiatan').val();
		vprodi			= $('#prodi').val();
		vjam_mulai		= $('#jam_mulai').val();
		vmenit_mulai	= $('#menit_mulai').val();
		vjam_selesai	= $('#jam_selesai').val();
		vmenit_selesai	= $('#menit_selesai').val();
		//alert(vhari+" "+vtgl_kegiatan+" "+vruang+" "+vnama_kegiatan+" "+vprodi+" "+vjam_mulai+" "+vmenit_mulai+" "+vjam_selesai+" "+vmenit_selesai);
		$("#process-info").show();

		$.ajax({
			type: "POST",
			url: "http://localhost:8080/backend/peminjaman/test/update",
			//dataType: 'json',
			data: {hari:vhari, tgl_kegiatan:vtgl_kegiatan, ruang:vruang, nama_kegiatan:vnama_kegiatan, prodi:vprodi, jam_mulai:vjam_mulai, menit_mulai:vmenit_mulai, jam_selesai:vjam_selesai, menit_selesai:vmenit_selesai, crud:1},
			success: function(res) {
				//$("div.pesan").html(res);
				if (res)
				{
					$("#process-info").hide();
					//$("#alert-riwayat").fadeIn();
					//$("#alert-riwayat").fadeOut(2300);
					$('.pesan').html(res);
					$(".pesan").fadeIn();
					$(".pesan").fadeOut(2300);
				} else {
					alert('ada error');
				}
			}
		});
	});
});
</script>	

<!-- Horizontal Form -->
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Horizontal Form</h3>
	</div>
	<!-- /.box-header -->
	
	<!-- form start -->
	<form id="formInput" method="post" name="form" class="form-horizontal" >
		<div class="box-body">
			<div class="form-group">
				<label class="col-sm-2 control-label">Hari</label>
				<div class="col-sm-2">
					<select name="hari" id="hari" class="form-control pull-right">
					<option style="color:magenta;" value="Senin">Senin</option>									
					<option style="color:blue;" value="Selasa">Selasa</option>
					<option style="color:green;" value="Rabu">Rabu</option>
					<option style="color:purple;" value="Kamis">Kamis</option>
					<option style="color:red;" value="Jumat">Jumat</option>	
					<option style="color:magenta;" value="Sabtu">Sabtu</option>	
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tanggal Kegiatan :</label>
				<div class="col-sm-2">
					<input id="tgl_kegiatan" name="tgl_kegiatan" class="form-control pull-right" data-provide="datepicker"></input>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Ruang :</label>
				<div class="col-sm-2">
					<select class="form-control pull-right" name="ruang" id="ruang">
					<?php
					foreach ($ruang as $key => $value) {
					echo '<option value="'.$value->kd_ruang.'">'.$value->nm_ruang.'</option>';
					}
					?>
					</select>                    
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Nama Kuliah/Kegiatan :</label>
				<div class="col-sm-10">
					<input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control pull-right"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Program Studi/Unit :</label>
				<div class="col-sm-10">
					<input type="text" name="prodi" id="prodi" class="form-control pull-right"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Jam Mulai:</label>
					<div class="col-sm-1">
						<select name="jam_mulai" id="jam_mulai" class="form-control">
						<option value="16" selected >16</option>
						<option value="17"  >17</option>
						<option value="18"  >18</option>
						<option value="19"  >19</option>
						<option value="20"  >20</option>
						<option value="21"  >21</option>
						</select>
					</div>
					<div class="col-sm-1">
						<select name="menit_mulai" id="menit_mulai" class="form-control pull-right">
							<option value="00"  >00</option>
							<option value="05"  >05</option>
							<option value="10"  >10</option>
							<option value="15"  >15</option>
							<option value="20"  >20</option>
							<option value="25"  >25</option>
							<option value="30"  selected  >30</option>
							<option value="35"  >35</option>
							<option value="40"  >40</option>
							<option value="45"  >45</option>
							<option value="50"  >50</option>
							<option value="55"  >55</option>
						</select>                   
					</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Jam Selesai:</label>
					<div class="col-sm-1">
						<select name="jam_selesai" id="jam_selesai" class="form-control pull-right">
							<option value="17"  >17</option>
							<option value="18"  >18</option>
							<option value="19"  >19</option>
							<option value="20"  >20</option>
							<option value="21"  >21</option>
						</select>
					</div>
				<div class="col-sm-1">
					<select name="menit_selesai" id="menit_selesai" class="form-control">
						<option value="00"  >00</option>
						<option value="05"  >05</option>
						<option value="10"  >10</option>
						<option value="15"  >15</option>
						<option value="20"  >20</option>
						<option value="25"  >25</option>
						<option value="30"  selected  >30</option>
						<option value="35"  >35</option>
						<option value="40"  >40</option>
						<option value="45"  >45</option>
						<option value="50"  >50</option>
						<option value="55"  >55</option>
					</select>
				</div>
			</div>
		</div>
	</form>	
		<!-- /.box-body -->
		<div class="box-footer">
			<div class="pesan" class="alert alert-success" role="alert" style="display:none"></div>
			<div id="process-info" style="display:none; text-align:center"><img src="<?=base_url();?>assets/images/spinner.gif"/></div>
			<span id="alert-riwayat" class="alert alert-success" role="alert" role="alert" style="display:none">Data sudah disimpan..</span>
			<span><button class="test btn btn-info pull-right" class="submit">Save</button></span>
		</div>
		<!-- /.box-footer -->
</div>
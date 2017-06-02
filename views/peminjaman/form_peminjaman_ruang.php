<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
<script src="<?=base_url();?>assets/js/jquery-1.11.2.min.js"></script>

<script type="text/javascript">
//$.noConflict();

$(document).ready(function() {
	$(".test").click(function(event) {
		event.preventDefault();
		//alert('test');
		nomor			= $('#nomor').val();
		id_petugas		= $('#id_petugas').val();
		tgl_kegiatan	= $('#tgl_kegiatan').val();
		ruang			= $('#ruang').val();
		nama_kegiatan	= $('#nama_kegiatan').val();
		unit_kerja		= $('#unit_kerja').val();
		id_peminjam		= $('#id_peminjam').val();
		nama_peminjam	= $('#nama_peminjam').val();
		no_telp			= $('#no_telp').val();
		email			= $('#email').val();
		jam_mulai		= $('#jam_mulai').val();
		menit_mulai		= $('#menit_mulai').val();
		jam_selesai		= $('#jam_selesai').val();
		menit_selesai	= $('#menit_selesai').val();
		alert(nomor+" "+tgl_kegiatan+" "+ruang+" "+nama_kegiatan+" "+unit_kerja+" "+jam_mulai+" "+menit_mulai+" "+jam_selesai+" "+menit_selesai);
		//$("#process-info").show();
		//$('.pesan').show();
/**/
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>" + "peminjaman/test/update_scheduler_rapat",
			//dataType: 'json',
			data: {
					nomor:nomor,
					id_petugas:id_petugas,
					nama_peminjam:nama_peminjam,
					unit_kerja:unit_kerja,
					id_peminjam:id_peminjam,
					no_telp:no_telp,
					email:email,
					ruang:ruang,
					nama_kegiatan:nama_kegiatan,
					jam_mulai:jam_mulai,
					menit_mulai:menit_mulai,
					jam_selesai:jam_selesai,
					menit_selesai:menit_selesai,
					crud:1},
			
			success: function(res) {
				if (res)
				{
					$("#process-info").hide();	
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

<style>
h4{border-bottom: 1px solid #d2d6de; text-align:right; color:#3c8dbc; font-size:14px;}
</style>

<!--<form class="form-horizontal">-->
	<legend>Form Name</legend>
	<fieldset>
		<div class="box box-warning">
			<div class="box-header with-border">
				
			</div><!-- /.box-header -->
			<div class="box-body">
				<h4 class="box-title">Data Petugas</h4>
				<div class="form-group">
					<label class="col-sm-2 control-label">Nomor</label>
					<div class="col-sm-2">
						<input id="nomor" name="nomor" placeholder="Nomor" class="form-control pull-right" required="" type="text">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Petugas</label>
					<div class="col-sm-2">
						<input id="id_petugas" name="id_petugas" placeholder="Petugas" class="form-control pull-right" required="" type="text">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-2">
						
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-2">
						
					</div>
				</div>

					<!-- Text input-->	

 					<hr>
			        <h4 class="box-title"> Data Peminjam </h4>
			       
					<div class="row">
						<div class="col-md-4">
							<label for="unit">PAF/Dept/Prog/HM : </label>
							<input id="unit_kerja" name="unit_kerja" placeholder="PAF/Dept/Prog/HM : " class="form-control input-md" required="" type="text">
						</div>
						<div class="col-md-4">
							<label for="nama_peminjam">Penanggung Jawab/Contact Person : </label>  
							<input id="nama_peminjam" name="nama_peminjam" placeholder="nama peminjam" class="form-control input-md" required="" type="text">
						</div>
						<div class="col-md-4">
							<label for="id_peminjam">NPM/NIP/NUP : </label>  
							<input id="id_peminjam" name="id_peminjam" placeholder="NPM/NIP/NUP : " class="form-control input-md" required="" type="text">
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<label for="no_telp">No. Telepon : </label>
							<input id="no_telp" name="no_telp" placeholder="Nomor Telepon" class="form-control input-md" required="" type="text">
						</div>
						<div class="col-md-6">
							<label for="email">E-mail :</label> 
							<input id="email" name="email" placeholder="e-mail" class="form-control input-md" required="" type="text">				
						</div>
					</div>

					<hr style="border: 1px solid #f39c12">

					<h4> Fasilitas Non Bergerak (Peminjaman Ruangan) </h3>

				<div class="row">
					<div class="col-md-3">
						<label for="nama_kegiatan">Nama Kegiatan :  </label>  
						<input id="nama_kegiatan" name="nama_kegiatan" placeholder="Nama Kegiatan" class="form-control input-md" required="" type="text">
					</div>
					<div class="col-md-3">
						<label for="ruang">Lokasi/Area/Ruangan :</label>
						<select id="ruang" name="ruang" class="form-control">
							<option>Ruang Rapat</option>
							<option>&nbsp;&nbsp;AJS</option>
							<option>&nbsp;&nbsp;...</option>
							<option>Ruang Kelas</option>
							<?php
							foreach($ruang as $k => $v){
								echo '<option value="'.$v->kd_ruang.'">&nbsp;&nbsp;'.$v->nm_ruang.'</option>';
							}
							?>

						</select>
					</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tanggal Kegiatan :</label>
				<div class="col-sm-2">
					<input id="tgl_kegiatan" name="tgl_kegiatan" class="form-control pull-right" data-provide="datepicker"></input>
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
				<hr>
				<div class="row">

	              <!-- checkbox -->
	              <div class="checkbox icheck">
	                <label>
	                  <input type="checkbox" class="minimal-red" checked>
	                </label>
	                <label>
	                  <input type="checkbox" class="flat-red">
	                </label>
	                <label>
	                  <input type="checkbox" class="flat-red" disabled>
	                  Flat green skin checkbox
	                </label>
	              </div>


						<label class="col-md-4" for="checkboxes">Jenis kebutuhan tambahan : </label>
						<div class="col-md-8">

						<div class="checkbox icheck">
							<label>
								<input type="checkbox"> Remember Me
							</label>
						</div>

							<label for="checkboxes-0">
								<input name="checkboxes" id="checkboxes-0" value="1" type="checkbox">
								Audio
							</label>
							<label for="checkboxes-1">
								<input name="checkboxes" id="checkboxes-1" value="2" type="checkbox">
								Hotspot
							</label>
							<label for="checkboxes-2">
								<input name="checkboxes" id="checkboxes-2" value="3" type="checkbox">
								Infocus
							</label>
							<label for="checkboxes-3">
								<input name="checkboxes" id="checkboxes-3" value="4" type="checkbox">
								Screen
							</label>
							<label for="checkboxes-4">
								<input name="checkboxes" id="checkboxes-4" value="5" type="checkbox">
								Sofa
							</label>
							<label for="checkboxes-5">
							<input name="checkboxes" id="checkboxes-5" value="6" type="checkbox">
							Meja
							</label>
							<label for="checkboxes-6">
							<input name="checkboxes" id="checkboxes-6" value="7" type="checkbox">
							Kursi
							</label>
						</div>
					</div>
				</div>
<!--</form>-->
			</div><!-- /.box-body -->
			<div class="box-footer">
				<div class="pesan" class="alert alert-success" role="alert" style="display:none">pesan</div>
				<div id="process-info" style="display:none; text-align:center"><img src="<?=base_url();?>assets/images/spinner.gif"/></div>
				<span id="alert-riwayat" class="alert alert-success" role="alert" role="alert" style="display:none">Data sudah disimpan..</span>
				<span><button class="test btn btn-info pull-right">Save</button></span>
			</div>
			<!-- /.box-footer -->
		</div><!-- /.box -->
	</fieldset>

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Select2</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Minimal</label>
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Disabled</label>
                <select class="form-control select2" disabled="disabled" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Multiple</label>
                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                  <option>Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Disabled Result</label>
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                  <option disabled="disabled">California (disabled)</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
          the plugin.
        </div>
      </div>
      <!-- /.box -->
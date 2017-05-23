<?=$head?>
<?//=$header?>
<?//=$sidebar?>
<?//=$content?>
		<!-- Right side column. Contains the navbar and content of the page -->
		<aside class="right-side">                
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					<span id="beranda-head">Beranda</span> 
					<small> Menu Utama </small> 
					<span class="spinner">Loading..</span>
				</h1>
				<ol class="breadcrumb">
					<li> 
						<i class="fa fa-calendar"></i> 12 December 2016 &nbsp; 
						<i class="fa fa-clock-o"></i> <span  class="jam"></span>
					</li>
				</ol>
			</section>

			<!-- Main content -->
			<section class="content">
				
				<style type="text/css">
					.row * {
						box-sizing: border-box;
					}
					.kotak_judul {
						 border-bottom: 1px solid #fff; 
						 padding-bottom: 2px;
						 margin: 0;
					}
				</style>

				<div id="data">
					<?$jadwal?>
				</div>

			</section><!-- /.content -->
		</aside><!-- /.right-side -->
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="left-side sidebar-offcanvas">                
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<!-- sidebar menu: : style can be found in sidebar.less -->
								<!-- search form -->
				<a href="../membership/" class="logo">
					<!-- Add the class icon to your logo image or logo icon to add the margining -->
					 <div style="text-align:center;"><!--<img height="50" src="../membership/assets/theme_admin/img/logo2.png">--></div>
				</a>
			<!-- /.search form -->
			<?php
			$this->view('themes/menu');
			//require_once(APPPATH.'views/template/menu.php'); 
			?>
			</section>
			<!-- /.sidebar -->
		</aside>
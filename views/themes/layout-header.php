<body class="skin-blue">
	<header class="header">
		<a href="../membership/" class="logo">
			<!-- Add the class icon to your logo image or logo icon to add the margining -->
			PPF FISIP UI
		</a>
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top" role="navigation">
			<!-- Sidebar toggle button-->
			<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<div class="navbar-right">
				<ul class="nav navbar-nav">

					<!-- Notifications: style can be found in dropdown.less -->
					<li class="dropdown messages-menu" title="Pengajuan Pinjaman">
						<a href="../membership/pengajuan">
							<i class="fa fa-envelope"></i>
							<span class="badge bg-green" style="font-size: 14px;"><i class="fa fa-check-circle"></i></span>
						</a>
					</li>

					<li class="dropdown notifications-menu" title="Jatuh Tempo">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-warning"></i>
							<span class="badge bg-green" style="font-size: 14px;"><i class="fa fa-check-circle"></i></span>
						</a>
						<ul class="dropdown-menu">
							<li class="header bg-light-blue h_tengah">Notifikasi</li>
							<li>
								<!-- inner menu: contains the actual data -->
								<ul class="menu">
									<li>
										<a>
											<div class="pull-left" style="font-size: 35px; padding: 0 15px; width: 27px;">
												<i class="fa fa-check-circle" style="color: green;"></i>
											</div>
											<div style="padding: 20px 5px 0 5px; height: 35px;">
												<p>Saat ini tidak ada Notifikasi</p>
											</div>
										</a>
									</li>
								</ul>
							</li>
							<!-- <li class="footer"><a href="#">View all</a></li> -->
						</ul>

						<script type="text/javascript">
						$(document).ready(function() {
							$(".slimScrollDiv").height(100);
						});
						</script>

					</li>	
					<!-- User Account: style can be found in dropdown.less -->
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="glyphicon glyphicon-user"></i>
							<span>admin <i class="caret"></i></span>
						</a>
						<ul class="dropdown-menu">
							<!--<li><a href="../membership/ubah_password"> <i class="fa fa-key"></i>Ubah Password</a></li>-->
							<li><a href="auth/logout.php"> <i class="fa fa-sign-out"></i>Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>
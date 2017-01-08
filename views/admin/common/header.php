<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $data['app_title'];?></title>
	<link rel="stylesheet" type="text/css" href="public/css/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap-3.3.5.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap-3.3.5-theme.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/app.css">

	<style type="text/css">
		nav {
			background-color: #090502 !important;
		}



	</style>
<!-- <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet"> -->
	<link rel="stylesheet" type="text/css" href="public/css/jquery-ui-1.9.2.custom.min.css">
	<script type="text/javascript" src="public/js/jquery.min.js"></script>
	<script type="text/javascript" src="public/js/jquery-ui-1.9.2.custom.min.js"></script>
	<script type="text/javascript" src="public/js/bootstrap-3.3.5.min.js"></script>
</head>
<body>
	<div class="row">
		<div class="col-md-12">
			<nav id="menubar" class="navbar" style="position:fixed">
				<span class="navbar-brand"><?php echo $data['brand'];?></span>
				<ul class="nav navbar-nav">
					<li class="nav-item active"><a href="<?php echo SITE_ROOT;?>" class="nav-link">Home<span class="sr-only">(Current)</span></a></li>
					<li class="nav-item">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">Basis Pengetahuan</a>
						<ul class="dropdown-menu">
							<li><a href="?url=admin/rule">Rules Entry</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">Basis Data</a>
						<ul class="dropdown-menu">
							<li><a href="?url=admin/gejala">Gejala</a></li>
							<li><a href="?url=admin/gangguan">Penyakit</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">Konfigurasi</a>
						<ul class="dropdown-menu">
							<li><a href="?url=admin/diagnosa">Daftar Pertanyaan</a></li>
							<!-- <li><a href="?url=admin/respon">Daftar Jawaban</a></li> -->
							<!-- <li><a href="?url=admin/solusi">Daftar Solusi</a></li> -->
<!-- 							<li><a href="#">Data Gangguan</a></li>
							<li><a href="#">Daftar Gejala</a></li>
							<li class="divider"></li>
							<li class="dropdown-submenu">
								<a href="?url=admin/diagnosa">Daftar Diagnosa</a>
								<a href="#" data-toggle="dropdown" class="dropdown-toggle">Diagnosa</a>
								<ul class="dropdown-menu">
								</ul>
							</li>
							<li><a href="#">Daftar Kesimpulan</a></li>
 -->							
 							<li class="divider"></li>
							<li><a href="?url=admin/pasien">Pasien</a></li>
							<!-- <li><a href="#">Users</a></li> -->
							<!-- <li><a href="#">Groups</a></li> -->
						</ul>
					</li>
<!-- 					<li class="nav-item">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">Data Administratif</a>
						<ul class="dropdown-menu">
						</ul>
					</li> -->
					<!-- <li class="nav-item"><a href="#" class="nav-link">Report</a></li> -->
				</ul>
				<ul class="nav navbar-nav" style="float:right">
					<li class="nav-item pull-right">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle"><strong class="glyphicon glyphicon-menu-hamburger"></strong></a>
						<ul class="dropdown-menu">
							<li>
								<a href="?url=admin/index/about">About</a>
							</li>
							<li>
								<a href="#">Help</a>
							</li>
							<li class="divider">
							</li>
							<li>
								<a href="?url=auth/logout">Logout</a>
							</li>
						</ul>
					</li>
					<li class="nav-item pull-right"><a href="#" class="nav-link">Halo <?php echo $data['user'] ?></a></li>
				</ul>
			</nav>
		</div>
	</div>
	<div class="row">
		<div class="container">

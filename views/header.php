<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $data['app_title'];?></title>
	<!-- <link rel="stylesheet" type="text/css" href="public/css/bootstrap-3.3.5.min.css"> -->
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap-3.3.7-theme.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/user.css">

	<style type="text/css">

	</style>

</head>
<body>
	<div class="row">
		<div class="col-md-12">
			<nav id="menubar" class="navbar" style="position:fixed">
				<span class="navbar-brand"><?php echo $data['brand'];?></span>
				<ul class="nav navbar-nav">
					<li class="nav-item active"><a href="<?php echo SITE_ROOT;?>" class="nav-link">Home<span class="sr-only">(Current)</span></a></li>
<!-- 					<li class="nav-item">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">Master</a>
						<ul class="dropdown-menu">
							<li class="divider"></li>
						</ul>
					</li> -->
					<li class="nav-item">
						<a href="?url=user/konsultasi">Konsultasi</a>
						<!-- <a href="#" data-toggle="dropdown" class="dropdown-toggle">Operasional</a> -->
						<!-- <ul class="dropdown-menu"> -->
							<!-- <li></li> -->
							<!-- <li><a href="?url=user/laboratorium">Entry Hasil Lab</a></li> -->
						<!-- </ul> -->
					</li>
					<li class="nav-item"><a href="#" class="nav-link">Report</a></li>
				</ul>
				<ul class="nav navbar-nav" style="float:right">
					<li class="nav-item pull-right">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle"><strong class="glyphicon glyphicon-menu-hamburger"></strong></a>
						<ul class="dropdown-menu">
							<li>
								<a href="?url=index/about">About</a>
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

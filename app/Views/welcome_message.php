<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Web Data</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>"/>
	<!-- STYLES -->
	<link rel="icon" href="<?= base_url('images/iconplus no bg.png') ?>"/>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<body>
	<input type="checkbox" id="nav-toggle">
	<div class="sidebar">
		<div class="sidebar-brand">
			<img src="<?php echo base_url('images/iconplus no bg.png'); ?>" alt="" width="150px" height="150px" />
		</div>
		<div class="sidebar-menu">
			<ul>
				<li>
					<a href="<?php echo site_url('/Data/index'); ?>" class="active"><span class="las la-home"></span>
					<span>Dashboard</span></a>
				</li>
				<li>
				<a href="<?php echo site_url('/Data/index_divisi1'); ?>"><span class="las la-users"></span>
					<span>OpHar</span></a>
				</li>
				<li>
					<a href="<?php echo site_url('/Data/index_divisi2'); ?>"><span class="las la-users"></span>
					<span>Asset</span></a>
				</li>
				<li>
					<a href="<?php echo site_url('/Data/index_divisi3'); ?>"><span class="las la-users"></span>
					<span>Fasilitas</span></a>
				</li>
				<li>
					<a href="<?php echo site_url('/Data/index_divisi4'); ?>"><span class="las la-users"></span>
					<span>Inventory</span></a>
				</li>
				<li>
					<a href="<?php echo site_url('/Data/index_divisi5'); ?>"><span class="las la-users"></span>
					<span>Collection</span></a>
				</li>
			</ul>
		</div>
	</div>
	
	<div class="main-content">
		<header>
			<h2>
				<label for="nav-toggle">
					<span class="las la-bars"></span>
				</label>
				Dashboard
			</h2>
			<div class="dropdown">
				<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<a><?= session()->get('iduser'); ?></a>
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="<?= site_url('login/keluar');?> ">Logout</a>
				</div>
			</div>
		</header>
		<main>
			<div class="cards">
				<div class="card-single">
					<div>
						<h1><?php echo $jumlah_divisi1 ?></h1>
						<span>OpHar</span>
					</div>
					<div>
						<span class="las la-clipboard-list"></span>
					</div>
				</div>
				<div class="card-single">
					<div>
						<h1><?php echo $jumlah_divisi2 ?></h1>
						<span>Asset</span>
					</div>
					<div>
						<span class="las la-clipboard-list"></span>
					</div>
				</div>
				<div class="card-single">
					<div>
						<h1><?php echo $jumlah_divisi3 ?></h1>
						<span>Fasilitas</span>
					</div>
					<div>
						<span class="las la-clipboard-list"></span>
					</div>
				</div>
				<div class="card-single">
					<div>
						<h1><?php echo $jumlah_divisi4 ?></h1>
						<span>Inventory</span>
					</div>
					<div>
						<span class="las la-clipboard-list"></span>
					</div>
				</div>
				<div class="card-single">
					<div>
						<h1><?php echo $jumlah_divisi5 ?></h1>
						<span>Collection</span>
					</div>
					<div>
						<span class="las la-clipboard-list"></span>
					</div>
				</div>
			</div>
		</main>
	</div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<head>
	<title>Web Data</title>
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>"/>
	<link rel="stylesheet" href="<?= base_url('css/stylemodal.css') ?>"/>
	<!-- STYLES -->
	<link rel="icon" href="<?= base_url('images/iconplus no bg.png') ?>"/>
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
					<a href="<?php echo site_url('/Data/index'); ?>" class=""><span class="las la-home"></span>
					<span>Dashboard</span></a>
				</li>
				<li>
					<a href="<?php echo site_url('/Data/index_divisi1'); ?>" class="active"><span class="las la-users"></span>
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
				<?php echo $title ?>
			</h2>
			
			<form action="" method="get">
				<div class="input-group">
				<div class="input-group mb-3">
					<input type="text" id="cari" name="cari" class="form-control" placeholder="Masukkan nama data">
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit" name="submit">Cari</button>
					</div>
				</div>
				</div>
			</form>
			
			<div class="dropdown">
				<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<a><?= session()->get('iduser'); ?></a>
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="<?= site_url('login/keluar');?> ">Logout</a>
				</div>
			</div>
		</header>

		<main style="width: 100%; left: 0px;">
			<div class="recent-grid">
				<div class="projects">
					<div class="card">
						<div class="card-header">
							<h3>Data <?php echo $title ?></h3>
							<?php if  (session()->idlevel == 2) : ?>
								<button style="background: #3cb371; border: #3cb371;" data-toggle="modal" data-target="#myModal">Upload Data <span class="las la-plus"></span></button>
						</div>

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
    	<div class="modal-content">
    
        <!-- Modal Header -->
        <div class="modal-header">
			<h4 class="modal-title">Upload Data</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
		<?php echo \Config\Services::validation()->listErrors() ?>
		<form action="<?php echo base_url('Data/simpan'); ?>" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
			<p>Judul Data</p>
			<input type="text" name="data_name" id="data_name" required/>
			<div class="item" style="margin-bottom:15px;">
			<select name="divisi" id="divisi" required>
            <option value="">Pilih Divisi</option>
            <option value="1">OpHar</option>
            <option value="2">Asset</option>
            <option value="3">Fasilitas</option>
            <option value="4">Inventory</option>
			<option value="5">Collection</option>
        </select>
		<p>Masukkan Link</p>
		<input type="text" name="link" id="link"/>
        </div>
		<p>Atau Upload File</p>
		<input type="file" name="file" id="file">
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
        </div>
		</form>
    </div>
    </div>
</div>
<?php
  if (isset($_GET['page'])) {
	$page = $_GET['page'];
	$jumlah = 10;
	$no = ($jumlah * $page) - $jumlah + 1;
} else {
	$no = 1;
}
?>
						<div class="card-body">
							<table width="100%">
								<thead>
									<tr>
										<td width="5%">No.</td>
										<td width="40%">Judul Data</td>
										<td width="25%">Tanggal Upload</td>
										<td width="15%"> </td>
										<td width="15%">Aksi</td>
									</tr>
								</thead>
								<tbody>
								<?php $no=1;
									foreach ($dataList as $row) : ?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $row->data_name?></td>
										<td><?php echo $row->tanggal?></td>
										<td><a href="<?= $row->link;
										if ($row->link == NULL) {
											echo base_url('Data/detail/'.$row->id);
										}?>" target="_blank">View Data</a>
										</td>
										<td><a onclick="return confirm('Apakah data akan dihapus?')" href="<?php echo base_url('Data/hapus'); ?>/<?= $row->id;?>"><button style="background: red; border: red;">Hapus</button></a></td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
							<?= $pager->makeLinks($page, $perPage, $total, 'front_full') ?>
						</div>
								<?php endif ?>


								<?php if  (session()->idlevel == 1) : ?>
</div>
						<?php
							if (isset($_GET['page'])) {
								$page = $_GET['page'];
								$jumlah = 10;
								$no = ($jumlah * $page) - $jumlah + 1;
							} else {
								$no = 1;
							}
						?>
						<div class="card-body">
							<table width="100%">
								<thead>
									<tr>
										<td width="5%">No.</td>
										<td width="45%">Judul Data</td>
										<td width="30%">Tanggal Upload</td>
										<td width="15%"> </td>
									</tr>
								</thead>
								<tbody>
								<?php $no=1;
									foreach ($dataList as $row) : ?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $row->data_name?></td>
										<td><?php echo $row->tanggal?></td>
										<td><a href="<?= $row->link;
										if ($row->link == NULL) {
											echo base_url('Data/detail/'.$row->id);
										}?>" target="_blank">View Data</a>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
									</table>
							<?= $pager->makeLinks($page, $perPage, $total, 'front_full') ?>
						</div>
								<?php endif ?>
					</div>
				</div>
			</div>
		</main>
	</div>
</body>
</html>
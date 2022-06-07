<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<head>
	<title><?php echo $dataList[0]['data_name']; ?></title>
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>"/>
	<!-- STYLES -->
	<link rel="icon" href="<?= base_url('images/iconplus no bg.png') ?>"/>
</head>
<body>
	<h3 style="margin:15px;">Lihat Data</h3>
	<div class="row">
		<div class="col-sm-12">
			<table class="table">
				<tr>
					<th width="200px">Judul Data</th>
					<th width="20px">:</th>
					<td><?php echo $dataList[0]['data_name']; ?></td>
				</tr>
				<tr>
					<th width="200px">Divisi</th>
					<th width="20px">:</th>
					<td><?php echo $title ?></td>
				</tr>
				<tr>
					<th width="200px">Tanggal Upload</th>
					<th width="20px">:</th>
					<td><?php echo $dataList[0]['tanggal']; ?></td>
				</tr>
			</table>
		</div>
	</div>
	<center><iframe src="<?= base_url('files/'.$dataList[0]['file']) ?>" frameborder="1" style="width: calc(100% - 40px); height: calc(100% - 40px); margin: 20px;"></iframe></center>
</body>
</html>
<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<link href="<?= base_url() ?>assets_style/leaflet/leaflet.css" rel="stylesheet">
<script src="<?= base_url() ?>assets_style/leaflet/leaflet.js"></script>

<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-list" style="color:green"> </i> <?= $title_web; ?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-list"></i>&nbsp; <?= $title_web; ?></li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-sm-6">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h4 class="card-title">Lokasi Pencurian</h4>
					</div>
					<div class="box-body">
						<div id="map" style="width: 100%; height: 400px;"></div>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h4>Detail Pencurian</h4>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table class="table table-striped table-bordered">
							<tr>
								<td>Tanggal</td>
								<td>:</td>
								<td><?= $pencurian->tanggal; ?></td>
							</tr>
							<tr>
								<td>Jumlah yang dicuri</td>
								<td>:</td>
								<td><?= $pencurian->jumlah; ?></td>
							</tr>
							<tr>
								<td>Objek yang dicuri</td>
								<td>:</td>
								<td><?= $pencurian->objek; ?></td>
							</tr>
							<tr>
								<td>Estimasi Kerugian</td>
								<td>:</td>
								<td><?= $pencurian->kerugian; ?></td>
							</tr>
							<tr>
								<td>Lokasi</td>
								<td>:</td>
								<td><?= $pencurian->lokasi; ?></td>
							</tr>
							<tr>
								<td>Gambar</td>
								<td>:</td>
								<td> <img src="<?= base_url(); ?>assets_style/file/<?php echo $pencurian->foto; ?>" class="img-responsive" style="height:auto;width:250px;" /></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script>
	var pencurian = L.layerGroup();
	var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11'
	});


	var peta2 = L.tileLayer('http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}', {
		attribution: 'google'
	});

	var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	});

	var map = L.map('map', {
		center: [<?= $pencurian->latitude ?>, <?= $pencurian->longitude ?>],
		zoom: 14,
		layers: [peta3, pencurian]
	});

	var baseLayers = {
		"Grayscale": peta1,
		"Satelite": peta2,
		"Streets": peta3
	};

	var overlays = {
		"Pencurian": pencurian,
	};

	L.control.layers(baseLayers, overlays).addTo(map);

	L.marker([<?= $pencurian->latitude ?>, <?= $pencurian->longitude ?>], {
		icon: L.icon({
			iconUrl: '<?= base_url('assets_style/marker/marker_white.png')  ?>',
			iconSize: [40, 70],
		})
	}).addTo(pencurian)
</script>
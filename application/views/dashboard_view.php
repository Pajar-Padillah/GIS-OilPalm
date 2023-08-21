<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<?php if ($this->session->flashdata('success_login')) { ?>
  <script>
    Swal.fire({
      title: 'Success!',
      text: 'Anda Berhasil Login!',
      icon: 'success',
      timer: 1500
    });
  </script>
<?php } ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Dashboard
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>
  <div>
    <div class="container">

      <?php
      $d = $this->db->query("SELECT * FROM tbl_user WHERE id_user = '$idbo'")->row();
      ?>
      <?php if ($this->session->userdata('level') == 'Ops sawit') { ?>
        <section class="content">
          <h2>
            Selamat Datang <?php echo $d->nama;
                            echo ' ( ' . $d->level . ' )'; ?></h2>
          <h2>di Web Sistem Informasi Geografis Kebun Kelapa Sawit PTPN VII</h2>
          <div class="row">
            <div class="col-lg-6">
              <img src="<?php echo base_url(); ?>assets_style/front/img/kantorptpn7.jpg" alt="#" class="user-image" style="height:auto;width:100%;" />
            </div>
            <div class="col-lg-5">
              <div class="callout callout-info">
                <h5><i class="fa fa-info"></i>nfo</h5>
                <strong> Sistem Informasi Geografis Kelapa Sawit (SIG Sawit) </strong> dibangun untuk mengatasi permasalahan pengolahan data spasial di perkebunan, yang diharapkan mampu membantu operasional sawit untuk melihat lokasi kebun kelapa sawit dalam bentuk pemetaan <em>online</em> dan informasi geografis secara menyeluruh dengan mudah dan cepat. Serta dapat berguna untuk mendukung pengambilan keputusan dan pemantauan pengendalian lahan kebun kelapa sawit.
              </div>
            </div>
          </div>
        </section>
      <?php } elseif ($this->session->userdata('level') == 'Admin PTI') { ?>
        <h2>
          Selamat Datang <?php echo $d->nama;
                          echo ' ( ' . $d->level . ' )'; ?></h2>
      <?php } elseif ($this->session->userdata('level') == 'Unit') { ?>
        <h2>
          Selamat Datang <?php echo $d->nama;
                          echo ' ( ' . $d->level . ' ';
                          echo '  ' . $d->asal_unit . ' )'; ?></h2>
        <h2>di Web Sistem Informasi Geografis Kebun Kelapa Sawit PTPN VII</h2>
      <?php } ?>
    </div>
    <!-- Main content -->
    <?php if ($this->session->userdata('level') == 'Admin PTI') { ?>
      <section class="content">
        <div class="row">
          <div class="col-sm-12">
            <div class="col-lg-2 col-xs-6">
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?= $count_pengguna; ?></h3>
                  <p>Pengguna</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <a href="user" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-2 col-xs-6">
              <div class="small-box bg-blue">
                <div class="inner">
                  <h3><?= $count_unit; ?></h3>
                  <p>Unit</p>
                </div>
                <div class="icon">
                  <i class="fa fa-list"></i>
                </div>
                <a href="unit" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <br>
            <div>
              <div class="container-fluid mt-2">
                <div id="map" style="width: 100%; height: 400px;"></div>
              </div>
            </div>
          </div>
      </section>
    <?php } elseif ($this->session->userdata('level') == 'Unit') { ?>
      <div class="container-fluid mt-2">
        <div id="map" style="width: 100%; height: 400px;"></div>
      </div>
    <?php } ?>


    <script>
      var unit = L.layerGroup();
      var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
          '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
          'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
      });

      var peta2 = L.tileLayer('http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}', {
        attribution: 'google'
      });

      var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      });

      var map = L.map('map', {
        center: [-3.7850281380927275, 104.45201607086797],
        zoom: 7,
        layers: [peta3]
      });

      var baseLayers = {
        "Grayscale": peta1,
        "Satelite": peta2,
        "Streets": peta3
      };

      //Home Button
      var homebutton = L.easyButton('fa-home fa-lg', function() {
        map.setView([-3.7850281380927275, 104.45201607086797], 7);
      }, 'home position', {
        position: 'topright'
      });
      L.control.layers(baseLayers).addTo(map);
      L.control.scale().addTo(map);
      homebutton.addTo(map);
      //Search
      L.Control.geocoder().addTo(map);

      //Minimap
      var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
      var osmAttrib = 'Map data &copy; OpenStreetMap contributors';
      var osm2 = new L.TileLayer(osmUrl, {
        minZoom: 0,
        maxZoom: 13,
        attribution: osmAttrib
      });
      var miniMap = new L.Control.MiniMap(osm2, {
        toggleDisplay: true
      }).addTo(map);

      //Unit marker
      <?php if ($this->session->userdata('level') == 'Unit') { ?>
        <?php foreach ($unit as $isi) { ?>
          L.marker([<?= $isi->latitude ?>, <?= $isi->longitude ?>], {
            icon: L.icon({
              iconUrl: '<?= base_url('assets_style/marker/marker-sawit.png')  ?>',
              iconSize: [50, 50],
            })
          }).addTo(map).on('click', function() {
            Swal.fire({
              imageUrl: '<?= base_url('assets_style/file/' .  $isi->foto) ?>',
              title: '<span class="text-uppercase">Nama Unit : <?= $isi->nama_unit ?></span>',
              html: "Alamat : <?= $isi->alamat ?><br> Luas Area : <?= $isi->luas ?> ha",
              imageHeight: 180,
              showCancelButton: true,
              cancelButtonText: "Tutup",
              confirmButtonText: "Lihat Detail",
              confirmButtonColor: "Green"
            }).then((result) => {
              if (result.isConfirmed) {
                window.location = '<?= base_url('unit/detail/' . $isi->id_unit) ?>';
              }
            })
          });
        <?php } ?>
      <?php } elseif ($this->session->userdata('level') == 'Admin PTI') { ?>
        <?php foreach ($unit_admin as $isi) { ?>
          L.marker([<?= $isi->latitude ?>, <?= $isi->longitude ?>], {
            icon: L.icon({
              iconUrl: '<?= base_url('assets_style/marker/marker-sawit.png')  ?>',
              iconSize: [50, 50],
            })
          }).addTo(map).on('click', function() {
            Swal.fire({
              imageUrl: '<?= base_url('assets_style/file/' .  $isi->foto) ?>',
              title: '<span class="text-uppercase">Nama Unit : <?= $isi->nama_unit ?></span>',
              html: "Alamat : <?= $isi->alamat ?><br> Luas Area : <?= $isi->luas ?> ha",
              imageHeight: 180,
              showCancelButton: true,
              cancelButtonText: "Tutup",
              confirmButtonText: "Lihat Detail",
              confirmButtonColor: "Green"
            }).then((result) => {
              if (result.isConfirmed) {
                window.location = '<?= base_url('unit/detail/' . $isi->id_unit) ?>';
              }
            })
          });
        <?php } ?>
      <?php } ?>
    </script>
  </div>
</div>
<!-- /.content -->
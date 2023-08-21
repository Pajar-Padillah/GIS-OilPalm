<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<link href="<?= base_url() ?>assets_style/leaflet/leaflet.css" rel="stylesheet">
<script src="<?= base_url() ?>assets_style/leaflet/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.css">
<script src="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.js"></script>
<link href="<?= base_url() ?>assets_style/leaflet/dist/Control.MiniMap.min.css" rel="stylesheet">
<script src="<?= base_url() ?>assets_style/leaflet/dist/Control.MiniMap.min.js"></script>

<div class="text-center my-3">
    <h2>PETA LOKASI KEBUN KELAPA SAWIT</h2>
</div>
<div class="container-fluid mt-2">
    <div id="map" style="width: 100%; height: 500px;"></div>
</div>
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
    <?php foreach ($unit as $isi) { ?>
        L.marker([<?= $isi->latitude ?>, <?= $isi->longitude ?>], {
            icon: L.icon({
                iconUrl: '<?= base_url('assets_style/marker/marker-red.png')  ?>',
                iconSize: [40, 55],
            })
        }).addTo(map).on('click', function() {
            Swal.fire({
                imageUrl: '<?= base_url('assets_style/file/' .  $isi->foto) ?>',
                title: '<span class="text-uppercase">Nama Unit : <?= $isi->nama_unit ?></span>',
                html: "Alamat : <?= $isi->alamat ?><br> Luas Area : <?= $isi->luas ?> ha",
                imageHeight: 200,
                showCancelButton: false,
            })
        });
    <?php } ?>
</script>
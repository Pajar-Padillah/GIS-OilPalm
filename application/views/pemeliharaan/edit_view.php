<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<script>
    function fetch() {
        var get = document.getElementById("get").value;
        document.getElementById("put").value = get;
    }
</script>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:green"> </i> Update Pemeliharaan
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-edit"></i>&nbsp; Update Pemeliharaan </li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php if (!empty($this->session->flashdata())) {
                    echo $this->session->flashdata('pesan');
                } ?>

                <div class="box box-primary">
                    <div class="box-header with-border">
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="<?php echo base_url('pemeliharaan/upd'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <input type="hidden" class="form-control" value="<?= $pemeliharaan->id_pemeliharaan; ?>" name="id_pemeliharaan">
                                <input type="hidden" name="foto_old" value="<?= $pemeliharaan->foto; ?>">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" value="<?= $pemeliharaan->tanggal; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Lokasi</label>
                                        <select name="lokasi" class="form-control" required="required" readonly>
                                            <?php
                                            $d = $this->db->query("SELECT * FROM tbl_user WHERE id_user = '$idbo'")->row();
                                            ?>
                                            <?php foreach ($unit as $isi) { ?>
                                                <option value="<?= $isi['nama_unit']; ?>" <?php if ($isi['nama_unit'] == $d->asal_unit) {
                                                                                                echo 'selected';
                                                                                            } ?>><?= $isi['nama_unit']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kegiatan Pemeliharaan</label>
                                        <select name="nama_pemeliharaan" class="form-control" required="required">
                                            <option <?php if ($pemeliharaan->nama_pemeliharaan == 'Pengendalian Gulma') {
                                                        echo 'selected';
                                                    } ?>>Pengendalian Gulma</option>
                                            <option <?php if ($pemeliharaan->nama_pemeliharaan == 'Pemupukan') {
                                                        echo 'selected';
                                                    } ?>>Pemupukan</option>
                                            <option <?php if ($pemeliharaan->nama_pemeliharaan == 'Sensus Tanaman') {
                                                        echo 'selected';
                                                    } ?>>Sensus Tanaman</option>
                                            <option <?php if ($pemeliharaan->nama_pemeliharaan == 'Kastrasi') {
                                                        echo 'selected';
                                                    } ?>>Kastrasi</option>
                                            <option <?php if ($pemeliharaan->nama_pemeliharaan == 'Pengendalian Hama dan Penyakit') {
                                                        echo 'selected';
                                                    } ?>>Pengendalian Hama dan Penyakit</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Luas</label>
                                        <input type="text" class="form-control" name="luas" value="<?= $pemeliharaan->luas; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah tenaga Kerja</label>
                                        <input type="text" class="form-control" name="jumlah_tenaga_kerja" value="<?= $pemeliharaan->jumlah_tenaga_kerja; ?>" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" accept="image/*" name="foto">
                                        <br />
                                        <img src="<?= base_url('assets_style/file/' . $pemeliharaan->foto); ?>" class="img-responsive" width="150">
                                    </div>
                                    <div class="form-group">
                                        <label>GeoJSON</label>
                                        <textarea name="pemeliharaan_geojson" rows="5" class="form-control" required="required"><?= $pemeliharaan->pemeliharaan_geojson; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="text" class="form-control" name="latitude" value="<?= $pemeliharaan->latitude; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Longitude</label>
                                        <input type="text" class="form-control" name="longitude" value="<?= $pemeliharaan->longitude; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Warna</label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="text" name="warna" id="put" value="<?= $pemeliharaan->warna; ?>" class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="color" id="get" onchange="fetch()">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary btn-md">Edit Pemeliharaan</button>
                        </form>
                        <a href="<?= base_url('pemeliharaan'); ?>" class="btn btn-danger btn-md">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
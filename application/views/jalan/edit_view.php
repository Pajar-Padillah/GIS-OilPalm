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
            <i class="fa fa-edit" style="color:green"> </i> Update Jalan - <?= $jalan->nama_jalan; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-edit"></i>&nbsp; Update Jalan - <?= $jalan->nama_jalan; ?></li>
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
                        <form action="<?php echo base_url('jalan/upd'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <input type="hidden" class="form-control" value="<?= $jalan->id_jalan; ?>" name="id_jalan">
                                <input type="hidden" name="foto_old" value="<?= $jalan->foto; ?>">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama Jalan</label>
                                        <input type="text" class="form-control" name="nama_jalan" value="<?= $jalan->nama_jalan; ?>" required="required">
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
                                        <label>Kondisi</label>
                                        <input type="text" class="form-control" name="kondisi" value="<?= $jalan->kondisi; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Panjang</label>
                                        <input type="text" class="form-control" name="panjang" value="<?= $jalan->panjang; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Lebar</label>
                                        <input type="text" class="form-control" name="lebar" value="<?= $jalan->lebar; ?>" required="required">
                                    </div>

                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" accept="image/*" name="foto">
                                        <br />
                                        <img src="<?= base_url('assets_style/file/' . $jalan->foto); ?>" class="img-responsive" width="150">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>GeoJSON</label>
                                        <textarea name="jalan_geojson" rows="5" class="form-control" required="required"><?= $jalan->jalan_geojson; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Ketebalan</label>
                                        <select name="ketebalan" class="form-control" required="required">
                                            <option <?php if ($jalan->ketebalan == '1') {
                                                        echo 'selected';
                                                    } ?>>1</option>
                                            <option <?php if ($jalan->ketebalan == '1') {
                                                        echo 'selected';
                                                    } ?>>1</option>
                                            <option <?php if ($jalan->ketebalan == '2') {
                                                        echo 'selected';
                                                    } ?>>2</option>
                                            <option <?php if ($jalan->ketebalan == '3') {
                                                        echo 'selected';
                                                    } ?>>3</option>
                                            <option <?php if ($jalan->ketebalan == '4') {
                                                        echo 'selected';
                                                    } ?>>4</option>
                                            <option <?php if ($jalan->ketebalan == '5') {
                                                        echo 'selected';
                                                    } ?>>5</option>
                                            <option <?php if ($jalan->ketebalan == '6') {
                                                        echo 'selected';
                                                    } ?>>6</option>
                                            <option <?php if ($jalan->ketebalan == '7') {
                                                        echo 'selected';
                                                    } ?>>7</option>
                                            <option <?php if ($jalan->ketebalan == '8') {
                                                        echo 'selected';
                                                    } ?>>8</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="text" class="form-control" name="latitude" value="<?= $jalan->latitude; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Longitude</label>
                                        <input type="text" class="form-control" name="longitude" value="<?= $jalan->longitude; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Warna</label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="text" name="warna" id="put" value="<?= $jalan->warna; ?>" class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="color" id="get" onchange="fetch()">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary btn-md">Edit Jalan</button>
                        </form>
                        <a href="<?= base_url('jalan'); ?>" class="btn btn-danger btn-md">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
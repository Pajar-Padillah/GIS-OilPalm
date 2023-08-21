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
            <i class="fa fa-edit" style="color:green"> </i> Update Panen
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-edit"></i>&nbsp; Update Panen </li>
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
                        <form action="<?php echo base_url('panen/upd'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <input type="hidden" class="form-control" value="<?= $panen->id_panen; ?>" name="id_panen">
                                <input type="hidden" name="foto_old" value="<?= $panen->foto; ?>">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" value="<?= $panen->tanggal; ?>" required="required">
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
                                        <label>Jumlah Tandan</label>
                                        <input type="text" class="form-control" name="jumlah_tandan" value="<?= $panen->jumlah_tandan; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Berat Kotor</label>
                                        <input type="text" class="form-control" name="berat_kotor" value="<?= $panen->berat_kotor; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Tara Kotor</label>
                                        <input type="text" class="form-control" name="tara_kotor" value="<?= $panen->tara_kotor; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Berat Bersih</label>
                                        <input type="text" class="form-control" name="berat_bersih" value="<?= $panen->berat_bersih; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun Tanam</label>
                                        <input type="text" class="form-control" name="tahun_tanam" value="<?= $panen->tahun_tanam; ?>" required="required" placeholder="Contoh : 2022">
                                    </div>
                                    <div class="form-group">
                                        <label>Total Panen</label>
                                        <input type="text" class="form-control" name="total_panen" value="<?= $panen->total_panen; ?>" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" accept="image/*" name="foto">
                                        <br />
                                        <img src="<?= base_url('assets_style/file/' . $panen->foto); ?>" class="img-responsive" width="150">
                                    </div>
                                    <div class="form-group">
                                        <label>GeoJSON</label>
                                        <textarea name="panen_geojson" rows="5" class="form-control" required="required"><?= $panen->panen_geojson; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="text" class="form-control" name="latitude" value="<?= $panen->latitude; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Longitude</label>
                                        <input type="text" class="form-control" name="longitude" value="<?= $panen->longitude; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Warna</label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="text" name="warna" id="put" value="<?= $panen->warna; ?>" class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="color" id="get" onchange="fetch()">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary btn-md">Edit Panen</button>
                        </form>
                        <a href="<?= base_url('panen'); ?>" class="btn btn-danger btn-md">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
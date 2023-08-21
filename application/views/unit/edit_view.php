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
            <i class="fa fa-edit" style="color:green"> </i> Update unit - <?= $unit->nama_unit; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-edit"></i>&nbsp; Update unit - <?= $unit->nama_unit; ?></li>
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
                        <form action="<?php echo base_url('unit/upd'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <input type="hidden" class="form-control" value="<?= $unit->id_unit; ?>" name="id_unit">
                                <input type="hidden" name="foto_old" value="<?= $unit->foto; ?>">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama Unit</label>
                                        <input type="text" class="form-control" name="nama_unit" value="<?= $unit->nama_unit; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Kepala Unit</label>
                                        <input type="text" class="form-control" readonly name="nama_kepala_unit" value="<?= $unit->nama_kepala_unit; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Luas TM</label>
                                        <input type="text" class="form-control" name="luas_tm" value="<?= $unit->luas_tm; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Luas TBM</label>
                                        <input type="text" class="form-control" name="luas_tbm" value="<?= $unit->luas_tbm; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Luas Unit</label>
                                        <input type="text" class="form-control" name="luas" value="<?= $unit->luas; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" rows="5" class="form-control" required="required"><?= $unit->alamat; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" accept="image/*" name="foto">
                                        <br />
                                        <img src="<?= base_url('assets_style/file/' . $unit->foto); ?>" class="img-responsive" width="150">
                                    </div>
                                    <div class="form-group">
                                        <label>GeoJSON</label>
                                        <textarea name="unit_geojson" rows="5" class="form-control" required="required"><?= $unit->unit_geojson; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="text" class="form-control" value="<?= $unit->latitude; ?>" name="latitude" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Longitude</label>
                                        <input type="text" class="form-control" value="<?= $unit->longitude; ?>" name="longitude" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Warna</label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="text" name="warna" id="put" value="<?= $unit->warna; ?>" class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="color" id="get" onchange="fetch()">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary btn-md">Edit Unit</button>
                        </form>
                        <a href="<?= base_url('unit'); ?>" class="btn btn-danger btn-md">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
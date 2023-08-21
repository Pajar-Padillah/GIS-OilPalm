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
            <i class="fa fa-plus" style="color:green"> </i> Tambah Panen
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-plus"></i>&nbsp; Tambah Panen</li>
        </ol>
    </section>
    <section class="content">
        <?php if (!empty($this->session->flashdata())) {
            echo $this->session->flashdata('pesan');
        } ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="<?php echo base_url('panen/add'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tanggal Panen</label>
                                        <input type="date" class="form-control" name="tanggal" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Lokasi</label>
                                        <select name="lokasi" class="form-control" required readonly>
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
                                        <input type="text" class="form-control" name="jumlah_tandan" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Berat Kotor</label>
                                        <input type="text" class="form-control" name="berat_kotor" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Tara Kotor</label>
                                        <input type="text" class="form-control" name="tara_kotor" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Berat Bersih</label>
                                        <input type="text" class="form-control" name="berat_bersih" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun Tanam</label>
                                        <input type="text" class="form-control" name="tahun_tanam" required="required" placeholder="Contoh : 2022">
                                    </div>
                                    <div class="form-group">
                                        <label>Total Panen</label>
                                        <input type="text" class="form-control" name="total_panen" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Foto <small style="color:red">(.jpg|.jpeg) * wajib</small></label>
                                        <input type="file" accept="image/*" name="foto" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>GeoJSON</label>
                                        <textarea name="panen_geojson" rows="5" class="form-control" required="required"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="text" class="form-control" name="latitude" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Longitude</label>
                                        <input type="text" class="form-control" name="longitude" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Warna</label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="text" name="warna" id="put" class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="color" id="get" onchange="fetch()">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary btn-md">Submit</button>
                        </form>
                        <a href="<?= base_url('panen'); ?>" class="btn btn-danger btn-md">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
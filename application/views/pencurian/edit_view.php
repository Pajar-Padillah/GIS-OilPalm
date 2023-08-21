<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:green"> </i> Update Pencurian
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-edit"></i>&nbsp; Update Pencurian </li>
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
                        <form action="<?php echo base_url('pencurian/upd'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <input type="hidden" class="form-control" value="<?= $pencurian->id_pencurian; ?>" name="id_pencurian">
                                <input type="hidden" name="foto_old" value="<?= $pencurian->foto; ?>">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" value="<?= $pencurian->tanggal; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah yang dicuri</label>
                                        <input type="text" class="form-control" name="jumlah" value="<?= $pencurian->jumlah; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Objek yang dicuri</label>
                                        <input type="text" class="form-control" name="objek" value="<?= $pencurian->objek; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Estimasi Kerugian</label>
                                        <input type="text" class="form-control" name="kerugian" value="<?= $pencurian->kerugian; ?>" required="required">
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
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" accept="image/*" name="foto">
                                        <br />
                                        <img src="<?= base_url('assets_style/file/' . $pencurian->foto); ?>" class="img-responsive" width="150">
                                    </div>

                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="text" class="form-control" name="latitude" value="<?= $pencurian->latitude; ?>" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Longitude</label>
                                        <input type="text" class="form-control" name="longitude" value="<?= $pencurian->longitude; ?>" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary btn-md">Edit Pencurian</button>
                        </form>
                        <a href="<?= base_url('pencurian'); ?>" class="btn btn-danger btn-md">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
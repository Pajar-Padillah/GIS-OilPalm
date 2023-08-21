<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-plus" style="color:green"> </i> Tambah User
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-plus"></i>&nbsp; Tambah User</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="<?php echo base_url('user/add'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama Pengguna</label>
                                        <input type="text" autofocus class="form-control" name="nama" required="required" placeholder="Nama Pengguna">
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" class="form-control" name="lahir" required="required" placeholder="Contoh : Bekasi">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tgl_lahir" required="required" placeholder="Contoh : 1999-05-18">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="user" required="required" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="pass" required="required" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label>Level</label>
                                        <select name="level" id="level" class="form-control" required="required">
                                            <option value="Admin PTI">Admin PTI</option>
                                            <option value="Unit">Unit</option>
                                            <option value="Ops Sawit">Ops Sawit</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="asal_unit">
                                        <label>Asal Unit</label>
                                        <select name="asal_unit" class="form-control">
                                            <option disabled selected value>-- Pilih Unit --</option>
                                            <?php foreach ($unit as $isi) { ?>
                                                <option value="<?= $isi['nama_unit']; ?>"><?= $isi['nama_unit']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <br />
                                        <input type="radio" name="jenkel" value="Laki-Laki" required="required"> Laki-Laki
                                        <br />
                                        <input type="radio" name="jenkel" value="Perempuan" required="required"> Perempuan
                                    </div>
                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input id="uintTextBox" class="form-control" name="telepon" required="required" placeholder="Contoh : 089618173609">
                                    </div>
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input type="email" class="form-control" name="email" required="required" placeholder="Contoh : fadhilahf51@gmail.com">
                                    </div>
                                    <div class="form-group">
                                        <label>Pas Foto</label>
                                        <input type="file" accept="image/*" name="gambar" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" required="required"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary btn-md">Submit</button>
                        </form>
                        <a href="<?= base_url('user'); ?>" class="btn btn-danger btn-md">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#asal_unit").hide();
        tampil_unit();
    });

    function tampil_unit() {
        $("#level").change(function() {
            var a = $("#level").val();

            if (a == "Unit") {
                $("#asal_unit").show();
            } else {
                $("#asal_unit").hide();
            }
        });
    }
</script>
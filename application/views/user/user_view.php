<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:green"> </i> Daftar Data User
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-file-text"></i>&nbsp; Daftar Data User</li>
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
                        <a href="user/tambah"><button class="btn btn-primary"><i class="fa fa-plus"> </i> Tambah User</button></a>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <br />
                            <table id="example1" class="table table-bordered table-striped table" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Jenkel</th>
                                        <th>Telepon</th>
                                        <th>Level</th>
                                        <th>Asal Unit</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($user as $isi) { ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td>
                                                <center>
                                                    <?php if (!empty($isi['foto'] !== "-")) { ?>
                                                        <img src="<?php echo base_url(); ?>assets_style/image/<?php echo $isi['foto']; ?>" alt="#" class="img-responsive" style="height:auto;width:100px;" />
                                                    <?php } else { ?>
                                                        <!--<img src="" alt="#" class="user-image" style="border:2px solid #fff;"/>-->
                                                        <i class="fa fa-user fa-3x" style="color:#333;"></i>
                                                    <?php } ?>
                                                </center>
                                            </td>
                                            <td><?= $isi['nama']; ?></td>
                                            <td><?= $isi['user']; ?></td>
                                            <td><?= $isi['jenkel']; ?></td>
                                            <td><?= $isi['telepon']; ?></td>
                                            <td><?= $isi['level']; ?></td>
                                            <?php if ($isi['level'] == 'Unit') { ?>
                                                <td><?= $isi['asal_unit']; ?></td>
                                            <?php } else { ?>
                                                <td>
                                                    <center>-</center>
                                                </td>
                                            <?php } ?>
                                            <td><?= $isi['alamat']; ?></td>
                                            <?php if ($isi['id_user'] == '12') { ?>
                                                <td>
                                                    <a href="<?= base_url('user/edit/' . $isi['id_user']); ?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                                </td>
                                            <?php } else { ?>
                                                <td>
                                                    <a href="<?= base_url('user/edit/' . $isi['id_user']); ?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                                    <button data-toggle="modal" data-target="#del<?= $isi['id_user'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php foreach ($user as $isi) : ?>
    <!-- Modal Hapus -->
    <div class="modal fade" id="del<?= $isi['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><b>Hapus User</b></h4>
                </div>
                <div class="modal-body">
                    Yakin ingin menghapus user <strong><?= $isi['nama'] ?></strong> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <a class="btn btn-danger" href="<?= base_url('user/del/' . $isi['id_user']); ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:green"> </i> Daftar Data Unit
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-file-text"></i>&nbsp; Daftar Data Unit</li>
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
                        <?php if ($this->session->userdata('level') == 'Admin PTI') { ?>
                            <a href="unit/tambah"><button class="btn btn-primary"><i class="fa fa-plus"> </i> Tambah Unit</button></a>
                        <?php } ?>
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
                                        <th>Nama Unit</th>
                                        <th>Kepala Unit</th>
                                        <th>Luas TM</th>
                                        <th>Luas TBM</th>
                                        <th>Luas Unit</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php if ($this->session->userdata('level') == 'Admin PTI') { ?>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($unit as $isi) { ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td> <img src="<?= base_url(); ?>assets_style/file/<?php echo $isi['foto']; ?>" class="img-responsive" style="height:auto;width:100px;" /></td>
                                                <td><?= $isi['nama_unit']; ?></td>
                                                <td><?= $isi['nama_kepala_unit']; ?></td>
                                                <td><?= $isi['luas_tm']; ?></td>
                                                <td><?= $isi['luas_tbm']; ?></td>
                                                <td><?= $isi['luas']; ?></td>
                                                <td><?= $isi['alamat']; ?></td>
                                                <td style="width:17%;">
                                                    <a href="<?= base_url('unit/edit/' . $isi['id_unit']); ?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                                    <a href="<?= base_url('unit/detail/' . $isi['id_unit']); ?>"><button class="btn btn-primary"><i class="fa fa-sign-in"></i> Detail</button></a>
                                                    <button data-toggle="modal" data-target="#del<?= $isi['id_unit'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        <?php $no++;
                                        } ?>
                                    </tbody>
                                <?php }
                                if ($this->session->userdata('level') == 'Unit') { ?>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($unit_user as $isi) { ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td> <img src="<?= base_url(); ?>assets_style/file/<?php echo $isi->foto; ?>" class="img-responsive" style="height:auto;width:100px;" /></td>
                                                <td><?= $isi->nama_unit ?></td>
                                                <td><?= $isi->nama_kepala_unit ?></td>
                                                <td><?= $isi->luas_tm ?></td>
                                                <td><?= $isi->luas_tbm ?></td>
                                                <td><?= $isi->luas ?></td>
                                                <td><?= $isi->alamat ?></td>
                                                <td style="width:13%;">
                                                    <a href="<?= base_url('unit/edit/' . $isi->id_unit); ?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                                    <a href="<?= base_url('unit/detail/' . $isi->id_unit); ?>">
                                                        <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Detail</button></a>
                                                </td>
                                            </tr>
                                        <?php $no++;
                                        } ?>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Hapus -->
<?php foreach ($unit as $isi) : ?>
    <div class="modal fade" id="del<?= $isi['id_unit'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><b>Hapus Unit</b></h4>
                </div>
                <div class="modal-body">
                    Yakin ingin menghapus unit <strong><?= $isi['nama_unit'] ?></strong> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <a class="btn btn-danger" href="<?= base_url('unit/del/' . $isi['id_unit']); ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
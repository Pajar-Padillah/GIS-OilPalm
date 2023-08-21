<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-edit" style="color:green"> </i> Laporan
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
      <li class="active"><i class="fa fa-file-text"></i>&nbsp; laporan</li>
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

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <h5><b>Pilih Laporan</b></h5>
                  <select id="nm_laporan" name="nm_laporan" class="form-control" required="required">
                    <?php if (isset($_POST['panen'])) { ?>
                      <option value="1" selected>Panen</option>
                      <option value="2">Pemeliharaan</option>
                      <option value="3">Jalan</option>
                      <option value="4">Pencurian</option>
                      <option value="5">Bencana Alam</option>
                    <?php } elseif (isset($_POST['pemeliharaan'])) { ?>
                      <option value="1">Panen</option>
                      <option value="2" selected>Pemeliharaan</option>
                      <option value="3">Jalan</option>
                      <option value="4">Pencurian</option>
                      <option value="5">Bencana Alam</option>
                    <?php } elseif (isset($_POST['jalan'])) { ?>
                      <option value="1">Panen</option>
                      <option value="2">Pemeliharaan</option>
                      <option value="3" selected>Jalan</option>
                      <option value="4">Pencurian</option>
                      <option value="5">Bencana Alam</option>
                    <?php } elseif (isset($_POST['pencurian'])) { ?>
                      <option value="1">Panen</option>
                      <option value="2">Pemeliharaan</option>
                      <option value="3">Jalan</option>
                      <option value="4" selected>Pencurian</option>
                      <option value="5">Bencana Alam</option>
                    <?php } elseif (isset($_POST['bencana'])) { ?>
                      <option value="1">Panen</option>
                      <option value="2">Pemeliharaan</option>
                      <option value="3">Jalan</option>
                      <option value="4">Pencurian</option>
                      <option value="5" selected>Bencana Alam</option>
                    <?php } else { ?>
                      <option value="1">Panen</option>
                      <option value="2">Pemeliharaan</option>
                      <option value="3">Jalan</option>
                      <option value="4">Pencurian</option>
                      <option value="5">Bencana Alam</option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div id="panen">
                  <h5 class="mb-2"><b>Pilih Periode Tanggal Panen</b></h5>
                  <form method="post" action="<?php echo base_url('laporan/panen') ?>">
                    <div class="row mb-3">
                      <div class="col-sm-5">
                        <p class="mx-3">Dari tanggal</p>
                        <?php if (isset($_POST['panen'])) : ?>
                          <input type="date" class="form-control" name="tanggal_awal_panen" value="<?= $tgl_awal_panen; ?>">
                        <?php else : ?>
                          <input type="date" class="form-control" name="tanggal_awal_panen" value="<?= date('Y-m-01'); ?>">
                        <?php endif ?>
                      </div>
                      <div class="col-sm-5">
                        <p class="mx-3">Sampai tanggal</p>
                        <?php if (isset($_POST['panen'])) : ?>
                          <input type="date" class="form-control" name="tanggal_akhir_panen" value="<?= $tgl_akhir_panen; ?>">
                        <?php else : ?>
                          <input type="date" class="form-control" name="tanggal_akhir_panen" value="<?= date('Y-m-d'); ?>">
                        <?php endif ?>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-2 mb-2">
                        <button style="color: white;" type="submit" name="panen" value="true" class="btn btn-primary mb-2"><i class="fa fa-filter"></i> Filter</button>
                      </div>
                      <div class="col-md-2">
                        <a href="<?= base_url('laporan'); ?>" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</a>
                      </div>
                    </div>
                  </form>
                </div>

                <div id="pemeliharaan">
                  <h5 class="mb-2"><b>Pilih Periode Tanggal Pemeliharaan</b></h5>
                  <form method="post" action="<?php echo base_url('laporan/pemeliharaan') ?>">

                    <div class="row mb-3">
                      <div class="col-sm-5">
                        <p class="mx-3">Dari tanggal</p>
                        <?php if (isset($_POST['pemeliharaan'])) : ?>
                          <input type="date" class="form-control" name="tanggal_awal_pemeliharaan" value="<?= $tgl_awal_pemeliharaan; ?>">
                        <?php else : ?>
                          <input type="date" class="form-control" name="tanggal_awal_pemeliharaan" value="<?= date('Y-m-01'); ?>">
                        <?php endif ?>
                      </div>
                      <div class="col-sm-5">
                        <p class="mx-3">Sampai tanggal</p>
                        <?php if (isset($_POST['pemeliharaan'])) : ?>
                          <input type="date" class="form-control" name="tanggal_akhir_pemeliharaan" value="<?= $tgl_akhir_pemeliharaan; ?>">
                        <?php else : ?>
                          <input type="date" class="form-control" name="tanggal_akhir_pemeliharaan" value="<?= date('Y-m-d'); ?>">
                        <?php endif ?>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-2 mb-2">
                        <button style="color: white;" type="submit" name="pemeliharaan" value="true" class="btn btn-primary mb-2"><i class="fa fa-filter"></i> Filter</button>
                      </div>
                      <div class="col-md-2">
                        <a href="<?= base_url('laporan'); ?>" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</a>
                      </div>
                    </div>
                  </form>
                </div>

                <div id="jalan">
                  <h5 class="mb-2"><b>Laporan Jalan</b></h5>
                  <?php if ($this->session->userdata('level') == 'Ops sawit') { ?>
                    <form method="get" action="<?php echo base_url('jalan/jalanpdf') ?>">
                    <?php } elseif ($this->session->userdata('level') == 'Unit') { ?>
                      <form method="get" action="<?php echo base_url('jalan/jalanpdfunit') ?>">
                      <?php } ?>
                      <button style="color: white;" formtarget="_blank" type="submit" name="jalan" value="true" class="btn btn-warning"><i class="fa fa-file"></i> Cetak Jalan</button>
                      </form>
                </div>
                <div id="pencurian">
                  <h5 class="mb-2"><b>Pilih Periode Tanggal Pencurian</b></h5>
                  <form method="post" action="<?php echo base_url('laporan/pencurian') ?>">

                    <div class="row mb-3">
                      <div class="col-sm-5">
                        <p class="mx-3">Dari tanggal</p>
                        <?php if (isset($_POST['pencurian'])) : ?>
                          <input type="date" class="form-control" name="tanggal_awal_pencurian" value="<?= $tgl_awal_pencurian; ?>">
                        <?php else : ?>
                          <input type="date" class="form-control" name="tanggal_awal_pencurian" value="<?= date('Y-m-01'); ?>">
                        <?php endif ?>
                      </div>
                      <div class="col-sm-5">
                        <p class="mx-3">Sampai tanggal</p>
                        <?php if (isset($_POST['pencurian'])) : ?>
                          <input type="date" class="form-control" name="tanggal_akhir_pencurian" value="<?= $tgl_akhir_pencurian; ?>">
                        <?php else : ?>
                          <input type="date" class="form-control" name="tanggal_akhir_pencurian" value="<?= date('Y-m-d'); ?>">
                        <?php endif ?>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-2 mb-2">
                        <button style="color: white;" type="submit" name="pencurian" value="true" class="btn btn-primary mb-2"><i class="fa fa-filter"></i> Filter</button>
                      </div>
                      <div class="col-md-2">
                        <a href="<?= base_url('laporan'); ?>" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</a>
                      </div>
                    </div>
                  </form>
                </div>
                <div id="bencana">
                  <h5 class="mb-2"><b>Pilih Periode Tanggal Bencana</b></h5>
                  <form method="post" action="<?php echo base_url('laporan/bencana') ?>">

                    <div class="row mb-3">
                      <div class="col-sm-5">
                        <p class="mx-3">Dari tanggal</p>
                        <?php if (isset($_POST['bencana'])) : ?>
                          <input type="date" class="form-control" name="tanggal_awal_bencana" value="<?= $tgl_awal_bencana; ?>">
                        <?php else : ?>
                          <input type="date" class="form-control" name="tanggal_awal_bencana" value="<?= date('Y-m-01'); ?>">
                        <?php endif ?>
                      </div>
                      <div class="col-sm-5">
                        <p class="mx-3">Sampai tanggal</p>
                        <?php if (isset($_POST['bencana'])) : ?>
                          <input type="date" class="form-control" name="tanggal_akhir_bencana" value="<?= $tgl_akhir_bencana; ?>">
                        <?php else : ?>
                          <input type="date" class="form-control" name="tanggal_akhir_bencana" value="<?= date('Y-m-d'); ?>">
                        <?php endif ?>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-2 mb-2">
                        <button style="color: white;" type="submit" name="bencana" value="true" class="btn btn-primary mb-2"><i class="fa fa-filter"></i> Filter</button>
                      </div>
                      <div class="col-md-2">
                        <a href="<?= base_url('laporan'); ?>" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div id="tabel_panen">
              <?php if (isset($_POST['panen'])) : ?>
                <div class="my-3">
                  <?php if ($this->session->userdata('level') == 'Ops sawit') { ?>
                    <?php if (!empty($panen)) { ?>
                      <a target="_blank" href="<?= base_url('panen/panenPDF/' . $tgl_awal_panen . '/' . $tgl_akhir_panen); ?>" class="btn btn-success"><i class="fa fa-print"></i> Cetak Panen</a>
                    <?php } ?>
                  <?php } elseif ($this->session->userdata('level') == 'Unit') { ?>
                    <?php if (!empty($panen)) { ?>
                      <a target="_blank" href="<?= base_url('panen/panenPDFunit/' . $tgl_awal_panen . '/' . $tgl_akhir_panen); ?>" class="btn btn-success"><i class="fa fa-print"></i> Cetak Panen</a>
                    <?php } ?>
                  <?php } ?>
                </div>
                <?php
                $tanggal_awal_heading_panen = date('d-m-Y', strtotime($tgl_awal_panen));
                $tanggal_akhir_heading_panen = date('d-m-Y', strtotime($tgl_akhir_panen));
                ?>
                <h4> Daftar Panen Tanggal <?= $tanggal_awal_heading_panen; ?> s/d <?= $tanggal_akhir_heading_panen; ?></h4>
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped table" width="100%">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal Panen</th>
                        <th>Lokasi</th>
                        <th>Jumlah Tandan</th>
                        <th>Berat Kotor</th>
                        <th>Tara Kotor</th>
                        <th>Berat Bersih</th>
                        <th>Tahun Tanam</th>
                        <th>Total Panen (ton)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($panen as $isi) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= date('d M Y', strtotime($isi->tanggal)) ?></td>
                          <td><?= $isi->lokasi ?></td>
                          <td><?= $isi->jumlah_tandan ?></td>
                          <td><?= $isi->berat_kotor ?></td>
                          <td><?= $isi->tara_kotor ?></td>
                          <td><?= $isi->berat_bersih ?></td>
                          <td><?= $isi->tahun_tanam ?></td>
                          <td><?= $isi->total_panen ?></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              <?php endif ?>
            </div>
            <div id="tabel_pemeliharaan">
              <?php if (isset($_POST['pemeliharaan'])) : ?>
                <div class="my-3">
                  <?php if ($this->session->userdata('level') == 'Ops sawit') { ?>
                    <?php if (!empty($pemeliharaan)) { ?>
                      <a target="_blank" href="<?= base_url('pemeliharaan/pemeliharaanPDF/' . $tgl_awal_pemeliharaan . '/' . $tgl_akhir_pemeliharaan); ?>" class="btn btn-warning"><i class="fa fa-print"></i> Cetak Pemeliharaan</a>
                    <?php } ?>
                  <?php } elseif ($this->session->userdata('level') == 'Unit') { ?>
                    <?php if (!empty($pemeliharaan)) { ?>
                      <a target="_blank" href="<?= base_url('pemeliharaan/pemeliharaanPDFunit/' . $tgl_awal_pemeliharaan . '/' . $tgl_akhir_pemeliharaan); ?>" class="btn btn-warning"><i class="fa fa-print"></i> Cetak Pemeliharaan</a>
                    <?php } ?>
                  <?php } ?>
                </div>
                <?php
                $tanggal_awal_heading_pemeliharaan = date('d-m-Y', strtotime($tgl_awal_pemeliharaan));
                $tanggal_akhir_heading_pemeliharaan = date('d-m-Y', strtotime($tgl_akhir_pemeliharaan));
                ?>
                <h4> Daftar Pemeliharaan Tanggal <?= $tanggal_awal_heading_pemeliharaan; ?> s/d <?= $tanggal_akhir_heading_pemeliharaan; ?></h4>
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped table" width="100%">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Kegiatan Pemeliharaan</th>
                        <th>Luas</th>
                        <th>Jumlah Tenaga Kerja</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($pemeliharaan as $isi) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= date('d M Y', strtotime($isi->tanggal)) ?></td>
                          <td><?= $isi->lokasi ?></td>
                          <td><?= $isi->nama_pemeliharaan ?></td>
                          <td><?= $isi->luas ?></td>
                          <td><?= $isi->jumlah_tenaga_kerja ?></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              <?php endif ?>
            </div>
            <div id="tabel_pencurian">
              <?php if (isset($_POST['pencurian'])) : ?>
                <div class="my-3">
                  <?php if ($this->session->userdata('level') == 'Ops sawit') { ?>
                    <?php if (!empty($pencurian)) { ?>
                      <a target="_blank" href="<?= base_url('pencurian/pencurianPDF/' . $tgl_awal_pencurian . '/' . $tgl_akhir_pencurian); ?>" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Pencurian</a>
                    <?php } ?>
                  <?php } elseif ($this->session->userdata('level') == 'Unit') { ?>
                    <?php if (!empty($pencurian)) { ?>
                      <a target="_blank" href="<?= base_url('pencurian/pencurianPDFunit/' . $tgl_awal_pencurian . '/' . $tgl_akhir_pencurian); ?>" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Pencurian</a>
                    <?php } ?>
                  <?php } ?>
                </div>
                <?php
                $tanggal_awal_heading_pencurian = date('d-m-Y', strtotime($tgl_awal_pencurian));
                $tanggal_akhir_heading_pencurian = date('d-m-Y', strtotime($tgl_akhir_pencurian));
                ?>
                <h4> Daftar Pencurian Tanggal <?= $tanggal_awal_heading_pencurian; ?> s/d <?= $tanggal_akhir_heading_pencurian; ?></h4>
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped table" width="100%">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Jumlah</th>
                        <th>Objek</th>
                        <th>Estimasi Kerugian</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($pencurian as $isi) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= date('d M Y', strtotime($isi->tanggal)) ?></td>
                          <td><?= $isi->lokasi ?></td>
                          <td><?= $isi->jumlah ?></td>
                          <td><?= $isi->objek ?></td>
                          <td><?= $isi->kerugian ?></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              <?php endif ?>
            </div>
            <div id="tabel_bencana">
              <?php if (isset($_POST['bencana'])) : ?>
                <div class="my-3">
                  <?php if ($this->session->userdata('level') == 'Ops sawit') { ?>
                    <?php if (!empty($bencana)) { ?>
                      <a target="_blank" href="<?= base_url('bencana/bencanaPDF/' . $tgl_awal_bencana . '/' . $tgl_akhir_bencana); ?>" class="btn btn-info"><i class="fa fa-print"></i> Cetak Bencana</a>
                    <?php } ?>
                  <?php } elseif ($this->session->userdata('level') == 'Unit') { ?>
                    <?php if (!empty($bencana)) { ?>
                      <a target="_blank" href="<?= base_url('bencana/bencanaPDFunit/' . $tgl_awal_bencana . '/' . $tgl_akhir_bencana); ?>" class="btn btn-info"><i class="fa fa-print"></i> Cetak Bencana</a>
                    <?php } ?>
                  <?php } ?>
                </div>
                <?php
                $tanggal_awal_heading_bencana = date('d-m-Y', strtotime($tgl_awal_bencana));
                $tanggal_akhir_heading_bencana = date('d-m-Y', strtotime($tgl_akhir_bencana));
                ?>
                <h4> Daftar Bencana Tanggal <?= $tanggal_awal_heading_bencana; ?> s/d <?= $tanggal_akhir_heading_bencana; ?></h4>
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped table" width="100%">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Nama Bencana</th>
                        <th>Luas</th>
                        <th>Estimasi Kerugian</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($bencana as $isi) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= date('d M Y', strtotime($isi->tanggal)) ?></td>
                          <td><?= $isi->lokasi ?></td>
                          <td><?= $isi->nama_bencana ?></td>
                          <td><?= $isi->luas ?></td>
                          <td><?= $isi->kerugian ?></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script src="<?php echo base_url(); ?>assets_style/assets/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    <?php if (isset($_POST['panen'])) { ?>
      $("#panen").show();
      $("#pemeliharaan").hide();
      $("#jalan").hide();
      $("#pencurian").hide();
      $("#bencana").hide();
      tampil_laporan();
    <?php } elseif (isset($_POST['pemeliharaan'])) { ?>
      $("#panen").hide();
      $("#pemeliharaan").show();
      $("#jalan").hide();
      $("#pencurian").hide();
      $("#bencana").hide();
      tampil_laporan();
    <?php } elseif (isset($_POST['jalan'])) { ?>
      $("#panen").hide();
      $("#pemeliharaan").hide();
      $("#jalan").show();
      $("#pencurian").hide();
      $("#bencana").hide();
      tampil_laporan();
    <?php } elseif (isset($_POST['pencurian'])) { ?>
      $("#panen").hide();
      $("#pemeliharaan").hide();
      $("#jalan").hide();
      $("#pencurian").show();
      $("#bencana").hide();
      tampil_laporan();
    <?php } elseif (isset($_POST['bencana'])) { ?>
      $("#panen").hide();
      $("#pemeliharaan").hide();
      $("#jalan").hide();
      $("#pencurian").hide();
      $("#bencana").show();
      tampil_laporan();
    <?php } else { ?>
      $("#panen").show();
      $("#pemeliharaan").hide();
      $("#jalan").hide();
      $("#pencurian").hide();
      $("#bencana").hide();
      tampil_laporan();
    <?php } ?>

  });

  function tampil_laporan() {
    $("#nm_laporan").change(function() {
      var a = $("#nm_laporan").val();

      if (a == "1") {
        $("#panen").show();
        $("#pemeliharaan").hide();
        $("#jalan").hide();
        $("#pencurian").hide();
        $("#bencana").hide();
        $("#tabel_pemeliharaan").hide();
        $("#tabel_jalan").hide();
        $("#tabel_pencurian").hide();
        $("#tabel_bencana").hide();
      }
      if (a == "2") {
        $("#panen").hide();
        $("#pemeliharaan").show();
        $("#jalan").hide();
        $("#pencurian").hide();
        $("#bencana").hide();
        $("#tabel_panen").hide();
        $("#tabel_jalan").hide();
        $("#tabel_pencurian").hide();
        $("#tabel_bencana").hide();
      }
      if (a == "3") {
        $("#panen").hide();
        $("#pemeliharaan").hide();
        $("#jalan").show();
        $("#pencurian").hide();
        $("#bencana").hide();
        $("#tabel_panen").hide();
        $("#tabel_pemeliharaan").hide();
        $("#tabel_pencurian").hide();
        $("#tabel_bencana").hide();
      }
      if (a == "4") {
        $("#panen").hide();
        $("#pemeliharaan").hide();
        $("#jalan").hide();
        $("#pencurian").show();
        $("#bencana").hide();
        $("#tabel_panen").hide();
        $("#tabel_jalan").hide();
        $("#tabel_pemeliharaan").hide();
        $("#tabel_bencana").hide();
      }
      if (a == "5") {
        $("#panen").hide();
        $("#pemeliharaan").hide();
        $("#jalan").hide();
        $("#pencurian").hide();
        $("#bencana").show();
        $("#tabel_panen").hide();
        $("#tabel_jalan").hide();
        $("#tabel_pencurian").hide();
        $("#tabel_pemeliharaan").hide();
      }
    });
  }
</script>
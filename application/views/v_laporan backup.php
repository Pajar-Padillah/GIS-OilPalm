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
                    <option value="1">Panen</option>
                    <option value="2">Pemeliharaan</option>
                    <option value="3">Jalan</option>
                    <option value="4">Pencurian</option>
                    <option value="5">Bencana Alam</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div id="panen">
                  <h5 class="mb-2"><b>Pilih Periode Tanggal Panen</b></h5>
                  <?php if ($this->session->userdata('level') == 'Ops sawit') { ?>
                    <form method="get" action="<?php echo base_url('panen/panenpdf') ?>">
                    <?php } elseif ($this->session->userdata('level') == 'Unit') { ?>
                      <form method="get" action="<?php echo base_url('panen/panenpdfunit') ?>">
                      <?php } ?>
                      <div class="row mb-3">
                        <div class="col-sm-5">
                          <p class="mx-3">Dari tanggal</p>
                          <input type="date" name="tgl_awal" class="form-control tgl_awal" value="<?= date('Y-m-01') ?>">
                        </div>
                        <div class="col-sm-5">
                          <p class="mx-3">Sampai tanggal</p>
                          <input type="date" name="tgl_akhir" class="form-control tgl_akhir" value="<?= date('Y-m-t') ?>">
                        </div>
                      </div>
                      <br>
                      <button style="color: white;" formtarget="_blank" type="submit" name="panen" value="true" class="btn btn-primary"><i class="fa fa-file"></i> Cetak Panen</button>
                      </form>
                </div>
                <div id="pemeliharaan">
                  <h5 class="mb-2"><b>Pilih Periode Tanggal Pemeliharaan</b></h5>
                  <?php if ($this->session->userdata('level') == 'Ops sawit') { ?>
                    <form method="get" action="<?php echo base_url('pemeliharaan/pemeliharaanpdf') ?>">
                    <?php } elseif ($this->session->userdata('level') == 'Unit') { ?>
                      <form method="get" action="<?php echo base_url('pemeliharaan/pemeliharaanpdfunit') ?>">
                      <?php } ?>
                      <div class="row mb-3">
                        <div class="col-sm-5">
                          <p class="mx-3">Dari tanggal</p>
                          <input type="date" name="tgl_awal" class="form-control tgl_awal" value="<?= date('Y-m-01') ?>">
                        </div>
                        <div class="col-sm-5">
                          <p class="mx-3">Sampai tanggal</p>
                          <input type="date" name="tgl_akhir" class="form-control tgl_akhir" value="<?= date('Y-m-t') ?>">
                        </div>
                      </div>
                      <br>
                      <button style="color: white;" formtarget="_blank" type="submit" name="pemeliharaan" value="true" class="btn btn-success"><i class="fa fa-file"></i> Cetak Pemeliharaan</button>
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
                  <?php if ($this->session->userdata('level') == 'Ops sawit') { ?>
                    <form method="get" action="<?php echo base_url('pencurian/pencurianpdf') ?>">
                    <?php } elseif ($this->session->userdata('level') == 'Unit') { ?>
                      <form method="get" action="<?php echo base_url('pencurian/pencurianpdfunit') ?>">
                      <?php } ?>
                      <div class="row mb-3">
                        <div class="col-sm-5">
                          <p class="mx-3">Dari tanggal</p>
                          <input type="date" name="tgl_awal" class="form-control tgl_awal" value="<?= date('Y-m-01') ?>">
                        </div>
                        <div class="col-sm-5">
                          <p class="mx-3">Sampai tanggal</p>
                          <input type="date" name="tgl_akhir" class="form-control tgl_akhir" value="<?= date('Y-m-t') ?>">
                        </div>
                      </div>
                      <br>
                      <button style="color: white;" formtarget="_blank" type="submit" name="pencurian" value="true" class="btn btn-danger"><i class="fa fa-file"></i> Cetak Pencurian</button>
                      </form>
                </div>
                <div id="bencana">
                  <h5 class="mb-2"><b>Pilih Periode Tanggal Bencana</b></h5>
                  <?php if ($this->session->userdata('level') == 'Ops sawit') { ?>
                    <form method="get" action="<?php echo base_url('bencana/bencanapdf') ?>">
                    <?php } elseif ($this->session->userdata('level') == 'Unit') { ?>
                      <form method="get" action="<?php echo base_url('bencana/bencanapdfunit') ?>">
                      <?php } ?>
                      <div class="row mb-3">
                        <div class="col-sm-5">
                          <p class="mx-2">Dari tanggal</p>
                          <input type="date" name="tgl_awal" class="form-control tgl_awal" value="<?= date('Y-m-01') ?>">
                        </div>
                        <div class="col-sm-5">
                          <p class="mx-2">Sampai tanggal</p>
                          <input type="date" name="tgl_akhir" class="form-control tgl_akhir" value="<?= date('Y-m-t') ?>">
                        </div>
                      </div>
                      <br>
                      <button style="color: white;" formtarget="_blank" type="submit" name="bencana" value="true" class="btn btn-info"><i class="fa fa-file"></i> Cetak Bencana</button>
                      </form>
                </div>
              </div>
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
    $("#panen").show();
    $("#pemeliharaan").hide();
    $("#jalan").hide();
    $("#pencurian").hide();
    $("#bencana").hide();
    tampil_laporan();
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
      }
      if (a == "2") {
        $("#panen").hide();
        $("#pemeliharaan").show();
        $("#jalan").hide();
        $("#pencurian").hide();
        $("#bencana").hide();
      }
      if (a == "3") {
        $("#panen").hide();
        $("#pemeliharaan").hide();
        $("#jalan").show();
        $("#pencurian").hide();
        $("#bencana").hide();
      }
      if (a == "4") {
        $("#panen").hide();
        $("#pemeliharaan").hide();
        $("#jalan").hide();
        $("#pencurian").show();
        $("#bencana").hide();
      }
      if (a == "5") {
        $("#panen").hide();
        $("#pemeliharaan").hide();
        $("#jalan").hide();
        $("#pencurian").hide();
        $("#bencana").show();
      }
    });
  }
</script>
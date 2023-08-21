<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title_web; ?></title>
    <link href="<?= base_url('assets_style/image/logo-ptpn7.png') ?>" rel="icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets_style/login/style.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <?php if ($this->session->flashdata('success_logout')) { ?>
        <script>
            Swal.fire({
                title: 'Success!',
                text: 'Anda Berhasil Logout!',
                icon: 'success',
                timer: 1500
            });
        </script>
    <?php } ?>
    <main>
        <div class="box">
            <div class="inner-box">
                <div class="forms-wrap">
                    <form action="<?= base_url('login/auth'); ?>" method="POST">
                        <div class="logo">
                            <img src="<?= base_url() ?>assets_style/login/img/logo-ptpn7.png" alt="easyclass" />
                            <h3>SIG PTPN VII</h3>
                        </div>

                        <div class="heading">
                            <h2>Login Sistem</h2>
                        </div>
                        <?= $this->session->flashdata('pesan'); ?>
                        <div class="actual-form">
                            <div class="input-wrap">
                                <input type="text" minlength="3" autofocus class="input-field" placeholder="Username" id="user" name="user" required="required" autocomplete="off" />
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>

                            <div class="input-wrap">
                                <input type="password" minlength="3" class="input-field" placeholder="Password" id="pass" name="pass" required="required" autocomplete="off" />
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <input type="submit" id="login" value="LOGIN" class="sign-btn" />
                        </div>
                    </form>
                </div>

                <div class="carousel">
                    <div class="images-wrapper">
                        <img src="<?= base_url() ?>assets_style/login/img/img1.png" class="image img-1 show" alt="" />
                        <img src="<?= base_url() ?>assets_style/login/img/img2.png" class="image img-2" alt="" />
                    </div>

                    <div class="text-slider">
                        <div class="text-wrap">
                            <div class="text-group">
                                <h2>PT. Perkebunan Nusantara VII</h2>
                                <h2>SIG - Kelapa Sawit</h2>
                            </div>
                        </div>

                        <div class="bullets">
                            <span class="active" data-value="1"></span>
                            <span data-value="2"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Javascript file -->

    <script src="<?= base_url() ?>assets_style/login/app.js"></script>
    <!-- jQuery 3 -->
    <script src="<?php echo base_url('assets_style/assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url('assets_style/assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('assets_style/assets/plugins/iCheck/icheck.min.js'); ?>"></script>
</body>

</html>
<body>
    <div class="wrapper">
        <!-- Top Bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-12">
                        <div class="logo">
                            <a href="index.php">
                                <!-- <h1>PTPN VII</h1> -->
                                <img src="<?= base_url() ?>assets_style/front/img/logo-ptpn7.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-7 d-none d-lg-block">
                        <div class="row">
                            <div class="col-3">
                                <div class="top-bar-item">
                                    <div class="top-bar-text">
                                        <?php
                                        if (function_exists('date_default_timezone_set'))
                                            date_default_timezone_set('Asia/Jakarta');
                                        ?>
                                        <p class="mt-4" id="clock">&nbsp;</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="flaticon-calendar"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Alamat</h3>
                                        <p>Jl. Teuku Umar No.300, Kedaton, Bandar Lampung</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="flaticon-call"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Telepon</h3>
                                        <p>+012 345 6789</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="flaticon-send-mail"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Email</h3>
                                        <p>ops1ptpn7@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->
        <script type="text/javascript">
            var d = new Date();
            var hours = d.getHours();
            var minutes = d.getMinutes();
            var seconds = d.getSeconds();
            var hari = d.getDay();
            var namaHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            hariIni = namaHari[hari];
            var tanggal = ("0" + d.getDate()).slice(-2);
            var month = new Array();
            month[0] = "Januari";
            month[1] = "Februari";
            month[2] = "Maret";
            month[3] = "April";
            month[4] = "Mei";
            month[5] = "Juni";
            month[6] = "Juli";
            month[7] = "Agustus";
            month[8] = "September";
            month[9] = "Oktober";
            month[10] = "Nopember";
            month[11] = "Desember";
            var bulan = month[d.getMonth()];
            var tahun = d.getFullYear();
            var date = Date.now(),
                second = 1000;

            function pad(num) {
                return ('0' + num).slice(-2);
            }

            function updateClock() {
                var clockEl = document.getElementById('clock'),
                    dateObj;
                date += second;
                dateObj = new Date(date);
                clockEl.innerHTML = '' + hariIni + '.  ' + tanggal + ' ' + bulan + ' ' + tahun + '. ' + pad(dateObj.getHours()) + ':' + pad(dateObj.getMinutes()) + ':' + pad(dateObj.getSeconds());
            }
            setInterval(updateClock, second);
        </script>
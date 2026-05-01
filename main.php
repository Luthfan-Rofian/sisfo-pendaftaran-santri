<?php include 'config/koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
  <!-- Google Font: Source Sans Pro -->
  <link rel="icon" type="image/png" sizes="16x16" href="assets/dist/img/icon.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
<body>
    <div class="container py-5">
        <?php
        $query="SELECT * FROM tb_maintenance";
        $sql=mysqli_query($conn, $query);
        $row=mysqli_fetch_object($sql);
        ?>
        <div class="py-5">
        <header class="text-center">
            <h3 class="text-danger"><?= strip_tags($row->ps_main); ?></h3>
            <i class="fas fa-cogs fa-4x text-danger"></i>
        </header>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card card-outline card-success text-center mb-4 mt-4">
                        <div class="card-body bg bg-teal">
                            <h4>AKAN DIBUKA KEMBALI DALAM</h4>
                            <div id="waktu" style="font-size: 30px; font-weight: bold;" class="countdown py-4 text-danger btn btn-outline-light"></div>
                            
                        </div>
                        <div class="card-footer bg-success"><a href="#" onclick="history.back(self);"><-- Kembali</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<script type="text/javascript" src="assets/plugins/countdown/jquery.countdown.min.js"></script>
<script>
    var countDownDate = new Date("<?= strip_tags($row->ak_main); ?>").getTime();
    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("waktu").innerHTML = days + " <small>Hari</small> " + hours + " <small>Jam</small> "
        + minutes + " <small>Menit</small> " + seconds + " <small>Detik</small> ";
        
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("waktu").innerHTML = "MAAF PENDAFTARAN AKAN DIBUKA BEBERAPA SAAT LAGI";
        }
    }, 1000);
</script>
</body>
</html>
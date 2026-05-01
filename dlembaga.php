<?php
session_start();
error_reporting(0);
include 'config/koneksi.php';
include 'frupiah.php';

 $ppdb = mysqli_query($conn, "SELECT * FROM tb_ppdb");
 $pdb = mysqli_fetch_object($ppdb);

// Perbaikan Keamanan: Sanitasi GET parameter
 $lembaga = isset($_GET['lembaga']) ? mysqli_real_escape_string($conn, $_GET['lembaga']) : '';

if(empty($lembaga)) {
    echo "<script>alert('Lembaga tidak dipilih!'); window.location.href='index';</script>";
    exit;
}

 $Lembaga = mysqli_query($conn, "SELECT * FROM tb_lembaga WHERE nm_lembaga='$lembaga'");
 $lbg = mysqli_fetch_object($Lembaga);

if(!$lbg) {
    echo "<script>alert('Data lembaga tidak ditemukan!'); window.location.href='index';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pendaftaran - <?= htmlspecialchars(strip_tags($lbg->nm_lembaga)); ?></title>
  <link rel="icon" type="image/png" sizes="16x16" href="assets/dist/img/icon.png">

  <!-- Google Font: Poppins untuk kesan Modern -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- AdminLTE Style (Wajib tetap ada) -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  
  <style>
    body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
    
    /* 1. Hero Section - Gradient Modern */
    .hero-lembaga { 
      background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
      color: white; 
      padding: 60px 20px 100px 20px; 
      text-align: center;
      border-radius: 0 0 40px 40px;
    }
    .hero-lembaga img.logo-lembaga { 
      width: 120px; height: 120px; 
      object-fit: cover; border-radius: 50%; 
      border: 5px solid rgba(255,255,255,0.3);
      padding: 5px; background: white;
      margin-bottom: 20px;
      box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
    .hero-lembaga h1 { font-weight: 700; font-size: 2.5rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.3); }
    .hero-lembaga .badge-gelombang { font-size: 1rem; padding: 10px 20px; border-radius: 30px; background: rgba(255,255,255,0.2); border: 1px solid rgba(255,255,255,0.4); }

    /* 2. Card Info - Overlapping Hero */
    .info-card {
      background: white; border-radius: 20px; 
      box-shadow: 0 15px 30px rgba(0,0,0,0.08);
      margin-top: -60px; position: relative; z-index: 10;
      border: none; padding: 30px;
    }
    .info-item { margin-bottom: 15px; }
    .info-label { font-size: 0.85rem; color: #888; font-weight: 500; }
    .info-value { font-size: 1.1rem; color: #333; font-weight: 600; }
    .biaya-highlight { color: #27ae60; font-size: 1.3rem; }

    /* 3. Dokumen Grid - Modern Cards */
    .doc-card {
      background: white; border-radius: 15px; border: none;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      overflow: hidden;
    }
    .doc-card:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(0,0,0,0.1); }
    .doc-card .card-header { background: transparent; border-bottom: 1px solid #eee; font-weight: 700; color: #1e3c72; }
    .doc-card img { width: 100%; height: 250px; object-fit: cover; }
    .doc-card .card-body { padding: 20px; text-align: center; }

    /* 4. Tombol Aksi CTA */
    .btn-daftar-cta {
      background: #27ae60; color: white; padding: 15px 50px; 
      font-size: 1.2rem; font-weight: 700; border-radius: 50px; 
      border: none; box-shadow: 0 10px 20px rgba(39, 174, 96, 0.3);
      transition: all 0.3s;
    }
    .btn-daftar-cta:hover { background: #2ecc71; transform: scale(1.05); color: white; box-shadow: 0 15px 25px rgba(39, 174, 96, 0.4); }

    /* Navbar Override */
    .main-header { background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
  </style>
</head>
<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-white navbar-light">
    <div class="container">
      <a href="index" class="logo"><h2 class="text-primary font-weight-bold"><?= htmlspecialchars(strip_tags($pdb->sk_pdf)); ?></h2></a>
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <?php
          $tomboladmin = mysqli_query($conn, "SELECT * FROM tb_tbladm");
          $ta = mysqli_fetch_object($tomboladmin);
          $buka = isset($ta->st) ? strip_tags($ta->st) : '';
          if ($buka == 'buka') {
        ?>
        <li class="nav-item">
          <a class="nav-link" href="login"><span class="btn btn-primary btn-sm rounded-pill shadow-sm px-4"><i class="fas fa-sign-in-alt mr-1"></i> Login</span></a>
        </li>
        <?php } ?>
      </ul>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero-lembaga">
    <div class="container">
      <img src="assets/images/lembaga/<?= htmlspecialchars($lbg->lg_lembaga); ?>" class="logo-lembaga" alt="Logo">
      <h1><?= htmlspecialchars(strip_tags($lbg->nm_lembaga)); ?></h1>
      <p class="h5 text-white-50 mt-2"><?= htmlspecialchars(strip_tags($lbg->tk_lembaga)); ?></p>
      <br>
      <?php
      $gel=$lbg->gl_lembaga;
      if ($gel==1) echo '<span class="badge-gelombang badge-warning text-dark">Gelombang 1</span>';
      elseif ($gel==2) echo '<span class="badge-gelombang badge-purple">Gelombang 2</span>';
      elseif ($gel==3) echo '<span class="badge-gelombang badge-indigo">Gelombang 3</span>';
      elseif ($gel>=4) echo '<span class="badge-gelombang badge-dark">Gelombang '.$gel.'</span>';
      ?>
    </div>
  </section>

  <!-- Content Wrapper -->
  <div class="content-wrapper" style="background: transparent;">
    <div class="container">

      <!-- Info Card -->
      <div class="row justify-content-center mb-5">
        <div class="col-lg-9">
          <div class="card info-card">
            <div class="row justify-content-center">
              <div class="col-md-8 text-center">
                <div class="info-item">
                  <div class="info-label">Unit Lembaga</div>
                  <div class="info-value"><?= htmlspecialchars(strip_tags($lbg->nm_lembaga)); ?> (<?= htmlspecialchars(strip_tags($lbg->sk_lembaga)); ?>)</div>
                </div>
                
                <div class="info-item mt-4 p-3 bg-light rounded-lg">
                  <div class="info-label">Uang Pendaftaran</div>
                  <div class="biaya-highlight"><?= rupiah($lbg->ug_lembaga); ?></div>
                  <small class="text-muted">(<?= terbilang($lbg->ug_lembaga); ?> rupiah)</small>
                </div>

                <div class="row mt-4">
                  <div class="col-6">
                    <div class="info-label">Kontak Person 1</div>
                    <div class="info-value small"><?= htmlspecialchars(strip_tags($lbg->n1_lembaga)); ?><br><span class="text-primary"><?= htmlspecialchars(strip_tags($lbg->k1_lembaga)); ?></span></div>
                  </div>
                  <div class="col-6">
                    <div class="info-label">Kontak Person 2</div>
                    <div class="info-value small"><?= htmlspecialchars(strip_tags($lbg->n2_lembaga)); ?><br><span class="text-primary"><?= htmlspecialchars(strip_tags($lbg->k2_lembaga)); ?></span></div>
                  </div>
                </div>

                <?php if(!empty($lbg->tt_lembaga)): ?>
                <div class="mt-4 p-3 border-left-primary bg-light-light">
                  <small class="text-muted"><i class="fas fa-info-circle mr-1"></i> <?= htmlspecialchars(strip_tags($lbg->tt_lembaga)); ?></small>
                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Dokumen Grid -->
      <div class="row justify-content-center mb-5">
        
        <!-- Brosur -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card doc-card">
            <div class="card-header text-center border-0 pt-4">
              <i class="fas fa-book-open mr-2 text-primary"></i> BROSUR
            </div>
            <img src="assets/images/lembaga/<?= htmlspecialchars($lbg->br_lembaga); ?>" alt="Brosur">
            <div class="card-body">
              <button type="button" data-toggle="modal" data-target="#md_lembaga-br" id="td_lembaga-br" 
                data-idbr="<?= $lbg->id_lembaga; ?>" data-nmbr="<?= htmlspecialchars($lbg->nm_lembaga); ?>" data-brbr="<?= htmlspecialchars($lbg->br_lembaga); ?>" 
                class="btn btn-warning btn-sm shadow-sm rounded-pill"><i class="fas fa-search-plus mr-1"></i> Perbesar</button>
              <a href="assets/images/lembaga/<?= htmlspecialchars($lbg->br_lembaga); ?>" target="_blank" class="btn btn-outline-primary btn-sm shadow-sm rounded-pill"><i class="fas fa-download mr-1"></i> Download</a>
            </div>
          </div>
        </div>

        <!-- Rincian Biaya -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card doc-card">
            <div class="card-header text-center border-0 pt-4">
              <i class="fas fa-money-bill-wave mr-2 text-success"></i> RINCIAN BIAYA
            </div>
            <img src="assets/images/lembaga/<?= htmlspecialchars($lbg->by_lembaga); ?>" alt="Biaya">
            <div class="card-body">
              <button type="button" data-toggle="modal" data-target="#md_lembaga-by" id="td_lembaga-by" 
                data-idby="<?= $lbg->id_lembaga; ?>" data-nmby="<?= htmlspecialchars($lbg->nm_lembaga); ?>" data-byby="<?= htmlspecialchars($lbg->by_lembaga); ?>"  
                class="btn btn-warning btn-sm shadow-sm rounded-pill"><i class="fas fa-search-plus mr-1"></i> Perbesar</button>
              <a href="assets/images/lembaga/<?= htmlspecialchars($lbg->by_lembaga); ?>" target="_blank" class="btn btn-outline-primary btn-sm shadow-sm rounded-pill"><i class="fas fa-download mr-1"></i> Download</a>
            </div>
          </div>
        </div>

        <!-- Pakta Integritas -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card doc-card">
            <div class="card-header text-center border-0 pt-4">
              <i class="fas fa-file-signature mr-2 text-danger"></i> PAKTA INTEGRITAS
            </div>
            <img src="assets/images/lembaga/<?= htmlspecialchars($lbg->spj_lembaga); ?>" alt="Pakta Integritas">
            <div class="card-body">
              <button type="button" data-toggle="modal" data-target="#md_lembaga-spj" id="td_lembaga-spj" 
                data-idspj="<?= $lbg->id_lembaga; ?>" data-nmspj="<?= htmlspecialchars($lbg->nm_lembaga); ?>" data-spj="<?= htmlspecialchars($lbg->spj_lembaga); ?>"  
                class="btn btn-warning btn-sm shadow-sm rounded-pill"><i class="fas fa-search-plus mr-1"></i> Perbesar</button>
              <a href="assets/images/lembaga/<?= htmlspecialchars($lbg->spp_lembaga); ?>" target="_blank" class="btn btn-outline-primary btn-sm shadow-sm rounded-pill"><i class="fas fa-download mr-1"></i> Download</a>
            </div>
          </div>
        </div>

      </div>

      <!-- Tombol Aksi CTA -->
      <div class="row justify-content-center mb-5">
        <div class="col-lg-12 text-center">
          <h4 class="mb-3 font-weight-bold">Siap bergabung dengan kami?</h4>
          <a href="portal?lembaga=<?= urlencode(strip_tags($lbg->nm_lembaga)); ?>" class="btn btn-daftar-cta shadow-lg">
            <i class="fas fa-paper-plane mr-2"></i> DAFTAR SEKARANG
          </a>
          <br><br>
          <a href="#" onclick="history.back();" class="text-muted"><i class="fas fa-arrow-left mr-1"></i> Kembali ke Halaman Utama</a>
        </div>
      </div>

    </div>
  </div>

  <!-- Main Footer -->
  <footer class="main-footer text-sm" style="background: white; border-top: 1px solid #eee;">
    <div class="float-right d-none d-sm-block">
        <b>PSB Darul Ulum Tlasih</b> | <span class="badge badge-danger">Version 3.0</span>
    </div>
    <strong>Copyright &copy; <?php echo date('Y'); ?> <span class="text-danger">DigitalNode ID</span>.</strong> All rights reserved.
  </footer>
</div>

<!-- Scripts Wajib -->
<?php include 'md_berkas.php'; ?>
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/dist/js/adminlte.min.js"></script>
<script src="assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<script>
    $(document).on("click", "#td_lembaga-br", function(){
      let idbr = $(this).data('idbr');
      let nmbr = $(this).data('nmbr');
      let brbr = $(this).data('brbr');
      $("#md_lembaga-br #id_lembaga").text(idbr);
      $("#md_lembaga-br #nm_lembaga").text(nmbr);
      $("#md_lembaga-br #br_lembaga").attr("src", "assets/images/lembaga/"+brbr);
    })

    $(document).on("click", "#td_lembaga-by", function(){
      let idby = $(this).data('idby');
      let nmby = $(this).data('nmby');
      let byby = $(this).data('byby');
      $("#md_lembaga-by #id_lembaga").text(idby);
      $("#md_lembaga-by #nm_lembaga").text(nmby);
      $("#md_lembaga-by #by_lembaga").attr("src", "assets/images/lembaga/"+byby);
    })

    $(document).on("click", "#td_lembaga-spj", function(){
      let idspj = $(this).data('idspj');
      let nmspj = $(this).data('nmspj');
      let spj = $(this).data('spj');
      $("#md_lembaga-spj #id_lembaga").text(idspj);
      $("#md_lembaga-spj #nm_lembaga").text(nmspj);
      $("#md_lembaga-spj #spj_lembaga").attr("src", "assets/images/lembaga/"+spj);
    })
</script>
</body>
</html>
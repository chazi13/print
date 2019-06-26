<?php include_once "sistem/content.php" ?>
<!DOCTYPE html>
<html>
<head>
  <!-- BASICS -->
  <meta charset="utf-8">
  <title>JasaCetak</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/flexslider.css" type="text/css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700">

  <link rel="stylesheet" href="assets/css/style.css">
  <!-- skin -->
  <link rel="stylesheet" href="assets/css/skins/default.css">

</head>

<body>
  <section id="header" class="appear"></section>
  <div class="navbar navbar-fixed-top" role="navigation" data-0="line-height:100px; height:100px; background-color:rgba(0,0,0,0.5);" data-300="line-height:60px; height:60px; background-color:rgba(5, 42, 62, 1);">
    <div class="container" style="overflow: unset">
      <div class="navbar-header d-flex">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      	  <span class="fa fa-bars color-white"></span>
        </button>
        <div class="navbar-logo col-sm-3">
          <a href="index.php"><img data-0="width:155px;" data-300=" width:120px;" src="assets/img/logo-jasa-cetak-color.png" alt="" width="100%"></a>
        </div>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav" data-0="margin-top:20px;" data-300="margin-top:5px;">
          <li class="<?= @$home_active ?>"><a href="index.php">Beranda</a></li>
          <li class="<?= @$testi_active ?>"><a href="index.php?page=testi">Testimoni</a></li>
          <li class="<?= @$produk_active ?>"><a href="index.php?page=produk">Produk</a></li>
          <li class="<?= @$tentang_active ?>"><a href="index.php?page=tentang">Tentang</a></li>
          <li class="<?= @$kontak_active ?>"><a href="index.php?page=kontak">Kontak</a></li>
          <?php if (@$_SESSION['login'] && $_SESSION['level'] == 'user'): ?>
            <li class="<?= @$profil_active ?>">
              <a href="javascript:void(0)" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Profil &nbsp; <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="index.php?page=profil"><?= $_SESSION['nama'] ?></a></li>
                <li><a href="index.php?page=riwayat">Riwayat Pesanan</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="sistem/logout.php">Logout</a></li>
              </ul>
            </li>
            <li class="<?= @$keranjang_active ?>"><a href="index.php?page=keranjang">Keranjang (<?= $_SESSION['jml_keranjang'] ?>)</a></li>
          <?php elseif (!@$_SESSION['login']): ?>
            <li class="<?= @$login_active ?>"><a href="login.php">Login</a></li>
          <?php endif; ?>
        </ul>
      </div>
      <!--/.navbar-collapse -->
    </div>
  </div>

  <div class="main-content">
    <?php include $page ?>
  </div>

  <section id="footer" class="section footer">
    <div class="container">
      <div class="row">
          <div class="col-md-5 col-sm-12">
              <h4 class="footer-title">Alamat</h4>
              <div class="footer-content">
                  <address>
                    <?= $info['alamat'] ?>
                  </address>
              </div>
          </div>
          <div class="col-md-3 col-sm-12">
              <h4 class="footer-title">Menu</h4>
              <div class="footer-content">
                  <ul class="footer-menu">
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="index.php?page=testi">Testimoni</a></li>
                    <li><a href="index.php?page=produk">Produk</a></li>
                    <li><a href="index.php?page=tentang">Tentang</a></li>
                    <li><a href="index.php?page=kontak">Kontak</a></li>
                  </ul>
              </div>
          </div>
          <div class="col-md-4 col-sm-12">
              <h4 class="footer-title">Ikuti</h4>
              <div class="footer-content">
                <div class="row">
                  <div class="col-sm-12">
                    <a href="<?= $info['facebook'] ?>" target="_blank" rel="noopener noreferrer"><img src="assets/img/sosmed/facebook.png" alt="" width="15%"></a> &nbsp;&nbsp;&nbsp;
                    <a href="<?= $info['twitter'] ?>" target="_blank" rel="noopener noreferrer"><img src="assets/img/sosmed/twitter.png" alt="" width="15%"></a> &nbsp;&nbsp;&nbsp;
                    <a href="<?= $info['instagram'] ?>" target="_blank" rel="noopener noreferrer"><img src="assets/img/sosmed/instagram.png" alt="" width="15%"></a> &nbsp;&nbsp;&nbsp;
                  </div>
                  <div class="col-sm-4">
                  </div>
                  <div class="col-sm-4">
                  </div>
                </div>
              </div>
          </div>
      </div>
      <p class="copyright">Copyright &copy; Reserved By. <?= date('Y') ?></p>
    </div>

  </section>
  <a href="#header" class="scrollup"><i class="fa fa-chevron-up"></i></a>

  <!-- Javascript Library Files -->
  <script src="assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jquery.easing.1.3.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/skrollr.min.js"></script>
  <script src="assets/js/jquery.localScroll.min.js"></script>
  <script src="assets/js/jquery.flexslider-min.js"></script>

  <!-- Template Main Javascript File -->
  <script src="assets/js/main.js"></script>
</body>
</html>
<?php unset($_SESSION['pesan']) ?>

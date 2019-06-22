<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
  <!-- BASICS -->
  <meta charset="utf-8">
  <title>JasaCetak | Login</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700">

  <link rel="stylesheet" href="assets/css/style.css">
  <!-- skin -->
  <link rel="stylesheet" href="assets/css/skins/default.css">

</head>
<body class="theme-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-12 col-md-offset-3">
        <div class="section-header mar-top40">
            <img src="assets/img/logo-jasa-cetak-color.png" alt="logo" style="width: 50%;">
        </div>
        <div class="panel mar-top40 pad-top10" id="login-panel">
          <form action="sistem/aksi_login.php" method="post">
            <div class="panel-header">
              <h2 class="text-center">Login</h2>
            </div>
            <div class="panel-body">
                <?php if (@$_SESSION['pesan']): ?>
                  <div class="alert alert-<?= $_SESSION['pesan']['status'] ?> alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?= $_SESSION['pesan']['isi'] ?>
                  </div>
                <?php endif; ?>

                <div class="form-group input-group-md">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email" required>
                </div>
  
                <div class="form-group input-group-md">
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password" required>
                </div>
  
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6 pull-right">
                      <button type="submit" class="btn btn-get-started pull-right">Login</button>
                    </div>
                    <div class="col-md-6">
                      <!-- Lupa password? <a href="lupa_password.php">Klik disini</a> -->
                    </div>
                  </div>
                </div>
            </div>
            <div class="panel-footer">
              <p>Belum punya akun? <a href="daftar.php" class="btn btn-info">Daftar Sekarang!</a></p>
            </div>
          </form>
        </div>

        <div class="text-center" style="vertical-align: middle; margin-top:-10px">
            <a href="index.php" style="position:relative;">
              <i class="fa fa-arrow-circle-o-left fa-2x" style="position:relative; top: 5px;"></i> 
              <span>Kembali ke halaman utama</span>
            </a>
        </div>
      </div>
    </div>
  </div>
  
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
<?php unset($_SESSION['pesan']) ?>
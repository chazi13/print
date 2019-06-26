<?php
if($_SESSION['login'] && $_SESSION['level'] == 'user') {
    $check_testi = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(id_transaksi) AS jml_transaksi FROM transaksi WHERE id_user = '$_SESSION[id]' AND status = '4'"));
    // echo "SELECT COUNT(id_transaksi) AS jml_transaksi FROM transaksi WHERE id_user = '$_SESSION[id]' AND status = '4'";
}
$query_testi = mysqli_query($koneksi, "SELECT testimoni.pesan, user.nama, user.foto FROM testimoni JOIN user ON testimoni.id_user = user.id_user");
?>

<div class="navbar-background"></div>

<section class="section" id="testimoni">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-12 col-md-offset-1">
                <div class="section-header mar-bot30">
                    <h2 class="section-heading text-center">Testimoni</h2>
                </div>

                <?php if($_SESSION['login'] && $_SESSION['level'] == 'user' && $check_testi['jml_transaksi'] > 0): ?>
                    <div class="panel">
                        <form action="sistem/tambah_testi.php" method="post">
                            <div class="panel-body">
                                <label for="pesan">Berikan Testimoni</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <textarea name="pesan" id="pesan" class="form-control testi-form" placeholder="Masukan Testimoni"></textarea>
                                        <span class="input-group-btn send-testi">
                                            <button class="btn btn-primary btn-block"><i class="fa fa-send"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>

                <div class="panel">
                    <div class="panel-body">
                        <div class="testi-section list-group kat-list">
                            <?php while ($testi = mysqli_fetch_assoc($query_testi)): ?>
                                <div class="testi-item list-group-item">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-4 text-center">
                                            <img alt="" src="assets/img/foto/<?= $testi['foto'] ?>" class="img-circle testi-autor-foto"> <br><br>
                                            
                                        </div>
                                        <div class="col-md-9 col-sm-8">
                                            <blockquote>
                                                <i class="fa fa-quote-left"></i>
                                                <p><?= $testi['pesan'] ?></p>
                                                
                                                <h4 class="testi-autor">- <?= $testi['nama'] ?></h4>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

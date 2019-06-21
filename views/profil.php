<?php
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$_SESSION[id]'");
    $profil = mysqli_fetch_assoc($query);
?>

<div class="navbar-background"></div>

<section class="section" id="profil">
    <div class="container">
        <?php if (@$_SESSION['pesan']): ?>
            <div class="alert alert-<?= $_SESSION['pesan']['status'] ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?= $_SESSION['pesan']['isi'] ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="assets/img/foto/<?= $profil['foto'] ?>" alt="" class="img-circle text-center" style="width: 75%">
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="panel">
                            <div class="panel-header pad-top20">
                                <div class="section-header mar-left20">
                                    <h3 class="section-heading text-left">Data Profil</h3>
                                </div>
                            </div>
                            <div class="panel-body">
                                <dl>
                                    <dt>Nama :</dt>
                                    <dd><?= $profil['nama'] ?></dd> <br>
                                    <dt>Email :</dt>
                                    <dd><?= $profil['email'] ?></dd> <br>
                                    <dt>Telp :</dt>
                                    <dd><?= $profil['telp'] ?></dd> <br>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="panel">
                            <div class="panel-header pad-top20">
                                <div class="section-header mar-left20">
                                    <h3 class="section-heading text-left">Pengiriman Pesanan</h3>
                                </div>
                            </div>
                            <div class="panel-body">
                                <dl>
                                    <dt>Alamat :</dt>
                                    <dd>
                                        <?= $profil['alamat'] ?>
                                        <br>
                                        Kec. <?= $profil['kecamatan'] ?>, <?= $profil['kota'] ?>,  <?= $profil['provinsi'] ?>
                                    </dd> <br>
                                    <dt>Keterangan :</dt>
                                    <dd><?= $profil['keterangan'] ?></dd> <br>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 mar-bot10">
                        <a href="index.php?page=edit_profil" class="btn btn-danger pad-top10 pad-bot10">
                            <i class="fa fa-user"></i> &nbsp;
                            Edit Profil
                        </a>
                        <a href="index.php?page=edit_password" class="btn btn-primary pad-top10 pad-bot10">
                            <i class="fa fa-lock"></i> &nbsp;
                            Edit Password
                        </a>
                    </div>
                    <div class="col-sm-12 mar-bot10">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

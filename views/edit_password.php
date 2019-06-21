<div class="navbar-background"></div>

<section class="section" id="edit-profil">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="section-header">
                    <h2 class="section-heading text-center">Ganti Password</h2>
                </div>
            </div>
            
            <div class="col-md-8 col-sm-12 col-md-offset-2 mar-top10">
                <?php if (@$_SESSION['pesan']): ?>
                    <div class="alert alert-<?= $_SESSION['pesan']['status'] ?> alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?= $_SESSION['pesan']['isi'] ?>
                    </div>
                <?php endif; ?>

                <div class="panel pad-top10">
                    <div class="panel-body">
                        <form action="sistem/edit_password.php" method="post">
                            <div class="form-group row">
                                <label for="password_lama" class="col-sm-4">Password Lama :</label>
                                <div class="col-sm-8"><input type="password" name="password_lama" id="password_lama" class="form-control"></div>
                            </div>
                            <div class="form-group row">
                                <label for="password_baru" class="col-sm-4">Password Baru :</label>
                                <div class="col-sm-8"><input type="password" name="password_baru" min="6" id="password_baru" class="form-control"></div>
                            </div>
                            <div class="form-group row">
                                <label for="konfirm_password" class="col-sm-4">Konfirmasi Password :</label>
                                <div class="col-sm-8"><input type="password" name="konfirm_password" min="6" id="konfirm_password" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-block bg-indigo" style="color: white">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
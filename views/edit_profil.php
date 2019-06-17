<?php
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$_SESSION[id]'");
    $profil = mysqli_fetch_assoc($query);
?>

<div class="navbar-background"></div>

<section class="section" id="edit-profil">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="assets/img/foto/<?= $profil['foto'] ?>" alt="" class="img-circle text-center" style="width: 75%">
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="panel">
                    <div class="panel-header pad-top20">
                        <div class="section-header mar-left20">
                            <h3 class="section-heading text-left">Edit Profil</h3>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="sistem/edit_profil.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap :</label>
                                <input type="text" name="nama" value="<?= $profil['nama'] ?>" id="nama" class="form-control" placeholder="Masukan Nama Lengkap Anda" required>
                                <input type="hidden" name="id_user" value="<?= $profil['id_user'] ?>">
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="email">Email :</label>
                                    <input type="email" name="email" value="<?= $profil['email'] ?>" id="email" class="form-control" placeholder="Masukan Email Anda" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="telp">No. Telp :</label>
                                    <input type="text" name="telp" value="<?= $profil['telp'] ?>" id="telp" class="form-control" placeholder="Masukan No. Telp Anda" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="foto">Pilih File :</label>
                                <input type="file" name="foto" id="foto" class="form-control" placeholder="Pilih File">
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="alamat">Alamat Lengkap :</label>
                                    <textarea name="alamat" id="alamat" rows="5" class="form-control" placeholder="Alamat Lengkap"><?= $profil['alamat'] ?></textarea>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="keterangan">Keterangan :</label>
                                    <textarea name="keterangan" id="keterangan" rows="5" class="form-control" placeholder="Keterangan"><?= $profil['keterangan'] ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Simpan" class="btn btn-get-started">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

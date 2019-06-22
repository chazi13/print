<?php
$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin = '$_SESSION[id]'");
$profil = mysqli_fetch_assoc($query);
?>

<div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="box box-">
            <form action="sistem/update_foto_profil_user.php" method="post" enctype="multipart/form-data">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Foto Profil</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <img src="../<?= $profil['foto'] ?>" alt="" style="width: 100%;">
                    </div>
                    <div class="form-group">
                        <input type="file" name="foto" id="foto" class="form-control">
                    </div>
                </div>
                <div class="box-footer">
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-8 col-sm-12">
        <div class="box box-">
            <form action="sistem/update_profil_user.php" method="post">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Profil</h3>
                </div>
                <div class="box-body">
                    <div class="form-group row">
                        <div class="col-md-3 col-sm-12">
                            <label for="nama">Nama Lengkap :</label>
                        </div>
                        <div class="col-md-9 col-sm-12">
                            <input type="text" name="nama" value="<?= $profil['nama'] ?>" id="nama" class="form-control" placeholder="Masukan Nama Lengkap" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 col-sm-12">
                            <label for="username">Username :</label>
                        </div>
                        <div class="col-md-9 col-sm-12">
                            <input type="text" name="username" value="<?= $profil['username'] ?>" id="username" class="form-control" placeholder="Masukan Username" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 col-sm-12">
                            <label for="password">Password :</label>
                        </div>
                        <div class="col-md-9 col-sm-12">
                            <input type="password" name="password" id="password" class="form-control" placeholder="**************">
                            <span class="text-info">* Kosongkan jika tidak ingin diubah</span>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

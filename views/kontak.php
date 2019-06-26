<div class="navbar-background"></div>
<section id="kategori" class="section">
    <div class="container">
        <div class="row mar-bot20">
            <div class="col-md-6 col-md-offset-3">
                <div class="section-header">
                    <h2 class="section-heading text-center">Kontak</h2>
                </div>
            </div>
        </div>

        <?php if (@$_SESSION['pesan']): ?>
            <div class="alert alert-<?= $_SESSION['pesan']['status'] ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?= $_SESSION['pesan']['isi'] ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h4 class="txt-bold">Temukan Kami</h4>
                <div class="list-group kat-list">
                    <div class="list-group-item" style="border-top: none;">
                        <h4>Alamat</h4>
                        <p><?= $info['alamat'] ?></p>
                    </div>
                    <div class="list-group-item">
                        <h4>Email</h4>
                        <p><?= $info['email'] ?></p>
                    </div>
                    <div class="list-group-item">
                        <h4>Telpon</h4>
                        <p><?= $info['telp'] ?></p>
                    </div>
                    <div class="list-group-item">
                        <h4>Fax</h4>
                        <p><?= $info['fax'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <h4 class="txt-bold">Hubungi Kami</h4>
                <form action="sistem/tambah_kontak.php" method="post" id="contact-form">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap:</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Lengkap" <?= @$_SESSION['nama'] ? 'value="' . $_SESSION['nama'] . '"' : '' ?>>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email" <?= @$_SESSION['email'] ? 'value="' . $_SESSION['email'] . '"' : '' ?>>
                    </div>
                    <div class="form-group contactForm">
                        <label for="pesan">Pesan</label>
                        <textarea name="pesan" id="pesan" class="form-control" placeholder="Masukan Pesan" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group"><input type="submit" name="kirim" value="Kirim" class="btn btn-get-started"></div>
                </form>
            </div>
        </div>
    </div>
</section>
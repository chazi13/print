<div class="navbar-background"></div>
<section id="kategori" class="section">
    <div class="container">
        <div class="row mar-bot20">
            <div class="col-md-6 col-md-offset-3">
                <div class="section-header">
                    <h2 class="section-heading text-center">Kontak</h2>
                    <p>Keteragan halaman Kontak</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5 col-sm-12">
                <h4 class="text-center txt-bold">Temukan Kami</h4>

            </div>
            <div class="col-md-7 col-sm-12">
                <h4 class="text-center txt-bold">Hubungi Kami</h4>
                <form action="sistem/aksi_kontak.php" method="post" id="contact-form">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap:</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email">
                    </div>
                    <div class="form-group contactForm">
                        <label for="pesan">Pesan</label>
                        <textarea name="pesan" id="pesan" class="form-control" placeholder="Masukan Pesan" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group"><input type="submit" value="Kirim" class="btn btn-get-started"></div>
                </form>
            </div>
        </div>
    </div>
</section>
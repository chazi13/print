<?php

$id_produk = @$_GET['id_produk'];
$query = mysqli_query($koneksi, "SELECT produk.*, kategori.nama_kategori FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori WHERE id_produk = $id_produk");
$produk = mysqli_fetch_assoc($query);

?>

<div class="navbar-background"></div>
<section class="section" id="produk">
    <div class="container">
        <div class="row pad-top10">
            <div class="col-md-5 col-sm-12">
                <div class="panel produk-panel">
                    <div class="panel-body">
                        <div class="section-header">
                            <h3 class="section-heading text-left">Detail Produk</h3>
                        </div>
                        <hr>

                        <div class="produk-img text-center">
                            <img src="<?= $produk['gambar'] ?>" alt="">
                        </div>
                        <div class="produk-desc">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Nama Produk</th>
                                        <td>:</td>
                                        <td><?= $produk['nama_produk'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kategori</th>
                                        <td>:</td>
                                        <td><?= $produk['nama_kategori'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Harga</th>
                                        <td>:</td>
                                        <td>Rp. <?= number_format($produk['harga'], 2, ',', '.') ?></td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <td>:</td>
                                        <td><?= $produk['keterangan'] ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-sm-12">
                <div class="panel produk-panel">
                    <div class="panel-body">
                        <div class="section-header">
                            <h3 class="section-heading text-left">Pesan Produk</h3>
                        </div>
                        <hr>

                        <form action="sistem/tambah_pesanan.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="jml">Jumlah Pesan :</label>
                                <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
                                <input type="number" name="jml_pesan" id="jml" class="form-control" placeholder="Masukan Jumlah Pesanan" required>
                            </div>
                            <div class="form-group row">
                                <!-- <div class="col-sm-7">
                                    <input type="checkbox" name="desain" value="1" id="desain">
                                    <label for="desain">Belum Ada File Design</label>
                                </div>
                                <div class="col-sm-5 pull-right text-right">
                                    Rp. 60.000,00
                                </div> -->
                                <div id="ilustrasi" class="col-sm-12 mar-top5">
                                    <label for="file">File :</label>
                                    <input type="file" name="ilustrasi" id="file" class="form-control">
                                    <span class="text-info">#Note : Silahkan kirim gambar sketsa sebagai ilustrasi design</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="catatan">Catatan :</label>
                                <textarea name="catatan" class="form-control" id="catatan" rows="5" placeholder="Tambahkan Catatan"></textarea>
                            </div>
                            <hr>

                            <button type="submit" name="simpan" value="simpan" class="btn btn-success">Kirim <i class="fa fa-send"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

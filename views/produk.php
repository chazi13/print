<?php

$get_kat = @$_GET['kat'];
$kat_query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE nama_kategori != 'Uncategorized'");

$sql = "SELECT *, produk.gambar AS pgambar FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori";
if ($get_kat) {
    $sql += " WHERE kategori.nama_kategori = '$get_kat'";
}

$query_produk = mysqli_query($koneksi, $sql);

?>

<div class="navbar-background"></div>
<section id="kategori" class="section" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row mar-bot20">
            <div class="col-md-3 col-sm-12">
                <h3 class="txt-bold">Kategori</h3>

                <div class="mar-top20 kat-search">
                    <form action="index.php?page=prouduk" method="get">
                        <div class="row">
                            <div class="col-sm-10 search-field">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Cari Produk">
                            </div>
                            <div class="col-sm-2 search-act">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="list-group kat-list mar-top10">
                    <a href="index.php?page=produk" class="list-group-item <?= (!$get_kat ? 'active' : '') ?>">Semua Produk</a>
                    <?php while ($kat = mysqli_fetch_assoc($kat_query)): ?>
                    <a href="index.php?page=produk&kat=<?= $kat['nama_kategori'] ?>" class="list-group-item <?= (($get_kat && $get_kat == $kat['nama_kategori']) ? 'active' : '') ?>"><?= $kat['nama_kategori'] ?></a>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="col-md-9 col-sm-12">
                <h3 class="txt-bold"><?= ($get_kat) ? 'Produk Cetak ' . ucwords($get_kat) : 'Semua Produk Cetak' ; ?></h3>
                <div class="banner-slider bg-gray"></div>

                <div class="row">
                    <?php while ($produk = mysqli_fetch_assoc($query_produk)): ?>
                        <div class="col-md-4 col-sm-12">
                            <div class="panel produk-panel">
                                <a href="index.php?page=detail_produk&id_produk=<?= $produk['id_produk'] ?>">
                                    <div class="panel-body">
                                        <div class="produk-img">
                                            <img src="<?= $produk['pgambar'] ?>" alt="">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM keranjang JOIN produk ON keranjang.id_produk = produk.id_produk WHERE id_user = '$_SESSION[id]'");
$pengiriman = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$_SESSION[id]'"));
$subtotal = 0;
?>

<div class="navbar-background"></div>
<section class="section" id="keranjang">
    <div class="container">
        <?php if (@$_SESSION['pesan']): ?>
            <div class="alert alert-<?= $_SESSION['pesan']['status'] ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?= $_SESSION['pesan']['isi'] ?>
            </div>
        <?php endif; ?>

        <form action="sistem/tambah_transaksi.php" method="post">
            <div class="row">
                <div class="col-md-7 col-sm-12">
                    <div class="section-header">
                        <h4 class="section-heading text-left txt-bold">Pengiriman</h4>
                    </div>

                    <div class="panel">
                        <div class="panel-body">
                            <h4>Alamat Pengiriman</h4>
                            <dd><?= $pengiriman['alamat'] ?></dd>
                            <hr>

                            <h4>Metode Pengiriman</h4>
                            <div class="list-group">
                                <div class="list-group-item">
                                    <input type="radio" name="metode" value="pick_up" id="pickup" class="pay-method" data-harga="0"> 
                                    <label for="pickup">Pick Up </label> <span class="text-right txt-bold pull-right" style="text-align: right; color: #333 !important;">Rp. 0 (FREE)</span>
                                </div>
                                <div class="list-group-item">
                                    <input type="radio" name="metode" value="jne_reg" id="jnereg" class="pay-method" data-harga="9000"> 
                                    <label for="jnereg">JNE REG </label> <span class="text-right txt-bold pull-right" style="text-align: right; color: #333 !important;">Rp. 9.000</span>
                                </div>
                                <div class="list-group-item">
                                    <input type="radio" name="metode" value="jne_yes" id="jneyes" class="pay-method" data-harga="18000"> 
                                    <label for="jneyes">JNE YES </label> <span class="text-right txt-bold pull-right" style="text-align: right; color: #333 !important;">Rp. 18.000</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-header">
                        <h4 class="section-heading text-left txt-bold">Detail Pesanan</h4>
                    </div>
                    <div class="panel">
                        <div class="panel-body">
                            <div class="list-group kat-list">
                                <?php while ($p = mysqli_fetch_assoc($query)): $ptotal = $p['jml_pesan'] * $p['harga']; ?>
                                    <div class="produk-desc list-group-item">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h5 class="produk-title"><?= $p['nama_produk'] ?></h5>
                                                <dl>
                                                    <dd><?= $p['jml_pesan'] . ' x ' . number_format($p['harga'], 0, ',', '.') . ' @ Rp.' . number_format($ptotal, 0, ',', '.') ?></dd>
                                                    <?php if ($p['desain'] == 1): ?>
                                                    <dd><?php $ptotal += 60000 ?>Biaya design Rp. 60.000</dd>
                                                    <?php endif; ?>
                                                    <?php if ($p['catatan']): ?>
                                                    <dd>Note: <?= $p['catatan'] ?></dd>
                                                    <?php endif; ?>
                                                </dl>
                                            </div>
                                            <div class="col-sm-6 text-right pull-right">
                                                <a href="sistem/hapus_keranjang.php?id_keranjang=<?= $p['id_keranjang'] ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus pesanan?')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <h5 class="produk-title mar-top20">
                                                    Rp <span><?= number_format($ptotal, 0, ',', '.') ?></span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                <?php $subtotal += $ptotal; endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <div class="section-header">
                        <h4 class="section-heading text-left txt-bold">Ringkasan Pesanan</h4>
                    </div>

                    <div class="panel">
                        <div class="panel-body">
                            <div class="list-group kat-list">
                                <div class="list-group-item">
                                    <dt class="txt-bold">
                                        Subtotal
                                        <span class="text-right pull-right">Rp. <?= number_format($subtotal, 0, ',', '.') ?></span>
                                    </dt>
                                    <input type="hidden" name="subtotal" id="subtotal" value="<?= $subtotal ?>">
                                </div>
                                <div class="list-group-item">
                                    <dt class="txt-bold">
                                        Pengiriman
                                        <span class="text-right pull-right pengiriman">Rp -</span>
                                    </dt>
                                    <input type="hidden" name="pengiriman" id="pengiriman">
                                </div>
                            </div>

                            <h4 class="txt-bold">
                                Total
                                <span class="text-right pull-right total">Rp -</span>
                            </h4>
                            <input type="hidden" name="total" id="total">

                            <div class="mar-top20">
                                <button type="submit" class="btn btn-get-started btn-block">Bayar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

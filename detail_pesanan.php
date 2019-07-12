<?php
include 'sistem/koneksi.php';

$id_transaksi = $_GET['id_transaksi'];
$query = mysqli_query($koneksi, "SELECT * FROM detail_transaksi JOIN produk ON detail_transaksi.id_produk =  produk.id_produk JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi WHERE detail_transaksi.id_transaksi = '$id_transaksi'");
?>

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
                    <!-- <?php if ($p['status'] == 0 && $_SESSION['level'] == 'user'): ?>
                    <a href="sistem/hapus_keranjang.php?id_keranjang=<?= $p['id_keranjang'] ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus pesanan?')">
                        <i class="fa fa-trash"></i>
                    </a>
                    <?php endif; ?> -->
                    <h5 class="produk-title mar-top20">
                        Rp <span><?= number_format($ptotal, 0, ',', '.') ?></span>
                    </h5>
                    <?php if ($_SESSION['level'] == 'admin'): ?>
                        <?php $prefix = ($_SESSION['level'] == 'admin') ? '../' : '' ?>
                        <button class="open-file btn btn-primary" data-toggle="modal" data-target="#file-viewer" data-path="<?= $prefix . $p['file'] ?>"><i class="fa fa-file"></i></button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php $subtotal += $ptotal; endwhile; ?>
</div>


<?php
include 'sistem/koneksi.php';

$id_transaksi = $_GET['id_transaksi'];
$query = mysqli_query($koneksi, "SELECT transaksi.*, user.nama, ongkir.metode FROM transaksi JOIN user ON transaksi.id_user =  user.id_user JOIN ongkir ON transaksi.metode_pengiriman = ongkir.id_ongkir WHERE id_transaksi = '$id_transaksi'");
$transaksi = mysqli_fetch_assoc($query);
?>

<table class="table table-striped">
    <tr>
        <td>Kode Transaksi</td>
        <td>:</td>
        <td><?= $transaksi['kode_transaksi'] ?></td>
    </tr>
    <?php if ($_SESSION['level'] == 'admin'): ?>
    <tr>
        <td>Nama Pemesan</td>
        <td>:</td>
        <td><?= $transaksi['nama'] ?></td>
    </tr>
    <?php endif; ?>
    <tr>
        <td>Tanggal</td>
        <td>:</td>
        <td><?= date('d-F-Y H:i:s', strtotime($transaksi['tgl'])) ?></td>
    </tr>
    <tr>
        <td>Metode Pengiriman</td>
        <td>:</td>
        <td><?= strtoupper(str_replace('_', ' ', $transaksi['metode'])) ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?= $transaksi['alamat'] ?></td>
    </tr>
    <tr>
        <td>Harga</td>
        <td>:</td>
        <td>Rp. <?= number_format($transaksi['total'], 2, ',', '.') ?></td>
    </tr>
    <tr>
        <td>No. Resi</td>
        <td>:</td>
        <td><?= $transaksi['resi'] ?></td>
    </tr>
    <tr>
        <td>Bukti Pengiriman</td>
        <td>:</td>
        <td><img src="<?= (($_SESSION['level'] == 'admin') ? '../' : '') . $transaksi['bukti_kirim'] ?>" alt="" width="200px"></td>
    </tr>
</table>
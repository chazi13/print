<?php
include 'sistem/koneksi.php';

$id_transaksi = $_GET['id_transaksi'];
$query = mysqli_query($koneksi, "SELECT transaksi.*, user.nama, ongkir.metode, konfirmasi_pembayaran.*, konfirmasi_pembayaran.status AS status_pembayaran FROM transaksi JOIN user ON transaksi.id_user =  user.id_user JOIN konfirmasi_pembayaran ON transaksi.id_transaksi = konfirmasi_pembayaran.id_transaksi JOIN ongkir ON transaksi.metode_pengiriman = ongkir.id_ongkir WHERE transaksi.id_transaksi = '$id_transaksi'");
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
        <td>Nama Akun</td>
        <td>:</td>
        <td><?= $transaksi['nama_akun'] ?></td>
    </tr>
    <tr>
        <td>Nama Bank</td>
        <td>:</td>
        <td><?= $transaksi['nama_bank'] ?></td>
    </tr>
    <tr>
        <td>No Rek</td>
        <td>:</td>
        <td><?= $transaksi['no_rek'] ?></td>
    </tr>
    <tr>
        <td>Bukti Pembayaran</td>
        <td>:</td>
        <td>
            <img src="<?= (($_SESSION['level'] == 'admin') ? '../' : '') . $transaksi['file_bukti'] ?>" alt="" width="200px">
            <?php if ($_SESSION['level'] == 'admin' && $transaksi['status_pembayaran'] == 0): ?>
                <br><br>
                <a href="sistem/konfirmasi_pembayaran.php?id_transaksi=<?= $id_transaksi ?>" class="btn btn-primary btn-sm">Konfrimasi Pembayaran</a>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td colspan="3"><hr></td>
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
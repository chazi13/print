<?php
include '../sistem/koneksi.php';
is_login('admin');

$status = $_POST['status'];
$bt = $_POST['tahun'] . '-' . $_POST['bulan'];
$t_dari = $bt . '-' . $_POST['awal'];
$t_sampai = $bt . '-' . $_POST['akhir'];

$total = 0;
switch ($status) {
    case '0':
        $nama_status = 'Baru';
        break;
    
    case '1':
        $nama_status = 'Pending';
        break;

    case '2':
        $nama_status = 'Dikerjakan';
        break;
    
    case '3':
        $nama_status = 'Dikirim';
        break;

    case '4':
        $nama_status = 'Selesai';
        break;
}

$sql = "SELECT transaksi.*, user.nama, ongkir.metode FROM transaksi JOIN ongkir ON transaksi.metode_pengiriman = ongkir.id_ongkir JOIN user ON transaksi.id_user = user.id_user WHERE tgl BETWEEN '$t_dari' AND '$t_sampai'";
$tr_query = mysqli_query($koneksi, $sql);
$no = 1;

$profil = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM info_toko"));
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Laporan</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<style>
    .wrapper {
        margin-top: 50px;
    }

    @media print {
        @page {
            size: landscape;
        }
    }
</style>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <header class="text-center">
                <img src="../assets/img/logo-warna.png" alt="" width="300px">
                <h4><?= $profil['alamat'] ?></h4>
                <h4>Telp. <?= $profil['telp'] ?> Fax <?= $profil['fax'] ?></h4>
                <h4>Email: <?= $profil['email'] ?></h4>
            </header>
            <hr>
            <section class="main-section">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Laporan : Pesanan <?= $nama_status ?></h4>
                    </div>
                    <div class="col-md-6 text-right">
                        <h4><?= date('d-F-Y') ?></h4>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th width="2%">No</th>
                            <th width="10%">Kode</th>
                            <th width="10%">Nama</th>
                            <th width="10%">Tanggal</th>
                            <th width="30%">Detail</th>
                            <th width="20%">Alamat</th>
                            <th width="3%">Metode Pengiriman</th>
                            <th width="15%">Total</th>
                        </thead>
                        <tbody>
                            <?php
                                while ($tr = mysqli_fetch_assoc($tr_query)):
                                    $item_query = mysqli_query($koneksi, "SELECT detail_transaksi.*, produk.nama_produk FROM detail_transaksi JOIN produk ON detail_transaksi.id_produk = produk.id_produk WHERE id_transaksi = '$tr[id_transaksi]'");
                                    $total += $tr['total'];
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $tr['kode_transaksi'] ?></td>
                                    <td><?= $tr['nama'] ?></td>
                                    <td><?= $tr['tgl'] ?></td>
                                    <td>
                                        <ul>
                                            <?php while ($item = mysqli_fetch_assoc($item_query)): ?>
                                                <li>
                                                    <?= $item['jml_pesan'] . ' X ' . $item['nama_produk'] . (($item['desain'] == 1) ? ' | Dengan Desain' : '') ?>
                                                </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    </td>
                                    <td><?= $tr['alamat'] ?></td>
                                    <td><?= $tr['metode'] ?></td>
                                    <td>Rp. <?= number_format($tr['total'], 2, ',', '.') ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                        <tfoot>
                            <th colspan="7">Jumlah</th>
                            <th>Rp. <?= number_format($total, 2, ',', '.') ?></th>
                        </tfoot>
                    </table>
                </div>
            </section>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>

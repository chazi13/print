<?php
include_once 'koneksi.php';

if (!$_POST['metode'] OR $_POST['metode'] == null) {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Pilih metode transaksi!'
    ];
    header('location: ../index.php?page=keranjang');
} else {
    $check = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT RIGHT(kode_transaksi, 4) AS last_code FROM transaksi ORDER BY id_transaksi DESC"));
    $last_code = $check['last_code'];

    $kode_transaksi = '#TRK-' . sprintf('%04d', $last_code + 1);
    $metode_pengiriman = $_POST['metode'];
    $alamat = $_POST['alamat'];
    $total = $_POST['total'];
    $id_user = $_SESSION['id'];

    $query_transaksi = mysqli_query($koneksi, "INSERT INTO transaksi (kode_transaksi, metode_pengiriman, alamat, total, id_user) VALUE ('$kode_transaksi', '$metode_pengiriman', '$alamat', '$total', '$id_user')");
    if ($query_transaksi) {
        $id_transaksi = mysqli_insert_id($koneksi);
        $query_keranjang = mysqli_query($koneksi, "SELECT * FROM keranjang WHERE id_user = '$id_user'");
        while ($keranjang = mysqli_fetch_assoc($query_keranjang)) {
            $query_detail = mysqli_query($koneksi, "INSERT INTO detail_transaksi (jml_pesan, desain, `file`, catatan, id_produk, id_transaksi) VALUES ('$keranjang[jml_pesan]', '$keranjang[desain]', '$keranjang[file]', '$keranjang[catatan]', '$keranjang[id_produk]', '$id_transaksi')");
        }

        if ($query_detail) {
            $hapus_keranjang = mysqli_query($koneksi, "DELETE FROM keranjang WHERE id_user = '$id_user'");
        }
    }

    if ($query_transaksi && $hapus_keranjang) {
        $check_keranjang = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(id_keranjang) AS jml_keranjang FROM keranjang WHERE id_user = '$row[id_user]'"));
        $_SESSION['jml_keranjang'] = $check_keranjang['jml_keranjang'];

        $_SESSION['pesan'] = [
            'status' => 'success',
            'isi' => 'Transaksi berhasil ditambahkan'
        ];
    } else {
        $_SESSION['pesan'] = [
            'status' => 'danger',
            'isi' => 'Transaksi gagal ditambahkan'
        ];
    }
    header('location: ../index.php?page=riwayat');
}

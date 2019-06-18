<?php 
include_once 'koneksi.php';

$id_keranjang = $_GET['id_keranjang'];
$query = mysqli_query($koneksi, "DELETE FROM keranjang WHERE id_keranjang = '$id_keranjang'");

if ($query) {
    $check_keranjang = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(id_keranjang) AS jml_keranjang FROM keranjang WHERE id_user = '$row[id_user]'"));
    $_SESSION['jml_keranjang'] = $check_keranjang['jml_keranjang'];

    $_SESSION['pesan'] = [
        'status' => 'success',
        'isi' => 'Pesanan berhasil dihapus'
    ];
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Pesanan gagal dihapus'
    ];
}
header('location: ../index.php?page=keranjang');


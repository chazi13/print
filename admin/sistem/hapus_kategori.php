<?php
include_once "../../sistem/koneksi.php";

$id_kategori = $_GET['id'];

$query1 = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori = '$id_kategori'");
$query2 = mysqli_query($koneksi, "UPDATE produk SET id_kategori = '1' WHERE id_kategori = '$id_kategori'");

if ($query1 && $query2) {
    $_SESSION['pesan'] = [
        'status' => 'success',
        'isi' => 'Kategori berhasil hapus'
    ];
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Kategori gagal hapus'
    ];
}
header('location: ../index.php?page=kategori');

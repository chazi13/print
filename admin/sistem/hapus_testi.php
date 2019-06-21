<?php
include_once '../../sistem/koneksi.php';

$id_testi = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM testimoni WHERE id_testi = '$id_testi'");
if ($query) {
    $_SESSION['pesan'] = [
        'status' => 'success',
        'isi' => 'Testimoni Dihapus'
    ];
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Testimoni Gagal Dihapus'
    ];
}
header('location: ../index.php?page=testimoni');


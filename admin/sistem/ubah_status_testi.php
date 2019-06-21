<?php
include_once '../../sistem/koneksi.php';

$id_testi = $_GET['id'];
$status = $_GET['status'];

$query = mysqli_query($koneksi, "UPDATE testimoni SET `status` = '$status' WHERE id_testi = '$id_testi'");
if ($query) {
    $_SESSION['pesan'] = [
        'status' => 'success',
        'isi' => 'Status Testimoni Diubah'
    ];
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Status Testimoni Gagal Diubah'
    ];
}
header('location: ../index.php?page=testimoni');


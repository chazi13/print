<?php
include_once '../../sistem/koneksi.php';

$id_kontak = $_GET['id_kontak'];
$query = mysqli_query($koneksi, "DELETE FROM kontak WHERE id_kontak = '$id_kontak'");
if ($query) {
    $_SESSION['pesan'] = [
        'status' => 'success',
        'isi' => 'Pesan berhasil dihapus'
    ];
} else {
    $_SESSION['pesan'] = [
        'status' => 'success',
        'isi' => 'Pesan gagal dihapus'
    ];
}
header('location: ../index.php?page=kontak');

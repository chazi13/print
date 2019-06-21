<?php
include_once '../../sistem/koneksi.php';

if (@$_GET['id']) {
    $id_ongkir = $_GET['id'];

    $query = mysqli_query($koneksi, "DELETE FROM ongkir WHERE id_ongkir = '$id_ongkir'");
    if ($query) {
        $_SESSION['pesan'] = [
            'status' => 'success',
            'isi' => 'Daerah berhasil dihapus'
        ];
    } else {
        $_SESSION['pesan'] = [
            'status' => 'danger',
            'isi' => 'Daerah berhasil dihapus'
        ];
    }
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Daerah berhasil dihapus'
    ];
}

header('location: ../index.php?page=ongkir');

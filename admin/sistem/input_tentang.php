<?php
include_once '../../sistem/koneksi.php';

if ($_POST['simpan']) {
    $check_tentang = mysqli_query($koneksi, "SELECT * FROM tentang");
    $text = $_POST['tentang'];
    if (mysqli_num_rows($check_tentang) < 1) {
        $query = mysqli_query($koneksi, "INSERT INTO tentang (text) VALUE ('" . base64_encode($text) . "')");
        $status = 'ditambahkan!';
    } else {
        $query = mysqli_query($koneksi, "UPDATE tentang SET text = '" . base64_encode($text) . "'");
        $status = 'diubah!';
    }

    if ($query) {
        $_SESSION['pesan'] = [
            'status' => 'success',
            'isi' => 'Tentang ' . $status
        ];
    } else {
        $_SESSION['pesan'] = [
            'status' => 'danger',
            'isi' => 'Tentang gagal ' . $status
        ];
    }
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Tentang gagal ' . $status
    ];
}
header('location: ../index.php?page=tentang');

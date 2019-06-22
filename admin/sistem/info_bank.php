<?php
include_once '../../sistem/koneksi.php';

if ($_POST['simpan']) {
    $bank = $_POST['bank'];
    $atas_nama = $_POST['atas_nama'];
    $rek = $_POST['rek'];

    $check = mysqli_query($koneksi, "SELECT * FROM info_toko");
    if (mysqli_num_rows($check) < 1) {
        $query = mysqli_query($koneksi, "INSERT INTO info_toko (bank, atas_nama, rek) VALUES ('$bank', '$atas_nama', '$rek')");
        $status = 'ditambahkan!';
    } else {
        $query = mysqli_query($koneksi, "UPDATE info_toko SET bank = '$bank', atas_nama = '$atas_nama', rek = '$rek'");
        $status = 'diubah!';
    }

    if ($query) {
        $_SESSION['pesan'] = [
            'status' => 'success',
            'isi' => 'Informasi bank toko berhasil ' . $status
        ];
    } else {
        $_SESSION['pesan'] = [
            'status' => 'success',
            'isi' => 'Informasi bank toko gagal ' . $status
        ];
    }
} else {
    $_SESSION['pesan'] = [
        'status' => 'success',
        'isi' => 'Informasi bank toko gagal ' . $status
    ];
}

header('location: ../index.php');

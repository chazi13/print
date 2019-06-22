<?php
include_once '../../sistem/koneksi.php';

if ($_POST['simpan']) {
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $instagram = $_POST['instagram'];

    $check = mysqli_query($koneksi, "SELECT * FROM info_toko");
    if (mysqli_num_rows($check) < 1) {
        $query = mysqli_query($koneksi, "INSERT INTO info_toko (facebook, twitter, instagram) VALUES ('$facebook', '$twitter', '$instagram')");
        $status = 'ditambahkan!';
    } else {
        $query = mysqli_query($koneksi, "UPDATE info_toko SET facebook = '$facebook', twitter = '$twitter', instagram = '$instagram'");
        $status = 'diubah!';
    }

    if ($query) {
        $_SESSION['pesan'] = [
            'status' => 'success',
            'isi' => 'Informasi sosial media toko berhasil ' . $status
        ];
    } else {
        $_SESSION['pesan'] = [
            'status' => 'success',
            'isi' => 'Informasi sosial media toko gagal ' . $status
        ];
    }
} else {
    $_SESSION['pesan'] = [
        'status' => 'success',
        'isi' => 'Informasi sosial media toko gagal ' . $status
    ];
}

header('location: ../index.php');

<?php
include_once '../../sistem/koneksi.php';

if ($_POST['simpan']) {
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $fax = $_POST['fax'];
    $alamat = $_POST['alamat'];

    $check = mysqli_query($koneksi, "SELECT * FROM info_toko");
    if (mysqli_num_rows($check) < 1) {
        $query = mysqli_query($koneksi, "INSERT INTO info_toko (email, telp, fax, alamat) VALUES ('$email', '$telp', '$fax', '$alamat')");
        $status = 'ditambahkan!';
    } else {
        $query = mysqli_query($koneksi, "UPDATE info_toko SET email = '$email', telp = '$telp', fax = '$fax', alamat = '$alamat'");
        $status = 'diubah!';
    }

    if ($query) {
        $_SESSION['pesan'] = [
            'status' => 'success',
            'isi' => 'Informasi kontak toko berhasil ' . $status
        ];
    } else {
        $_SESSION['pesan'] = [
            'status' => 'success',
            'isi' => 'Informasi kontak toko gagal ' . $status
        ];
    }
} else {
    $_SESSION['pesan'] = [
        'status' => 'success',
        'isi' => 'Informasi kontak toko gagal ' . $status
    ];
}

header('location: ../index.php');

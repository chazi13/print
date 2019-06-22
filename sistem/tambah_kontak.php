<?php
include_once 'koneksi.php';

if ($_POST['kirim']) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    $query = mysqli_query($koneksi, "INSERT INTO kontak (nama, email, pesan) VALUES ('$nama', '$email' , '$pesan')");
    if ($query) {
        $_SESSION['pesan'] = [
            'status' => 'success',
            'isi' => 'Terima Kasih'
        ];
    } else {
        $_SESSION['pesan'] = [
            'status' => 'danger',
            'isi' => 'Pesan gagal dikirim'
        ];
    }
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Pesan gagal dikirim'
    ];
}

header('location: ../index.php?page=kontak');

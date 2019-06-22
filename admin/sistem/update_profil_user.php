<?php
include_once '../../sistem/koneksi.php';

if (@$_POST['simpan']) {
    $update_password = '';
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    if (@$_POST['password'] && @$_POST['password'] !== '') {
        $password = md5($_POST['password']);
        $update_password = ", password = '$password'";
    }

    $query = mysqli_query($koneksi, "UPDATE admin SET nama = '$nama', username = '$username'$update_password WHERE id_admin = '$_SESSION[id]'");
    if ($query) {
        $_SESSION['nama'] = $nama;
        $_SESSION['usernmae'] = $usernmae;

        $_SESSION['pesan'] = [
            'status' => 'success',
            'isi' => 'Profil Telah Diupdate'
        ];
    } else {
        $_SESSION['pesan'] = [
            'status' => 'danger',
            'isi' => 'Profil Gagal Diupdate'
        ];
    }
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Profil Gagal Diupdate'
    ];
}

header('location: ../index.php?page=profil');

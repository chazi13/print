<?php
include_once 'koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];
$keterangan = $_POST['keterangan'];

if (@$_FILES['foto']['error'] == 0) {
    $file = $_FILES['foto'];
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = 'foto-profil-' . strtolower(str_replace(' ', '-', $nama)) . '.' . $ext;

    move_uploaded_file($file['tmp_name'], '../assets/img/foto/' . $filename);
    $update_foto = ", foto = '$filename'";
}

$query = mysqli_query($koneksi, "UPDATE user SET nama = '$nama', email = '$email', telp = '$telp', alamat = '$alamat', keterangan = '$keterangan' $update_foto");

if ($query) {
    $_SESSION['pesan'] = [
        'status' => 'success',
        'isi' => 'Profil berhasil diubah'
    ];
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Profil gagal diubah'
    ];
}
header('location: ../index.php?page=profil');

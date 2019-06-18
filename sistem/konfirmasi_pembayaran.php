<?php
include_once "koneksi.php";

$id_transaksi = $_POST['id_transaksi'];
$nama_bank = $_POST['nama_bank'];
$nama_akun = $_POST['nama_akun'];
$no_rek = $_POST['no_rek'];

if (@$_FILES['file_bukti']['error'] == 0) {
    $file = $_FILES['file_bukti'];
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = round(microtime(date('d-Y H:i:s'))) . '.' . $ext;
    $path_upload = '../upload/bukti/pembayaran/';

    if (!file_exists($path_upload)) {
        mkdir($path_upload);
    }

    move_uploaded_file($file['tmp_name'], $path_upload . $filename);
    $fullpath = str_replace('../', '', $path_upload) . $filename;
}


$query = mysqli_query($koneksi, "INSERT INTO konfirmasi_pembayaran (`nama_bank`, `nama_akun`, `no_rek`, `file_bukti`, `id_transaksi`) VALUE ('$nama_bank', '$nama_akun', '$no_rek', '$fullpath', '$id_transaksi')");
if ($query) {
    $query_update = mysqli_query($koneksi, "UPDATE transaksi SET `status` = '1' WHERE id_transaksi = '$id_transaksi'");

    $_SESSION['pesan'] = [
        'status' => 'success',
        'isi' => 'Bukti Pembayaran dikirim'
    ];
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Bukti Pembayaran gagal dikirim'
    ];
}
header('location: ../index.php?page=riwayat');

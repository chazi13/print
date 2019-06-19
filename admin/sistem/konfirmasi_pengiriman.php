<?php
include_once '../../sistem/koneksi.php';

$id_transaksi = $_POST['id_transaksi'];
$resi = $_POST['resi'];

if (@$_FILES['file_bukti']['error'] == 0) {
    $file = $_FILES['file_bukti'];
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = round(microtime(date('d-Y H:i:s'))) . '.' . $ext;
    $path_upload = '../../upload/bukti/kirim/';
    if (!file_exists($path_upload)) {
        mkdir($path_upload);
    }

    move_uploaded_file($file['tmp_name'], $path_upload . $filename);
    $fullpath = str_replace('../', '', $path_upload) . $filename;
}

$query = mysqli_query($koneksi, "UPDATE transaksi SET `status` = '3', resi = '$resi', bukti_kirim = '$fullpath' WHERE id_transaksi = '$id_transaksi'");
echo "UPDATE transaksi SET `status` = '3', resi = '$resi', bukti_kirim = '$fullpath' WHERE id_transaksi = '$id_transaksi'";
if ($query) {
    $_SESSION['pesan'] = [
        'status' => 'success',
        'isi' => 'Pesanan diupdate'
    ];
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Pesanan gagal diupdate'
    ];
}
header('location: ../index.php?page=pesanan');


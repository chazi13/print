<?php
include_once '../../sistem/koneksi.php';

if ($_POST['simpan']) {
    $nama_prov = $_POST['nama_prov'];
    $nama_kota = $_POST['nama_kota'];
    $nama_kec = $_POST['nama_kec'];
    $harga = $_POST['harga'];
    $metode = $_POST['metode'];
    $id_ongkir = $_POST['id_ongkir'];

    $query = mysqli_query($koneksi, "UPDATE ongkir SET nama_prov = '$nama_prov', nama_kota = '$nama_kota', nama_kec = '$nama_kec', metode = '$metode', harga = '$harga' WHERE id_ongkir = '$id_ongkir'");
    if ($query) {
        $_SESSION['pesan'] = [
            'status' => 'success',
            'isi' => 'Daerah berhasil diubah'
        ];
    } else {
        $_SESSION['pesan'] = [
            'status' => 'danger',
            'isi' => 'Daerah berhasil diubah'
        ];
    }
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Daerah berhasil diubah'
    ];
}
header('location: ../index.php?page=ongkir');

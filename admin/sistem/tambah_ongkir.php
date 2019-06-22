<?php
include_once '../../sistem/koneksi.php';

if ($_POST['simpan']) {
    $nama_prov = $_POST['nama_prov'];
    $nama_kota = $_POST['nama_kota'];
    $nama_kec = $_POST['nama_kec'];
    $harga = $_POST['harga'];
    $metode = $_POST['metode'];

    $query = mysqli_query($koneksi, "INSERT INTO ongkir (nama_prov, nama_kota, nama_kec, metode, harga) VALUES ('$nama_prov', '$nama_kota', '$nama_kec', '$metode', '$harga')");
    if ($query) {
        $_SESSION['pesan'] = [
            'status' => 'success',
            'isi' => 'Daerah berhasil ditambahkan'
        ];
    } else {
        $_SESSION['pesan'] = [
            'status' => 'danger',
            'isi' => 'Daerah berhasil ditambahkan'
        ];
    }
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Daerah berhasil ditambahkan'
    ];
}
header('location: ../index.php?page=ongkir');

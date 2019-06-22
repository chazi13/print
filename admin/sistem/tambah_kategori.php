<?php
include_once "../../sistem/koneksi.php";

if ($_POST['simpan']) {
    $nama_kategori = $_POST['nama_kategori'];

    if (@$_FILES['gambar']['error'] == 0) {
        $file = $_FILES['gambar'];
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = 'kat-icon.' . $ext;
        $path_upload = '../../assets/img/produk/' . $nama_kategori . '/';
        if (!file_exists($path_upload)) {
            mkdir($path_upload);
        }

        move_uploaded_file($file['tmp_name'], $path_upload . $filename);
        $fullpath = str_replace('../', '', $path_upload) . $filename;
    }

    $query = mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori, gambar) VALUE ('$nama_kategori', '$fullpath')");
    if ($query) {
        $_SESSION['pesan'] = [
            'status' => 'success',
            'isi' => 'Kategori berhasil ditambahkan'
        ];
    } else {
        $_SESSION['pesan'] = [
            'status' => 'danger',
            'isi' => 'Kategori gagal ditambahkan'
        ];
    }
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Kategori gagal ditambahkan'
    ];
}

header('location: ../index.php?page=kategori');

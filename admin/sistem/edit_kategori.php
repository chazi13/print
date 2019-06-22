<?php
include_once "../../sistem/koneksi.php";

if ($_POST['simpan']) {
    $id_kategori = $_POST['id_kategori'];
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
        $update_gambar = ", gambar = '$fullpath'";
    }

    $query = mysqli_query($koneksi, "UPDATE kategori SET nama_kategori = '$nama_kategori'$update_gambar WHERE id_kategori = '$id_kategori'");
    if ($query) {
        $_SESSION['pesan'] = [
            'status' => 'success',
            'isi' => 'Kategori berhasil diubah'
        ];
    } else {
        $_SESSION['pesan'] = [
            'status' => 'danger',
            'isi' => 'Kategori gagal diubah'
        ];
    }
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Kategori gagal diubah'
    ];
}

header('location: ../index.php?page=kategori');

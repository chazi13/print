<?php
include_once "../../sistem/koneksi.php";

if ($_POST['simpan']) {
    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $keterangan = $_POST['keterangan'];

    $data_kategori = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT nama_kategori FROM kategori WHERE id_kategori = '$kategori'"));
    $nama_kategori = $data_kategori['nama_kategori'];

    if ($_FILES['gambar'] && $_FILES['gambar']['error'] == 0) {
        $file = $_FILES['gambar'];
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = strtolower(str_replace(' ', '-', $file['name']));
        $path_upload = '../../assets/img/produk/' . $nama_kategori . '/';
        if (!file_exists($path_upload)) {
            mkdir($path_upload);
        }

        move_uploaded_file($file['tmp_name'], $path_upload . $filename);
        $fullpath = str_replace('../', '', $path_upload) . $filename;
        $update_gambar = ", gambar = '$fullpath'";
    }

    $query = mysqli_query($koneksi, "UPDATE produk SET nama_produk ='$nama_produk', harga = '$harga', keterangan = '$keterangan'$update_gambar WHERE id_produk = '$id_produk'");

    if ($query) {
        $_SESSION['pesan'] = [
            'status' => 'success',
            'isi' => 'Produk berhasil diubah'
        ];
    } else {
        $_SESSION['pesan'] = [
            'status' => 'danger',
            'isi' => 'Produk gagal diubah'
        ];
    }
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Produk gagal diubah'
    ];
}

header('location: ../index.php?page=produk');

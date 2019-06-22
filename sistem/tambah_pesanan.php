<?php
include_once "koneksi.php";

if (@$_POST['simpan']) {
    $id_produk = $_POST['id_produk'];
    $jml_pesanan = $_POST['jml_pesan'];
    $catatan = $_POST['catatan'];
    $desain = @$_POST['desain'];
    $id_user = $_SESSION['id'];

    if (@$_FILES['ilustrasi']['error'] == 0) {
        $file = $_FILES['ilustrasi'];
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = round(microtime(date('d-Y H:i:s'))) . '.' . $ext;
        $path_upload = '../upload/' . strtolower(str_replace(' ', '_', $_SESSION['nama'])) . '/';
        // echo $path_upload;
        if (!file_exists($path_upload)) {
            mkdir($path_upload);
        }

        move_uploaded_file($file['tmp_name'], $path_upload . $filename);
        $fullpath = str_replace('../', '', $path_upload) . $filename;
    }


    $query = mysqli_query($koneksi, "INSERT INTO keranjang (`jml_pesan`, `desain`, `file`, `catatan`, `id_produk`, `id_user`) VALUE ('$jml_pesanan', '$desain', '$fullpath', '$catatan', '$id_produk', '$id_user')");
    if ($query) {
        $check_keranjang = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(id_keranjang) AS jml_keranjang FROM keranjang WHERE id_user = '$id_user'"));
        $_SESSION['jml_keranjang'] = $check_keranjang['jml_keranjang'];

        $_SESSION['pesan'] = [
            'status' => 'success',
            'isi' => 'Pesanan berhasil disimpan'
        ];
        header('location: ../index.php?page=keranjang');
    } else {
        $_SESSION['pesan'] = [
            'status' => 'danger',
            'isi' => 'Pesanan gagal disimpan'
        ];
        header('location: ../index.php?page=detail_produk&id_produk=' . $id_produk);
    }
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Pesanan gagal disimpan'
    ];
    header('location: ../index.php?page=detail_produk&id_produk=' . $id_produk);
}

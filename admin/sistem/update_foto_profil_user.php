<?php
include_once '../../sistem/koneksi.php';

if (@$_POST['simpan']) {
    if ($_FILES['foto']['error'] == 0) {
        $file = $_FILES['foto'];
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = round(microtime(date('d-Y H:i:s'))) . '.' . $ext;
        $path_upload = '../../assets/img/foto_profil/';
        if (!file_exists($path_upload)) {
            mkdir($path_upload);
        }
    
        move_uploaded_file($file['tmp_name'], $path_upload . $filename);
        $fullpath = str_replace('../', '', $path_upload) . $filename;
    
        $query = mysqli_query($koneksi, "UPDATE admin SET foto = '$fullpath' WHERE id_admin = $_SESSION[id]");
        if ($query) {
            $_SESSION['foto'] = $fullpath;
            $_SESSION['pesan'] = [
                'status' => 'success',
                'isi' => 'Foto Profil Telah Diupdate'
            ];
        } else {
            $_SESSION['pesan'] = [
                'status' => 'danger',
                'isi' => 'Foto Profil Gagal Diupdate'
            ];
        }
    } else {
        $_SESSION['pesan'] = [
            'status' => 'danger',
            'isi' => 'Foto Profil Gagal Diupdate'
        ];
    }
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Foto Profil Gagal Diupdate'
    ];
}

header('location: ../index.php?page=profil');

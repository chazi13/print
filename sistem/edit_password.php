<?php
include 'koneksi.php';

if (@$_POST['simpan']) {
    echo "<pre>";
    print_r($_POST);

    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];
    $konfirmasi_password = $_POST['konfirm_password'];

    if ($konfirmasi_password !== $password_baru) {
        $_SESSION['pesan'] = [
            'status' => 'danger',
            'isi' => 'Konfirmasi Password Tidak Sama'
        ];
    } else {
        $check_pass = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT password FROM user WHERE id_user = '$_SESSION[id]'"));
        if (md5($password_lama) !== $check_pass['password']) {
            $_SESSION['pesan'] = [
                'status' => 'danger',
                'isi' => 'Password Lama Tidak Sesuai'
            ];
        } else {
            $new_pass = md5($password_baru);
            $query = mysqli_query($koneksi, "UPDATE user set password = '$new_pass' WHERE id_user = '$_SESSION[id]'");
            if ($query) {
                $_SESSION['pesan'] = [
                    'status' => 'success',
                    'isi' => 'Password Berhasil Diubah'
                ];

                header('location: ../index.php?page=profil');
            } else {
                $_SESSION['pesan'] = [
                    'status' => 'danger',
                    'isi' => 'Password Gagal Diubah'
                ];
            }
        }
    }
    header('location: ../index.php?page=edit_password');
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Password Gagal Diubah'
    ];
    header('location: ../index.php?page=edit_password');
}

<?php
include_once 'koneksi.php';

$get_page = $_GET['page'];
switch ($get_page) {
    case 'home':
        $home_active = 'active';
        $page = "views/home.php";
        break;

    case 'testi':
        $testi_active = 'active';
        $page = "views/testi.php";
        break;

    case 'produk':
        $produk_active = 'active';
        $page = "views/produk.php";
        break;

    case 'detail_produk':
        is_login('user');
        $produk_active = 'active';
        $page = "views/detail_produk.php";
        break;

    case 'keranjang':
        is_login('user');
        $keranjang_active = 'active';
        $page = "views/keranjang.php";
        break;

    case 'riwayat':
        is_login('user');
        $riwayat_active = 'active';
        $page = "views/riwayat.php";
        break;

    case 'tentang':
        $tentang_active = 'active';
        $page = "views/tentang.php";
        break;

    case 'kontak':
        $kontak_active = 'active';
        $page = "views/kontak.php";
        break;

    case 'profil':
        is_login('user');
        $profil_active = 'active';
        $page = "views/profil.php";
        break;

    case 'edit_profil':
        is_login('user');
        $profil_active = 'active';
        $page = "views/edit_profil.php";
        break;

    case 'edit_password':
        is_login('user');
        $profil_active = 'active';
        $page = "views/edit_password.php";
        break;
    
    default:
        $home_active = 'active';
        $page = "views/home.php";
        break;
}

$info = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM info_toko"));

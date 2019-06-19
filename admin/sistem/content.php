<?php
include_once '../sistem/koneksi.php';

$page = $_GET['page'];
switch ($page) {
    case 'dahsboard':
        $dashboard_active = 'active';
        $page_header = 'Dashboard';
        $page = 'dashboard.php';
        break;

    case 'kategori':
        $pk_active = 'active';
        $kategori_active = 'active';
        $page_header = 'Kategori Produk';
        $page = 'kategori.php';
        break;

    case 'produk':
        $pk_active = 'active';
        $produk_active = 'active';
        $page_header = 'Katalog Produk';
        $page = 'produk.php';
        break;

    case 'tambah_produk':
        $pk_active = 'active';
        $produk_active = 'active';
        $page_header = 'Tambah Produk';
        $page = 'tambah_produk.php';
        break;

    case 'edit_produk':
        $pk_active = 'active';
        $produk_active = 'active';
        $page_header = 'Edit Produk';
        $page = 'edit_produk.php';
        break;

    case 'user':
        $user_active = 'active';
        $page_header = 'Daftar User';
        $page = 'user.php';
        break;

    case 'pesanan':
        $pesanan_active = 'active';
        $page_header = 'Daftar Pesanan';
        $page = 'pesanan.php';
        break;

    case 'profil':
        // $profil_active = 'active';
        $page_header = 'Profil Admin';
        $page = 'profil_user.php';
        break;
    
    default:
        $dashboard_active = 'active';
        $page_header = 'Dashboard';
        $page = 'dashboard.php';
        break;
}


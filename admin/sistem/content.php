<?php
include_once '../sistem/koneksi.php';

is_login('admin');
$page = $_GET['page'];
switch ($page) {
    case 'dashboard':
        $dashboard_active = 'active';
        $page_header = 'Dashboard';
        $page = 'dashboard.php';
        break;

    case 'tentang':
        $tentang_active = 'active';
        $page_header = 'Tentang';
        $page = 'tentang.php';
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

    case 'ongkir':
        $ongkir_active = 'active';
        $page_header = 'Metode Pengiriman';
        $page = 'ongkir.php';
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

    case 'report':
        $report_active = 'active';
        $page_header = 'Laporan';
        $page = 'report.php';
        break;

    case 'testimoni':
        $testimoni_active = 'active';
        $page_header = 'Daftar Testimoni';
        $page = 'testimoni.php';
        break;

    case 'profil':
        // $profil_active = 'active';
        $page_header = 'Profil Admin';
        $page = 'profil_user.php';
        break;

    case 'kontak':
        $kontak_active = 'active';
        $page_header = 'Kontak Pesan';
        $page = 'kontak.php';
        break;
    
    default:
        $dashboard_active = 'active';
        $page_header = 'Dashboard';
        $page = 'dashboard.php';
        break;
}


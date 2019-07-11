<?php
include_once 'sistem/content.php';
if (!$_SESSION['login']) {
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | <?= $page_header ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="../assets/fonts/font-awesome/css/font-awesome.min.css">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="../assets/css/adminLTE.min.css">

    <!-- Skin -->
    <link rel="stylesheet" href="../assets/css/skins/skin-yellow.min.css">
</head>
<body class="hold-transition skin-yellow sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="index.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">J<b>C</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">Jasa<b>Cetak</b></span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Notifications Menu
                        <li class="dropdown notifications-menu">
                            Menu toggle button
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    Inner Menu: contains the notifications
                                    <ul class="menu">
                                    <li>start notification
                                        <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    end notification
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li> -->
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="../<?= $_SESSION['foto'] ?>" class="user-image" alt="<?= $_SESSION['nama'] ?>">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs"><?= $_SESSION['nama'] ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="../<?= $_SESSION['foto'] ?>" class="img-circle" alt="<?= $_SESSION['nama'] ?>">

                                    <p>
                                    <?= $_SESSION['nama'] ?>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="index.php?page=profil" class="btn btn-default btn-flat">Profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../sistem/logout.php" class="btn btn-default btn-flat">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ./Header -->

        <!-- Sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                <img src="../<?= $_SESSION['foto'] ?>" class="img-circle" alt="<?= $_SESSION['nama'] ?>">
                </div>
                <div class="pull-left info">
                <p><?= $_SESSION['nama'] ?></p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- search form (Optional) -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                    </span>
                </div>
            </form>
            <!-- /.search form -->

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN MENU</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="<?= @$dashboard_active ?>"><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                <!-- <li class="<?= @$profil_active ?>"><a href="index.php?page=profilp"><i class="fa fa-institution"></i> <span>Profil Perusahaan</span></a></li> -->
                <li class="<?= @$tentang_active ?>"><a href="index.php?page=tentang"><i class="fa fa-file-text"></i> <span>Tentang</span></a></li>
                <li class="<?= @$pk_active ?> treeview">
                    <a href="#"><i class="fa fa-cubes"></i> <span>Produk</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?= $kategori_active ?>"><a href="index.php?page=kategori">Kategori</a></li>
                        <li class="<?= $produk_active ?>"><a href="index.php?page=produk">Produk</a></li>
                    </ul>
                </li>
                <li class="<?= @$ongkir_active ?>"><a href="index.php?page=ongkir"><i class="fa fa-truck"></i> <span>Metode Pengiriman</span></a></li>
                <li class="<?= @$user_active ?>"><a href="index.php?page=user"><i class="fa fa-users"></i> <span>User</span></a></li>
                <li class="<?= @$pesanan_active ?>"><a href="index.php?page=pesanan"><i class="fa fa-list"></i> <span>Pesanan</span></a></li>
                <li class="<?= @$report_active ?>"><a href="index.php?page=report"><i class="fa fa-list-alt"></i> <span>Laporan</span></a></li>
                <li class="<?= @$testimoni_active ?>"><a href="index.php?page=testimoni"><i class="fa fa-wechat"></i> <span>Testimoni</span></a></li>
                <li class="<?= @$kontak_active ?>"><a href="index.php?page=kontak"><i class="fa fa-phone"></i> <span>Kontak</span></a></li>
            </ul>
            <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?= $page_header ?>
                </h1>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">
                <?php if (@$_SESSION['pesan']): ?>
                    <div class="alert alert-<?= $_SESSION['pesan']['status'] ?> alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?= $_SESSION['pesan']['isi'] ?>
                    </div>
                <?php endif; ?>

                <?php include_once 'views/' . $page ?>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>

    <!-- JQuery -->
    <script src="../assets/js/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- AdminLTE -->
    <script src="../assets/js/AdminLTE.min.js"></script>

    <!-- TinyMCE -->
    <script src="../assets/plugins/tinymce/tinymce.min.js"></script>
    
    <!-- DataTables -->
    <script src="../assets/plugins/datatables/datatables.min.js"></script>

    <!-- Custom -->
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();

            $('.edit-kat').click(function () {
                var dataKategori = $.parseJSON($(this).attr('data-kategori'));
                $('#idKategori').val(dataKategori.id_kategori);
                $('#namaKategori').val(dataKategori.nama_kategori);
            });

            $('.btn-hapus').click(function () {
                var dataId = $(this).attr('data-id');
                var uri = $(this).attr('data-uri');
                console.log(uri);
                var link = 'sistem/' + uri + '.php?id=' + dataId;
                $('#linkHapusKat').attr('href', link);
            });

            $('.edit-ongkir').click(function () {
                var dataOngkir = $.parseJSON($(this).attr('data-ongkir'));
                $('#id_ongkir').val(dataOngkir.id_ongkir);
                $('#nama_prov').val(dataOngkir.nama_prov);
                $('#nama_kota').val(dataOngkir.nama_kota);
                $('#nama_kec').val(dataOngkir.nama_kec);
                $('#harga').val(dataOngkir.harga);
                $('#metode').val(dataOngkir.metode);
            });

            $('.btn-detail-user').click(function () {
                var dataUserEncoded = $(this).attr('data-user');
                var jsonDataUser = atob(dataUserEncoded);
                var dataUser = $.parseJSON(jsonDataUser);

                $('.user-nama').text(dataUser.nama);
                $('.user-foto').attr('src', '../assets/img/foto/' + dataUser.foto);
                $('.user-email').text(dataUser.email);
                $('.user-telp').text(dataUser.telp);
                $('.user-alamat').text(dataUser.alamat);
                $('.user-ket').text(dataUser.keterangan);
            });

            $('.konfirm-kirim').click(function () {
                var idTransaksi = $(this).attr('data-transaksi');
                $('#id-transaksi').val(idTransaksi);
            });

            $('.btn-detail-pesanan').click(function () {
                var idTransaksi = $(this).attr('data-transaksi');
                $.ajax({
                    url: '../detail_pesanan.php',
                    method: 'GET',
                    data: {'id_transaksi': idTransaksi},
                    success: function (res) {
                        $('#detail').html(res);
                    }
                })
            });

            $('.btn-detail-transaksi').click(function () {
                var idTransaksi = $(this).attr('data-transaksi');
                $.ajax({
                    url: '../detail_transaksi.php',
                    method: 'GET',
                    data: {'id_transaksi': idTransaksi},
                    success: function (res) {
                        $('#detail-transaksi-container').html(res);
                    }
                })
            });

            $('body').on('click', '.open-file', function() {
                var filePath = $(this).attr('data-path');
                $('#file-show').attr('src', filePath);
                $('#download-file').attr('href', filePath);
            })

            $('.data-table').dataTable();

            var BASE_URL = '<?= 'http://' . $_SERVER['HTTP_HOST'] . str_replace('admin/' . basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']) ?>'; // use your own base url
            tinymce.init({
                selector: ".texteditor",
                theme: "modern",
                // width: 680,
                height: 500,
                relative_urls: false,
                remove_script_host: false,
                // document_base_url: BASE_URL,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                    "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
                ],
                toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
                toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
                image_advtab: true,
                external_filemanager_path: BASE_URL + "/assets/plugins/filemanager/",
                filemanager_title: "Media Gallery",
                external_plugins: { "filemanager": BASE_URL + "/assets/plugins/filemanager/plugin.min.js" }
            });
        });
    </script>
</body>
</html>
<?php unset($_SESSION['pesan']) ?>


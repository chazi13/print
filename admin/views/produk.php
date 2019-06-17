<?php
$query = mysqli_query($koneksi, "SELECT produk.*, kategori.nama_kategori FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori");
$no = 1;
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Daftar Katalog Produk</h3>
        <div class="box-tools pull-right">
            <a href="index.php?page=tambah_produk" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Produk</a>
        </div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped datatable">
                <thead>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Gambar Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($query)): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['nama_produk'] ?></td>
                            <td><img src="../<?= $row['gambar'] . '?timestamp=' . time() ?>" alt="" width="200"></td>
                            <td><?= $row['nama_kategori'] ?></td>
                            <td>Rp. <?= number_format($row['harga'], 0, ',', '.') ?></td>
                            <td>
                                <a href="index.php?page=edit_produk&id=<?= $row['id_produk'] ?>" class="btn btn-sm btn-primary">
                                    <i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit Kategori"></i>
                                </a>
                                <button class="btn btn-sm btn-danger btn-hapus" data-toggle="modal" data-target="#hapus-produk" data-id="<?= $row['id_produk'] ?>" data-uri="hapus_produk">
                                    <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus Kategori"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus-produk">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Konfirmasi Hapus Kategori</h4>
            </div>
            <div class="modal-body">
                <div class="callout callout-warning">
                    <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
                    <p>Yakin menghapus produk ini?</p>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <a href="" class="btn btn-danger" id="linkHapusKat">Hapus</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


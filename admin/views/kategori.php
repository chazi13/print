<?php
$query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE nama_kategori != 'Uncategorized'");
$no = 1;
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Daftar Kategori Produk</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah-kategori"><i class="fa fa-plus"></i> Tambah Kategori</button>
        </div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($query)): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['nama_kategori'] ?></td>
                            <td><img src="../<?= $row['gambar'] . '?timestamp=' . time() ?>" alt="" width="200"></td>
                            <td>
                                <button class="btn btn-sm btn-primary edit-kat" data-toggle="modal" data-target="#edit-kategori" data-kategori="<?= htmlspecialchars(json_encode($row)) ?>">
                                    <i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit Kategori"></i>
                                </button>
                                <button class="btn btn-sm btn-danger btn-hapus" data-toggle="modal" data-target="#hapus-kategori" data-id="<?= $row['id_kategori'] ?>" data-uri="hapus_kategori">
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

<div class="modal fade" id="tambah-kategori">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="sistem/tambah_kategori.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Kategori</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" placeholder="Masukan Nama Kategori" require>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar Kategori</label>
                        <input type="file" name="gambar" id="gambar" class="form-control" placeholder="Masukan Gambar Kategori">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="simpan" value="simpan" class="btn btn-primary pull-rigth">Simpan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="edit-kategori">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="sistem/edit_kategori.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Kategori</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namaKategori">Nama Kategori</label>
                        <input type="hidden" name="id_kategori" id="idKategori">
                        <input type="text" name="nama_kategori" id="namaKategori" class="form-control" placeholder="Masukan Nama Kategori" require>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar Kategori</label>
                        <input type="file" name="gambar" id="gambar" class="form-control" placeholder="Masukan Gambar Kategori">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="simpan" value="simpan" class="btn btn-primary pull-rigth">Simpan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="hapus-kategori">
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
                    <p>Menghapus kategori ini akan memengaruhi produk yang berkategori <span id="namaKat"></span>, berubah menjadi berkategori Uncategorized!</p>
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


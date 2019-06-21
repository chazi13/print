<?php
$query = mysqli_query($koneksi, "SELECT * FROM ongkir ORDER BY nama_prov ASC, nama_kota ASC, nama_kec ASC");
$no = 1;
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Daftar Derah Pengiriman</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah-ongkir"><i class="fa fa-plus"></i> Tambah Daerah</button>
        </div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <th>No</th>
                    <th>Nama Provinsi</th>
                    <th>Nama Kota</th>
                    <th>Nama Kecamatan</th>
                    <th>Metode</th>
                    <th>Biaya</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($query)): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['nama_prov'] ?></td>
                            <td><?= $row['nama_kota'] ?></td>
                            <td><?= $row['nama_kec'] ?></td>
                            <td><?= $row['metode'] ?></td>
                            <td>Rp. <?= number_format($row['harga'], 0, ',', '.') ?></td>
                            <td>
                                <button class="btn btn-sm btn-primary edit-ongkir" data-toggle="modal" data-target="#edit-ongkir" data-ongkir="<?= htmlspecialchars(json_encode($row)) ?>">
                                    <i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit Metode"></i>
                                </button>
                                <button class="btn btn-sm btn-danger btn-hapus" data-toggle="modal" data-target="#hapus-ongkir" data-id="<?= $row['id_ongkir'] ?>" data-uri="hapus_ongkir">
                                    <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus Metode"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="tambah-ongkir">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="sistem/tambah_ongkir.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Tambah Metode Daerah</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="nama_prov">Nama Provinsi</label>
                            <input type="text" name="nama_prov" class="form-control" placeholder="Masukan Nama Provinsi" require>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="nama_kota">Nama Kota</label>
                            <input type="text" name="nama_kota" class="form-control" placeholder="Masukan Nama Kota" require>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="nama_kec">Nama Kecamatan</label>
                            <input type="text" name="nama_kec" class="form-control" placeholder="Masukan Nama Kecamatan" require>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="harga">Harga</label>
                            <input type="number" name="harga" class="form-control" placeholder="Masukan Harga" require>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="metode">Metode Pengiriman</label>
                        <select name="metode" class="form-control">
                            <option disabled selected>-- Pilih Metode --</option>
                            <option value="JNE REG">JNE REG</option>
                            <option value="JNE YES">JNE YES</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="simpan" value="Simpan" class="btn btn-primary pull-rigth">Simpan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="edit-ongkir">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="sistem/edit_ongkir.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Edit Metode Daerah</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="nama_prov">Nama Provinsi</label>
                            <input type="hidden" name="id_ongkir" id="id_ongkir">
                            <input type="text" name="nama_prov" id="nama_prov" class="form-control" placeholder="Masukan Nama Provinsi" require>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="nama_kota">Nama Kota</label>
                            <input type="text" name="nama_kota" id="nama_kota" class="form-control" placeholder="Masukan Nama Kota" require>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="nama_kec">Nama Kecamatan</label>
                            <input type="text" name="nama_kec" id="nama_kec" class="form-control" placeholder="Masukan Nama Kecamatan" require>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="harga">Harga</label>
                            <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukan Harga" require>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="metode">Metode Pengiriman</label>
                        <select name="metode" id="metode" class="form-control">
                            <option disabled selected>-- Pilih Metode --</option>
                            <option value="JNE REG">JNE REG</option>
                            <option value="JNE YES">JNE YES</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="simpan" value="Simpan" class="btn btn-primary pull-rigth">Simpan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="hapus-ongkir">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Konfirmasi Hapus Metode</h4>
            </div>
            <div class="modal-body">
                <div class="callout callout-warning">
                    <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
                    <p>Yakin Hapus Daerah Ini?</p>
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

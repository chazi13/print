<?php
$query = mysqli_query($koneksi, "SELECT * FROM user");
$no = 1;
?>

<div class="box box-info">
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <th>No</th>
                    <th>Nama user</th>
                    <th>Foto</th>
                    <th>Email</th>
                    <th>Telp</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($query)): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><img src="../assets/img/foto/<?= $row['foto'] . '?timestamp=' . time() ?>" alt="" width="200"></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['telp'] ?></td>
                            <td>
                                <button class="btn btn-sm btn-primary btn-detail-user" data-toggle="modal" data-target="#detail-user" data-user="<?= base64_encode(json_encode($row)) ?>">
                                    <i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="Detail User"></i>
                                </button>
                                <button class="btn btn-sm btn-danger btn-hapus" data-toggle="modal" data-target="#hapus-user" data-id="<?= $row['id_user'] ?>" data-uri="hapus_user">
                                    <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus User"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="detail-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail Hapus</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td class="user-nama"></td>
                    </tr>
                    <tr>
                        <td>Foto</td>
                        <td>:</td>
                        <td><img src="" alt="" class="user-foto" style="height: 300px"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td class="user-email"></td>
                    </tr>
                    <tr>
                        <td>Telp</td>
                        <td>:</td>
                        <td class="user-telp"></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td class="user-alamat"></td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td class="user-ket"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="hapus-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Konfirmasi Hapus User</h4>
            </div>
            <div class="modal-body">
                <div class="callout callout-warning">
                    <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
                    <p>Menghapus user akan menghapus semua riwayat pemesanan yang telah dilakukan oleh user</p>
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


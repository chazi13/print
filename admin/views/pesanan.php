<?php
    $query = mysqli_query($koneksi, "SELECT transaksi.*, user.nama, ongkir.metode, konfirmasi_pembayaran.status AS status_pembayaran FROM transaksi JOIN user ON transaksi.id_user = user.id_user JOIN ongkir ON transaksi.metode_pengiriman = ongkir.id_ongkir LEFT JOIN konfirmasi_pembayaran ON transaksi.id_transaksi = konfirmasi_pembayaran.id_transaksi ORDER BY tgl DESC, `status` ASC");
    $no = 1;
?>

<div class="box box-info">
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered data-table">
                <thead>
                    <th>No</th>
                    <th>Pemesan</th>
                    <th>User</th>
                    <th>Tanggal</th>
                    <th>Metode Pengiriman</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($query) >= 1): ?>
                        <?php while ($row = mysqli_fetch_assoc($query)): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['kode_transaksi'] ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= date('d-F-Y H:i:s', strtotime($row['tgl'])) ?></td>
                                <td><?= $row['metode'] ?></td>
                                <td>Rp. <?= number_format($row['total'], 2, ',', '.') ?></td>
                                <td>
                                    <?php if ($row['status'] == 0): ?>
                                        <span class="badge bg-aqua">Menunggu Pembayaran</span>
                                    <?php elseif ($row['status'] == 1): ?>
                                        <span class="badge bg-yellow">Menunggu Pengerjaan</span>
                                    <?php elseif ($row['status'] == 2): ?>
                                        <span class="badge bg-blue">Pesanan Dikerjakan</span>
                                    <?php elseif ($row['status'] == 3): ?>
                                        <span class="badge bg-orange">Menunggu Konfirmasi Selesai</span>
                                    <?php elseif ($row['status'] == 4): ?>
                                        <span class="badge bg-green">Transaksi Selesai</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <button class="btn btn-sm bg-primary btn-detail-pesanan" data-toggle="modal" data-target="#detail-pesanan" data-transaksi="<?= $row['id_transaksi'] ?>">
                                        <i class="fa fa-search color-white" data-toggle="tooltip" data-placement="top" title="Detail Pesanan"></i>
                                    </button>

                                    <?php if ($row['status'] > 0 ): ?>
                                    <button class="btn btn-sm btn-info btn-detail-transaksi" data-toggle="modal" data-target="#detail-transaksi" data-transaksi="<?= $row['id_transaksi'] ?>">
                                        <i class="fa fa-file-text color-white" data-toggle="tooltip" data-placement="top" title="Detail Transaksi"></i>
                                    </button>
                                    <?php endif; ?>
                                    
                                    <?php if ($row['status'] == 1): ?>
                                    <a href="sistem/update_transaksi.php?id_transaksi=<?= $row['id_transaksi'] ?>&status=2" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Konfirmasi Pengerjaan" onclick="return confirm('Konfirmasi Pengerjaan?')">
                                        <i class="fa fa-tasks"></i>
                                    </a>
                                    <?php elseif ($row['status'] == 2): ?>
                                    <button class="btn btn-sm btn-primary konfirm-kirim" data-toggle="modal" data-target="#kirim-pesanan" data-transaksi="<?= $row['id_transaksi'] ?>">
                                        <i class="fa fa-truck color-white" data-toggle="tooltip" data-placement="top" title="Kirim Pesanan"></i>
                                    </button>
                                    <?php endif; ?>

                                    <?php if (@$row['status_pembayaran'] && $row['status_pembayaran'] == 1): ?>
                                        &nbsp;&nbsp; 
                                        <i class="fa fa-check-circle text-success" data-toggle="tooltip" data-placement="top" title="Pembayaran Telah Dikonfirmasi"></i>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="7">Tidak ada data</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="detail-pesanan" tabindex="-1" role="dialog" aria-labelledby="detail-pesananLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="detail-pesananLabel">Detail Pesanan</h4>
            </div>
            <div class="modal-body">
                <div id="detail"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detail-transaksi" tabindex="-1" role="dialog" aria-labelledby="detail-transaksiLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="detail-transaksiLabel">Detail Transaksi</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="detail-transaksi-container"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="kirim-pesanan" tabindex="-1" role="dialog" aria-labelledby="kirim-pesananLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="sistem/konfirmasi_pengiriman.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="kirim-pesananLabel">Konfirmasi Pengiriman</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="resi">No. Resi</label>
                        <input type="text" name="resi" id="resi" class="form-control" placeholder="Masukan No. Resi Pengiriman" required>
                        <input type="hidden" name="id_transaksi" id="id-transaksi">
                    </div>
                    <div class="form-group">
                        <label for="file_bukti">File Bukti</label>
                        <input type="file" name="file_bukti" id="file_bukti" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-right">Kirim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="file-viewer" tabindex="-1" role="dialog" aria-labelledby="file-viewerLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="file-viewerLabel">File</h4>
            </div>
            <div class="modal-body" style="min-height: 500px">
                <iframe src="" frameborder="0" id="file-show" style="width: 100%; min-height:500px"></iframe>
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-primary" id="download-file" target="__blank" download>Download</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


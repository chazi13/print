<?php
$query = mysqli_query($koneksi, "SELECT * FROM transaksi JOIN ongkir ON transaksi.metode_pengiriman = ongkir.id_ongkir WHERE id_user = '$_SESSION[id]'");
$no = 1;
?>

<div class="navbar-background"></div>
<section class="section" id="keranjang">
    <div class="container">
        <div class="section-header mar-bot30">
            <h2 class="section-heading text-left txt-bold text-center">Riwayat Pemesanan</h2>
        </div>

        <?php if (@$_SESSION['pesan']): ?>
            <div class="alert alert-<?= $_SESSION['pesan']['status'] ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?= $_SESSION['pesan']['isi'] ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel produk-panel">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <th>No</th>
                                    <th>Kode Transaksi</th>
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
                                                <td><?= date('d-F-Y H:i:s', strtotime($row['tgl'])) ?></td>
                                                <td><?= strtoupper(str_replace('_', ' ', $row['metode'])) ?></td>
                                                <td>Rp. <?= number_format($row['total'], 2, ',', '.') ?></td>
                                                <td>
                                                    <?php if ($row['status'] == 0): ?>
                                                        <span class="badge bg-info">Menunggu Pembayaran</span>
                                                    <?php elseif ($row['status'] == 1): ?>
                                                        <span class="badge bg-warning">Menunggu Pengerjaan</span>
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

                                                    <?php if ($row['status'] == 3 ||  $row['status'] == 4): ?>
                                                    <button class="btn btn-sm btn-info btn-detail-transaksi" data-toggle="modal" data-target="#detail-transaksi" data-transaksi="<?= $row['id_transaksi'] ?>">
                                                        <i class="fa fa-file-text color-white" data-toggle="tooltip" data-placement="top" title="Detail Transaksi"></i>
                                                    </button>
                                                    <?php endif; ?>

                                                    <?php if ($row['status'] == 0): ?>
                                                    <button class="btn btn-sm btn-warning btn-konfirmasi" data-toggle="modal" data-target="#konfirmasi-pembayaran" data-transaksi="<?= base64_encode(json_encode($row)) ?>">
                                                        <i class="fa fa-file-text color-white" data-toggle="tooltip" data-placement="top" title="Konfirmasi Pembayaran"></i>
                                                    </button>
                                                    <a href="sistem/hapus_transaksi.php?id_transaksi=<?= $row['id_transaksi'] ?>" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Batalkan Transaksi" onclick="return confirm('Batalkan dan hapus transaksi?')">
                                                        <i class="fa fa-close"></i>
                                                    </a>
                                                    <?php elseif ($row['status'] == 3): ?>
                                                    <a href="sistem/update_transaksi.php?id_transaksi=<?= $row['id_transaksi'] ?>&status=4" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Konfirmasi Selesai" onclick="return confirm('Konfirmasi Selesai?')">
                                                        <i class="fa fa-check"></i>
                                                    </a>
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
            </div>
        </div>
    </div>
</section>

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

<div class="modal fade" id="konfirmasi-pembayaran" tabindex="-1" role="dialog" aria-labelledby="konfirmasi-pembayaranLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="sistem/konfirmasi_pembayaran.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="konfirmasi-pembayaranLabel">Konfirmasi Pesanan</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_transaksi" id="id-transaksi">
                    <input type="hidden" name="total" id="total-transaksi">
                    <div class="row">
                        <div class="col-lg-5 col-sm-12">
                            <h4>Informasi Bank</h4>
                            <table class="table">
                                <tr>
                                    <th>Bank</th>
                                    <td>:</td>
                                    <td><?= $info['bank'] ?></td>
                                </tr>
                                <tr>
                                    <th>Atas Nama</th>
                                    <td>:</td>
                                    <td><?= $info['atas_nama'] ?></td>
                                </tr>
                                <tr>
                                    <th>No. Rekening</th>
                                    <td>:</td>
                                    <td><?= $info['rek'] ?></td>
                                </tr>
                                <tr>
                                    <th>Nominal Transfer</th>
                                    <td>:</td>
                                    <td><span id="total-transfer"></span></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-7 col-sm-12">
                            <h4>Informasi Transfer</h4>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="bank">Bank :</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" name="nama_bank" id="bank" class="form-control" placeholder="Masukan Nama Bank" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="nama">Nama Akun :</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" name="nama_akun" id="nama" class="form-control" placeholder="Masukan Nama Akun" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="no-rek">No Rek.</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" name="no_rek" id="no-rek" class="form-control" placeholder="Masukan No. Rekening" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4">
                                        <label for="file-bukti">Foto Bukti</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="file" name="file_bukti" id="file-bukti" class="form-control" accept="image/*" placeholder="Masukan " required>
                                    </div>
                                </div>
                            </div>
                        </div>
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

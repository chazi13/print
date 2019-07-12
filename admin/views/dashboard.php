<?php
$pesanan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(id_transaksi) AS jml FROM transaksi WHERE status < '2'"));
$pengerjaan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(id_transaksi) AS jml FROM transaksi WHERE status = '2'"));
$pengiriman = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(id_transaksi) AS jml FROM transaksi WHERE status = '3'"));
$selesai = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(id_transaksi) AS jml FROM transaksi WHERE status = '4'"));

$info = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM info_toko"));
?>

<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="fa fa-cube"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Pesanan</span>
                <span class="info-box-number"><?= $pesanan['jml'] ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-tasks"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Dikerjakan</span>
                <span class="info-box-number"><?= $pengerjaan['jml'] ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-truck"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Dikirim</span>
                <span class="info-box-number"><?= $pengiriman['jml'] ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Selesai</span>
                <span class="info-box-number"><?= $selesai['jml'] ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>

<div class="row">
    <div class="col-md-6 col-sm-12">
        <form action="sistem/info_kontak.php" method="post">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h4 class="box-title">Informasi Kontak</h4>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" name="email" value="<?= $info['email'] ?>" id="email" class="form-control" placeholder="Masukan Email">
                    </div>
                    <div class="form-group">
                        <label for="telp">Telp :</label>
                        <input type="text" name="telp" value="<?= $info['telp'] ?>" id="telp" class="form-control" placeholder="Masukan Telp">
                    </div>
                    <div class="form-group">
                        <label for="fax">Fax :</label>
                        <input type="text" name="fax" value="<?= $info['fax'] ?>" id="fax" class="form-control" placeholder="Masukan Fax">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Lengkap :</label>
                        <textarea name="alamat" id="alamat" rows="3" class="form-control" placeholder="Masukan Alamat Lengkap"><?= $info['alamat'] ?></textarea>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" name="simpan" value="simpan" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6 col-sm-12">
        <form action="sistem/info_bank.php" method="post">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">Informasi Bank Pembayaran</h4>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="bank">Nama Bank :</label>
                        <input type="text" name="bank" value="<?= $info['bank'] ?>" id="bank" class="form-control" placeholder="Masukan Nama Bank">
                    </div>
                    <div class="form-group">
                        <label for="atas_nama">Atas Nama :</label>
                        <input type="text" name="atas_nama" value="<?= $info['atas_nama'] ?>" id="atas_nama" class="form-control" placeholder="Masukan Atas Nama">
                    </div>
                    <div class="form-group">
                        <label for="rek">No. Rekening :</label>
                        <input type="text" name="rek" value="<?= $info['rek'] ?>" id="rek" class="form-control" placeholder="Masukan No. Rekening">
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" name="simpan" value="simpan" class="btn btn-primary">Simpan</button>
                </div>                
            </div>
        </form>
    </div>
    <div class="col-md-6 col-sm-12">
        <form action="sistem/info_sosmed.php" method="post">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h4 class="box-title">Informasi Sosial Media</h4>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" name="facebook" value="<?= $info['facebook'] ?>" id="facebook" class="form-control" placeholder="Masukan Link Facebook">
                    </div>
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" name="twitter" value="<?= $info['twitter'] ?>" id="twitter" class="form-control" placeholder="Masukan Link Twitter">
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="text" name="instagram" value="<?= $info['instagram'] ?>" id="instagram" class="form-control" placeholder="Masukan Link Instagram">
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" name="simpan" value="simpan" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

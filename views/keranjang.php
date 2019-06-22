<?php
$query = mysqli_query($koneksi, "SELECT * FROM keranjang JOIN produk ON keranjang.id_produk = produk.id_produk WHERE id_user = '$_SESSION[id]'");
$subtotal = 0;

$pengiriman = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$_SESSION[id]'"));
$query_prov = mysqli_query($koneksi, "SELECT nama_prov FROM ongkir GROUP BY nama_prov");
$query_kota = mysqli_query($koneksi, "SELECT nama_kota FROM ongkir WHERE nama_prov LIKE '%$pengiriman[provinsi]%' GROUP BY nama_kota");
$query_kec = mysqli_query($koneksi, "SELECT nama_kec FROM ongkir WHERE nama_kota LIKE '%$pengiriman[kota]%' GROUP BY nama_kec");
$metode = mysqli_query($koneksi, "SELECT id_ongkir, harga, metode FROM ongkir WHERE nama_kec LIKE '%$pengiriman[kecamatan]%'");
?>

<div class="navbar-background"></div>
<section class="section" id="keranjang">
    <div class="container">
        <?php if (@$_SESSION['pesan']): ?>
            <div class="alert alert-<?= $_SESSION['pesan']['status'] ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?= $_SESSION['pesan']['isi'] ?>
            </div>
        <?php endif; ?>

        <form action="sistem/tambah_transaksi.php" method="post">
            <div class="row">
                <div class="col-md-7 col-sm-12">
                    <div class="section-header">
                        <h4 class="section-heading text-left txt-bold">Pengiriman</h4>
                    </div>

                    <div class="panel">
                        <div class="panel-body">
                            <div class="form-group row">
                                <label class="col-sm-4" for="provinsi">Pilih Provinsi</label>
                                <div class="col-sm-8">
                                    <select name="provinsi" id="provinsi" class="form-control" data-term="nama_prov" data-target="nama_kota" sectar="kota">
                                        <option value="" disabled selected>-- Pilih Provinsi --</option>
                                        <?php while ($rp = mysqli_fetch_assoc($query_prov)): ?>
                                            <option value="<?= $rp['nama_prov'] ?>" <?= ($rp['nama_prov'] == $pengiriman['provinsi']) ? 'selected' : '' ?>><?= $rp['nama_prov'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4" for="kota">Pilih Kota</label>
                                <div class="col-sm-8">
                                    <select name="kota" id="kota" class="form-control" data-term="nama_kota" data-target="nama_kec" sectar="kecamatan">
                                        <option value="" disabled selected>-- Pilih Kota --</option>
                                        <?php while ($rko = mysqli_fetch_assoc($query_kota)): ?>
                                            <option value="<?= $rko['nama_kota'] ?>" <?= ($rko['nama_kota'] == $pengiriman['kota']) ? 'selected' : '' ?>><?= $rko['nama_kota'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4" for="kecamatan">Pilih Kecamatan</label>
                                <div class="col-sm-8">
                                    <select name="kecamatan" id="kecamatan" class="form-control" data-term="nama_kec" data-target="metode" sectar="metode">
                                        <option value="" disabled selected>-- Pilih Kecamatan --</option>
                                        <?php while ($rke = mysqli_fetch_assoc($query_kec)): ?>
                                            <option value="<?= $rke['nama_kec'] ?>" <?= ($rke['nama_kec'] == $pengiriman['kecamatan']) ? 'selected' : '' ?>><?= $rke['nama_kec'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4" for="Alamat">Alamat Lengkap</label>
                                <div class="col-sm-8">
                                    <textarea name="alamat" id="alamat" rows="3" class="form-control" placeholder="Alamat Lengkap"><?= $pengiriman['alamat'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4" for="metode">Pilih Metode</label>
                                <div class="col-sm-8">
                                    <select name="metode" id="metode" class="form-control">
                                        <option value="" disabled selected>-- Pilih Metode --</option>
                                        <?php while ($rm = mysqli_fetch_assoc($metode)): ?>
                                            <option value="<?= $rm['id_ongkir'] ?>" data-harga="<?= $rm['harga'] ?>"><?= $rm['metode'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="panel-body">
                            <h4>Alamat Pengiriman</h4>
                            <dd><?= $pengiriman['alamat'] ?></dd>
                            <hr>

                            <h4>Metode Pengiriman</h4>
                            <div class="list-group">
                                <div class="list-group-item">
                                    <input type="radio" name="metode" value="pick_up" id="pickup" class="pay-method" data-harga="0"> 
                                    <label for="pickup">Pick Up </label> <span class="text-right txt-bold pull-right" style="text-align: right; color: #333 !important;">Rp. 0 (FREE)</span>
                                </div>
                                <div class="list-group-item">
                                    <input type="radio" name="metode" value="jne_reg" id="jnereg" class="pay-method" data-harga="9000"> 
                                    <label for="jnereg">JNE REG </label> <span class="text-right txt-bold pull-right" style="text-align: right; color: #333 !important;">Rp. 9.000</span>
                                </div>
                                <div class="list-group-item">
                                    <input type="radio" name="metode" value="jne_yes" id="jneyes" class="pay-method" data-harga="18000"> 
                                    <label for="jneyes">JNE YES </label> <span class="text-right txt-bold pull-right" style="text-align: right; color: #333 !important;">Rp. 18.000</span>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <div class="section-header">
                        <h4 class="section-heading text-left txt-bold">Detail Pesanan</h4>
                    </div>
                    <div class="panel">
                        <div class="panel-body">
                            <div class="list-group kat-list">
                                <?php while ($p = mysqli_fetch_assoc($query)): $ptotal = $p['jml_pesan'] * $p['harga']; ?>
                                    <div class="produk-desc list-group-item">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h5 class="produk-title"><?= $p['nama_produk'] ?></h5>
                                                <dl>
                                                    <dd><?= $p['jml_pesan'] . ' x ' . number_format($p['harga'], 0, ',', '.') . ' @ Rp.' . number_format($ptotal, 0, ',', '.') ?></dd>
                                                    <?php if ($p['desain'] == 1): ?>
                                                    <dd><?php $ptotal += 60000 ?>Biaya design Rp. 60.000</dd>
                                                    <?php endif; ?>
                                                    <?php if ($p['catatan']): ?>
                                                    <dd>Note: <?= $p['catatan'] ?></dd>
                                                    <?php endif; ?>
                                                </dl>
                                            </div>
                                            <div class="col-sm-6 text-right pull-right">
                                                <a href="sistem/hapus_keranjang.php?id_keranjang=<?= $p['id_keranjang'] ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus pesanan?')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <h5 class="produk-title mar-top20">
                                                    Rp <span><?= number_format($ptotal, 0, ',', '.') ?></span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                <?php $subtotal += $ptotal; endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <div class="section-header">
                        <h4 class="section-heading text-left txt-bold">Ringkasan Pesanan</h4>
                    </div>

                    <div class="panel">
                        <div class="panel-body">
                            <div class="list-group kat-list">
                                <div class="list-group-item">
                                    <dt class="txt-bold">
                                        Subtotal
                                        <span class="text-right pull-right">Rp. <?= number_format($subtotal, 0, ',', '.') ?></span>
                                    </dt>
                                    <input type="hidden" name="subtotal" id="subtotal" value="<?= $subtotal ?>">
                                </div>
                                <div class="list-group-item">
                                    <dt class="txt-bold">
                                        Pengiriman
                                        <span class="text-right pull-right pengiriman">Rp -</span>
                                    </dt>
                                    <input type="hidden" name="pengiriman" id="pengiriman">
                                </div>
                            </div>

                            <h4 class="txt-bold">
                                Total
                                <span class="text-right pull-right total">Rp -</span>
                            </h4>
                            <input type="hidden" name="total" id="total">

                            <div class="mar-top20">
                                <button type="submit" name="kirim" value="kirim" class="btn btn-get-started btn-block">Bayar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

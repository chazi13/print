<?php


?>

<div class="box box-info">
    <form action="print_laporan.php" method="post" target="__blank">
        <div class="box-header with-border">
            <h3 class="box-title">Cetak Laporan</h3>
        </div>
        <div class="box-body">
            <div class="form-group row">
                <div class="col-md-2"><label for="status">Status :</label></div>
                <div class="col-md-10">
                    <select name="status" id="status" class="form-control">
                        <option value="">-- Pilih Status Pesanan --</option>
                        <option value="0">Menunggu Pembayaran</option>
                        <option value="1">Menunggu Pengerjaan</option>
                        <option value="2">Dikerjakan</option>
                        <option value="3">Dikirim</option>
                        <option value="4">Selesai</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2"><label for="bulan/tahun">Bulan / Tahun :</label></div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-4">
                            <select name="bulan" id="bulan" class="form-control">
                                <option value="">-- Pilih Bulan --</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="tahun" id="tahun" class="form-control">
                                <option value="">-- Pilih Tahun --</option>
                                <?php for ($i= (date('Y') - 5); $i < (date('Y') + 5); $i++): ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2"><label for="awal">Tanggal :</label></div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-2">
                            <select name="awal" id="awal" class="form-control">
                                <option value="">Awal</option>
                                <?php for ($i= 1; $i <= 31; $i++): ?>
                                    <option value="<?= ($i < 10) ? '0' . $i : $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-md-1 text-center" style="padding-top: 10px">
                            <label for="akhir">Sampai</label>
                        </div>
                        <div class="col-md-2">
                            <select name="akhir" id="akhir" class="form-control">
                                <option value="">Akhir</option>
                                <?php for ($i= 1; $i <= 31; $i++): ?>
                                    <option value="<?= ($i < 10) ? '0' . $i : $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-success">Cetak</button>
        </div>
    </form>
</div>

<?php
$query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE nama_kategori != 'Uncategorized'");
?>

<div class="box box-info">
    <form action="sistem/tambah_produk.php" method="post" enctype="multipart/form-data">
        <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Produk</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk :</label>
                        <input type="text" name="nama_produk" id="nama_produk" class="form-control" placeholder="Masukan Nama Produk" required>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="kategori">kategori :</label>
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="" disabled selected>-- Pilih Kategori --</option>
                            <?php while ($row = mysqli_fetch_assoc($query)): ?>
                                <option value="<?= $row['id_kategori'] ?>"><?= $row['nama_kategori'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="gambat">Gambar Produk :</label>
                        <input type="file" name="gambar" id="gambar" class="form-control" placeholder="Masukan Gambar Produk">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="harga">Harga Produk :</label>
                        <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukan Harga Produk" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan :</label>
                <textarea name="keterangan" id="keterangan" rows="5" class="form-control" placeholder="Masukan Keterangan"></textarea>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" name="simpan" value="simpan" class="btn btn-primary" style="margin-left: 5px;">Simpan <i class="fa fa-save"></i></button> 
            <button type="reset" class="btn btn-danger pull-left">Kosongkan <i class="fa fa-refresh"></i></button>
        </div>
    </form>
</div>
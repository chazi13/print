<?php
$tentang = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tentang"));
?>

<div class="box box-info">
    <form action="sistem/input_tentang.php" method="post">
        <div class="box-body">
            <div class="form-group">
                <label for="tentang">Tentang Toko :</label>
                <textarea name="tentang" id="tentang" cols="30" rows="50" class="texteditor"><?= base64_decode($tentang['text']) ?></textarea>
            </div>
        </div>
        <div class="box-footer text-right">
            <button type="submit" name="simpan" value="simpan" class="pull-right btn btn-success">Simpan</button>
        </div>
    </form>
</div>
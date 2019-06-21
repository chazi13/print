<?php
$tentang = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tentang"));
?>

<div class="navbar-background"></div>
<section id="kategori" class="section" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row mar-bot20">
            <div class="col-sm-12">
                <?= base64_decode($tentang['text']) ?>
            </div>
        </div>
    </div>
</section>
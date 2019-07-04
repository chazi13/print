<?php
$query_produk = mysqli_query($koneksi, "SELECT * FROM kategori WHERE gambar != '' LIMIT 0, 5");
$query_testi = mysqli_query($koneksi, "SELECT testimoni.pesan, user.nama, user.foto FROM testimoni JOIN user ON testimoni.id_user = user.id_user WHERE status = '1'");
?>

<section id="intro">
  <div class="flexslider banner-slider">
      <ul class="slides">
          <li>
              <div class="banner">
                  <img src="assets/img/banner/img1.jpg">
                  <div class="banner-content">
                      <!-- <h2>Selamat Datang</h2>
                      <h3>Vlava</h3> -->
                  </div>
              </div>
          </li>
          <li>
              <div class="banner">
                  <img src="assets/img/banner/img2.jpg">
                  <div class="banner-content">
                      <!-- <h2>Selamat Datang</h2>
                      <h3>Vlava</h3> -->
                  </div>
              </div>
          </li>
      </ul>
  </div>
</section>

<!-- services -->
<section id="section-services" class="section pad-bot30 bg-white">
  <div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="section-header">
                <h2 class="section-heading animated text-center" data-animation="bounceInUp">Layanan</h2>
            </div>
        </div>
    </div>

    <div class="row mar-bot40">
      <div class="col-lg-4">
        <div class="hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a mar-top20">
          <div class="float-left mar-right20">
            <a href="#" class="hi-icon hi-icon-user">user</a>
          </div>
        </div>
        <h3 class="text-bold">Tenaga Ahli</h3>
        <p>Kami mengandalkan tenaga ahli yang berpengalaman di bidang digital Printing & Advertising.</p>

        <div class="clear"></div>
      </div>

      <div class="col-lg-4">
        <div class="hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a mar-top20">
          <div class="float-left mar-right20">
            <a href="#" class="hi-icon hi-icon-star">star</a>
          </div>
        </div>
        <h3 class="text-bold">Pelayanan Profesional</h3>
        <p>Kita mengutamakan kenyamanan dan kepuasan Customer.</p>

        <div class="clear"></div>
      </div>

      <div class="col-lg-4">
        <div class="hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a mar-top20">
          <div class="float-left mar-right20">
            <a href="#" class="hi-icon hi-icon-support">support</a>
          </div>
        </div>
        <h3 class="text-bold">Pelayanan Baik</h3>
        <p>Kami selalu siap melayani apabila ada pertanyaan maupun kendala.</p>

        <div class="clear"></div>
      </div>

    </div>
    <div class="row mar-top0">
      <div class="col-lg-4">
        <div class="hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a mar-top20">
          <div class="float-left mar-right20">
            <a href="#" class="hi-icon hi-icon-archive">archive</a>
          </div>
        </div>
        <h3 class="text-bold">Keterampilan teknis</h3>
        <p>Kami memiliki tenaga ahli yang siap membantu jika ada kendala yang perlu di tanyakan.</p>

        <div class="clear"></div>
      </div>

      <div class="col-lg-4">
        <div class="hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a mar-top20">
          <div class="float-left mar-right20">
            <a href="#" class="hi-icon hi-icon-bookmark">bookmark</a>
          </div>
        </div>
        <h3 class="text-bold">Direkomendasikan</h3>
        <p>Karena kami siap melayani anda dengan kepuasan, kenyamanan, kualitas dan kuantitas.</p>

        <div class="clear"></div>
      </div>

      <div class="col-lg-4">
        <div class="hi-icon-wrap hi-icon-effect-5 hi-icon-effect-5a mar-top20">
          <div class="float-left mar-right20">
            <a href="#" class="hi-icon hi-icon-chat">positif</a>
          </div>
        </div>
        <h3 class="text-bold">Ulasan Positif</h3>
        <p>Banyak testimoni dari customer kami yang puas atas pelayanan dan kinerja kami.</p>

        <div class="clear"></div>
      </div>

    </div>
  </div>
</section>

<!-- kategori produk -->
<section id="kategori" class="section" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row mar-bot30">
        <div class="col-md-6 col-md-offset-3">
            <div class="section-header">
                <h2 class="section-heading animated text-center" data-animation="bounceInUp">Produk</h2>
                <p>Silahkan ajukan pertanyaan seputar Ruangprint dan kami akan merespon setiap pertanyaan dari Anda dan pihak lainnya sesegera mungkin.</p>
            </div>
        </div>
    </div>

    <div class="row">
        <?php while ($pr = mysqli_fetch_assoc($query_produk)): ?>
          <div class="col-lg-4">
              <a href="index.php?page=produk&kat=<?= $pr['nama_kategori'] ?>" class="kategori-link">
                <div class="panel kategori-produk">
                    <div class="panel-body">
                        <img src="<?= $pr['gambar'] ?>" alt="" class="kat-img">
                    </div>
                </div>
              </a>
          </div>
        <?php endwhile; ?>
        <div class="col-lg-4">
            <a href="index.php?page=produk&kat=" class="kategori-link">
              <div class="panel kategori-produk">
                  <div class="panel-body">
                      <img src="assets/img/kat/all.png" alt="" class="kat-img">
                  </div>
              </div>
            </a>
        </div>
    </div>
  </div>
</section>

<!-- spacer section:testimonial -->
<section id="testimonials" class="section" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="align-center">
          <div class="flexslider testimonials-slider">
            <ul class="slides">
              <?php while ($rt = mysqli_fetch_assoc($query_testi)): ?>
                <li>
                  <div class="testimonial clearfix">
                    <div class="mar-bot20">
                      <img alt="" src="assets/img/foto/<?= $rt['foto'] ?>" class="img-circle" style="width: 150px;">
                    </div>
                    <i class="fa fa-quote-left fa-2x"></i>
                    <h5>
                        <?= $rt['pesan'] ?>
                    </h5>
                    <br/>
                    <span class="author">&mdash; <?= $rt['nama'] ?></span>
                  </div>
                </li>
              <?php endwhile; ?>
            </ul>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

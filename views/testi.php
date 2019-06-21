<?php
if($_SESSION['login'] && $_SESSION['level'] == 'user') {
    $check_testi = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(id_transaksi) AS jml_transaksi FROM transaksi WHERE id_user = '$_SESSION[id]' AND status = '4'"));
    // echo "SELECT COUNT(id_transaksi) AS jml_transaksi FROM transaksi WHERE id_user = '$_SESSION[id]' AND status = '4'";
}
?>

<div class="navbar-background"></div>
<section id="kategori" class="section" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row mar-bot20">
            <div class="col-md-6 col-md-offset-3">
                <div class="section-header">
                    <h2 class="section-heading text-center">Testimoni</h2>
                    <p>Keteragan halaman testimoni</p>
                </div>
            </div>
        </div>
        <div class="row mar-bot20">
            <div class="align-center">
                <div class="flexslider testimonials-slider">
                    <ul class="slides">
                        <li>
                            <div class="row bg-dark pad-top10 pad-bot-10">
                                <div class="container">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="panel clearfix">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <img alt="" src="assets/img/testimonial/testimonial1.png" class="img-circle">
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <i class="fa fa-quote-left"></i>
                                                        <h5>
                                                            Nunc velit risus, dapibus non interdum quis, suscipit nec dolor. Vivamus tempor tempus mauris vitae fermentum.
                                                        </h5>
                                                        <br/>
                                                        <span class="author">&mdash; SARAH DOE <a href="#">www.siteurl.com</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-12">
                                        <div class="panel clearfix">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <img alt="" src="assets/img/testimonial/testimonial1.png" class="img-circle">
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <i class="fa fa-quote-left"></i>
                                                        <h5>
                                                            Nunc velit risus, dapibus non interdum quis, suscipit nec dolor. Vivamus tempor tempus mauris vitae fermentum.
                                                        </h5>
                                                        <br/>
                                                        <span class="author">&mdash; SARAH DOE <a href="#">www.siteurl.com</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="panel clearfix">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <img alt="" src="assets/img/testimonial/testimonial1.png" class="img-circle">
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <i class="fa fa-quote-left"></i>
                                                        <h5>
                                                            Nunc velit risus, dapibus non interdum quis, suscipit nec dolor. Vivamus tempor tempus mauris vitae fermentum.
                                                        </h5>
                                                        <br/>
                                                        <span class="author">&mdash; SARAH DOE <a href="#">www.siteurl.com</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="panel clearfix">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <img alt="" src="assets/img/testimonial/testimonial1.png" class="img-circle">
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <i class="fa fa-quote-left"></i>
                                                        <h5>
                                                            Nunc velit risus, dapibus non interdum quis, suscipit nec dolor. Vivamus tempor tempus mauris vitae fermentum.
                                                        </h5>
                                                        <br/>
                                                        <span class="author">&mdash; SARAH DOE <a href="#">www.siteurl.com</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="row bg-dark pad-top10 pad-bot-10">
                                <div class="container">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="panel clearfix">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <img alt="" src="assets/img/testimonial/testimonial2.png" class="img-circle">
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <i class="fa fa-quote-left"></i>
                                                        <h5>
                                                            Nunc velit risus, dapibus non interdum quis, suscipit nec dolor. Vivamus tempor tempus mauris vitae fermentum.
                                                        </h5>
                                                        <br/>
                                                        <span class="author">&mdash; NICOLE DOE <a href="#">www.siteurl.com</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-12">
                                        <div class="panel clearfix">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <img alt="" src="assets/img/testimonial/testimonial2.png" class="img-circle">
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <i class="fa fa-quote-left"></i>
                                                        <h5>
                                                            Nunc velit risus, dapibus non interdum quis, suscipit nec dolor. Vivamus tempor tempus mauris vitae fermentum.
                                                        </h5>
                                                        <br/>
                                                        <span class="author">&mdash; NICOLE DOE <a href="#">www.siteurl.com</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="panel clearfix">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <img alt="" src="assets/img/testimonial/testimonial2.png" class="img-circle">
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <i class="fa fa-quote-left"></i>
                                                        <h5>
                                                            Nunc velit risus, dapibus non interdum quis, suscipit nec dolor. Vivamus tempor tempus mauris vitae fermentum.
                                                        </h5>
                                                        <br/>
                                                        <span class="author">&mdash; NICOLE DOE <a href="#">www.siteurl.com</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="panel clearfix">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <img alt="" src="assets/img/testimonial/testimonial2.png" class="img-circle">
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <i class="fa fa-quote-left"></i>
                                                        <h5>
                                                            Nunc velit risus, dapibus non interdum quis, suscipit nec dolor. Vivamus tempor tempus mauris vitae fermentum.
                                                        </h5>
                                                        <br/>
                                                        <span class="author">&mdash; NICOLE DOE <a href="#">www.siteurl.com</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row bg-dark pad-top10 pad-bot-10">
                                <div class="container">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="panel clearfix">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <img alt="" src="assets/img/testimonial/testimonial3.png" class="img-circle">
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <i class="fa fa-quote-left"></i>
                                                        <h5>
                                                            Nunc velit risus, dapibus non interdum quis, suscipit nec dolor. Vivamus tempor tempus mauris vitae fermentum.
                                                        </h5>
                                                        <br/>
                                                        <span class="author">&mdash; DASON KRUN <a href="#">www.siteurl.com</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-12">
                                        <div class="panel clearfix">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <img alt="" src="assets/img/testimonial/testimonial3.png" class="img-circle">
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <i class="fa fa-quote-left"></i>
                                                        <h5>
                                                            Nunc velit risus, dapibus non interdum quis, suscipit nec dolor. Vivamus tempor tempus mauris vitae fermentum.
                                                        </h5>
                                                        <br/>
                                                        <span class="author">&mdash; DASON KRUN <a href="#">www.siteurl.com</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="panel clearfix">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <img alt="" src="assets/img/testimonial/testimonial3.png" class="img-circle">
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <i class="fa fa-quote-left"></i>
                                                        <h5>
                                                            Nunc velit risus, dapibus non interdum quis, suscipit nec dolor. Vivamus tempor tempus mauris vitae fermentum.
                                                        </h5>
                                                        <br/>
                                                        <span class="author">&mdash; DASON KRUN <a href="#">www.siteurl.com</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="panel clearfix">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <img alt="" src="assets/img/testimonial/testimonial3.png" class="img-circle">
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <i class="fa fa-quote-left"></i>
                                                        <h5>
                                                            Nunc velit risus, dapibus non interdum quis, suscipit nec dolor. Vivamus tempor tempus mauris vitae fermentum.
                                                        </h5>
                                                        <br/>
                                                        <span class="author">&mdash; DASON KRUN <a href="#">www.siteurl.com</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if($_SESSION['login'] && $_SESSION['level'] == 'user' && $check_testi['jml_transaksi'] > 0): ?>
<section class="section" id="give-testi">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel">
                    <form action="sistem/tambah_testi.php" method="post">
                        <div class="panel-body">
                            <div class="section-header">
                                <h2 class="section-heading text-center">Berikan Testimoni</h2>
                                <!-- <p>Keteragan halaman testimoni</p> -->
                            </div>
                            <div class="form-group mar-top30">
                                <textarea name="pesan" id="pesan" cols="30" rows="10" class="form-control" placeholder="Masukan Testimoni"></textarea>
                            </div>
                            <button class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

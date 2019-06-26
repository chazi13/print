(function($) {
  $('.scrollup').click(function() {
    $("html, body").animate({
      scrollTop: 0
    }, 1000);
    return false;
  });

  // local scroll
  jQuery('.navbar').localScroll({
    hash: true,
    offset: {
      top: 0
    },
    duration: 800,
    easing: 'easeInOutExpo'
  });

  // intro
  jQuery('.banner-slider').flexslider({
    animation: "slide",
    directionNav: true,
    controlNav: true,
    pauseOnHover: true,
    slideshowSpeed: 4000,
    direction: "horizontal" //Direction of slides
  });

  // $(".navbar-collapse a").on('click', function() {
  //   $(".navbar-collapse").removeClass('in');
  //   $(".navbar-collapse").addClass('collapse');
  // });

  //testimonial
  jQuery('.testimonials-slider').flexslider({
    animation: "slide",
    directionNav: true,
    controlNav: true,
    pauseOnHover: true,
    slideshowSpeed: 4000,
    direction: "horizontal" //Direction of slides
  });

  if (Modernizr.mq("screen and (max-width:1024px)")) {
    jQuery("body").toggleClass("body");

  } else {
    var s = skrollr.init({
      mobileDeceleration: 1,
      edgeStrategy: 'set',
      forceHeight: true,
      smoothScrolling: true,
      smoothScrollingDuration: 300,
      easing: {
        WTF: Math.random,
        inverted: function(p) {
          return 1 - p;
        }
      }
    });
  }

  //parallax
  var isMobile = false;

  if (Modernizr.mq('only all and (max-width: 1024px)')) {
    isMobile = true;
  }

  /* Fungsi formatRupiah */
  function formatRupiah(angka){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return 'Rp. ' + rupiah;
  }

  $('#metode').change(function () {
    var biayaPengiriman = $('option:selected', this).attr('data-harga');
    var subtotal = $('#subtotal').val();
    var total = parseInt(biayaPengiriman) + parseInt(subtotal);

    console.log(total);

    $('.pengiriman').text(formatRupiah(biayaPengiriman.toString()));
    $('.total').text(formatRupiah(total.toString()));
    
    $('#pengiriman').val(biayaPengiriman);
    $('#total').val(total);
  });

  $('.modal').modal('hide');
  $('[data-toggle="tooltip"]').tooltip();

  $('.btn-konfirmasi').click(function () {
    var dataJson = atob($(this).attr('data-transaksi'));
    var dataTransaksi = $.parseJSON(dataJson);

    $('#id-transaksi').val(dataTransaksi.id_transaksi);
    $('#total-transfer').text(formatRupiah(dataTransaksi.total));
    $('#total-transaksi').val(dataTransaksi.total);
  });

  $('.btn-detail-pesanan').click(function () {
    var idTransaksi = $(this).attr('data-transaksi');
    console.log(idTransaksi);
    $.ajax({
      url: 'detail_pesanan.php',
      method: 'GET',
      data: {'id_transaksi': idTransaksi},
      success: function (res) {
        $('#detail').html(res);
      }
    })
  });

  $('.btn-detail-transaksi').click(function () {
    var idTransaksi = $(this).attr('data-transaksi');
    $.ajax({
      url: 'detail_transaksi.php',
      method: 'GET',
      data: {'id_transaksi': idTransaksi},
      success: function (res) {
        $('#detail-transaksi-container').html(res);
      }
    })
  });

  $('#provinsi, #kota, #kecamatan').change(function () {
    var term = $(this).attr('data-term');
    var val = $(this).val();
    var target = $(this).attr('data-target');
    var sectar = $(this).attr('sectar');
    var data = {
      "term": term,
      "val": val,
      "target": target
    }

    $.ajax({
      url: 'wilayah.php',
      data: data,
      method: 'GET',
      success: function(res) {
        $('#' + sectar).removeAttr('disabled');
        $('#' + sectar).html(res);
      }
    })
  });

  $('#pesan').keyup(function(e) {
    if ($(this).get(0).selectionStart == 1) {
      $(this).val(e.key.toUpperCase());
    }
  })
})(jQuery);

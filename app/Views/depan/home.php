<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Desa UMKM Mangliawan</title>
    <!-- FONT DARI GOOGLE -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
      rel="preconnect"
      href="https://fonts.gstatic.com"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,700;1,100;1,900&display=swap"
      rel="stylesheet"
    />
    <!-- bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('desamangliawan') ?>/assets\bootstrap\css\bootstrap.min.css" />
    <!-- font awesome icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script
      src="https://kit.fontawesome.com/76ebf641a4.js"
      crossorigin="anonymous"
    ></script>
    <!-- feather icos -->

    <!-- my style -->
    <link rel="stylesheet" href="<?php echo base_url('desamangliawan') ?>/css/style.css" />
    <link
      rel="stylesheet"
      href="<?php echo base_url('desamangliawan') ?>/assets\owl.caraousel\assets\owl.carousel.min.css"
    />
    <link
      rel="stylesheet"
      href="<?php echo base_url('desamangliawan') ?>/assets\owl.caraousel\assets\owl.theme.default.css"
    />
  </head>
  <body>
    <!-- NAVBAR SECTION -->
    <header>
      <div class="navbarfix">
        <div class="containerfix">
          <div class="box-navbar">
            <div class="logofix">
              <a href="<?php echo site_url('Home')?>" class="navbar-logo1"
                ><img src="<?php echo base_url('desamangliawan') ?>/img/logodesa.png" alt=""
              /></a>
            </div>
            <ul class="menufix">
              <li class="active"><a href="<?php echo site_url('Home')?>">Home</a></li>
              <li><a href="<?php echo site_url('Home/pendaftaran')?>">Pendaftaran</a></li>
              <li><a href="<?php echo site_url('Home/contact')?>">Hubungi Kami</a></li>
            </ul>
            <i class="fa-solid fa-bars menu-bar"></i>
          </div>
        </div>
      </div>

      <div class="hero">
        <div class="owl-carousel owl-theme" id="slider2">
          <div class="item">
            <div class="container">
              <div class="box-hero">
                <div class="box">
                  <h1>
                    Meyediakan Daftar UMKM <br />
                    yang ada di Desa Mangliawan
                  </h1>
                  <p>
                    Tertarik ingin daftar UMKM ? KLIK link dibawah ini
                  </p>
                  <a href="<?php echo site_url('Home/pendaftaran')?>"><button>Daftar</button></a>
                </div>
                <div class="box">
                  <img src="<?php echo base_url('desamangliawan') ?>/img/utk hero.png" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- NAVBAR SECTION END -->
    <div class="services" id="services">
      <div class="container">
        <div class="box-services">
          <div class="box">
            <i class="fa-solid fa-user-plus"></i>
            <h4>Pendaftaran UMKM</h4>
            <p>Daftarkan UMKM anda pada halaman pendaftaran</p>
          </div>
          <div class="box">
            <i class="fa-solid fa-list"></i>
            <h4>List UMKM</h4>
            <p>Mari lihat UMKM apa saja yang ada di Desa Mangliawan</p>
          </div>
          <div class="box">
            <i class="fa-solid fa-message"></i>
            <h4>Contact UMKM</h4>
            <p>Berminat dengan produk UMKM ? Cek detailnya</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Services -->
    <!-- SECTION ABOUT -->
    <section class="about1" id="about1">
      <h2>Tentang <span>Kami</span></h2>
      <div class="about1-content">
        <div class="container">
          <div class="row">
            <div class="col-md-12"></div>
            <div class="col-md-6">
              <div class="right-image">
                <img src="<?php echo base_url('desamangliawan') ?>/img/desaa.jpg" alt="" />
              </div>
            </div>
            <div class="col-md-6">
              <h4>Tentang Website</h4>
              <p>
                Website ini adalah platform yang menghubungkan antara produsen
                lokal yang berbakat dari Desa Mangliawan dengan konsumen yang
                ingin mendukung produk-produk berkualitas dan beragam. Kami
                hadir sebagai jembatan untuk mempererat hubungan antara
                komunitas produsen dan para pecinta produk lokal, serta sebagai
                sumber informasi terkini tentang event dan berita terkait Desa
                Mangliawan.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- SECTION ABOUT END-->
    <!-- section umkm list -->
    <section id="umkm" class="umkm">
      <div class="container">
        <h2>UMKM<span> Kami</span></h2>
        <div class="productsumkm">
          <div class="row">
            <div class="col-md-12">
              <div class="row display-flex">
              <?php
                                foreach ($record as $value) {
                                  $nama_toko = $value['nama_toko'];
                                  $link_detail = site_url("Home/detail/$nama_toko");
                                ?>
                <div class="col-lg-4 col-md-4">
                  <div class="product-itemumkm">
                    <div class="umkm-container">
                    <img src="<?php echo base_url(LOKASI_UPLOAD . "/" . $value['post_thumbnail']) ?>" alt="Foto<?php echo $nama_toko ?>  " />
                      <div class="hover-effect">
                        <div class="hover-content">
                          <ul class="social-icons">
                            <li>
                              <a
                                href="<?php echo $link_detail ?>"
  
                              >
                                <i class="fa fa-eye"> </i
                              ></a>
                            </li>
                            <li>
                              <a href="#"><i class="fa fa-whatsapp"></i></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="down-content">
                      <a href="#"><h3><?php echo $value['nama_toko'] ?></h3></a>
                      <p><?php echo $value['jenis_umkm'] ?></p>
                    </div>
                  </div>
                </div>
                <?php
                                
                                }
                                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
                       echo $pager->links('dt','pager') 
                       ?>
    </section>
    <section class="daftar">
     <div class="daftar" id="daftar">
      <div class="container">
        <div class="box-daftar">
          <h1>
            Daftarkan UMKM Anda<br />
            Bagi warga Desa Mangliawan
          </h1>
          <h3>Klik Link di Bawah Ini!</h3>
          <button><a href="<?php echo site_url('Home/pendaftaran')?>">PENDAFTARAN</a></button>
        </div>
      </div>
    </div>
    </section>
    <!-- Footer start -->
    <footer>
      <div class="socials">
        <a href="#"><i data-feather="instagram"></i></a>
        <a href="#"><i data-feather="twitter"></i></a>
        <a href="#"><i data-feather="facebook"></i></a>
      </div>

      <div class="links">
        <a href="index.html">Home</a>
        <a href="pendaftaran.html">Pendaftaran</a>
        <a href="contact.html">Hubungi Kami</a>
      </div>

      <div class="credit">
        <p>
          Created by <a href="">Dwiki Adi Yuri</a>|Program Pengabdian Masyarakat
          UMM &copy;2023.
        </p>
      </div>
    </footer>
    <!-- Footer end -->
    <!-- section umkm list end-->
    <!-- my script -->
    <script>
      feather.replace();
    </script>
    <script src="<?php echo base_url('desamangliawan') ?>/js/script.js"></script>
    <!-- bootstrap js -->
    <script src="<?php echo base_url('desamangliawan') ?>/assets/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('desamangliawan') ?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- owl caraousel -->
    <script src="<?php echo base_url('desamangliawan') ?>/assets/owl.caraousel/owl.carousel.min.js"></script>

    <script src="<?php echo base_url('desamangliawan') ?>/js/accord.js"></script>
    <script src="<?php echo base_url('desamangliawan') ?>/js/custom.js"></script>
    <script>
      $("#slider2").owlCarousel({
        loop: true,
        margin: 10,
        dots: true,
        nav: false,
        autoplay: true,
        autoplayTimeout: 5000,
        navText: [
          "<i class='fa fa-angle-left'></i>",
          "<i class='fa fa-angle-right'></i>",
        ],
        responsive: {
          0: {
            items: 1,
          },
          600: {
            items: 1,
          },
        },
      });
    </script>
     <script>$('#cumkm').carousel({
      interval: 4000,
      
    })</script>
  </body>
</html>

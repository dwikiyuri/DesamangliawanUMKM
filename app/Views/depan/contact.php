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
              <li><a href="<?php echo site_url('Home')?>">Home</a></li>
              <li><a href="<?php echo site_url('Home/pendaftaran')?>">Pendaftaran</a></li>
              <li class="active"><a href="<?php echo site_url('Home/contact')?>">Hubungi Kami</a></li>
            </ul>
            <i class="fa-solid fa-bars menu-bar"></i>
          </div>
        </div>
      </div>
    </header>
  <!-- contact section end -->
  <section id="contact1" class="contact1">
    <h2>Kontak <span>Kami</span></h2>
    
      <div id="map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31611.10421131195!2d112.65099286878657!3d-7.9587916831192524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd629001a671a9f%3A0xff0b5a661270111a!2sMangliawan%2C%20Pakis%2C%20Malang%20Regency%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1686182890979!5m2!1sen!2sid"
          width="100%"
          height="330px"
          frameborder="0"
          style="border: 0"
          allowfullscreen
        ></iframe>
        
        <div class="send-message">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="section-heading">
                  <h2>Kirim Pesan</h2>
                </div>
              </div>
              <div class="col-md-8">
                <div class="contact-form">
                  <form id="contact" action="" method="post">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <fieldset>
                          <input
                            name="name"
                            type="text"
                            class="form-control"
                            id="name"
                            placeholder="Full Name"
                            required=""
                          />
                        </fieldset>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <fieldset>
                          <input
                            name="email"
                            type="text"
                            class="form-control"
                            id="email"
                            placeholder="E-Mail Address"
                            required=""
                          />
                        </fieldset>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <fieldset>
                          <input
                            name="subject"
                            type="text"
                            class="form-control"
                            id="subject"
                            placeholder="Subject"
                            required=""
                          />
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <textarea
                            name="message"
                            rows="6"
                            class="form-control"
                            id="message"
                            placeholder="Your Message"
                            required=""
                          ></textarea>
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <button
                            type="submit"
                            id="form-submit"
                            class="filled-button"
                          >
                            Send Message
                          </button>
                        </fieldset>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-md-4">
                <ul class="accordion">
                  <li>
                    <a>Alamat Kantor Desa</a>
                    <div class="content">
                      <p>
                        Jl. Raya Wendit Barat No.46 A, Krajan, Mangliawan, Kec. Pakis, Kabupaten Malang, Jawa Timur 65154.
                      </p>
                    </div>
                  </li>
                </ul>
              </div>
  </section>
  <!-- <section id="team" class="team">
    <h2>Struktur Organisasi <span>Desa</span></h2>
    <div class="container">
      <div id="carousel2" class="carousel slide" data-ride="carousel2">
        <ol class="carousel-indicators">
          <li data-target="#carousel2" data-slide-to="0" class="active"></li>
          <li data-target="#carousel2" data-slide-to="1"></li>
          <li data-target="#carousel2" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-md-4">
                <div class="team-member">
                  <div class="thumb-container">
                    <img src="img/s0.jpg" alt="" >
                    <div class="hover-effect">
                      <div class="hover-content">
                        <ul class="social-icons">
                          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                          <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="down-content">
                    <h4>ABDUL MUNTHOLIB</h4>
                    <span>SEKRETARIS DESA</span>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="team-member">
                  <div class="thumb-container">
                    <img src="img/s1.jpg" alt="">
                    <div class="hover-effect">
                      <div class="hover-content">
                        <ul class="social-icons">
                          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                          <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="down-content">
                    <h4>MOCHAMAD JA'I</h4>
                    <span>KEPALA DESA</span>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="team-member">
                  <div class="thumb-container">
                    <img src="img/s2.jpg" alt="">
                    <div class="hover-effect">
                      <div class="hover-content">
                        <ul class="social-icons">
                          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                          <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="down-content">
                    <h4>Drs. HARIYANTO</h4>
                    <span>KEPALA SEKSI PEMERINTAHAN</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-4">
                <div class="team-member">
                  <div class="thumb-container">
                    <img src="img/s33.jpg" alt="">
                    <div class="hover-effect">
                      <div class="hover-content">
                        <ul class="social-icons">
                          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                          <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="down-content">
                    <h4>FERDI VIRGIAWAN MAYLISTANTO</h4>
                    <span>KEPALA SEKSI KESEJAHTERAAN</span>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="team-member">
                  <div class="thumb-container">
                    <img src="img/s5.jpg" alt="">
                    <div class="hover-effect">
                      <div class="hover-content">
                        <ul class="social-icons">
                          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                          <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="down-content">
                    <h4>HASYIM AS'ARI</h4>
                    <span>KEPALA SEKSI PELAYANAN</span>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="team-member">
                  <div class="thumb-container">
                    <img src="img/s6.jpg" alt="">
                    <div class="hover-effect">
                      <div class="hover-content">
                        <ul class="social-icons">
                          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                          <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="down-content">
                    <h4>NOMADENI FITROH ARNO</h4>
                    <span>KEPALA URUSAN PERENCANAAN</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-4">
                <div class="team-member">
                  <div class="thumb-container">
                    <img src="img/s4.jpg" alt="">
                    <div class="hover-effect">
                      <div class="hover-content">
                        <ul class="social-icons">
                          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                          <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="down-content">
                    <h4>FITRI SETYAWATI</h4>
                    <span>KEPALA URUSAN KEUANGAN</span>
                  </div>
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="team-member">
                  <div class="thumb-container">
                    <img src="img/s7.jpg" alt="">
                    <div class="hover-effect">
                      <div class="hover-content">
                        <ul class="social-icons">
                          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                          <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="down-content">
                    <h4>MEYLINDA MEGA AGUSTINA</h4>
                    <span>KEPALA URUSAN TATA USAHA DAN UMUM</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section> -->
  <section id="team" class="team">
    <h2>Struktur Organisasi <span>Desa</span></h2>
    <div class="container">
            <div class="row">
              <div class="owl-carousel owl-theme" id="member-event">
              <div class="px-2 item">
                <div class="team-member">
                  <div class="thumb-container">
                    <img src="<?php echo base_url('desamangliawan') ?>/img/s0.jpg" alt="" >
                    <div class="hover-effect">
                      <div class="hover-content">
                        <ul class="social-icons">
                          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                          <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="down-content">
                    <h4>ABDUL MUNTHOLIB</h4>
                    <span>SEKRETARIS DESA</span>
                  </div>
                </div>
              </div>
              <div class="px-2 item">
                <div class="team-member">
                  <div class="thumb-container">
                    <img src="<?php echo base_url('desamangliawan') ?>/img/s1.jpg" alt="">
                    <div class="hover-effect">
                      <div class="hover-content">
                        <ul class="social-icons">
                          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                          <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="down-content">
                    <h4>MOCHAMAD JA'I</h4>
                    <span>KEPALA DESA</span>
                  </div>
                </div>
              </div>
              <div class="px-2 item">
                <div class="team-member">
                  <div class="thumb-container">
                    <img src="<?php echo base_url('desamangliawan') ?>/img/s2.jpg" alt="">
                    <div class="hover-effect">
                      <div class="hover-content">
                        <ul class="social-icons">
                          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                          <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="down-content">
                    <h4>Drs. HARIYANTO</h4>
                    <span>KEPALA SEKSI PEMERINTAHAN</span>
                  </div>
                </div>
              </div>
              <div class="px-2 item">
                <div class="team-member">
                  <div class="thumb-container">
                    <img src="<?php echo base_url('desamangliawan') ?>/img/s33.jpg" alt="">
                    <div class="hover-effect">
                      <div class="hover-content">
                        <ul class="social-icons">
                          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                          <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="down-content">
                    <h4>FERDI VIRGIAWAN MAYLISTANTO</h4>
                    <span>KEPALA SEKSI KESEJAHTERAAN</span>
                  </div>
                </div>
              </div>
              <div class="px-2 item">
                <div class="team-member">
                  <div class="thumb-container">
                    <img src="<?php echo base_url('desamangliawan') ?>/img/s5.jpg" alt="">
                    <div class="hover-effect">
                      <div class="hover-content">
                        <ul class="social-icons">
                          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                          <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="down-content">
                    <h4>HASYIM AS'ARI</h4>
                    <span>KEPALA SEKSI PELAYANAN</span>
                  </div>
                </div>
              </div>
              <div class="px-2 item">
                <div class="team-member">
                  <div class="thumb-container">
                    <img src="<?php echo base_url('desamangliawan') ?>/img/s6.jpg" alt="">
                    <div class="hover-effect">
                      <div class="hover-content">
                        <ul class="social-icons">
                          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                          <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="down-content">
                    <h4>NOMADENI FITROH ARNO</h4>
                    <span>KEPALA URUSAN PERENCANAAN</span>
                  </div>
                </div>
              </div>
              <div class="px-2 item">
                <div class="team-member">
                  <div class="thumb-container">
                    <img src="<?php echo base_url('desamangliawan') ?>/img/s4.jpg" alt="">
                    <div class="hover-effect">
                      <div class="hover-content">
                        <ul class="social-icons">
                          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                          <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="down-content">
                    <h4>FITRI SETYAWATI</h4>
                    <span>KEPALA URUSAN KEUANGAN</span>
                  </div>
                </div>
              </div>
              <div class="px-2 item">
                <div class="team-member">
                  <div class="thumb-container">
                    <img src="<?php echo base_url('desamangliawan') ?>/img/s7.jpg" alt="">
                    <div class="hover-effect">
                      <div class="hover-content">
                        <ul class="social-icons">
                          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                          <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="down-content">
                    <h4>MEYLINDA MEGA AGUSTINA</h4>
                    <span>KEPALA URUSAN TATA USAHA DAN UMUM</span>
                  </div>
                </div>
              </div>
              </div>
             </div>
          </div>
  </section>
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
    <!-- my script -->
    <script src="<?php echo base_url('desamangliawan') ?>/js/script.js"></script>
    <!-- bootstrap js -->
    <script src="<?php echo base_url('desamangliawan') ?>/assets/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('desamangliawan') ?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- owl caraousel -->
    <script src="<?php echo base_url('desamangliawan') ?>/assets/owl.caraousel/owl.carousel.min.js"></script>
    <!-- accord -->
    <script src="<?php echo base_url('desamangliawan') ?>/js/accord.js"></script>
    <script src="<?php echo base_url('desamangliawan') ?>/js/custom.js"></script>
    <script>
      $("#member-event").owlCarousel({
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
          items: 1 // Ketika layar lebar kurang dari 600px, tampilkan 1 item
        },
        600: {
          items: 2 // Ketika layar lebar di antara 600px dan 1000px, tampilkan 2 item
        },
        1000: {
          items: 3 // Ketika layar lebar lebih dari atau sama dengan 1000px, tampilkan 3 item
        }
      }
      });
    </script>
  </body>
</html>

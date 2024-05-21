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
              <li ><a href="<?php echo site_url('Home')?>">Home</a></li>
              <li class="active"><a href="<?php echo site_url('Home/pendaftaran')?>">Pendaftaran</a></li>
              <li><a href="<?php echo site_url('Home/contact')?>">Hubungi Kami</a></li>
            </ul>
            <i class="fa-solid fa-bars menu-bar"></i>
          </div>
        </div>
      </div>
    </header>
    <!-- NAVBAR SECTION END -->

    <!-- PENDAFTARAN -->
    <section id="pendaftaran" class="pendaftaran">
      <div class="container-fluid mb-4">
        <div class="container">
          <div class="col-12 text-center contact_margin_svnit">
            <div class="text-center fh5co_heading py-2">Pendaftaran UMKM</div>
          </div>
          <?php
    $session = \Config\Services::session();
    if ($session->getFlashdata('warning')) {
    ?>
        <div class="alert alert-warning">
            <ul>
                <?php
                foreach ($session->getFlashdata('warning') as $val) {
                ?>
                    <li><?php echo $val ?></li>
                <?php
                }
                ?>
            </ul>
        </div>
    <?php
    }
    if ($session->getFlashdata('success')) {
    ?>
    <div class="alert alert-success">
        <?php
            echo $session->getFlashdata('success') ?></div>
        <?php
    }
    ?>
          <div class="row">
            <div class="col-12 col-md-10 mx-auto text-left">
              <form
                class="row"
                action=""
                method="POST"
                enctype="multipart/form-data"
              >
                <div
                  class="col-md-6 py-3 border border-color-primary text-center"
                >
                  <span class="heading-add-image">Foto UMKM 1</span>
                  <div class="image-preview-container">
                    <div class="preview">
                      <img id="preview-selected-image" />
                      <span
                        id="close-icon"
                        class="close-icon hidden"
                        onclick="removeImage()"
                        ><i data-feather="x"></i
                      ></span>
                      <label class="uploads1" for="file-upload"
                        ><i class="fa fa-cloud-upload" aria-hidden="true"></i
                      ></label>
                    </div>
                    <label for="file-upload">Upload Image</label>
                    <input
                      type="file"
                      id="file-upload"
                      accept="image/*"
                      onchange="previewImage(event);"
                      name="post_thumbnail"
                    />
                  </div>
                </div>
                <div
                  class="col-md-6 py-3 border border-color-primary text-center"
                >
                  <span class="heading-add-image">Foto UMKM 2</span>
                  <div class="image-preview-container">
                    <div class="preview">
                      <img id="preview-selected-image2" />
                      <span
                        id="close-icon2"
                        class="close-icon hidden"
                        onclick="removeImage2()"
                        ><i data-feather="x"></i
                      ></span>
                      <label class="uploads" for="file-upload2"
                        ><i class="fa fa-cloud-upload" aria-hidden="true"></i
                      ></label>
                    </div>
                    <label for="file-upload2">Upload Image</label>
                    <input
                      type="file"
                      id="file-upload2"
                      accept="image/*"
                      onchange="previewImage2(event);"
                      name="post_thumbnail2"
                    />
                  </div>
                </div>
                <div class="col-12 py-3">
                  <label for="input_nama_toko">Nama Usaha</label>
                  <input
                    type="text"
                    class="form-control fh5co_contact_text_box"
                    placeholder="Nama Usaha UMKM"
                    id="input_nama_toko"
                    name="nama_toko"
                  />
                </div>
                <div class="col-md-6 py-3">
                  <label for="input_nama_pemilik">Nama Pemilik Usaha</label>
                  <input
                    type="text"
                    class="form-control fh5co_contact_text_box"
                    placeholder="Nama Usaha UMKM"
                    id="input_nama_pemilik"
                    name="nama_pemilik"
                  />
                </div>
                <div class="col-md-6 py-3">
                  <label for="jenis_umkm">Jenis Usaha</label>
                  <select
                    class="form-control"
                    name="jenis_umkm"
                    id="jenis_umkm"
                  >
                    <option value="">--Pilih Jenis UMKM/UKM--</option>
                    <option value="food">Makanan & Minuman</option>
                    <option value="Jasa">Jasa</option>
                    <option value="kerajinan">Kerajinan Tangan</option>
                    <option value="pakaian">Pakaian & Tekstil</option>
                    <option value="pertanian">Pertanian</option>
                    <option value="Barang">Barang</option>
                    <option value="other">Lainnya</option>
                  </select>
                </div>
                <div class="col-md-6 py-3">
                  <label for="alamat"> Alamat</label>
                  <input
                    type="text"
                    class="form-control fh5co_contact_text_box"
                    placeholder="Alamat Lengkap Usaha"
                    id="alamat"
                    name="alamat"
                  />
                </div>
                <div class="col-md-6 py-3">
                  <label for="input_nomor_telepon">Nomor telepon</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-whatsapp"></i>
                      </div>
                    </div>
                    <input
                      type="text"
                      class="form-control fh5co_contact_text_box"
                      placeholder="0865474325312"
                      id="input_nomor_telepon"
                      name="nomor_telepon"
                    />
                  </div>
                </div>
                <div class="col-12 py-3">
                  <label for="post_content">Deskripsi</label>
                  <textarea
                    class="form-control fh5co_contacts_message"
                    placeholder="Isikan singkat deskripsi toko (250 character)"
                    id="post_content"
                    maxlength="250"
                    name="post_content"
                  ></textarea>
                </div>
                <div class="col-12 text-center contact_margin_svnit2">
                  <div class="text-center fh5co_heading2 py-2">
                    E-commerce & Media Social
                  </div>
                </div>
                <div class="col-md-6 py-3">
                  <label class="shp" for="input_link_shopee">Shopee</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          x="0px"
                          y="0px"
                          width="20"
                          height="20"
                          viewBox="0 0 48 48"
                        >
                          <path
                            fill="#f26322"
                            d="M17.172,12.571c-0.126-2.763,1.981-6.24,4.494-7.44c0.617-0.295,1.273-0.533,1.955-0.593 c1.777-0.157,3.455,0.917,4.627,2.252c1.244,1.417,2.09,4.175,2.42,6.025c-3.112-0.4-4.81-0.303-7.947-0.236 C21.361,12.607,18.52,12.398,17.172,12.571z M31.156,4.404c-1.949-1.942-4.726-2.886-7.493-2.88 c-1.012,0.002-2.026,0.151-2.984,0.473c-2.062,0.693-3.777,1.996-4.946,3.813s-1.931,4.792-2.134,6.936 c-2.919-0.208-5.832-0.023-8.358,0.23c-0.428,0.043-0.91,0.129-1.142,0.487c-0.129,0.199-0.152,0.445-0.171,0.68 c-0.313,3.965-0.21,7.962,0.309,11.906c0.149,1.136,0.333,2.267,0.452,3.406c0.524,5.001-0.547,8.291,0.584,13.364 c0.114,0.513,0.787,3.726,4.572,3.726c5.738,0,10.036,0.415,15.737-0.224c3.328-0.373,8.214,0.124,11.554,0.375 c0.97,0.073,1.993,0.039,2.844-0.429c0.98-0.539,1.585-1.588,1.844-2.667c0.259-1.079,0.217-2.203,0.191-3.311 c-0.185-7.825,0.474-15.67,1.963-23.357c0.206-1.064,0.309-2.415-0.628-2.976c-0.323-0.194-0.712-0.242-1.087-0.287 c-2.589-0.308-5.422-0.695-8.01-1.003C34.278,9.929,33.105,6.347,31.156,4.404z"
                          ></path>
                          <path
                            d="M26.501,4.719c-3.167-1.736-6.515,0.251-8.307,2.982c-0.938,1.429-1.573,3.145-1.522,4.87 c0.002,0.076,0.02,0.142,0.047,0.2c0.05,0.186,0.198,0.33,0.453,0.3c1.954-0.229,3.95,0.043,5.912-0.001 c2.545-0.057,5.052-0.074,7.583,0.244c0.351,0.044,0.533-0.353,0.482-0.633C30.587,9.611,29.394,6.304,26.501,4.719z M23.084,12.07 c-1.791,0.04-3.608-0.165-5.398-0.031c0.2-3.187,2.944-7.054,6.329-7.017c1.842,0.02,3.561,1.43,4.464,2.952 c0.772,1.301,1.241,2.794,1.559,4.28C27.721,12.012,25.418,12.018,23.084,12.07z"
                          ></path>
                          <path
                            d="M43.602,13.524c-0.788-0.466-1.922-0.424-2.804-0.534c-1.079-0.135-2.158-0.274-3.237-0.412 c-0.945-0.121-1.891-0.239-2.837-0.354c-0.072-2.074-0.639-4.161-1.62-5.981c-1.096-2.033-2.836-3.521-4.974-4.382 c-4.574-1.843-10.102-0.56-12.828,3.697c-1.248,1.949-1.862,4.37-2.141,6.669c-2.135-0.118-4.274-0.059-6.405,0.112 c-0.794,0.064-1.836,0.003-2.559,0.392c-0.836,0.45-0.777,1.437-0.83,2.262c-0.15,2.349-0.154,4.707-0.013,7.057 c0.14,2.324,0.505,4.609,0.779,6.918c0.48,4.038-0.232,8.102,0.325,12.131c0.298,2.159,0.844,4.45,3.023,5.457 c1.657,0.766,3.657,0.488,5.429,0.523c2.107,0.041,4.214,0.111,6.321,0.097c2.153-0.014,4.294-0.141,6.435-0.364 c1.887-0.196,3.797-0.138,5.687-0.038c1.873,0.099,3.74,0.269,5.61,0.409c1.889,0.141,3.699-0.219,4.738-1.952 c1.103-1.84,0.816-4.12,0.791-6.165c-0.029-2.324,0.017-4.648,0.136-6.969c0.243-4.72,0.793-9.423,1.649-14.071 C44.536,16.625,45.148,14.438,43.602,13.524z M43.525,16.637c-0.724,4.207-1.387,8.393-1.716,12.653 c-0.163,2.114-0.265,4.232-0.306,6.352c-0.041,2.141,0.112,4.296,0.017,6.433c-0.087,1.966-0.926,3.946-3.127,4.131 c-1.691,0.142-3.482-0.193-5.17-0.313c-1.811-0.129-3.628-0.231-5.445-0.2c-1.868,0.032-3.72,0.309-5.586,0.404 c-3.912,0.198-7.827-0.029-11.741-0.049c-1.4-0.007-2.73-0.16-3.707-1.268c-0.478-0.541-0.777-1.216-0.95-1.911 c-0.843-3.395-0.451-6.843-0.454-10.293C5.34,30.536,5.08,28.54,4.8,26.524c-0.301-2.169-0.482-4.353-0.534-6.542 c-0.025-1.055-0.021-2.11,0.013-3.165c0.017-0.527,0.041-1.054,0.072-1.581c0.025-0.423-0.069-1.331,0.288-1.597 c0.286-0.213,0.796-0.183,1.133-0.215c0.514-0.048,1.027-0.091,1.542-0.128c1.046-0.075,2.094-0.125,3.142-0.137 c1.048-0.012,2.096,0.016,3.142,0.087c0.289,0.019,0.474-0.246,0.5-0.5c0.203-2.018,0.712-4.119,1.637-5.932 c0.936-1.834,2.511-3.274,4.404-4.08c4.018-1.711,9.433-0.333,11.776,3.45c1.183,1.911,1.839,4.234,1.837,6.481 c0,0.276,0.185,0.426,0.395,0.466c0.035,0.012,0.065,0.03,0.105,0.034c2.031,0.242,4.059,0.512,6.088,0.767 c0.492,0.062,0.984,0.123,1.476,0.183c0.44,0.053,0.987,0.05,1.355,0.329C43.794,14.914,43.639,15.975,43.525,16.637z"
                          ></path>
                          <path
                            fill="#d6e5e5"
                            d="M17.364,36.397c-0.477,0.54-0.803,1.362-1.134,2.003c1.636,1.532,3.743,2.571,5.96,2.905 s4.64,0.155,6.655-0.826c0.868-0.423,1.723-1.007,2.114-1.889c0.219-0.493,0.396-1.427,0.45-1.964 c0.185-1.867,0.193-3.553-0.955-5.037c-0.816-1.055-2.12-1.587-3.362-2.074c-1.294-0.507-2.588-1.015-3.881-1.522 c-0.872-0.342-1.78-0.709-2.395-1.417c-0.74-0.853-0.919-2.13-0.509-3.182c0.41-1.052,1.366-1.855,2.455-2.151 c1.091-0.297,2.259-0.112,3.336,0.231s2.1,0.839,3.177,1.184c0.091,0.029,0.188,0.057,0.279,0.031 c0.114-0.033,0.188-0.14,0.253-0.24c0.302-0.471,0.551-1.173,0.853-1.644c-1.234-0.935-2.667-1.908-4.127-2.421 c-0.623-0.219-1.266-0.433-1.926-0.433c-3.214,0-4.372,0.828-5.512,1.623s-2.051,1.978-2.316,3.342 c-0.115,0.59-0.108,1.199-0.023,1.794c0.344,2.413,2.054,4.583,4.32,5.481c1.392,0.552,2.957,0.653,4.262,1.388 c0.414,0.233,0.792,0.525,1.163,0.823c0.455,0.365,0.907,0.747,1.239,1.226c0.398,0.575,0.606,1.28,0.584,1.979 c-0.008,0.241-0.042,0.482-0.127,0.707c-0.092,0.243-0.24,0.462-0.408,0.66c-0.92,1.083-2.416,1.538-3.837,1.515 c-1.421-0.024-2.798-0.467-4.147-0.914C19.079,37.333,18.104,36.939,17.364,36.397z"
                          ></path>
                          <path
                            d="M31.323,32.008c-0.779-1.454-2.18-2.203-3.653-2.8c-1.785-0.723-3.704-1.282-5.412-2.173 c-0.838-0.437-1.478-1.082-1.631-2.044c-0.132-0.831,0.129-1.668,0.688-2.293c1.513-1.691,3.874-1.076,5.713-0.361 c0.527,0.205,1.048,0.424,1.579,0.617c0.352,0.128,0.762,0.329,1.139,0.19c0.72-0.266,0.984-1.491,1.345-2.089 c0.151-0.251,0.034-0.523-0.179-0.684c-1.436-1.082-2.942-2.061-4.665-2.615c-1.473-0.473-3.141-0.367-4.63,0.014 c-2.26,0.578-4.58,2.346-5.233,4.642c-0.82,2.882,0.89,6.077,3.305,7.624c1.457,0.934,3.167,1.045,4.744,1.663 c1.525,0.597,3.483,2.1,3.389,3.904c-0.102,1.962-2.807,2.482-4.344,2.359c-1.136-0.091-2.24-0.443-3.317-0.798 c-0.9-0.297-1.765-0.653-2.544-1.2c-0.026-0.018-0.051-0.021-0.076-0.033c-0.016-0.008-0.031-0.014-0.047-0.021 c-0.038-0.013-0.074-0.026-0.11-0.028c-0.034-0.004-0.067,0.001-0.102,0.006c-0.019,0.004-0.038,0.005-0.055,0.011 c-0.043,0.013-0.083,0.039-0.124,0.069c-0.008,0.006-0.016,0.012-0.024,0.019c-0.022,0.019-0.047,0.029-0.068,0.054 c-0.525,0.635-0.843,1.375-1.212,2.104c-0.097,0.193-0.091,0.451,0.078,0.606c2.553,2.346,5.947,3.45,9.396,3.162 c1.65-0.138,3.379-0.578,4.751-1.543c1.307-0.92,1.719-2.216,1.885-3.747C32.077,35.069,32.081,33.423,31.323,32.008z M30.764,37.49c-0.155,0.713-0.397,1.306-0.964,1.799c-0.69,0.6-1.596,0.98-2.463,1.238c-3.61,1.076-7.647,0.178-10.486-2.267 c0.195-0.412,0.396-0.825,0.648-1.203c1.333,0.828,2.943,1.328,4.447,1.667c1.535,0.346,3.155,0.402,4.619-0.252 c1.34-0.599,2.375-1.755,2.242-3.287c-0.151-1.734-1.501-2.925-2.872-3.827c-1.437-0.945-3.17-1.014-4.728-1.651 c-1.407-0.575-2.567-1.676-3.28-3.011c-0.803-1.504-1.055-3.404-0.192-4.936c0.608-1.08,1.626-1.866,2.697-2.457 c1.286-0.709,2.94-0.961,4.393-0.846c1.889,0.15,3.679,1.362,5.19,2.486c-0.102,0.2-0.199,0.402-0.297,0.605 c-0.07,0.145-0.143,0.382-0.255,0.499c-0.164,0.172,0.057,0.199-0.271,0.056c-0.854-0.371-1.76-0.701-2.641-1.005 c-1.544-0.534-3.283-0.778-4.788,0.006c-1.264,0.658-2.146,1.955-2.172,3.393c-0.028,1.553,0.902,2.772,2.25,3.449 c1.631,0.818,3.42,1.382,5.116,2.051c1.523,0.6,3.042,1.299,3.69,2.919C31.206,34.308,31.077,36.052,30.764,37.49z"
                          ></path>
                        </svg>
                      </div>
                    </div>
                    <input
                      type="text"
                      class="form-control fh5co_contact_text_box"
                      placeholder="Masukkan Link shopee anda"
                      id="input_link_shopee"
                      name="shopee"
                    />
                  </div>
                </div>
                <div class="col-md-6 py-3">
                  <label class="tkpd" for="input_link_tokopedia"
                    >Tokopedia</label
                  >
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          x="0px"
                          y="0px"
                          width="20"
                          height="20"
                          viewBox="0 0 64 64"
                        >
                          <linearGradient
                            id="BByzyhRg08SueoHenzjo7a_QxTCUohbBw9U_gr1"
                            x1="32.135"
                            x2="32.135"
                            y1="1.445"
                            y2="51.043"
                            gradientUnits="userSpaceOnUse"
                          >
                            <stop offset="0" stop-color="#6dc7ff"></stop>
                            <stop offset=".492" stop-color="#aab9ff"></stop>
                            <stop offset="1" stop-color="#e6abff"></stop>
                          </linearGradient>
                          <path
                            fill="url(#BByzyhRg08SueoHenzjo7a_QxTCUohbBw9U_gr1)"
                            d="M54,13.6v24.51c0,8.79-7.12,15.91-15.9,15.91H10.27V13.6h12.59c2.93,0,6.62,1.99,9.28,4.64 c2.65-2.65,6.34-4.64,9.27-4.64H54z"
                          ></path>
                          <circle
                            cx="22.859"
                            cy="30.163"
                            r="9.276"
                            fill="#fff"
                          ></circle>
                          <circle
                            cx="41.411"
                            cy="30.163"
                            r="9.276"
                            fill="#fff"
                          ></circle>
                          <path
                            fill="#fff"
                            d="M44,48.473c0,0.799-0.109,2.78-0.298,3.527H20.568c-0.189-0.746-0.298-2.728-0.298-3.527 C20.27,42.688,25.583,38,32.14,38C38.687,38,44,42.688,44,48.473z"
                          ></path>
                          <linearGradient
                            id="BByzyhRg08SueoHenzjo7b_QxTCUohbBw9U_gr2"
                            x1="23.522"
                            x2="23.522"
                            y1="-3.418"
                            y2="63.822"
                            gradientUnits="userSpaceOnUse"
                          >
                            <stop offset="0" stop-color="#1a6dff"></stop>
                            <stop offset="1" stop-color="#c822ff"></stop>
                          </linearGradient>
                          <circle
                            cx="23.522"
                            cy="30.825"
                            r="4.638"
                            fill="url(#BByzyhRg08SueoHenzjo7b_QxTCUohbBw9U_gr2)"
                          ></circle>
                          <circle
                            cx="21.203"
                            cy="27.181"
                            r="2.982"
                            fill="#fff"
                          ></circle>
                          <path
                            fill="#fff"
                            d="M41.41,14.6c-2.53,0-5.97,1.74-8.57,4.34c-0.19,0.2-0.45,0.3-0.7,0.3c-0.26,0-0.52-0.1-0.71-0.3 c-2.6-2.6-6.04-4.34-8.57-4.34H11.27v38.42H38.1c8.21,0,14.9-6.69,14.9-14.91V14.6H41.41z M51,38.11 c0,7.12-5.79,12.91-12.9,12.91H13.27V16.6h9.59c1.69,0,4.69,1.29,7.15,3.76c0.57,0.56,1.32,0.88,2.13,0.88 c0.8,0,1.55-0.32,2.12-0.88c2.46-2.47,5.46-3.76,7.15-3.76H51V38.11z"
                          ></path>
                          <linearGradient
                            id="BByzyhRg08SueoHenzjo7c_QxTCUohbBw9U_gr3"
                            x1="32.135"
                            x2="32.135"
                            y1="-3.418"
                            y2="63.822"
                            gradientUnits="userSpaceOnUse"
                          >
                            <stop offset="0" stop-color="#1a6dff"></stop>
                            <stop offset="1" stop-color="#c822ff"></stop>
                          </linearGradient>
                          <path
                            fill="url(#BByzyhRg08SueoHenzjo7c_QxTCUohbBw9U_gr3)"
                            d="M41.067,20.23 c-3.929,0-7.322,2.299-8.932,5.617c-1.61-3.318-5.003-5.617-8.933-5.617c-5.477,0-9.932,4.455-9.932,9.932s4.456,9.933,9.932,9.933 c3.929,0,7.323-2.299,8.933-5.618c1.61,3.318,5.003,5.618,8.932,5.618c5.477,0,9.933-4.456,9.933-9.933S46.544,20.23,41.067,20.23z M23.203,38.095c-4.374,0-7.932-3.559-7.932-7.933c0-4.373,3.558-7.932,7.932-7.932s7.933,3.559,7.933,7.932 C31.135,34.536,27.577,38.095,23.203,38.095z M41.067,38.095c-4.374,0-7.932-3.559-7.932-7.933c0-4.373,3.558-7.932,7.932-7.932 S49,25.789,49,30.162C49,34.536,45.441,38.095,41.067,38.095z"
                          ></path>
                          <linearGradient
                            id="BByzyhRg08SueoHenzjo7d_QxTCUohbBw9U_gr4"
                            x1="40.749"
                            x2="40.749"
                            y1="-3.418"
                            y2="63.822"
                            gradientUnits="userSpaceOnUse"
                          >
                            <stop offset="0" stop-color="#1a6dff"></stop>
                            <stop offset="1" stop-color="#c822ff"></stop>
                          </linearGradient>
                          <circle
                            cx="40.749"
                            cy="30.825"
                            r="4.638"
                            fill="url(#BByzyhRg08SueoHenzjo7d_QxTCUohbBw9U_gr4)"
                          ></circle>
                          <circle
                            cx="38.43"
                            cy="27.181"
                            r="2.982"
                            fill="#fff"
                          ></circle>
                          <linearGradient
                            id="BByzyhRg08SueoHenzjo7e_QxTCUohbBw9U_gr5"
                            x1="31.85"
                            x2="31.85"
                            y1="37.11"
                            y2="43.98"
                            gradientUnits="userSpaceOnUse"
                          >
                            <stop offset="0" stop-color="#6dc7ff"></stop>
                            <stop offset=".492" stop-color="#aab9ff"></stop>
                            <stop offset="1" stop-color="#e6abff"></stop>
                          </linearGradient>
                          <path
                            fill="url(#BByzyhRg08SueoHenzjo7e_QxTCUohbBw9U_gr5)"
                            d="M36.57,39.3l-4.43,4.44l-0.24,0.24 l-4.77-4.77c1.14-1.29,2.82-2.1,4.67-2.1c0.12,0,0.22,0.02,0.34,0.02C33.91,37.22,35.48,38.04,36.57,39.3z"
                          ></path>
                          <linearGradient
                            id="BByzyhRg08SueoHenzjo7f_QxTCUohbBw9U_gr6"
                            x1="31.846"
                            x2="31.846"
                            y1="-4.535"
                            y2="62.706"
                            gradientUnits="userSpaceOnUse"
                          >
                            <stop offset="0" stop-color="#1a6dff"></stop>
                            <stop offset="1" stop-color="#c822ff"></stop>
                          </linearGradient>
                          <path
                            fill="url(#BByzyhRg08SueoHenzjo7f_QxTCUohbBw9U_gr6)"
                            d="M31.9,45.278l-6.142-6.143l0.623-0.704 c1.369-1.549,3.344-2.438,5.419-2.438c0.091,0,0.175,0.006,0.258,0.014l0.133,0.007c1.997,0.102,3.82,0.994,5.135,2.515 l0.608,0.703L31.9,45.278z M28.562,39.112l3.337,3.337l3.25-3.258c-0.865-0.709-1.924-1.121-3.061-1.179 c-0.035,0.004-0.123-0.005-0.208-0.013c-0.007,0-0.015,0-0.021,0C30.619,38,29.474,38.398,28.562,39.112z"
                          ></path>
                          <linearGradient
                            id="BByzyhRg08SueoHenzjo7g_QxTCUohbBw9U_gr7"
                            x1="32.135"
                            x2="32.135"
                            y1="-3.418"
                            y2="63.822"
                            gradientUnits="userSpaceOnUse"
                          >
                            <stop offset="0" stop-color="#1a6dff"></stop>
                            <stop offset="1" stop-color="#c822ff"></stop>
                          </linearGradient>
                          <path
                            fill="url(#BByzyhRg08SueoHenzjo7g_QxTCUohbBw9U_gr7)"
                            d="M54,12.6H42.264 c-0.798-4.877-5.03-8.616-10.129-8.616S22.804,7.723,22.006,12.6H10.27c-0.55,0-1,0.45-1,1v40.42c0,0.55,0.45,1,1,1H38.1 c9.32,0,16.9-7.59,16.9-16.91V13.6C55,13.05,54.55,12.6,54,12.6z M32.135,5.984c4.025,0,7.384,2.89,8.122,6.703 c-2.603,0.367-5.616,1.906-8.117,4.172c-2.51-2.266-5.523-3.805-8.126-4.172C24.751,8.875,28.11,5.984,32.135,5.984z M53,38.11 c0,8.22-6.69,14.91-14.9,14.91H11.27V14.6h11.59c2.53,0,5.97,1.74,8.57,4.34c0.19,0.2,0.45,0.3,0.71,0.3c0.25,0,0.51-0.1,0.7-0.3 c2.6-2.6,6.04-4.34,8.57-4.34H53V38.11z"
                          ></path>
                        </svg>
                      </div>
                    </div>
                    <input
                      type="text"
                      class="form-control fh5co_contact_text_box"
                      placeholder="Masukkan Link Tokopedia anda"
                      id="input_link_tokopedia"
                      name="tokopedia"
                    />
                  </div>
                </div>
                <div class="col-md-6 py-3">
                  <label class="lzd" for="input_link_lazada">Lazada</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          x="0px"
                          y="0px"
                          width="20"
                          height="20"
                          viewBox="0 0 100 100"
                        >
                          <path
                            fill="#f9b621"
                            d="M74.007,18.001c0.204,0,0.403,0.056,0.576,0.163l16.427,10.109c0.61,0.375,0.989,1.054,0.989,1.77	v29.085c0,0.724-0.367,1.384-0.982,1.766L51.055,85.699C50.738,85.896,50.373,86,50,86s-0.738-0.104-1.055-0.301L8.982,60.895	C8.367,60.513,8,59.853,8,59.129V30.044c0-0.716,0.379-1.395,0.989-1.77l16.427-10.109c0.173-0.107,0.373-0.163,0.576-0.163	c0.205,0,0.406,0.057,0.58,0.165l15.354,9.53c2.426,1.506,5.218,2.302,8.073,2.302s5.647-0.796,8.073-2.302l15.354-9.53	C73.602,18.058,73.802,18.001,74.007,18.001"
                          ></path>
                          <path
                            fill="#f5905f"
                            d="M50,52L8.228,29.125C8.087,29.408,8,29.72,8,30.044v29.085c0,0.724,0.367,1.384,0.982,1.766	l39.963,24.805C49.262,85.896,49.627,86,50,86V52z"
                          ></path>
                          <path
                            fill="#ee4267"
                            d="M50,52l41.772-22.875C91.913,29.408,92,29.72,92,30.044v29.085c0,0.724-0.367,1.384-0.982,1.766	L51.055,85.699C50.738,85.896,50.373,86,50,86V52z"
                          ></path>
                          <path
                            fill="#ee5490"
                            d="M92,30.04v29.09c0,0.72-0.37,1.38-0.98,1.76L85,64.63v-31.8l6.77-3.71C91.91,29.41,92,29.72,92,30.04	z"
                          ></path>
                          <polygon
                            fill="#ef5684"
                            points="85,32.83 85,64.63 79,68.35 79,36.11"
                          ></polygon>
                          <polygon
                            fill="#ef517b"
                            points="79,36.11 79,68.35 73,72.08 73,39.4"
                          ></polygon>
                          <polygon
                            fill="#ef4a75"
                            points="73,39.4 73,72.08 67,75.8 67,42.69"
                          ></polygon>
                          <polygon
                            fill="#f2ac0f"
                            points="41,27.12 41,47.07 35,43.78 35,23.4"
                          ></polygon>
                          <path
                            fill="#f59173"
                            d="M47,29.7v20.66l-6-3.29V27.12l0.93,0.58C43.49,28.67,45.21,29.34,47,29.7z"
                          ></path>
                          <path
                            fill="#f27c7c"
                            d="M53,29.7v20.66L50,52l-3-1.64V29.7c0.98,0.2,1.99,0.3,3,0.3S52.02,29.9,53,29.7z"
                          ></path>
                          <path
                            fill="#f16e7c"
                            d="M59,27.12v19.95l-6,3.29V29.7c1.79-0.36,3.51-1.03,5.07-2L59,27.12z"
                          ></path>
                          <polygon
                            fill="#ef6388"
                            points="65,23.4 65,43.78 59,47.07 59,27.12"
                          ></polygon>
                          <path
                            fill="#ee5490"
                            d="M91.77,29.12L65,43.78V23.4l8.43-5.23C73.6,18.06,73.8,18,74.01,18c0.2,0,0.4,0.06,0.57,0.16	l16.43,10.11C91.34,28.48,91.61,28.78,91.77,29.12z"
                          ></path>
                          <path
                            fill="#1f212b"
                            d="M50,87c-0.559,0-1.105-0.156-1.582-0.451L8.455,61.744C7.544,61.179,7,60.201,7,59.128V30.044	c0-1.062,0.562-2.066,1.465-2.622l16.427-10.109c0.665-0.409,1.542-0.408,2.207,0.002l15.355,9.532	c2.268,1.407,4.877,2.151,7.546,2.151s5.278-0.744,7.546-2.151l15.354-9.53c0.669-0.414,1.544-0.413,2.209-0.004l16.427,10.109	C92.438,27.978,93,28.982,93,30.044v29.084c0,1.072-0.544,2.05-1.455,2.616L51.582,86.549C51.105,86.844,50.559,87,50,87z M25.416,18.165l0.524,0.852L9.514,29.125C9.196,29.32,9,29.672,9,30.044v29.084c0,0.376,0.19,0.718,0.51,0.917L49.473,84.85	c0.316,0.196,0.738,0.197,1.055,0L90.49,60.045C90.81,59.847,91,59.504,91,59.128V30.044c0-0.372-0.196-0.724-0.514-0.919	L74.007,19.001c-0.02,0-0.038,0.005-0.055,0.016l-15.352,9.529c-2.584,1.604-5.559,2.452-8.601,2.452s-6.017-0.848-8.601-2.452	l-15.354-9.53L25.416,18.165z"
                          ></path>
                          <polygon
                            fill="#1f212b"
                            points="50,52.57 7.76,29.438 8.24,28.562 50,51.43 91.76,28.562 92.24,29.438"
                          ></polygon>
                          <rect
                            width="1"
                            height="35"
                            x="49.5"
                            y="52"
                            fill="#1f212b"
                          ></rect>
                          <path
                            fill="#1f212b"
                            d="M29.5,68.833c-0.091,0-0.182-0.024-0.264-0.075l-16.055-9.965C12.441,58.333,12,57.539,12,56.669	V35.5c0-0.276,0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5v21.169c0,0.522,0.265,0.999,0.709,1.274l16.055,9.965	c0.234,0.146,0.307,0.454,0.161,0.688C29.83,68.749,29.667,68.833,29.5,68.833z"
                          ></path>
                          <path
                            fill="#1f212b"
                            d="M44.5,78.144c-0.091,0-0.182-0.024-0.264-0.075l-1-0.621c-0.234-0.146-0.307-0.454-0.161-0.688	c0.146-0.235,0.456-0.305,0.688-0.161l1,0.621c0.234,0.146,0.307,0.454,0.161,0.688C44.83,78.06,44.667,78.144,44.5,78.144z"
                          ></path>
                          <path
                            fill="#1f212b"
                            d="M40.5,75.661c-0.091,0-0.182-0.024-0.264-0.075l-4-2.483c-0.234-0.146-0.307-0.454-0.161-0.688	c0.146-0.235,0.456-0.304,0.688-0.161l4,2.483c0.234,0.146,0.307,0.454,0.161,0.688C40.83,75.577,40.667,75.661,40.5,75.661z"
                          ></path>
                          <path
                            fill="#1f212b"
                            d="M84.418,30c-0.09,0-0.181-0.024-0.262-0.074l-9.351-5.754c-0.489-0.3-1.093-0.298-1.577,0.003	l-5.465,3.392c-0.232,0.146-0.542,0.074-0.688-0.161c-0.146-0.234-0.073-0.543,0.161-0.688l5.465-3.392	c0.811-0.503,1.817-0.504,2.628-0.005l9.351,5.754c0.235,0.145,0.309,0.453,0.164,0.688C84.749,29.916,84.585,30,84.418,30z"
                          ></path>
                          <path
                            fill="#1f212b"
                            d="M63.701,30c-0.167,0-0.33-0.084-0.425-0.236c-0.146-0.235-0.073-0.543,0.161-0.688l1.611-1	c0.233-0.144,0.542-0.074,0.688,0.161c0.146,0.235,0.073,0.543-0.161,0.688l-1.611,1C63.883,29.976,63.792,30,63.701,30z"
                          ></path>
                        </svg>
                      </div>
                    </div>
                    <input
                      type="text"
                      class="form-control fh5co_contact_text_box"
                      placeholder="Masukkan Link Lazada anda"
                      id="input_link_lazada"
                      name="lazada"
                    />
                  </div>
                </div>
                <div class="col-12 py-3 text-center">
                  <input
                    type="submit"
                    name="submit"
                    value="Simpan Data"
                    class="btn contact_btn"
                  />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- PENDAFTARAN END -->
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
    <script src="assets/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('desamangliawan') ?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- owl caraousel -->
    <script src="<?php echo base_url('desamangliawan') ?>/assets/owl.caraousel/owl.carousel.min.js"></script>

    <script src="<?php echo base_url('desamangliawan') ?>/js/accord.js"></script>
    <script src="<?php echo base_url('desamangliawan') ?>/js/custom.js"></script>
  </body>
</html>

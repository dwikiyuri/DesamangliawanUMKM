
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->

            <!-- Content Row -->
            <div class="row">
              <!-- Earnings (Monthly) Card Example -->
             

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="text-xs font-weight-bold text-success text-uppercase mb-1"
                        >
                          Jumlah UMKM (Terdaftar)
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php echo $jumlahterdaftar ?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-address-card fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Earnings (Monthly) Card Example -->
              

              <!-- Pending Requests Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <a href="<?php echo site_url('admin/Request/daftarumkm')?>">
                        <div class="col mr-2">
                        <div
                          class="text-xs font-weight-bold text-warning text-uppercase mb-1"
                        >
                          Pending UMKM
                        </div>
                        </a>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php echo $jumlahrequest ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Content Row -->
        </div>
        <!-- Pie Chart -->

        <!-- Content Row -->

        <!-- /.container-fluid -->

        <!-- End of Main Content -->

      
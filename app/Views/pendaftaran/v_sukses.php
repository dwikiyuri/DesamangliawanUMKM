  <!-- section pendaftaran -->
  <div class="container-fluid mb-4">
      <div class="container">
        <div class="col-12 text-center contact_margin_svnit">
          <div class="text-center fh5co_heading py-2">Pendaftaran UMKM</div>
        </div>
        <?php
    $session = \Config\Services::session();
   
    if ($session->getFlashdata('success')) {
    ?>
    <div class="alert alert-success">
        <?php echo $session->getFlashdata('success') ?>
       
        <?php
        
    }
    ?>
        
      </div>
    </div>
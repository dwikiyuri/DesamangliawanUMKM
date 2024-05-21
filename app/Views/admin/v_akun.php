
<div class="card-header">
    <i class="fas fa-user me-1"> User Setting </i>
    
</div>
<div class="card-body">
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
    ?><div class="alert alert-success"><?php
                                        echo $session->getFlashdata('success') ?></div>
    <?php
    }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-2">
            <div class="col-lg-7">
            <label for="input_post_title" class="form-label">Nama lengkap</label>
            <input type="text" class="form-control form-control-user" id="input_post_judul" name="nama_lengkap" value="<?php echo (isset($nama_lengkap)) ? $nama_lengkap : "" ?>">
            </div>
        </div>
        <div class="mb-2">
        <div class="col-lg-7">
            <label for="input_password_lama" class="form-label">Password Lama</label>
            <input type="password" class="form-control" id="input_password_lama" name="password_lama">
        </div>
        </div>
        <div class="mb-2">
        <div class="col-lg-7">
            <label for="input_password_baru" class="form-label">Password Baru</label>
            <input type="password" class="form-control" id="input_password_baru" name="password_baru">
        </div>
        </div>
        <div class="mb-2">
        <div class="col-lg-7">
            <label for="input_password_baru_konfirmasi" class="form-label">Konfirmasi Password Baru</label>
            <input type="password" class="form-control" id="input_password_baru_konfirmasi" name="password_baru_konfirmasi">
        </div>
        </div>
        <div class="col-lg-10">
            <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
        </div>
    </form>
</div>


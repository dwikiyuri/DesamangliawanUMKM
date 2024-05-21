<div class="card-header">
    <i class="fas fa-table me-1"></i>
    DataTable Example
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
    ?>
    <div class="alert alert-success">
        <?php
            echo $session->getFlashdata('success') ?></div>
        <?php
    }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="input_nama_toko" class="form-label">Nama Toko / Usaha </label>
                <input type="text" class="form-control <?=($validate->hasError('nama_toko')) ? 'is-invalid': ''; ?>" id="input_nama_toko" placeholder="Masukkan Nama Toko / Usaha" name="nama_toko" value="<?php echo (isset($nama_toko)) ? $nama_toko : "" ?>">
                <div class="invalid-feedback">
                    <?=$validate->getError('nama_toko') ?>
                </div>
            </div>
            <div class="form-group col-md-6">
            <label for="jenis_usaha">Pilih Jenis UMKM/UKM:</label>
                <select class="form-control <?=($validate->hasError('jenis_umkm')) ? 'is-invalid': ''; ?>" name="jenis_umkm" id="jenis_umkm">
                    <option value="">--Pilih Jenis UMKM/UKM--</option>
                    <option value="food" <?php echo (isset($jenis_umkm) && $jenis_umkm == 'food') ? "selected" : "" ?>>Makanan & Minuman</option>
                    <option value="Jasa" <?php echo (isset($jenis_umkm) && $jenis_umkm == 'Jasa') ? "selected" : "" ?>>Jasa</option>
                    <option value="kerajinan" <?php echo (isset($jenis_umkm) && $jenis_umkm == 'kerajinan') ? "selected" : "" ?>>Kerajinan Tangan</option>
                    <option value="pakaian" <?php echo (isset($jenis_umkm) && $jenis_umkm == 'pakaian') ? "selected" : "" ?>>Pakaian & Tekstil</option>
                    <option value="pertanian" <?php echo (isset($jenis_umkm) && $jenis_umkm == 'pertanian') ? "selected" : "" ?>>Pertanian</option>
                    <option value="Barang" <?php echo (isset($jenis_umkm) && $jenis_umkm == 'Barang') ? "selected" : "" ?>>Barang</option>
                    <option value="other" <?php echo (isset($jenis_umkm) && $jenis_umkm == 'other') ? "selected" : "" ?>>Lainnya</option>
                </select>
            </div>
            <div class="invalid-feedback">
                    <?=$validate->getError('jenis_umkm') ?>
            </div>
	    </div>
        <div class="mb-3">
            <label for="input_nama_pemilik" class="form-label">Nama Pemilik Usaha</label>
            <input type="text" class="form-control <?=($validate->hasError('nama_pemilik')) ? 'is-invalid': ''; ?>" id="input_nama_pemilik" placeholder="Nama Pemilik Usaha" name="nama_pemilik" value="<?php echo (isset($nama_pemilik)) ? $nama_pemilik : "" ?>">
            <div class="invalid-feedback">
                    <?=$validate->getError('nama_pemilik') ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="input_alamat" class="form-label">Alamat Toko</label>
            <input type="text" class="form-control <?=($validate->hasError('alamat')) ? 'is-invalid': ''; ?>" id="input_alamat" placeholder="Alamat Toko" name="alamat" value="<?php echo (isset($alamat)) ? $alamat : "" ?>">
            <div class="invalid-feedback">
                    <?=$validate->getError('alamat') ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="input_nomor_telepon" class="form-label">Nomor WhatsApp Usaha</label>
            <input type="text" class="form-control" id="input_nomor_telepon" placeholder="Nomor Telepon" name="nomor_telepon" value="<?php echo (isset($nomor_telepon)) ? $nomor_telepon : "" ?>">
        </div>
        <?php
        if (isset($post_thumbnail,$post_thumbnail2)) {
        ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="mb-3">
                        <img src="<?php echo base_url(LOKASI_UPLOAD . "/" . $post_thumbnail) ?>" class="img-thumbnail" width="100%"/>
                        <input type="checkbox" name="delete_thumbnail" id="delete_thumbnail">
                        <label  for="delete_thumbnail"><- centang untuk menghapus gambar toko 1 </label>
                    </div>
                    
                </div>    
                <div class="form-group col-md-6">
                    <div class="mb-3">
                        <img src="<?php echo base_url(LOKASI_UPLOAD . "/" . $post_thumbnail2)?>" class="img-thumbnail"  width="100%"/>
                        <input  type="checkbox" name="delete_thumbnail2" id="delete_thumbnail2">
                        <label  for="delete_thumbnail2"><- centang untuk menghapus gambar toko 2 </label>
                    </div>
                </div>
            </div>
        <?php
        } ?>
       <div class="form-row">
       <div class="form-group col-md-6">
        <div class="mb-3">
         <img id="imgPreview" src="#" alt="pic" class="img-thumbnail" hidden />
         <a class="btn btn-danger delete-btn btn-block" id="btn_delete" onclick="removeImage()" hidden>Delete</a>
        </div>
        <div class="mb-3">
            <label for="input_post_thumbnail" class="form-label">Foto Toko </label>
            <input type="file" class="form-control" id="input_post_thumbnail" placeholder="Thumbnail" name="post_thumbnail">
        </div>
        </div>
        <div class="form-group col-md-6">
        <div class="mb-3">
         <img id="imgPreview2" src="#" alt="pic" class="img-thumbnail" hidden />
         <a class="btn btn-danger delete-btn btn-block" id="btn_delete2" onclick="removeImage2()" hidden>Delete</a>
        </div>
        <div class="mb-3">
            <label for="input_post_thumbnail2" class="form-label">Foto Toko 2 </label>
            <input type="file" class="form-control" id="input_post_thumbnail2" placeholder="Thumbnail" name="post_thumbnail2">
        </div>
        </div>
    </div>
        <div class="mb-3">
            <label for="input_post_content" class="form-label">Deskripsi Toko</label>
            <textarea maxlength="500" class="form-control <?=($validate->hasError('post_content')) ? 'is-invalid': ''; ?>" id="post_content" name="post_content" rows="6" placeholder="Isikan singkat deskripsi toko (500 character)"><?php echo (isset($post_content)) ? $post_content : '' ?></textarea>
            <div class="invalid-feedback">
                    <?=$validate->getError('post_content') ?>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
            <label for="input_link_shopee" class="form-label">Link Shopee</label>
                <input type="text" class="form-control" id="input_link_shopee" placeholder="Masukkan Link Shopee" name="shopee" value="<?php echo (isset($shopee)) ? $shopee : "" ?>">
            </div>
            <div class="form-group col-md-4">
            <label for="input_link_tokopedia" class="form-label">Link Tokopedia </label>
                <input type="text" class="form-control" id="input_link_tokopedia" placeholder="Masukkan Link Tokopedia" name="tokopedia" value="<?php echo (isset($tokopedia)) ? $tokopedia : "" ?>">
            </div>
            <div class="form-group col-md-4">
            <label for="input_link_lazada" class="form-label">Link Lazada </label>
                <input type="text" class="form-control" id="input_link_lazada" placeholder="Masukkan Link Lazada" name="lazada" value="<?php echo (isset($lazada)) ? $lazada : "" ?>">
            </div>
	    </div>
        <div>
            <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
            <!-- <?php if (isset($post_type) && $post_type == 'request') {
                        echo '<input type="submit" name="accept" value="accept" class="btn btn-primary">';
                    }
                    ?> -->
        </div>
    </form>
</div>


<div class="container-fluid">

                  
                            <?php
    $session = \Config\Services::session();
    if ($session->getFlashdata('warning')) {
    ?>
    <?php
    }
    if ($session->getFlashdata('success')) {
    ?><div class="alert alert-success"><?php
                                        echo $session->getFlashdata('success') ?></div>
    <?php
    }
    ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Request UMKM</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="conatiner">
                                    <div class="row">>
                                    <div class="col-md-4">
                                        <form action="" method="GET">
                                        <input type="text" placeholder="kata kunci..." name="katakunci" class="form-control" value="<?php echo $katakunci ?>">
                                        </form>
                                    </div>
                                    <div class="col-md-4">
                                    <a href="<?php echo site_url("admin/Request/tambah") ?>" class="btn btn-xl btn-primary">+ Tambah UMKM</a>
                                    </div>
                                </div>
                                </div>
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Judul</th>
                                    <th>Status</th>
                                    <th>Post Time</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($record as $value) {
                                    
                                    $post_id = $value['post_id'];
                                    $link_edit = site_url("admin/Request/edit/$post_id");
                                    $link_accept = site_url("admin/Request/daftarumkm/?aksi=accept&post_id=$post_id ");
                                    $link_delete = site_url("admin/Request/daftarumkm/?aksi=hapus&post_id=$post_id");
                                ?>
                                <tr>
                                     <td><?php echo $nomor ?></td>
                                    <td><?php echo $value['nama_toko'] ?></td>
                                    <td><?php echo $value['jenis_umkm'] ?></td>
                                    <td><?php echo tanggal_indonesia($value['post_time']) ?></td>
                                    <td>
                                        <a href="<?php echo $link_accept ?>" class="btn btn-info btn-circle">
                                        <i class="fa fa-check"></i>
                                        </a>
                                        <a href="<?php echo $link_delete  ?>" class="btn btn-danger btn-circle">
                                        <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#exampleModal<?php echo $post_id ?>">
                                        <i class="fa fa-eye"></i>
                                        </a>
                                </td>
                                </tr>
                                <?php
                                $nomor++;
                                }
                                ?>
                            </tbody>
                        </table>
                            </div>
                        </div>
                       <?php
                       echo $pager->links('dt','datatable') 
                       ?>
                </div>
                <!-- /.container-fluid -->
            </div>
            <?php
                                foreach ($record as $value) {
                                    
                                    $post_id = $value['post_id'];
                                    $link_edit = site_url("admin/Request/edit/$post_id");
                                    $link_accept = site_url("admin/Request/daftarumkm/?aksi=accept&post_id=$post_id ");
                                    $link_delete = site_url("admin/Request/daftarumkm/?aksi=hapus&post_id=$post_id");
                                ?>
            <div class="modal fade" id="exampleModal<?php echo $post_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Detail UMKM</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body table-responsive">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                   <span>Nama toko: <span class="font-weight-bold"><?php echo $value['nama_toko'] ?></span></span>
                                </div>
                                <div class="col-md-6 mb-2">
                                   <span>Nama Pemilik: <span class="font-weight-bold"><?php echo $value['nama_pemilik'] ?></span></span>
                                </div>
                                <div class="col-md-6 mb-2">
                                   <span>Jenis UMKM : <span class="font-weight-bold"><?php echo $value['jenis_umkm'] ?></span></span>
                                </div>
                                <div class="col-md-6 mb-2">
                                   <span>Nomor Telepon: <span class="font-weight-bold"><?php echo $value['nomor_telepon'] ?></span></span>
                                </div>
                                <div class="col-md-6 mb-2">
                                   <span>Alamat: <span class="font-weight-bold"><?php echo $value['alamat'] ?></span></span>
                                </div>
                                <div class="col-md-6 mb-2">
                                <?php if (!empty($value['shopee'])) { ?>
                                    <span>Link shopee: <a href="<?php echo $value['shopee'] ?>" target="_blank">Shopee</a></span>
                                    <?php } else { ?>
                                        <span>Link Shopee:<span> Tidak ada Link</span></span>
                                    <?php } ?>
                                </div>
                                <div class="col-md-6 mb-2">
                                <?php if (!empty($value['tokopedia'])) { ?>
                                    <span>Link tokopedia: <a href="<?php echo $value['tokopedia'] ?>" target="_blank">Tokopedia</a></span>
                                    <?php } else { ?>
                                        <span>Link tokopedia:<span> Tidak ada Link</span></span>
                                    <?php } ?>
                                </div>
                                <div class="col-md-6 mb-2">
                                <?php if (!empty($value['lazada'])) { ?>
                                    <span>Link lazada: <a href="<?php echo $value['lazada'] ?>" target="_blank">Lazada</a></span>
                                    <?php } else { ?>
                                        <span>Link lazada:<span> Tidak ada Link</span></span>
                                    <?php } ?>
                                </div>
                                <div class="col-md-12 mb-2">
                                <span class="font-weight-bold">Deskrisi Usaha:</span>
                                <p><?php echo $value['post_content'] ?></p>
                                </div>
                                <div class="col-md-6 mb-2">
                                   <span>Foto Usaha: </span>
                                   <?php if (!empty($value['post_thumbnail'])) { ?>
                                        <img src="<?php echo base_url(LOKASI_UPLOAD . "/" . $value['post_thumbnail']) ?>" style="max-width: 200px; max-height: 200px;" class="img-thumbnail" alt="Foto Usaha">
                                    <?php } else { ?>
                                        Gambar belum diinputkan
                                    <?php } ?>
                                </div>
                                <div class="col-md-6 mb-2">
                                   <span>Foto Usaha 2: </span>
                                   <?php if (!empty($value['post_thumbnail2'])) { ?>
                                        <img src="<?php echo base_url(LOKASI_UPLOAD . "/" . $value['post_thumbnail2']) ?>" style="max-width: 200px; max-height: 200px;" class="img-thumbnail" alt="Foto Usaha">
                                    <?php } else { ?>
                                        Gambar belum diinputkan
                                    <?php } ?>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="<?php echo $link_accept ?>"  class="btn btn-primary">Accept</a>
                        <a href="<?php echo $link_edit ?>"  class="btn btn-warning">Edit</a>
                        <a href="<?php echo $link_delete ?>"  class="btn btn-danger">delete</a>
                    </div>
                    </div>
                </div>
            </div>
            <?php
                                
                                }
                                ?>
            <!-- End of Main Content -->
<!-- datatables script -->


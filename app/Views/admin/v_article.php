<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci, rem! <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Article</h6>
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
                                    <a href="<?php echo site_url("admin/article/tambah") ?>" class="btn btn-xl btn-primary">+ Tambah Article</a>
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
                                    $link_edit = site_url("admin/article/edit/$post_id");
                                    $link_delete = site_url("admin/article/daftararticle/?aksi=hapus&post_id=$post_id");
                                ?>
                                <tr>
                                     <td><?php echo $nomor ?></td>
                                    <td><?php echo $value['post_title'] ?></td>
                                    <td><?php echo $value['post_status'] ?></td>
                                    <td><?php echo tanggal_indonesia($value['post_time']) ?></td>
                                    <td>
                                        <a href="" class="btn btn-info btn-circle">
                                        <i class="fa fa-info"></i>
                                        </a>
                                        <a href="<?php echo $link_edit  ?>" class="btn btn-warning btn-circle">
                                        <i class="fa fa-pencil-square-o"></i>Edit
                                        </a>
                                        <a href="<?php echo $link_delete  ?>" class="btn btn-danger btn-circle">
                                        <i class="fa fa-trash"></i>
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
            
            <!-- End of Main Content -->
<!-- datatables script -->


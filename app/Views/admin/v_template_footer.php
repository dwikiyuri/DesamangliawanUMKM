  <!-- Footer -->
  <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Dwiki Adi Yuri for Desa Mangliawan</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div
      class="modal fade"
      id="logoutModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button
              class="close"
              type="button"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              Cancel
            </button>
            <a class="btn btn-primary" href="<?php echo site_url('admin/logout')  ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('admin') ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('admin') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('admin') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('admin') ?>/js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="<?php echo base_url('admin') ?>/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('admin') ?>/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url('admin') ?>/js/demo/chart-pie-demo.js"></script>



    <!-- Page level plugins -->
    <script src="<?php echo base_url('admin') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('admin') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('admin') ?>/js/demo/datatables-demo.js"></script>
    <script>
$(document).ready( function () {
    $('#example').DataTable({
        "searching": false,
        "ordering": false,
        "paging": false,
        "info": false,
    });
    
} );
</script>
<script>
$(document).ready( function () {
    $('#tabelumkm').DataTable({
        "searching": false,
        "ordering": false,
        "paging": false,
        "info": false,
    });
    
} );
</script>
<script>
   
    function removeImage() {
        // Remove the first image
        $("#imgPreview").attr("src", "");
        $("#imgPreview").attr("hidden", "hidden");
        $("#btn_delete").attr("hidden", "hidden"); 
        // Optionally, reset the input file element to clear the selected image
        $("#input_post_thumbnail").val("");
    }
    function removeImage2() {
        // Remove the first image
        $("#imgPreview2").attr("src", "");
        $("#imgPreview2").attr("hidden", "hidden");
        $("#btn_delete2").attr("hidden", "hidden"); 
        // Optionally, reset the input file element to clear the selected image
        $("#input_post_thumbnail2").val("");
    }
</script>

<script>
            $(document).ready(() => {
                $("#input_post_thumbnail").change(function () {
                    const file = this.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $("#imgPreview").attr("src", event.target.result);
                            $("#imgPreview").removeAttr("hidden");;
                            $("#btn_delete").removeAttr("hidden"); 
                        };
                        reader.readAsDataURL(file);
                    }
                });
                $("#input_post_thumbnail2").change(function () {
                    const file = this.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $("#imgPreview2") .attr("src", event.target.result);
                            $("#imgPreview2").removeAttr("hidden");;
                              $("#btn_delete2").removeAttr("hidden"); 
                        };
                        reader.readAsDataURL(file);
                    }
                });
            });
            
        </script>
  </body>
</html>

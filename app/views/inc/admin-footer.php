<footer class="sticky-footer">
  <div class="container">
    <div class="text-center">
      <small>Copyright © Your Website 2018</small>
    </div>
  </div>
</footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"   aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo URL_ROOT; ?>/Users/logout">Logout</a>
          </div>
        </div>
      </div>
    </div>


     <!-- DeleteCategory Modal-->
     <div class="modal fade" id="categoryDelete" tabindex="-1" role="dialog"   aria-labelledby="categoryDeleteLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="categoryDeleteLabel">Do you Want to delete Category?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Yes" below if you are ready to delete current Category.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-danger delete_cat" href="<?php echo URL_ROOT; ?>/categories/deleteCategory/">Delete</a>
          </div>
        </div>
      </div>
    </div>


    <!-- EditCategory Modal-->
    <div class="modal fade" id="categoryUpdate" tabindex="-1" role="dialog"   aria-labelledby="categoryUpdateLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="categoryUpdateLabel">Do you Want to update Category?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Yes" below if you are ready to update current Category.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary update_cat" href="<?php echo URL_ROOT; ?>/categories/updateCategory/">update</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo URL_ROOT; ?>/js/jquery.min.js"></script>
    <script src="<?php echo URL_ROOT; ?>/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo URL_ROOT; ?>/js/jquery.easing.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?php echo URL_ROOT; ?>/js/Chart.js"></script>
    <script src="<?php echo URL_ROOT; ?>/js/jquery.dataTables.js"></script>
    <script src="<?php echo URL_ROOT; ?>/js/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo URL_ROOT; ?>/js/sb-admin.js"></script>
    <!-- Custom scripts for this page-->
    <script src="<?php echo URL_ROOT; ?>/js/sb-admin-datatables.js"></script>
    <script src="<?php echo URL_ROOT; ?>/js/sb-admin-charts.js"></script>
  </div>
</body>

</html>
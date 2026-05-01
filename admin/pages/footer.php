
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <strong>PSB Darul Ulum Tlasih</strong> Version 3.0
    </div>
    &copy; <?php echo date('Y'); ?> <span class="text-danger">DigitalNode ID</span>.</strong>
</footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <!-- SweetAlert -->
<script src="../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="../assets/plugins/sweetalert/js/qunit-1.18.0.js"></script>
<!-- Toastr -->
<script src="../assets/plugins/toastr/toastr.min.js"></script>
<!-- ChartJS -->
<script src="../assets/plugins/chart.js/Chart.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Summernote -->
<script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
<?php
  if(@$_SESSION['pesan_gagal_koneksi']){ ?>
    <script>
        Swal.fire({
          icon: 'error',
          title: '<?php echo $_SESSION['pesan_gagal_koneksi']; ?>',
          showConfirmButton: true
        })
    </script>
  <?php unset($_SESSION['pesan_gagal_koneksi']); 
  }
?>
<script>
  // $(function () {    
  //   $("#data1").DataTable();
  //   $('#data3').DataTable({
  //     "paging": true,
  //     "lengthChange": false,
  //     "searching": false,
  //     "ordering": true,
  //     "info": true,
  //     "autoWidth": false,
  //     "responsive": true,
  //   });
  // });
  

  $(document).ready(function() {
      var table = $('#data').DataTable( {
          "scrollY": "100px",
          "paging": true,
          "ordering": true
      } );
   
      $('a.toggle-vis').on( 'click', function (e) {
          e.preventDefault();
          var column = table.column( $(this).attr('data-column') );
          column.visible( ! column.visible() );
      } );
  } );

  $(document).ready(function() {
      var table = $('#data1').DataTable( {
          "scrollY": "400px",
          "paging": true,
          "ordering": true
      } );
   
      $('a.toggle-vis').on( 'click', function (e) {
          e.preventDefault();
          var column = table.column( $(this).attr('data-column') );
          column.visible( ! column.visible() );
      } );
  } );

  $(function () {
    // Summernote
    $('#summernote').summernote()
  })
</script>
</body>
</html>

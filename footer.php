 <footer class="main-footer">
   <strong>Copyright &copy; 2024 <a href="#">PT. SUKSES ABADI INDONESIA</a>.</strong>
   All rights reserved.
   <div class="float-right d-none d-sm-inline-block">
     <b>Version</b> 1.0
   </div>
 </footer>

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
   <!-- Control sidebar content goes here -->
 </aside>
 <!-- /.control-sidebar -->
 </div>
 <!-- ./wrapper -->

 <!-- jQuery -->
 <script src="aset/plugins/jquery/jquery.min.js"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="aset/plugins/jquery-ui/jquery-ui.min.js"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
   $.widget.bridge('uibutton', $.ui.button)
 </script>
 <!-- Bootstrap 4 -->
 <script src="aset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- ChartJS -->
 <script src="aset/plugins/chart.js/Chart.min.js"></script>
 <!-- Sparkline -->
 <script src="aset/plugins/sparklines/sparkline.js"></script>
 <!-- JQVMap -->
 <script src="aset/plugins/jqvmap/jquery.vmap.min.js"></script>
 <script src="aset/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
 <!-- jQuery Knob Chart -->
 <script src="aset/plugins/jquery-knob/jquery.knob.min.js"></script>
 <!-- daterangepicker -->
 <script src="aset/plugins/moment/moment.min.js"></script>
 <script src="aset/plugins/daterangepicker/daterangepicker.js"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <script src="aset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
 <!-- Summernote -->
 <script src="aset/plugins/summernote/summernote-bs4.min.js"></script>
 <!-- overlayScrollbars -->
 <script src="aset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
 <!-- AdminLTE App -->
 <script src="aset/dist/js/adminlte.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="aset/dist/js/demo.js"></script>
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="aset/dist/js/pages/dashboard.js"></script>
 <!-- DataTables  & Plugins -->
 <script src="aset/plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="aset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="aset/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="aset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <script src="aset/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
 <script src="aset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
 <script src="aset/plugins/jszip/jszip.min.js"></script>
 <script src="aset/plugins/pdfmake/pdfmake.min.js"></script>
 <script src="aset/plugins/pdfmake/vfs_fonts.js"></script>
 <script src="aset/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
 <script src="aset/plugins/datatables-buttons/js/buttons.print.min.js"></script>
 <script src="aset/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
 <!-- AdminLTE App -->
 <script src="aset/dist/js/adminlte.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="aset/dist/js/demo.js"></script>
 <!-- Page specific script -->
 <script src="aset/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
 <script>
   $(function() {
     $("#example1").DataTable({
       "responsive": true,
       "lengthChange": false,
       "autoWidth": false,
       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
     $('#example2').DataTable({
       "paging": true,
       "lengthChange": false,
       "searching": false,
       "ordering": true,
       "info": true,
       "autoWidth": false,
       "responsive": true,
     });
     $('#reservationdate').datetimepicker({
       format: 'L'
     });
   });
 </script>
 </body>

 </html>
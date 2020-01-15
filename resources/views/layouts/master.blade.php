<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title', 'SB Admin | Dashboard')</title>
  {{-- <title>SB Admin - Dashboard</title> --}}

  <!-- Custom fonts for this template-->
  <link href="{{('/admin/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{('/admin/assets/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{('/admin/assets/css/sb-admin.css')}}" rel="stylesheet">

</head>

<body id="page-top">
<!-- navbar -->
@include('layouts/includes/_navbar')
<div id="wrapper">

    <!-- Sidebar -->
    @include('layouts/includes/_sidebar')
    <div id="content-wrapper">

      <div class="container-fluid">
        @yield('content')
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->

    </div>
    <!-- /.content-wrapper -->

</div>
<div class="container">
    <div class="row pb-3"></div>
</div>
<!-- /#wrapper -->
@include('layouts/includes/_footer')
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="{{('/admin/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{('/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{('/admin/assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for Upload File -->
  <script src="{{('/admin/assets/js/compiled-4.11.0.min.js')}}"></script>
  <script src="{{('/admin/assets/js/mdb-plugins-gathered.min.js')}}"></script>

  <!-- Page level plugin JavaScript-->
  <script src="{{('/admin/assets/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{('/admin/assets/vendor/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{('/admin/assets/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#dataPost').DataTable({
            "order": [[ 3, "desc" ]],
            initComplete: function () {
                this.api().columns('.jenis').every( function () {
                    var column = this;
                    var select = $('<select name="dataPost_length" aria-controls="dataPost" class="custom-select custom-select-sm form-control form-control-sm" id="exampleFormControlSelect1"><option value=""></option></select>')
                        .appendTo( $('#typePost') )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        });

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    });
                });
            }
        });
        $('#dataPostPerizinan').DataTable({
            "order": [[ 4, "desc" ]],
            initComplete: function () {
                this.api().columns('#kategori').every( function () {
                    var column = this;
                    var select = $('<select name="dataPost_length" aria-controls="dataPost" class="custom-select custom-select-sm form-control form-control-sm" id="exampleFormControlSelect1"><option value=""></option></select>')
                        .appendTo( $('#typePost') )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        });

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    });
                });
            }
        });
        $('#dataContract').DataTable({
            "order": [[ 1, "desc" ]]
        });
        $('#dataLog').DataTable({
            "ordering": false,
            "lengthMenu": [[3, 5, 10, 25, -1], [3, 5, 10, 25, "All"]]
        });
        $('#dataLogDetail').DataTable({
            "order": [[ 3, "desc" ]]
        });
    });
  </script>

  <!-- Custom scripts for all pages-->
  <script src="{{('/admin/assets/js/sb-admin.min.js')}}"></script>

  <!-- Demo scripts for this page-->
  <script src="{{('/admin/assets/js/demo/datatables-demo.js')}}"></script>
  <script src="{{('/admin/assets/js/demo/chart-area-demo.js')}}"></script>
</body>

</html>

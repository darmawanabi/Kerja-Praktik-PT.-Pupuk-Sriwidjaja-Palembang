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

  <!-- Custom scripts for all pages-->
  <script src="{{('/admin/assets/js/sb-admin.min.js')}}"></script>
  <script src="{{('/admin/assets/js/datatables-custom.js')}}"></script>
  <script src="{{('/admin/assets/js/reminder-button.js')}}"></script>
  <script type="text/javascript">
    window.setTimeout(function () {
        $(".alert").alert('close');
    }, 5000);
    $( document ).ready(function() {
        $('button[id^="btnEditKontrak"]').on('click', function() {
            var full_id = this.id;
            var id = full_id.replace("btnEditKontrak", "");
            var tr = $('#kontrak' + id);
            var jenis = document.getElementById("jenisKontrak" + id).innerHTML;

            tr.children().remove();

            var td = $('<td colspan="2"><form action="/master" method="post">@method("patch")@csrf<input type="hidden" name="id" value="' + id + '" /><input type="hidden" name="jenis" value="kontrak" /><div class="row no-gutters"><div class="col-md-8 text-left justify-content-center align-self-center"><div class="form-group mb-0"><input name="nama" type="text" class="form-control @error("nama") is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jenis Kontrak" value="' + jenis + '"></div></div><div class="col-md-4 text-right justify-content-center align-self-center"><button type="submit" class="btn btn-primary btn-sm">Ubah</button>\n<button type="button" class="btn btn-secondary btn-sm" id="btnBatalKontrak' + id + '">Batal</button></div></div></form></td>').appendTo($('#kontrak' + id));

            $('button[id^="btnBatalKontrak"]').on('click', function() {
                tr.children().remove();

                var td2 = $('<td id="jenisKontrak' + id + '">' + jenis + '</td><td class="text-right"><button type="button" class="btn btn-warning btn-sm" id="btnEditKontrak' + id + '">Edit</button>\n<a href="/master/kontrak/' + id + '/delete" class="btn btn-danger btn-sm">Delete</a></td>').appendTo($('#kontrak' +id));
            });
        });
        $('button[id^="btnEditPerizinan"]').on('click', function() {
            var full_id = this.id;
            var id = full_id.replace("btnEditPerizinan", "");
            var tr = $('#perizinan' + id);
            var jenis = document.getElementById("jenisPerizinan" + id).innerHTML;

            tr.children().remove();

            var td = $('<td colspan="2"><form action="/master" method="post">@method("patch")@csrf<input type="hidden" name="id" value="' + id + '" /><input type="hidden" name="jenis" value="perizinan" /><div class="row no-gutters"><div class="col-md-8 text-left justify-content-center align-self-center"><div class="form-group mb-0"><input name="nama" type="text" class="form-control @error("nama") is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jenis Perizinan" value="' + jenis + '"></div></div><div class="col-md-4 text-right justify-content-center align-self-center"><button type="submit" class="btn btn-primary btn-sm">Ubah</button>\n<button type="button" class="btn btn-secondary btn-sm" id="btnBatalPerizinan' + id + '">Batal</button></div></div></form></td>').appendTo($('#perizinan' + id));

            $('button[id^="btnBatalPerizinan"]').on('click', function() {
                tr.children().remove();

                var td2 = $('<td id="jenisPerizinan' + id + '">' + jenis + '</td><td class="text-right"><button type="button" class="btn btn-warning btn-sm" id="btnEditPerizinan' + id + '">Edit</button>\n<a href="/master/perizinan/' + id + '/delete" class="btn btn-danger btn-sm">Delete</a></td>').appendTo($('#perizinan' +id));
            });
        });
    });
  </script>

  <!-- Demo scripts for this page-->
  <script src="{{('/admin/assets/js/demo/datatables-demo.js')}}"></script>
  <script src="{{('/admin/assets/js/demo/chart-area-demo.js')}}"></script>
</body>

</html>

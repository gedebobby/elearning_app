<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="_token" content="{{csrf_token()}}" />
  <link href="{{ url('/assets/img/logo/logo.png') }}" rel="icon">
  <title>{{$title}}</title>
  <link href="{{ url('') }}/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="{{ url('') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="{{ url('') }}/assets/css/ruang-admin.min.css" rel="stylesheet">
  {{-- <link href="{{ url('') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" /> --}}
  
</head>

<body>
  
    <div class="container">
        <div class="card my-4">
            <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-center">
              <h6 class="m-0 font-weight-bold text-light">Hasil Ujian</h6>
            </div>
            <div class="card-body">
                <hr>
                <table class="mx-auto">
                    <tr>
                        <td><h4>Benar</h4></td>
                        <td><h4> : </h4></td>
                        <td><h4><span class="badge badge-warning"> 20</span></h4></td>
                    </tr>
                    <tr>
                        <td><h4>Salah</h4></td>
                        <td><h4> : </h4></td>
                        <td><h4><span class="badge badge-warning"> 20</span></h4></td>
                    </tr>
                    <tr>
                        <td><h4>Nilai</h4></td>
                        <td><h4> : </h4></td>
                        <td><h4><span class="badge badge-warning"> 20</span></h4></td>
                    </tr>
                </table>
                <hr>
                <div class="text-center">
                    <a href="" class="btn btn-lg btn-danger">Kembali</a>
                </div>
            </div>
          </div>
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> 

<script src="{{ url('assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('assets') }}/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="{{ url('assets') }}/js/ruang-admin.min.js"></script>

</body>

</html>
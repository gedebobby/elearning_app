<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="_token" content="{{csrf_token()}}" />
  {{-- <link href="{{ url('/assets/img/logo/logo.png') }}" rel="icon"> --}}
  <title>{{$title}}</title>
  <link href="{{ url('') }}/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="{{ url('') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="{{ url('') }}/assets/css/ruang-admin.min.css" rel="stylesheet">
  {{-- <link href="{{ url('') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" /> --}}
  <link rel="apple-touch-icon" sizes="180x180" href="{{ url('') }}/assets/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ url('') }}/assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ url('') }}/assets/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="{{ url('') }}/assets/img/favicon/site.webmanifest">
</head>
  <!-- <style>
  body{
    background-image:url("/assets/img/logo/gambar sekolah.jpg");
    background-repeat:no-repeat;
    background-size:cover;
  }
  </style> -->
<body>
  <div>
    @yield('auth')
  </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> 

<script src="{{ url('assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('assets') }}/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="{{ url('assets') }}/js/ruang-admin.min.js"></script>

</body>

</html>
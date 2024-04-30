<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>@yield('title', 'Holiday Resort')</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('resources/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Material Design Bootstrap -->
  <!-- <link href="{{ asset('resources/css/mdb.min.css') }}" rel="stylesheet"> -->
  <!-- Your custom styles (optional) -->
  <link href="{{ asset('resources/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">
  <link rel="icon" href="{{ asset('resources/favicon/favicon.ico') }}" type="image/x-icon">
</head>

<body>

  <!-- Start your project here-->
  @include('layouts.navbar')

  @yield('content')

  @include('layouts.footer')
  <!-- Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="{{ asset('resources/js/jquery-3.4.1.min.js') }}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{ asset('resources/js/popper.min.js') }}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{ asset('resources/js/bootstrap.min.js') }}"></script>

  <!-- MDB core JavaScript -->
  <!-- <script type="text/javascript" src="{{ asset('resources/js/mdb.min.js') }}"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
  <!-- Icon JavaScript -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


  @yield('scripts')

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>@yield('title', 'Holiday Resort')</title>
  <meta name="keywords" content="holiday, resort, hetel, Mabian">
  <meta name="description" content="Escape to our tranquil mountain resort nestled in the heart of the forest. Discover the perfect blend of relaxation and adventure with our holiday accommodations and room reservation services. Immerse yourself in nature's beauty while enjoying comfortable lodging and exploring nearby hiking trails, scenic views, and outdoor activities. Book your stay with us and experience the ultimate mountain getaway.">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Font Google -->
  <link href='//fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('resources/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Material Design Bootstrap -->
  <!-- <link href="{{ asset('resources/css/mdb.min.css') }}" rel="stylesheet"> -->
  <!-- Your custom styles (optional) -->
  <link href="{{ asset('resources/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('resources/css/weather.css') }}" rel="stylesheet" type="text/css" media="all" />
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
  <script src="{{ asset('resources/js/skycons.js') }}"></script>


  @yield('scripts')

</body>

</html>

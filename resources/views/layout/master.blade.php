<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>TO-DO Tasks with Laravel</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      @include('layout.header')
      @include('layout.nav')
    </div>

    <main role="main" class="container">
      <div class="row">
        @yield('content')
        @include('layout.sidebar')
      </div><!-- /.row -->
    </main><!-- /.container -->

    @include('layout.footer')
</body>
</html>
    
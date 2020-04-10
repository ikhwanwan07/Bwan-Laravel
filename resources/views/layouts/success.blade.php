<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Nomads</title>
    <link
      href="https://fonts.googleapis.com/css?family=Assistant&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Assistant:200,300,400,600,800|Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{url('frontend/bootstrap/css/bootstrap.css')}}" />
    
    <link rel="stylesheet" href="{{url('frontend/styles/main.css')}}" />
  </head>
  <body>
    <!-- Semantic elements -->
    <!-- https://www.w3schools.com/html/html5_semantic_elements.asp -->

    <!-- Bootstrap navbar example -->

    <!-- https://www.w3schools.com/bootstrap4/bootstrap_navbar.asp -->
    <!--Navbar-->
    <div class="container">
      <nav class="row navbar navbar-expand-lg navbar-light bg-white">
        <div class="navbar-nav ml-auto mr-auto mr-sm-auto mr-lg-0 mr-md-auto">
          <a href="{{route('home')}}" class="navbar-brand">
            <img src="{{url('frontend/images/logo_nomads.png')}}" alt="" />
          </a>
        </div>
        <ul class="navbar-nav mr-auto d-none d-lg-block">
          <li>
            <span class="text-mute">
              | &nbsp; Beyond the explorer of the world</span
            >
          </li>
        </ul>
      </nav>
    </div>
    <!--End Navbar-->
    @yield('content')

    <script src="{{url('frontend/bootstrap/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{url('frontend/bootstrap/js/bootstrap.js')}}"></script>
    
  </body>
</html>

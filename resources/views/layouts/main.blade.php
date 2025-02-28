<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>Students</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href=" {{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href=" {{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Dark Theme Styles -->
    <style>
      body {
        color: #f5f5f5; /* Light text */
        background: #121212; /* Dark background */
        font-family: 'Varela Round', sans-serif;
      }

      .navbar {
        background: #333333; /* Dark navbar */
        border-bottom: 1px solid #444444; /* Navbar border */
      }

      .navbar .navbar-brand {
        color: #ffffff; /* Light text for the brand */
      }

      .navbar .navbar-brand strong {
        color: #03A9F4; /* Light blue for strong text */
      }

      .navbar .nav-link {
        color: #cccccc; /* Light text for navigation links */
      }

      .navbar .nav-link:hover,
      .navbar .nav-item.active .nav-link {
        color: #ffffff; /* White text on hover/active */
      }

      .navbar-toggler-icon {
        filter: invert(1); /* Light icon for the toggle button */
      }

      /* Dark theme for the page content */
      .container {
        background: #1e1e1e; /* Dark container background */
        color: #f5f5f5; /* Light text */
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.6);
      }

      a {
        color: #03A9F4; /* Light blue links */
        text-decoration: none;
      }

      a:hover {
        color: #2196F3; /* Slightly lighter blue on hover */
      }

      button {
        background: #444444; /* Dark button background */
        color: #f5f5f5; /* Light button text */
        border: 1px solid #555555;
      }

      button:hover {
        background: #555555; /* Slightly lighter hover */
      }
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <span class="navbar-brand text-uppercase">            
            <strong>Student Management System</strong>
        </span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggler" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
            
        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbar-toggler">
          <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{ route('colleges.index') }}" class="nav-link {{ Request::routeIs('colleges.index') ? 'active' : '' }}">Roles</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('students.index') }}" class="nav-link {{ Request::routeIs('students.index') ? 'active' : '' }}">Weapons</a>
            </li>
        </ul>
        
        
        </div>
      </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
      @yield('content')
    </div>
    
    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }} "></script>
    <script src="{{ asset('js/popper.min.js') }} "></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
  
  </body>
</html>

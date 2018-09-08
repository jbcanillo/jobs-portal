@if(Auth::user() && Auth::user()->role=='Employer')
  <!DOCTYPE html>
  <html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8" />
    <meta name="_token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Core CSS Files -->
    <link href="{{ asset('template/material_design/css/material-dashboard.css?v=2.1.0') }}" rel="stylesheet">
    <!-- CSS for DataTables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
    <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.material.min.css">-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"> </script>

    <!-- Javascript for Bootbox confirmation box -->
    <script src="{{ asset('vendor/bootbox/bootbox.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

    <style>
      .loader {
        position: fixed;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('{{ asset("img/loading.gif") }}') 50% 50% no-repeat rgb(249,249,249);
        opacity: .8;
    }
    .sidebar {
        background-color: #ffffff;
    }
    </style>
  </head>
  <body>
      <div class="loader"></div>
    <div class="wrapper">
      <div class="sidebar" data-color="azure" data-background-color="blue" data-image="{{ asset("img/sidebarx.jpg") }}">
        <div class="logo">
            <center>
            <a class="navbar-brand" href="#">
              <img src="{{ asset('template/landing_page/images/logo-small.png') }}" alt=""></a>
            </center>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="{{ ($current_route_name == 'dashboard' || $current_route_name == '' ) ? 'nav-item active' : 'nav-item' }}">
              <a class="nav-link" href="{{ url('dashboard') }}">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="{{ ($current_route_name == 'applicants') ? 'nav-item active' : 'nav-item' }}">
              <a class="nav-link" href="{{ url('applicants') }}">
                <i class="material-icons">assignment_ind</i>
                <p>Applicants</p>
              </a>
            </li>
            <li class="{{ ($current_route_name == 'requests') ? 'nav-item active' : 'nav-item' }}">
              <a class="nav-link" href="{{ url('requests') }}">
                <i class="material-icons">assignment</i>
                <p>Requests</p>
              </a>
            </li>
            <li class="{{ ($current_route_name == 'job_matching') ? 'nav-item active' : 'nav-item' }}">
              <a class="nav-link" href="{{ url('job_matching') }}">
                <i class="material-icons">find_in_page</i>
                <p>Job Matching</p>
              </a>
            </li>
            <li class="{{ ($current_route_name == 'reviews') ? 'nav-item active' : 'nav-item' }}">
              <a class="nav-link" href="{{ url('reviews') }}">
                <i class="material-icons">rate_review</i>
                <p>Customer Reviews</p>
              </a>
            </li>
            <li class="nav-item active-pro ">
                  <a class="nav-link" href="{{ url('preferences') }}">
                      <i class="material-icons">settings</i>
                      <p>Preferences</p>
                  </a>
                  <a class="nav-link" href="{{ url('logout') }}">
                    <i class="material-icons">exit_to_app</i>
                    <p>Logout</p>
                </a>
              </li>
              
          </ul>
        </div>
      </div>
      <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <a class="navbar-brand">Welcome Angie Monterde Ceniza! [Administrator]</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
              <span class="sr-only">Toggle navigation</span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
              
              <ul class="navbar-nav">
                
                <li class="nav-item dropdown">
                  <a class="nav-link" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">notifications</i>
                    <span class="notification">99</span>
                    <p class="d-lg-none d-md-block">
                      Notifications
                    </p>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    @yield('notifications')
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">account_circle</i>
                    <p class="d-lg-none d-md-block">
                      Account
                    </p>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                    <a class="dropdown-item" href="{{ url('preferences') }}"><i class="material-icons">settings</i>&nbspPreferences</a>
                    <a class="dropdown-item" href="{{ url('logout') }}"><i class="material-icons">exit_to_app</i>&nbspLogout</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
          <div class="container-fluid">
              <!-- Add your contents here -->
              @yield('content')
          </div>
        </div>
        <footer class="footer">
          <div class="container-fluid">
            <nav class="float-left">
            </nav>
            <div class="copyright float-right">
              &copy;
              <script>
                document.write(new Date().getFullYear())
              </script>&nbsp {{ config('app.name') }}
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('template/material_design/js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('template/material_design/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('template/material_design/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('template/material_design/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!-- Chartist JS -->
    <script src="{{ asset('template/material_design/js/plugins/chartist.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('template/material_design/js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('template/material_design/js/material-dashboard.min.js?v=2.1.0') }}" type="text/javascript"></script>
    <!-- For Loading animation -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript">
      $(window).load(function() {
          $(".loader").fadeOut("slow");
      });
      </script>
    <!-- For Dashboard -->
    <script type="text/javascript">
      $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        md.initDashboardPageCharts();
      });
    </script>
    <!-- Javascript for DataTables -->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <!--<script src="https://cdn.datatables.net/1.10.19/js/dataTables.material.min.js"></script>-->
    @yield('datatable')
  </body>
  </html>
  @else
    <script>window.location = "/logout";</script>
  @endif
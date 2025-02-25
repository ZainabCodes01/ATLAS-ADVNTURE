<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Atlas Adventure - Admin Template</title>
    <meta name="description" content="Atlas Adventure - Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/build/admin/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/build/admin/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/build/admin/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/build/admin/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/build/admin/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/build/admin/vendors/jqvmap/dist/jqvmap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="/build/admin/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel" style="background-color:#0C243C">
        <nav class="navbar navbar-expand-sm navbar-default" style="background-color:#0C243C">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="{{ asset('wiAtlas7.png') }}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{ asset('wiAtlas7.png') }}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{route('admin.dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">UI elements</h3><!-- /.menu-title -->
                    <li>
                        <a href="{{route('categories.index')}}"> <i class="menu-icon fa fa-tasks"></i>Categories </a>
                    </li>
                    <li>
                        <a href="{{route('countries.index')}}"> <i class="menu-icon fa fa-tasks"></i>Countires  </a>
                    </li>
                    <li>
                        <a href="{{route('provinces.index')}}"> <i class="menu-icon fa fa-tasks"></i>Provinces </a>
                    </li>
                    <li>
                        <a href="{{route('city.index')}}"> <i class="menu-icon fa fa-tasks"></i>Cities </a>
                    </li>
                    <li>
                        <a href="{{route('town.index')}}"> <i class="menu-icon fa fa-tasks"></i>Towns </a>
                    </li>
                    <li>
                        <a href="{{route('places.index')}}"> <i class="menu-icon fa fa-tasks"></i>Places </a>
                    </li>
                    <li>
                        <a href="{{route('slider.index')}}"> <i class="menu-icon fa fa-tasks"></i>Slider </a>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel" style="background-color:#C9D1D5">

        <!-- Header-->
        <header id="header" class="header" style="background-color:#C9D1D5">

            <div class="header-menu">
               <div class="col-sm-5">
                @auth
                <h3>Welcome, <strong>{{ Auth::user()->name }}</strong> 👋</h3>
               @endauth
               </div>

                <div class="col-sm-7 ms-5">
                    <div class="user-area dropdown float-right">
                        <a id="navbarDropdown" class="nav-link d-flex align-items-center dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if(Auth::user() && Auth::user()->profile_image)
                                <img src="{{ asset('profile_images/' . Auth::user()->profile_image) }}"
                                     class="rounded-circle" width="40" height="40" alt="User Image">
                            @else
                                <i class="fas fa-user-circle text-secondary" style="font-size: 40px;"></i>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('profile.index')}}"><i class="fa fa-user"></i> My Profile</a>
                            <a class="dropdown-item" href="{{route('logout')}}"><i class="fa fa-power-off"></i> Logout</a>
                        </div>

                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#navbarDropdown').click(function() {
                            $('.dropdown-menu').toggleClass('show');
                        });
                    });
                    </script>



            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
        @yield('content')
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="/build/admin/vendors/jquery/dist/jquery.min.js"></script>
    <script src="/build/admin/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="/build/admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="/build/admin/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="/build/admin/assets/js/dashboard.js"></script>
    <script src="/build/admin/assets/js/widgets.js"></script>
    <script src="/build/admin/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="/build/admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="/build/admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>


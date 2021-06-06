<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

  <!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="{{ asset('assets/vendor_components/bootstrap/dist/css/bootstrap.css')}}">

    <!-- Bootstrap-extend -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap-extend.css') }}">

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/vendor_components/select2/dist/css/select2.min.css') }}">

	<!-- theme style -->
	<link rel="stylesheet" href="{{ asset('css/master_style.css') }}">


	<link rel="stylesheet" href="{{ asset('css/skins/_all-skins.css') }}">

	<!-- HTML5 Shim and Respond.js') }} IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js') }} doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') }}"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
	<![endif]-->

</head>
<body class="hold-transition skin-yellow sidebar-mini">

        <header class="main-header">
            <!-- Logo -->
            <a href="index.html" class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <b class="logo-mini">
                  <span class="light-logo"><img src="{{ asset('images/logo-light.png') }}" alt="logo"></span>
                  <span class="dark-logo"><img src="{{ asset('images/logo-dark.png') }}" alt="logo"></span>
              </b>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg">
                  {{-- <img src="{{ asset('images/logo-light-text.png') }}" alt="logo" class="light-logo">
                    <img src="{{ asset('images/logo-dark-text.png') }}" alt="logo" class="dark-logo"> --}}
              </span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
              <!-- Sidebar toggle button-->
              <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
              </a>

              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                  <li class="search-box">
                   
                  </li>

                  <!-- Messages -->
                  <li class="dropdown messages-menu">
                  
                  </li>
                                 <li class="dropdown tasks-menu">
        
                  </li>
                  <!-- User Account -->
                  <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{ Auth::user()->name }}
                      {{-- <img src="{{ asset('images/user5-128x128.jpg') }}" class="user-image rounded-circle" alt="User Image"> --}}
                    </a>
                    <ul class="dropdown-menu scale-up">
                      <!-- User image -->
                      <li class="">
                        {{-- <img src="{{ asset('images/user5-128x128.jpg') }}" class="float-left rounded-circle" alt="User Image"> --}}

                        <p>
                            {{ Auth::user()->name }}
                          <small class="mb-5">{{ Auth::user()->email }}</small>
                          {{-- <a href="#" class="btn btn-danger btn-sm btn-rounded">View Profile</a> --}}
                        </p>
                      </li>
                      <!-- Menu Body -->
                      <li class="user-body">
                        <div class="row no-gutters">
                            @if (Auth::user()->role == 'lecturer')
                          <div class="col-12 text-left">
                            <a href="{{route('profile')}}"><i class="ion ion-person"></i> My Profile</a>
                          </div>
                        @endif

                        <div role="separator" class="divider col-12"></div>

                        <div role="separator" class="divider col-12"></div>
                          <div class="col-12 text-left">
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             <i class="fa fa-power-off"></i> Logout
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                            {{-- <a href="#"><i class="fa fa-power-off"></i> Logout</a> --}}
                          </div>
                        </div>
                        <!-- /.row -->
                      </li>
                    </ul>
                  </li>

                </ul>
              </div>
            </nav>
          </header>
      
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
		 <div class="ulogo">
			 <a href="/">
			  <!-- logo for regular state and mobile devices -->
			  <span>CBLR</span>
			</a>
		</div>
        <div class="image">
          {{-- <img src="{{ asset('images/user2-160x160.jpg') }}" class="rounded-circle" alt="User Image"> --}}
        </div>
        <div class="info">
          <p>{{Str::title(Auth::user()->role )}} Dashboard</p>

            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ion ion-power"></i></a>
        </div>
      </div>
      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
		<li class="nav-devider"></li>
        <li class="header nav-small-cap">PERSONAL</li>
        <li class="@if(Route::is('home'))
        active
        @endif">
          <a href="{{route('home')}}">
            <i class="icon-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
        @if (Auth::user()->role == 'student')

        <li class="@if(Route::is('lecturers'))
        active
        @endif">
            <a href="{{route('lecturers')}}">
              <i class="icon-people"></i>
              <span>Lecturer</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
           
          </li>
          <li class="@if(Route::is('course.add'))
        active
        @endif">
            <a href="{{route('course.add')}}">
              <i class="icon-people"></i>
              <span>Add Course</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            
          </li>
        @endif
        @if (Auth::user()->role == 'lecturer')

        <li class="@if(Route::is('students'))
        active
        @endif">
            <a href="{{route('students')}}">
              <i class="icon-people"></i>
              <span>My Students</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
           
          </li>
          <li class="@if(Route::is('lecturer.compose'))
        active
        @endif">
            <a href="{{route('lecturer.compose')}}">
              <i class="fa fa-edit"></i>
              <span>Composer material</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
           
          </li>
          <li class="@if(Route::is('profile'))
        active
        @endif">
            <a href="{{route('profile')}}">
              <i class="ion ion-person"></i>
              <span>Profile</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
           
          </li>
        @endif





      </ul>
    </section>
  </aside>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
  




      <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>


    <!-- ./wrapper -->



        <!-- jQuery 3 -->
        <script src="{{ asset('assets/vendor_components/jquery/dist/jquery.js') }}"></script>

        <!-- popper -->
        <script src="{{ asset('assets/vendor_components/popper/dist/popper.min.js') }}"></script>

        <!-- Bootstrap 4.0-->
        <script src="{{ asset('assets/vendor_components/bootstrap/dist/js/bootstrap.js') }}"></script>

        <!-- Select2 -->
	    <script src="{{ asset('assets/vendor_components/select2/dist/js/select2.full.js') }}"></script>

        {{-- <!-- InputMask -->
        <script src="{{ asset('assets/vendor_plugins/input-mask/jquery.inputmask.js') }}"></script>
        <script src="{{ asset('assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
        <script src="{{ asset('assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js') }}"></script> --}}

        <!-- Slimscroll -->
        <script src="{{ asset('assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

        <!-- FastClick -->
        <script src="{{ asset('assets/vendor_components/fastclick/lib/fastclick.js') }}"></script>



        <!-- This is data table -->
        <script src="{{ asset('assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js') }}"></script>

        <!-- Sparkline -->
        <script src="{{ asset('assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>

        <!--  App -->
        <script src="{{ asset('js/template.js') }}"></script>

        <!--  for advanced form element -->
	    <script src="{{ asset('js/pages/advanced-form-element.js') }}"></script>

        <!-- Bootstrap WYSIHTML5 -->
	    <script src="{{ asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
	
        <script>
            $(function () {
              //Add text editor
              $("#compose-textarea").wysihtml5();
            });
          </script>
    </body>
    </html>

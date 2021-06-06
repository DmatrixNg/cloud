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
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('front/css/app.css') }}" rel="stylesheet"> --}}
    <!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('front/css/vendors_css.css') }}">

	<!-- Style-->
	<link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('front/css/skin_color.css') }}">

</head>
<body class="theme-primary">
    

        <section class="py-50">
            @yield('content')
        </section>
    {{-- </div> --}}
   

	<!-- Vendor JS -->
	<script src="{{asset("front/js/vendors.min.js")}}"></script>
	<!-- Corenav Master JavaScript -->
    {{-- <script src="{{asset("front/corenav-master/coreNavigation-1.1.3.js")}}"></script> --}}
    {{-- <script src="{{asset("front/js/nav.js")}}"></script> --}}
	{{-- <script src="{{asset("front/assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js")}}"></script> --}}

	<!-- CryptoCurrency front end -->
	{{-- <script src="{{asset("front/js/template.js")}}"></script> --}}



</body>
</html>

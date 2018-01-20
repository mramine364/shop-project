<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    @yield('stylesheet')
</head>

<body>
	<div id="app" class="container-fluid">		

          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">{{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">            
                <li class="nav-item @yield('nearby')">
                  <a class="nav-link" href="{{ route('main') }}">Nearby Shops</a>
                </li>                
                <li class="nav-item @yield('prefs')">
                  <a class="nav-link" href="{{ route('prefs') }}">My preferred Shops</a>
                </li>
                @if(Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Hello {{ Auth::user()->name }}
                    </a>
                </li>
                <li class="nav-item">
                    {{--  logout requires POST as HTTP request method  --}}
                    <a class="nav-link" href="{{ route('logout') }}" @click.prevent="Logout">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                    </a>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </a>
                </li>
                @endif
              </ul>              
            </div>
          </nav>

		@yield('content')
	</div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"></script>    
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/vue.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>

</html>
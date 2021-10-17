<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,900;1,900&display=swap" rel="stylesheet"> 
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('css')
</head>
<body>
    <div id="app" style="background: white none repeat scroll 0% 0%;overflow-x: hidden;"> 

        <nav class="navbar navbar-light "style="background-color: #fff;">
            <a class="navbar-brand" href="{{ url('/')}}">
              <img src="{{ asset('img\logo-empresa.jpg') }}" width="100%" height="50px" class="d-inline-block align-top" alt="">
            </a>
          </nav>
          
        <main class="py-1">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

    @yield('js')

    <style>
        .dropzone {
    color: #40444f;
	border: .2rem dashed #616778;
	border-radius: 1.5rem;
	cursor: pointer;
	-webkit-transition: color 0.2s ease-out, border-color 0.2s ease-out;
	-moz-transition: color 0.2s ease-out, border-color 0.2s ease-out;
	-o-transition: color 0.2s ease-out, border-color 0.2s ease-out;
	-ms-transition: color 0.2s ease-out, border-color 0.2s ease-out;
	transition: color 0.2s ease-out, border-color 0.2s ease-out;
    height: 30vh;
    }

    .dropzone .dz-message {
	text-align: center;
	margin: 4em 0;
}

.dropzone .dz-message .dz-button {
	font-size: 1.5em !important;
}
.btn-primary {
	color: #fff;
	background-color: #ffafdc;
	border-color: #ffafdc;
}

.btn-primary.focus, .btn-primary:focus, .btn-primary:hover {
	color: #fff;
	background-color: #ed4b87;
	border-color: #ed4b87;
}

    </style>
</body>
</html>

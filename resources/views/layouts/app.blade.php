<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<meta name="color-scheme" content="dark">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-dark-5@1.1.3/dist/css/bootstrap-nightshade.min.css" rel="stylesheet">
	{!! ReCaptcha::htmlScriptTagJsApi() !!}

    <title>Arkania</title>
	</head>
	<body>
		@include('widgets.login-modal')

		<nav class="navbar navbar-dark bg-dark">
			<div class="container-fluid">
			  <span class="navbar-brand mb-0 h1">Navbar</span>
			  <span class="d-flex">
				@if (Auth::check())
					<a class="btn btn-outline-info" href="{{ route('logout') }}">Logout</a>
				@else
					<button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
				@endif
			  </span>
			</div>
		  </nav>
		<div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="content">
                        @yield('content')
                    </div>
                </div>
                <div class="col-md-3">
                    @include('widgets.top-player')
                </div>
            </div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap-dark-5@1.1.3/dist/js/darkmode.min.js"></script>
	</body>
</html>

<!doctype html>
<html lang="es" data-theme="light">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<title>
		{{ env('APP_NAME') }} | @yield('title')
	</title>
	<link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	@include('HelpCenter::partials.css.theme')

	@yield('css')
</head>

<body>

	<div class="container my-5">

		<div class="mb-3">
			<nav aria-label="breadcrumb" class="d-flex justify-content-between align-items-center">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="{{ route('help_center') }}">
							{{ env('APP_NAME') }}
						</a>
					</li>
					@yield('breadcrumb_links')
				</ol>

				<div class="d-flex align-items-center gap-2">
					@yield('breadcrumb_btns')
					<button class="theme-toggle" onclick="toggleTheme()" title="Cambiar tema" aria-label="Cambiar entre modo claro y oscuro">
						<i class="bi bi-moon"></i>
						<i class="bi bi-sun"></i>
					</button>
				</div>
			</nav>
		</div>

		@yield('content')
	</div>

	@include('HelpCenter::partials.js.theme')

	@include('HelpCenter::partials.js.alerts')

	@yield('javascript')

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
		crossorigin="anonymous"></script>
</body>

</html>

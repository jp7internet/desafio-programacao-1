<html>
	<head>
		<title>Sales Application - @yield('title')</title>
	</head>
	
	<link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
	<link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	
	<script src="/js/jquery-2.2.3.js" type="text/javascript"></script>
	<script src="/js/bootstrap.min.js" type="text/javascript"></script>
	
	@yield('optional-js')
	
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">@yield('title')</a>
				</div>
			</div>
		</nav>
		
		<div class="container theme-showcase" role="main">
			@yield('content')
		</div>
	</body>
</html>
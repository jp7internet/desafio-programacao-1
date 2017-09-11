<!DOCTYPE html>

<html>

<head>
<meta charset="utf-8"/>
<title>Teste JP7</title>

	<script src="{{ URL::asset('plugins/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('plugins/maskMoney.js') }}"></script>
	<script src="{{ URL::asset('plugins/jquery.maskedinput.min.js') }}"></script>
	<script src="{{ URL::asset('plugins/ui/jquery-ui-1.8.18.custom.min.js') }}"></script>
	<link rel="stylesheet" href="{{ URL::asset('plugins/ui/jquery-ui-1.10.3.custom.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('plugins/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/template.css') }}">
	@yield('privateScripts')
	
</head>

<body>

@yield('privateStyleSheets')

<!-- BEGIN NAV BAR -->
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	      	</button>
	    	<a class="navbar-brand" href="#">Teste JP7 <span class="glyphicon glyphicon-screenshot"></span></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    	<ul class="nav navbar-nav">
	        	<li><a href="{{ URL::to('/index') }}">Home</a></li>	        	
	        	<li><a href="{{ URL::to('employees') }}">Funcionários</a></li>
	        	<li><a href="{{ URL::to('logout') }}">Sair</a></li>
	      	</ul>
	    </div>
  	</div>
</nav>
<!-- END NAV BAR -->

<div id="content">

	@if (Session::has('message'))
	   <div class="alert alert-warning"><b>{{ Session::get('message') }}</b></div>
	@endif

	@yield('content')

	<div class="modal fade" id="alert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel"> ATENÇÃO! </span></h4>
				</div>
				<div class="modal-body">
					<br>Deseja realmente excluir este Registro?
				</div>
				<div class="modal-footer">
					{{ Form::open(array('url' => '#')) }}
						<button type='submit' class='btn btn-danger' data-dismiss='modal'>Sim </button>
						{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="alert2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel"> ATENÇÃO! </span></h4>
				</div>
				<div class="modal-body"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
				</div>
			</div>
		</div>
	</div>

</div>

<div id="footer" class="navbar-fixed-bottom">
	2016 &copy; JP7-Test by Fábio Santos
</div>

</body>

</html>

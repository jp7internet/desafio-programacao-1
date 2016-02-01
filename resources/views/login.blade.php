<!DOCTYPE html>

<html>

<head>
<meta charset="utf-8"/>
<title>Teste JP7</title>

	<script src="{{ URL::asset('plugins/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	<link rel="stylesheet" href="{{ URL::asset('plugins/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/template.css') }}">
	<script type="text/javascript">
		$(document).ready(function() {
			$('.btn-warning').click(function(e) {
				if ($("input[name='login']").val() == '')
				{
					$('em').text('Favor informar o login');
					$("input[name='email']").css('border','2px solid red').focus();
					return false;
				}
				$('form').attr('action',"{{ URL::to('redefine') }}");
				$('form').submit();
			});
		});
	</script>
	
</head>

<style>

</style>

<body>

<style type="text/css">
	body {
		background:#EEEEEE;
	}
	em {
		color:red;
	}
</style>

<div id="content">

	<div class="row">
		<div id="box-login">
			<div class="panel panel-default yellow">
				<div class="panel-heading"><span class="glyphicon glyphicon-screenshot"></span> Bem vindo ao Teste JP7 </div>
				<div class="panel-body">				
					{{ Form::open(array('url' => 'login')) }}
						<div class="row">
							<div class="col-md-12">
								{{ Form::label('email', 'Email') }}
		        				{{ Form::text('email', null, array('class' => 'form-control')) }}
							</div>	
						</div>
						<div class="row">
							<div class="col-md-12">
								{{ Form::label('password', 'Senha') }}
		        				{{ Form::password('password', array('class' => 'form-control')) }}
							</div>								        	
						</div>
						<em>{{{ isset($error) ? $error : '' }}}</em>
						<div class="button_container">
							<button type='submit' class='btn btn-success'>Logar <span class='glyphicon glyphicon-flag'></span> </button>
						</div>
					{{ Form::close() }}
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

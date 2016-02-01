@extends('layout')

@section('privateStyleSheets')
	<style type="text/css">
		#header-import {
			padding-bottom:5px;
			margin:0px;
		}
		#body-import {
			border-top:2px solid #dddddd;
			padding:0px 0px 10px 0px;
		}
		.import .row {
			margin:0px;
			padding:5px 0px 5px 0px;
			border-top:1px solid #ddd;
		}
		.import:first-of-type .row.upper {
			margin-top:10px;
			border-top:none;
		}
		.upper-selected {
			border-left:5px solid grey;
			border-left:5px solid grey;
			border-right:5px solid grey;
			margin-left:-5px;
			margin-right:-5px;
		}
		.upper-selected .upper {
			background:#e7e7e7;
		}
		.upper:hover {
			background:#e7e7e7;
		}
		.small-rows .row {
			padding:2px 0px 2px 0px;
		}
		.small-rows .row:first-of-type {
			padding:3px 0px 3px 0px;
		}
	</style>
@stop

@section('privateScripts')

	<script type="text/javascript">
		$(document).ready(function() {
			$('.collapsador').click(function() {
				$('.collapse.in').each(function() {
					$(this).collapse('hide');
				});
				$('.import').removeClass('upper-selected');
				$(this).parent().parent().parent().addClass('upper-selected');
			});

			$('#import').click(function() {
				$('#form').modal();
			});
		});	
	</script>

@stop

@section('content')

	<div id="header">
		<h3>Olá JP7<small> Seja bem-vindo</small></h3>
	</div>
	<br><br>

	<style type="text/css">
		.alert-info {
			border-left:5px solid;
		}
		.panel-body {
			max-height:500px;
			overflow:auto;
		}
	</style>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default grey">
				<div class="panel-heading"><span class="glyphicon glyphicon-flash"></span> Arquivos Importados </div>
				<div class="panel-body">

					<div class="row" id="header-import">
						<div class="col-md-2">
							<b>File ID</b>
						</div>
						<div class="col-md-2">
							<b>Usuário</b>
						</div>
						<div class="col-md-2">
							<b>Total Bruto</b>
						</div>
						<div class="col-md-2">
							<b>Qtde Itens Importados</b>
						</div>
						<div class="col-md-2">
							<b>Data de Criação</b>
						</div>
					</div>

					<div id="body-import">
						@forelse ($imports as $import)
							<div class="import">
								<div class="row upper">
									<div class="col-md-2">
										<a class="collapsador" data-toggle="collapse" href="#import-itens-{!! $import->id !!}" aria-expanded="false" aria-controls="import-itens-{!! $import->id !!}"><b>{!! $import->id !!}</b></a>
									</div>
									<div class="col-md-2">
										<b>Usuário</b>
									</div>
									<div class="col-md-2">
										<b>{!! $import->products->sum('item_price') !!}</b>
									</div>
									<div class="col-md-2">
										<b>{!! $import->products->count() !!}</b>
									</div>
									<div class="col-md-2">
										<b>{!! date('d/m/Y H:i:s',strtotime($import->created_at)) !!}</b>
									</div>
								</div>
									
								<div class="collapse small-rows" id="import-itens-{!! $import->id !!}">
									<div class="row">
										<div class="col-md-2">
											<b><i>P. Name</i></b>
										</div>
										<div class="col-md-2">
											<b><i>Description</i></b>
										</div>
										<div class="col-md-2">
											<b><i>Price</i></b>
										</div>
										<div class="col-md-2">
											<b><i>Count</i></b>
										</div>
										<div class="col-md-2">
											<b><i>Address</i></b>
										</div>
										<div class="col-md-2">
											<b><i>M. Name</i></b>
										</div>
									</div>

									@foreach ($import->products as $product)
									<div class="row">
											<div class="col-md-2">
												{!! $product->purchaser_name !!}
											</div>
											<div class="col-md-2">
												{!! $product->item_description !!}
											</div>
											<div class="col-md-2">
												{!! $product->item_price !!}
											</div>
											<div class="col-md-2">
												{!! $product->purchase_count !!}
											</div>
											<div class="col-md-2">
												{!! $product->merchant_address !!}
											</div>
											<div class="col-md-2">
												{!! $product->merchant_name !!}
											</div>
										</div>
									@endforeach

								</div>
							</div>
						@empty
							<br>Nenhum arquivo foi importado até o momento.
						@endforelse
					</div>
					<div class="button_container">
						<div class="row">
							<div class="col-md-1 col-md-offset-11">
								<button id='import' type='button' class='btn btn-success pull-right'>Importar <span class='glyphicon glyphicon-paperclip'></span> </button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel"> Importação de Arquivimport </span></h4>
				</div>
				{{ Form::open(array('files'=>true,'url'=>'import_file','method'=>'PimportT')) }}
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							{{ Form::label('arquivo', 'Arquivo') }}
							{{ Form::file('arquivo', null, array('class' => 'form-control')) }}
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type='submit' class='btn btn-success'>Enviar</span> </button>
					<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>
				</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>

@stop
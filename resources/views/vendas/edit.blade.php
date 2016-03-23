@extends($layout)

@section('content')
  <h1>Editar Venda</h1>
  {!! Form::model($venda, ['method' => 'PATCH', 'route' => ['vendas.update', $venda->id]]) !!}
    @include('vendas.form', array('submitButtonText' => 'Alterar', 'showButton' => true, 'venda' => $venda));
  {!! Form::close() !!}
@endsection

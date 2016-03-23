@extends($layout)

@section('content')
  <h1>Visualizar Venda</h1>
  {!! Form::model($venda, ['method' => 'PATCH', 'route' => ['vendas.update', $venda->id]]) !!}
    @include('vendas.form', array('submitButtonText' => 'Adicionar', 'showButton' => false));
  {!! Form::close() !!}
@endsection

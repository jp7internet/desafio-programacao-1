@extends($layout)

@section('content')
  <h1>Nova Venda</h1>
  
  {!! Form::open(['route' => 'vendas.store', 'id' => 'vendas-form']) !!}
    @include('vendas.form', array('submitButtonText' => 'Adicionar', 'showButton' => true));
  {!! Form::close() !!}
@endsection

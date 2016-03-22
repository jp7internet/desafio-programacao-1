@extends($layout)

@section('content')
  <h1>Nova Venda</h1>
  
  {!! Form::open(['route' => 'vendas.store', 'id' => 'vendas-form']) !!}
    <div class="form-group">
      {!! Form::label('purchaser_name', 'Nome do Comprador:') !!}
      {!! Form::text('purchaser_name', null, ['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group">
      {!! Form::label('description', 'Descrição:') !!}
      {!! Form::text('description', null, ['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group">
      {!! Form::label('price', 'Preço:') !!}
      {!! Form::text('price', null, ['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group">
      {!! Form::label('count', 'Quantidade:') !!}
      {!! Form::text('count', null, ['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group">
      {!! Form::label('merchant_address', 'Endereço do Negociante:') !!}
      {!! Form::text('merchant_address', null, ['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group">
      {!! Form::label('merchant_name', 'Nome do Negociante:') !!}
      {!! Form::text('merchant_name', null, ['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group">
      {!! Form::submit('Inserir', ['class' => 'btn btn-primary']) !!}
    </div>
  {!! Form::close() !!}
@endsection

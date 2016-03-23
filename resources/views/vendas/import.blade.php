@extends($layout)

@section('content')
  <h1>Importar Vendas</h1>
  @include('shared.alert')
  {!! Form::open(['route' => 'vendas.processImport', 'id' => 'vendas-form', 'files'=>true]) !!}
    <div class="form-group">
      {!! Form::label('file', 'Selecione o arquivo separado por tab:') !!}
      {!! Form::file('file') !!}
    </div>
    <div class="form-group">
      {!! Form::submit('Importar', ['class' => 'btn btn-primary']) !!}
    </div>
  {!! Form::close() !!}
@endsection

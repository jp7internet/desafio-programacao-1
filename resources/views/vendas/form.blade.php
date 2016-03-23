@include('shared.alert')
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
  {!! Form::label('merchant_address', 'Endereço da Empresa:') !!}
  {!! Form::text('merchant_address', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('merchant_name', 'Nome da Empresa:') !!}
  {!! Form::text('merchant_name', null, ['class' => 'form-control']) !!}
</div>

@if ($showButton)
  <div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
  </div>
@endif

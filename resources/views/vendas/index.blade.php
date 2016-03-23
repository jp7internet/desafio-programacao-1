@extends($layout)

@section('content')
  @include('shared.alert')
  <h1>Vendas</h1>

  <table class="table table-bordered table-striped">
    <tr>
      <th width="245">Ações</th>
      <th>Comprador</th>
      <th>Data de Registro</th>
      <th>Última Alteração</th>
    </tr>
    
    @foreach ($vendas as $venda)
      <tr>
        {!! Form::open(['method' => 'DELETE', 'route' => ['vendas.destroy', $venda->id]]) !!}
        <td>
          <a class="btn btn-success" href="{!! URL::route('vendas.show', $venda->id, $venda->purchaser_name) !!}" role="button">Detalhes</a>
          <a class="btn btn-primary" href="{!! URL::route('vendas.edit', $venda->id) !!}" role="button">Editar</a>
          {!! Form::submit('Deletar', ['class' => 'btn btn-danger']) !!}
        </td>
        <td> {!! $venda->purchaser_name !!} </td>
        <td> {!! $venda->created_at !!}</td>
        <td> {!! $venda->updated_at !!}</td>
      </tr>
    @endforeach
  </table>
@endsection

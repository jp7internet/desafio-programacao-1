@extends($layout)

@section('content')
  <h1>Vendas</h1>
  {!! link_to_route('vendas.create', 'Nova Venda') !!}

  <table border="1">
    <tr>
      <th>Editar</th>
      <th>Deletar</th>
      <th>Título</th>
    </tr>
    @foreach ($vendas as $venda)
      <tr>
        <td> {!! link_to_route('vendas.edit', 'Editar', $venda->id) !!}</td>
        <td>
          {!! Form::open(['method' => 'DELETE', 'route' => ['vendas.destroy', $venda->id]]) !!}
          <button type="submit">Deletar</button>
          {!! Form::close() !!}
        </td>
        <td> {!! link_to_route('vendas.show', $venda->purchaser_name, $venda->id) !!}</td>
    @endforeach
  </table>
@endsection

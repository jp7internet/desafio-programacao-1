@extends('layouts.master')

@section('title', 'Home')

@section('content')
	<table class="table table-condensed table-striped table-responsive">
		<thead>
			<tr>
				<th>Purchaser Name</th>
				<th>Item Description</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Merchant Address</th>
				<th>Merchant Name</th>
				<th colspan="2" style="text-align: center;"><a href="/sales/create" role="button" class="btn btn-link btn-lg"><i class="fa fa-plus-circle"></i></a></th>
			</tr>
		</thead>
		<tbody>
			@forelse ($sales as $sale)
				<tr>
					<td>{{ $sale->purc_name }}</td>
					<td>{{ $sale->item_desc }}</td>
					<td>${{ $sale->price }}</td>
					<td>{{ $sale->purc_count }}</td>
					<td>{{ $sale->merc_addr }}</td>
					<td>{{ $sale->merc_name }}</td>
					<td><a href="/sales/{{ $sale->id }}/edit" role="button" class="btn btn-link btn-lg"><i class="fa fa-pencil"></i></a></td>
					<td>
						<form method="post" action="/sales/{{ $sale->id }}">
							<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
							<input type="hidden" name="_method" value="delete" />
							<button type="submit" class="btn btn-lg btn-link"><i class="fa fa-close"></i></button>
						</form>
					</td>
				</tr>
			@empty
				<tr>
					<td colspan="8" class="danger" align="center">No registries found.</td>
				</tr>
			@endforelse
		</tbody>
	</table>
@endsection
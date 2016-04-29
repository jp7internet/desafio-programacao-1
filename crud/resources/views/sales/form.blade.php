@extends('layouts.master')

@section('optional-js')

<script type="text/javascript">
	$(document).ready(function() {
		$("#reset").click(function() {
			$("input[type='text'], textarea").val('');
			$("select").selectedIndex(0);
			$("input[type='checkbox'], input[type='radio']").prop("checked", false);
		});
	});
</script>

@endsection

@section('content')
	<p>
		<a href="/sales" role="button" class="btn btn-link btn-lg"><span class="fa fa-angle-double-left"></span> Back to Main Page</a>
	</p>
	<form action="@yield('action')" method="post">
		<input type="hidden" name="id" value="{{ $sale->id or '' }}" />
		
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<input type="hidden" name="_method" value="@yield('method')" />
		
		<fieldset class="form-group">
			<label for="purcname">Purchaser Name</label>
			<input type="text" class="form-control" id="purcname" name="purc_name" placeholder="Enter purchaser name" value="{{ $sale->purc_name or '' }}" />
		</fieldset>
		<fieldset class="form-group">
			<label for="itemdesc">Item Description</label>
			<textarea class="form-control" rows="3" name="item_desc" id="item_desc">{{ $sale->item_desc or '' }}</textarea>
		</fieldset>
		
		<fieldset class="form-group form-inline">
			<label for="price">Price (in USD)</label>
			<div class="input-group">
				<div class="input-group-addon">$</div>
				<input type="text" class="form-control" name="price" id="price" placeholder="Price" value="{{ $sale->price or '' }}" />
				<div class="input-group-addon">.00</div>
			</div>
			
			<label for="purc_count">Quantity</label>
			<input type="text" class="form-control" id="purc_count" name="purc_count" value="{{ $sale->purc_count or '' }}" placeholder="Count" />
		</fieldset>
		
		<fieldset class="form-group">
			<label for="merc_addr">Merchant Address</label>
			<input type="text" class="form-control" id="merc_addr" name="merc_addr" value="{{ $sale->merc_addr or '' }}" placeholder="Merchant Address" />
		</fieldset>
		
		<fieldset class="form-group">
			<label for="merc_name">Merchant Name</label>
			<input type="text" class="form-control" id="merc_name" name="merc_name" value="{{ $sale->merc_name or '' }}" placeholder="Merchant Name" />
		</fieldset>
		
		<button type="submit" class="btn btn-primary">Submit</button>
		&nbsp;
		<button type="button" class="btn btn-default" id="reset">Reset</button>
	</form>
@endsection
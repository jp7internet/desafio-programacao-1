@extends('layouts.master')

@section('content')
	<div class="jumbotron {{ $class }}">
		<h1>
			@if($success)
				Success!
			@else
				Something went wrong. :(
			@endif
		</h1>
		<p>
			{{ $message }}
		</p>
	</div>
	<p>
		<a role="button" class="btn btn-link btn-lg" href="/sales"><span class="fa fa-angle-double-left"></span> Back to Main Page</a>
	</p>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Upload Archives</div>

                <div class="panel-body">
                    @if(Session::has('success'))
                        <div class="alert-box success">
                            <div class="alert alert-success" role="alert">{!! Session::get('success') !!}</div>
                            @if(isset($sum))
                                <hr />
                                <h4>{{"Total income purchase = R$".$sum}}</h4>
                                <hr />
                                <h4>Purchases made:</h4>
                                <br>
                                @if(isset($purchases))
                                    <table class="table" style="width:100%">
                                        <thead>
                                        <th> Purchaser name
                                        <th> Purchase count
                                        <th> Item description
                                        <th> Item price
                                        <th> Merchant name
                                        <th> Merchant address
                                        </thead>
                                        <tbody>
                                        @foreach ($purchases as $p)
                                            <tr>
                                                <td>{{ $p->purchaser_name }}</td>
                                                <td>{{ $p->purchase_count }}</td>
                                                <td>{{ $p->item_description }}</td>
                                                <td>R${{ $p->item_price }}</td>
                                                <td>{{ $p->merchant_name }}</td>
                                                <td>{{ $p->merchant_address }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            @endif
                        </div>
                    @else
                        {!! Form::open(array('url'=>'upload','method'=>'POST', 'files'=>true)) !!}

                        <div class="control-group">
                            <div class="controls">
                                {!! Form::file('file') !!}
                                {!! Form::checkbox('agree', 1, null ) !!} Rename the filename.
                                @if(Session::has('error'))
                                    <p class="errors">{!!$errors->first('file')!!}</p>
                                    <p class="errors">{!! Session::get('error') !!}</p>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div id="success"> </div>
                        {!! Form::submit('Submit', array('class'=>'btn btn-primary')) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

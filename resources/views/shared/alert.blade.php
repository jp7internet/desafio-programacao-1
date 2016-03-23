<div id="alert-box" class="alert alert-danger"
{!! isset($errors) && $errors->any() ? '' : "style='display: none'"!!}
>
  <b>Ocorreu um erro... =(</b>
  <ul>
    @if (isset($errors) && $errors->any())
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    @endif
  </ul>
</div>

@if (Session::has('flash_message'))
  <div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ Session::get('flash_message') }}
  </div>
@endif
      

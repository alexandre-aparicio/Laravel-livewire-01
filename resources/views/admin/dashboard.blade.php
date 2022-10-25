@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-3">
      <ul>
        <li>
            <ul>
                 Categorias
                 <li>Nueva Categoría</li>
            </ul>     

        </li>
      </ul>
    </div>
    <div class="col-9">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    {{ __('You are logged in!') }}
    </div>

  </div>
</div>
                    
          
@endsection

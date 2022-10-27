@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="cart">
            <div class="cart-header mb-4">
                <h4>Nuevo Producto
                    <a href="{{ url('admin/categoria') }}" class="btn btn-primary float-end">Atras</a>
                </h4>

            </div>
        </div>
    </div>
</div>

@endsection
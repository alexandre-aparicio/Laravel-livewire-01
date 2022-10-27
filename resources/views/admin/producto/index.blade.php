@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="cart">
            <div class="cart-header mb-4">
                <h4>Productos
                    <a href="{{ url('admin/producto/crear') }}" class="btn btn-primary float-end">Nuevo Producto</a>
                </h4>

            </div>
            <div class="cart-body">

            </div>
        </div>
    </div>
</div>

@endsection
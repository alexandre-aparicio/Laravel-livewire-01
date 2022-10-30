@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
        <div class="alert alert-success">{{ session('message')}}</div>
        @endif
        <div class="cart">
            <div class="cart-header mb-4">
                <h4>Productos
                    <a href="{{ url('admin/producto/crear') }}" class="btn btn-primary float-end">Nuevo Producto</a>
                </h4>

            </div>
            <div class="cart-body">
                <div class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td></td>
                        </tr>
                        @empty
                        <tr>
                            <td>No products Available</td>
                        </tr>
                        @endforelse

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
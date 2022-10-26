@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
    <div class="cart">
            <div class="cart-header mb-4">
                <h4>Nueva categoría
                    <a href="{{ url('admin/categoria') }}" class="btn btn-primary float-end">Atras</a>
                </h4>

            </div>
        
            <div class="cart-body">
                <form action="{{ url('admin/categoria') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Nombre:</label>
                            <input type="text" name="name" class="form-control">
                            @error('name')<small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    
                        <div class="col-md-6">
                            <label for="slug">Slug:</label>
                            <input type="text" name="slug" class="form-control">
                            @error('slug')<small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="description">Descripción:</label>
                        <textarea  name="description" class="form-control" rows="3"></textarea>
                        @error('description')<small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="row">
                        <label for="status">Status:</label><br/>
                        <div class="col-md-6 mb-3">
                            <input type="checkbox" name="status" >
                        </div>
                        <label for="image">Imagen:</label><br/>
                        <div class="col-md-6 mb-3">
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary float-end">Save</button>
                        </div>

                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>     
          
@endsection
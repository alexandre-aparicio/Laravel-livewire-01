@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="cart m-5" >
            <div class="card-header">
                <h3>Editar Categoría
                    <a href="{{ url('admin/categoria') }}" class="btn btn-primary float-end">Atras</a>
                </h3>
            </div>
            <div class="cart-body">
                <form action="{{ url('admin/categoria/'. $categoria->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Nombre:</label>
                            <input type="text" name="name" class="form-control" value="{{ $categoria->name }}">
                            @error('name')<small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    
                        <div class="col-md-6">
                            <label for="slug">Slug:</label>
                            <input type="text" name="slug" class="form-control" value="{{ $categoria->slug }}">
                            @error('slug')<small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="description">Descripción:</label>
                        <textarea  name="description" class="form-control" rows="3">{{ $categoria->description }}</textarea>
                        @error('description')<small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="row">
                        <label for="status">Status:</label><br/>
                        <div class="col-md-6 mb-3">
                            <input type="checkbox" name="status" {{ $categoria->status == '1' ? 'checked' : '' }}>
                        </div>
                        <label for="image">Imagen:</label><br/>
                        <div class="col-md-6 mb-3">
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('uploads/category')}}/{{ $categoria->image }}" alt="">
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
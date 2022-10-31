@extends('layouts.admin')
@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="cart">
         <div class="cart-header mb-4">
            <h4>Atras
               <a href="{{ url('admin/producto') }}" class="btn btn-primary float-end">Atras</a>
            </h4>
         </div>
         <div class="cart-body">
            
            <form action="{{ url('admin/producto') }}" method="PUT" enctype="multipart/form-data">
                @csrf
            <ul class="nav nav-tabs" id="myTab" role="tablist">
               <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
               </li>
               <li class="nav-item" role="presentation">
                  <button class="nav-link" id="detalles-tab" data-bs-toggle="tab" data-bs-target="#detalles" type="button" role="tab" aria-controls="detalles" aria-selected="false">Detalles</button>
               </li>
               <li class="nav-item" role="presentation">
                  <button class="nav-link" id="imagenes-tab" data-bs-toggle="tab" data-bs-target="#imagenes" type="button" role="tab" aria-controls="imagenes" aria-selected="false">Imágenes</button>
               </li>
            </ul>
            <div class="tab-content" id="myTabContent">
               <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="mb-3">
                        <label for="categoria">Categoría:</label>
                        <select name="category_id" class="form_control" id="">
                            @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $categoria->id == $productos->category_id ? 'selected' : '' }}>
                                {{ $categoria->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name">Nombre del Artículo:</label>
                        <input type="text" name="name" id="" class="form-control" value="{{ $productos->name}}">
                        @error('name')<small class="text-danger">{{ $message }}</small> @enderror

                    </div>
                    <div class="mb-3">
                        <label for="slug">Slug del Artículo:</label>
                        <input type="text" name="slug" id="" class="form-control" value="{{ $productos->slug}}">
                        @error('name')<small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="brand">Marca:</label>
                        <select name="brand" class="form_control" id="">
                            @foreach ($marcas as $marca)
                            <option value="{{ $marca->name }}" {{ $marca->name == $productos->brand ? 'selected' : '' }}>
                                {{ $marca->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="small_description">Pequeña descripcion:</label>
                        <input type="text" name="small_description" id="" class="form-control" value="{{ $productos->small_description }}">
                        @error('small_description')<small class="text-danger">{{ $message }}</small> @enderror

                    </div>
                    <div class="mb-3">
                        <label for="description">Descripcion:</label>
                        <input type="text" name="description" id="" class="form-control" value="{{ $productos->description }}">
                        @error('description')<small class="text-danger">{{ $message }}</small> @enderror
                    </div>
               </div>
               <div class="tab-pane fade" id="detalles" role="tabpanel" aria-labelledby="detalles-tab">
                    <div class="mb-3">
                        <label for="original_price">Precio Original</label>
                        <input type="text" name="original_price" id="" class="form-control" value="{{ $productos->original_price }}">
                        @error('original_price')<small class="text-danger">{{ $message }}</small> @enderror

                    </div>
                    <div class="mb-3">
                        <label for="selling_price">Precio de Venta:</label>
                        <input type="text" name="selling_price" id="" class="form-control" value="{{ $productos->selling_price }}">
                        @error('selling_price')<small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="quantity">Cantidad:</label>
                        <input type="text" name="quantity" id="" class="form-control" value="{{ $productos->quantity }}">
                        @error('quantity')<small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                    <label for="status">Status:</label><br/>
                        <div class="col-md-6 mb-3">
                            <input type="checkbox" name="status" {{ $productos->status == '1' ? 'checked' : '' }} >
                        </div>
                        <label for="trending">trending:</label><br/>
                        <div class="col-md-6 mb-3">
                            <input type="checkbox" name="trending" {{ $productos->trending == '1' ? 'checked' : '' }}>
                        </div>
                    </div>
               </div>
               <div class="tab-pane fade" id="imagenes" role="tabpanel" aria-labelledby="imagenes-tab">
                    <div class="mb-3">
                        <label for="imagen">Subir imagenes</label>
                        <input type="file" name="image[]" multiple class="form-control">
                    </div>
                    <div>
                       
                        @if($productos->productImages)
                            @foreach ($productos->productImages as $image)
                            <img src="{{ asset($image->image)}}" style="width: 80px;height:80px" class=" mr-3 border" alt="">
                            @endforeach                        
                        @else
                        NO Tiene imagenes
                        @endif
                    </div>
               </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Añadir</button>
            </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection
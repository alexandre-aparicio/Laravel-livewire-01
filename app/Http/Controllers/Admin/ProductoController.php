<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Producto;
use App\Models\Category;
use App\Models\Marca;
use App\Http\Requests\ProductFormRequest;

class ProductoController extends Controller
{
    public function index() {
        return view('admin.producto.index');
    }

    public function create() {

        $categorias = Category::all();
        $marcas = Marca::all();

        return view('admin.producto.create', compact('categorias', 'marcas'));
    }

    public function store(ProductFormRequest $request) {

        $validatedData = $request->validated();

        $category = Category::findOrFail($validatedData['category_id']);
        
        $product = $category->products()->create([

            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'brand' => $validatedData['brand'],
            'small_description' => $validatedData['small_description'], 
            'description' => $validatedData['description'],     
            'original_price' => $validatedData['original_price'],  
            'selling_price' => $validatedData['selling_price'], 
            'quantity' => $validatedData['quantity'],        
            'status' => $request->status == true ?  '1' : '0',
            'trending' => $request->trending == true ?  '1' : '0'

        ]);
        

        return "Viva la vida looca";

    }
}

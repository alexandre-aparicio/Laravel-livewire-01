<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\File;

use App\Models\Producto;
use App\Models\Category;
use App\Models\Marca;
use App\Http\Requests\ProductFormRequest;

class ProductoController extends Controller
{
    public function index() {

        $products = Producto::all();
        return view('admin.producto.index', compact('products'));
    }

    public function edit(int $product_id) {
        $categorias = Category::all();
        $marcas = Marca::all();
        $productos= Producto::findOrFail($product_id);

        
        
        return view('admin.producto.edit', compact('categorias', 'marcas', 'productos'));
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

        if ($request->hasFile('image')) {

            $uploadPath = 'uploads/products';
            $i=1;
            foreach($request->file('image') as $imageFile) {
                
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time() . '-'. $i++ . '.' . $extension;
                $imageFile->move($uploadPath ,$filename);
                $finalImagePathName = $uploadPath . '/' . $filename;

                $product->productImages()->create([
                    'producto_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
            
        }
        

        return redirect('admin/producto')->with('message', 'Articulo insertado correctamente');

    }
    public function update(ProductFormRequest $request, int $product_id)
    {

        $validatedData = $request->validated();
        $product = Category::findOrFail($validatedData['category_id'])
        ->products()->where('id', $product_id)->first();

        if($product) {

            $product->update([

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

            return redirect('admin/producto')->with('message', 'Producto modificado con éxito');

        } else {

            return redirect('admin/producto')->with('message', 'producto no encoontrado');
        }


    }

    public function destroy(int $product_id)
    {
        $product = Producto::findOrFail($product_id);
        
        if ($product->productImages()) {
            foreach($product->productImages as $imagen){
               if(File::exists($imagen->image)){
                File::delete($imagen->image);
               }
            };
        } else {
            echo "Nada que mostrar";
        }
        $product->delete();
        return redirect()->back()->with('message', 'Producto borrado de forma satisfactoria');

        
    }
}

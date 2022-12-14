<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryFormRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        return view('admin.categoria.index');
    }

    public function create() {
        return view('admin.categoria.create');
    }

    public function store(CategoryFormRequest $request) {

        $validatedData = $request->validated();
        $category = new Category;
        $category->name = $validatedData['name'];
        $category->slug = $validatedData['slug'];
        $category->description = $validatedData['description'];
        
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.'. $ext;

            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }       

        $category->status = $request->status == true ? '1':'0';
        $category->save();

        return redirect('admin/categoria')->with('message', 'Categoria añadida con exito');        
    }

    public function edit (Category $categoria) 
    {

        return view('admin.categoria.edit', compact('categoria'));
    }
    
    public function update (CategoryFormRequest $request, $categoria) {

        $validatedData = $request->validated();

       $category = Category::findOrFail($categoria);
       $category->name = $validatedData['name'];
        $category->slug = $validatedData['slug'];
        $category->description = $validatedData['description'];
        

        if($request->hasFile('image')) {

            $path = 'uploads/category/' . $category->image;

            if(File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.'. $ext;

            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }       

        $category->status = $request->status == true ? '1':'0';
        $category->update();

        return redirect('admin/categoria')->with('message', 'Categoria Modificada con exito'); 

    }

    
}

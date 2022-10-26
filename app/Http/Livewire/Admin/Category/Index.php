<?php

namespace App\Http\Livewire\Admin\Category;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category_id;

    public function deleteCategory($category_id) {

        $this->category_id = $category_id;
    }

    public function destroyCategory() {

        $category = Category::find($this->category_id);

        $path = 'uploads/category/' . $category->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $category->delete();
        session()->flash('message', 'Categoria Borrada');
        
        $this->dispatchBrowserEvent('closeModal'); 
    }
    
    public function render()
    {
        $categorias = Category::orderBy('id', 'DESC')->paginate('3');

        return view('livewire.admin.category.index', ['categorias' => $categorias]);
    }
}

<?php

namespace App\Http\Livewire\Admin\Category;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        $categorias = Category::orderBy('id', 'DESC')->paginate('10')->all();
        return view('livewire.admin.category.index', ['categorias' => $categorias]);
    }
}

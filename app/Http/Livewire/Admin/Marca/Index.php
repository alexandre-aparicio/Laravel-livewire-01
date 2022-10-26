<?php

namespace App\Http\Livewire\Admin\Marca;
use App\Models\Marca;


use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name, $slug, $status;
    public $marca_id;

    public function rules() {

        return [
            'name'=>'required|string',
            'slug'=>'required|string',
            'status'=>'nullable'

        ];

    }
    public function resetInput() {
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;

    }

    public function storeMarca(){
        $validateData = $this->validate();
        
        Marca::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0'

        ]);
        session()->flash('message', 'Marca añadida con éxito');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();

    }

    public function editMarca(int $marca_id) {

        $this->marca_id = $marca_id;
       $marca = Marca::findOrfail($marca_id);
       $this->name = $marca->name;
       $this->slug = $marca->slug;
       $this->status = $marca->status;
    }

    public function updateMarca() 
    {
        $validateData = $this->validate();
        
        Marca::findOrfail($this->marca_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0'

        ]);
        session()->flash('message', 'Marca Editada con éxito');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function deleteMarca($marca_id) {

        $this->marca_id = $marca_id;
    }

    public function destroyMarca() {

        $marca = Marca::find($this->marca_id);        
        $marca->delete();
        session()->flash('message', 'Marca Borrada');
        
        $this->dispatchBrowserEvent('close-modal'); 
    }


    public function render()
    {
        $marcas = Marca::orderBy('id', 'DESC')->paginate(3);
        return view('livewire.admin.marca.index', ['marcas' => $marcas])
        ->extends('layouts.admin')
        ->section('content');
    }
}

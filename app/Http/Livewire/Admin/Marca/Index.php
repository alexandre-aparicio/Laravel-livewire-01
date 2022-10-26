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

    public function render()
    {
        $marcas = Marca::all();
        return view('livewire.admin.marca.index', ['marcas' => $marcas])
        ->extends('layouts.admin')
        ->section('content');
    }
}

<?php

namespace App\Http\Livewire\Admin\Producto;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $codigo;
    public $nombre;
    public $abreviatura;
    public $categoria_id;
    public $marca_id;
    public $unidad_id;
    public $p_compra;
    public $p_venta;
    
    protected $rules = [
        'codigo' => 'required|numeric|unique:productos,codigo',
        'nombre' => 'required|string|max:255',
        'abreviatura' => 'required|string|max:50',
        'categoria_id' => 'required|not_in:0',
        'marca_id' => 'required|not_in:0',
        'unidad_id' => 'required|not_in:0',
        'p_compra' => 'required|numeric|min:0',
        'p_venta' => 'required|numeric|min:0',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Producto') ])]);
        
        Producto::create([
            'codigo' => $this->codigo,
            'nombre' => $this->nombre,
            'abreviatura' => $this->abreviatura,
            'categoria_id' => $this->categoria_id,
            'marca_id' => $this->marca_id,
            'unidad_id' => $this->unidad_id,
            'p_compra' => $this->p_compra,
            'p_venta' => $this->p_venta,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.producto.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Producto') ])]);
    }
}

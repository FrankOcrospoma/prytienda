<?php

namespace App\Http\Livewire\Admin\Producto;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $producto;

    public $codigo;
    public $nombre;
    public $abreviatura;
    public $categoria_id;
    public $marca_id;
    public $unidad_id;
    public $p_compra;
    public $p_venta;
    
    protected $rules = [
        'codigo' => 'required|numeric',
        'nombre' => 'required|string|max:255',
        'abreviatura' => 'required|string|max:50',
        'categoria_id' => 'required|not_in:0',
        'marca_id' => 'required|not_in:0',
        'unidad_id' => 'required|not_in:0',
        'p_compra' => 'required|numeric|min:0',
        'p_venta' => 'required|numeric|min:0',        
    ];

    public function mount(Producto $Producto){
        $this->producto = $Producto;
        $this->codigo = $this->producto->codigo;
        $this->nombre = $this->producto->nombre;
        $this->abreviatura = $this->producto->abreviatura;
        $this->categoria_id = $this->producto->categoria_id;
        $this->marca_id = $this->producto->marca_id;
        $this->unidad_id = $this->producto->unidad_id;
        $this->p_compra = $this->producto->p_compra;
        $this->p_venta = $this->producto->p_venta;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Producto') ]) ]);
        
        $this->producto->update([
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
    }

    public function render()
    {
        return view('livewire.admin.producto.update', [
            'producto' => $this->producto
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Producto') ])]);
    }
}

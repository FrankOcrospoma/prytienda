<?php

namespace App\Http\Livewire\Admin\Producto;

use App\Models\Producto;
use Livewire\Component;

class Single extends Component
{

    public $producto;

    public function mount(Producto $Producto){
        $this->producto = $Producto;
    }

    public function delete()
    {
        $this->producto->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Producto') ]) ]);
        $this->emit('productoDeleted');
    }

    public function render()
    {
        return view('livewire.admin.producto.single')
            ->layout('admin::layouts.app');
    }
}

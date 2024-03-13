<?php

namespace App\Http\Livewire\Admin\Categoria;

use App\Models\Categoria;
use Livewire\Component;

class Single extends Component
{

    public $categoria;

    public function mount(Categoria $Categoria){
        $this->categoria = $Categoria;
    }

    public function delete()
    {
        $this->categoria->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Categoria') ]) ]);
        $this->emit('categoriaDeleted');
    }

    public function render()
    {
        return view('livewire.admin.categoria.single')
            ->layout('admin::layouts.app');
    }
}

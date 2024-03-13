<?php

namespace App\Http\Livewire\Admin\Unidad;

use App\Models\Unidad;
use Livewire\Component;

class Single extends Component
{

    public $unidad;

    public function mount(Unidad $Unidad){
        $this->unidad = $Unidad;
    }

    public function delete()
    {
        $this->unidad->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Unidad') ]) ]);
        $this->emit('unidadDeleted');
    }

    public function render()
    {
        return view('livewire.admin.unidad.single')
            ->layout('admin::layouts.app');
    }
}

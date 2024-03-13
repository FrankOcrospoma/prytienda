<?php

namespace App\Http\Livewire\Admin\Marca;

use App\Models\Marca;
use Livewire\Component;

class Single extends Component
{

    public $marca;

    public function mount(Marca $Marca){
        $this->marca = $Marca;
    }

    public function delete()
    {
        $this->marca->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Marca') ]) ]);
        $this->emit('marcaDeleted');
    }

    public function render()
    {
        return view('livewire.admin.marca.single')
            ->layout('admin::layouts.app');
    }
}

<?php

namespace App\Http\Livewire\Admin\Unidad;

use App\Models\Unidad;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $unidad;

    public $codigo;
    public $nombre;
    
    protected $rules = [
        'nombre' => 'required|string|max:255',        
    ];

    public function mount(Unidad $Unidad){
        $this->unidad = $Unidad;
        $this->codigo = $this->unidad->codigo;
        $this->nombre = $this->unidad->nombre;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Unidad') ]) ]);
        
        $this->unidad->update([
            'codigo' => $this->codigo,
            'nombre' => $this->nombre,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.unidad.update', [
            'unidad' => $this->unidad
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Unidad') ])]);
    }
}

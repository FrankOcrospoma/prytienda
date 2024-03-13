<?php

namespace App\Http\Livewire\Admin\Marca;

use App\Models\Marca;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $marca;

    public $nombre;
    
    protected $rules = [
        'nombre' => 'required|string|max:255',        
    ];

    public function mount(Marca $Marca){
        $this->marca = $Marca;
        $this->nombre = $this->marca->nombre;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Marca') ]) ]);
        
        $this->marca->update([
            'nombre' => $this->nombre,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.marca.update', [
            'marca' => $this->marca
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Marca') ])]);
    }
}

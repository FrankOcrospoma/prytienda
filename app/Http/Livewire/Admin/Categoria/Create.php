<?php

namespace App\Http\Livewire\Admin\Categoria;

use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $nombre;
    
    protected $rules = [
        'nombre' => 'required|string|max:255',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Categoria') ])]);
        
        Categoria::create([
            'nombre' => $this->nombre,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.categoria.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Categoria') ])]);
    }
}

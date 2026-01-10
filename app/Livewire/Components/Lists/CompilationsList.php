<?php

namespace App\Livewire\Components\Lists;

use Livewire\Component;

class CompilationsList extends Component
{
    public $compilations;

    public function mount($compilations)
    {
        $this->compilations = $compilations;
    }

    public function render()
    {
        return view('livewire.components.lists.compilations-list');
    }
}

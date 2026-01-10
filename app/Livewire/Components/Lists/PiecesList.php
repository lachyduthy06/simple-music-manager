<?php

namespace App\Livewire\Components\Lists;

use Livewire\Component;

class PiecesList extends Component
{
    public $pieces;
    public bool $showCollection;
    public bool $showSince;

    public function mount($pieces, bool $showCollection = true, bool $showSince = false)
    {
        $this->pieces = $pieces;
        $this->showCollection = $showCollection;
        $this->showSince = $showSince;
    }

    public function render()
    {
        return view('livewire.components.lists.pieces-list');
    }
}

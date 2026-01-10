<?php

namespace App\Livewire\Pages;

use App\Models\Piece;
use Livewire\Component;

class PiecePage extends Component
{
    public Piece $piece;

    public function mount(Piece $piece)
    {
        $this->piece = $piece;
    }

    public function render()
    {
        return view('livewire.pages.piece-page');
    }
}

<?php

namespace App\Livewire\Pages;

use App\Models\Compilation;
use Livewire\Component;

class CompilationPage extends Component
{
    public Compilation $compilation;
    public $pieces = [];

    public function mount(Compilation $compilation)
    {
        $this->compilation = $compilation->load('pieces')->loadCount('pieces');
        $this->pieces = $this->compilation->pieces;
    }

    public function render()
    {
        return view('livewire.pages.compilation-page');
    }
}

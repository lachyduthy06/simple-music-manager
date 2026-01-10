<?php

namespace App\Livewire\Pages;

use App\Models\Compilation;
use Livewire\Component;

class CompilationsPage extends Component
{
    public $compilations;

    public function mount()
    {
        $this->compilations = Compilation::withCount('pieces')->orderBy('sort')->get();
    }

    public function render()
    {
        return view('livewire.pages.compilations-page');
    }
}

<?php

namespace App\Livewire\Components\Buttons;

use Livewire\Component;

class CreateButton extends Component
{
    public string $link;

    public function mount(string $link)
    {
        $this->link = $link;
    }

    public function render()
    {
        return view('livewire.components.buttons.create-button');
    }
}

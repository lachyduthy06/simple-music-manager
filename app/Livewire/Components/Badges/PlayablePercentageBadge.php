<?php

namespace App\Livewire\Components\Badges;

use Livewire\Component;

class PlayablePercentageBadge extends Component
{
    public int $percentage;

    public function mount(float $percentage)
    {
        $this->percentage = $percentage;
    }

    public function render()
    {
        return view('livewire.components.badges.playable-percentage-badge');
    }
}

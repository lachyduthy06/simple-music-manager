<?php

namespace App\Livewire\Components\Badges;

use App\Enums\PlayableStatus;
use Livewire\Component;

class PlayableStatusBadge extends Component
{
    public PlayableStatus $status;

    public function mount(PlayableStatus $status)
    {
        $this->status = $status;
    }

    public function render()
    {
        return view('livewire.components.badges.playable-status-badge');
    }
}

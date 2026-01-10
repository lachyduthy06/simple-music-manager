<?php

namespace App\Livewire\Pages;

use App\Enums\PlayableStatus;
use App\Models\Collection;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class CollectionPage extends Component
{
    public Collection $collection;
    public $pieces = [];

    public function mount(Collection $collection)
    {
        $this->collection = $collection
            ->load('pieces', 'instrument')
            ->loadCount([
                'pieces',
                'pieces as playable_count' => fn (Builder $query) => $query->where('status', PlayableStatus::PLAYABLE)
            ]);
        $this->pieces = $this->collection->pieces;
    }

    public function render()
    {
        return view('livewire.pages.collection-page');
    }
}

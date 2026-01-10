<?php

namespace App\Livewire\Pages;

use App\Models\Piece;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomePage extends Component
{
    public string $greeting = '';
    public string $userName = '';
    public string $message = '';
    public $recentPieces = [];

    public function mount(): void
    {
        $this->userName = Auth::user()->name;

        $hour = now()->hour;

        $this->greeting = match (true) {
            $hour >= 5 && $hour < 12 => 'Good morning',
            $hour >= 12 && $hour < 18 => 'Good afternoon',
            default => 'Good evening',
        };

        $this->message = match (true) {
            $hour >= 5 && $hour < 12 => 'Time to wake up those fingers and play some music!',
            $hour >= 12 && $hour < 18 => 'Hope your day is in tune! Let’s make some music.',
            default => 'Relax and unwind with some sweet melodies tonight.',
        };

        // Get the 5 most recent pieces for this user
        $this->recentPieces = Piece::with('collection.instrument')->latest()->take(5)->get();
    }

    public function render()
    {
        return view('livewire.pages.home-page');
    }
}

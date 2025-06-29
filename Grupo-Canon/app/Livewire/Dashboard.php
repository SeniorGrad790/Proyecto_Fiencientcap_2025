<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public string $section = 'inicio';

    public function render()
    {
        return view('livewire.dashboard')->layout('layouts.app');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $seccion = 'inicio';

    public function render()
    {
        return view('livewire.dashboard')->layout('layouts.app');
    }
}

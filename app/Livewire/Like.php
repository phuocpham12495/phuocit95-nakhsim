<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Like extends Component
{
    public $totalLike = 0;


    public function like() {
        $this->totalLike++;
    }

    public function render()
    {
        return view('livewire.like');
    }
}

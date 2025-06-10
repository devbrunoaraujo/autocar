<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;

class Featured extends Component
{
    public function render()
    {
        $cars = Car::where('is_featured', true)->take(6)->get();

         return view('livewire.featured', compact('cars'));
    }
}

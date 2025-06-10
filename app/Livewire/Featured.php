<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;

class Featured extends Component
{
    public function render()
    {
        $cars = Car::where('featured', true)->take(6)->get();

         return view('livewire.cars-featured', compact('cars'));
    }
}

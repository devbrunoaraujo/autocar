<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;

class CarReview extends Component
{

    public function render()
    {
       $cars = Car::where('is_active', true)->take(6)->get();
       return view('livewire.car-review', compact('cars'));
    }
}

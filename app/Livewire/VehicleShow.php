<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;

class VehicleShow extends Component
{
    public $car;

    public function mount($id)
    {
         $this->car = Car::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.vehicle-show')->layout('components.layouts.app');
    }
}

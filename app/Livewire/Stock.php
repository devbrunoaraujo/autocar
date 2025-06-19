<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;

class Stock extends Component
{
    public $cars;



    public function render()
    {
        return view('livewire.stock')->layout('components.layouts.app');
    }
}

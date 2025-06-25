<?php

namespace App\Livewire;

use Livewire\Component;

class Banner extends Component
{
    public function render()
    {
        return view('livewire.banner');
    }

    public function goToStock()
    {
        return redirect()->route('estoque');
    }

    public function goToFinancing()
    {
        return redirect()->route('financing.index');
    }
}

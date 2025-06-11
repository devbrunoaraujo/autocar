<?php

namespace App\Livewire;

use App\Models\SiteConfig;
use Livewire\Component;

class Footer extends Component
{
    public $config = [];

    public function mount()
    {
        dd($this->config = SiteConfig::all()->first());
    }

    public function render()
    {
        return view('livewire.footer', ['telefne' => $this->config['telefone']]);
    }
}

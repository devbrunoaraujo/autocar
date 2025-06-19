<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Car;

class CarList extends Component
{
    use WithPagination;

    public $marca = '';
    public $modelo = '';
    public $ano = '';
    public $preco_min = '';
    public $preco_max = '';
    public $ordenacao = 'latest';

    protected $listeners = ['filtersUpdated'];

    public function filtersUpdated($filters)
    {
        $this->marca = $filters['marca'] ?? '';
        $this->modelo = $filters['modelo'] ?? '';
        $this->ano = $filters['ano'] ?? '';
        $this->preco_min = $filters['preco_min'] ?? '';
        $this->preco_max = $filters['preco_max'] ?? '';

        // Reset pagination quando filtros mudam
        $this->resetPage();
    }

    public function updatedOrdenacao()
    {
        $this->resetPage();
    }

    public function getCarsProperty()
    {
        $query = Car::query();

        // Aplicar filtros
        if ($this->marca) {
            $query->where('marca_nome', $this->marca);
        }

        if ($this->modelo) {
            $query->where('modelo_nome', $this->modelo);
        }

        if ($this->ano) {
            $query->where('ano', $this->ano);
        }

        if ($this->preco_min) {
            $query->where('preco', '>=', $this->preco_min);
        }

        if ($this->preco_max) {
            $query->where('preco', '<=', $this->preco_max);
        }

        // Aplicar ordenação
        switch ($this->ordenacao) {
            case 'menor_preco':
                $query->orderBy('preco', 'asc');
                break;
            case 'maior_preco':
                $query->orderBy('preco', 'desc');
                break;
            case 'menor_km':
                $query->orderBy('quilometragem', 'asc');
                break;
            case 'latest':
            default:
                $query->latest();
                break;
        }

        return $query->paginate(6);
    }

    public function render()
    {
        return view('livewire.car-list', [
            'cars' => $this->getCarsProperty(),
        ]);
    }
}

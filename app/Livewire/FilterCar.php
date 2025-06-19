<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Car;

class FilterCar extends Component
{
    public $marca = '';
    public $modelo = '';
    public $ano = '';
    public $preco_min = '';
    public $preco_max = '';
    public $filterKey = 0; // Chave para forçar refresh dos selects

    // Propriedades para popular os selects dinamicamente
    public $marcas = [];
    public $modelos = [];
    public $anos = [];

    protected $listeners = ['resetFilters'];

    public function mount()
    {
        // Carrega as opções disponíveis do banco
        $this->loadFilterOptions();
    }

    public function loadFilterOptions()
    {
        $this->marcas = Car::select('marca_nome')
            ->distinct()
            ->orderBy('marca_nome')
            ->pluck('marca_nome')
            ->toArray();

        $this->modelos = Car::select('modelo_nome')
            ->distinct()
            ->orderBy('modelo_nome')
            ->pluck('modelo_nome')
            ->toArray();

        $this->anos = Car::select('ano')
            ->distinct()
            ->orderBy('ano', 'desc')
            ->pluck('ano')
            ->toArray();
    }

    public function updatedMarca()
    {
        // Quando a marca muda, atualiza os modelos e anos disponíveis
        if ($this->marca) {
            $this->modelos = Car::where('marca_nome', $this->marca)
                ->select('modelo_nome')
                ->distinct()
                ->orderBy('modelo_nome')
                ->pluck('modelo_nome')
                ->toArray();

            $this->anos = Car::where('marca_nome', $this->marca)
                ->select('ano')
                ->distinct()
                ->orderBy('ano', 'desc')
                ->pluck('ano')
                ->toArray();
        } else {
            $this->loadFilterOptions();
        }

        // Reset modelo e ano quando marca muda
        $this->modelo = '';
        $this->ano = '';

        // Emite evento para atualizar a lista de carros
        $this->dispatch('filtersUpdated', [
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'ano' => $this->ano,
            'preco_min' => $this->preco_min,
            'preco_max' => $this->preco_max,
        ]);
    }

    public function updatedModelo()
    {
        // Quando o modelo muda, atualiza os anos disponíveis
        if ($this->modelo && $this->marca) {
            $this->anos = Car::where('marca_nome', $this->marca)
                ->where('modelo_nome', $this->modelo)
                ->select('ano')
                ->distinct()
                ->orderBy('ano', 'desc')
                ->pluck('ano')
                ->toArray();
        } elseif ($this->marca) {
            // Se só tem marca selecionada, mostra anos da marca
            $this->anos = Car::where('marca_nome', $this->marca)
                ->select('ano')
                ->distinct()
                ->orderBy('ano', 'desc')
                ->pluck('ano')
                ->toArray();
        } else {
            $this->loadFilterOptions();
        }

        // Reset ano quando modelo muda
        $this->ano = '';

        // Emite evento para atualizar a lista de carros
        $this->dispatch('filtersUpdated', [
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'ano' => $this->ano,
            'preco_min' => $this->preco_min,
            'preco_max' => $this->preco_max,
        ]);
    }

    public function updated($propertyName)
    {
        // Evita loop infinito ao não processar mudanças de marca e modelo aqui
        if (in_array($propertyName, ['marca', 'modelo'])) {
            return;
        }

        // Emite evento para outros filtros (ano, preços)
        $this->dispatch('filtersUpdated', [
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'ano' => $this->ano,
            'preco_min' => $this->preco_min,
            'preco_max' => $this->preco_max,
        ]);
    }

    public function applyFilters()
    {
        $this->dispatch('filtersUpdated', [
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'ano' => $this->ano,
            'preco_min' => $this->preco_min,
            'preco_max' => $this->preco_max,
        ]);
    }

    public function clearFilters()
    {
        $this->marca = '';
        $this->modelo = '';
        $this->ano = '';
        $this->preco_min = '';
        $this->preco_max = '';

        // Incrementa a chave para forçar refresh dos selects
        $this->filterKey++;

        // Recarrega todas as opções
        $this->loadFilterOptions();

        // Emite evento para limpar a lista
        $this->dispatch('filtersUpdated', [
            'marca' => '',
            'modelo' => '',
            'ano' => '',
            'preco_min' => '',
            'preco_max' => '',
        ]);
    }

    public function render()
    {
        return view('livewire.filter-car');
    }
}

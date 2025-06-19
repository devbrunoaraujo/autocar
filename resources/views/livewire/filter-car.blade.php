<div class="lg:w-1/4">
    <div class="bg-white rounded-xl shadow-lg p-6 sticky top-24">
        <h3 class="text-xl font-bold text-steel-blue mb-6">Filtros</h3>

        <!-- Brand Filter -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Marca</label>
            <select wire:model.live="marca" wire:key="marca-{{ $filterKey }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-electric-blue focus:border-transparent">
                <option value="">Todas as marcas</option>
                @foreach($marcas as $marca_option)
                    <option value="{{ $marca_option }}">{{ $marca_option }}</option>
                @endforeach
            </select>
        </div>

        <!-- Model Filter -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Modelo</label>
            <select wire:model.live="modelo" wire:key="modelo-{{ $filterKey }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-electric-blue focus:border-transparent">
                <option value="">Todos os modelos</option>
                @foreach($modelos as $modelo_option)
                    <option value="{{ $modelo_option }}">{{ $modelo_option }}</option>
                @endforeach
            </select>
        </div>

        <!-- Year Filter -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Ano</label>
            <select wire:model.live="ano" wire:key="ano-{{ $filterKey }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-electric-blue focus:border-transparent">
                <option value="">Todos os anos</option>
                @foreach($anos as $ano_option)
                    <option value="{{ $ano_option }}">{{ $ano_option }}</option>
                @endforeach
            </select>
        </div>

        <!-- Price Range -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Faixa de Preço</label>
            <div class="space-y-2">
                <input
                    type="number"
                    wire:model.blur="preco_min"
                    wire:key="preco-min-{{ $filterKey }}"
                    placeholder="Preço mínimo"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-electric-blue focus:border-transparent">
                <input
                    type="number"
                    wire:model.blur="preco_max"
                    wire:key="preco-max-{{ $filterKey }}"
                    placeholder="Preço máximo"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-electric-blue focus:border-transparent">
            </div>
        </div>

        <button wire:click="applyFilters" class="w-full bg-electric-blue hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">
            <i class="fas fa-filter mr-2"></i>Aplicar Filtros
        </button>

        <button wire:click="clearFilters" class="w-full mt-2 border border-gray-300 text-gray-700 hover:bg-gray-50 font-bold py-2 px-4 rounded-lg transition-colors">
            <i class="fas fa-times mr-2"></i>Limpar Filtros
        </button>



        <!-- Loading indicator -->
        <div wire:loading.delay class="mt-4 text-center">
            <div class="inline-flex items-center px-4 py-2 font-semibold leading-6 text-sm shadow rounded-md text-gray-500 bg-white border border-gray-200">
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Filtrando...
            </div>
        </div>
    </div>
</div>

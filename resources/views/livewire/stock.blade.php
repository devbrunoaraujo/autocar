<div id="inventoryPage">
    <div class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <button class="flex items-center text-electric-blue hover:text-blue-600 mb-6">
                <i class="fas fa-arrow-left mr-2"></i>Voltar ao início
            </button>

            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Filters Sidebar -->
                <livewire:filter-car/>

                <!-- Vehicles Grid -->
                <div class="lg:w-3/4">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-steel-blue">Estoque Completo</h2>
                        <div class="flex items-center gap-2">
                            <span class="text-gray-600">Ordenar por:</span>
                            <select
                                wire:model.live="ordenacao"
                                class="px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-electric-blue focus:border-transparent">
                                <option value="latest">Mais recente</option>
                                <option value="menor_preco">Menor preço</option>
                                <option value="maior_preco">Maior preço</option>
                                <option value="menor_km">Menor quilometragem</option>
                            </select>
                        </div>
                    </div>

                    <livewire:car-list />
                </div>
            </div>
        </div>
    </div>
</div>

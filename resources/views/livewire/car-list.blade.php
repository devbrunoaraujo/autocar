<div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($cars as $car)
        <a href="{{route('veiculo', $car->id) }}" class="block group">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 hover:scale-[1.02] cursor-pointer border border-gray-100" wire:key="car-{{ $car->id }}">

                <!-- Container da Imagem com Overlay -->
                <div class="relative h-56 bg-gradient-to-br from-gray-100 via-gray-50 to-white overflow-hidden">
                    <!-- Imagem do Veículo -->
                    <img src="{{ asset('storage/' . $car->thumb) }}"
                         alt="{{ $car->modelo_nome }}"
                         class="h-full w-full object-contain group-hover:scale-100 transition-transform duration-700">

                    <!-- Overlay Gradiente -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <!-- Badge de Status/Destaque -->
                    <div class="absolute top-4 left-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500 text-white shadow-lg">
                            <i class="fas fa-star mr-1"></i>
                            Destaque
                        </span>
                    </div>
                </div>

                <!-- Conteúdo do Card -->
                <div class="p-6 space-y-4">
                    <!-- Header com Marca e Modelo -->
                    <div class="space-y-2">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-bold text-gray-800 group-hover:text-blue-600 transition-colors">
                                {{ $car->marca_nome }}
                            </h3>
                            <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full">
                                {{ $car->ano_nome }}
                            </span>
                        </div>
                        <p class="text-gray-600 font-medium">{{ $car->modelo_nome }}</p>
                    </div>

                    @php
                        list($ano, $comb) = explode(' ', $car->ano_nome, 2);
                    @endphp

                    <!-- Especificações Técnicas -->
                    <div class="grid grid-cols-2 gap-4 py-3 border-t border-gray-100">
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-road text-blue-500 mr-2"></i>
                            <span>{{ number_format($car->quilometragem, 0, ',', '.') }} km</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-gas-pump text-green-500 mr-2"></i>
                            <span>{{ $comb }}</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-cogs text-purple-500 mr-2"></i>
                            <span>{{ $car->cambio }}</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-calendar text-orange-500 mr-2"></i>
                            <span>{{ $ano }}</span>
                        </div>
                    </div>

                    <!-- Preço e CTA -->
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div class="space-y-1">
                            <span class="text-2xl font-bold text-emerald-600">
                                R$ {{ number_format($car->preco, 0, ',', '.') }}
                            </span>
                        </div>

                        <div class="flex space-x-2">
                            <!-- Botão WhatsApp -->
                            <button class="p-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-colors shadow-md hover:shadow-lg"
                                    wire:click.prevent="contactWhatsApp({{ $car->id }})">
                                <i class="fab fa-whatsapp"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Barra de Progresso de Interesse (Opcional) -->
                    <div class="pt-2">
                        <div class="flex items-center justify-between text-xs text-gray-500 mb-1">
                            <span>Interesse</span>
                            <span>{{ $car->views ?? rand(15, 45) }} visualizações</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-1">
                            <div class="bg-gradient-to-r from-blue-500 to-emerald-500 h-1 rounded-full"
                                 style="width: {{ min(($car->views ?? rand(15, 45)) * 2, 100) }}%"></div>
                        </div>
                    </div>
                </div>

                <!-- Indicador de Hover -->
                <div class="h-1 bg-gradient-to-r from-blue-600 to-emerald-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
            </div>
        </a>
        @endforeach
    </div>

    <!-- Paginação Modernizada -->
    <div class="mt-12 flex justify-center">
        <div class="bg-white rounded-2xl shadow-lg p-2">
            {{ $cars->links() }}
        </div>
    </div>

    <!-- Loading State Melhorado -->
    <div wire:loading.delay class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center">
        <div class="bg-white rounded-2xl p-8 shadow-2xl">
            <div class="flex items-center space-x-4">
                <div class="animate-spin rounded-full h-8 w-8 border-4 border-blue-600 border-t-transparent"></div>
                <div class="text-gray-700 font-medium">Carregando veículos...</div>
            </div>
        </div>
    </div>

    <!-- Empty State -->
    @if($cars->count() === 0)
    <div class="text-center py-16">
        <div class="bg-white rounded-2xl shadow-lg p-12 max-w-md mx-auto">
            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-car text-4xl text-gray-400"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Nenhum veículo encontrado</h3>
            <p class="text-gray-600 mb-6">Tente ajustar os filtros ou explore outras opções.</p>
            <button wire:click="clearFilters" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition-colors">
                Limpar Filtros
            </button>
        </div>
    </div>
    @endif

    <!-- Cards Skeleton para Loading -->
    <div wire:loading.delay.longer class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @for($i = 0; $i < 6; $i++)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden animate-pulse">
            <div class="h-56 bg-gray-200"></div>
            <div class="p-6 space-y-4">
                <div class="space-y-2">
                    <div class="h-6 bg-gray-200 rounded w-3/4"></div>
                    <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                </div>
                <div class="grid grid-cols-2 gap-4 py-3">
                    <div class="h-4 bg-gray-200 rounded"></div>
                    <div class="h-4 bg-gray-200 rounded"></div>
                    <div class="h-4 bg-gray-200 rounded"></div>
                    <div class="h-4 bg-gray-200 rounded"></div>
                </div>
                <div class="flex items-center justify-between pt-4">
                    <div class="space-y-1">
                        <div class="h-6 bg-gray-200 rounded w-24"></div>
                        <div class="h-3 bg-gray-200 rounded w-20"></div>
                    </div>
                    <div class="flex space-x-2">
                        <div class="h-8 w-8 bg-gray-200 rounded"></div>
                        <div class="h-8 w-16 bg-gray-200 rounded"></div>
                    </div>
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>

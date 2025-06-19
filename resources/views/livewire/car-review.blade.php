<section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-steel-blue mb-4">Nossos Veículos</h2>
                    <p class="text-gray-600 text-lg">Uma seleção dos melhores veículos disponíveis</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">

                    @foreach ($cars as $car)
                    <a href="{{route('veiculo', $car->id) }}" class="block">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all cursor-pointer">
                            <div class="h-48 bg-gradient-to-br from-gray-200 to-gray-100 flex items-center justify-center">
                                <img src="{{ asset('storage/' . $car->thumb) }}" alt="{{ $car->modelo_nome }}" class="h-full max-h-48 w-auto object-contain">
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-steel-blue mb-2">{{ $car->marca_nome }}</h3>
                                <p class="text-gray-600 mb-4">{{ $car->modelo_nome }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-2xl font-bold text-emerald-600">R$ {{ number_format($car->preco,0,',','.') }} </span>
                                    <span class="text-sm text-gray-500">{{ $car->quilometragem }} km</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                <div x-data class="text-center">
                    <button @click="window.location.href='{{ route('estoque') }}'" class="bg-steel-blue hover:bg-steel-gray text-white font-bold py-4 px-8 rounded-lg text-lg transition-all transform hover:scale-105 shadow-lg">
                        <i class="fas fa-eye mr-2"></i>Ver Estoque Completo
                    </button>
                </div>
            </div>
        </section>

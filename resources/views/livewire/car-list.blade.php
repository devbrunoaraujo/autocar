<div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($cars as $car)
        <a href="{{route('veiculo', $car->id) }}" class="block">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all cursor-pointer" wire:key="car-{{ $car->id }}">
                <div class="h-48 bg-gradient-to-br from-gray-200 to-gray-100 flex items-center justify-center">
                    <img src="{{ asset('storage/' . $car->thumb) }}" alt="{{ $car->modelo_nome }}" class="h-full max-h-48 w-auto object-contain">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-steel-blue mb-2">{{ $car->marca_nome }}</h3>
                    <p class="text-gray-600 mb-4">{{ $car->modelo_nome }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold text-emerald-600">R$ {{ number_format($car->preco,0,',','.') }}</span>
                        <span class="text-sm text-gray-500">{{ $car->quilometragem }} km</span>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $cars->links() }}
    </div>

    {{-- Skeleton de carregamento opcional --}}
    <div wire:loading.delay>
        <div class="absolute inset-0 bg-white bg-opacity-70 z-10 flex items-center justify-center">
            <div class="animate-spin rounded-full h-10 w-10 border-t-4 border-emerald-600 border-opacity-50"></div>
        </div>
    </div>
</div>

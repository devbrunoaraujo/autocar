<div>
    <!-- carros-destaque.blade.php -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        @foreach ($cars as $car)
            <a href="{{ route('veiculo', ['id' => $car->id]) }}"
               class="block bg-white rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 overflow-hidden group">

                <div class="relative">
                    <img src="{{ asset('storage/' . $car->thumb) }}"
                         class="w-full h-50 object-cover group-hover:opacity-90 transition-opacity duration-300"
                         alt="{{ $car->modelo_nome }}">
                    <div class="absolute top-2 right-2 bg-yellow-600 text-white text-xs font-semibold px-2 py-1 rounded">
                        <x-bi-star-fill />
                    </div>
                </div>

                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 truncate">
                        {{ $car->marca_nome }} {{ $car->modelo_nome }}
                    </h3>
                    <p class="text-gray-500 text-sm mb-2">
                        {{ $car->ano_nome }} • R$ {{ number_format($car->preco, 2, ',', '.') }}
                    </p>

                    <div class="flex justify-between items-center mt-4">
                        <span class="text-emerald-600 font-semibold">Ver mais</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 group-hover:translate-x-1 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>

<div>    <!-- carros-destaque.blade.php -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($cars as $car)
            <div class="bg-white rounded-xl shadow p-4">
                <img src="{{ asset('storage/' . $carro->imagem) }}" class="w-full h-48 object-cover rounded" alt="{{ $carro->modelo }}">
                <h3 class="mt-2 text-lg font-bold">{{ $carro->marca }} {{ $carro->modelo }}</h3>
                <p class="text-gray-600">{{ $carro->ano }} • {{ number_format($carro->preco, 2, ',', '.') }}</p>
            </div>
        @endforeach
    </div>
</div>

<div>    <!-- carros-destaque.blade.php -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($cars as $car)
            <div class="bg-white rounded-xl shadow p-4">
                <img src="{{ $car->thumb }}" class="w-full h-48 object-cover rounded" alt="{{ $car->modelo_nome }}">
                <h3 class="mt-2 text-lg font-bold">{{ $car->marca_nome }} {{ $car->modelo_nome }}</h3>
                <p class="text-gray-600">{{ $car->ano_nome }} • {{ number_format($car->preco, 2, ',', '.') }}</p>
            </div>
        @endforeachxit
    </div>
</div>

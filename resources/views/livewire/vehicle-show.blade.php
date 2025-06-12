<div class="max-w-7xl mx-auto px-4 py-10">

    <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ $car->marca_nome }} {{ $car->modelo_nome }}</h1>

    <!-- Galeria -->
    <div x-data="{
        active: 0,
        images: @js($car->images ?? []),
        setActive(index) { this.active = index }
    }" class="space-y-4">

        <!-- Imagem ativa -->
        <div class="w-full h-80 rounded overflow-hidden shadow">
            <img :src="'/storage/' + images[active]" class="w-full h-full object-cover" alt="Imagem do veículo">
        </div>

        <!-- Miniaturas -->
        <div class="flex space-x-2 overflow-x-auto">
            <template x-for="(img, index) in images" :key="index">
                <img :src="'/storage/' + img"
                     :class="{'ring-2 ring-blue-500': active === index}"
                     class="w-20 h-20 object-cover rounded cursor-pointer hover:opacity-75 transition"
                     @click="setActive(index)">
            </template>
        </div>
    </div>

    <!-- Informações do veículo -->
    <div class="mt-10 grid md:grid-cols-2 gap-8">
        <div>
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Detalhes</h2>
            <ul class="space-y-2 text-gray-600">
                <li><strong>Ano:</strong> {{ $car->ano_nome }}</li>
                <li><strong>Preço:</strong> R$ {{ number_format($car->preco, 2, ',', '.') }}</li>
            </ul>
        </div>

        <div>
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Descrição</h2>
            <p class="text-gray-600 leading-relaxed">
                {{ $car->descricao ?? 'Sem descrição disponível.' }}
            </p>

            <a href="https://wa.me/{{ preg_replace('/\D/', '', $car->contato ?? '5599999999999') }}?text=Olá, tenho interesse no veículo {{ $car->marca_nome }} {{ $car->modelo_nome }}"
               class="mt-6 inline-block px-6 py-3 bg-emerald-600 text-white rounded hover:bg-emerald-700 transition">
                Entrar em contato
            </a>
        </div>
    </div>
</div>

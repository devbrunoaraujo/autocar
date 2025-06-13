<div class="max-w-7xl mx-auto px-4 py-10 space-y-10">

    <!-- Título -->
    <div class="bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900">
            {{ $car->marca_nome }} {{ $car->modelo_nome }} {{ $car->ano_nome }}
        </h1>
    </div>

    <!-- Galeria + CTA lado a lado -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        <!-- Galeria de imagens -->
        <div x-data="{
            active: 0,
            images: @js($car->images ?? []),
            setActive(index) { this.active = index }
        }" class="bg-white p-4 rounded-xl shadow-md space-y-4">

            <!-- Imagem ativa -->
            <div class="w-full aspect-[4/3] rounded-lg overflow-hidden relative">
                <!-- Botão esquerdo -->
                <button
                    @click="active = active > 0 ? active - 1 : images.length - 1"
                    class="absolute left-2 top-1/2 -translate-y-1/2 z-10 bg-white/80 hover:bg-white text-gray-700 rounded-full p-2 shadow transition"
                    x-show="images.length > 1"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>

                <!-- Botão direito -->
                <button
                    @click="active = active < images.length - 1 ? active + 1 : 0"
                    class="absolute right-2 top-1/2 -translate-y-1/2 z-10 bg-white/80 hover:bg-white text-gray-700 rounded-full p-2 shadow transition"
                    x-show="images.length > 1"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7"/>
                    </svg>
                </button>

                <!-- Galeria de imagens -->
                <template x-for="(img, index) in images" :key="index">
                    <img
                        x-show="active === index"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        :src="'/storage/' + img"
                        class="absolute inset-0 w-full h-full object-cover"
                        alt="Imagem do veículo"
                    />
                </template>
            </div>


            <!-- Miniaturas -->
            <div class="flex space-x-2 overflow-x-auto pt-2 pb-1">
                <template x-for="(img, index) in images" :key="index">
                    <img :src="'/storage/' + img"
                         :class="{'ring-2 ring-emerald-500': active === index}"
                         class="w-20 h-20 object-cover rounded-lg cursor-pointer hover:opacity-75 transition"
                         @click="setActive(index)">
                </template>
            </div>
        </div>

        <!-- Bloco CTA e infos principais -->
        <div class="bg-white p-6 rounded-xl shadow-md flex flex-col justify-between space-y-6">

            <div class="space-y-3">
                <div class="text-2xl font-bold text-gray-800">
                    R$ {{ number_format($car->preco, 2, ',', '.') }}
                </div>

                <div class="grid grid-cols-2 gap-4 text-sm text-gray-700">
                    <div><span class="font-medium">Marca:</span> {{ $car->marca_nome }}</div>
                    <div><span class="font-medium">Modelo:</span> {{ $car->modelo_nome }}</div>
                    <div><span class="font-medium">Ano:</span> {{ $car->ano_nome }}</div>
                    <!-- Exemplo de campo adicional -->
                    {{-- <div><span class="font-medium">Km:</span> {{ $car->quilometragem }} km</div> --}}
                </div>
            </div>

            <div class="space-y-4">
                <a href="https://wa.me/{{ preg_replace('/\D/', '', $car->contato ?? '5599999999999') }}?text=Olá, tenho interesse no veículo {{ $car->marca_nome }} {{ $car->modelo_nome }}"
                   class="block w-full text-center px-6 py-3 bg-emerald-600 text-white text-lg font-semibold rounded hover:bg-emerald-700 transition">
                    Falar via WhatsApp
                </a>

                <div class="border-t pt-4">
                    <p class="text-sm text-gray-600">
                        Simulação em até 60x de:
                        <span class="text-blue-600 font-semibold">
                            R$ {{ number_format($car->preco / 60, 2, ',', '.') }}
                        </span>
                    </p>
                    <button class="mt-3 w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Simular Financiamento
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Descrição e detalhes adicionais -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        <!-- Descrição -->
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Descrição</h2>
            <p class="text-gray-600 leading-relaxed">
                {{ $car->descricao ?? 'Sem descrição disponível.' }}
            </p>
        </div>

        <!-- Detalhes técnicos -->
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Detalhes Técnicos</h2>
            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-gray-700 text-sm">
                <li><strong>Marca:</strong> {{ $car->marca_nome }}</li>
                <li><strong>Modelo:</strong> {{ $car->modelo_nome }}</li>
                <li><strong>Ano:</strong> {{ $car->ano_nome }}</li>
                <li><strong>Preço:</strong> R$ {{ number_format($car->preco, 2, ',', '.') }}</li>
                {{-- Adicione mais características aqui --}}
            </ul>
        </div>
    </div>
</div>

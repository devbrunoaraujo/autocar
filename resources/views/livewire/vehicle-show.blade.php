<!-- VEHICLE DETAILS PAGE -->
    <div id="vehicleDetailsPage" >
        <div class="bg-white py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <a href="{{ route('home') }}">
                    <i class="fas fa-arrow-left mr-2"></i>Voltar ao catálogo
                </a>

                <!-- Vehicle Gallery Section -->
                <!-- Vehicle Gallery Section -->
                <div
                    x-data="{
                        images: @js(array_merge([$car->thumb], $car->images ?? [])),
                        activeIndex: 0,
                        prev() {
                            this.activeIndex = (this.activeIndex - 1 + this.images.length) % this.images.length;
                        },
                        next() {
                            this.activeIndex = (this.activeIndex + 1) % this.images.length;
                        },
                        setActive(index) {
                            this.activeIndex = index;
                        }
                    }"
                    class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12"
                >
                    <div>
                        <!-- Imagem Principal -->
                        <div class="relative bg-gray-100 rounded-xl h-96 flex items-center justify-center overflow-hidden mb-4">
                            <template x-if="images.length > 0">
                                <img :src="'/storage/' + images[activeIndex]" alt="Imagem do carro" class="object-contain h-full w-full transition-all duration-300">
                            </template>

                            <!-- Botões de Navegação -->
                            <button @click="prev"
                                    class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white px-2 py-1 rounded-full hover:bg-opacity-75">
                                &#8592;
                            </button>
                            <button @click="next"
                                    class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white px-2 py-1 rounded-full hover:bg-opacity-75">
                                &#8594;
                            </button>
                        </div>

                        <!-- Miniaturas -->
                        <div class="grid grid-cols-4 gap-2">
                            <template x-for="(image, index) in images" :key="index">
                                <div @click="setActive(index)"
                                    class="rounded-lg overflow-hidden cursor-pointer border-2"
                                    :class="{ 'border-emerald-500': index === activeIndex, 'border-transparent': index !== activeIndex }">
                                    <img :src="'/storage/' + image"
                                        alt="Miniatura"
                                        class="object-cover h-20 w-full hover:opacity-80 transition">
                                </div>
                            </template>
                        </div>
                    </div>
                    <!-- Vehicle Info -->
                    <div>
                        <h1 id="vehicleTitle" class="text-3xl font-bold text-steel-blue mb-4">{{ $car->marca_nome }} - {{ $car->modelo_nome }}</h1>
                        <div class="text-4xl font-bold text-electric-blue mb-6">R$ {{ number_format($car->preco, 0, ',', '.') }}</div>

                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="text-sm text-gray-600">Quilometragem</div>
                                <div class="font-bold text-steel-blue">{{ $car->quilometragem }} km</div>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="text-sm text-gray-600">Combustível</div>
                                @php
                                    list($ano, $comb) = explode(' ', $car->ano_nome, 2);
                                @endphp
                                <div class="font-bold text-steel-blue">{{ $comb }}</div>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="text-sm text-gray-600">Transmissão</div>
                                <div class="font-bold text-steel-blue">{{ $car->cambio }}</div>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="text-sm text-gray-600">Ano</div>
                                <div class="font-bold text-steel-blue">{{ $ano }}</div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-xl font-bold text-steel-blue mb-3">Opcionais</h3>
                            <div class="flex flex-wrap gap-2">
                            @foreach($car->options as $option)
                                <span class="bg-electric-blue text-white px-3 py-1 rounded-full text-sm">{{$option->name}}</span>
                            @endforeach

                            </div>
                        </div>
                    </div>
                </div>


                <!-- CTA Section -->
                <div class="bg-gradient-to-r from-electric-blue to-blue-600 text-white p-8 rounded-xl mb-12">
                    <div class="text-center">
                        <h2 class="text-2xl font-bold mb-4">Interessado neste veículo?</h2>
                        <p class="text-blue-100 mb-6">Entre em contato conosco e agende um test drive!</p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <button class="bg-white text-electric-blue font-bold py-3 px-6 rounded-lg hover:bg-gray-100 transition-colors">
                                <i class="fas fa-phone mr-2"></i>Ligar Agora
                            </button>
                            <button class="border-2 flex flex-items-center border-white text-white hover:bg-white hover:text-electric-blue font-bold py-3 px-6 rounded-lg transition-colors">
                                <x-fab-whatsapp class="w-5 h-5 mr-2"/>WhatsApp
                            </button>
                            <button class="border-2 border-white text-white hover:bg-white hover:text-electric-blue font-bold py-3 px-6 rounded-lg transition-colors">
                                <i class="fas fa-calculator mr-2"></i>Simular Financiamento
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Similar Vehicles Section -->
                @livewire('featured')
            </div>
        </div>
    </div>

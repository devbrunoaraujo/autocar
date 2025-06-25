<!-- VEHICLE DETAILS PAGE -->
<div id="vehicleDetailsPage">
    <div class="bg-gradient-to-br from-gray-50 to-white min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Back Navigation -->
            <div class="mb-8">
                <a href="{{ route('home') }}" 
                   class="inline-flex items-center text-steel-blue hover:text-electric-blue transition-colors duration-300 group">
                    <div class="bg-white rounded-full p-2 shadow-md group-hover:shadow-lg transition-all duration-300 mr-3">
                        <i class="fas fa-arrow-left text-lg"></i>
                    </div>
                    <span class="font-semibold">Voltar ao catálogo</span>
                </a>
            </div>

            <!-- Vehicle Gallery & Info Section -->
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
                class="bg-white rounded-2xl shadow-xl overflow-hidden mb-12"
            >
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                    <!-- Image Gallery Section -->
                    <div class="p-6 lg:p-8">
                        <!-- Main Image -->
                        <div class="relative bg-gradient-to-br from-gray-100 to-gray-200 rounded-2xl h-96 lg:h-[480px] flex items-center justify-center overflow-hidden mb-6 group">
                            <template x-if="images.length > 0">
                                <img :src="'/storage/' + images[activeIndex]" 
                                     alt="Imagem do carro" 
                                     class="object-contain h-full w-full transition-all duration-500 group-hover:scale-105">
                            </template>

                            <!-- Navigation Buttons -->
                            <button @click="prev"
                                    class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-90 backdrop-blur-sm text-steel-blue p-3 rounded-full hover:bg-electric-blue hover:text-white transition-all duration-300 shadow-lg hover:shadow-xl">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button @click="next"
                                    class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-90 backdrop-blur-sm text-steel-blue p-3 rounded-full hover:bg-electric-blue hover:text-white transition-all duration-300 shadow-lg hover:shadow-xl">
                                <i class="fas fa-chevron-right"></i>
                            </button>

                            <!-- Image Counter -->
                            <div class="absolute top-4 right-4 bg-black bg-opacity-70 text-white px-3 py-1 rounded-full text-sm backdrop-blur-sm">
                                <span x-text="activeIndex + 1"></span>/<span x-text="images.length"></span>
                            </div>
                        </div>

                        <!-- Thumbnails -->
                        <div class="grid grid-cols-4 sm:grid-cols-6 gap-3">
                            <template x-for="(image, index) in images" :key="index">
                                <div @click="setActive(index)"
                                    class="rounded-xl overflow-hidden cursor-pointer border-3 transition-all duration-300 hover:scale-105"
                                    :class="{ 'border-electric-blue shadow-lg': index === activeIndex, 'border-transparent hover:border-gray-300': index !== activeIndex }">
                                    <img :src="'/storage/' + image"
                                        alt="Miniatura"
                                        class="object-cover h-16 sm:h-20 w-full transition-opacity duration-300"
                                        :class="{ 'opacity-50': index !== activeIndex, 'opacity-100': index === activeIndex }">
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Vehicle Info Section -->
                    <div class="p-6 lg:p-8 bg-gradient-to-br from-gray-50 to-white">
                        <!-- Title & Price -->
                        <div class="mb-8">
                            <h1 id="vehicleTitle" class="text-3xl lg:text-4xl font-bold text-steel-blue mb-4">
                                {{ $car->marca_nome }} - {{ $car->modelo_nome }}
                            </h1>
                            <div class="bg-gradient-to-r from-electric-blue to-blue-600 bg-clip-text text-transparent">
                                <div class="text-4xl lg:text-5xl font-bold mb-2">
                                    R$ {{ number_format($car->preco, 0, ',', '.') }}
                                </div>
                            </div>
                            <p class="text-gray-600">Preço à vista ou entrada para financiamento</p>
                        </div>

                        <!-- Vehicle Specs -->
                        <div class="grid grid-cols-2 gap-4 mb-8">
                            <div class="bg-white p-5 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-100">
                                <div class="flex items-center mb-2">
                                    <i class="fas fa-tachometer-alt text-electric-blue mr-2"></i>
                                    <div class="text-sm text-gray-600 font-medium">Quilometragem</div>
                                </div>
                                <div class="font-bold text-steel-blue text-lg">{{ number_format($car->quilometragem, 0, ',', '.') }} km</div>
                            </div>
                            
                            <div class="bg-white p-5 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-100">
                                <div class="flex items-center mb-2">
                                    <i class="fas fa-gas-pump text-electric-blue mr-2"></i>
                                    <div class="text-sm text-gray-600 font-medium">Combustível</div>
                                </div>
                                @php
                                    list($ano, $comb) = explode(' ', $car->ano_nome, 2);
                                @endphp
                                <div class="font-bold text-steel-blue text-lg">{{ $comb }}</div>
                            </div>
                            
                            <div class="bg-white p-5 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-100">
                                <div class="flex items-center mb-2">
                                    <i class="fas fa-cogs text-electric-blue mr-2"></i>
                                    <div class="text-sm text-gray-600 font-medium">Transmissão</div>
                                </div>
                                <div class="font-bold text-steel-blue text-lg">{{ $car->cambio }}</div>
                            </div>
                            
                            <div class="bg-white p-5 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-100">
                                <div class="flex items-center mb-2">
                                    <i class="fas fa-calendar-alt text-electric-blue mr-2"></i>
                                    <div class="text-sm text-gray-600 font-medium">Ano</div>
                                </div>
                                <div class="font-bold text-steel-blue text-lg">{{ $ano }}</div>
                            </div>
                        </div>

                        <!-- Vehicle Options -->
                        <div class="mb-8">
                            <h3 class="text-xl font-bold text-steel-blue mb-4 flex items-center">
                                <i class="fas fa-star text-electric-blue mr-2"></i>
                                Opcionais
                            </h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach($car->options as $option)
                                    <span class="bg-gradient-to-r from-electric-blue to-blue-600 text-white px-4 py-2 rounded-full text-sm font-medium shadow-md hover:shadow-lg transition-all duration-300 hover:scale-105">
                                        {{ $option->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="flex gap-3">
                            <button class="flex-1 bg-gradient-to-r from-electric-blue to-blue-600 text-white font-bold py-3 px-4 rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                <i class="fas fa-heart mr-2"></i>Favoritar
                            </button>
                            <button class="bg-white text-electric-blue border-2 border-electric-blue font-bold py-3 px-4 rounded-xl hover:bg-electric-blue hover:text-white transition-all duration-300 shadow-md hover:shadow-lg">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="bg-gradient-to-r from-electric-blue via-blue-600 to-blue-700 text-white rounded-2xl shadow-2xl overflow-hidden mb-12">
                <div class="relative p-8 lg:p-12">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, white 2px, transparent 2px), radial-gradient(circle at 75% 75%, white 2px, transparent 2px); background-size: 50px 50px;"></div>
                    </div>
                    
                    <div class="relative text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-600 bg-opacity-20 rounded-full mb-6">
                            <i class="fas fa-handshake text-2xl"></i>
                        </div>
                        <h2 class="text-3xl lg:text-4xl font-bold mb-4">Interessado neste veículo?</h2>
                        <p class="text-blue-100 text-lg mb-8 max-w-2xl mx-auto">
                            Entre em contato conosco e agende um test drive! Nossa equipe está pronta para ajudar você a realizar o sonho do carro novo.
                        </p>
                        
                        <div class="flex flex-col sm:flex-row gap-4 justify-center max-w-4xl mx-auto">
                            <button class="bg-white text-electric-blue font-bold py-4 px-8 rounded-xl hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center">
                                <i class="fas fa-phone mr-3 text-lg"></i>
                                <div class="text-left">
                                    <div class="font-bold">Ligar Agora</div>
                                    <div class="text-sm opacity-70">(55) 9999-9999</div>
                                </div>
                            </button>
                            
                            <button class="border-2 border-white text-white hover:bg-white hover:text-electric-blue font-bold py-4 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center">
                                <x-fab-whatsapp class="w-6 h-6 mr-3"/>
                                <div class="text-left">
                                    <div class="font-bold">WhatsApp</div>
                                    <div class="text-sm opacity-70">Resposta rápida</div>
                                </div>
                            </button>
                            
                            <button class="border-2 border-white text-white hover:bg-white hover:text-electric-blue font-bold py-4 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center">
                                <i class="fas fa-calculator mr-3 text-lg"></i>
                                <div class="text-left">
                                    <div class="font-bold">Simular Financiamento</div>
                                    <div class="text-sm opacity-70">Taxas especiais</div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Similar Vehicles Section -->
            @livewire('featured')
        </div>
    </div>
</div>
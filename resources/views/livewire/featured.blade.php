<div>
    <!-- resources/views/livewire/vehicle-highlights.blade.php -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2
                    class="text-3xl md:text-4xl font-bold text-steel-blue mb-4
                       bg-gradient-to-r from-steel-blue to-blue-600 bg-clip-text text-transparent">
                    Veículos em Destaque
                </h2>
                <p class="text-gray-600 text-lg font-medium">Seleções especiais com as melhores condições</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" x-data="{
                init() {
                    this.$nextTick(() => {
                        this.$el.querySelectorAll('.vehicle-card').forEach((card, index) => {
                            setTimeout(() => {
                                card.classList.add('animate-fade-in-up');
                            }, index * 150);
                        });
                    });
                }
            }">

                @foreach ($cars as $index => $car)
                    <article class="vehicle-card opacity-0 translate-y-8 transition-all duration-700 ease-out"
                        x-data="{
                            isHovered: false,
                            imageLoaded: false,
                            init() {
                                const img = this.$refs.carImage;
                                if (img.complete) {
                                    this.imageLoaded = true;
                                }
                            }
                        }" @mouseenter="isHovered = true" @mouseleave="isHovered = false"
                        :class="{
                            'transform -translate-y-3 scale-105': isHovered,
                            'animate-fade-in-up': true
                        }"
                        style="animation-delay: {{ $index * 150 }}ms">

                        <a href="{{ route('veiculo', $car->id) }}"
                            class="block bg-white rounded-2xl overflow-hidden transition-all duration-500 ease-out
                              shadow-lg hover:shadow-2xl hover:shadow-steel-blue/20 group
                              border border-gray-100 hover:border-steel-blue/30">

                            <!-- Image Container -->
                            <div class="relative overflow-hidden">
                                <div
                                    class="h-48 bg-gradient-to-br from-gray-200 via-gray-100 to-gray-50
                                        flex items-center justify-center relative">

                                    <!-- Loading State -->
                                    <div x-show="!imageLoaded"
                                        class="absolute inset-0 bg-gradient-to-r from-gray-200 via-gray-100 to-gray-200
                                            animate-pulse bg-[length:200%_100%]">
                                    </div>

                                    <!-- Car Image -->
                                    <img x-ref="carImage" src="{{ asset('storage/' . $car->thumb) }}"
                                        alt="{{ $car->modelo_nome }}"
                                        class="w-full h-full object-contain transition-all duration-700 ease-out
                                            group-hover:scale-110 group-hover:rotate-1"
                                        :class="{ 'opacity-100': imageLoaded, 'opacity-0': !imageLoaded }"
                                        @load="imageLoaded = true" loading="lazy">
                                </div>

                                <!-- Highlight Badge -->
                                <div class="absolute top-4 right-4 transform transition-all duration-500 ease-out"
                                    :class="isHovered ? 'scale-110 rotate-3' : 'scale-100 rotate-0'">
                                    <div
                                        class="bg-gradient-to-r from-deep-red to-red-600 text-white
                                           px-4 py-2 rounded-full shadow-lg backdrop-blur-sm">
                                        <span class="text-xs font-bold tracking-wider">DESTAQUE</span>
                                    </div>
                                </div>

                                <!-- Overlay Effect -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent
                                        opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-6 space-y-4">
                                <!-- Header -->
                                <div class="space-y-2">
                                    <h3
                                        class="text-xl font-bold text-steel-blue transition-colors duration-300
                                           group-hover:text-deep-red">
                                        {{ $car->marca_nome }}
                                    </h3>
                                    <p class="text-gray-600 font-medium">{{ $car->modelo_nome }}</p>
                                </div>

                                <!-- Details -->
                                <div class="space-y-3">
                                    <!-- Price -->
                                    <div class="flex items-baseline">
                                        <span
                                            class="text-2xl font-bold bg-gradient-to-r from-emerald-600 to-emerald-500
                                                 bg-clip-text text-transparent">
                                            R$ {{ number_format($car->preco, 0, ',', '.') }}
                                        </span>
                                    </div>

                                    <!-- Specs -->
                                    <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                                        <div
                                            class="flex items-center space-x-1 bg-gray-50 px-3 py-1 rounded-full
                                                transition-all duration-300 hover:bg-steel-blue hover:text-white">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="text-sm font-medium">{{ $car->ano_nome }}</span>
                                        </div>

                                        <div
                                            class="flex items-center space-x-1 bg-gray-50 px-3 py-1 rounded-full
                                                transition-all duration-300 hover:bg-emerald-500 hover:text-white">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M8 5a1 1 0 100 2h5.586l-1.293 1.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L13.586 5H8zM12 15a1 1 0 100-2H6.414l1.293-1.293a1 1 0 10-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L6.414 15H12z">
                                                </path>
                                            </svg>
                                            <span
                                                class="text-sm font-medium">{{ number_format($car->quilometragem, 0, ',', '.') }}
                                                Km</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Indicator -->
                            <div class="px-6 pb-4">
                                <div
                                    class="flex items-center justify-center text-steel-blue opacity-0
                                        group-hover:opacity-100 transition-all duration-300 transform
                                        translate-y-2 group-hover:translate-y-0">
                                    <span class="text-sm font-medium mr-2">Ver detalhes</span>
                                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>

            <!-- Empty State -->
            @if (empty($cars))
                <div class="text-center py-12" x-data x-show="true" x-transition>
                    <div class="mx-auto h-24 w-24 text-gray-400 mb-4">
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9zM4 5a2 2 0 012-2v1a2 2 0 00-2 2v6a2 2 0 002 2h8a2 2 0 002-2V6a2 2 0 00-2-2V3a2 2 0 012-2 2 2 0 012 2v8a4 4 0 01-4 4H6a4 4 0 01-4-4V5z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Nenhum veículo em destaque</h3>
                    <p class="text-gray-500">Novos destaques serão adicionados em breve.</p>
                </div>
            @endif
        </div>
    </section>

    <style>
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(2rem);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.7s ease-out forwards;
        }
    </style>
</div>

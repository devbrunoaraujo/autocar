<div>
    <!-- HERO SECTION MODERNIZADO -->
    <section id="home"
        class="relative bg-gradient-to-br from-blue-600 via-gray-800 to-blue-600 text-white overflow-hidden min-h-screen flex items-center">
        <!-- Efeito de partículas flutuantes -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute w-2 h-2 bg-white/10 rounded-full animate-bounce"
                style="left: 10%; top: 20%; animation-delay: 0s;"></div>
            <div class="absolute w-1 h-1 bg-white/10 rounded-full animate-ping"
                style="left: 20%; top: 60%; animation-delay: 2s;"></div>
            <div class="absolute w-3 h-3 bg-white/10 rounded-full animate-pulse"
                style="left: 30%; top: 80%; animation-delay: 4s;"></div>
            <div class="absolute w-2 h-2 bg-white/10 rounded-full animate-bounce"
                style="left: 40%; top: 30%; animation-delay: 1s;"></div>
            <div class="absolute w-1 h-1 bg-white/10 rounded-full animate-ping"
                style="left: 50%; top: 70%; animation-delay: 3s;"></div>
            <div class="absolute w-2 h-2 bg-white/10 rounded-full animate-pulse"
                style="left: 60%; top: 40%; animation-delay: 5s;"></div>
            <div class="absolute w-3 h-3 bg-white/10 rounded-full animate-bounce"
                style="left: 70%; top: 20%; animation-delay: 2.5s;"></div>
            <div class="absolute w-1 h-1 bg-white/10 rounded-full animate-ping"
                style="left: 80%; top: 60%; animation-delay: 4.5s;"></div>
            <div class="absolute w-2 h-2 bg-white/10 rounded-full animate-pulse"
                style="left: 90%; top: 80%; animation-delay: 1.5s;"></div>
        </div>

        <!-- Overlay com gradiente -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/30 via-transparent to-black/50"></div>

        <!-- Padrão geométrico de fundo -->
        <div class="absolute inset-0 opacity-5">
            <div class="w-full h-full"
                style="background-image: repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(255,255,255,.1) 35px, rgba(255,255,255,.1) 70px);">
            </div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Conteúdo Principal -->
                <div class="text-center lg:text-left space-y-8">
                    <!-- Badge moderno -->
                    <div
                        class="inline-flex items-center px-4 py-2 bg-white/10 backdrop-blur-md border border-white/20 rounded-full text-sm font-medium animate-pulse">
                        <i class="fas fa-star text-yellow-400 mr-2"></i>
                        Concessionária Premium
                    </div>

                    <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
                        Sua Nova
                        <span
                            class="block text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-500 animate-pulse">
                            Experiência
                        </span>
                        <span class="text-blue-400 block relative">
                            Automotiva
                            <div
                                class="absolute -bottom-2 left-0 w-full h-1 bg-gradient-to-r from-blue-400 to-transparent rounded-full">
                            </div>
                        </span>
                    </h1>

                    <p class="text-xl md:text-2xl mb-8 text-gray-200 max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                        Descubra veículos excepcionais com
                        <span class="text-blue-400 font-semibold">financiamento facilitado</span>
                        e atendimento premium que você merece
                    </p>

                    <!-- Botões melhorados -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <button wire:click="goToStock"
                            class="group bg-blue-500 hover:bg-blue-600 text-white font-bold py-4 px-8 rounded-xl text-lg transition-all duration-300 transform hover:scale-105 hover:-translate-y-1 shadow-2xl hover:shadow-blue-500/25">
                            <i class="fas fa-search mr-2 group-hover:animate-bounce"></i>
                            Ver Estoque Completo
                            <i class="fas fa-arrow-right ml-2 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                        </button>
                        <button wire:click="goToFinancing"
                            class="group bg-white/10 backdrop-blur-md border-2 border-white text-white hover:bg-white hover:text-gray-800 font-bold py-4 px-8 rounded-xl text-lg transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-calculator mr-2 group-hover:animate-spin"></i>
                            Simular Financiamento
                        </button>
                    </div>

                    <!-- Stats modernos -->
                    <div class="grid grid-cols-3 gap-6 pt-8 border-t border-white/20">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-400">500+</div>
                            <div class="text-sm text-gray-300">Veículos</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-400">15</div>
                            <div class="text-sm text-gray-300">Anos no Mercado</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-400">98%</div>
                            <div class="text-sm text-gray-300">Satisfação</div>
                        </div>
                    </div>
                </div>

                <!-- Elemento visual moderno -->
                <div class="hidden lg:block">
                    <div class="relative">
                        <div
                            class="w-96 h-96 rounded-full bg-white/10 backdrop-blur-md border border-white/20 animate-pulse mx-auto flex items-center justify-center">
                            <div
                                class="w-90 h-90 rounded-full bg-gradient-to-br from-blue-500/20 to-transparent flex items-center justify-center">
                                <img src="{{ asset('/storage/banners/car-banner.png') }}" class="object-cover" alt="">
                            </div>
                        </div>
                        <!-- Círculos decorativos -->
                        <div class="absolute -top-10 -right-10 w-20 h-20 rounded-full bg-blue-500/20 animate-bounce">
                        </div>
                        <div class="absolute -bottom-10 -left-10 w-16 h-16 rounded-full bg-white/10 animate-pulse">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Transição suave para próxima seção -->
        <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-gray-50 to-transparent"></div>

        <!-- Indicador de scroll -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <i class="fas fa-chevron-down text-white text-2xl opacity-70"></i>
        </div>
    </section>

    <!-- BANNER PROMOCIONAL COM SLIDER -->
    <section class="bg-gray-50 py-16" x-data="{
        currentSlide: 0,
        slides: [
            { title: 'Financiamento 0% Juros', color: 'red' },
            { title: 'Desconto até R$ 15.000', color: 'green' },
            { title: 'Aprovação em 24h', color: 'blue' }
        ],
        init() {
            setInterval(() => {
                this.nextSlide();
            }, 5000);
        },
        nextSlide() {
            this.currentSlide = (this.currentSlide + 1) % this.slides.length;
        },
        prevSlide() {
            this.currentSlide = this.currentSlide === 0 ? this.slides.length - 1 : this.currentSlide - 1;
        },
        goToSlide(index) {
            this.currentSlide = index;
        }
    }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Título da seção -->
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    <i class="fas fa-fire text-red-500 mr-3"></i>
                    Ofertas Imperdíveis
                </h2>
                <p class="text-gray-600 text-lg">Promoções exclusivas por tempo limitado</p>
            </div>

            <!-- Slider Container CORRIGIDO -->
            <div class="relative overflow-hidden rounded-2xl shadow-2xl bg-gray-800">
                <!-- Slides Container com altura fixa -->
                <div class="relative h-64 md:h-80">
                    <!-- Slides com posicionamento absoluto -->
                    <div class="absolute inset-0 flex transition-transform duration-700 ease-in-out will-change-transform"
                        :style="'transform: translateX(-' + (currentSlide * 100) + '%)'">

                        <!-- Slide 1 - Financiamento 0% -->
                        <div class="w-full flex-shrink-0 relative min-h-full">
                            <div class="bg-gradient-to-r from-red-600 to-red-800 text-white h-full flex items-center p-8 md:p-12">
                                <div class="grid md:grid-cols-2 gap-8 items-center w-full">
                                    <div>
                                        <div class="inline-block bg-yellow-400 text-red-800 px-4 py-2 rounded-full text-sm font-bold mb-4">
                                            🔥 SUPER OFERTA
                                        </div>
                                        <h3 class="text-3xl md:text-4xl font-bold mb-4">
                                            Financiamento com
                                            <span class="text-yellow-400">0% de Juros</span>
                                        </h3>
                                        <p class="text-xl mb-6 text-red-100">
                                            Para veículos selecionados. Condições especiais para você realizar o sonho do carro próprio!
                                        </p>
                                        <button onclick="alert('Ver Condições')"
                                            class="bg-yellow-400 hover:bg-yellow-500 text-red-800 font-bold py-3 px-6 rounded-lg transition-all transform hover:scale-105">
                                            Ver Condições
                                        </button>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-6xl md:text-8xl font-black opacity-20">0%</div>
                                        <i class="fas fa-percentage text-6xl text-yellow-400"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2 - Desconto -->
                        <div class="w-full flex-shrink-0 relative min-h-full">
                            <div class="bg-gradient-to-r from-green-600 to-green-800 text-white h-full flex items-center p-8 md:p-12">
                                <div class="grid md:grid-cols-2 gap-8 items-center w-full">
                                    <div>
                                        <div class="inline-block bg-yellow-400 text-green-800 px-4 py-2 rounded-full text-sm font-bold mb-4">
                                            💰 DESCONTO ESPECIAL
                                        </div>
                                        <h3 class="text-3xl md:text-4xl font-bold mb-4">
                                            Até <span class="text-yellow-400">R$ 15.000</span>
                                            de Desconto
                                        </h3>
                                        <p class="text-xl mb-6 text-green-100">
                                            Na troca do seu veículo usado. Avaliação gratuita e valor justo garantido!
                                        </p>
                                        <button onclick="alert('Avaliar Meu Carro')"
                                            class="bg-yellow-400 hover:bg-yellow-500 text-green-800 font-bold py-3 px-6 rounded-lg transition-all transform hover:scale-105">
                                            Avaliar Meu Carro
                                        </button>
                                    </div>
                                    <div class="text-center">
                                        <i class="fas fa-tags text-6xl text-yellow-400 mb-4"></i>
                                        <div class="text-2xl font-bold">Avaliação Gratuita</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 3 - Aprovação Rápida -->
                        <div class="w-full flex-shrink-0 relative min-h-full">
                            <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white h-full flex items-center p-8 md:p-12">
                                <div class="grid md:grid-cols-2 gap-8 items-center w-full">
                                    <div>
                                        <div class="inline-block bg-yellow-400 text-blue-800 px-4 py-2 rounded-full text-sm font-bold mb-4">
                                            ⚡ APROVAÇÃO RÁPIDA
                                        </div>
                                        <h3 class="text-3xl md:text-4xl font-bold mb-4">
                                            Crédito Aprovado em
                                            <span class="text-yellow-400">24 Horas</span>
                                        </h3>
                                        <p class="text-xl mb-6 text-blue-100">
                                            Processo 100% digital. Documentação simplificada para você sair dirigindo mais rápido!
                                        </p>
                                        <button onclick="alert('Solicitar Crédito')"
                                            class="bg-yellow-400 hover:bg-yellow-500 text-blue-800 font-bold py-3 px-6 rounded-lg transition-all transform hover:scale-105">
                                            Solicitar Crédito
                                        </button>
                                    </div>
                                    <div class="text-center">
                                        <i class="fas fa-clock text-6xl text-yellow-400 mb-4"></i>
                                        <div class="text-2xl font-bold">Processo Digital</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navegação - Setas -->
                <button @click="prevSlide()"
                    class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/20 hover:bg-white/30 text-white p-3 rounded-full transition-all backdrop-blur-sm z-10">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button @click="nextSlide()"
                    class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/20 hover:bg-white/30 text-white p-3 rounded-full transition-all backdrop-blur-sm z-10">
                    <i class="fas fa-chevron-right"></i>
                </button>

                <!-- Indicadores -->
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
                    <template x-for="(slide, index) in slides" :key="index">
                        <button @click="goToSlide(index)" 
                            :class="currentSlide === index ? 'bg-white' : 'bg-white/50'"
                            class="w-3 h-3 rounded-full transition-all hover:bg-white/80"></button>
                    </template>
                </div>
            </div>

            <!-- Cards de destaque abaixo do slider -->
            <div class="grid md:grid-cols-3 gap-6 mt-12">
                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1 cursor-pointer"
                    onclick="alert('Mostrar Garantia')">
                    <div class="text-center">
                        <i class="fas fa-shield-alt text-3xl text-green-500 mb-4"></i>
                        <h4 class="text-lg font-bold text-gray-800 mb-2">Garantia Estendida</h4>
                        <p class="text-gray-600">Proteção completa para seu veículo</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1 cursor-pointer"
                    onclick="alert('Agendar Revisão')">
                    <div class="text-center">
                        <i class="fas fa-tools text-3xl text-blue-500 mb-4"></i>
                        <h4 class="text-lg font-bold text-gray-800 mb-2">Revisão Gratuita</h4>
                        <p class="text-gray-600">Primeira revisão por nossa conta</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1 cursor-pointer"
                    onclick="alert('Abrir Suporte')">
                    <div class="text-center">
                        <i class="fas fa-headset text-3xl text-purple-500 mb-4"></i>
                        <h4 class="text-lg font-bold text-gray-800 mb-2">Suporte 24/7</h4>
                        <p class="text-gray-600">Atendimento sempre que precisar</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

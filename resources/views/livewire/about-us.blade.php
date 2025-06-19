<section class="py-16 bg-gradient-to-br from-slate-50 to-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <!-- Conteúdo de Texto -->
            <div class="order-2 lg:order-1">
                <div class="text-center lg:text-left">
                    <h2 class="text-4xl font-bold text-steel-blue mb-4">
                        Sobre a
                        <span class="text-electric-blue">AutoCar</span>
                    </h2>

                    <div class="w-20 h-1 bg-electric-blue mx-auto lg:mx-0 mb-8"></div>

                    <div class="space-y-6 text-lg text-steel-gray leading-relaxed">
                        <p>
                            Fundada em <strong class="text-steel-blue">2010</strong>, a AutoCar nasceu com uma missão clara:
                            <span class="text-electric-blue font-semibold">conectar pessoas aos seus carros dos sonhos</span>
                            através de uma experiência de compra excepcional e transparente.
                        </p>

                        <p>
                            Com mais de <strong class="text-steel-blue">13 anos de experiência</strong> no mercado automotivo,
                            nossa equipe especializada seleciona cuidadosamente cada veículo em nosso estoque,
                            garantindo que você encontre não apenas um carro, mas o
                            <span class="text-electric-blue font-semibold">veículo perfeito</span> para seu estilo de vida.
                        </p>

                        <p>
                            Acreditamos que comprar um carro deve ser uma experiência
                            <strong class="text-steel-blue">emocionante e confiável</strong>.
                            Por isso, oferecemos total transparência em nossos processos,
                            histórico completo de cada veículo e suporte personalizado
                            para que você tome a decisão certa.
                        </p>
                    </div>

                    <!-- Diferenciais -->
                    <div class="mt-10 grid grid-cols-1 sm:grid-cols-3 gap-6">
                        <div class="text-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                            <div class="w-12 h-12 bg-electric-blue rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-shield-alt text-white text-xl"></i>
                            </div>
                            <h3 class="font-bold text-steel-blue mb-2">Garantia</h3>
                            <p class="text-sm text-steel-gray">Todos os veículos com garantia e histórico verificado</p>
                        </div>

                        <div class="text-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                            <div class="w-12 h-12 bg-electric-blue rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-handshake text-white text-xl"></i>
                            </div>
                            <h3 class="font-bold text-steel-blue mb-2">Confiança</h3>
                            <p class="text-sm text-steel-gray">Atendimento personalizado e transparente</p>
                        </div>

                        <div class="text-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                            <div class="w-12 h-12 bg-electric-blue rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-star text-white text-xl"></i>
                            </div>
                            <h3 class="font-bold text-steel-blue mb-2">Excelência</h3>
                            <p class="text-sm text-steel-gray">Veículos selecionados com critérios rigorosos</p>
                        </div>
                    </div>

                    <!-- Call to Action -->
                    <div class="mt-10">
                        <a href="{{ route('estoque') }}" class="inline-flex items-center px-8 py-4 bg-electric-blue hover:bg-blue-600 text-white font-bold rounded-lg shadow-lg hover:shadow-xl transition-all transform hover:scale-105">
                            <i class="fas fa-car mr-3"></i>
                            Encontre Seu Carro dos Sonhos
                        </a>
                    </div>
                </div>
            </div>

            <!-- Imagem da Empresa -->
            <div class="order-1 lg:order-2">
                <div class="relative">
                    <!-- Imagem principal -->
                    <div class="relative overflow-hidden rounded-2xl shadow-2xl">
                        <img
                            src="{{ asset('/storage/config/fachada.png') }}"
                            alt="AutoCar - Concessionária de Veículos Premium"
                            class="w-full h-96 object-cover"
                        >

                        <!-- Overlay com gradiente -->
                        <div class="absolute inset-0 bg-gradient-to-t from-steel-blue/60 to-transparent"></div>

                        <!-- Badge de anos no mercado -->
                        <div class="absolute top-6 right-6 bg-electric-blue text-white px-4 py-2 rounded-full font-bold shadow-lg">
                            <span class="text-sm">13+ Anos</span>
                        </div>

                        <!-- Texto sobre a imagem -->
                        <div class="absolute bottom-6 left-6 text-white">
                            <h3 class="text-2xl font-bold mb-2">AutoCar</h3>
                            <p class="text-blue-100">Realizando sonhos desde 2010</p>
                        </div>
                    </div>

                    <!-- Elementos decorativos -->
                    <div class="absolute -top-4 -left-4 w-24 h-24 bg-electric-blue/20 rounded-full blur-xl"></div>
                    <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-blue-300/20 rounded-full blur-xl"></div>
                </div>

                <!-- Estatísticas -->
                <div class="mt-8 grid grid-cols-2 gap-4">
                    <div class="bg-white p-6 rounded-xl shadow-lg text-center">
                        <div class="text-3xl font-bold text-electric-blue mb-2">500+</div>
                        <div class="text-sm text-steel-gray">Veículos Vendidos</div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-lg text-center">
                        <div class="text-3xl font-bold text-electric-blue mb-2">98%</div>
                        <div class="text-sm text-steel-gray">Clientes Satisfeitos</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

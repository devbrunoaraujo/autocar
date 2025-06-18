<section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-steel-blue mb-4">Nossos Veículos</h2>
                    <p class="text-gray-600 text-lg">Uma seleção dos melhores veículos disponíveis</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                    <!-- Vehicle Preview 1 -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all cursor-pointer" onclick="showVehicleDetails('honda-civic')">
                        <div class="h-48 bg-gradient-to-br from-gray-600 to-gray-400 flex items-center justify-center">
                            <i class="fas fa-car text-white text-6xl"></i>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-steel-blue mb-2">Honda Civic 2022</h3>
                            <p class="text-gray-600 mb-4">Sedan confiável e econômico</p>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-electric-blue">R$ 120.000</span>
                                <span class="text-sm text-gray-500">15.000 km</span>
                            </div>
                        </div>
                    </div>

                    <!-- Vehicle Preview 2 -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all cursor-pointer" onclick="showVehicleDetails('toyota-corolla')">
                        <div class="h-48 bg-gradient-to-br from-gray-700 to-gray-500 flex items-center justify-center">
                            <i class="fas fa-car text-white text-6xl"></i>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-steel-blue mb-2">Toyota Corolla 2023</h3>
                            <p class="text-gray-600 mb-4">Híbrido eficiente e moderno</p>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-electric-blue">R$ 140.000</span>
                                <span class="text-sm text-gray-500">5.000 km</span>
                            </div>
                        </div>
                    </div>

                    <!-- Vehicle Preview 3 -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all cursor-pointer" onclick="showVehicleDetails('volkswagen-jetta')">
                        <div class="h-48 bg-gradient-to-br from-gray-800 to-gray-600 flex items-center justify-center">
                            <i class="fas fa-car text-white text-6xl"></i>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-steel-blue mb-2">Volkswagen Jetta 2022</h3>
                            <p class="text-gray-600 mb-4">Design elegante e tecnologia</p>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-electric-blue">R$ 110.000</span>
                                <span class="text-sm text-gray-500">25.000 km</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button onclick="showInventoryPage()" class="bg-steel-blue hover:bg-steel-gray text-white font-bold py-4 px-8 rounded-lg text-lg transition-all transform hover:scale-105 shadow-lg">
                        <i class="fas fa-eye mr-2"></i>Ver Estoque Completo
                    </button>
                </div>
            </div>
        </section>

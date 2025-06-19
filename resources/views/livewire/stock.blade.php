<div id="inventoryPage" class="hidden">
        <div class="bg-white py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <button onclick="showMainContent()" class="flex items-center text-electric-blue hover:text-blue-600 mb-6">
                    <i class="fas fa-arrow-left mr-2"></i>Voltar ao início
                </button>
                
                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Filters Sidebar -->
                    <div class="lg:w-1/4">
                        <div class="bg-white rounded-xl shadow-lg p-6 sticky top-24">
                            <h3 class="text-xl font-bold text-steel-blue mb-6">Filtros</h3>
                            
                            <!-- Brand Filter -->
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Marca</label>
                                <select id="brandFilter" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-electric-blue focus:border-transparent">
                                    <option value="">Todas as marcas</option>
                                    <option value="audi">Audi</option>
                                    <option value="bmw">BMW</option>
                                    <option value="honda">Honda</option>
                                    <option value="mercedes">Mercedes-Benz</option>
                                    <option value="toyota">Toyota</option>
                                    <option value="volkswagen">Volkswagen</option>
                                    <option value="volvo">Volvo</option>
                                </select>
                            </div>
                            
                            <!-- Model Filter -->
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Modelo</label>
                                <select id="modelFilter" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-electric-blue focus:border-transparent">
                                    <option value="">Todos os modelos</option>
                                    <option value="a4">A4</option>
                                    <option value="x5">X5</option>
                                    <option value="civic">Civic</option>
                                    <option value="c180">C180</option>
                                    <option value="corolla">Corolla</option>
                                    <option value="jetta">Jetta</option>
                                </select>
                            </div>
                            
                            <!-- Year Filter -->
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Ano</label>
                                <select id="yearFilter" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-electric-blue focus:border-transparent">
                                    <option value="">Todos os anos</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                </select>
                            </div>
                            
                            <!-- Price Range -->
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Faixa de Preço</label>
                                <div class="space-y-2">
                                    <input type="number" placeholder="Preço mínimo" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-electric-blue focus:border-transparent">
                                    <input type="number" placeholder="Preço máximo" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-electric-blue focus:border-transparent">
                                </div>
                            </div>
                            
                            <button onclick="applyFilters()" class="w-full bg-electric-blue hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">
                                <i class="fas fa-filter mr-2"></i>Aplicar Filtros
                            </button>
                            
                            <button onclick="clearFilters()" class="w-full mt-2 border border-gray-300 text-gray-700 hover:bg-gray-50 font-bold py-2 px-4 rounded-lg transition-colors">
                                <i class="fas fa-times mr-2"></i>Limpar Filtros
                            </button>
                        </div>
                    </div>
                    
                    <!-- Vehicles Grid -->
                    <div class="lg:w-3/4">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold text-steel-blue">Estoque Completo</h2>
                            <div class="flex items-center gap-2">
                                <span class="text-gray-600">Ordenar por:</span>
                                <select class="px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-electric-blue focus:border-transparent">
                                    <option>Menor preço</option>
                                    <option>Maior preço</option>
                                    <option>Mais recente</option>
                                    <option>Menor quilometragem</option>
                                </select>
                            </div>
                        </div>
                        
                        <div id="vehicleGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Vehicle cards will be populated by JavaScript -->
                        </div>
                        
                        <!-- Pagination -->
                        <div class="mt-8 flex justify-center">
                            <div class="flex space-x-2">
                                <button class="px-3 py-2 border border-gray-300 rounded-md hover:bg-gray-50">Anterior</button>
                                <button class="px-3 py-2 bg-electric-blue text-white rounded-md">1</button>
                                <button class="px-3 py-2 border border-gray-300 rounded-md hover:bg-gray-50">2</button>
                                <button class="px-3 py-2 border border-gray-300 rounded-md hover:bg-gray-50">3</button>
                                <button class="px-3 py-2 border border-gray-300 rounded-md hover:bg-gray-50">Próximo</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
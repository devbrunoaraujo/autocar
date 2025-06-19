<!-- FOOTER -->
<footer class="bg-steel-blue text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div>
                <h3 class="text-xl font-bold mb-4">AutoCar</h3>
                <p class="text-gray-300 mb-4">Sua experiência automotiva de excelência há mais de 15 anos no mercado.</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-300 hover:text-electric-blue">
                        <i class="fab fa-facebook-f text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-electric-blue">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-electric-blue">
                        <i class="fab fa-youtube text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-electric-blue">
                        <i class="fab fa-linkedin text-xl"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-bold mb-4">Links Rápidos</h4>
                <ul class="space-y-2">
                    <li><a href="#home" class="text-gray-300 hover:text-electric-blue">Início</a></li>
                    <li><a href="#financing" class="text-gray-300 hover:text-electric-blue">Financiamento</a></li>
                    <li><a href="{{ route('sobre') }}" class="text-gray-300 hover:text-electric-blue">Sobre Nós</a></li>
                    <li><a href="#contact" class="text-gray-300 hover:text-electric-blue">Contato</a></li>
                    <li><a href="#" onclick="showInventoryPage()" class="text-gray-300 hover:text-electric-blue">Estoque</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div>
                <h4 class="text-lg font-bold mb-4">Serviços</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-300 hover:text-electric-blue">Venda de Veículos</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-electric-blue">Financiamento</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-electric-blue">Seguro Auto</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-electric-blue">Avaliação</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-electric-blue">Consultoria</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="text-lg font-bold mb-4">Contato</h4>
                <div class="space-y-2 text-gray-300">
                    <p><i class="fas fa-map-marker-alt mr-2"></i>Av. Principal, 1234 - Centro</p>
                    <p><i class="fas fa-phone mr-2"></i>(11) 1234-5678</p>
                    <p><i class="fas fa-envelope mr-2"></i>contato@autocar.com.br</p>
                    <p><i class="fas fa-clock mr-2"></i>Seg-Sex: 8h-18h | Sáb: 8h-12h</p>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-600 mt-8 pt-8 text-center">
            <p class="text-gray-300">&copy; 2025 AutoCar. Todos os direitos reservados.</p>
        </div>
    </div>
</footer>

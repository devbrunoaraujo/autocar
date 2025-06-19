<!-- HERO SECTION -->
<section id="home" class="relative bg-gradient-to-r from-steel-blue to-charcoal text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                Sua Nova Experiência
                <span class="text-electric-blue block">Automotiva</span>
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-gray-200 max-w-3xl mx-auto">
                Descubra veículos excepcionais com financiamento facilitado e atendimento premium
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button @click="window.location.href='{{ route('estoque') }}'" class="bg-electric-blue hover:bg-blue-600 text-white font-bold py-4 px-8 rounded-lg text-lg transition-all transform hover:scale-105 shadow-lg">
                    <i class="fas fa-search mr-2"></i>Ver Estoque
                </button>
                <button class="border-2 border-white text-white hover:bg-white hover:text-steel-blue font-bold py-4 px-8 rounded-lg text-lg transition-all">
                    <i class="fas fa-calculator mr-2"></i>Simular Financiamento
                </button>
            </div>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-gray-50 to-transparent"></div>
</section>

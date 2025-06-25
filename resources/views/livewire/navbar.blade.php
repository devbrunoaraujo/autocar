<!-- NAVIGATION MENU -->
<nav class="bg-steel-blue shadow-lg sticky top-0 z-50" x-data="{open: false}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex-shrink-0 flex items-center">
                <h1 class="text-2xl font-bold text-white"><a href="{{ route('home') }}">{{ env('APP_NAME') }}</a></h1>
                {{-- ESPAÇO PARA COLOCAR A LOGO --}}
            </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    <a href="{{ route('home') }}" class="text-white hover:text-electric-blue px-3 py-2 text-sm font-medium transition-colors">Início</a>
                    <a href="{{ route('financing.index') }}" class="text-gray-300 hover:text-electric-blue px-3 py-2 text-sm font-medium transition-colors">Financiamento</a>
                    <a href="{{ route('sobre') }}" class="text-gray-300 hover:text-electric-blue px-3 py-2 text-sm font-medium transition-colors">Sobre Nós</a>
                    <a href="#contact" class="text-gray-300 hover:text-electric-blue px-3 py-2 text-sm font-medium transition-colors">Contato</a>
                    <a href="{{ route('estoque') }}"class="text-gray-300 hover:text-electric-blue px-3 py-2 text-sm font-medium transition-colors">Estoque</a>
                </div>
            </div>
            <div class="md:hidden">
                <button @click="open = !open" class="text-white p-2">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- Mobile menu -->
    <div x-show="open" class="md:hidden bg-steel-gray"
        x-transition:enter.duration.500ms
        x-transition:leave.duration.400ms>

        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('home') }}" class="text-white hover:text-electric-blue block px-3 py-2 text-base font-medium">Início</a>
            <a href="{{ route('financing.index') }}" class="text-gray-300 hover:text-electric-blue block px-3 py-2 text-base font-medium">Financiamento</a>
            <a href="{{ route('sobre') }}" class="text-gray-300 hover:text-electric-blue block px-3 py-2 text-base font-medium">Sobre Nós</a>
            <a href="#contact" class="text-gray-300 hover:text-electric-blue block px-3 py-2 text-base font-medium">Contato</a>
            <a href="{{ route('estoque') }}" class="text-gray-300 hover:text-electric-blue block px-3 py-2 text-base font-medium">Estoque</a>
        </div>
    </div>
</nav>

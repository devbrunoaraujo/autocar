<div x-data="{ open: false }" class="relative">
    <nav class="bg-gray-900 shadow-md w-full">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="text-2xl font-semibold text-emerald-600 tracking-wide flex items-center">
                <img src="{{ asset('storage/logos/logo.png') }}" alt="Logo" class="h-10 w-auto object-contain">
            </a>

            {{-- Menu desktop --}}
            <ul class="hidden md:flex gap-6 text-emerald-500 font-medium">
                <li><a href="{{ route('home') }}" class="hover:text-emerald-600 transition">Início</a></li>
                <li><a href="{{ route('estoque') }}" class="hover:text-emerald-600 transition">Estoque</a></li>
                <li><a href="#sobre" class="hover:text-emerald-600 transition">Sobre</a></li>
                <li><a href="#depoimentos" class="hover:text-emerald-600 transition">Depoimentos</a></li>
                <li><a href="#contato" class="hover:text-emerald-600 transition">Contato</a></li>
            </ul>

            {{-- Botão do menu mobile --}}
            <button @click="open = !open" aria-label="Abrir menu"
                    class="md:hidden focus:outline-none transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-500" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        {{-- Menu mobile --}}
        <div x-show="open"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="md:hidden absolute top-full inset-x-0 bg-gray-900 z-50 border-t border-gray-100 shadow-md rounded-b-lg px-6 py-4 space-y-4">

            <ul class="flex flex-col gap-4 text-emerald-500 font-medium text-base">
                <li><a href="{{ route('home') }}" class="hover:text-emerald-600 transition">Início</a></li>
                <li><a href="{{ route('estoque') }}" class="hover:text-emerald-600 transition">Estoque</a></li>
                <li><a href="#sobre" class="hover:text-emerald-600 transition">Sobre</a></li>
                <li><a href="#depoimentos" class="hover:text-emerald-600 transition">Depoimentos</a></li>
                <li><a href="#contato" class="hover:text-emerald-600 transition">Contato</a></li>
            </ul>
        </div>
    </nav>
</div>

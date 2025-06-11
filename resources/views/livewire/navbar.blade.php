<div>
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="text-2xl font-extrabold text-emerald-600 tracking-wide">
                <img src="{{ asset('storage/logos/logo.png') }}" alt="Logo" class="h-15 object-contain">
            </a>

            {{-- Menu desktop --}}
            <ul class="hidden md:flex gap-6 text-gray-700 font-medium">
                <li><a href="{{ route('home') }}" class="hover:text-emerald-600 transition">Início</a></li>
                <li><a href="{{ route('estoque') }}" class="hover:text-emerald-600 transition">Estoque</a></li>
                <li><a href="#sobre" class="hover:text-emerald-600 transition">Sobre</a></li>
                <li><a href="#depoimentos" class="hover:text-emerald-600 transition">Depoimentos</a></li>
                <li><a href="#contato" class="hover:text-emerald-600 transition">Contato</a></li>
            </ul>

            {{-- Mobile menu toggle --}}
            <div x-data="{ open: false }" class="md:hidden relative">
                <button @click="open = !open" aria-label="Abrir menu" class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-700" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                {{-- Menu mobile --}}
                <div x-show="open"
                     x-transition
                     class="absolute top-14 left-0 w-[90vw] bg-white border rounded-lg shadow-md p-4 z-50 space-y-3">
                    <ul class="flex flex-col gap-2 text-gray-700 font-medium">
                        <li><a href="{{ route('home') }}" class="hover:text-emerald-600">Início</a></li>
                        <li><a href="{{ route('estoque') }}" class="hover:text-emerald-600">Estoque</a></li>
                        <li><a href="#sobre" class="hover:text-emerald-600">Sobre</a></li>
                        <li><a href="#depoimentos" class="hover:text-emerald-600">Depoimentos</a></li>
                        <li><a href="#contato" class="hover:text-emerald-600">Contato</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>

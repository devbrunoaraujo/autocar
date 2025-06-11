<div>
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-bold text-blue-600">Revenda</a>

            <ul class="hidden md:flex gap-6 text-gray-700 font-medium">
                <li><a href="{{ route('home') }}" class="hover:text-blue-600">Início</a></li>
                <li><a href="{{ route('estoque') }}" class="hover:text-blue-600">Estoque</a></li>
                <li><a href="#sobre" class="hover:text-blue-600">Sobre</a></li>
                <li><a href="#depoimentos" class="hover:text-blue-600">Depoimentos</a></li>
                <li><a href="#contato" class="hover:text-blue-600">Contato</a></li>
            </ul>

            {{-- Mobile menu toggle (Alpine.js recomendado) --}}
           <div class="md:hidden" x-data="{ open: false }"> <!-- x-data movido para o contêiner -->
    <button @click="open = !open">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>

    <div x-show="open" class="absolute top-16 left-0 w-full bg-white border-t shadow-md z-50">
        <ul class="flex flex-col gap-4 p-4">
            <li><a href="{{ route('home') }}">Início</a></li>
            <li><a href="{{ route('estoque') }}">Estoque</a></li>
            <li><a href="#sobre">Sobre</a></li>
            <li><a href="#depoimentos">Depoimentos</a></li>
            <li><a href="#contato">Contato</a></li>
        </ul>
    </div>
</div>


</div>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Revenda de Veículos' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-white text-gray-900">

    {{-- Navbar (Livewire) --}}
    @livewire('navbar')

    {{-- Conteúdo principal --}}
    <main>
        {{ $slot }}
    </main>

    {{-- Rodapé (Livewire) --}}
    @livewire('footer')

    @livewireScripts
    @stack('scripts')
</body>
</html>

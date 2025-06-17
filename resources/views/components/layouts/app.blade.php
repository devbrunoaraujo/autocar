<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Revenda de Veículos' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

</head>
<body class="bg-gray-50">
    

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

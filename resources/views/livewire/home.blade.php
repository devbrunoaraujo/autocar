<div>

     @livewire('banner')

    {{-- Destaques --}}
    <section class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl font-bold mb-6">Destaques</h2>
            @livewire('featured')
            <div class="mt-6 text-center">
                <a href="{{-- route('estoque') --}}" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Ver todo o estoque</a>
            </div>
        </div>
    </section>
</div>

<div>

     @livewire('banner')

    {{-- Destaques --}}
    <section class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4">
            <span class="flex items-center  mb-6">
                <span class="h-px flex-1 bg-gradient-to-r from-transparent to-emerald-300 dark:to-emerald-600"></span>
                <h2 class="shrink-0 px-4 text-emerald-700 dark:text-white font-bold">Destaques</h2>
                <span class="h-px flex-1 bg-gradient-to-l from-transparent to-emerald-300 dark:to-emerald-600"></span>
            </span>
            @livewire('featured')
            <div class="mt-6 text-center">
                <a href="{{-- route('estoque') --}}" class="px-6 py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700">Ver todo o estoque</a>
            </div>

             @livewire('testimonials')
        </div>
    </section>
</div>

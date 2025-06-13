<div
    x-data="{
        activeSlide: 0,
        slides: {{ json_encode($siteConfig->banners) }},
        next() {
            this.activeSlide = (this.activeSlide + 1) % this.slides.length;
        },
        prev() {
            this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
        },
        autoplayInterval: null,
        startAutoplay() {
            this.autoplayInterval = setInterval(() => this.next(), 5000);
        },
        stopAutoplay() {
            clearInterval(this.autoplayInterval);
        }
    }"
    x-init="startAutoplay()"
    @mouseenter="stopAutoplay()"
    @mouseleave="startAutoplay()"
    class="relative overflow-hidden w-full h-64 md:h-96  shadow-lg"
>

    <!-- Slides -->
    <template x-for="(slide, index) in slides" :key="index">
        <div
            x-show="activeSlide === index"
            x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            class="absolute inset-0 w-full h-full"
        >
            <img :src="'/storage/' + slide" alt="Banner" class="w-full h-full object-cover" />
        </div>
    </template>

    <!-- Prev button -->
    <button @click="prev"
        class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-white/80 hover:bg-white text-black p-2 rounded-full shadow">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
    </button>

    <!-- Next button -->
    <button @click="next"
        class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-white/80 hover:bg-white text-black p-2 rounded-full shadow">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
        </svg>
    </button>

    <!-- Dots -->
    <div class="absolute bottom-3 left-1/2 transform -translate-x-1/2 flex space-x-2">
        <template x-for="(slide, index) in slides" :key="index">
            <div @click="activeSlide = index"
                :class="{ 'bg-white': activeSlide === index, 'bg-white/50': activeSlide !== index }"
                class="w-3 h-3 rounded-full cursor-pointer transition duration-300"></div>
        </template>
    </div>
</div>

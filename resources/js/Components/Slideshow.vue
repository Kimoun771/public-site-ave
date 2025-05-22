<template>
    <section class="relative w-full h-[300px] md:h-[400px] lg:h-[500px] overflow-hidden mt-[80px]">
        <div class="absolute inset-0 w-full h-full">
            <transition name="fade" mode="out-in">
                <LazyImage
                    :src="props.slides[currentSlide].image"
                    :alt="slides[currentSlide].alt"
                    class="w-full h-full object-cover min-h-screen"
                    :key="slides[currentSlide].image"
                />
            </transition>
        </div>
        <div class="absolute inset-0 flex items-center z-10">
            <div class="w-full px-4 md:px-10 lg:px-12">
                <div class="bg-black/20 backdrop-blur-sm p-4 rounded-lg shadow-lg w-fit max-w-[80%] sm:max-w-sm md:max-w-md lg:max-w-lg mx-auto sm:mx-0">
                    <Heading2 class="font-bold text-white leading-tight mb-2 text-base sm:text-lg md:text-xl lg:text-2xl">
                        {{ slides[currentSlide].title }}
                    </Heading2>
                    <Paragraph class="text-white leading-relaxed text-xs sm:text-sm md:text-base">
                        {{ slides[currentSlide].description }}
                    </Paragraph>
                </div>
            </div>
        </div>
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-3 z-20">
            <button
                v-for="(slide,index) in slides"
                :key="index"
                class="w-2.5 h-2.5 md:w-3 md:h-3 rounded-full transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-1"
                :class="index === currentSlide ? 'bg-white scale-110' : 'bg-white/50 hover:bg-white/70'"
                @click="changeSlide(index)"
                :aria-label="`Go to slide ${index + 1}`"
            ></button>
        </div>
        <button
            class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black/50 hover:bg-black/70 text-white p-2 rounded-full transition-colors duration-300 z-20 focus:outline-none focus:ring-2 focus:ring-white w-8 h-14 lg:w-8 lg:h-14 flex items-center justify-center"
            @click="prevSlide"
            aria-label="Previous slide"
        >
            <Icon icon="mdi:chevron-left" class="h-4 w-4" />
        </button>
        <button
            class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black/50 hover:bg-black/70 text-white p-2 rounded-full transition-colors duration-300 z-20 focus:outline-none focus:ring-2 focus:ring-white w-8 h-14 lg:w-8 lg:h-14 flex items-center justify-center"
            @click="nextSlide"
            aria-label="Next slide"
        >
            <Icon icon="mdi:chevron-right" class="h-4 w-4" />
        </button>
        <button
            class="absolute bottom-4 right-4 z-20 bg-black/50 hover:bg-black/70 text-white p-2 rounded-full transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-white w-8 h-8 flex items-center justify-center"
            @click="toggleAutoplay"
            :aria-label="autoplayActive ? 'Pause slideshow' : 'Play slideshow'"
        >
            <Icon v-if="autoplayActive" icon="mdi:pause-circle" class="h-4 w-4" />
            <Icon v-else icon="mdi:play-circle" class="h-4 w-4" />
        </button>
    </section>
</template>

<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue';
import { Icon } from '@iconify/vue';
import Heading2 from '@/Components/Typography/Heading2.vue';
import Paragraph from '@/Components/Typography/Paragraph.vue';

const props = defineProps<{
    slides: {
        image: string;
        alt: string;
        title: string;
        description: string;
    }[];
}>();
const currentSlide = ref(0);
const autoplayActive = ref(true);
const autoplayInterval = ref<number | null>(null);
const autoplayDuration = 5000;

const changeSlide = (index: number) => {
    if (index !== currentSlide.value) currentSlide.value = index;
};

const prevSlide = () => {
    currentSlide.value = (currentSlide.value - 1 + props.slides.length) % props.slides.length;
};

const nextSlide = () => {
    currentSlide.value = (currentSlide.value + 1) % props.slides.length;
};

const toggleAutoplay = () => {
    autoplayActive.value = !autoplayActive.value;
    if (autoplayActive.value) startAutoplay();
    else clearInterval(autoplayInterval.value!);
};
const startAutoplay = () => {
    clearInterval(autoplayInterval.value!);
    autoplayInterval.value = setInterval(() => {
        if (autoplayActive.value) nextSlide();
    }, autoplayDuration);
};
const handleVisibilityChange = () => {
    if (document.hidden) clearInterval(autoplayInterval.value!);
    else if (autoplayActive.value) startAutoplay();
};
const handleKeyDown = (e: KeyboardEvent) => {
    if (e.key === 'ArrowLeft') prevSlide();
    else if (e.key === 'ArrowRight') nextSlide();
};
onMounted(() => {
    startAutoplay();
    document.addEventListener('visibilitychange', handleVisibilityChange);
    document.addEventListener('keydown', handleKeyDown);
});
onUnmounted(() => {
    clearInterval(autoplayInterval.value!);
    document.removeEventListener('visibilitychange', handleVisibilityChange);
    document.removeEventListener('keydown', handleKeyDown);
});
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
    transition: opacity 0.8s ease;
}
.fade-enter-from, .fade-leave-to {
    opacity: 0;
}
@media (max-width: 640px) {
    section {
        height: 60vh;
        min-height: 250px;
    }
}
</style>

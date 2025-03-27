<template>
    <section class="relative w-full lg:h-[500px] md:h-72 h-90 overflow-hidden">
        <div class="absolute inset-0 w-full h-full">
            <transition name="fade" mode="out-in">
                <LazyImage
                    :src="slides[currentSlide].image"
                    :alt="slides[currentSlide].alt"
                    class="w-full h-full object-cover"
                    :key="slides[currentSlide].image"
                />
            </transition>
            <div class="absolute inset-0 bg-black bg-opacity-30"></div>
        </div>
        <div class="absolute left-8 top-1/2 transform -translate-y-1/2 z-10 max-w-xl text-left text-white text-sm">
            <h1 class="font-bold leading-tight mb-4 text-xl md:text-xl lg:text-2xl">
                {{ slides[currentSlide].heading }}
            </h1>
            <p class="text-gray-200 leading-relaxed text-base md:text-sm">
                {{ slides[currentSlide].description }}
            </p>
        </div>
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
            <button
                v-for="(index) in slides"
                :key="index"
                class="w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100"
                :class="{ 'bg-gray-300': index === currentSlide }"
                @click="changeSlide(index)"
            ></button>
        </div>
        <button
            class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 p-2 rounded-full hover:bg-opacity-80"
            @click="prevSlide">
            &#10094;
        </button>
        <button
            class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 p-2 rounded-full hover:bg-opacity-80"
            @click="nextSlide">
            &#10095;
        </button>
    </section>
</template>

<script setup>
import { ref, onMounted } from 'vue';
const slides = ref([
    {
        image: 'https://www.bsigroup.com/globalassets/localfiles/1400x585/amazon-river-1400x585-reversed.jpg',
        alt: 'Certification background',
        heading: 'Achieve Compliance with Globally Recognized Certifications!',
        description: 'Get internationally accredited certifications for quality and environmental compliance to enhance your business credibility.'
    },
    {
        image: 'https://www.bsigroup.com/siteassets/images/16-7-hro/gl-grp-cross-brand-built-sus-nsp-mp-021177286537-1223-img.jpg?imwidth=2000&imdensity=2',
        alt: 'Nature background',
        heading: 'Enhance Sustainability with Certified Standards!',
        description: 'Obtain certifications that support your organization’s environmental and social responsibility goals.'
    },
    {
        image: 'https://www.bsigroup.com/siteassets/images/16-7-hro/gl-grp-cross-brand-built-sus-nsp-mp-021177286537-1223-img.jpg?imwidth=2000&imdensity=2',
        alt: 'Business growth background',
        heading: 'Drive Business Excellence with Trusted Certifications!',
        description: 'Boost customer confidence and operational efficiency with globally recognized certifications.'
    }
]);

const currentSlide = ref(0);

const changeSlide = (index) => {
    currentSlide.value = index;
};

const prevSlide = () => {
    currentSlide.value = (currentSlide.value - 1 + slides.value.length) % slides.value.length;
};

const nextSlide = () => {
    currentSlide.value = (currentSlide.value + 1) % slides.value.length;
};

onMounted(() => {
    setInterval(() => {
        nextSlide();
    }, 5000);
});
</script>

<style>
.fade-enter-active, .fade-leave-active {
    transition: opacity 1s;
}
.fade-enter, .fade-leave-to {
    opacity: 0;
}
</style>

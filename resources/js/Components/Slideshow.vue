<template>
  <section
    v-if="slides && slides.length"
    class="relative w-full h-[300px] md:h-[500px] lg:h-[500px] overflow-hidden mt-[80px]"
  >
    <div class="absolute inset-0 w-full h-full">
      <transition name="fade" mode="out-in">
        <LazyImage
          :src="`/uploads/`+slides[currentSlide].image"
          :alt="slides[currentSlide].alt"
          class="w-full h-full object-cover min-h-screen"
          :key="slides[currentSlide].image"
        />
      </transition>
      <div class="absolute inset-0 bg-black bg-opacity-30"></div>
    </div>

    <div class="absolute left-8 top-1/2 transform -translate-y-1/2 z-10 max-w-xl text-left text-white text-sm lg:px-24">
      <h1 class="font-bold leading-tight mb-4 text-xl md:text-xl lg:text-2xl">
        {{ slides[currentSlide].heading }}
      </h1>
      <p class="text-gray-200 leading-relaxed text-base md:text-sm">
        {{ slides[currentSlide].description }}
      </p>
    </div>

    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
      <button
        v-for="(_, index) in slides"
        :key="index"
        class="w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100"
        :class="{ 'bg-gray-300': index === currentSlide }"
        @click="changeSlide(index)"
      ></button>
    </div>

    <button
      class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 p-2 rounded-full hover:bg-opacity-80"
      @click="prevSlide"
    >
      &#10094;
    </button>
    <button
      class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 p-2 rounded-full hover:bg-opacity-80"
      @click="nextSlide"
    >
      &#10095;
    </button>
  </section>
</template>

<script setup>
import { ref, onMounted } from 'vue';
const { slides } = defineProps({
  slides: {
    type: Array,
    required: true
  }
});

const currentSlide = ref(0);

const changeSlide = (index) => {
  currentSlide.value = index;
};

const prevSlide = () => {
  currentSlide.value = (currentSlide.value - 1 + slides.length) % slides.length;
};

const nextSlide = () => {
  currentSlide.value = (currentSlide.value + 1) % slides.length;
};

onMounted(() => {
  if (slides.length > 0) {
    setInterval(() => {
      nextSlide();
    }, 5000);
  }
});
</script>

<style>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 1s;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
}
</style>

<template>
    <div class="relative overflow-hidden rounded-lg shadow-lg w-full h-[300px] sm:h-[350px] md:h-[400px] lg:h-[300px] xl:h-[350px] lg:flex-1 min-w-0 grid grid-cols-1 sm:grid-cols-1">
        <!-- Image Section -->
        <div class="absolute inset-0">
            <LazyImage
                :src="image"
                alt=""
                class="object-cover w-full h-full"
            />
            <div class="absolute bottom-0 w-full h-1/2 bg-black bg-opacity-40"></div>
        </div>

        <!-- Text Section -->
        <div class="relative h-full flex flex-col justify-end p-4 sm:p-6 md:p-8 text-white space-y-2 sm:space-y-3">
            <h3 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-center line-clamp-1">
                {{ title }}
            </h3>
            <p class="text-sm sm:text-base md:text-lg lg:text-xl text-center max-w-3xl mx-auto line-clamp-3">
                {{ description }}
            </p>
        </div>
    </div>
</template>
<script>
import { defineComponent } from 'vue';

export default defineComponent({
    props: {
        title: String,
        description: String,
        image: String
    }
});
</script>

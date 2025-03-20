<template>
    <div class="relative overflow-hidden rounded-lg shadow-lg h-64 flex-1 min-w-0">
        <!-- Background image -->
        <div class="absolute inset-0">
            <img :src="image" alt="" class="object-cover w-full h-full" />
            <!-- Overlay only covering the bottom 40% -->
            <div class="absolute bottom-0 w-full h-2/4 bg-black bg-opacity-40"></div>
        </div>

        <!-- Content -->
        <div class="relative h-full flex flex-col p-6 text-white justify-end">
            <h3 class="text-xl mt-4 font-bold text-center">{{ title }}</h3>
            <p class="text-sm text-justify">{{ description }}</p>
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

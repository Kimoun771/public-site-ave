<template>
    <div class="card">
        <Carousel
            :value="clients"
            :numVisible="5"
            :numScroll="1"
            :responsiveOptions="responsiveOptions"
            circular
            :autoplayInterval="3000"
        >
            <template #item="slotProps">
                <div class="w-24 md:w-28 lg:w-32 flex items-center justify-center">
                    <img
                        :src="slotProps.data.logo"
                        :alt="slotProps.data.name || 'Client logo'"
                        class="h-12 object-contain transition-all duration-300 hover:scale-110"
                    />
                </div>
            </template>
        </Carousel>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import Carousel from 'primevue/carousel';

defineProps({
    clients: {
        type: Array,
        required: true
    }
});

const responsiveOptions = ref([
    { breakpoint: '1024px', numVisible: 5, numScroll: 1 },
    { breakpoint: '768px', numVisible: 3, numScroll: 1 },
    { breakpoint: '640px', numVisible: 3, numScroll: 1 },
    { breakpoint: '480px', numVisible: 3, numScroll: 1 }
]);
</script>

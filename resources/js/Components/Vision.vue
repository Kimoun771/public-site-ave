<template>
    <div class="px-6 md:px-4 lg:px-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 items-center min-h-[400px] md:min-h-[500px] lg:min-h-[600px] w-full">
        <div class="w-full flex">
            <LazyImage
                :src="img"
                :alt="imageAlt"
                class="flex w-full rounded-lg"
            />
        </div>
        <div class="flex flex-col items-center text-center">
            <Heading1 class="mb-4">
                {{ title }}
            </Heading1>
            <Paragraph class="text-base md:text-lg lg:text-xl leading-relaxed max-w-[600px]">
                {{ description }}
            </Paragraph>
        </div>
    </div>
</template>

<script setup lang="ts">
import Paragraph from '@/Components/Typography/Paragraph.vue';
import Heading1 from '@/Components/Typography/Heading1.vue';

defineProps({
    img: {
        type: String,
        default: ""
    },
    imageAlt: {
        type: String,
        default: ""
    },
    title: {
        type: String,
        default: ""
    },
    description: {
        type: String,
        default: ""
    }
});
</script>

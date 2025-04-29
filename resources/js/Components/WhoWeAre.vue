<template>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 items-center min-h-[400px] md:min-h-[300px] lg:min-h-[350px] w-full">
        <div class="flex flex-col justify-center items-center text-center px-6 md:px-4 lg:px-16">
            <Heading1 class="mb-4">
                {{ title }}
            </Heading1>
            <Paragraph class="text-base md:text-lg lg:text-xl leading-relaxed max-w-[600px]">
                {{ description }}
            </Paragraph>
        </div>
        <div class="w-full flex justify-center items-center">
            <LazyImage
                :src="img"
                :alt="imageAlt"
                class="flex w-full rounded-lg"
            />
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

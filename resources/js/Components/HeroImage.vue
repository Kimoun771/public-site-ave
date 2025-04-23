<template>
    <div
        class="relative bg-cover bg-center h-[40vh] md:h-[40vh] lg:h-[70vh] flex items-center px-4 sm:px-6 md:px-8 lg:px-12 mt-[80px]" :style="{ backgroundImage: `url(${backgroundImage})`}">
    <div class="container mx-auto px-4 sm:px-6 md:px-8 relative z-10">
            <div class="text-white max-w-sm sm:max-w-md md:max-w-xl lg:max-w-2xl text-center md:text-left space-y-4 sm:space-y-5 md:space-y-6">
                <Heading2 class="text-white leading-tight sm:leading-tight md:leading-tight lg:leading-tight">
                    {{ title }}
                </Heading2>
                <Paragraph class="text-white opacity-90 text-base sm:text-lg md:text-xl lg:text-xl">
                    {{ description }}
                </Paragraph>
                <div v-if="$slots.actions" class="pt-4 sm:pt-6 md:pt-8">
                    <slot name="actions"></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import Paragraph from "@/Components/Typography/Paragraph.vue";
import Heading2 from '@/Components/Typography/Heading2.vue';

const props = defineProps({
    backgroundImage: {
        type: String,
        default: ""
    },
    title: {
        type: String,
        default: ""
    },
    description:{
        type: String,
        default: ""
    }
})
</script>

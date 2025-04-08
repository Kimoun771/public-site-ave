<template>
    <div class="lg:h-64 h-48 relative group cursor-pointer overflow-hidden rounded-lg w-full">
        <LazyImage
            :src="image"
            :alt="title || 'Image'"
            class="w-full h-full object-cover"
        />
        <div class="absolute bottom-0 w-full h-1/2 bg-black bg-opacity-50 z-10"></div>
        <div class="absolute bottom-0 w-full h-1/2 z-20 flex flex-col p-6 text-white justify-end">
            <Heading3 class="text-center text-white">
                {{ title }}
            </Heading3>
            <Paragraph v-if="description" class="text-center mt-2 text-sm text-white">
                {{ description }}
            </Paragraph>
        </div>
    </div>
</template>

<script setup="ts">
import Heading3 from "@/Components/Typography/Heading3.vue";
import Paragraph from "@/Components/Typography/Paragraph.vue";
const props = defineProps({
    title: {
        type: String,
        default: ""
    },
    description: {
        type: String,
        default: ""
    },
    image: {
        type: String,
        default: ""
    }
});
</script>

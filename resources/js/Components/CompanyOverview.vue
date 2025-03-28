<template>
    <div class="w-full mx-auto p-4">
        <div class="flex flex-col lg:flex-row md:flex-row gap-5">
            <div class="flex-1 flex justify-center items-center">
                <LazyImage
                    :src="imageSrc"
                    :alt="imageAlt"
                    class="w-full h-auto rounded"
                />
            </div>
            <div class="flex-1 flex flex-col justify-center items-center text-center p-5 rounded">
                <Heading1 class="mb-5">
                    {{ title }}
                </Heading1>
                <Paragraph class="mb-6">
                    {{ description }}
                </Paragraph>

                <button
                    @click="handleFindOutMore"
                    class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-6 rounded-md transition-colors duration-300"
                >
                    Find Out More
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';
import Heading1 from '@/Components/Typography/Heading1.vue';
import Paragraph from '@/Components/Typography/Paragraph.vue';

const props = defineProps({
    title: {
        type: String,
        required: true
    },
    description: {
        type: String,
        required: true
    },
    imageSrc: {
        type: String,
        required: true
    },
    imageAlt: {
        type: String,
        default: "Business meeting with data visualization"
    }
});

const handleFindOutMore = () => {
    console.log("Find Out More clicked");
    // Add logic here
};
</script>

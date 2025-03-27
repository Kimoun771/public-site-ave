<template>
    <div class="w-full mx-auto p-4">
        <!-- Two-column layout -->
        <div class="flex flex-col lg:flex-row md:flex-row gap-5">
            <!-- Left column with meeting image -->
            <div class="flex-1 flex justify-center items-center">
                <LazyImage
                    :src="imageSrc"
                    :alt="imageAlt"
                    class="w-full h-auto rounded"
                />
            </div>

            <!-- Right column with company info (Centered) -->
            <div class="flex-1 flex flex-col justify-center items-center text-center p-5 rounded">
                <h1 class="heading-1 mb-5">{{ title }}</h1>

                <p class="paragraph mb-6">
                    {{ description }}
                </p>

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

// Props for flexibility
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

// Button click handler
const handleFindOutMore = () => {
    console.log("Find Out More clicked");
    // Add navigation or logic here
};
</script>

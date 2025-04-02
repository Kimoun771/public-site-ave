<template>
    <div
        v-for="service in services"
        :key="service.id"
        class="rounded-lg shadow-md overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-xl hover:bg-gray-100"
    >
        <LazyImage
            :src="service.imageUrl"
            :alt="`${service.title} service`"
            class="w-full h-48 object-cover transition-transform duration-300 hover:scale-110"
        />
        <div class="p-4">
            <Heading2 class="text-center border-b pb-2 mb-3">
                {{ service.title }}
            </Heading2>
            <Paragraph class="text-sm mb-4">
                {{ service.description }}
            </Paragraph>
            <button
                class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded"
            >
               Read More
            </button>
        </div>
    </div>
</template>

<script setup lang="ts">
import { defineProps } from "vue";
import Paragraph from "@/Components/Typography/Paragraph.vue";
import Heading2 from "@/Components/Typography/Heading2.vue";
interface Service {
    id: number;
    imageUrl: string;
    title: string;
    description: string;
}

defineProps<{
    title?: string;
    services: Service[];
}>();
</script>

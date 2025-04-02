<template>
    <div
        v-for="service in services"
        :key="service.id"
        class="flex flex-col md:flex-row gap-6 items-start border-b pb-6"
    >
        <div class="w-full md:w-1/4 flex-shrink-0">
            <LazyImage
                :src="service.imageUrl"
                :alt="service.title"
                class="w-full h-auto rounded-md object-cover"
            />
        </div>
        <div class="w-full md:w-3/4">
            <Heading2 class="mb-2">
                {{ service.title }}
            </Heading2>
            <Paragraph class="text-gray-700 text-sm">
                {{ service.description }}
            </Paragraph>
        </div>
    </div>
</template>

<script setup lang="ts">
import Paragraph from "@/Components/Typography/Paragraph.vue";
import Heading2 from "@/Components/Typography/Heading2.vue";

interface Service {
    id: number;
    title: string;
    description: string;
    imageUrl: string;
}

defineProps<{
    title?: string;
    services: Service[];
}>();
</script>

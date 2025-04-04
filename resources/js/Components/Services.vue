<template>
    <div
        v-for="(service,index) in services"
        :key="index"
        class="rounded-lg shadow-md overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-xl hover:bg-gray-100"
    >
        <LazyImage
            :src="service.imageUrl"
            :alt="service.title"
            class="w-full h-48 object-cover transition-transform duration-300 hover:scale-110"
        />
        <div class="p-4">
            <Heading2 class="text-center border-b pb-2 mb-3">
                {{ service.title }}
            </Heading2>
            <Paragraph class="text-sm mb-4">
                {{ service.description }}
            </Paragraph>
            <Button @click="handleClick(service)" class="w-full bg-blue-600 hover:bg-blue-700 py-3" >Read More</Button>
        </div>
    </div>
</template>

<script setup lang="ts">
import { defineProps, defineEmits  } from "vue";
import Paragraph from "@/Components/Typography/Paragraph.vue";
import Heading2 from "@/Components/Typography/Heading2.vue";
import Button from '@/Components/Button.vue';
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
const emit = defineEmits<{
    (event: 'read-more', service: Service): void;
}>();

const handleClick = (service: Service) => {
    emit('read-more', service);
};
</script>

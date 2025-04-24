<template>
    <div>
        <div
            v-for="(service, index) in services"
            :key="index"
            @click="openModal(service)"
            class="flex flex-col md:flex-row gap-6 items-start border-b pb-6 cursor-pointer hover:bg-gray-100 transition"
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
                <Paragraph class="text-gray-800 text-sm">
                    {{ truncate(service.description, 250) }}
                </Paragraph>
            </div>
        </div>
        <Popup
            v-if="isModalOpen"
            v-model="isModalOpen"
            :title="selectedService?.title"
            :des="selectedService?.description"
            :image="selectedService?.imageUrl"
        />
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import Paragraph from "@/Components/Typography/Paragraph.vue";
import Heading2 from "@/Components/Typography/Heading2.vue";
import Popup from "@/Components/Popup.vue";
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

const isModalOpen = ref(false);
const selectedService = ref<Service | null>(null);

const openModal = (service: Service) => {
    selectedService.value = service;
    isModalOpen.value = true;
};

const truncate = (text: string, max: number) =>
    text.length > max ? text.slice(0, max) + "..." : text;
</script>

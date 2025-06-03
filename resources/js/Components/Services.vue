<template>
    <div
        v-for="(service,index) in services"
        :key="index"
        class="rounded-lg shadow-md overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-xl hover:bg-gray-100"
    >
        <LazyImage
            :src="`/uploads/`+service.imageUrl"
            :alt="service.title"
            class="w-full h-48 object-cover transition-transform duration-300 hover:scale-100"
        />
        <div class="p-4 flex flex-col h-[210px] justify-between">
            <div>
                <Heading3 class="text-center border-b pb-2 mb-3">
                    {{ service.title }}
                </Heading3>
                <Paragraph class="text-sm mb-4 line-clamp-3 text-justify">
                    {{ truncate(service.description, 150) }}
                </Paragraph>
            </div>
            <Button
                icon=""
                type="button"
                :text="$t('button.read_more')"
                @click="() => openModal(service)"
                class="w-full"
            />
        </div>
    </div>
    <template v-if="openModal">
        <Popup
            v-model="isModalOpen"
            :title="selectedService?.title"
            :des="selectedService?.description"
            :image="`/uploads/${selectedService?.imageUrl}`"
        />
    </template>
</template>
<script setup lang="ts">
import { defineProps, ref } from "vue";
import Paragraph from "@/Components/Typography/Paragraph.vue";
import Button from "@/Components/Common/Button.vue";
import Popup from "@/Components/Popup.vue";
import Heading3 from '@/Components/Typography/Heading3.vue';

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

const openModal  = (service: Service) => {
    selectedService.value = service;
    isModalOpen.value = true;
};

const truncate = (text: string, max: number) => {
    return text?.length > max ? text.slice(0, max) + "..." : text;
};

const isModalOpen = ref(false);
const selectedService = ref<Service | null>(null);

</script>

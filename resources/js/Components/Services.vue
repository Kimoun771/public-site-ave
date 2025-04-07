<template>
    <div
        v-for="(service,index) in services"
        :key="index"
        class="rounded-lg shadow-md overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-xl hover:bg-gray-100"
    >
        <LazyImage
            :src="service.imageUrl"
            :alt="service.title"
            class="w-full h-48 object-cover transition-transform duration-300 hover:scale-100"
        />
        <div class="p-4 flex flex-col h-[210px] justify-between">
            <div>
                <Heading2 class="text-center border-b pb-2 mb-3">
                    {{ service.title }}
                </Heading2>
                <Paragraph class="text-sm mb-4 line-clamp-3 text-justify">
                    {{ truncate(service.description, 150) }}
                </Paragraph>
            </div>
            <Button
                icon=""
                type="button"
                text="Read More"
                @click="() => handleClick"
                class="w-full"
            />
        </div>
    </div>
</template>
<script setup lang="ts">
import { defineProps, defineEmits } from "vue";
import Paragraph from "@/Components/Typography/Paragraph.vue";
import Heading2 from "@/Components/Typography/Heading2.vue";
import Button from "@/Components/Common/Button.vue";

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

const truncate = (text: string, max: number) => {
    return text.length > max ? text.slice(0, max) + "..." : text;
};
</script>

<template>
    <div v-for="(testimonial, index) in testimonials" :key="index" class="flex items-start space-x-4">
        <div v-if="showAvatars" class="flex-shrink-0">
            <LazyImage
                :src="testimonial.avatar"
                :alt="`${testimonial.name} avatar`"
                :class="['object-cover border-2 border-gray-200', avatarSize, avatarShape]"
            />
        </div>
        <div>
            <Paragraph class="italic">
                <span v-if="showQuotationMarks">“</span>
                {{ testimonial.quote }}
                <span v-if="showQuotationMarks">”</span>
            </Paragraph>
            <h4 class="text-lg font-semibold mt-2">{{ testimonial.name }}</h4>
            <Paragraph class="text-sm">
                {{ testimonial.title }}
            </Paragraph>
        </div>
    </div>
</template>

<script setup lang="ts">
import { defineProps } from "vue";
import Paragraph from "@/Components/Typography/Paragraph.vue";

interface Testimonial {
    avatar: string;
    name: string;
    quote: string;
    title: string;
}

defineProps<{
    title?: string;
    testimonials: Testimonial[];
    showAvatars?: boolean;
    showQuotationMarks?: boolean;
    avatarSize?: string;
    avatarShape?: string;
    gridCols?: string;
}>();
</script>

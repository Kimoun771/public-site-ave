<template>
    <div v-for="(testimonial, index) in testimonials" :key="index" class="flex items-start space-x-4">
        <div v-if="showAvatar" class="flex-shrink-0">
            <LazyImage
                :src="testimonial.avatar"
                :alt="`${testimonial.name} avatar`"
                :class="avatarClasses"
            />
        </div>
        <div>
            <Paragraph class="italic">
                <span v-if="showQuot">“</span>
                {{ testimonial.quote }}
                <span v-if="showQuot">”</span>
            </Paragraph>
            <Heading4>{{ testimonial.name }}</Heading4>
            <Paragraph class="text-sm">
                {{ testimonial.title }}
            </Paragraph>
        </div>
    </div>
</template>

<script setup lang="ts">
import { defineProps, computed } from "vue";
import Paragraph from "@/Components/Typography/Paragraph.vue";
import Heading4 from '@/Components/Typography/Heading4.vue';

interface Testimonial {
    avatar: string;
    name: string;
    quote: string;
    title: string;
}

const props = defineProps<{
    title?: string;
    testimonials: Testimonial[];
    showAvatar?: boolean;
    showQuot?: boolean;
    avatarSize?: string;
    avatarShape?: string;
    gridCols?: string;
}>();

const avatarClasses = computed(() => [
    "object-cover border-2 border-gray-200",
    props.avatarSize,
    props.avatarShape
]);
</script>

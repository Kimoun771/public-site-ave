<template>
    <div class="relative overflow-hidden rounded-lg shadow-lg w-full h-[300px] sm:h-[350px] md:h-[400px] lg:h-[300px] xl:h-[350px] lg:flex-1 min-w-0 grid grid-cols-1  sm:grid-cols-1">
        <div class="absolute inset-0">
            <LazyImage
                :src="image"
                :alt="imageAlt"
            class="object-cover w-full h-full"
            />
            <div class="absolute bottom-0 w-full h-1/2 bg-black bg-opacity-40"></div>
        </div>
        <div class="relative h-full flex flex-col justify-end p-4 sm:p-6 md:p-8 text-white space-y-2 sm:space-y-3">
            <Heading1 class="text-center line-clamp-1 text-white">
                {{ title }}
            </Heading1>
            <Paragraph class="text-center max-w-3xl mx-auto line-clamp-3 text-white">
                {{ description }}
            </Paragraph>
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue'
import Paragraph from '@/Components/Typography/Paragraph.vue';
import Heading1 from '@/Components/Typography/Heading1.vue';

export default defineComponent({
    components: { Heading1, Paragraph },
    props: {
        title: String,
        description: String,
        image: String,
        imageAlt: {
            type: String
        }
    }
});
</script>

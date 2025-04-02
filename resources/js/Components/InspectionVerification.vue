<template>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div
                v-for="(item, index) in items"
                :key="index"
                class="bg-white rounded-xl shadow-md overflow-hidden w-full p-4 hover:scale-105"
            >
                <div class="mb-3">
                    <LazyImage
                        :src="item.imageUrl"
                        :alt="item.category"
                        class="w-full h-56 object-cover rounded-lg"
                    />
                </div>
                <div class="text-center">
                    <Paragraph class="text-xl font-semibold text-gray-800">
                        {{ item.category }}
                    </Paragraph>
                </div>
            </div>
        </div>
</template>

<script setup>
import Paragraph from "@/Components/Typography/Paragraph.vue";
const props= defineProps({
    items: {
        type: Array,
        required: true,
    },
});
</script>

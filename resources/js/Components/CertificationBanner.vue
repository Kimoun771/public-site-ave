<template>
    <div class="w-full bg-blue-500 py-12 px-6">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div class="flex justify-center">
                <div class="text-center">
                    <Heading2 class=" font-bold text-white">
                        {{ title }}
                    </Heading2>
                    <paragraph v-if="subtitle" class="text-white mt-2">
                        {{ subtitle }}
                    </paragraph>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="text-center">
                    <paragraph class="text-white mb-4 max-w-md">
                        {{ text }}
                    </paragraph>
                    <button
                        class="bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-8 rounded-full transition duration-300"
                    >
                        Contact
                    </button>
                </div>
            </div>
        </div>
    </div>
    <br>
</template>

<script setup lang="ts">
import { defineProps } from "vue";
import Heading2 from '@/Components/Typography/Heading2.vue';
import Paragraph from '@/Components/Typography/Paragraph.vue';

const props = defineProps({
    title: {
        type: String,
        default:""
    },
    subtitle: {
        type: String,
        default:""
    },
    text: {
        type: String,
        default:""
    }
});
</script>

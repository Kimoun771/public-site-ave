<template>
    <div class="w-full p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <ProgramCard
                    v-for="(program, index) in trainingPrograms"
                    :key="index"
                    :image="program.image"
                    :title="program.title"
                />
            </div>
    </div>
</template>

<script setup>
import ProgramCard from "./ProgramCard.vue";
import Heading2 from '@/Components/Typography/Heading2.vue';

const props = defineProps({
    trainingPrograms: {
        type: Array,
        default: true
    },
});
</script>

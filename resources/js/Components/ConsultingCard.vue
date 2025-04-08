<template>
    <div class="w-full p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <ProgramCard
                v-for="(service, index) in consultingServices"
                :key="index"
                :image="service.image"
                :title="service.title"
            />
        </div>
    </div>
</template>

<script setup>
import ProgramCard from "./ProgramCard.vue";
const props = defineProps({
    consultingServices: {
        type: Array,
        default: ""
    },
});
</script>

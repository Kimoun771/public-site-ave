<script setup lang="ts">
import GeneralLayout from '@/Layouts/GeneralLayout.vue';
import ConsultingCard from '@/Components/ConsultingCard.vue'
import TrainingCard from '@/Components/TrainingCard.vue';
import Heading2 from '@/Components/Typography/Heading2.vue';
import HeroImage from '@/Components/HeroImage.vue';
import { defineProps, ref , computed} from 'vue';

interface data {
    des: string;
    image: string;
}

interface TrainingSettings {
    hero_image: string;
    title: string;
    description: string;
    training_title: string;
    consulting_services_title: string
    training_program_image_des: data[];
    consulting_services_image_des: data[]
}

const props = defineProps({
    settings: {
        type: Object as () => TrainingSettings,
        required: true
    },
});
const settingsData = ref(props.settings);
const imageHero = ref({
    imageUrl: `/uploads/${props.settings.hero_image}`
});
const TrainingItems = computed(() => {
    if (!Array.isArray(settingsData.value.training_program_image_des)) {
        return [];
    }
    
    return settingsData.value.training_program_image_des.map(item => ({
        title: item.des,
        image: `/uploads/${item.image}`
    }));
});
const consultingServicesItems = computed(() => {
    if (!Array.isArray(settingsData.value.consulting_services_image_des)) {
        return [];
    }
    
    return settingsData.value.consulting_services_image_des.map(item => ({
        title: item.des,
        image: `/uploads/${item.image}`
    }));
});
</script>

<template>
    <GeneralLayout>
        <HeroImage
            :backgroundImage="imageHero?.imageUrl"
            :title="settingsData?.title"
            :description="settingsData?.description"
        />
        <div class="mt-5">
            <Heading2 class="text-center mb-6">{{settingsData?.training_title}}</Heading2>
            <TrainingCard :trainingPrograms="TrainingItems"></TrainingCard>
        </div>
        <div class="mt-5" >
            <Heading2 class="text-center mb-6">{{settingsData?.consulting_services_title}}</Heading2>
            <ConsultingCard :consulting-services="consultingServicesItems"></ConsultingCard>
        </div>
    </GeneralLayout>
</template>

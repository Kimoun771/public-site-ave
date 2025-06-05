<script setup lang="ts">
import GeneralLayout from '@/Layouts/GeneralLayout.vue';
import ConsultingCard from '@/Components/ConsultingCard.vue';
import TrainingCard from '@/Components/TrainingCard.vue';
import Heading2 from '@/Components/Typography/Heading2.vue';
import HeroImage from '@/Components/HeroImage.vue';
import SEOHead from '@/Components/SEOHead.vue';
import { defineProps, computed } from 'vue';

interface DataItem {
    des: string;
    image: string;
}

interface TrainingData {
    hero_image: string;
    title: string;
    description: string;
    training_title: string;
    consulting_services_title: string;
    training_program_image_des: DataItem[];
    consulting_services_image_des: DataItem[];
}

interface TrainingSettings {
    training: TrainingData;
    seo?: any;
}

const props = defineProps<{
    settings: TrainingSettings;
}>();
const settingsData = computed(() => props.settings.training);

const heroImageUrl = computed(() =>
    settingsData.value.hero_image
);

const trainingItems = computed(() =>
    settingsData.value.training_program_image_des.map(item => ({
        title: item.des,
        image: `/uploads/` + item.image
    }))
);
const consultingServicesItems = computed(() =>
    settingsData.value.consulting_services_image_des.map(item => ({
        title: item.des,
        image: `/uploads/` + item.image
    }))
);

const seo = computed(() => props.settings.seo);

</script>

<template>
    <GeneralLayout>
        <SEOHead :seo="seo" />
        <HeroImage
            :src="heroImageUrl"
            :title="settingsData.title"
            :desc="settingsData.description"
        />
        <div class="mt-5">
            <Heading2 class="text-center mb-6">
                {{ settingsData.training_title }}
            </Heading2>
            <TrainingCard :training-programs="trainingItems" />
        </div>
        <div class="mt-5">
            <Heading2 class="text-center mb-6">
                {{ settingsData.consulting_services_title }}
            </Heading2>
            <ConsultingCard :consulting-services="consultingServicesItems" />
        </div>
    </GeneralLayout>
</template>

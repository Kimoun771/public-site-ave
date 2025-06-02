<script setup lang="ts">
import GeneralLayout from '@/Layouts/GeneralLayout.vue';
import ServicesList from '@/Components/ServicesList.vue';
import Heading1 from '@/Components/Typography/Heading1.vue';
import HeroImage from '@/Components/HeroImage.vue';
import { computed, PropType, ref } from 'vue';
import SEOHead from '@/Components/SEOHead.vue';

interface HeroSection {
    src: string;
    title: string;
    desc: string;
}

interface Services {
    id: number;
    title: string;
    imageUrl: string;
    desc: string;
}
interface ServiceSection {
    hero: HeroSection;
    services: Services[];
}
interface SeoSettings {
    title: string;
    description: string;
    keywords: string;
    canonical: string;
    ogTitle: string;
    ogDescription: string;
    ogImage: string;
}

const props = defineProps({
    settings: {
        type: Object as PropType<{
            service: ServiceSection;
            seo: SeoSettings;
        }>,
        required: true
    }
});

const { services , hero } = props.settings.service;
const seo = computed(() => props.settings?.seo);
</script>

<template>
    <GeneralLayout laravel-version="" php-version="">
        <SEOHead :seo="seo" :default-title="'Our Services'" />
        <HeroImage
            :src="hero.src"
            :title="hero.title"
            :desc="hero.desc"
        />
        <div class="container mx-auto  px-2 py-8 lg:px-24">
            <Heading1 class="text-center mb-10">
                {{ $t('button.our_services') }}
            </Heading1>
            <div class="space-y-6 px-8">
                <ServicesList
                    title="Our Services"
                    :services="services"
                />
            </div>
        </div>
    </GeneralLayout>
</template>

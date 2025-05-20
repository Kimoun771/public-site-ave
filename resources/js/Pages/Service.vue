<script setup lang="ts">
import GeneralLayout from '@/Layouts/GeneralLayout.vue';
import ServicesList from '@/Components/ServicesList.vue';
import Heading1 from '@/Components/Typography/Heading1.vue';
import HeroImage from '@/Components/HeroImage.vue';
import { ref } from 'vue';


interface Services {
    id: number;
    title: string;
    imageUrl: string;
    description: string;
}

 const props = defineProps({
    settings: {
        type: Object as () => Services[],
        required: true
    }
});
const serviceDada = ref<Services[]>(props.settings.map(service => ({
    ...service,
    imageUrl:`/uploads/${service.imageUrl}`
})));

</script>

<template>
    <GeneralLayout laravel-version="" php-version="">
        <HeroImage
            backgroundImage="https://www.bsigroup.com/globalassets/localfiles/1400x585/amazon-river-1400x585-reversed.jpg"
            title="Ensuring Quality & Compliance Through Expert Inspections!"
            description="We provide independent inspection and verification services to help businesses meet industry standards and regulatory requirements."
        />
        <div class="container mx-auto px-2 py-8 lg:px-24">
            <Heading1 class="text-center mb-10">
                Our Service
            </Heading1>
            <div class="space-y-6 px-8">
                <ServicesList
                    title="Our Services"
                    :services="serviceDada"
                />
            </div>
        </div>
    </GeneralLayout>
</template>

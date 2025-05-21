<script setup lang="ts">
import GeneralLayout from '@/Layouts/GeneralLayout.vue';
import InspectionVerification from '@/Components/InspectionVerification.vue';
import CertificateVerification from '@/Components/CertificateVerification.vue';
import Paragraph from '@/Components/Typography/Paragraph.vue';
import Heading1 from '@/Components/Typography/Heading1.vue';
import HeroImage from '@/Components/HeroImage.vue';
import { defineProps, ref , computed} from 'vue';

interface AssuranceAndComplianceItem {
    des: string;
    image: string;
}

interface InspectionSettings {
    hero_image: string;
    title: string;
    description: string;
    assurance_and_compliance_title: string;
    assurance_and_compliance_description: string;
    assurance_and_compliance_image_des: AssuranceAndComplianceItem[];
}

const props = defineProps({
    countries: {
        type: Array,
        default: () => []
    },
    settings: {
        type: Object as () => InspectionSettings,
        required: true
    },
});

const inspectionData = ref({
    imageUrl: `/uploads/${props.settings.hero_image}`
});

const settingsData = ref(props.settings);

const inspectionItems = computed(() => {
    if (!Array.isArray(settingsData.value.assurance_and_compliance_image_des)) {
        return [];
    }
    
    return settingsData.value.assurance_and_compliance_image_des.map(item => ({
        category: item.des,
        imageUrl: `/uploads/${item.image}`
    }));
});

</script>

<template>
    <GeneralLayout>
        <HeroImage
            :background-image="inspectionData?.imageUrl"
            :title="settingsData?.title"
            :description="settingsData?.description"
        />
        <div class="container mx-auto py-6 lg:px-24 md:px-8 sm:px-16 px-4">
            <Heading1 class="text-center mb-4">
                {{ settingsData?.assurance_and_compliance_title }}
            </Heading1>
            <Paragraph class="text-center mb-8 max-w-3xl mx-auto">
                {{ settingsData?.assurance_and_compliance_description}}
            </Paragraph>
            <InspectionVerification
                :items="inspectionItems || []"
            />
        </div>
      <div class="mx-auto lg:px-20 md:px-8 sm:px-16 px-4 py-6">
        <CertificateVerification :countries="props.countries"></CertificateVerification>
      </div>
    </GeneralLayout>
</template>
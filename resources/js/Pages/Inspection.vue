<script setup lang="ts">
import GeneralLayout from '@/Layouts/GeneralLayout.vue';
import InspectionVerification from '@/Components/InspectionVerification.vue';
import CertificateVerification from '@/Components/CertificateVerification.vue';
import Paragraph from '@/Components/Typography/Paragraph.vue';
import Heading1 from '@/Components/Typography/Heading1.vue';
import HeroImage from '@/Components/HeroImage.vue';
import { defineProps } from 'vue';

interface HeroImageProps {
    backgroundImage: string;
    title: string;
    description: string;
}
const heroImage: HeroImageProps = {
    backgroundImage: 'https://www.bsigroup.com/globalassets/localfiles/1400x585/amazon-river-1400x585-reversed.jpg',
    title: 'Ensuring Quality & Compliance Through Expert Inspections!',
    description: 'We provide independent inspection and verification services to help businesses meet industry standards and regulatory requirements.'
};
const inspectionItems = [
    {
        category: "Factory Inspection",
        imageUrl: "https://www.vecert.com/images/666656e611294_600w.jpg"
    },
    {
        category: "Product Testing",
        imageUrl: "https://www.vecert.com/images/666656e611294_600w.jpg"
    },
    {
        category: "Quality Control",
        imageUrl: "https://www.vecert.com/images/666656e611294_600w.jpg"
    },{
        category: "Factory Inspection",
        imageUrl: "https://www.vecert.com/images/666656e611294_600w.jpg"
    },
    {
        category: "Product Testing",
        imageUrl: "https://www.vecert.com/images/666656e611294_600w.jpg"
    },
    {
        category: "Quality Control",
        imageUrl: "https://www.vecert.com/images/666656e611294_600w.jpg"
    }
];
const props = defineProps({
    countries:{
        type : Array,
        default: []
    }
})
</script>

<template>
    <GeneralLayout laravel-version="11" php-version="">
        <HeroImage
            :background-image="heroImage.backgroundImage"
            :title="heroImage.title"
            :description="heroImage.description"
        />
        <div class="container mx-auto py-6 lg:px-24 md:px-8 sm:px-16 px-4">
            <Heading1 class="text-center mb-4">
                Quality Assurance & Compliance
            </Heading1>

            <Paragraph class="text-center mb-8 max-w-3xl mx-auto">
                Our inspection and verification services ensure products and services meet industry standards with precision and reliability.
            </Paragraph>
            <InspectionVerification
                :items="inspectionItems"
            />
        </div>
      <div class="mx-auto lg:px-20 md:px-8 sm:px-16 px-4 py-6">
        <CertificateVerification :countries="props.countries"></CertificateVerification>
      </div>
    </GeneralLayout>
</template>

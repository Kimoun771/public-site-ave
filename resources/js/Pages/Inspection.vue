<script setup>
import GeneralLayout from '@/Layouts/GeneralLayout.vue';
import InspectionVerification from '@/Components/InspectionVerification.vue';
import CertificateVerification from '@/Components/CertificateVerification.vue';
import Paragraph from '@/Components/Typography/Paragraph.vue';
import Heading1 from '@/Components/Typography/Heading1.vue';
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
</script>

<template>
    <GeneralLayout laravel-version="11" php-version="">
        <div class="container mx-auto px-4 py-6 lg:px-24">
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
        <CertificateVerification></CertificateVerification>
        <br>
    </GeneralLayout>
</template>

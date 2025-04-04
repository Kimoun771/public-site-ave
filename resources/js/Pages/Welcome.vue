<script setup>
import { Head, Link } from '@inertiajs/vue3';
import GeneralLayout from '@/Layouts/GeneralLayout.vue';
import { ref } from 'vue';
// import InspectionVerification from '@/Components/InspectionVerification.vue';
// import CertificateVerification from '@/Components/CertificateVerification.vue';
// import Slideshow from '@/Components/Slideshow.vue';
import CompanyOverview from '@/Components/CompanyOverview.vue';


// Define props
defineProps({
    posts: {
        type: Array,
        required: true
    }
});

// Define reactive data
const trainingPrograms = ref([
    { image: "https://www.vecert.com/images/666657827a01d_600w.jpg", title: "ISO 22000:2018 Food Safety Management" },
    { image: "https://www.vecert.com/images/666657827a01d_600w.jpg", title: "ISO/IEC 27032 Cybersecurity Management System" },
    { image: "https://www.vecert.com/images/666657827a01d_600w.jpg", title: "ISO 37001:2016 Anti-Bribery Management System" }
]);

const consultingServices = ref([
    { image: "https://www.vecert.com/images/666657827a01d_600w.jpg", title: "Compliance Audits & Certification Guidance" },
    { image: "https://www.vecert.com/images/666657827a01d_600w.jpg", title: "Business Process Improvement Consulting" },
    { image: "https://www.vecert.com/images/666657827a01d_600w.jpg", title: "Risk Assessment & Regulatory Compliance" }
]);

const inspectionItems = ref([
    { id: 1, category: 'Environmental & Energy', imageUrl: 'https://www.vecert.com/images/665dcccc9499e_600w.png' },
    { id: 2, category: 'Environmental & Energy', imageUrl: 'https://www.vecert.com/images/665dcccc9499e_600w.png' },
    { id: 3, category: 'Environmental & Energy', imageUrl: 'https://www.vecert.com/images/665dcccc9499e_600w.png' },
    { id: 4, category: 'Environmental & Energy', imageUrl: 'https://www.vecert.com/images/665dcccc9499e_600w.png' },
    { id: 5, category: 'Environmental & Energy', imageUrl: 'https://www.vecert.com/images/665dcccc9499e_600w.png' },
    { id: 6, category: 'Environmental & Energy', imageUrl: 'https://www.vecert.com/images/665dcccc9499e_600w.png' }
]);

// Define methods
const handleVerification = (data) => {
    console.log('Verification requested:', data);
    // API call to backend
};
</script>

<template>
    <GeneralLayout laravel-version="" php-version="">
        <Head>
            <title>AVE</title>
        </Head>

        <div>
<!--            <Slideshow></Slideshow>-->
            <CompanyOverview title="VE-CERT" image-src="https://www.vecert.com/image/Vecert/service_marketing.jpg" description="VE Cert is an independent inspection, verification and certification company which benchmarking international standards from time to time. We are constantly improving our services to exceed customers' and market's expectation in order to provide the BEST SERVICES in the market

"></CompanyOverview>
<!--            <InspectionVerification :items="inspectionItems" />-->
        </div>
        <div>
<!--            <CertificateVerification @verify="handleVerification" />-->
        </div>
    </GeneralLayout>
</template>

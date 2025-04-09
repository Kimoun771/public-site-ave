<script setup>
import GeneralLayout from '@/Layouts/GeneralLayout.vue';
import ServicesList from '@/Components/ServicesList.vue';
import Heading1 from '@/Components/Typography/Heading1.vue';
import ServiceDetail from '@/Components/ServiceDetail.vue';
// import HeroImage from '@/Components/HeroImage.vue';


const serviceData = [
    {
        id: 1,
        title: 'QUALITY',
        imageUrl: 'https://www.vecert.com/images/665dcccc9499e_600w.png',
        description: 'Quality Management System is suitable for any organization looking to improve the way it is operated and managed, regardless of industry and size. With our auditor teams, we can help you realize the benefits of your quality management system to ensure you unlock the true potential in your organization such.'
    },
    {
        id: 2,
        title: 'ENVIRONMENTAL & ENERGY',
        imageUrl: 'https://www.vecert.com/images/665dcd0463543_600w.png',
        description: 'Environmental Management System (EMS) and Energy Management System are the standards designed to address the delicate balance between maintaining profitability and reducing significant environmental impact and energy used, with the commitment of your entire organization, it can enable you to.'
    },
    {
        id: 3,
        title: 'FOOD SAFETY',
        imageUrl: 'https://www.vecert.com/images/665dcd2adf0f1_600w.png',
        description: 'Food Safety Management System is a truly standard suitable for any business in the entire food chain such as food producers, packaging suppliers, chemical producers and other related parties.'
    },
    {
        id: 4,
        title: 'OCCUPATIONAL SAFETY AND HEALTH',
        imageUrl: 'https://www.vecert.com/images/665dcd192bd22_600w.png',
        description: 'ISO 45001 the standard for occupational health and safety management systems. The standard provides you a framework to increase safety, reduce workplace risks and enhance health and safety in your workplace.'
    },
    {
        id: 5,
        title: 'PERSONNEL CERTIFICATION',
        imageUrl: 'https://www.vecert.com/images/662ccddf47cb8_600w.jpg',
        description: 'ISO 17024 an international ISO standard contains principles and requirements for a body certifying persons against specific requirements, and includes the development and maintenance of a certification scheme for persons.'
    }
];
</script>

<template>
    <GeneralLayout laravel-version="" php-version="">
<!--        <HeroImage-->
<!--            backgroundImage="https://www.bsigroup.com/globalassets/localfiles/1400x585/amazon-river-1400x585-reversed.jpg"-->
<!--            title="Ensuring Quality & Compliance Through Expert Inspections!"-->
<!--            description="We provide independent inspection and verification services to help businesses meet industry standards and regulatory requirements."-->
<!--        />-->
        <div class="container mx-auto px-2 py-8 lg:px-24">
            <Heading1 class="text-center mb-10">
                Our Service
            </Heading1>
            <div class="space-y-6 px-8">
                <ServicesList
                    title="Our Services"
                    :services="serviceData"
                />
            </div>
        </div>
    </GeneralLayout>
</template>

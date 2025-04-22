<script setup lang="ts">
import GeneralLayout from '@/Layouts/GeneralLayout.vue';
import ConsultingCard from '@/Components/ConsultingCard.vue'
import TrainingCard from '@/Components/TrainingCard.vue';
import Heading2 from '@/Components/Typography/Heading2.vue';
import HeroImage from '@/Components/HeroImage.vue';
interface Program {
  title: string;
  description: string;
  image: string;
}
const trainingPrograms: Program[] = [
    {
        title: "Software Development Bootcamp",
        description: "Learn full-stack development in 12 weeks.",
        image: "https://www.vecert.com/images/662ccddf47cb8_600w.jpg"
    },
    {
        title: "Data Science Training",
        description: "Master data analysis and machine learning.",
        image: "https://www.vecert.com/images/665dcd3e80ead_600w.png"
    }
    ,
    {
        title: "Data Science Training",
        description: "Master data analysis and machine learning.",
        image: "https://www.vecert.com/images/665dcd6b2e572_600w.png"
    }
];

const consultingServices: Program[] = [

    {
        title: "Cybersecurity Assessment",
        description: "Identify vulnerabilities and secure your systems.",
        image: "https://www.vecert.com/images/665dcd3e80ead_600w.png"
    }
    ,
    {
        title: "Cybersecurity Assessment",
        description: "Identify vulnerabilities and secure your systems.",
        image: "https://www.vecert.com/images/665dcd6b2e572_600w.png"
    }, {
        title: "Business Strategy Consulting",
        description: "Optimize your business strategy for growth.",
        image: "https://www.vecert.com/images/662ccddf47cb8_600w.jpg"
    }
];
</script>

<template>
    <GeneralLayout laravel-version="11" php-version="">
        <HeroImage
            backgroundImage="https://www.bsigroup.com/globalassets/localfiles/1400x585/amazon-river-1400x585-reversed.jpg"
            title="Ensuring Quality & Compliance Through Expert Inspections!"
            description="We provide independent inspection and verification services to help businesses meet industry standards and regulatory requirements."
        />
        <div class="mt-5">
            <Heading2 class="text-center mb-6"> Training Programs</Heading2>
            <TrainingCard :trainingPrograms="trainingPrograms"></TrainingCard>
        </div>
        <div class="mt-5" >
            <Heading2 class="text-center mb-6"> Consulting Services</Heading2>
            <ConsultingCard :consulting-services="consultingServices"></ConsultingCard>
        </div>
    </GeneralLayout>
</template>

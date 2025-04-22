<script setup>
import GeneralLayout from '@/Layouts/GeneralLayout.vue';
import Vision from '@/Components/Vision.vue';
import WhoWeAre from '@/Components/WhoWeAre.vue';
import HeroImage from '@/Components/HeroImage.vue';
import Heading1 from '@/Components/Typography/Heading1.vue';
</script>

<template>
    <GeneralLayout laravel-version="" php-version="">
        <HeroImage background-image="https://www.bsigroup.com/globalassets/localfiles/1400x585/amazon-river-1400x585-reversed.jpg"
                   title="Ensuring Quality & Compliance Through Expert Inspections!"
                   description="We provide independent inspection and verification services to help businesses meet industry standards and regulatory requirements."
        ></HeroImage>
        <Heading1 class="text-center mt-10">Welcome to About Page</Heading1>
        <div class="lg:px-24">
            <Vision img="https://www.vecert.com/images/665dcccc9499e_600w.png"
                    title="Ensuring Compliance and Safety"
                    imageAlt="Compliance and Safety Image"
                    description="At VE Cert, we specialize in certification, inspection, and training services, ensuring businesses meet global compliance and safety standards. Our goal is to enhance credibility, efficiency, and operational excellence through trusted and transparent certification solutions."
            >
            </Vision>
        </div>
        <div class="lg:px-24">
            <WhoWeAre img="https://www.vecert.com/images/665dcccc9499e_600w.png"
                      title="Who We Are"
                      imageAlt="Who We Are"
                      description="VE Cert provides certification, inspection, and consulting services to ensure compliance with international standards."
            ></WhoWeAre>
        </div>
    </GeneralLayout>
</template>

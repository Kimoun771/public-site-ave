<script setup lang="ts">
import GeneralLayout from '@/Layouts/GeneralLayout.vue';
import Slideshow from '@/Components/Slideshow.vue';
import CompanyOverview from '@/Components/CompanyOverview.vue';
import CardCompanyOverview from '@/Components/CardCompanyOverview.vue';
import TestimonialsSection from '@/Components/TestimonialsSection.vue';
import ClientCarousel from '@/Components/SwiperImage.vue';
import ServicesSection from '@/Components/Services.vue';
import { ref , onMounted } from 'vue';
import CertificationBanner from '@/Components/CertificationBanner.vue';
import Heading1 from '@/Components/Typography/Heading1.vue';
import Paragraph from '@/Components/Typography/Paragraph.vue';
import Heading2 from '@/Components/Typography/Heading2.vue';
import { Link } from '@inertiajs/vue3';
const clients = ref([
    { name: 'Company 1', logo: 'https://www.en.cgti.com.my/assets/images/partner/ACM.png' },
    { name: 'Company 2', logo: 'https://www.en.cgti.com.my/assets/images/partner/unesco.png' },
    { name: 'Company 3', logo: 'https://www.vecert.com/image/vecert-logo.png' },
    { name: 'Company 4', logo: 'https://www.vecert.com/image/vecert-logo.png' },
    { name: 'Company 5', logo: 'https://www.vecert.com/image/vecert-logo.png' },
    { name: 'Company 6', logo: 'https://www.en.cgti.com.my/assets/images/partner/ILO.png' },
    { name: 'Company 7', logo: 'https://www.en.cgti.com.my/assets/images/partner/taftc.png' },
    { name: 'Company 8', logo: 'https://www.en.cgti.com.my/assets/images/partner/oafd.png' },
    { name: 'Company 9', logo: 'https://www.en.cgti.com.my/assets/images/partner/unesco.png' },
]);
const testimonialsList = ref([
    {
        quote: "Excellent support and professional service. Highly recommended!",
        name: "John Doe",
        title: "CEO, Tech Innovation",
        avatar: "https://media.hswstatic.com/eyJidWNrZXQiOiJjb250ZW50Lmhzd3N0YXRpYy5jb20iLCJrZXkiOiJnaWZcL3BsYXlcLzBiN2Y0ZTliLWY1OWMtNDAyNC05ZjA2LWIzZGMxMjg1MGFiNy0xOTIwLTEwODAuanBnIiwiZWRpdHMiOnsicmVzaXplIjp7IndpZHRoIjo4Mjh9LCJ0b0Zvcm1hdCI6ImF2aWYifX0="
    },
    {
        quote: "Excellent support and professional service. Highly recommended!",
        name: "Michael Johnson",
        title: "COO, Global Solutions",
        avatar: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTAe9NZZk7nUE_anJir2Scf7tsqMHRdEpCbJg&s"
    },
    {
        quote: "Excellent support and professional service. Highly recommended!",
        name: "Michael Johnson",
        title: "COO, Global Solutions",
        avatar: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSMxSaGSiGX3mtfGyJwHId-n1_pSJTYiwFe2A&s"
    },
    {
        quote: "Excellent support and professional service. Highly recommended!",
        name: "Michael Johnson",
        title: "COO, Global Solutions",
        avatar: "https://img.freepik.com/free-photo/waist-up-portrait-handsome-serious-unshaven-male-keeps-hands-together-dressed-dark-blue-shirt-has-talk-with-interlocutor-stands-against-white-wall-self-confident-man-freelancer_273609-16320.jpg"
    }
]);
const servicesData = ref([
    {
        id: 1,
        title: 'Quality',
        imageUrl: 'https://www.vecert.com/images/665dcccc9499e_600w.png',
        description: 'Quality Management Systems guide your organization seeking to improve the way it is operated and managed, regardless of industry and size. With our auditor teams, your auditor teams, you are audit-ready!'
    },
    {
        id: 2,
        title: 'ANTI- BRIBERY',
        imageUrl: 'https://www.vecert.com/images/677b3fe2bbe56_600w.jpg',
        description: 'Long fights from generation to generation to have a good and equal competition.  Anti Bribery Management System- ABMS is published to recultivate humaninty with more efficient way of management tasks and living environment. '
    },
    {
        id: 3,
        title: 'FOOD SAFETY',
        imageUrl: 'https://www.ficsi.in/blog/wp-content/uploads/2023/09/blog21-1.jpg',
        description: 'Food Safety Management Systems are a standard suitable for any business in the entire food chain such as food producers, packaging suppliers, chemical producers, equipment producers and other related party.'
    },
    {
        id: 4,
        title: 'RISK MANAGEMENT',
        imageUrl: 'https://www.vecert.com/images/665dcd3e80ead_600w.png',
        description: 'Food Safety Management Systems are a standard suitable for any business in the entire food chain such as food producers, packaging suppliers, chemical producers, equipment producers and other related party.'
    }
]);
const companyOverviewData = ref([
    {
        title: 'Inspection',
        image: 'https://www.vecert.com/image/Vecert/Inspection.png',
        description: "Our comprehensive range of inspection and verification services, such as checking the condition to ensure your products and services are within the customers' specifications."
    },
    {
        title: 'Verification',
        image: 'https://www.vecert.com/image/Vecert/verification.png',
        description: "We ensure that products and services comply with global standards and local regulations."
    },
    {
        title: 'Certificate',
        image: 'https://www.vecert.com/image/Vecert/verification.png',
        description: "We provide a platform for you to demonstrate that your products, processes, systems, or services are compliant with either national or international standards and regulations or customer-defined specifications."
    }
]);
</script>
<template>
    <GeneralLayout laravel-version="" php-version="">
        <section>
            <Slideshow></Slideshow>
            <div class="lg:px-24">
                <CompanyOverview
                    title="VE-CERT"
                    image-src="https://www.vecert.com/image/Vecert/service_marketing.jpg"
                    description="VE Cert is an independent inspection, verification and certification company which benchmarks international standards from time to time. We are constantly improving our services to exceed customers' and market's expectations in order to provide the BEST SERVICES in the market">
                </CompanyOverview>
                <div class="flex flex-wrap gap-4 justify-center p-6">
                    <CardCompanyOverview
                        v-for="(item, index) in companyOverviewData"
                        :key="index"
                        :title="item.title"
                        :image="item.image"
                        :description="item.description"
                    />
                </div>
                <div class="container mx-auto px-4">
                    <div class="text-center mb-12">
                        <Heading1 class="text-gray-900">
                            Our Clients
                        </Heading1>
                        <Paragraph class="text-gray-600 mt-2">
                            We have been working with some Fortune 500+ clients
                        </Paragraph>
                    </div>
                    <ClientCarousel :clients="clients" />
                </div>
            </div>
          <div class="p-8 bg-gray-50 rounded-lg lg:px-24 ">
            <Heading2 class="text-center mb-8">Customer Testimonials</Heading2>
            <div class=" grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 gap-8 items-center">
                <TestimonialsSection
                    :testimonials="testimonialsList"
                    :show-avatar="true"
                    :show-quot="true"
                    avatar-size="w-16 h-16 rounded-full"
                />
            </div>
          </div>
        <div class="container mx-auto px-4 py-12">
            <Heading1 class="text-center mb-10">
                Our Services
            </Heading1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 lg:px-24">
                <ServicesSection :services="servicesData" />
            </div>
            <div class=" flex justify-center underline text-black py-4">
                <Link href="/service" >
                    View All Service
                </Link>
            </div>
        </div>
        <CertificationBanner title="Start Your Certification Journey" subtitle="Get certified with confidence!"
                             text="Unlock new opportunities for your business with our trusted certification service. Take the first step toward compliance and excellence today!"/>
        </section>
    </GeneralLayout>
</template>

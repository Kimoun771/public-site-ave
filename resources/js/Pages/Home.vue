<script setup lang="ts">
import GeneralLayout from '@/Layouts/GeneralLayout.vue';
import Slideshow from '@/Components/Slideshow.vue';
import CompanyOverview from '@/Components/CompanyOverview.vue';
import CardCompanyOverview from '@/Components/CardCompanyOverview.vue';
import TestimonialsSection from '@/Components/TestimonialsSection.vue';
import ClientCarousel from '@/Components/SwiperImage.vue';
import ServicesSection from '@/Components/Services.vue';
import { ref ,  computed} from 'vue';
import CertificationBanner from '@/Components/CertificationBanner.vue';
import Heading1 from '@/Components/Typography/Heading1.vue';
import Paragraph from '@/Components/Typography/Paragraph.vue';
import Heading2 from '@/Components/Typography/Heading2.vue';
import Container from '@/Components/Container.vue';
import { Link } from '@inertiajs/vue3';
import SEOHead from '@/Components/SEOHead.vue';

interface VecertData {
  image: string;
  title: string;
  description: string;
}

interface ClientImageDes {
  title: string;
  description: string;
  images: string[];
}

interface VecertDetailItem {
  title: string;
  description: string;
  image: string;
}

interface SlideImageDes {
  title: string;
  description: string;
  image: string;
}

interface HomeSettings {
  vecert: VecertData;
  vecert_image_des: VecertDetailItem[];
  our_client_image_des: ClientImageDes;
  slide_image_des: SlideImageDes[];
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

interface Props {
  settings: {
    seo: SeoSettings;
    home: HomeSettings;
    service_homepage: any;
  };
}

const props = defineProps<Props>();
const limitedServices = computed(() => {
    return Array.isArray(settingsServiceData.value)
        ? settingsServiceData.value.slice(0, 4)
        : [];
});

const slideShow = computed(() => {
  const rawSlides = props.settings?.home?.slide_image_des ?? [];
  return rawSlides.map(slide => ({
    image: slide.image || '',
    alt: slide.title || '',
    heading: slide.title || '',
    desc: slide.description || ''
  }));
});
const vecert = computed(() => props.settings?.home?.vecert);
const settingsServiceData = computed(() => props.settings?.service_homepage.services);
const vecertDetail = computed(() => props.settings?.home?.vecert_image_des);
const ourClient = computed(() => props.settings?.home?.our_client_image_des);
const seo = computed(() => props.settings?.seo);

const clients = computed(() =>
  Array.isArray(ourClient.value?.images)
    ? ourClient.value.images.map((url) => ({
        name: ourClient.value.title,
        logo: `/uploads/${url}`,
      }))
    : []
);

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


</script>
<template>
    <GeneralLayout>
        <SEOHead :seo="seo" :default-title="'Home'" />
        <section>
            <Slideshow :slides="slideShow" />
            <div class="lg:px-24">
                <CompanyOverview
                    v-if="vecert"
                    :title="vecert?.title"
                    :image-src="`/uploads/`+vecert?.image"
                    :description="vecert?.description">
                </CompanyOverview>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4 py-6">
                    <CardCompanyOverview
                        v-for="(item, index) in vecertDetail"
                        :key="index"
                        :title="item.title"
                        :image="`/uploads/`+item.image"
                        :description="item.description"
                    />
                </div>
                <div class="container mx-auto px-4">
                    <div class="text-center mb-12">
                        <Heading1 class="text-gray-900">
                            {{ ourClient?.title }}
                        </Heading1>
                        <Paragraph class="text-gray-600 mt-2">
                            {{ ourClient?.description }}
                        </Paragraph>
                    </div>
                    <ClientCarousel :clients="clients" />
                </div>
            </div>
          <div class="p-8 bg-gray-50 rounded-lg lg:px-24 ">
              <Container>
                <Heading2 class="text-center mb-8">Customer Testimonials</Heading2>
                <div class=" grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 gap-8 items-center">
                    <TestimonialsSection
                        :testimonials="testimonialsList"
                        :show-avatar="true"
                        :show-quot="true"
                        avatar-size="w-16 h-16 rounded-full"
                    />
                </div>
              </Container>
          </div>
        <div class="container mx-auto px-4 py-12">
            <Heading1 class="text-center mb-10">
                {{ $t ('button.our_services')}}
            </Heading1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 lg:px-24">
                <ServicesSection :services="limitedServices" />
            </div>
            <div class=" flex justify-center underline text-black py-4">
                <Link href="/service" >
                    {{ $t('button.view_all_services') }}
                </Link>
            </div>
        </div>
        <CertificationBanner :title="$t('banner.title')"
                             :subtitle="$t('banner.subtitle')"
                             :text="$t('banner.text')"/>
        </section>
    </GeneralLayout>
</template>

<script setup lang="ts">
import GeneralLayout from '@/Layouts/GeneralLayout.vue';
import Vision from '@/Components/Vision.vue';
import HeroImage from '@/Components/HeroImage.vue';
import Heading1 from '@/Components/Typography/Heading1.vue';
import SEOHead from '@/Components/SEOHead.vue';
import { ref, computed } from 'vue';

interface ImageDescription {
  image: string;
  title: string;
  alt: string;
  description: string;
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

interface AboutData {
  image_des: ImageDescription[];
  hero_image: string;
  title: string;
  description: string;
  name: string;
}

const props = defineProps({
  settings: {
    type: Object as () => {
      about: AboutData;
      seo: SeoSettings;
    },
    required: true
  },
})

const customAbout = ref<ImageDescription[]>(props.settings.about?.image_des || []);
const seo = computed(() => props.settings.seo);
</script>

<template>
  <GeneralLayout>
    <SEOHead :seo="seo" :default-title="'About Us'" />
    <HeroImage
      :background-image="`/uploads/`+props.settings.about?.hero_image"
      :title="props.settings.about?.title"
      :description="props.settings.about?.description"
    />
    <Heading1 class="text-center mt-10">{{props.settings.about?.name}}</Heading1>

    <div class="lg:px-24 md:px-4 px-6 lg:py-4">
      <template v-for="(item, index) in customAbout" :key="index">
        <Vision
          :reverse="index % 2 === 1"
          :img="`/uploads/`+item.image"
          :title="item.title"
          :imageAlt="item.title"
          :description="item.description"
        />
      </template>
    </div>
  </GeneralLayout>
</template>

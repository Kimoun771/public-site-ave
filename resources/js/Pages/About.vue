<script setup lang="ts">
import GeneralLayout from '@/Layouts/GeneralLayout.vue';
import Vision from '@/Components/Vision.vue';
import HeroImage from '@/Components/HeroImage.vue';
import Heading1 from '@/Components/Typography/Heading1.vue';
import { ref } from 'vue';

interface ImageDescription {
  image: string;
  title: string;
  alt: string;
  description: string;
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
        type: Object as () => AboutData,
        required: true
    },
  })
  const customAbout = ref<ImageDescription[]>(props.settings.image_des || []);
</script>

<template>
  <GeneralLayout>
    <HeroImage
      :background-image="`/uploads/`+props.settings.hero_image"
      :title="props.settings?.title"
      :description="props.settings?.description"
    />
    <Heading1 class="text-center mt-10">{{props.settings?.name}}</Heading1>

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

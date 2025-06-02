<script setup lang="ts">
import GeneralLayout from '@/Layouts/GeneralLayout.vue';
import ContactInfo from '@/Components/ContactInfo.vue';
import { ref, computed } from 'vue';
import Heading1 from '@/Components/Typography/Heading1.vue';
import HeroImage from '@/Components/HeroImage.vue';
import SEOHead from '@/Components/SEOHead.vue';

interface BackendCountry {
  name: string;
  phone: string;
  email: string;
  address: string;
  working_hour: string;
  map_url: string;
}

interface Country {
  id: string;
  name: string;
  phone: string;
  email: string;
  address: string;
  workingHours: string;
  mapUrl: string;
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

interface ContactData {
    contact_info: BackendCountry[];
    hero_image: string;
    title: string;
    description: string;
}

const props = defineProps({
    settings: {
        type: Object as () => {
            contact: ContactData;
            seo: SeoSettings;
        },
        required: true
    },
});

const customCountries = ref<Country[]>(
    (props.settings.contact?.contact_info || []).map((country: BackendCountry) => {
        const transformedCountry = {
            id: country.name.toLowerCase(),
            name: country.name,
            phone: country.phone,
            email: country.email,
            address: country.address,
            workingHours: country.working_hour,
            mapUrl: country.map_url || ''
        };
        return transformedCountry;
    })
);

const initialCountry = ref<string>(
    customCountries.value.length > 0 ? customCountries.value[0].id : 'cambodia'
);

const seo = computed(() => props.settings.seo);
</script>

<template>
    <GeneralLayout>
        <SEOHead :seo="seo" :default-title="'Contact Us'" />
        <HeroImage
            :background-image="`/uploads/${props.settings.contact?.hero_image}`"
            :title="props.settings.contact?.title"
            :description="props.settings.contact?.description"
        />
        <div class="mb-8 py-6">
            <Heading1 class="text-center mb-8">{{ $t('contact.contact_us') }}</Heading1>
            <div class="px-3">
                <ContactInfo
                    :countries-data="customCountries"
                    :initial-country="initialCountry"
                />
            </div>
        </div>
    </GeneralLayout>
</template>

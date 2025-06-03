<script setup lang="ts">
import GeneralLayout from '@/Layouts/GeneralLayout.vue';
import ContactInfo from '@/Components/ContactInfo.vue';
import { ref } from 'vue';
import Heading1 from '@/Components/Typography/Heading1.vue';
import HeroImage from '@/Components/HeroImage.vue';

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

interface HeroImageProps {
    hero_image: string;
    title: string;
    description: string;
}

interface ContactData {
    contact_info: BackendCountry[];
    hero_image: string;
    title: string;
    description: string;
}

const props = defineProps({
    settings: {
        type: Object as () => ContactData,
        required: true
    },
});
const customCountries = ref<Country[]>(
    (props.settings.contact_info || []).map((country: BackendCountry) => {
        return {
            id: country.name.toLowerCase(),
            name: country.name,
            phone: country.phone,
            email: country.email,
            address: country.address,
            workingHours: country.working_hour,
            mapUrl: country.map_url || ''
        };
    })
);
const initialCountry = ref<string>(
    customCountries.value.length > 0 ? customCountries.value[0].id : 'cambodia'
);
</script>

<template>
    <GeneralLayout>
        <HeroImage
            :background-image="`/uploads/${props.settings.hero_image}`"
            :title="props.settings.title"
            :description="props.settings.description"
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

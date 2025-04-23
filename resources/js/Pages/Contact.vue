
<script setup lang="ts">
import GeneralLayout from '@/Layouts/GeneralLayout.vue';
import ContactInfo from '@/Components/ContactInfo.vue';
import { ref } from 'vue';
import Heading1 from '@/Components/Typography/Heading1.vue';
import HeroImage from '@/Components/HeroImage.vue';

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
    backgroundImage: string;
    title: string;
    description: string;
}

const heroImage: HeroImageProps = {
    backgroundImage: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSp4BhG5evnQMl83nWgxnedsrlyWCt43NFpwg&s',
    title: 'Get in Touch with Our Expert Team',
    description: 'Whether you\'re looking for certification, training, or consulting—our team is here to guide you. Let\'s work together to build trust and meet your compliance goals.\n'
};


const customCountries = ref<Country[]>([
    {
        id: 'cambodia',
        name: 'Cambodia',
        phone: '+855 23 456 789',
        email: 'info-kh@mycompany.com',
        address: 'No 185D St.K4B Phumi, Trung Morn St, Phnom Penh, Cambodia',
        workingHours: 'Monday To Friday\n08:00AM To 05:00PM',
        mapUrl: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.9417814444796!2d104.86675337481712!3d11.556031388644147!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31095161b7a8e5eb%3A0xe09ca76fdb349265!2sVecert%20International%20Ltd!5e0!3m2!1sen!2skh!4v1744096343289!5m2!1sen!2skh" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade'
    },
    {
        id: 'indonesia',
        name: 'Indonesia',
        phone: '+62 21 789 0123',
        email: 'info-id@mycompany.com',
        address: 'Jl. Sudirman No. 123, Jakarta, Indonesia',
        workingHours: 'Monday To Friday\n09:00AM To 06:00PM',
        mapUrl: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2148471281266!2d106.82656477475068!3d-6.235386293752835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e7d29f09e3%3A0xf765b0eee72f8837!2sTempo%20Scan%20Tower!5e0!3m2!1sen!2skh!4v1744097260475!5m2!1sen!2skh" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade'
    },
    {
        id: 'malaysia',
        name: 'Malaysia',
        phone: '+60 3 2145 6789',
        email: 'info-my@mycompany.com',
        address: '123 Jalan Sultan Ismail, Kuala Lumpur, Malaysia',
        workingHours: 'Monday To Friday\n08:30AM To 05:30PM',
        mapUrl: 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15935.927826998815!2d101.687125!3d3.099454!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4bc84ed920fd%3A0xd265ea971c06eb8b!2sVE%20International%20Certification%20Bhd!5e0!3m2!1sen!2sid!4v1744096876894!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade'
    },
    {
        id: 'singapore',
        name: 'Singapore',
        phone: '+65 6123 4567',
        email: 'info-sg@mycompany.com',
        address: '123 Orchard Road, Singapore',
        workingHours: 'Monday To Friday\n09:00AM To 06:00PM',
        mapUrl: 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15955.297241607057!2d103.849076!3d1.278985!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da191212d4fd53%3A0x848fe52bf895950!2sVe%20International%20Pte%20Ltd!5e0!3m2!1sen!2sid!4v1744096765806!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade'
    }
]);

const initialCountry = ref<string>('indonesia');
</script>
<template>
    <GeneralLayout laravel-version="" php-version="">
        <HeroImage
            :background-image="heroImage.backgroundImage"
            :title="heroImage.title"
            :description="heroImage.description"
        />
        <div class="mb-8 py-6">
            <Heading1 class="text-center mb-8">Contact Us</Heading1>
            <div class="px-3">
                <ContactInfo
                    :countries-data="customCountries"
                    :initial-country="initialCountry"
                />
            </div>
        </div>
    </GeneralLayout>
</template>

<template>
    <div class="max-w-6xl mx-auto bg-white rounded-lg shadow-md overflow-hidden h-auto">
        <div class="flex bg-blue-500 text-white">
            <button v-for="(country, index) in countries" :key="country.id" @click="selectedCountry = country.id" :class="['flex-1 py-4 text-center transition-colors', selectedCountry === country.id ? 'bg-blue-700' : 'hover:bg-blue-600']">
                {{ country.name }}
            </button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 divide-x md:divide-x-0">
            <div class="bg-white">
                <div class=" bg-gray-700 text-center py-4">
                    <Heading3 class="text-xl text-white">Get In Touch With Us Now!</Heading3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 divide-y md:divide-x md:divide-y-0">
                    <div class="p-6 flex flex-col items-center text-center border-b md:border-r md:border-b-0 shadow-lg">
                        <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mb-3">
                            <i class="pi pi-phone text-2xl text-gray-800"></i>
                        </div>
                        <Heading3 class="font-bold text-xl mb-2">Phone Number</Heading3>
                        <paragraph class="text-gray-700">{{ getCurrentCountry.phone }}</paragraph>
                    </div>
                    <div class="p-6 flex flex-col items-center text-center border-b md:border-b-0 shadow-lg">
                        <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mb-3">
                            <i class="pi pi-envelope text-2xl text-gray-800"></i>
                        </div>
                        <Heading3 class="font-bold text-xl mb-2">Email</Heading3>
                        <paragraph class="text-gray-700">{{ getCurrentCountry.email }}</paragraph>
                    </div>
                    <div class="p-6 flex flex-col items-center text-center md:border-r shadow-lg">
                        <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mb-3">
                            <i class="pi pi-map-marker text-2xl text-gray-800"></i>
                        </div>
                        <Heading3 class="font-bold text-xl mb-2">Location</Heading3>
                        <paragraph class="text-gray-700 text-center">{{ getCurrentCountry.address }}</paragraph>
                    </div>
                    <!-- Working Hours -->
                    <div class="p-6 flex flex-col items-center text-center shadow-lg">
                        <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mb-3">
                            <i class="pi pi-clock text-2xl text-gray-800"></i>
                        </div>
                        <Heading3 class="font-bold text-xl mb-2">Working Hours</Heading3>
                        <paragraph class="text-gray-700 text-center">{{ getCurrentCountry.workingHours }}</paragraph>
                    </div>
                </div>
            </div>
            <div class="bg-white">
                <div class=" bg-gray-700 text-center py-4">
                    <Heading3 class="text-xl text-white">Map</Heading3>
                </div>
                <div class="h-auto">
                    <iframe :src="getCurrentCountry.mapUrl" width="600" height="347" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import Heading3 from '@/Components/Typography/Heading3.vue';
import Paragraph from '@/Components/Typography/Paragraph.vue';

const props = defineProps({
    countriesData: {
        type: Array,
      default: () => []
    },
    initialCountry: {
        type: String,
        default: ''
    }
});

const countries = computed(() => props.countriesData);
const selectedCountry = ref(props.initialCountry);

const getCurrentCountry = computed(() => {
    return countries.value.find(country => country.id === selectedCountry.value);
});
</script>

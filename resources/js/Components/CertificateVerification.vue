<template>
    <Toast position="bottom-right" />
    <div class="w-full flex justify-center xl:px-6 lg:px-24 md:px-4">
        <div class="w-full max-w-8xl h-full bg-white shadow-lg rounded-lg grid lg:grid-cols-5 grid-cols-1">
            <div class="flex items-center justify-center lg:col-span-2 col-span-1 p-6 lg:p-8">
                <div class="w-40 h-40 lg:w-80 lg:h-80 flex items-center justify-center">
                    <LazyImage
                        src="https://img.freepik.com/free-vector/grunge-certified-seal-stamp-rubber-look_78370-664.jpg"
                        alt="Certified Badge"
                        class="w-full h-full object-contain"
                    />
                </div>
            </div>
            <div class="flex flex-col justify-center p-6 lg:p-12 lg:col-span-3 col-span-1">
                <Heading2 class="font-bold mb-6 lg:mb-8 text-center text-gray-800">Certificate Verification</Heading2>
                <div class="space-y-6 lg:space-y-8">
                    <div>
                        <label for="country" class="text-gray-600 text-lg lg:text-xl block mb-2">Country Name</label>
                        <SelectLabel v-model="country" css-wrapper="w-full  py-1.5 px-4 lg:py-2 lg:px-2 " />
                    </div>
                    <div>
                        <label for="certificate" class="text-gray-600 text-lg lg:text-xl block mb-2">Enter Certificate Number</label>
                        <input
                            id="certificate"
                            v-model="certificateNumber"
                            type="text"
                            class="w-full py-3 px-4 lg:py-4 lg:px-5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-lg"
                            placeholder="Enter certificate number"
                        />
                    </div>
                    <button
                        @click="verifyNow"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 px-4 lg:py-4 lg:px-6 rounded-lg transition duration-200 text-lg lg:text-xl font-medium mt-4"
                    >
                        Verify Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Heading2 from '@/Components/Typography/Heading2.vue';
import { useToast } from 'primevue/usetoast';
import Toast from 'primevue/toast';
import SelectLabel from '@/Components/SelectLabel.vue';
export default {
    name: 'CertificateVerification',
    components: { SelectLabel, Heading2, Toast },
    data() {
        return {
            country: "",
            certificateNumber: '',
            countries: [
                'United States',
                'Canada',
                'United Kingdom',
                'Australia',
                'Germany',
                'France',
                'Japan',
                'China',
                'India',
                'Brazil'
            ]
        };
    },
    setup() {
        const toast = useToast();
        return { toast };
    },
    methods: {
        verifyNow() {
            if (!this.country) {
                this.toast.add({ severity: 'warn', summary: 'Warning', detail: 'Please select a country', life: 3000 });
                return;
            }
            if (!this.certificateNumber) {
                this.toast.add({ severity: 'warn', summary: 'Warning', detail: 'Please enter a certificate number', life: 3000 });
                return;
            }
            this.$emit('verify', {
                country: this.country,
                certificateNumber: this.certificateNumber
            });
        }
    }
};
</script>


<template>
    <footer class="bg-gray-800 text-white py-4 sm:py-8 lg:py-8" menu-items="">
        <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
            <div class="col-span-1 flex flex-col items-center px-8">
                <Link :href="route('home')">
                    <Logo />
                </Link>
                <Paragraph class="text-sm mb-4 text-center text-white">{{ $t ('footer.copyright') }}</Paragraph>
                <div class="flex space-x-4">
                    <a href="https://instagram.com/vecert" target="_blank" class="text-white hover:text-gray-100">
                        <i class="pi pi-facebook text-xl"></i>
                    </a>
                    <a href="https://instagram.com/vecert" target="_blank" class="text-white hover:text-gray-100">
                        <i class="pi pi-instagram text-xl"></i>
                    </a>
                    <a href="https://twitter.com/vecert" target="_blank" class="text-white hover:text-gray-300">
                        <i class="pi pi-twitter text-xl"></i>
                    </a>
                    <a href="https://youtube.com/vecert" target="_blank" class="text-white hover:text-gray-300">
                        <i class="pi pi-youtube text-xl"></i>
                    </a>
                </div>
            </div>

            <div class="col-span-1">
                <nav class="flex flex-col gap-2">
                    <Link
                        v-for="menu in menuItems"
                        :key="menu.label"
                        :href="menu.link"
                        :class="[
                            'text-center transition-colors duration-300',
                            isActive(menu) ? 'text-blue-400 font-semibold' : 'text-white hover:text-gray-300'
                        ]"
                    >
                        {{ $t(menu.label) }}
                    </Link>
                </nav>
            </div>

            <div class="col-span-1 sm:col-span-3 lg:col-span-3">
                <form  @submit.prevent="submitForm" class="space-y-2 px-5">
                    <div class="flex flex-col sm:flex-row gap-2">
                        <input v-model="form.name" type="text" :placeholder="$t('footer.name')" class="flex-1 px-3 py-2 bg-gray-100 text-black rounded" />
                        <input v-model="form.email" type="email" :placeholder="$t('footer.email')" class="flex-1 px-3 py-2 bg-gray-100 text-black rounded" />
                    </div>
                    <textarea v-model="form.message" :placeholder="$t('footer.message')" class="w-full px-3 py-2 bg-gray-100 text-black rounded h-24"></textarea>
                    <RecaptchaV2
                        sitekey="6Lc07KYqAAAAADiqjV51xn86JSAaMJubYTdCpWCc"
                        @widget-id="handleWidgetId"
                        @error-callback="handleErrorCallback"
                        @expired-callback="handleExpiredCallback"
                        @load-callback="handleLoadCallback"
                    />
                    <Button
                        type="submit"
                        :disabled="isLoading || !form.recaptcha"
                        unstyled
                        :pt="{
                            root: {
                                class: `w-full bg-blue-500 text-white py-2 rounded items-center ${!(isLoading || !form.recaptcha) ? 'hover:bg-blue-600 cursor-pointer' : 'opacity-70 cursor-not-allowed'}`
                            }
                        }"
                    >
                        <i :class="isLoading ? 'pi pi-spinner pi-spin text-white text-xl mr-2' : 'pi pi-send text-white text-xl mr-2'"></i>
                        <span class="text-white">{{ $t('footer.submit') }}</span>
                    </Button>
                </form>
            </div>
        </div>
    </footer>
</template>



<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import Paragraph from '@/Components/Typography/Paragraph.vue';
import { ref } from 'vue';
import { RecaptchaV2 } from "vue3-recaptcha-v2";
import Button from 'primevue/button';
import axios from 'axios';
import Logo from '@/Components/Icons/Logo.vue';

interface MenuItem {
    label: string;
    link: string;
}

const props = defineProps({
    menuItems: {
        type: Array as () => MenuItem[],
        required: true
    }
});

const page = usePage();
const isLoading = ref(false);

function isActive(menu: MenuItem): boolean {
    const currentUrl = page.url.toLowerCase();
    const currentLocale = page.props.currentLocale;
    const strippedUrl = currentUrl.replace(new RegExp(`^/${currentLocale}`), '').replace(/^\/+/, '');
    const menuPath = menu.link.toLowerCase().replace(/^\/+/, '');
    return strippedUrl === menuPath;
}

const form = ref({
    name: '',
    email: '',
    message: '',
    recaptcha: null
});

const widgetId = ref<number | null>(null);

const handleWidgetId = (id: number) => {
    widgetId.value = id;
};

const handleErrorCallback = () => {
    console.error("reCAPTCHA error");
};

const handleExpiredCallback = () => {
    form.value.recaptcha = null;
};

const handleLoadCallback = (response: unknown) => {
    form.value.recaptcha = response;
};

const submitForm = async () => {
    isLoading.value = true;

    try {
        const response = await axios.post('/contact-submit', form.value);
        form.value = { name: '', email: '', message: '', recaptcha: null};
        alert('Form submitted successfully!');
    } catch (error) {
        if (error.response) {
            console.error('Full error response:', error.response);

            if (error.response.status === 422) {
                const errors = error.response.data.errors;
                const message = error.response.data.message || 'Validation failed.';

                if (errors) {
                    alert('Validation failed: ' + JSON.stringify(errors));
                } else {
                    alert('Validation failed: ' + message);
                }

            } else {
                alert('Error submitting form: ' + error.response.statusText);
            }
        } else {
            console.error('Error submitting form:', error);
        }
    } finally {
        isLoading.value = false;
    }
};

</script>

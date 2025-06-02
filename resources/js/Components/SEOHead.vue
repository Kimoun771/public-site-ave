<script setup>
import { Head } from '@inertiajs/vue3';
import { computed, onMounted } from 'vue';

const props = defineProps({
    seo: {
        type: Object,
        default: () => ({})
    },
    defaultTitle: {
        type: String,
        default: ''
    }
});

// Safely access window.appName with a fallback
const appName = computed(() => {
    try {
        return window?.appName || 'Default Title';
    } catch (e) {
        return 'Default Title';
    }
});

// Match field names from SeoSettings.php
const title = computed(() => props.seo?.title || props.defaultTitle || appName.value);

</script>

<template>
    <Head>
        <title>{{ title }}</title>
    </Head>
</template>

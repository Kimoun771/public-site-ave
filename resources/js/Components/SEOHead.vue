<script setup>
import { Head } from '@inertiajs/vue3';
import { computed } from 'vue';

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

const title = computed(() => props.seo?.title);
const description = computed(() => props.seo?.description || '');
const keywords = computed(() => props.seo?.keywords || '');
const ogTitle = computed(() => props.seo?.ogTitle || title.value);
const ogDescription = computed(() => props.seo?.ogDescription || description.value);
const ogImage = computed(() => props.seo?.ogImage || null);
const canonical = computed(() => props.seo?.canonical || (typeof window !== 'undefined' ? window.location.href : ''));
</script>

<template>
    <Head>
        <title>{{ title }}</title>
        <meta name="description" :content="description" v-if="description">
        <meta name="keywords" :content="keywords" v-if="keywords">

        <link rel="canonical" :href="canonical">

        <meta property="og:type" content="website">
        <meta property="og:url" :content="canonical">
        <meta property="og:title" :content="ogTitle">
        <meta property="og:description" :content="ogDescription" v-if="ogDescription">
        <meta property="og:image" :content="ogImage" v-if="ogImage">
        <meta property="og:site_name" :content="appName">

        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" :content="canonical">
        <meta property="twitter:title" :content="ogTitle">
        <meta property="twitter:description" :content="ogDescription" v-if="ogDescription">
        <meta property="twitter:image" :content="ogImage" v-if="ogImage">
    </Head>
</template>

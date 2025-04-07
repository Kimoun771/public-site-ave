<script setup>
import Header from '@/Components/Layout/Header.vue';
import Footer from '@/Components/Layout/Footer.vue';
import Paragraph from '@/Components/Typography/Paragraph.vue';
import { ref } from 'vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

const menuItems = ref([
    { label: 'Home', link: "/"},
    { label: 'Service', link: "/service" },
    { label: 'Inspection', link: "/inspection" },
    { label: 'Training', link: "/training" },
    { label: 'About', link: "/about" },
    {label: 'Contact', link: "/contact"}
]);
</script>

<template>
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50" :dir="$page.props.dir">
        <div class="relative flex min-h-screen flex-col selection:bg-[#FF2D20] selection:text-white">
            <Header :menuItems="menuItems" :canLogin="canLogin" :canRegister="canRegister" />
            <div class="relative w-full">
                <main>
                    <slot></slot>
                </main>
                <Footer :laravelVersion="laravelVersion" :phpVersion="phpVersion" :menuItems="menuItems" />
            </div>
        </div>
    </div>
</template>

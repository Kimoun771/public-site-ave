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
});

const menuItems = ref([
    { label: 'menu.home', link: "/"},
    { label: 'menu.service', link: "/service" },
    { label: 'menu.inspection', link: "/inspection" },
    { label: 'menu.training', link: "/training" },
    { label: 'menu.about', link: "/about" },
    {label: 'menu.contact', link: "/contact"}
]);
</script>

<template>
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50" :dir="$page.props.dir">
        <div class="relative flex min-h-screen flex-col selection:bg-[#FF2D20] selection:text-white">
            <Header :menuItems="menuItems" :canLogin="canLogin" :canRegister="canRegister" />
            <div class="relative w-full">
                <main class="md:mt-24">
                    <slot></slot>
                </main>
                <Footer :menuItems="menuItems" />
            </div>
        </div>
    </div>
</template>

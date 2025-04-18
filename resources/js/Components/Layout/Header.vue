<script setup>
import { ref, computed } from "vue"
import Container from "@/Components/Container.vue"
import Logo from "@/Components/Icons/Logo.vue"
import { Link } from '@inertiajs/vue3';
// import Dropdown from '@/Components/Forms/Dropdown.vue';
import LanguageSwitcher from "@/Components/LanguageSwitcher.vue";
import MobileNav from "@/Components/Layout/MobileNav.vue"

const props = defineProps({
    menuItems: {
        type: Array,
        required: true,
        default: () => []
    },
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
})

const showMobileMenu = ref(false)
const scrollY = ref(0)

function redirect(link) {
    showMobileMenu.value = false
    window.location = link
}

const headerClass = computed(() => {
    return scrollY.value > 100 ? 'bg-white dark:bg-gray-800 bg-opacity-75 dark:bg-opacity-75 sticky top-0 z-10' : ''
})
</script>

<template>
    <header :class="headerClass" class="py-4 w-full md:py-4 transition-colors duration-300" menu-items="">
        <Container class="relative flex items-center justify-between gap-4 text-slate-600 dark:text-slate-300 text-sm">
            <div class="flex items-center gap-8">
                <Link :href="route('home')">
                    <Logo class="h-10" />
                </Link>
                <nav class="items-center gap-3 hidden md:flex">
                    <Link
                        v-for="menu in menuItems"
                        :key="menu.label"
                        :href="menu.link"
                        class="rounded-lg py-1.5 px-3 transition-colors duration-300 hover:bg-blue-800  font-bold text-black-900 hover:bg-opacity-30">
                        {{ $t(menu.label) }}
                    </Link>
                </nav>
            </div>
            <div class="flex items-center gap-2">
                <LanguageSwitcher :locales="$page.props.locales" :currentLocale="$page.props.currentLocale" />
                <MobileNav :menuItems="menuItems" :canLogin="canLogin" class="md:flex" />
            </div>
        </Container>
    </header>
</template>

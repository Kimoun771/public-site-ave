<script setup>
import { ref, computed } from "vue"
import Container from "@/Components/Container.vue"
import Logo from "@/Components/Icons/Logo.vue"
import { Link, usePage } from '@inertiajs/vue3';
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
const page = usePage()
const showMobileMenu = ref(false)
const scrollY = ref(0)

function redirect(link) {
    showMobileMenu.value = false
    window.location = link
}

const headerClass = computed(() => {
    return scrollY.value > 100 ? 'bg-white dark:bg-gray-800 bg-opacity-75 dark:bg-opacity-75 sticky top-0 z-10' : ''
})

const isActive = (menu) => {
  const currentUrl = page.url.toLowerCase();
  const currentLocale = page.props.currentLocale;
  const strippedUrl = currentUrl.replace(new RegExp(`^/${currentLocale}`), '').replace(/^\/+/, '');
  const menuPath = menu.link.toLowerCase().replace(/^\/+/, '');
  return strippedUrl === menuPath;
};

</script>

<template>
    <header :class="headerClass" class="fixed top-0 left-0 w-full bg-white z-50 transition-colors duration-300 py-4 md:py-4 shadow-md" menu-items="">
        <Container class="relative flex items-center justify-between gap-4 text-slate-600 dark:text-slate-300 text-sm">
            <div class="flex flex-row gap-4 items-center">
                <Link :href="route('home')">
                    <Logo class="h-16" />
                </Link>
                <span class="hidden lg:flex text-2xl font-bold text-black">AVE</span>
            </div>
            <div class="flex items-center">
                <nav class="items-center gap-3 hidden md:flex">
                    <Link
                        v-for="menu in menuItems"
                        :key="menu.label"
                        :href="menu.link"
                        :class="[
                            'rounded-lg py-1.5 px-3 transition-colors duration-300 font-bold lg:text-lg text-md',
                            isActive(menu) ? 'text-blue-600 dark:text-blue-400' : 'text-black-900 hover:text-blue-800 hover:text-opacity-100'
                        ]"
                    >
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

<template>
    <div class="md:hidden">
        <button class="p-2 md:hidden relative z-10" @click.prevent="toggleMobileMenu">
            <component :is="showMobileMenu ? IconX : IconBars" class="w-5"
                       :class="{ 'text-red-500 dark:text-red-300': showMobileMenu }" />
        </button>

        <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition-opacity duration-500">
            <div v-show="showMobileMenu" @click.prevent="toggleMobileMenu"
                 class="fixed inset-0 bg-slate-200/50 dark:bg-slate-800/50 backdrop-blur-sm" />
        </Transition>

        <Transition enter-from-class="-translate-x-full opacity-0" leave-to-class="-translate-x-full opacity-0"
                    class="transition-all duration-500">
            <div @click.stop v-show="showMobileMenu"
                 class="p-4 absolute inset-x-4 top-14 bg-white dark:bg-slate-900 rounded-xl shadow-lg">
                <nav class="flex flex-col">
                    <Link
                        v-for="menu in menuItems"
                        :key="menu.label"
                        :href="menu.link"
                        @click="showMobileMenu = false"
                        :class="[
                            'p-4 rounded-lg text-left transition-colors duration-300',
                            isActive(menu)
                                ? 'text-blue-600 dark:text-blue-400 bg-slate-100 dark:bg-slate-800'
                                : 'hover:bg-slate-100 dark:hover:bg-slate-800 text-black'
                        ]"
                    >
                        {{ menu.label }}
                    </Link>
                </nav>
            </div>
        </Transition>
    </div>
</template>

<script setup>
import { ref } from "vue"
import { usePage, Link } from '@inertiajs/vue3'
import IconBars from "@/Components/Icons/IconBars.vue"
import IconX from "@/Components/Icons/IconX.vue"

const props = defineProps({
    menuItems: {
        type: Array,
        required: true,
    },
    canLogin: {
        type: Boolean,
    },
})

const showMobileMenu = ref(false)
const page = usePage()

function toggleMobileMenu() {
    showMobileMenu.value = !showMobileMenu.value
}

function isActive(menu) {
    const currentUrl = page.url.toLowerCase()
    const currentLocale = page.props.currentLocale
    const strippedUrl = currentUrl.replace(new RegExp(`^/${currentLocale}`), '').replace(/^\/+/, '')
    const menuPath = menu.link.toLowerCase().replace(/^\/+/, '')
    return strippedUrl === menuPath
}
</script>

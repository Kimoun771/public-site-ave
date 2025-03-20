<script setup="ts">
import { Link } from '@inertiajs/vue3'
import { ref, onMounted, onUnmounted } from 'vue'

const props = defineProps({
    cssImg: { type: String }
})

const MOBILE_BREAKPOINT = 768
const SCROLL_THRESHOLD = 50
const BASE_CLASSES = 'max-w-full rounded-lg lg:w-44 md:w-36 object-cover transition-all duration-300'
const NORMAL_SIZE = `${BASE_CLASSES} w-28`
const SCROLLED_SIZE = `${BASE_CLASSES} w-20`

const isScrolled = ref(false)
const logoClass = ref(NORMAL_SIZE)

const updateLogoSize = () => {
    const isMobile = window.innerWidth < MOBILE_BREAKPOINT
    const hasScrolled = window.scrollY > SCROLL_THRESHOLD

    if (isMobile) {
        isScrolled.value = hasScrolled
        logoClass.value = hasScrolled ? SCROLLED_SIZE : NORMAL_SIZE
    } else {
        logoClass.value = NORMAL_SIZE
    }
}

onMounted(() => {
    window.addEventListener('scroll', updateLogoSize)
    window.addEventListener('resize', updateLogoSize)
    updateLogoSize()
})

onUnmounted(() => {
    window.removeEventListener('scroll', updateLogoSize)
    window.removeEventListener('resize', updateLogoSize)
})
</script>
<template>
    <Link href="/" class="hover:underline">
        <img
            :class="[cssImg, logoClass]"
            src="/images/VECERT-Logo.png"
            alt="VECERT logo"
        />
    </Link>
</template>

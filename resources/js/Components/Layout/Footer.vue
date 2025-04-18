<template>
    <footer class="bg-gray-800 text-white py-4 sm:py-8 lg:py-8" menu-items="">
        <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
            <div class="col-span-1 flex flex-col items-center px-8">
                <Link :href="route('home')">
                    <LazyImage src="https://www.vecert.com/image/vecert-logo.png" alt="VE CERT Logo" class="h-16 mb-4"/>
                </Link>
                <Paragraph class="text-sm mb-4 text-center text-white">Copyright © 2025 AVE. All rights reserved.</Paragraph>
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
                        class="text-white text-center hover:text-gray-300 transition-colors duration-300"
                    >
                        {{ menu.label }}
                    </Link>
                </nav>
            </div>

            <div class="col-span-1 sm:col-span-3 lg:col-span-3">
                <form class="space-y-2 px-5">
                    <div class="flex flex-col sm:flex-row gap-2">
                        <input type="text" placeholder="Name" class="flex-1 px-3 py-2 bg-gray-100 text-black rounded" />
                        <input type="email" placeholder="Email" class="flex-1 px-3 py-2 bg-gray-100 text-black rounded" />
                    </div>
                    <textarea placeholder="Message" class="w-full px-3 py-2 bg-gray-100 text-black rounded h-24"></textarea>
                    <button class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Submit</button>
                </form>
            </div>
        </div>
    </footer>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import Paragraph from '@/Components/Typography/Paragraph.vue';

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
</script>

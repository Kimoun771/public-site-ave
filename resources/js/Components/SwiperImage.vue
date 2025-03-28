<template>
        <swiper
            :slides-per-view="2"
            :space-between="30"
            :loop="true"
            :autoplay="{ delay: 3000, disableOnInteraction: false }"
            :breakpoints="{
                640: { slidesPerView: 5 },
                768: { slidesPerView: 5 },
                1024: { slidesPerView: 5 }
            }"
            class="mySwiper"
        >
            <swiper-slide v-for="(client, index) in clients" :key="index">
                <div class="w-24 md:w-28 lg:w-32 flex items-center justify-center">
                    <LazyImage
                        :src="client.logo"
                        :alt="client.name || 'Client logo'"
                        class="h-12 object-contain transition-all duration-300 hover:scale-110"
                    />
                </div>
            </swiper-slide>
        </swiper>
</template>

<script setup lang="ts">
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/css";
import "swiper/css/autoplay";

    const props = defineProps({
        clients:{
            type : Array,
            default : () =>([])
        }
    })
</script>

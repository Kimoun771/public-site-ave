<template>
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <Heading1 class="text-gray-900">
                {{ title }}
            </Heading1>
            <Paragraph class="text-gray-600 mt-2">
                {{ subtitle }}
            </Paragraph>
        </div>
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
    </div>
</template>

<script>
import { defineComponent } from "vue";
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/css";
import "swiper/css/autoplay";

import Heading1 from "@/Components/Typography/Heading1.vue";
import Paragraph from "@/Components/Typography/Paragraph.vue";

export default defineComponent({
    components: {
        Swiper,
        SwiperSlide,
        Heading1,
        Paragraph
    },
    props: {
        title: {
            type: String,
            default: "Our Clients",
        },
        subtitle: {
            type: String,
            default: "We have been working with some Fortune 500+ clients",
        },
        clients: {
            type: Array,
            required: true,
        },
    },
});
</script>

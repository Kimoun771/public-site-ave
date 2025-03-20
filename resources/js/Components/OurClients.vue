<template>
    <div class="container mx-auto px-4">
        <!-- Section Heading -->
        <div class="text-center mb-12">
            <h1 class="text-2xl font-bold">{{ title }}</h1>
            <p>{{ subtitle }}</p>
        </div>

        <!-- Swiper Carousel -->
        <swiper
            :slides-per-view="2"
            :space-between="30"
            :loop="true"
            :autoplay="{ delay: 10, disableOnInteraction: false }"
            :breakpoints="{
        640: { slidesPerView: 5 },
        768: { slidesPerView: 5 },
        1024: { slidesPerView: 5 }
      }"
            class="mySwiper"
        >
            <swiper-slide v-for="(client, index) in clients" :key="index">
                <div class="w-24 md:w-28 lg:w-32 flex items-center justify-center">
                    <img
                        :src="client.logo"
                        :alt="client.name"
                        class="h-12 object-contain transition-all duration-300"
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

export default defineComponent({
    components: {
        Swiper,
        SwiperSlide,
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

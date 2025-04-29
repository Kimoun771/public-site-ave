<template>
    <div class="flip-card-container" :class="{ 'is-flipped': isFlipped }" @mouseenter="isFlipped = true" @mouseleave="isFlipped = false">
        <div class="flip-card">
            <div class="flip-card-front relative overflow-hidden rounded-lg shadow-lg h-full w-full">
                <div class="absolute inset-0">
                    <LazyImage :src="image" :alt="imageAlt || title" class="object-cover w-full h-full" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/70 to-transparent"></div>
                </div>
                <div class="relative h-full flex flex-col justify-end p-4 sm:p-6 text-white">
                    <Heading2 class="text-center text-xl md:text-2xl font-bold mb-2 text-white">
                        {{ title }}
                    </Heading2>
                    <Paragraph class="text-center text-sm md:text-base mx-auto text-white front-preview">
                        {{ description }}
                    </Paragraph>
                </div>
            </div>
            <div class="flip-card-back rounded-lg shadow-lg h-full w-full bg-blue-600 p-4 sm:p-6">
                <div class="flex flex-col h-full justify-center">
                    <Heading2 class="text-center text-xl md:text-2xl font-bold mb-4 text-white">
                        {{ title }}
                    </Heading2>
                    <div class="overflow-y-auto max-h-full">
                        <Paragraph class="text-center text-sm md:text-base text-white">
                            {{ fullDescription || description }}
                        </Paragraph>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Heading2 from '@/Components/Typography/Heading2.vue';
import Paragraph from '@/Components/Typography/Paragraph.vue';

export default {
    components: { Paragraph, Heading2 },
    props: {
        title: {
            type: String,
            required: true
        },
        description: {
            type: String,
            required: true
        },
        fullDescription: {
            type: String,
            default: ''
        },
        image: {
            type: String,
            required: true
        },
        imageAlt: {
            type: String,
            default: ''
        }
    },
    data() {
        return {
            isFlipped: false
        };
    }
};
</script>

<style scoped>
.flip-card-container {
    perspective: 1000px;
    height: 15.625rem;
    width: 100%;
}
.flip-card {
    position: relative;
    width: 100%;
    height: 100%;
    text-align: center;
    transition: transform 0.6s;
    transform-style: preserve-3d;
}
.flip-card-container.is-flipped .flip-card {
    transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
}

.flip-card-back {
    transform: rotateY(180deg);
    display: flex;
    flex-direction: column;
}

.front-preview {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    max-height: 3rem;
}
.overflow-y-auto {
    scrollbar-width: thin;
    scrollbar-color: rgba(255,255,255,0.5) transparent;
}
.overflow-y-auto::-webkit-scrollbar {
    width: 6px;
}
.overflow-y-auto::-webkit-scrollbar-thumb {
    background-color: rgba(255,255,255,0.5);
    border-radius: 3px;
}
</style>

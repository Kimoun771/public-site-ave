<template>
    <section :class="['py-16',]">
        <div class="container mx-auto px-4">
            <!-- Section Heading -->
            <h2 :class="['text-3xl font-bold text-center mb-12',]">{{ title }}</h2>

            <!-- Testimonials Grid -->
            <div :class="[
        'grid gap-8 max-w-6xl mx-auto',
        gridCols || 'grid-cols-1 md:grid-cols-2'
      ]">
                <div v-for="(testimonial, index) in testimonials" :key="index" class="flex items-start space-x-4">
                    <!-- Avatar -->
                    <div class="flex-shrink-0" v-if="showAvatars">
                        <img
                            :src="testimonial.avatar"
                            :alt="`${testimonial.name} avatar`"
                            :class="[
                'object-cover border-2 border-gray-200',
                avatarSize || 'w-16 h-16',
                avatarShape || 'rounded-full'
              ]"
                        >
                    </div>

                    <!-- Testimonial Content -->
                    <div>
                        <p>
                            <span v-if="showQuotationMarks">"</span>
                            {{ testimonial.quote }}
                            <span v-if="showQuotationMarks">"</span>
                        </p>
                        <h4>{{ testimonial.name }}</h4>
                        <p>{{ testimonial.title }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            default: 'Customer Testimonials'
        },
        testimonials: {
            type: Array,
            required: true
        },
        showAvatars: {
            type: Boolean,
            default: true
        },
        showQuotationMarks: {
            type: Boolean,
            default: true
        },
        avatarSize: {
            type: String,
            default: 'w-16 h-16'
        },
        avatarShape: {
            type: String,
            default: 'rounded-full'
        },
        gridCols: {
            type: String,
            default: ''
        }
    }
}
</script>

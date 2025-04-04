<script setup lang="ts">
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    isLoading: {
        type: Boolean,
        default: false
    },
    variant: {
        type: String,
        default: 'primary'
    },
    href: {
        type: String,
        default: null
    },
    type: {
        type: String,
        default: 'button'
    },
    fullWidth: {
        type: Boolean,
        default: false
    },
    class: {
        type: [String, Array, Object],
        default: ''
    }
});

const buttonClasses = computed(() => {
    let base =
        'inline-flex items-center justify-center rounded-md border px-4 py-2 text-xs font-semibold uppercase tracking-widest transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2';
    let variantClass = '';

    switch (props.variant) {
        case 'danger':
            variantClass =
                'border-transparent bg-red-600 text-white hover:bg-red-500 focus:ring-red-500 active:bg-red-700 dark:focus:ring-offset-blue-800';
            break;
        case 'outline':
            variantClass =
                'border-gray-800 bg-transparent text-gray-800 hover:bg-blue-100 focus:ring-indigo-500 dark:border-gray-200 dark:text-blue-200 dark:hover:bg-blue-700 dark:focus:ring-offset-gray-800 dark:active:bg-blue-600';
            break;
        default:
            variantClass =
                'border-transparent bg-blue-800 text-white hover:bg-blue-700 focus:bg-gray-700 focus:ring-indigo-500 active:bg-gray-900 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white dark:focus:bg-white dark:active:bg-gray-300 dark:focus:ring-offset-gray-800';
    }

    return [
        base,
        variantClass,
        props.fullWidth ? 'w-full' : '',
        props.isLoading ? 'opacity-25 cursor-not-allowed' : '',
        props.class
    ];
});
</script>

<template>
    <component
        :is="href ? Link : 'button'"
        :href="href"
        :type="href ? undefined : type"
        :disabled="isLoading && !href"
        :class="buttonClasses"
    >
        <slot v-if="!isLoading" />
        <span v-else>Loading...</span>
    </component>
</template>

<template>
    <div :class="displayClass">
        <div v-html="content" class="ck-content" />

        <button
            v-if="truncate"
            @click.stop="toggleTruncate"
            class="read-more-btn text-gray-600 text-sm mt-2 hover:underline focus:outline-none"
        >
            {{ isTruncated ? "Read more" : "Show less" }}
        </button>
    </div>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue';
const props = defineProps({
    content: {
        type: String,
        default: '',
    },
    truncate: {
        type: Boolean,
        default: false,
    },
});

const isTruncated = ref(props.truncate);

const displayClass = computed(() => ({
    'editor-display': true,
    'truncated': isTruncated.value,
}));

function toggleTruncate() {
    isTruncated.value = !isTruncated.value;
}
</script>

<style scoped>
.editor-display.truncated .ck-content {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    max-height: 2.5em;
}

.read-more-btn {
    display: inline-block;
    cursor: pointer;
}

.editor-display .ck-content {
    background: transparent !important;
    border: none !important;
    padding: 0 !important;
    box-shadow: none !important;
}

.editor-display .ck-content ul {
    list-style-type: disc !important;
    padding-left: 40px;
}

.editor-display .ck-content ol {
    list-style-type: decimal !important;
    padding-left: 40px;
}

.editor-display .ck-content li {
    margin-bottom: 0.5em;
}

.editor-display .ck-content ul ul {
    list-style-type: circle !important;
}
.editor-display .ck-content ul ul ul {
    list-style-type: square !important;
}
.editor-display .ck-content ol ol {
    list-style-type: lower-alpha !important;
}
.editor-display .ck-content ol ol ol {
    list-style-type: lower-roman !important;
}
</style>

<script setup>
  import Dialog from 'primevue/dialog'
  import { defineModel, defineProps } from 'vue'


  const visible = defineModel()
  const props = defineProps({
    title: { type: String, default: '' },
    des: { type: String, default: '' },
    image: { type: String, default: '' }
  })

  const closeModal = () => {
    visible.value = false
  }

</script>

<template>
  <Dialog
    v-model:visible="visible"
    :header="title"
    :style="{ width: '50rem'}"
    pt:mask:class="backdrop-blur-sm"
    :dismissableMask="true"
    @hide="closeModal"
    escape
    maximizable
    modal
  >
    <div class="pb-5 space-y-5">
      <LazyImage
        v-if="image"
        :src="image"
        :alt="title"
          class="w-full h-auto rounded-lg object-cover"
      />
      <div class="prose prose-gray max-w-none">
        <div v-html="des"></div>
      </div>
    </div>
  </Dialog>
</template>

<style>
  ol {
    list-style:  disc;
    margin-left: 3%;
  }
</style>
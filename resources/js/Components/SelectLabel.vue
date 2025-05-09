<template>
    <div class="w-full flex justify-center">
        <Select v-model="selectedCountry" :options="countries" filter optionLabel="name" placeholder="Select a Country" :class="cssWrapper">
            <template #value="slotProps">
                <div v-if="slotProps.value" class="flex items-center">
                    <img v-if="slotProps.value.code"  :alt="slotProps.value.name" :src="`https://flagcdn.com/w40/${slotProps.value.code.toLowerCase()}.png`" class="mr-2" style="width: 18px" />
                    <div>{{ slotProps.value.name }}</div>
                </div>
                <span v-else>
                    {{ slotProps.placeholder }}
                </span>
            </template>
            <template #option="slotProps">
                <div class="flex items-center">
                    <img v-if="slotProps.option.code"  :alt="slotProps.option.name" :src="`https://flagcdn.com/w40/${slotProps.option.code.toLowerCase()}.png`" class="mr-2" style="width: 18px" />
                    <div>{{ slotProps.option.name }}</div>
                </div>
            </template>
        </Select>
    </div>
</template>

<script>
import { defineComponent } from 'vue';
import Select from 'primevue/select';

export default defineComponent({
    name: 'SelectLabel',
    components: { Select },
    props: {
        countries: {
            type: Array,
            default: () => []
        },
        modelValue: {
            type: Object,
            default: null
        },
        cssWrapper: {
            type: String,
            default: "flex w-full"
        }
    },
    emits: ['update:modelValue'],
    computed: {
        selectedCountry: {
            get() {
                return this.modelValue;
            },
            set(value) {
                this.$emit('update:modelValue', value);
            },
        },
    }
});
</script>

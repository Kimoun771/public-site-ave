<script>
import { defineComponent } from 'vue'
import { Icon } from '@iconify/vue'
import EditorDisplay from './EditorDisplay.vue'
import Heading3 from '@/Components/Typography/Heading3.vue';

export default defineComponent({
    components: {
        Heading3,
        Icon,
        EditorDisplay
    },
    props: {
        showFormAlert: Boolean,
        responseMessage: { type: String, default: '' },
        responseStatus: { type: String, default: '' },
        closeModal: {
            type: Function,
            require: false
        },
        responseData: Object
    },
    methods: {
        closeModalOnClick() {
            this.closeModal()
        },
        getExpiryStatus(expiryDate) {
            const expiry = new Date(expiryDate);
            const today = new Date();
            expiry.setHours(0, 0, 0, 0);
            today.setHours(0, 0, 0, 0);
            return expiry > today ? expiryDate : 'Suspended';
        }
    }
})
</script>
<template>
    <div
        class="relative z-50"
        aria-labelledby="modal-title"
        role="dialog"
        aria-modal="true"
        v-if="showFormAlert"
        data-cy="alert-modal"
    >
        <div
            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
        ></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div
                class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
            >
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-xl"
                >
                    <div class="bg-white md:px-4 md:pb-4 md:pt-5 p-4 pb-4">
                        <button
                            @click="closeModalOnClick"
                            type="button"
                            class="float-right inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto relative bottom-4 left-4"
                            data-modal-hide="static-modal"
                            data-cy="alert-close-button"
                        >
                            <Icon icon="iconamoon:close-light" class="w-10 h-10" />
                        </button>
                        <div class="flex flex-row justify-center">
                            <div
                                class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full sm:mx-0 sm:h-10 sm:w-10"
                                data-cy="alert-icon"
                            >
                                <Icon
                                    icon="fluent-emoji-flat:warning"
                                    class="md:w-12 md:h-12 w-8 h-8"
                                />
                            </div>
                            <div class="mt-3 text-center sm:ml-6 sm:mt-2 sm:text-left">
                                <h3
                                    class="text-base font-semibold leading-6 text-gray-900"
                                    id="modal-title"
                                    data-cy="alert-message"
                                >
                                    {{ responseMessage }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div
        class="relative z-50"
        aria-labelledby="modal-title"
        role="dialog"
        aria-modal="true"
        v-if="!showFormAlert"
        data-cy="certificate-modal"
    >
        <div
            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
        ></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div
                class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
            >
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white shadow-xl transition-all sm:my-8 sm:w-fit sm:max-w-3xl"
                >
                    <div>
                        <div
                            class="relative bg-[url('/image/Vecert/certificate_verification.png')] h-52 bg-cover bg-no-repeat"
                        >
                            <div
                                class="bg-[rgba(54,84,99,.7)] h-full flex items-center justify-center"
                            >
                                <Heading3
                                    class="text-2xl font-semibold leading-6 text-white"
                                    id="modal-title"
                                    data-cy="certificate-title"
                                >
                                    Certificate Verification
                                </Heading3>
                                <button
                                    @click="closeModalOnClick"
                                    type="button"
                                    class="absolute top-2 right-2 inline-flex items-center justify-center w-8 h-8 text-gray-200 bg-transparent rounded-lg hover:text-gray-900"
                                    data-modal-hide="static-modal"
                                    data-cy="certificate-close-button"
                                >
                                    <Icon icon="iconamoon:close-light" class="w-10 h-10" />
                                </button>
                            </div>
                        </div>
                        <div class="px-4 pb-4 sm:px-8 sm:py-5">
                            <table
                                class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-400"
                                data-cy="certificate-table"
                            >
                                <tbody v-if="this.responseData">
                                <tr class="">
                                    <th
                                        scope="row"
                                        class="py-3 font-semibold text-gray-800 whitespace-nowrap dark:text-white flex justify-between items-center"
                                    >
                                        <span>Company</span>
                                        <span class="pl-3">:</span>
                                    </th>
                                    <td class="pl-6 py-3" data-cy="certificate-company">
                                        {{ responseData.company }}
                                    </td>
                                </tr>
                                <tr class="">
                                    <th
                                        scope="row"
                                        class="py-3 font-semibold text-gray-800 whitespace-nowrap dark:text-white flex justify-between items-center"
                                    >
                                        <span>Country</span>
                                        <span class="pl-3">:</span>
                                    </th>
                                    <td class="pl-6 py-3" data-cy="certificate-country">
                                        {{ responseData.country }}
                                    </td>
                                </tr>
                                <tr class="">
                                    <th
                                        scope="row"
                                        class="py-3 font-semibold text-gray-800 whitespace-nowrap dark:text-white flex justify-between items-center"
                                    >
                                        <span>Scope</span>
                                        <span class="pl-3">:</span>
                                    </th>
                                    <td class="pl-6 py-3" data-cy="certificate-scope">
                                        <EditorDisplay :content="responseData.scope" />
                                    </td>
                                </tr>
                                <tr class="">
                                    <th
                                        scope="row"
                                        class="py-3 font-semibold text-gray-800 whitespace-nowrap dark:text-white flex justify-between items-center"
                                    >
                                        <span>Scheme</span>
                                        <span class="pl-3">:</span>
                                    </th>
                                    <td class="pl-6 py-3" data-cy="certificate-scheme">
                                        {{ responseData.scheme }}
                                    </td>
                                </tr>

                                <tr class="">
                                    <th
                                        scope="row"
                                        class="py-3 font-semibold text-gray-800 whitespace-nowrap dark:text-white flex justify-between items-center"
                                    >
                                        <span>Address</span>
                                        <span class="pl-3">:</span>
                                    </th>
                                    <td class="pl-6 py-3" data-cy="certificate-address">
                                        {{ responseData.address }}
                                    </td>
                                </tr>
                                <tr v-if="responseData.address_two">
                                    <th
                                        scope="row"
                                        class="py-3 font-semibold text-gray-800 whitespace-nowrap dark:text-white flex justify-between items-center"
                                    >
                                        <span>Address 2</span>
                                        <span class="pl-3">:</span>
                                    </th>
                                    <td class="pl-6 py-3" data-cy="certificate-address-two">
                                        {{ responseData.address_two }}
                                    </td>
                                </tr>
                                <tr v-if="responseData.address_three">
                                    <th
                                        scope="row"
                                        class="py-3 font-semibold text-gray-800 whitespace-nowrap dark:text-white flex justify-between items-center"
                                    >
                                        <span>Address 3</span>
                                        <span class="pl-3">:</span>
                                    </th>
                                    <td class="pl-6 py-3" data-cy="certificate-address-three">
                                        {{ responseData.address_three }}
                                    </td>
                                </tr>
                                <tr class="">
                                    <th
                                        scope="row"
                                        class="py-3 font-semibold text-gray-800 whitespace-nowrap dark:text-white flex justify-between items-center"
                                    >
                                        <span>Valid until</span>
                                        <span class="pl-3">:</span>
                                    </th>
                                    <td
                                        v-if="responseData.expire_date"
                                        class="pl-6 py-3"
                                        data-cy="certificate-expire-date"
                                    >
                                        {{ getExpiryStatus(responseData.expire_date) }}
                                    </td>
                                    <td
                                        v-if="responseData.registration_date"
                                        class="pl-6 py-3"
                                        data-cy="certificate-registration-date"
                                    >
                                        {{ responseData.registration_date }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="flex justify-end mb-3">
                                <button
                                    @click="closeModalOnClick"
                                    type="button"
                                    class="bg-primary py-1 px-2 rounded-md text-white"
                                    data-cy="certificate-done-button"
                                >
                                    Done
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

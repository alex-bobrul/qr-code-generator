<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="flex flex-col wrap_form">
                        <form  @submit.prevent="submit" class="flex qr-form pb-6">

                            <div class="wrap_inputs flex">
                                <div class="mr-2 ml-2 mt-4">
                                    <BreezeLabel for="content" value="Content" />
                                    <BreezeInput id="content" type="text" class="mt-1 block w-full" v-model="form.content" required placeholder="Content" />
                                </div>

                                <div class="mr-2 ml-2 mt-4">
                                    <BreezeLabel for="size" value="Size" />
                                    <BreezeInput id="size" type="number" class="mt-1 block w-full" v-model="form.size" required placeholder="500" />
                                </div>

                                <div class="mr-2 ml-2 mt-4">
                                    <BreezeLabel for="background_color" value="Background color" />
                                    <color-input v-model="form.background_color" />
                                </div>

                                <div class="mr-2 ml-2 mt-4">
                                    <BreezeLabel for="fill_color" value="Fill color" />
                                    <color-input v-model="form.fill_color" />
                                </div>

                            </div>

                            <div class="wrap_btn">
                                <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    send
                                </BreezeButton>
                            </div>

                        </form>
                        <div class="qr-section">
                            <div class="visible-print text-center">
                                <div class="qr-block"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import BreezeInput from '@/Components/Input.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeButton from '@/Components/Button.vue'
import axios from 'axios'
import ColorInput from 'vue-color-input'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'

import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeInput,
        BreezeLabel,
        BreezeButton,
        ColorInput,
        Head,
    },

    data() {
        return {
            form: {
                content: '',
                size: '',
                background_color: "rgba(255, 255, 255, 1)",
                fill_color: "rgba(255, 255, 255, 1)"
            }
        }
    },

    methods: {
        submit() {
            const qrPlace = document.querySelector('.qr-block');

            if(this.form.fill_color.indexOf('a') == -1){
                this.form.fill_color = this.form.fill_color.replace(')', ', 1)').replace('rgb', 'rgba');
            }

            if(this.form.background_color.indexOf('a') == -1){
                this.form.background_color = this.form.background_color.replace(')', ', 1)').replace('rgb', 'rgba');
            }

            axios.post("/qr-codes", this.form ).then((response) => {
                qrPlace.innerHTML = response.data
            });
        }
    }
}
</script>

<template>
    <AuthenticatedLayout>
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Edit Order
                </h3>
            </div>
            <form class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2 sm:col-span-1">
                        <label for="nameProduct"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name Product</label>
                        <select id="category" v-model="form.or_pd_id" value="Select Product"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option v-for="product in products" :value="product.pd_id">
                                {{ product.pd_name }}
                            </option>
                        </select>
                        <p v-if="errors.nameProduct" class="text-red-600 text-xs">{{ errors.nameProduct[0] }}</p>
                    </div>
                    <div class="col-span-2">
                        <label for="total"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Product</label>
                        <input type="number" v-model="form.or_amount"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Total Product">
                        <p v-if="errors.total" class="text-red-600 text-xs">{{ errors.total[0] }}</p>
                    </div>
                </div>
                <button @click="_$event => submitForm()"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Update Order
                </button>
            </form>
        </div>
    </AuthenticatedLayout>


</template>
<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import axios from 'axios';

export default {
    name: 'UpdateOrders',
    components: {
        AuthenticatedLayout,
    },
    props: ['order'],
    data() {
        return {
            products: [],
            form: this.order,
            errors: {}
        }
    },
    mounted() {
        this.getProduct()
    },
    methods: {
        getProduct() {
            axios.get('http://127.0.0.1:8000/api/products')
                .then(response => {
                    this.products = response.data.products
                })
                .catch(error => {
                    console.error(error)
                    if (error.response) {
                        alert(error.response.data.message)
                    } else {
                        alert('Please try again later')
                    }
                })
        },
        async submitForm() {
            try {
               const response = await axios.put(`http://127.0.0.1:8000/api/orders/${this.order.or_id}/edit`, this.form)

                alert(response.data.message)

                } catch (error) {
                    this.errors = error.response.data.errors;
            }
        },
    }
}



</script>

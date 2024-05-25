<template>
    <div class="flex flex-col w-full bg-white shadow-md sm:rounded-lg mt-4 left-0">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Code Product
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Categories
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name Product
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700"
                            v-for="(product, index) in products" :key="product.pd_id">
                            <td class="px-6 py-4">
                                {{ index + 1 }}
                            </td>
                            <td class="px-6 py-4">
                                {{ product.pd_code }}
                            </td>
                            <td class="px-6 py-4">
                                {{ product.ct_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ product.pd_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ product.pd_price }}
                            </td>
                            <td class="px-6 py-4 flex items-center">
                                <Link :href="route('products.edit', product.pd_id)" class="font-medium text-slate-50 bg-blue-600 p-2 rounded">
                                    Edit
                                </Link>
                                <button v-on="{ click: () => deleteProduct(product.pd_id) }" class="font-medium text-slate-50 bg-red-600 p-2 rounded ms-2">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';
import axios from 'axios';

export default {
        name: 'Products',
        components: {
            Link
        },
        data() {
            return {
                products: [],
                maxId: null
            }
        },
        mounted() {
            this.getProduct()
        },
        methods: {
            getProduct() {
                axios.get('http://127.0.0.1:8000/api/products').then(response => {
                    this.products = response.data.products
                })
            },
            deleteProduct(id) {
                axios.delete(`http://127.0.0.1:8000/api/products/${id}/delete`).then(response => {
                    alert(response.data.message)
                    this.getProduct().then(() => {
                        this.maxId = this.products[this.products.length - 1].pd_id
                    })
                })
            }
        }
    }
</script>

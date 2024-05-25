<template>
    <div class="flex flex-col w-full bg-white shadow-md sm:rounded-lg mt-4 left-0">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name Products
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700"
                    v-for="(order, index) in orders" :key="order.or_id">
                    <td class="px-6 py-4">
                        {{ index + 1 }}
                    </td>
                    <td class="px-6 py-4">
                        {{ order.pd_name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ order.or_amount }}
                    </td>
                    <td class="px-6 py-4 flex items-center">
                        <Link :href="route('orders.edit', order.or_id)" class="font-medium text-slate-50 bg-blue-600 p-2 rounded">
                            Edit
                        </Link>
                        <button v-on="{ click: () => deleteOrder(order.or_id) }" class="font-medium text-slate-50 bg-red-600 p-2 rounded ms-2">
                            Hapus
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import axios from 'axios';
import { Link } from '@inertiajs/vue3';

export default {
    name: 'tableOrders',
    components: {
        Link
    },
    data() {
        return {
            orders: [],
            maxId: null
        }
    },
    mounted() {
        this.getOrders()
    },
    methods: {
        getOrders() {
            axios.get('http://127.0.0.1:8000/api/orders').then(response => {
                this.orders = response.data.orders
            })
        },
        deleteOrder(id) {
            axios.delete(`http://127.0.0.1:8000/api/orders/${id}/delete`).then(response => {
                alert(response.data.message)
                this.getOrders().then(() => {
                    this.maxId = this.orders[this.orders.length - 1].or_id
                })
            })
        }
    }
}
</script>

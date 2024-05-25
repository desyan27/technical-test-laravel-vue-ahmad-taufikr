<template>
    <div class="flex flex-col w-full bg-white shadow-md sm:rounded-lg mt-4 left-0">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Code Categories
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name Categories
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700"
                    v-for="(category, index) in categories" :key="category.ct_id">
                    <td class="px-6 py-4">
                        {{ index + 1 }}
                    </td>
                    <td class="px-6 py-4">
                        {{ category.ct_code }}
                    </td>
                    <td class="px-6 py-4">
                        {{ category.ct_name }}
                    </td>
                    <td class="px-6 py-4 flex items-center">
                        <Link :href="route('categories.edit', category.ct_id)" class="font-medium text-slate-50 bg-blue-600 p-2 rounded">
                            Edit
                        </Link>
                        <Link v-on="{ click: () => deleteCategory(category.ct_id) }" class="font-medium text-slate-50 bg-red-600 p-2 rounded ms-2">
                            Hapus
                        </Link>
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
    name: 'tableCategories',
    components: {
        Link
    },
    data() {
        return {
            categories: [],
            maxId: null
        }
    },
    mounted() {
        this.getCategories()
    },
    methods: {
        getCategories() {
            axios.get('http://127.0.0.1:8000/api/categories').then(response => {
                this.categories = response.data.categories
            })
        },
        deleteCategory(id) {
            axios.delete(`http://127.0.0.1:8000/api/categories/${id}/delete`).then(response => {
                alert(response.data.message)
                this.getCategories().then(() => {
                    this.maxId = this.categories[this.categories.length - 1].ct_id
                })
            })
        }
    }
}
</script>

<template>
    <div class="flex flex-col w-full bg-white shadow-md sm:rounded-lg mt-4 left-0">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone Number
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Address
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Create_at
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700"
                    v-for="(user, index) in users" :key="user.us_id">
                    <td class="px-6 py-4">
                        {{ index + 1 }}
                    </td>
                    <td class="px-6 py-4">
                        {{ user.us_name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ user.us_email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ user.us_phone_number }}
                    </td>
                    <td class="px-6 py-4">
                        {{ user.us_address }}
                    </td>
                    <td class="px-6 py-4">
                        {{ user.us_created_at }}
                    </td>
                    <td class="px-6 py-4 flex items-center">
                        <Link :href="route('user.edit', user.us_id)" class="font-medium text-slate-50 bg-blue-600 p-2 rounded">
                            Edit
                        </Link>
                        <Link v-on="{ click: () => deleteUser(user.us_id) }" class="font-medium text-slate-50 bg-red-600 p-2 rounded ms-2">
                            Hapus
                        </Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import axios from 'axios'
import { Link } from '@inertiajs/vue3';

export default {
    name: 'tableUser',
    components:{
        Link
    },
    data() {
        return {
            users: [],
            maxId: null
        }
    },
    mounted() {
        this.getUser()
    },
    methods: {
        getUser() {
            axios.get('http://127.0.0.1:8000/api/users').then(response => {
                this.users = response.data.users
            })
        },
        deleteUser(id) {
            axios.delete(`http://127.0.0.1:8000/api/users/${id}/delete`).then(response => {
                alert(response.data.message)
                this.getUser().then(() => {
                    this.maxId = this.users[this.users.length - 1].us_id
                })
            })
        }
    },


}
</script>

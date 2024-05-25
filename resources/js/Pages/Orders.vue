<script setup>
import AuthencatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import tableOrders from '@/Components/table/tableOrders.vue';
import { Link } from '@inertiajs/vue3';

</script>

<template>

    <Head title="Orders" />

    <AuthencatedLayout>
        <main>
            <h1 class="text-xl font-bold text-zinc-800">Data Orders</h1>
            <div class="flex flex-auto">
                <Link :href="route('orders.create')"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Add Data
                </Link>
            </div>

            <tableOrders />
            <modalOrders/>
        </main>
    </AuthencatedLayout>

</template>

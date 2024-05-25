<script setup>
import AuthencatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import tableCategories from '@/Components/table/tableCategories.vue';
import { Link } from '@inertiajs/vue3';

</script>

<template>

    <Head title="Categories" />

    <AuthencatedLayout>
        <main>
            <h1 class="text-xl font-bold text-zinc-800">Data Categories</h1>
            <div class="flex flex-auto">
                <Link :href="route('categories.create')"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Add Data
                </Link>
            </div>

            <tableCategories />
            <modalCategories/>
        </main>
    </AuthencatedLayout>

</template>

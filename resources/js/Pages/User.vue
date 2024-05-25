<script setup>
import AuthencatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import tableUser from '@/Components/table/tableUser.vue';
</script>

<template>

    <Head title="Users" />

    <AuthencatedLayout>
        <main>
            <h1 class="text-xl font-bold text-zinc-800">Data User</h1>
            <tableUser />
        </main>
    </AuthencatedLayout>

</template>

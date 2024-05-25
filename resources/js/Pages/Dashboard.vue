<script setup>
import AuthencatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Sidebar from '@/Components/Sidebar.vue';

</script>

<template>

    <Head title="Dashboard" />

    <AuthencatedLayout>
        <sidebar>
            <Sidebar />
        </sidebar>
        <main>
            <h1 class="text-xl font-bold text-zinc-800">Project ini jawaban dari soal technical test atas nama Ahmad Taufik R</h1>
        </main>
    </AuthencatedLayout>

</template>

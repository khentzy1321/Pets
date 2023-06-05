<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Dashboardfunction from '@/Components/Dashboardfunction.vue';
</script>

<template>
    <AppLayout title="Dashboard">

        <div class="py-1">
            <div class=" sm:px-6">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Dashboardfunction />
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<template>
    <div class="flex">
        <template v-for="( link, key) in links" :key="key">
            <div v-if="link.url == null" v-html="link.label"
             class="mb-1 px-4 py-3 text-gray-400 text-sm border rounded"></div>
          <Link v-else :href="link.url" v-html="link.label"
          class="mb-1 
          px-4 py-3
           text-gray-800 
           text-sm 
           border 
           rounded
           hover: bg-gray
           focus:text-indigo-500 focus:border-indigo-500
           "></Link>
        </template>
    </div>

</template>
<script setup>
import { Link } from '@inertiajs/vue3'
defineProps({
    links: [],
});
</script>
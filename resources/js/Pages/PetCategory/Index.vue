<template>
    <div class="container py-8 mx-auto">
      <h1 class="mb-4 text-2xl font-bold">Pet Categories</h1>

      <div class="flex justify-start mt-4">
        <Link
          :href="route('petcategories.create')"
          class="px-4 py-2 text-white bg-blue-500 mb-3 rounded font-bold hover:bg-blue-700"
        >
          Add Species
        </Link>
      </div>
      <table class="min-w-full bg-white border border-gray-300">
        <thead class="text-center">
          <tr>
            <th class="px-4 py-2 border-b">Pet Species</th>
            <th class="px-4 py-2 border-b">Actions</th>
          </tr>
        </thead>
        <tbody>
          <template v-for="category in petspecies" :key="category.id">
            <tr>
              <td class="px-4 py-2 text-center border-b">{{ category.pet_species }}</td>
              <td class="px-4 py-2 text-center border-b">
                <div class="flex justify-center space-x-2">
                  <Link :href="`/petcategories/show/${category.id}`">
                    <button class="px-2 py-1 text-white bg-green-500 rounded hover:bg-green-700">
                      Show
                    </button>
                  </Link>
                  <Link :href="`/petcategories/edit/${category.id}/`">
                    <button class="px-2 py-1 text-white bg-blue-500 rounded hover:bg-blue-700">
                      Edit
                    </button>
                  </Link>
                </div>
              </td>
            </tr>
          </template>
        </tbody>
      </table>
    </div>
  </template>


  <script setup>

import AppLayout from "../../Layouts/AppLayout.vue"
  import { Link } from '@inertiajs/vue3'


</script>

  <script>

  export default {
    props: {
      petspecies: Array,
    },
    layout: AppLayout,
  };


  </script>

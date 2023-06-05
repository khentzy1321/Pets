<template>
    <div class="min-h-screen">
      <div class="container mx-auto py-3">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">All Cars</h1>
            <div>
              <Link
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                :href="route('cars.create')"
              >
                <i class="fas fa-plus"></i>
              </Link>
            </div>
            </div>
        <div v-if="$page.props.flash.message">
          <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mb-4">
            <Notification />
          </div>
        </div>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
          <table class="min-w-full">
            <thead>
              <tr class="bg-teal-500 text-white">
                <th class="py-3 px-4">ID</th>
                <th class="py-3 px-4">Brand</th>
                <th class="py-3 px-4">Model</th>
                <th class="py-3 px-4">Year</th>
                <th class="py-3 px-4">Price</th>
                <th class="py-3 px-4 text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="car in cars.data" :key="car.id" class="border-b border-gray-200">
                <td class="py-4 px-6">{{ car.id }}</td>
                <td class="py-4 px-6">{{ car.brand }}</td>
                <td class="py-4 px-6">{{ car.model }}</td>
                <td class="py-4 px-6">{{ car.year }}</td>
                <td class="py-4 px-6">{{ car.price }}</td>
                <td class="py-4 px-6 text-center">
                  <Link :href="`/cars/edit/${car.id}`">
                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                      <i class="fas fa-pen"></i>
                    </button>
                  </Link>
                  <button
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-2"
                    @click="deleteItem(car.id)"
                  >
                    <i class="fas fa-trash"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="mt-6">
          <Pagination :links="cars.links" />
        </div>
      </div>
    </div>
  </template>


  <script setup>
    import AppLayout from "../../Layouts/AppLayout.vue"
    import Pagination from "../../Components/pagination.vue";
    // import FlashMessages from '@/Components/FlashMessage.vue';
    import Notification from '@/Components/Notification.vue';

    import NavLink from '@/Components/NavLink.vue';
    import { Inertia } from '@inertiajs/inertia';
    import { Link } from '@inertiajs/vue3'
    import { defineProps } from 'vue'


    const props = defineProps({
        cars: Object
    })
</script>

  <script>
  export default {
    data() {
    return {
      message: '',
      cars: [],
    };
  },
    layout: AppLayout,
    props: {
      cars: {
        type: Array,
        required: true
      }
    },
    components:{
        Notification
    },
    methods: {
  deleteItem(id) {
    if (confirm('Are you sure you want to delete this car?')) {
      Inertia.delete(`/cars/${id}`)
        .then(() => {
          this.$inertia.visit(route('cars.index'));
        })
        .catch(error => {
          console.error(error);
        });
      }
     }
    }
  }
  </script>



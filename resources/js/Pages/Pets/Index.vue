<template>
    <div class="min-h-screen">
      <div class="container py-3 mx-auto">
        <div class="d-flex justify-content-between align-items-center mb-6">
          <h1 class="text-3xl font-bold">All Pets</h1>
          <div>
            <Link
              class="btn btn-primary px-4 py-2 font-bold rounded hover:bg-blue-700"
              :href="route('pets.create')"
            >
              <i class="fas fa-plus"></i>
            </Link>
          </div>
        </div>
        <div v-if="$page.props.flash.message">
          <div class="px-4 py-3 mb-4 text-teal-900 bg-gray-100 border-t-4 border-teal-500 rounded-b shadow-md">
            <Notification />
          </div>
        </div>
        <div class="overflow-hidden bg-white shadow-md">
          <table class="table">
            <thead>
              <tr class="text-white bg-yellow-500">
                <th>ID</th>
                <th>Pet Name</th>
                <th>Pet Type</th>
                <th>Pet Color</th>
                <th>Category</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
              <tbody>
                <tr v-for="pet in pets.data" :key="pet.id" class="border-bottom border-gray-200">
                  <td>{{ pet.id }}</td>
                  <td>{{ pet.pet_name }}</td>
                  <td>{{ pet.pet_type }}</td>
                  <td>{{ pet.pet_color }}</td>
                  <td>{{ pet.pet_species }}</td>
                  <td class="text-center">
                    <Link :href="`/pets/edit/${pet.id}`">
                      <button class="btn btn-success mx-2 hover:bg-green-700">
                        <i class="fas fa-pen"></i>
                      </button>
                    </Link>
                    <button
                      class="btn btn-danger hover:bg-red-700"
                      @click="deleteItem(pet.id)"
                    >
                      <i class="fas fa-trash"></i>
                    </button>
                  </td>
                </tr>
              </tbody>

          </table>
        </div>
        <div class="mt-6">
          <Pagination :links="pets.links" />
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


</script>

  <script>
  export default {
    data() {
    return {
      message: '',
    };
  },
    layout: AppLayout,
    props: {
        pets: {
      type: Object,
      required: true,
    },
    petcateg: Array,

  },
    components:{
        Notification
    },
    methods: {
  deleteItem(id) {
    if (confirm('Are you sure you want to delete this pet?')) {
      Inertia.delete(`/pets/${id}`)
        .then(() => {
          this.$inertia.visit(route('pets.index'));
        })
        .catch(error => {
          console.error(error);
        });
    }
  }
  },
  }
  </script>



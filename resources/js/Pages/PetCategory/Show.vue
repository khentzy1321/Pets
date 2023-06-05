<template>
    <div class="container py-8 mx-auto">
      <h1 class="mb-4 text-2xl font-bold">Pet Category Details</h1>
  
      <div>
        <p><strong>Pet Species:</strong> {{ petCategory.pet_species }}</p>
        <p><strong>Related Pets:</strong></p>
        <ul>
          <li v-for="pet in petCategory.pets" :key="pet.id">
            {{ pet.pet_name }} - {{ pet.pet_type }}
          </li>
        </ul>
      </div>
    </div>
  </template>
  
<script setup>
import AppLayout from "../../Layouts/AppLayout.vue"
</script>
<script>
export default {

    layout: AppLayout,

  props: {
    petCategory:  {
      type: Object,
      required: true,
    },
    pets: Array,
  },
  mounted() {
    console.log(this.petCategory);
  },
};
</script>
<template>

    <div class="container py-8 mx-auto">
        <h1 class="mb-4 text-2xl font-bold">UPDATE SPECIES</h1>
        <div class="center-form">
          <div>
              <div v-if="errors.pet_species" class="text-sm italic text-red-500">{{ errors.pet_species[0] }}</div>
          </div>
          <form @submit.prevent="submit">
              <div class="species">
                  <p>update species</p>
                  <input v-model="form.pet_species" type="text" id="pet_species" name="pet_species" placeholder="Enter Species" class="species-input" >
                  <br>
                  <button class="submit-btn" type="submit">UPDATE</button>
                </div>
            </form>
        </div>
      </div>
  </template>

  <script setup>


import { useForm, usePage } from '@inertiajs/inertia-vue3'
import { setTransitionHooks } from 'vue';
import AppLayout from "../../Layouts/AppLayout.vue"
import { defineProps } from 'vue'


const props = defineProps({
    petCategory: Object,
    errors: Object,


})


let form = useForm({
    pet_species: props.petCategory.pet_species,

})

const { visit } = usePage()
const submit = () => {
  form.put('/petcategories/update/' + props.petCategory.id)
    .then(() => {
      // Handle success message if needed
      // ...

      // Redirect to the index route using Inertia.js
      return $inertia.visit(route('petcategories.index'));
    })
    .catch(error => {
      console.error(error);
    });
};

</script>
<script>

  export default {
    layout: AppLayout,
    props: {
    errors: Object, // Define the prop for the errors object
    },
    data() {
    return {
      errors: {}, // Provide the errors object
      petCategory: {}, // Define your petCategory object
    }
  },
  }
</script>
<style>

.center-form{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
  .species {
    position: relative;
    height: 140px;
    width: 240px;
    padding: 20px;
    background-color: #FFF;
    border-radius: 4px;
    color: #333;
    box-shadow: 0px 0px 60px 5px rgba(0, 0, 0, 0.4);
  }

  .species:after {
    position: absolute;
    content: "";
    right: -10px;
    bottom: 18px;
    width: 0;
    height: 0;
    border-left: 0px solid transparent;
    border-right: 10px solid transparent;
    border-bottom: 10px solid #1a044e;
  }

  .species p {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    letter-spacing: 4px;
    line-height: 28px;
  }

  .species input {
    position: absolute;
    bottom: 30px;
    border: none;
    border-bottom: 1px solid #d4d4d4;
    padding: 10px;
    width: 82%;
    background: transparent;
    transition: all .25s ease;
  }

  .species input:focus {
    outline: none;
    border-bottom: 1px solid #0d095e;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', 'sans-serif';
  }

  .species .submit-btn {
    position: absolute;
    border-radius: 30px;
    border-bottom-right-radius: 0;
    border-top-right-radius: 0;
    background-color: #0f0092;
    color: #FFF;
    padding: 12px 25px;
    display: inline-block;
    font-size: 12px;
    font-weight: bold;
    letter-spacing: 5px;
    right: -10px;
    bottom: -20px;
    cursor: pointer;
    transition: all .25s ease;
    box-shadow: -5px 6px 20px 0px rgba(26, 26, 26, 0.4);
  }

  .species .submit-btn:hover {
    background-color: #07013d;
    box-shadow: -5px 6px 20px 0px rgba(88, 88, 88, 0.569);
  }
</style>

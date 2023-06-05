<template>
    <div>
        <div class="section">
            <Header class="text-center"> <h2>EDIT CARS INFO</h2> </Header>
            <div class="card" style="box-shadow: 2px 2px 4px #222222;">
                <div class="card-body">
                    <form @submit.prevent="submit" id="consultation-form" class="feed-form" action="#">
                        <input v-model="form.pet_name"  name="pet_name" required="" placeholder="Pet Name" type="text">
                        <input v-model="form.pet_type" name="pet_type" required="" placeholder="Pet Type">
                        <input v-model="form.pet_color" name="pet_color" required="" placeholder="Pet Color">
                        <input type="hidden" v-model="form.petspecies_id" name="petcategory_id" required="" placeholder="Price">
                        <button type="submit" class="button_submit">Update</button>
                      </form>
                </div>
            </div>
        </div>
    </div>

</template>
<script setup>


import { useForm, usePage } from '@inertiajs/inertia-vue3'
import { setTransitionHooks } from 'vue';
import AppLayout from "../../Layouts/AppLayout.vue"
import { defineProps } from 'vue'


const props = defineProps({
    pet: Object
})


let form = useForm({
    pet_name: props.pet.pet_name,
    pet_type: props.pet.pet_type,
    pet_color: props.pet.pet_color,
    petspecies_id: props.pet.petspecies_id
})

const { visit } = usePage()
const submit = () => {
  form.put('/pets/update/' + props.pet.id)
    .then(() => {
      // Handle success message if needed
      // ...

      // Redirect to the index route using Inertia.js
      return $inertia.visit(route('pets.index'));
    })
    .catch(error => {
      console.error(error);
    });
};

</script>

<script>

  export default {
    layout: AppLayout,
  }
</script>

<style>
.section{
    position: absolute;
    top: 50%;
    left: 50%;
    transform:translate(-50%, -50%);
    width: 40%;
}
.feed-form {
    margin-top: 36px;
    display: flex;
    flex-direction: column;
    width: 100%;
  }

  .feed-form input {
    height: 54px;
    border-radius: 4px;
    background: rgba(0, 128, 128, 0.116);
    margin-bottom: 15px;
    border: none;
    padding: 0 20px;
    font-weight: 300;
    font-size: 14px;
    color: #000000;
  }

   .feed-form input:hover {
    transform: scale(1.009);
    box-shadow: 0px 0px 3px 0px #212529;
  }

  .button_submit {
    width: 50%;
    height: 54px;
    font-size: 14px;
    color: white;
    background: teal;
    border-radius: 5px;
    border: none;
    font-weight: 500;
    text-transform: uppercase;
    left: 50%;
    position: relative;
    transform: translateX(-50%);
  }

</style>

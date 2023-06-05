
<template>
        <div class="section">
          
            <Header class="text-center"> <h2>ADD CARS INFO</h2> </Header>
            <div class="card">
                <div class="card-body" style="box-shadow: 2px 2px 5px #222222;">
                    <form @submit.prevent="submitForm" id="consultation-form" class="feed-form" action="#">
                      
                        <input v-model="form.brand"  name="brand"  placeholder="Brand" type="text">  
                        <span>
                            <div v-if="errors.brand" class="text-sm text-red-500 italic">{{ errors.brand[0] }}</div>
                        </span>
                        <input v-model="form.model" name="model"  placeholder="Model">
                        <span>
                            <div v-if="errors.model" class="text-sm text-red-500 italic">{{ errors.model[0] }}</div>
                        </span>
                        <input v-model="form.year" name="year"  placeholder="Year">
                        <span>
                            <div v-if="errors.year" class="text-sm text-red-500 italic">{{ errors.year[0] }}</div>
                        </span>
                        <input v-model="form.price" name="price"  placeholder="Price">
                        <span>
                            <div v-if="errors.price" class="text-sm text-red-500 italic">{{ errors.price[0] }}</div>
                        </span>
                        <button type="submit" class="button_submit">Add</button>
                      </form>
                </div>
            </div>
        </div>

    </template>

    <script setup>
      import AppLayout from "../../Layouts/AppLayout.vue"
      
</script>
  <script>
  export default {
    layout: AppLayout,
    data() {
      return {
        form: {
          brand: '',
          model: '',
          year: '',
          price: ''
        },
      };
    },
    props: {
    errors: Object, // Define the prop for the errors object
  },
    methods: {
      submitForm() {
   
        this.$inertia.post(('/cars/store'), this.form)
          .then(() => {
          })
          .catch((error) => {
            console.error(error);
          });
      }
    }
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

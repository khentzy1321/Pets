<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register" />

    <AuthenticationCard>

        <form class="form" @submit.prevent="submit" style="box-shadow: 2px 2px 4px #222222;">
            <p class="form-title">Create your account</p>
             <div class="input-container">
               <input type="text" name="name" v-model="form.name" placeholder="Enter Name">
               <span>
                <InputError class="mt-1" :message="form.errors.name" />
               </span>
           </div>
           <div class="input-container">
               <input type="email" name="email" v-model="form.email" placeholder="Enter email">
               <span>
                <InputError class="mt-1" :message="form.errors.email" />
               </span>
           </div>
           <div class="input-container">
               <input type="password" name="password" v-model="form.password" placeholder="Enter password">
               <span>
                <small><InputError class="mt-1" :message="form.errors.password" /></small>
               </span>
            </div>
             <div class="input-container">
               <input type="password" name="password_confirmation" v-model="form.password_confirmation" placeholder="Confirm password">
               <span>
                <small><InputError class="mt-2" :message="form.errors.password_confrimation" /></small>
               </span>
            </div>
              <button type="submit" class="submit">
             Sign in
           </button>
     
           <p class="signup-link">
             already have an account?
             <Link :href="route('login')">Login here</Link>
           </p>
        </form>
     
    </AuthenticationCard>
</template>
<style>
.form {
  background-color: #fff;
  display: block;
  padding: 1rem;
  max-width: 350px;
  border-radius: 0.5rem;
  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

.form-title {
  font-size: 1.25rem;
  line-height: 1.75rem;
  font-weight: 600;
  text-align: center;
  color: #000;
}

.input-container {
  position: relative;
}

.input-container input, .form button {
  outline: none;
  border: 1px solid #e5e7eb;
  margin: 8px 0;
}

.input-container input {
  background-color: #fff;
  padding: 1rem;
  padding-right: 3rem;
  font-size: 0.875rem;
  line-height: 1.25rem;
  width: 300px;
  border-radius: 0.5rem;
  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
}

.submit {
  display: block;
  padding-top: 0.75rem;
  padding-bottom: 0.75rem;
  padding-left: 1.25rem;
  padding-right: 1.25rem;
  background-color: #4F46E5;
  color: #ffffff;
  font-size: 0.875rem;
  line-height: 1.25rem;
  font-weight: 500;
  width: 100%;
  border-radius: 0.5rem;
  text-transform: uppercase;
}

.signup-link {
  color: #6B7280;
  font-size: 0.875rem;
  line-height: 1.25rem;
  text-align: center;
}

.signup-link a {
  text-decoration: underline;
}
</style>
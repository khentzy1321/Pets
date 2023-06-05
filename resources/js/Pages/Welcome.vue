<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
      <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
        <template v-if="$page.props.auth.user">
          <Link :href="route('dashboard')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Dashboard
          </Link>
        </template>
        <template v-else>
          <Link :href="route('login')" class="bg-secondary font-semibold text-yellow-100 hover:text-white-900 dark:text-white-900 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Log in
          </Link>
          <!-- <Link v-if="canRegister" :href="route('register')" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Register
          </Link> -->
         
        </template>
      
      </div>
      <div class="container">
        <h1 class="h1">Welcome to My Cars</h1>
        <p class="p">Explore the world of cars and indulge in your automotive passion.</p>
        <a :href="route('login')" class="btn1">Explore Now</a>
    </div>
    </div>
  </template>
  
  
  

<style>
.bg-dots-darker {
    background-image: url("https://wallpaperaccess.com/full/191738.jpg");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
.container {
    text-align: center;
    margin-top: 150px;
}
.h1 {
    font-size: 38px;
    color: rgb(114, 114, 114);
    font-weight: 300;
}
.p {
    font-size: 18px;
    color: #ffd445;
    margin-top: 20px;
}
.btn1 {
    display: inline-block;
    padding: 12px 24px;
    background-color: #333;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    font-size: 18px;
    transition: background-color 0.3s;
}
.btn1:hover {
    background-color: #666;
}
</style>

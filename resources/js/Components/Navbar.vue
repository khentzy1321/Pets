<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <Link class="nav-item nav-link" href="/">
              Home
            </Link>
            <Link  v-if="!isLoggedIn"  class="nav-link nav-item" href="/login">Login</Link>
            <Link  v-if="isLoggedIn"  class="nav-item nav-link" href="/logout" method="post">Logout</Link>
          </ul>
        </div>
      </div>
    </nav>

  </template>


<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import { defineProps } from 'vue'

    defineProps({
        user: ''
    })
</script>
<script>
export default {
  computed: {
    isLoggedIn() {
      return !!this.user;
    }
  },
  data() {
    return {
      user: null // Set user to null initially, assuming no user is logged in
    };
  },
  methods: {
    login() {
      // Perform login logic and update user property
      // After a successful login, update the value of the user property
      this.user = "John"; // Example: Set the user to a non-null value
    },
    logout() {
      // Perform logout logic and clear the user property
      this.user = null; // Example: Set the user back to null
    }
  }
};
</script>

<template>
    <div>
      <div v-for="message in messages" :key="message.id" :class="message.type">
        {{ message.text }}
      </div>
    </div>
  </template>

  <script>
  export default {
    props: {
      messages: {
        type: Array,
        default: () => [],
      },
    },
  };
  </script>

  <style scoped>
  .success {
    color: green;
  }

  .error {
    color: red;
  }

  </style>

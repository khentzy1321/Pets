
<template>
        <div v-if="$page.props.flash.message">
            <div class="alert" role="alert">
                {{ $page.props.flash.message }}
              </div>
          </div>

</template>
  <script setup>
</script>

<template>
  <a :href="this.url" class="c-button c-button--blue c-button--width100">{{ this.text }}</a>
</template>

<script>
  export default {
    props: ['url', 'text'],
    data: function() {
      return {
        
      }
    },
  }
</script>
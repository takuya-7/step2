<template>
  <div>
    <ul class="p-step-list">
      <li v-for="step in steps" :key="step.id">
        <ListItem :step='step' :categories='categories'></ListItem>
      </li>
    </ul>
  </div>
</template>

<script>
  import { ref } from "vue";
  import ListItem from './ListItem.vue'

  export default {
    components: {
      ListItem,
    },
    props: ['steps', 'categories'],

  }
</script>   
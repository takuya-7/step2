<template>
  <div>
    <ChildStepForm v-for="(childStepForm, index) in childStepForms" :key="childStepForm" :childStepForm='childStepForm' :index='index' :childStepFormCount='childStepFormCount' @deleteChildStepForm="deleteChildStepForm"></ChildStepForm>
    <div class="u-text-center u-mb-4">
      <button type="button" @click="addChildStepForm" class="c-button--plus">＋</button>
    </div>
  </div>
</template>

<script>
  import { ref } from "vue";
  import ChildStepForm from './ChildStepForm.vue'

  export default {
    components: {
      ChildStepForm,
    },
    data: function() {
      return {
        childStepForms: [
          {id: 1, hasError: false, errorMessage: ''},
        ],
        childStepFormCount: 1,
      }
    },
    methods: {
      addChildStepForm: function(){
        this.childStepForms.push(
          {hasError: false, errorMessage: ''},
        )
        ++this.childStepFormCount
      },
      deleteChildStepForm: function(index) {
        this.childStepForms.splice(index, 1)
        --this.childStepFormCount
      },
    }
  }
</script>
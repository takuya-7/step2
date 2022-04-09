<template>
  <div>
    <!-- <ChildStepForm v-for="(childStepForm, index) in childStepForms" :key="childStepForm" :childStepForm='childStepForm' :index='index' :childStepFormCount='childStepFormCount' :oldInputs='oldInputs' :form='form' @deleteChildStepForm="deleteChildStepForm"></ChildStepForm> -->

    <ChildStepForm v-for="(childStepForm, index) in childStepForms" :key="childStepForm"  :index='index' :childStepFormCount='childStepFormCount' :oldInputs='oldInputs' :errors='errors' @deleteChildStepForm="deleteChildStepForm" :childStepForm="childStepForm"></ChildStepForm>


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
    props: ['oldInputs', 'errors'],
    data: function() {
      return {
        childStepForms: [
          {
            // title: '',
            // description: '',
            // estimatedAchievementDay: 0,
            // estimatedAchievementHour: 0,
          },
        ],
        childStepForm: {
          title: '',
          description: '',
          estimatedAchievementDay: 0,
          estimatedAchievementHour: 0,
        },
        childStepFormCount: 0,
      }
    },
    created() {
      console.log('created: child forms')
      console.log('this.oldInputs')
      console.log(this.oldInputs)

      console.log('this.childStepForms')
      console.log(this.childStepForms)
      
      // 子ステップで入力保持があればそのフォームを作成
      if(this.oldInputs['child_step_title']){
        if(Object.keys(this.oldInputs['child_step_title']).length){
          this.childStepForms.length = 0
          for (let i = 0; i < Object.keys(this.oldInputs['child_step_title']).length; i++){
            this.childStepForms.push(
              {
                title: (this.oldInputs['child_step_title']) ? this.oldInputs['child_step_title'][i]: null,
                description: (this.oldInputs['child_step_description']) ? this.oldInputs['child_step_description'][i]: null,
                estimatedAchievementDay: (this.oldInputs['child_step_estimated_achievement_day']) ? this.oldInputs['child_step_estimated_achievement_day'][i]: null,
                estimatedAchievementHour: (this.oldInputs['child_step_estimated_achievement_hour']) ? this.oldInputs['child_step_estimated_achievement_hour'][i]: null,
              }
            )
            ++this.childStepFormCount
          }
        }else{
          this.childStepForms.length = 0
          this.childStepForms.push(
            this.childStepForm
          )
          ++this.childStepFormCount
        }
      }else{
        ++this.childStepFormCount
      }
      console.log('this.childStepFormCount')
      console.log(this.childStepFormCount)
    },
    mounted() {

    },
    methods: {
      // 子ステップフォーム追加
      addChildStepForm: function(){
        console.log('addChildStepForm')
        this.childStepForms.push(
          this.childStepForm
        )
        ++this.childStepFormCount
        console.log('this.childStepFormCount')
        console.log(this.childStepFormCount)
      },
      // 子ステップフォーム削除
      deleteChildStepForm: function(index) {
        this.childStepForms.splice(index, 1)
        --this.childStepFormCount
      },
    }
  }
</script>
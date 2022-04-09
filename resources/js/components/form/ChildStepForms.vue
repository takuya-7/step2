<template>
  <div>
    <input type="hidden" name="child_step_form_count" v-model="childStepFormCount">
    <ChildStepForm v-for="(childStepForm, index) in childStepForms" :key="childStepForm"  :index='index' :childStepFormCount='childStepFormCount' :oldInputs='oldInputs' :errors='errors' @deleteChildStepForm="deleteChildStepForm"></ChildStepForm>

    <div class="u-text-center u-mb-4">
      <button type="button" @click="addChildStepForm" class="c-button--plus">＋</button>
    </div>
  </div>
</template>

<script>
  import ChildStepForm from './ChildStepForm.vue'

  export default {
    components: {
      ChildStepForm,
    },
    props: ['oldInputs', 'errors'],
    data: function() {
      return {
        childStepForms: [],
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
      // 子ステップで入力保持があればそのフォームを作成
      if(this.oldInputs['child_step_title']){
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
        this.childStepForms.push(
          this.childStepForm
        )
        ++this.childStepFormCount
      }
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
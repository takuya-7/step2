<template>
  <div>
    <input type="hidden" name="child_step_form_count" v-model="childStepFormCount">
    <ChildStepForm
      v-for="(childStepForm, index) in childStepForms"
      :key="childStepForm"
      :childStepForm="childStepForm"
      :index="index"
      :childStepFormCount="childStepFormCount"
      :oldInputs="oldInputs"
      :errors="errors"
      :childSteps="childSteps"
      @update:childStepTitle="childStepForms[index].title = $event"
      @update:childStepDescription="childStepForms[index].description = $event"
      @update:childStepEstimatedAchievementDay="childStepForms[index].estimatedAchievementDay = $event"
      @update:childStepEstimatedAchievementHour="childStepForms[index].estimatedAchievementHour = $event"
      @deleteChildStepForm="deleteChildStepForm"
    ></ChildStepForm>

    <div v-if="childStepFormCount > 99" class="u-mb-4 u-text-center">
      登録できるSTEPは100個以下です。
    </div>
    <div v-else class="u-text-center u-mb-4">
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
    props: [
      'oldInputs',
      'errors',
      // edit用
      'childSteps',
    ],
    data: function() {
      return {
        childStepForms: [],
        childStepForm: {
          title: null,
          description: null,
          estimatedAchievementDay: null,
          estimatedAchievementHour: null,
        },
        childStepFormCount: 0,
      }
    },
    created() {
      // フォームデータ取得
      // ステップ編集の場合で初回読み込み時
      if(this.childSteps && this.oldInputs['child_step_title'] == null){
        for (let i = 0; i < Object.keys(this.childSteps).length; i++){
          this.childStepForms.push(
            {
              title: this.childSteps[i].title,
              description: this.childSteps[i].description,
              estimatedAchievementDay: this.childSteps[i].estimated_achievement_day,
              estimatedAchievementHour: this.childSteps[i].estimated_achievement_hour,
            }
          )
          ++this.childStepFormCount
        }
      }else if(this.oldInputs['child_step_title']){
        // 子ステップで入力保持があればそのフォームを作成
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
        this.childStepForms.push(
          {
            title: null,
            description: null,
            estimatedAchievementDay: null,
            estimatedAchievementHour: null,
          }
        )
        ++this.childStepFormCount
      },
      // 子ステップフォーム削除
      deleteChildStepForm: function(index) {
        this.childStepForms.splice(index, 1)
        --this.childStepFormCount
      },
    }
  }
</script>
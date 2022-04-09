<template>
  <div>
    <label class="c-form__field__name">
      ステップ{{ i }}
      <span class="c-form__field--required">（必須）</span>
      <button type="button" v-if="i!==1 && i===childStepFormCount" @click="deleteChildStepForm" class="c-button--x">×</button>
    </label>

    <fieldset class="c-form__field">
      <div class="c-form__invalid-feedback" v-for="value in error.title" :key="value">
        {{ value }}
      </div>
      <input name="child_step_title[]" type="text" :value="child_step_title" :class="{ 'is-invalid': (error.title) }" placeholder="学ぶ手順の見出し">
    </fieldset>

    <fieldset class="c-form__field">
      <div class="c-form__invalid-feedback" v-for="value in error.description" :key="value">
        {{ value }}
      </div>
      <textarea name="child_step_description[]" :value="child_step_description" class="c-form__field__textarea" :class="{ 'is-invalid': (error.description) }" style="min-height: 8rem;" placeholder="具体的にやること、コツやポイントについて"></textarea>
    </fieldset>

    <div class="c-form__field">
      <div class="c-form__child-item">
        <div class="c-form__invalid-feedback" v-for="value in error.estimated_achievement_day" :key="value">
          {{ value }}
        </div>
        <label :for="estimatedAchievementDay" class="c-form__child-item__left">
          <span class="c-form__child-item-name">所要日数</span>
        </label>
        <div class="c-form__child-item__right">
          <input :id="estimatedAchievementDay" name="child_step_estimated_achievement_day[]" :class="{ 'is-invalid': (error.estimated_achievement_day) }" :value="child_step_estimated_achievement_day" type="text" placeholder="例：3" class="">
          <span class="u-fs-08"> 日</span>
        </div>
      </div>

      <div class="c-form__child-item">
        <div class="c-form__invalid-feedback" v-for="value in error.estimated_achievement_hour" :key="value">
          {{ value }}
        </div>
        <label :for="estimatedAchievementHour" class="c-form__child-item__left">
          <span class="c-form__child-item-name">所要時間</span>
        </label>
        <div class="c-form__child-item__right">
          <input :id="estimatedAchievementHour" name="child_step_estimated_achievement_hour[]" :class="{ 'is-invalid': (error.estimated_achievement_hour) }" :value="child_step_estimated_achievement_hour" type="text" placeholder="例：6" class="">
          <span class="u-fs-08"> 時間</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['childStepForm', 'index', 'childStepFormCount', 'oldInputs', 'errors', 'childStepForms'],
    data: function() {
      return {
        i: this.index + 1,

        // 入力保持
        child_step_title: (this.oldInputs['child_step_title']) ? this.oldInputs['child_step_title'][this.index]: null,
        child_step_description: (this.oldInputs['child_step_description']) ? this.oldInputs['child_step_description'][this.index]: null,
        child_step_estimated_achievement_day: (this.oldInputs['child_step_estimated_achievement_day']) ? this.oldInputs['child_step_estimated_achievement_day'][this.index]: null,
        child_step_estimated_achievement_hour: (this.oldInputs['child_step_estimated_achievement_hour']) ? this.oldInputs['child_step_estimated_achievement_hour'][this.index]: null,

        error:{
          title: this.errors['child_step_title.' + this.index],
          description: this.errors['child_step_description.' + this.index],
          estimated_achievement_day: this.errors['child_step_estimated_achievement_day.' + this.index],
          estimated_achievement_hour: this.errors['child_step_estimated_achievement_hour.' + this.index],
        }
      }
    },
    methods: {
      // 子STEPフォーム削除
      deleteChildStepForm: function() {
        this.$emit('deleteChildStepForm', this.index);
      },
    }
  }
</script>
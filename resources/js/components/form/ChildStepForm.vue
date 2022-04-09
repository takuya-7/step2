<template>
  <div>
    <label class="c-form__field__name">
      ステップ{{ i }}
      <span class="c-form__field--required">（必須）</span>
      <button type="button" v-if="i!==1 && i===childStepFormCount" @click="deleteChildStepForm" class="c-button--x">×</button>
    </label>

    <fieldset class="c-form__field">
      <!-- <div class="c-form__invalid-feedback"
          v-if="form.errors.has(title)"
          v-text="form.errors.first(title)"></div> -->

      <div class="c-form__invalid-feedback" v-for="value in error.title" :key="value">
        {{ value }}
      </div>

      <!-- <input :name="title" type="text" v-model="form[title]" :class="{ 'is-invalid': form.errors.has(title) }" placeholder="学ぶ手順の見出し"> -->
      <!-- <input :name="this.title" type="text" v-model="old_title" :class="{ 'is-invalid': (error.title) }" placeholder="学ぶ手順の見出し"> -->
      <input name="child_step_title[]" type="text" :value="child_step_title" :class="{ 'is-invalid': (error.title) }" placeholder="学ぶ手順の見出し">
    </fieldset>

    <fieldset class="c-form__field">
      <!-- <div class="c-form__invalid-feedback"
        v-if="form.errors.has(description)"
        v-text="form.errors.first(description)"></div> -->

      <!-- <textarea :name="description" v-model="form[description]" class="c-form__field__textarea" :class="{ 'is-invalid': form.errors.has(description) }" style="min-height: 8rem;" placeholder="具体的にやること、コツやポイントについて"></textarea> -->
      <!-- <textarea :name="description" v-model="old_description" class="c-form__field__textarea" :class="{ 'is-invalid': false }" style="min-height: 8rem;" placeholder="具体的にやること、コツやポイントについて"></textarea> -->

      <div class="c-form__invalid-feedback" v-for="value in error.description" :key="value">
        {{ value }}
      </div>

      <textarea name="child_step_description[]" :value="child_step_description" class="c-form__field__textarea" :class="{ 'is-invalid': (error.description) }" style="min-height: 8rem;" placeholder="具体的にやること、コツやポイントについて"></textarea>
    </fieldset>

    <div class="c-form__field">
      <div class="c-form__child-item">
        <!-- <div class="c-form__invalid-feedback"
          v-if="form.errors.has(estimatedAchievementDay)"
          v-text="form.errors.first(estimatedAchievementDay)"></div> -->

        <div class="c-form__invalid-feedback" v-for="value in error.estimated_achievement_day" :key="value">
          {{ value }}
        </div>

        <label :for="estimatedAchievementDay" class="c-form__child-item__left">
          <span class="c-form__child-item-name">所要日数</span>
        </label>
        <div class="c-form__child-item__right">
          <!-- <input :id="estimatedAchievementDay" :name="estimatedAchievementDay" :class="{ 'is-invalid': form.errors.has(estimatedAchievementDay) }" v-model="form[estimatedAchievementDay]" type="text" placeholder="例：3" class=""> -->
          <input :id="estimatedAchievementDay" name="child_step_estimated_achievement_day[]" :class="{ 'is-invalid': (error.estimated_achievement_day) }" :value="child_step_estimated_achievement_day" type="text" placeholder="例：3" class="">
          <span class="u-fs-08"> 日</span>
        </div>
      </div>
      <div class="c-form__child-item">
        <!-- <div class="c-form__invalid-feedback"
          v-if="form.errors.has(estimatedAchievementHour)"
          v-text="form.errors.first(estimatedAchievementHour)"></div> -->

        <div class="c-form__invalid-feedback" v-for="value in error.estimated_achievement_hour" :key="value">
          {{ value }}
        </div>

        <label :for="estimatedAchievementHour" class="c-form__child-item__left">
          <span class="c-form__child-item-name">所要時間</span>
        </label>
        <div class="c-form__child-item__right">
          <!-- <input :id="estimatedAchievementHour" :name="estimatedAchievementHour" :class="{ 'is-invalid': form.errors.has(estimatedAchievementHour) }" v-model="form[estimatedAchievementHour]" type="text" placeholder="例：6" class=""> -->
          <input :id="estimatedAchievementHour" name="child_step_estimated_achievement_hour[]" :class="{ 'is-invalid': (error.estimated_achievement_hour) }" :value="child_step_estimated_achievement_hour" type="text" placeholder="例：6" class="">
          <span class="u-fs-08"> 時間</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import { ref } from "vue";

  export default {
    props: ['childStepForm', 'index', 'childStepFormCount', 'oldInputs', 'errors', 'childStepForms'],
    data: function() {
      return {
        i: this.index + 1,

        // 入力保持全てできているもの
        child_step_title: (this.oldInputs['child_step_title']) ? this.oldInputs['child_step_title'][this.index]: null,
        child_step_description: (this.oldInputs['child_step_description']) ? this.oldInputs['child_step_description'][this.index]: null,
        child_step_estimated_achievement_day: (this.oldInputs['child_step_estimated_achievement_day']) ? this.oldInputs['child_step_estimated_achievement_day'][this.index]: null,
        child_step_estimated_achievement_hour: (this.oldInputs['child_step_estimated_achievement_hour']) ? this.oldInputs['child_step_estimated_achievement_hour'][this.index]: null,


        // title: 'child_step' + (this.index + 1) + '_title',
        // description: 'child_step' + (this.index + 1) + '_description',
        // estimatedAchievementDay: 'child_step' + (this.index + 1) + '_estimated_achievement_day',
        // estimatedAchievementHour: 'child_step' + (this.index + 1) + '_estimated_achievement_hour',

        // old_title: this.oldInputs['child_step' + (this.index + 1) + '_title'],
        // old_description: this.oldInputs['child_step' + (this.index + 1) + '_description'],
        // old_estimated_achievement_day: this.oldInputs['child_step' + (this.index + 1) + '_estimated_achievement_day'],
        // old_estimated_achievement_hour: this.oldInputs['child_step' + (this.index + 1) + '_estimated_achievement_hour'],

        // child_step1_title: this.oldInputs.child_step1_title,
        // child_step1_description: this.oldInputs.child_step1_description,
        // child_step1_estimated_achievement_day: this.oldInputs.child_step1_estimated_achievement_day,
        // child_step1_estimated_achievement_hour: this.oldInputs.child_step1_estimated_achievement_hour,

        error:{
          title: this.errors['child_step_title.' + this.index],
          description: this.errors['child_step_description.' + this.index],
          estimated_achievement_day: this.errors['child_step_estimated_achievement_day.' + this.index],
          estimated_achievement_hour: this.errors['child_step_estimated_achievement_hour.' + this.index],
        }
      }
    },
    computed: {
      // title: function(){
      //   return 'child_step' + this.i + '_title'
      // },
      // description: function(){
      //   return 'child_step' + this.i + '_description'
      // },
      // estimatedAchievementDay: function(){
      //   return 'child_step' + this.i + '_estimated_achievement_day'
      // },
      // estimatedAchievementHour: function(){
      //   return 'child_step' + this.i + '_estimated_achievement_hour'
      // },

    },
    created() {
      console.log('created: child')
      console.log('this.errors')
      console.log(this.errors)
      console.log(this.errors['child_step1_title'])
      console.log(this.error.title)

      console.log('this.childStepForm')
      console.log(this.childStepForm)

      console.log('this.index')
      console.log(this.index)


      console.log('this.oldInputs.child_step_title[0]')
      if(this.oldInputs.child_step_title){
        console.log(this.oldInputs.child_step_title[0])
      }
      // this.oldInputs.child_step_title = this.oldInputs.child_step_title.split(',')
    },
    methods: {
      deleteChildStepForm: function() {
        this.$emit('deleteChildStepForm', this.index);
      },
    }
  }
</script>
<template>
  <div>
    <label class="c-form__field__name">
      ステップ{{ i }}
      <span class="c-form__field--required">（必須）</span>
      <button type="button" v-if="i!==1 && i===childStepFormCount" @click="deleteChildStepForm" class="c-button--x">×</button>
    </label>

    <fieldset class="c-form__field">
      <!-- <span class="c-form__invalid-feedback" role="alert">
        <strong>エラーメッセージ</strong>
      </span> -->
      <input :name="title" type="text" value="" class="" placeholder="学ぶ手順の見出し">
    </fieldset>

    <fieldset class="c-form__field">
      <!-- <span class="c-form__invalid-feedback" role="alert">
        <strong>エラー：child-step1-description</strong>
      </span> -->
      <textarea :name="description" class="c-form__field__textarea" style="min-height: 8rem;" placeholder="具体的にやること、コツやポイントについて"></textarea>
    </fieldset>

    <div class="c-form__field">
      <!-- <span class="c-form__invalid-feedback" role="alert">
        <strong>エラー：estimated_achievement_day</strong>
      </span> -->
      <div class="c-form__child-item">
        <label :for="estimatedAchievementDay" class="c-form__child-item__left">
          <span class="c-form__child-item-name">所要日数</span>
        </label>
        <div class="c-form__child-item__right">
          <input :id="estimatedAchievementDay" :name="estimatedAchievementDay" type="text" placeholder="例：3" value="" class="">
          <span class="u-fs-08"> 日</span>
        </div>
      </div>
      <!-- <span class="c-form__invalid-feedback" role="alert">
        <strong>エラー：estimated_achievement_hour</strong>
      </span> -->
      <div class="c-form__child-item">
        <label :for="estimatedAchievementHour" class="c-form__child-item__left">
          <span class="c-form__child-item-name">所要時間</span>
        </label>
        <div class="c-form__child-item__right">
          <input :id="estimatedAchievementHour" :name="estimatedAchievementHour" type="text" placeholder="例：6" value="" class="">
          <span class="u-fs-08"> 時間</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import { ref } from "vue";
  export default {
    props: ['childStepForm', 'index', 'childStepFormCount'],
    data: function() {
      return {
        i: this.index + 1,
      }
    },
    computed: {
      title: function(){
        return 'child_step' + this.i + '_title'
      },
      description: function(){
        return 'child_step' + this.i + '_description'
      },
      estimatedAchievementDay: function(){
        return 'child_step' + this.i + '_estimated_achievement_day'
      },
      estimatedAchievementHour: function(){
        return 'child_step' + this.i + '_estimated_achievement_hour'
      },
    },
    methods: {
      deleteChildStepForm: function() {
        this.$emit('deleteChildStepForm', this.index);
      },
    }
  }
</script>
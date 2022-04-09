<template>
  <!-- <form @submit.prevent="onSubmit" class="c-form"> -->
  <form action="/steps" method="POST" class="c-form">
    <input type="hidden" name="_token" :value="csrf">

    <fieldset class="c-form__field">
      <label for="title" class="c-form__field__name">タイトル<span class="c-form__field--required">（必須）</span></label>
      <!-- <div class="c-form__invalid-feedback"
        v-if="form.errors.has('title')"
        v-text="form.errors.first('title')"></div> -->

      <div class="c-form__invalid-feedback" v-for="value in error.title" :key="value">
        {{ value }}
      </div>

      <!-- <strong class="error" v-for="value in error.title" :key="value">{{ value }}</strong> -->

      <!-- <input id="title" type="text" name="title" v-model="form.title" :class="{ 'is-invalid': form.errors.has('title') }" placeholder="例：最短でWebエンジニアになる手順を公開！"> -->
      <input id="title" type="text" name="title" v-model="title" :class="{ 'is-invalid': (error.title) }" placeholder="例：最短でWebエンジニアになる手順を公開！">
    </fieldset>
    
    
    <fieldset class="c-form__field">
      <label for="description" class="c-form__field__name">概要<span class="c-form__field--required">（必須）</span></label>
      <!-- <div class="c-form__invalid-feedback"
        v-if="form.errors.has('description')"
        v-text="form.errors.first('description')"></div> -->

      <!-- <textarea name="description" id="description" v-model="form.description" class="c-form__field__textarea" :class="{ 'is-invalid': form.errors.has('description') }" style="min-height: 8rem;" placeholder="学びのステップに関するサマリー。対象者や難易度、得られるものについて。"></textarea> -->

      <div class="c-form__invalid-feedback" v-for="value in error.description" :key="value">
        {{ value }}
      </div>

      <textarea name="description" id="description" v-model="description" class="c-form__field__textarea" :class="{ 'is-invalid': (error.description) }" style="min-height: 8rem;" placeholder="学びのステップに関するサマリー。対象者や難易度、得られるものについて。"></textarea>
    </fieldset>

    <fieldset class="c-form__field">
      <label for="category" class="c-form__field__name">カテゴリー<span class="c-form__field--required">（必須）</span></label>
      <!-- <div class="c-form__invalid-feedback"
        v-if="form.errors.has('category_id')"
        v-text="form.errors.first('category_id')"></div> -->

      <div class="c-form__invalid-feedback" v-for="value in error.category_id" :key="value">
        {{ value }}
      </div>
        
      <!-- <div class="c-selectbox type01" :class="{ 'is-invalid': form.errors.has('category_id') }"> -->
      <div class="c-selectbox type01" :class="{ 'is-invalid': (error.category_id) }">
        <select name="category_id" id="category" v-model="category_id">

          <option v-for="category in categories" :key="category.id" :value="category.id">
          <!-- <option v-for="category in categories" :key="category.id" :value="category.id" v-bind="selectedCategory"> -->
            {{ category.name }}
          </option>

        </select>
      </div>
    </fieldset>

    <div class="c-box">
      <div>　＜ ステップ入力について ＞</div>
      <ul>
        <li>「＋」ボタンでステップを増やすことができます</li>
        <li>ステップは番号を飛ばさず詰めてご入力ください</li>
        <li>「＋」ボタンで入力フォームを表示しているものは入力必須となります</li>
        <li>ステップ右横の「×」でステップを削除できます</li>
      </ul>
    </div>
    
    <ChildStepForms :oldInputs="oldInputs" :errors="errors"></ChildStepForms>
    <!-- <ChildStepForms :oldInputs='oldInputs' :form='this.form'></ChildStepForms> -->

    <button type="submit" class="c-button c-button--blue c-button--width100">投稿する</button>
  </form>
</template>

<script>
  import { ref } from "vue";
  import ChildStepForms from './ChildStepForms.vue'

  export default {
    components: {
      ChildStepForms,
    },
    props: ['csrf', 'categories', 'oldInputs', 'errors'],
    data: function() {
      return {
        title: this.oldInputs.title,
        description: this.oldInputs.description,
        category_id: this.oldInputs.category_id,
        
        error:{
          title: this.errors.title,
          description: this.errors.description,
          category_id: this.errors.category_id,
        }
        // form: new Form({
        //   title: '',
        //   description: '',
        //   category_id: '',
        //   child_step1_title: '',
        //   child_step1_description: '',
        //   child_step1_estimated_achievement_day: '',
        //   child_step1_estimated_achievement_hour: '',
        //   child_step2_title: '',
        //   child_step2_description: '',
        //   child_step2_estimated_achievement_day: '',
        //   child_step2_estimated_achievement_hour: '',
        // }),
      }
    },
    computed: {
      // selectedCategory() {
      //   return (this.oldInputs['category_id'] === this.category.id)
      //     ? { selected: true }
      //     : { selected: false }
      // }
    },
    created() {
      console.log('created: StepForm')
      console.log('this.errors: ')
      console.log(this.errors)

    },
    methods: {
      // onSubmit() {
      //   this.form['post']('/steps')
      // },
    }
  }
</script>
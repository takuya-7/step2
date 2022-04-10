<template>
  <form  method="POST" action="/login" class="c-form c-form--small">
    <input type="hidden" name="_token" :value="csrf">
    <h1 class="c-form__title">ログイン</h1>
    <fieldset  class="c-form__field">
      <label for="email">メールアドレス</label>
      <input
        id="email"
        type="email"
        name="email"
        v-model="email"
        :class="{ 'is-invalid': (error.email) }"
        autofocus
      >
      <div class="c-form__invalid-feedback" v-for="value in error.email" :key="value">
        {{ value }}
      </div>
    </fieldset>

    <fieldset class="c-form__field">
        <label for="password">パスワード</label>
        <input
          id="password"
          type="password"
          name="password"
          v-model="password"
          :class="{ 'is-invalid': (error.password) }"
          autocomplete="current-password"
        >
        <div class="c-form__invalid-feedback" v-for="value in error.password" :key="value">
          {{ value }}
        </div>
    </fieldset>

    <div class="u-mb-3">
      <label for="remember">
        <input
          type="checkbox"
          id="remember"
          name="remember"
        >
        <span>ログインしたままにする</span>
      </label>
    </div>

    <div v-if="passwordRequestUrl" class="u-mb-3">
      パスワードをお忘れの方は<a :href="passwordRequestUrl">こちら</a>
    </div>

    <div class="u-mb-4">
      <button type="submit" class="c-button c-button--blue c-button--width100">ログイン</button>
    </div>

    <div>
        ユーザー登録がまだの方は<a href="/register">こちら</a>
    </div>
  </form>
</template>

<script>
  import ChildStepForms from './ChildStepForms.vue'
  export default {
    components: {
    },
    props: [
      'csrf',
      'oldInputs',
      'errors',
      'passwordRequestUrl',
    ],
    data: function() {
      return {
        email: this.oldInputs.email,
        error:{
          email: this.errors.email,
          password: this.errors.password,
        }
      }
    },
  }
</script>
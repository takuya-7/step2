<template>

  <form  method="POST" action="/register" class="c-form c-form--small">
    <input type="hidden" name="_token" :value="csrf">
    <h2 class="c-form__title">ユーザー登録</h2>

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

    <fieldset  class="c-form__field">
        <label for="password">パスワード</label>
        <input
          id="password"
          type="password"
          name="password"
          v-model="password"
          :class="{ 'is-invalid': (error.password) }"
          autocomplete="new-password"
        >
        <div class="c-form__invalid-feedback" v-for="value in error.password" :key="value">
          {{ value }}
        </div>
    </fieldset>

    <fieldset  class="c-form__field">
        <label for="password_confirmation">パスワード（再入力）</label>
        <input
          id="password_confirmation"
          type="password"
          name="password_confirmation"
          v-model="password_confirmation"
          autocomplete="new-password"
        >
    </fieldset>

    <div class="u-mb-4">
        既に登録している方は<a href="/login">こちら</a>
    </div>

    <div>
        <input type="submit" class="c-button c-button--green c-button--width100" value="登録する">
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
<template>
  <div>
    <template v-if="auth_check">
      <form v-if="challenge" :action="`/steps/unchallenge/${ this.step.id }`" method="post">
        <input type="hidden" name="_token" :value="csrf">
        <button class="c-button c-button--gray c-button--width100 js-unchallenge" onclick='return confirm("チャレンジを取り消しますか？");'>チャレンジを取り消す</button>
      </form>
      <form v-else :action="`/steps/challenge/${ this.step.id }`" method="post">
        <input type="hidden" name="_token" :value="csrf">
        <button class="c-button c-button--blue c-button--width100">チャレンジする</button>
      </form>
    </template>
    <template v-else>
      <a href="/login" class="c-button c-button--blue c-button--width100">ログインしてチャレンジする</a>
    </template>
  </div>
</template>

<script>
  export default {
    props: ['auth_check', 'challenge', 'step', 'csrf'],
  }
</script>
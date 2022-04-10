<template>
  <div>
    <template v-if="auth_check && challenge">
      <!-- まだクリアしておらず、チャレンジ中の子ステップと表示する子ステップが同じだった場合 -->
      <form v-if="challenge.current_step === child_step[0].order" :action="`/steps/clear/${step.id}`" method="post">
        <input type="hidden" name="_token" :value="csrf">
        <button class="c-button c-button--blue c-button--width100" onclick='return confirm("クリアしましたか？");'>クリア</button>
      </form>
      <!-- 表示している子ステップがまだクリアしていない子ステップよりも先のものだった場合 -->
      <a v-else-if="challenge.current_step < child_step[0].order" :href="`/steps/${ step.id }/${ challenge.current_step }`" class="c-button c-button--blue c-button--width100">
        チャレンジ中のステップへ
      </a>
      <!-- クリア済みの場合 -->
      <button v-else class="c-button c-button--gray c-button--width100" style="cursor: default;">
        クリア済み
      </button>
    </template>
  </div>
</template>

<script>
  export default {
    props: ['auth_check', 'challenge', 'step', 'child_step', 'csrf'],
  }
</script>
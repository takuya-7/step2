<template>
  <section class="u-mb-5">
    <h2>チャレンジ中STEP</h2>
    <div>
      <ul v-if="challengeSteps[0].id" class="p-mypage-step-list">
        <li
          v-for="(challengeStep) in this.challengeSteps"
          :key="challengeStep"
          class="p-mypage-step-list__item"
        >
          <a
            :href="`/steps/${ challengeStep.id }/${ (challengeStep.challenges[0].clear_flg === 1) ? Object.keys(challengeStep.child_steps).length : challengeStep.challenges[0].current_step }`"
            class="p-mypage-step-list__title"
          >
            {{ challengeStep.title }}
          </a>
          <span class="p-mypage-step-list__progress">
            {{ challengeStep.challenges[0].current_step-1 }} / {{ Object.keys(challengeStep.child_steps).length }}
          </span>
        </li>
      </ul>
      <div v-else>
        <p class="u-mb-3">チャレンジしているSTEPはありません。</p>
        <a href="/steps">チャレンジするSTEPを探す</a>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    props: ['challengeSteps', 'csrf'],
  }
</script>
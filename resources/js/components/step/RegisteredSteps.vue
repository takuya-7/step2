<template>
  <section class="u-mb-5">
    <h2>投稿済みSTEP</h2>
    <div>
      <ul v-if="registeredSteps" class="p-mypage-step-list">
        <li
          v-for="(registeredStep) in registeredSteps"
          :key="registeredStep"
          class="p-mypage-step-list__item"
        >
          <a :href="`/steps/${ registeredStep.id }`" class="p-mypage-step-list__title">
            {{ registeredStep.title }}
          </a>
          <a :href="`/steps/${ registeredStep.id }/edit`" class="p-mypage-step-list__button">更新</a>
          <form :action="`/steps/${ registeredStep.id }/delete`" method="post">
            <input type="hidden" name="_token" :value="csrf">
            <button class="p-mypage-step-list__button p-mypage-step-list__button--gray" onclick='return confirm("削除しますか？");'>削除</button>
          </form>
        </li>
      </ul>
      <div v-else>
        <p class="u-mb-3">投稿したSTEPはありません。</p>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    props: ['registeredSteps', 'csrf'],
  }
</script>
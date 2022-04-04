<template>
  <div>
    <h1>{{ step.title }}</h1>
    <div class="u-text-gray u-mb-4">
      <time datetime="{{ created_at }}">投稿：{{ created_at }}　</time>
      <time datetime="{{ updated_at }}">更新：{{ updated_at }}</time>
    </div>

    <div class="u-mb-4">
      <div class="u-mb-2">カテゴリー：{{ category }}</div>
      <div class="u-mb-3">所要時間：{{ estimated_achievement_day }}日 {{ estimated_achievement_hour }}時間</div>
      <TwitterButton :text='step.title'></TwitterButton>
    </div>

    <h2>概要</h2>
    <p>{{ step.description }}</p>
  </div>
</template>

<script>
  import TwitterButton from '../button/TwitterButton.vue'
  export default {
    components: {
      TwitterButton,
    },
    props: ['step', 'created_at', 'updated_at', 'category', 'estimated_achievement_day', 'estimated_achievement_hour'],
  }
</script>
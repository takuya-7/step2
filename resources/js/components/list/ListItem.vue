<template>
  <a :href="stepURL" class="c-card c-card--link c-card--shadow">
    <div class="c-card__header">
      <h2 class="c-card__title u-fw-bold">{{ step.title }}</h2>
      <span class="c-card__header__item">カテゴリ：{{  categories[step.category_id - 1]['name'] }}</span>
      <span class="c-card__header__item">所要時間：{{ step.estimated_achievement_day }}日 {{ step.estimated_achievement_hour }}時間</span>
    </div>

    <div class="c-card__content">
      <p class="c-card__content__p">{{ step.description }}</p>
    </div>
  </a>
</template>

<script>
  import { ref } from "vue";
  export default {
    props: ['step', 'categories'],

    computed: {
      stepURL: function(){
        return '/steps/' + this.step.id
      }
    },

  }
</script>
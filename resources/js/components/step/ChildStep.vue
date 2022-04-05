<template>
  <div>
    <h2>STEP{{ child_step[0].order }}：{{ child_step[0].title }}</h2>
    <div class="u-mb-3">
      所要時間：{{ child_step[0].estimated_achievement_day }}日 {{ child_step[0].estimated_achievement_hour }}時間
    </div>
    <p>{{ child_step[0].description }}</p>
  </div>
</template>

<script>
  export default {
    props: ['child_step', ],
  }
</script>
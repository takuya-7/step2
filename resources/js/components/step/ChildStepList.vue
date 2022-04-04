<template>
  <div>
    <h2>STEP</h2>
    <div class="u-mb-5">
      <ul class="p-child-step-list">
        <li v-for="child_step in child_steps" :key="child_step" class="p-child-step-list__item">
          <!-- チャレンジしている場合 -->
          <template v-if="challenge">
            <!-- 子ステップ到達まではリンクを無効にする -->
            <a v-if="challenge.current_step >= child_step.order" :href="`/steps/${ step.id }/${ child_step.order }`">
              STEP{{ child_step.order }}：{{ child_step.title }}
            </a>
            <a v-else style="cursor: default">
              STEP{{ child_step.order }}：{{ child_step.title }}
            </a>
          </template>
          <template v-else>
            <a style="cursor: default">
              STEP{{ child_step.order }}：{{ child_step.title }}
            </a>
          </template>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['step', 'child_steps', 'challenge'],
  }
</script>
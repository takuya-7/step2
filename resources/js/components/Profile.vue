<template>
  <div>
    <h2>著者プロフィール</h2>
    <div class="p-step-profile">
      <div v-if="author.profile_img" class="p-step-profile__left">
        <img :src="imgSrc" alt="" class="p-step-profile__left__image">
      </div>
      <div>
        <div v-if="author.name" class="p-step-profile__name">
          {{ author.name }}
        </div>
        <div v-else class="p-step-profile__name">
          匿名
        </div>

        <div class="p-step-profile__profile">
          {{ author.profile }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['author'],
    computed: {
      imgSrc: function(){
        return '/storage/uploads/' + this.author.profile_img
      }
    },
  }
</script>
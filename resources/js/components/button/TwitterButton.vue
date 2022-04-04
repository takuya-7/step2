<template>
    <div>
      <a :href='twitterUrl' class="c-button c-button--blue" target="_blank" rel="noopener noreferrer">Twitterでシェア</a>
    </div>
</template>

<script>
  export default {
    props: ['text'],
    data: function() {
      return {
        twitterUrl: 'https://twitter.com/intent/tweet?url=' + location.href + '&text=' + this.text
      }
    },
  }
</script>
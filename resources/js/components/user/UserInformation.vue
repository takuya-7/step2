<template>
  <div>
    <h2>ユーザー情報</h2>
    <div class="c-menus-container u-mb-5">
      <ul class="u-bg-white">
        <li><a href="/profile/edit">プロフィール編集</a></li>
        <li><a :href="this.passwordUpdateUrl">パスワード再設定</a></li>
        <li>
          <form method="POST" action="/logout">
            <input type="hidden" name="_token" :value="csrf">
            <a
              href="/logout"
              onclick="event.preventDefault();
                this.closest('form').submit();"
            >
              ログアウト
            </a>
          </form>  
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['csrf', 'passwordUpdateUrl',],
  }
</script>
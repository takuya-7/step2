<!-- レイアウト読み込み -->
@extends('layouts.layout')

<!-- title設定 -->
@section('title', 'プロフィール編集')

@section('content')
<div class="l-content-wrapper">
  <div class="l-container">

    <div class="l-content">
      <div class="l-inner-container">
        
        <form method="post" action="" class="c-form">
          <h2>プロフィール編集</h2>

          @csrf

          <fieldset  class="c-form__field">
            <label for="icon">アイコン画像</label>
            <input id="icon" type="" name="icon" required autocomplete="">
          </fieldset>

          <fieldset  class="c-form__field">
            <label for="name">ニックネーム</label>
            <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
          </fieldset>

          <fieldset  class="c-form__field">
            <label for="email">メールアドレス</label>
            <input id="email" type="email" name="email" :value="old('email')" required>
          </fieldset>
          
          <fieldset  class="c-form__field">
            <label for="profile">自己紹介文</label>
            <input id="profile" type="text" name="profile" :value="old('profile')">
          </fieldset>

          <div class="u-mb-3">
            <button type="submit" class="c-button c-button--blue c-button--width100">登録する</button>
          </div>
          
        </form>
      </div>
    </div>
    
  </div>
</div>
@endsection
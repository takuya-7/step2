<!-- レイアウト読み込み -->
@extends('layouts.layout')

<!-- title設定 -->
@section('title', 'プロフィール編集')

@section('content')
<div class="l-content-wrapper">
  <div class="l-container">

    <div class="l-content">
      <div class="l-inner-container">
        
        <form method="POST" action="{{ route('profile.update') }}" class="c-form" enctype="multipart/form-data">
          @csrf
          @method('patch')
          <h2>プロフィール編集</h2>

          <fieldset  class="c-form__field">
            <label for="email">メールアドレス</label>
            <input id="email" type="email" name="email" value="{{ old('email', isset($user[0]['email']) ? $user[0]['email'] : '') }}" required>

            @error('email')
              <span class="c-form__invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </fieldset>
          
          <fieldset  class="c-form__field">
            <label for="profile">自己紹介文</label>
            <textarea name="profile" id="profile" class="c-form__field__textarea" style="min-height: 8rem;" placeholder="">{{ old('profile', isset($user[0]['profile']) ? $user[0]['profile'] : '') }}</textarea>

            @error('profile')
              <span class="c-form__invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </fieldset>

          <fieldset  class="c-form__field">
            <label for="icon">アイコン画像</label>
            @if($user[0]['profile_img'])
              <div>
                <div>現在のアイコン</div>
                <img src="{{ asset('storage/uploads/'.$user[0]['profile_img'])}}" alt="" class="c-form__field__icon">
              </div>
            @endif
            <input type="file" name="profile_img">
          </fieldset>
          
          <div class="u-mb-3">
            <button type="submit" class="c-button c-button--blue c-button--width100">更新する</button>
          </div>
          
        </form>
      </div>
    </div>
    
  </div>
</div>
@endsection
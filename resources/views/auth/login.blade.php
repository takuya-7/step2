<!-- レイアウト読み込み -->
@extends('layouts.layout')

<!-- title設定 -->
@section('title', 'ログイン')

@section('content')
    <div class="l-content-wrapper">
        <div class="l-container">
            <form  method="POST" action="{{ route('login') }}"class="c-form c-form--small">
                @csrf
                <h1 class="c-form__title">ログイン</h1>

                <fieldset  class="c-form__field">
                    <label for="email">メールアドレス</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

                    @error('email')
                        <span class="c-form__invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </fieldset>

                <fieldset class="c-form__field">
                    <label for="password">パスワード</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="c-form__invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </fieldset>

                <div class="u-mb-3">
                    <label for="remember">
                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span>ログインしたままにする</span>
                    </label>
                </div>

                <div class="u-mb-3">
                    @if (Route::has('password.request'))
                        パスワードをお忘れの方は<a href="{{ route('password.request') }}">こちら</a>
                    @endif
                </div>

                <div class="u-mb-4">
                <button type="submit" class="c-button c-button--blue c-button--width100">ログイン</button>
                </div>

                <div>
                    ユーザー登録がまだの方は<a href="{{ route('register') }}">こちら</a>
                </div>

            </form>
        </div>
    </div>
@endsection
<!-- レイアウト読み込み -->
@extends('layouts.layout')

<!-- title設定 -->
@section('title', 'ユーザー登録')

@section('content')
    <div class="l-content-wrapper">
        <div class="l-container">
            <form  method="POST" action="{{ route('register') }}" class="c-form c-form--small">
                @csrf
                <h2 class="c-form__title">ユーザー登録</h2>

                <fieldset  class="c-form__field">
                    <label for="email">メールアドレス</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

                    @error('email')
                        <span class="c-form__invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </fieldset>

                <fieldset  class="c-form__field">
                    <label for="password">パスワード</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="c-form__invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </fieldset>

                <fieldset  class="c-form__field">
                    <label for="password_confirmation">パスワード（再入力）</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                </fieldset>

                <div class="u-mb-4">
                    既に登録している方は<a href="{{ route('login') }}">こちら</a>
                </div>

                <div>
                    <input type="submit" class="c-button c-button--green c-button--width100" value="登録する">
                </div>

            </form>
        </div>
    </div>
@endsection
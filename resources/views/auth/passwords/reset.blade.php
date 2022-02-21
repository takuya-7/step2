<!-- レイアウト読み込み -->
@extends('layouts.layout')

<!-- title設定 -->
@section('title', 'パスワード再設定')

@section('content')
<div class="l-content-wrapper">
    <div class="l-container">
        <form  method="POST" action="{{ route('password.update') }}"class="c-form c-form--small">
            @csrf
            <h1 class="c-form__title u-mb-5">パスワード再設定</h1>

            <input type="hidden" name="token" value="{{ $token }}">

            <fieldset class="c-form__field">
                <label for="email">メールアドレス</label>
                <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="c-form__invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </fieldset>

            <fieldset class="c-form__field">
                <label for="password">パスワード</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="c-form__invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </fieldset>

            <fieldset class="c-form__field">
                <label for="password-confirm">パスワード（再入力）</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </fieldset>

            <div class="u-mb-4">
                <button type="submit" class="c-button c-button--blue c-button--width100">パスワードを再設定する</button>
            </div>
        </form>
    </div>
</div>
@endsection

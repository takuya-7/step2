<!-- レイアウト読み込み -->
@extends('layouts.layout')

<!-- title設定 -->
@section('title', 'パスワード再設定')

@section('content')
    <div class="l-content-wrapper">
        <div class="l-container">
            <form  method="POST" action="{{ route('password.email') }}"class="c-form c-form--small">
                @csrf
                <h1 class="c-form__title u-mb-5">パスワード再設定</h1>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="u-mb-5">
                    <p>あなたが登録したメールアドレスにパスワード再設定のリンクを送信いたします。</p>
                </div>

                <fieldset  class="c-form__field">
                    <label for="email">メールアドレス</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="c-form__invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </fieldset>

                <div class="u-mb-4">
                    <button type="submit" class="c-button c-button--blue c-button--width100">再設定リンクを送信する</button>
                </div>

            </form>
        </div>
    </div>
@endsection
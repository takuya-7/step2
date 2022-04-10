<!-- レイアウト読み込み -->
@extends('layouts.layout')

<!-- title設定 -->
@section('title', 'ログイン')

@section('content')
    <div class="l-content-wrapper">
        <div class="l-container" id="app">
            <login-form
                :csrf="{{json_encode(csrf_token())}}"
                :old-inputs="{{ json_encode(Session::getOldInput()) }}"
                :errors="{{ $errors }}"
                password-request-url="{{ route('password.request') }}"
            ></login-form>
        </div>
    </div>
@endsection
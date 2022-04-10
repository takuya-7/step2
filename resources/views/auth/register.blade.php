<!-- レイアウト読み込み -->
@extends('layouts.layout')
<!-- title設定 -->
@section('title', 'ユーザー登録')

@section('content')
    <div class="l-content-wrapper">
        <div class="l-container" id="app">
            <register-form
                :csrf="{{json_encode(csrf_token())}}"
                :old-inputs="{{ json_encode(Session::getOldInput()) }}"
                :errors="{{ $errors }}"
            ></register-form>
        </div>
    </div>
@endsection
<!-- レイアウト読み込み -->
@extends('layouts.layout')

<!-- title設定 -->
@section('title', 'サイトマップ')

@section('content')
    <div class="l-content-wrapper">
        <div class="l-container">
          <div class="l-content">
            <div class="l-inner-container">
              <h2>サイトマップ</h2>
              <ul>
                <li><a href="/">HOME</a></li>
                <li><a href="{{ route('register') }}">ユーザー登録</a></li>
                <li><a href="{{ route('login') }}">ログイン</a></li>
                <li><a href="{{ route('steps') }}">STEP一覧</a></li>
              </ul>
            </div>
          </div>
        </div>
    </div>
@endsection
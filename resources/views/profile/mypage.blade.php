<!-- レイアウト読み込み -->
@extends('layouts.layout')

<!-- title設定 -->
@section('title', 'マイページ')

@section('content')
<div class="l-content-wrapper">
  <div class="l-container">
    <div class="row">
      <h1 class="c-page-title">マイページ</h1>

      <div class="profile-container col-md-8">

        <a href="{{ route('steps.new') }}">STEP投稿</a>
        
        <h2>登録済みSTEP</h2>
        <ul>
          <li>STEP1</li>
          <li>STEP2</li>
        </ul>

        <h2>チャレンジ中STEP</h2>
        <ul>
          <li>STEP1</li>
          <li>STEP2</li>
        </ul>
      </div>

      <div class="menus-container col-md-4">
        <h2>個人設定</h2>
        <ul class="u-bg-white">
          <li><a href="{{ route('profile.edit') }}">プロフィール編集</a></li>
          <li><a href="{{ route('profile.password') }}">パスワード変更</a></li>
        </ul>
        <h2>ユーザー情報</h2>
        <ul class="u-bg-white">
          <li>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                              this.closest('form').submit();">
                ログアウト
              </a>
            </form>  
          </li>
          <li><a href="withdraw.php">退会</a></li>
        </ul>
      </div>

    </div>
  </div>
</div>
@endsection
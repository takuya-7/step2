<!-- レイアウト読み込み -->
@extends('layouts.layout')

<!-- title設定 -->
@section('title', 'マイページ')

@section('content')
<div class="l-content-wrapper">
  <div class="l-container">
    <div class="p-mypage-content" id="app">
      <h1>マイページ</h1>

      <div class="u-mb-5">
        <blue-width100-button url="{{ route('steps.new') }}" text="STEPを投稿する"></blue-width100-button>
      </div>

      <registered-steps
        :registered-steps="{{ $registered_steps }}"
        :csrf="{{ json_encode(csrf_token()) }}"
      ></registered-steps>
      
      <challenge-steps
        :challenge-steps="{{ json_encode($challenge_steps) }}"
        :csrf="{{ json_encode(csrf_token()) }}"
      ></challenge-steps>

      <user-information
        :csrf="{{ json_encode(csrf_token()) }}"
        password-update-url="{{ route('password.update') }}"
      ></user-information>

      <a href="{{ route('steps') }}" class="c-button c-button--gray c-button--radius100">STEP一覧へ</a>
    </div>
  </div>
</div>
@endsection
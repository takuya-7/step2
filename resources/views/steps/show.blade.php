<!-- レイアウト読み込み -->
@extends('layouts.layout')

<!-- title設定 -->
@section('title', 'STEP詳細')

@section('content')
    <div class="l-content-wrapper">
        <div class="l-container">
          <div class="l-content">
            <div class="l-inner-container">
              <div id="app" class="p-step-content">

                <parent-step :step="{{ $step }}" created_at="{{ $created_at }}" updated_at="{{ $updated_at }}" category="{{ $category }}" estimated_achievement_day="{{ $estimated_achievement_day }}" estimated_achievement_hour="{{ $estimated_achievement_hour }}"></parent-step>

                <child-step-list :step="{{ $step }}" :child_steps="{{ $child_steps }}" :challenge="{{ $challenge }}"></child-step-list>

                <!-- チャレンジボタン -->
                <div>
                  <!-- ログインチェック -->
                  @if (Auth::check())
                    <!-- チャレンジしている場合 -->
                    @if($challenge)
                      <form action="{{ route('unchallenge', $step) }}" method="post">
                        @csrf
                        <button class="c-button c-button--gray c-button--width100 js-unchallenge" onclick='return confirm("チャレンジを取り消しますか？");'>チャレンジを取り消す</button>
                      </form>
                    @else
                    <!-- チャレンジボタンを表示 -->
                      <form action="{{ route('challenge', $step) }}" method="post">
                        @csrf
                        <button class="c-button c-button--blue c-button--width100">チャレンジする</button>
                      </form>
                    @endif
                  @else
                    <a href="{{ route('login') }}" class="c-button c-button--blue c-button--width100">ログインしてチャレンジする</a>
                  @endif
                </div>

                <!-- プロフィール -->
                <profile :author="{{ $author }}"></profile>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
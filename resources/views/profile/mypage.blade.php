<!-- レイアウト読み込み -->
@extends('layouts.layout')

<!-- title設定 -->
@section('title', 'マイページ')

@section('content')
<div class="l-content-wrapper">
  <div class="l-container">
    <div class="p-mypage-content" id="app">
      <h1>マイページ</h1>

      <div>
        <div class="u-mb-5">
          <blue-width100-button url="{{ route('steps.new') }}" text="STEPを投稿する"></blue-width100-button>
        </div>

        <registered-steps
          :registered-steps="{{ $registered_steps }}"
          :csrf="{{json_encode(csrf_token())}}"
        ></registered-steps>

        <section class="u-mb-5">
          <h2>チャレンジ中STEP</h2>
          <div>
            @if(!empty($challenge_steps[0]->id))
            <ul class="p-mypage-step-list">
              @foreach($challenge_steps as $challenge_step)
                <li class="p-mypage-step-list__item">
                  <a href="/steps/{{ $challenge_step->id }}/{{ ($challenge_step['challenges'][0]['clear_flg'] === 1) ? count($challenge_step['childSteps']) : $challenge_step['challenges'][0]['current_step'] }}"  class="p-mypage-step-list__title">
                    {{ $challenge_step['title'] }}
                  </a>
                  <span class="p-mypage-step-list__progress">
                    {{ $challenge_step['challenges'][0]['current_step']-1 }} / {{ count($challenge_step['childSteps']) }}
                  </span>
                </li>
              @endforeach
              </ul>
            @else
              <div>
                <p class="u-mb-3">チャレンジしているSTEPはありません。</p>
                <a href="{{ route('steps') }}">チャレンジするSTEPを探す</a>
              </div>
            @endif
          </div>
        </section>
      </div>

      <h2>ユーザー情報</h2>
      <div class="c-menus-container u-mb-5">
        <ul class="u-bg-white">
          <li><a href="{{ route('profile.edit') }}">プロフィール編集</a></li>
          <li><a href="{{ route('password.update') }}">パスワード再設定</a></li>
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
        </ul>
      </div>

      <a href="{{ route('steps') }}" class="c-button c-button--gray c-button--radius100">STEP一覧へ</a>

    </div>
  </div>
</div>
@endsection
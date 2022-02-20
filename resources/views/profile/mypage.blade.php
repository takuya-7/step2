<!-- レイアウト読み込み -->
@extends('layouts.layout')

<!-- title設定 -->
@section('title', 'マイページ')

@section('content')
<div class="l-content-wrapper">
  <div class="l-container">
    <div class="">
      <h1 class="c-page-title u-mb-5">マイページ</h1>

      <div class="">

        <div class="u-mb-5">
          <a href="{{ route('steps.new') }}" class="c-button c-button--blue c-button--width100">STEPを投稿する</a>
        </div>
        
        <section class="u-mb-4">
          <h2>登録済みSTEP</h2>
          <ul>
            @foreach($registered_steps as $registered_step)
              <li class="">
                <a href="/steps/{{ $registered_step->id }}">
                  {{ $registered_step['title'] }}
                </a>
                （<a href="/steps/{{ $registered_step->id }}/edit">更新する</a>）
              </li>
            @endforeach
          </ul>
        </section>

        <section class="u-mb-4">
          <h2>チャレンジ中STEP</h2>
          <div>
            @if(!empty($challenge_steps[0]->id))
            <ul>
              @foreach($challenge_steps as $challenge_step)
                <li class="">
                  <a href="/steps/{{ $challenge_step->id }}/{{ ($challenge_step['challenges'][0]['current_step'] > count($challenge_step['childSteps'])) ? count($challenge_step['childSteps']) : $challenge_step['challenges'][0]['current_step'] }}">
                    {{ $challenge_step['title'] }}
                  </a>
                  （ {{ $challenge_step['challenges'][0]['current_step']-1 }} / {{ count($challenge_step['childSteps']) }} STEP完了 ）
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

      <div class="c-menus-container">
        <h2>ユーザー情報</h2>
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

    </div>
  </div>
</div>
@endsection
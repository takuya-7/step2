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
                <h1>{{ $step->title }}</h2>

                <div class="u-text-gray u-mb-4">
                  <time datetime="{{ $created_at }}">投稿：{{ $created_at }}　</time>
                  <time datetime="{{ $updated_at }}">更新：{{ $updated_at }}</time>
                </div>
  
                <div class="u-mb-4">
                  <div class="u-mb-2">カテゴリー：{{ $category }}</div>
                  <div class="u-mb-3">所要時間：{{ $step->estimated_achievement_day }}日 {{ $step->estimated_achievement_hour }}時間</div>
                  <div><a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $step->title }}" class="c-button c-button--blue" target="_blank" rel="noopener noreferrer">Twitterでシェア</a></div>
                </div>
  
                <h2>概要</h2>
                <p>{{ $step->description }}</p>

                <h2>STEP</h2>
                <div class="u-mb-5">
                  <ul class="p-child-step-list">
                    @foreach($child_steps as $child_step)
                      <li class="p-child-step-list__item">
                        <a href="/steps/{{ $step->id }}/{{ $child_step['order'] }}">
                          STEP{{ $child_step['order'] }}：{{ $child_step['title'] }}
                        </a>
                      </li>
                    @endforeach
                  </ul>
                </div>

                <!-- チャレンジボタン -->
                <div>
                  <!-- ログインチェック -->
                  @if (Auth::check())
                    <!-- チャレンジしている場合 -->
                    @if($challenge)
                      <a href="{{ route('unchallenge', $step) }}" class="c-button c-button--gray c-button--width100">
                        チャレンジを取り消す
                      </a>
                    @else
                    <!-- チャレンジボタンを表示 -->
                      <a href="{{ route('challenge', $step) }}" class="c-button c-button--blue c-button--width100">
                        チャレンジする
                      </a>
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
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
                  <div class="u-mb-3">所要時間：{{ $estimated_achievement_day }}日 {{ $estimated_achievement_hour }}時間</div>
                  <div><a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $step->title }}" class="c-button c-button--blue" target="_blank" rel="noopener noreferrer">Twitterでシェア</a></div>
                </div>
  
                <h2>概要</h2>
                <p>{{ $step->description }}</p>

                <h2>STEP</h2>
                <div class="u-mb-5">
                  <ul class="p-child-step-list">
                    @foreach($child_steps as $child_step)
                      <li class="p-child-step-list__item">
                        <!-- チャレンジしている場合 -->
                        @if($challenge)
                          <!-- 子ステップ到達まではリンクを無効にする -->
                          @if($challenge->current_step >= $child_step->order)
                            <a href="/steps/{{ $step->id }}/{{ $child_step->order }}">
                              STEP{{ $child_step->order }}：{{ $child_step->title }}
                            </a>
                          @else
                            <a style="cursor: default">
                              STEP{{ $child_step->order }}：{{ $child_step->title }}
                            </a>
                          @endif
                        @else
                          <a style="cursor: default">
                            STEP{{ $child_step->order }}：{{ $child_step->title }}
                          </a>
                        @endif
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
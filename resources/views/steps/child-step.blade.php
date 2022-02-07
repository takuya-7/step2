<!-- レイアウト読み込み -->
@extends('layouts.layout')

<!-- title設定 -->
@section('title', '小STEP詳細')

@section('content')
    <div class="l-content-wrapper">
        <div class="l-container">
          <div class="l-content">
            <div class="l-inner-container">

              <div class="p-step-content">
                <h1>{{ $step->title }}</h2>

                <div class="u-text-gray u-mb-4">
                  <time datetime="{{ $created_at }}">投稿：{{ $created_at }}　</time>
                  <time datetime="{{ $updated_at }}">更新：{{ $updated_at }}</time>
                </div>

                <div class="u-mb-4">
                  <div class="u-mb-2">カテゴリー：{{ $category }}</div>
                  <div>所要時間：{{ $step->estimated_achievement_day }}日 {{ $step->estimated_achievement_hour }}時間</div>
                </div>

                <h2>概要</h2>
                <p>{{ $step->description }}</p>

                <h2>STEP{{ $child_step[0]['order'] }}：{{ $child_step[0]['title'] }}</h2>
                <p>{{ $child_step[0]['description'] }}</p>

                <form method="POST" action="{{ route('steps.registChallenge') }}">
                  <input type="hidden" name="id" value="{{ $step->id }}">
                  <button type="submit" class="c-button c-button--blue c-button--width100">このSTEPにチャレンジする</button>
                </form>
                
              </div>
              
            </div>
          </div>
        </div>
    </div>
@endsection
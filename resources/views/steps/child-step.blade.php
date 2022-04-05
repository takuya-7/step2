@extends('layouts.layout')
@section('title', '小STEP詳細')

@section('content')
    <div class="l-content-wrapper">
        <div class="l-container">
          <div class="l-content">
            <div class="l-inner-container">
              <div id="app" class="p-step-content">

                <parent-step :step="{{ $step }}" created_at="{{ $created_at }}" updated_at="{{ $updated_at }}" category="{{ $category }}" estimated_achievement_day="{{ $step->estimated_achievement_day }}" estimated_achievement_hour="{{ $step->estimated_achievement_hour }}"></parent-step>

                <child-step :child_step="{{ $child_step }}"></child-step>

                <!-- クリアボタン -->
                <div>
                  <!-- ログインチェック -->
                  @if (Auth::check())
                    <!-- ユーザーがチャレンジしている場合 -->
                    @if($challenge)
                      <!-- まだクリアしておらず、チャレンジ中の子ステップと表示する子ステップが同じだった場合 -->
                      @if($challenge['current_step'] === $child_step[0]['order'])
                        <form action="{{ route('clear', $step) }}" method="post">
                          @csrf
                          <button class="c-button c-button--blue c-button--width100" onclick='return confirm("クリアしましたか？");'>クリア</button>
                        </form>
                      <!-- 表示している子ステップがまだクリアしていない子ステップよりも先のものだった場合 -->
                      @elseif($challenge['current_step'] < $child_step[0]['order'])
                        <a href="/steps/{{ $step->id }}/{{ $challenge['current_step'] }}" class="c-button c-button--blue c-button--width100">
                          チャレンジ中のステップへ
                        </a>
                      <!-- クリア済みの場合 -->
                      @else
                        <button class="c-button c-button--gray c-button--width100" disable>
                          クリア済み
                        </button>
                      @endif
                    @endif
                  @endif
                </div>

                <child-step-list :step="{{ $step }}" :child_steps="{{ $child_steps }}" :challenge="{{ $challenge }}"></child-step-list>

                <challenge-button :auth_check="{{ Auth::check() }}" :challenge="{{ $challenge }}" :step="{{ $step }}" :csrf="{{ json_encode(csrf_token()) }}"></challenge-button>

                <profile :author="{{ $author }}"></profile>

              </div>  
            </div>
          </div>
        </div>
    </div>
@endsection
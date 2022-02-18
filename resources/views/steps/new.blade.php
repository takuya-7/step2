<!-- レイアウト読み込み -->
@extends('layouts.layout')

<!-- title設定 -->
@section('title', 'STEP投稿')

@section('content')
    <div class="l-content-wrapper">
        <div class="l-container">
          <div class="l-content">
            <div class="l-inner-container">

              <h2>
                STEP投稿
              </h2>

              <form method="POST" action="{{ route('steps.create') }}" class="c-form">
                @csrf
                <fieldset class="c-form__field">
                  <label for="title" class="c-form__field__name">タイトル<span class="c-form__field--required">（必須）</span></label>
                  <input id="title" type="text" name="title" value="{{ old('title', isset($step->title) ? $step->title : '') }}" class="" placeholder="例：最短でWebエンジニアになる手順を大公開！" required autofocus>
                </fieldset>
                
                
                <fieldset class="c-form__field">
                  <label for="description" class="c-form__field__name">概要<span class="c-form__field--required">（必須）</span></label>
                  <textarea name="description" id="description" class="c-form__field__textarea" style="min-height: 8rem;" placeholder="学びのステップに関するサマリー。対象者や難易度、得られるものについて。">{{ old('description') }}</textarea>
                </fieldset>

                <fieldset class="c-form__field">
                  <label for="category" class="c-form__field__name">カテゴリー<span class="c-form__field--required">（必須）</span></label>
                  <div class="c-selectbox type01">
                    <select name="category_id" id="category">
                      @foreach ($categories as $category)
                        @if((!empty($request->category_id) && $request->category_id == $step->category_id) || old('category_id') == $category->id )
                          <option value = "{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                          <option value = "{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </fieldset>

                <div class="c-form__field">
                  <div class="c-form__field__name">
                    全体の所要時間<span class="c-form__field--required">（入力推奨）</span>
                  </div>

                  <div class="c-form__child-item">
                    <label for="estimated_achievement_day" class="c-form__child-item__left">
                      <span class="c-form__child-item-name">所要日数</span>
                    </label>
                    <div class="c-form__child-item__right">
                      <input id="estimated_achievement_day" type="text" name="estimated_achievement_day" placeholder="例：3" value="{{ old('estimated_achievement_day') }}" class="">
                      <span class="u-fs-08">日</span>
                    </div>
                  </div>
                  <div class="c-form__child-item">
                    <label for="estimated_achievement_hour" class="c-form__child-item__left">
                      <span class="c-form__child-item-name">所要時間</span>
                    </label>
                    <div class="c-form__child-item__right">
                      <input id="estimated_achievement_hour" type="text" name="estimated_achievement_hour" placeholder="例：6" value="{{ old('estimated_achievement_hour') }}" class="">
                      <span class="u-fs-08">時間</span>
                    </div>
                  </div>
                </div>

                @for ($i = 1; $i <= $child_steps_num; $i++)
                  <fieldset class="c-form__field">
                    <label for="child-step{{ $i }}-title" class="c-form__field__name">ステップ{{ $i }}
                      @if($i === 1)
                        <span class="c-form__field--required">（必須）</span>
                      @endif
                    </label>
                    <input id="child-step{{ $i }}-title" type="text" name="child-step{{ $i }}-title" value="{{ old('child-step'.$i.'-title') }}" class="" placeholder="学ぶ手順の見出し">
                  </fieldset>

                  <fieldset class="c-form__field">
                    <textarea name="child-step{{ $i }}-description" id="child-step{{ $i }}-description" class="c-form__field__textarea" style="min-height: 8rem;" placeholder="具体的にやること、コツやポイントについて">{{ old('child-step'.$i.'-description') }}</textarea>
                  </fieldset>
                @endfor

                <button type="submit" class="c-button c-button--blue c-button--width100">投稿する</button>

              </form>

            </div>
          </div>
        </div>
    </div>
@endsection
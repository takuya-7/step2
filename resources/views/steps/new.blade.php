<!-- レイアウト読み込み -->
@extends('layouts.layout')

<!-- title設定 -->
@section('title', 'STEP投稿')

@section('content')
    <div class="l-content-wrapper">
        <div class="l-container">
          <div class="l-content">
            <div class="l-inner-container" id="app">

              <h2>
                STEP投稿
              </h2>

              <step-form :csrf="{{json_encode(csrf_token())}}" :categories="{{ $categories }}" :old-inputs="{{ json_encode(Session::getOldInput()) }}" :errors= "{{ $errors }}"></step-form>



              <!-- <form method="POST" action="{{ route('steps.create') }}" class="c-form"> -->
                <!-- @csrf
                <fieldset class="c-form__field">
                  <label for="title" class="c-form__field__name">タイトル<span class="c-form__field--required">（必須）</span></label>
                  @error('title')
                    <span class="c-form__invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  <input id="title" type="text" name="title" value="{{ old('title', isset($step->title) ? $step->title : '') }}" class="@error('title') is-invalid @enderror" placeholder="例：最短でWebエンジニアになる手順を公開！">
                </fieldset>
                
                
                <fieldset class="c-form__field">
                  <label for="description" class="c-form__field__name">概要<span class="c-form__field--required">（必須）</span></label>
                  @error('description')
                    <span class="c-form__invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  <textarea name="description" id="description" class="c-form__field__textarea @error('description') is-invalid @enderror" style="min-height: 8rem;" placeholder="学びのステップに関するサマリー。対象者や難易度、得られるものについて。">{{ old('description') }}</textarea>
                </fieldset>

                <fieldset class="c-form__field">
                  <label for="category" class="c-form__field__name">カテゴリー<span class="c-form__field--required">（必須）</span></label>
                  @error('category_id')
                    <span class="c-form__invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  <div class="c-selectbox type01">
                    <select name="category_id" id="category" class="@error('category_id') is-invalid @enderror">
                      @foreach ($categories as $category)
                        @if((!empty($request->category_id) && $request->category_id == $step->category_id) || old('category_id') == $category->id )
                          <option value = "{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                          <option value = "{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </fieldset> -->

                <!-- <div class="c-form__field">
                  <div class="c-form__field__name">
                    全体の所要時間<span class="c-form__field--required">（入力推奨）</span>
                  </div>

                  @error('estimated_achievement_day')
                    <span class="c-form__invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  <div class="c-form__child-item">
                    <label for="estimated_achievement_day" class="c-form__child-item__left">
                      <span class="c-form__child-item-name">所要日数</span>
                    </label>
                    <div class="c-form__child-item__right">
                      <input id="estimated_achievement_day" type="text" name="estimated_achievement_day" placeholder="例：3" value="{{ old('estimated_achievement_day') }}" class="@error('estimated_achievement_day') is-invalid @enderror">
                      <span class="u-fs-08">日</span>
                    </div>
                  </div>
                  @error('estimated_achievement_hour')
                    <span class="c-form__invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  <div class="c-form__child-item">
                    <label for="estimated_achievement_hour" class="c-form__child-item__left">
                      <span class="c-form__child-item-name">所要時間</span>
                    </label>
                    <div class="c-form__child-item__right">
                      <input id="estimated_achievement_hour" type="text" name="estimated_achievement_hour" placeholder="例：6" value="{{ old('estimated_achievement_hour') }}" class="@error('estimated_achievement_hour') is-invalid @enderror">
                      <span class="u-fs-08">時間</span>
                    </div>
                  </div>
                </div> -->

                <!-- <div class="c-box">
                  <div>　＜ ステップ入力について ＞</div>
                  <ul>
                    <li>「＋」ボタンでステップを増やすことができます</li>
                    <li>ステップは番号を飛ばさず詰めてご入力ください</li>
                    <li>「＋」ボタンで入力フォームを表示しているものは入力必須となります</li>
                    <li>ステップ右横の「×」でステップを削除できます</li>
                  </ul>
                </div> -->

                <!-- <div>
                  <h2>Vue！</h2>

                  <div>バリデーションエラー</div>
                  <div>{{ var_dump(json_decode(json_encode($errors), true)) }}</div><br>
                  <div>{{ var_dump($errors) }}</div><br>
                  <div>{{ var_dump(get_object_vars($errors)) }}</div><br>
                  <div>{{ var_dump((array)$errors) }}</div><br>
                  <div>{{ var_dump($errors->get('title')) }}</div><br>
                  <div>{{ var_dump(json_encode((array)$errors, JSON_UNESCAPED_UNICODE)) }}</div>

                  <div>
                    array(1) { 
                      ["*bags"]=> array(1) { 
                        ["default"]=> object(Illuminate\Support\MessageBag)#351 (2) { 
                          ["messages":protected]=> array(4) { 
                            ["title"]=> array(1) { [0]=> string(28) "タイトル は必須です" } 
                            ["description"]=> array(1) { [0]=> string(22) "概要 は必須です" } ["child_step1_title"]=> array(1) { [0]=> string(33) "child step1 title は必須です" } ["child_step1_description"]=> array(1) { [0]=> string(39) "child step1 description は必須です" } 
                          } ["format":protected]=> string(8) ":message" 
                        } 
                      } 
                    }
                  </div>

                  <div>
                    {{ var_dump(Session::getOldInput()) }}
                  </div>
                  <div>
                    {{ var_dump(json_encode(Session::getOldInput())) }}
                  </div>

                  <child-step-forms :old-inputs="{{ json_encode(Session::getOldInput()) }}"></child-steps-forms>
                </div> -->

                <!-- @for ($i = 1; $i <= $child_steps_num; $i++)
                  <label class="c-form__field__name">ステップ{{ $i }}
                    @if($i === 1)
                      <span class="c-form__field--required">（必須）</span>
                    @endif
                  </label>

                  <fieldset class="c-form__field">
                    @error('child-step'.$i.'-title')
                      <span class="c-form__invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    <input id="child-step{{ $i }}-title" type="text" name="child-step{{ $i }}-title" value="{{ old('child-step'.$i.'-title') }}" class="@error('child-step'.$i.'-title') is-invalid @enderror" placeholder="学ぶ手順の見出し">
                  </fieldset>

                  <fieldset class="c-form__field">
                    @error('child-step'.$i.'-description')
                      <span class="c-form__invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    <textarea name="child-step{{ $i }}-description" id="child-step{{ $i }}-description" class="c-form__field__textarea @error('child-step'.$i.'-description') is-invalid @enderror" style="min-height: 8rem;" placeholder="具体的にやること、コツやポイントについて">{{ old('child-step'.$i.'-description') }}</textarea>
                  </fieldset>

                  <div class="c-form__field">
                    @error('estimated_achievement_day')
                      <span class="c-form__invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    <div class="c-form__child-item">
                      <label for="estimated_achievement_day" class="c-form__child-item__left">
                        <span class="c-form__child-item-name">所要日数</span>
                      </label>
                      <div class="c-form__child-item__right">
                        <input id="estimated_achievement_day" type="text" name="estimated_achievement_day" placeholder="例：3" value="{{ old('estimated_achievement_day') }}" class="@error('estimated_achievement_day') is-invalid @enderror">
                        <span class="u-fs-08">日</span>
                      </div>
                    </div>
                    @error('estimated_achievement_hour')
                      <span class="c-form__invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    <div class="c-form__child-item">
                      <label for="estimated_achievement_hour" class="c-form__child-item__left">
                        <span class="c-form__child-item-name">所要時間</span>
                      </label>
                      <div class="c-form__child-item__right">
                        <input id="estimated_achievement_hour" type="text" name="estimated_achievement_hour" placeholder="例：6" value="{{ old('estimated_achievement_hour') }}" class="@error('estimated_achievement_hour') is-invalid @enderror">
                        <span class="u-fs-08">時間</span>
                      </div>
                    </div>
                  </div>
                @endfor -->

                <!-- <button type="submit" class="c-button c-button--blue c-button--width100">投稿する</button> -->

              <!-- </form> -->

            </div>
          </div>
        </div>
    </div>
@endsection
<!-- レイアウト読み込み -->
@extends('layouts.layout')

<!-- title設定 -->
@section('title', 'STEP一覧')

@section('content')
    <div class="l-content-wrapper">
        <div class="l-container">
          <div class="l-content">
            <div class="l-inner-container">

              <h2>
                STEP一覧
              </h2>

              <ul>
                <li>{{ $steps }}</li>
                <li>{{ $steps[0] }}</li>
                <li>{{ $steps[0]->title }}</li>
              </ul>

              <div id="app">
                <!-- デフォルトだとこの中ではvue.jsが有効 -->
                <!-- example-component はLaravelに入っているサンプルのコンポーネント名 -->
                <ExampleComponent></ExampleComponent>
                <!-- 配列系の変数をコンポーネントに渡すときは「:」をつける -->
              </div>
              
            </div>
          </div>
        </div>
    </div>
@endsection
<!-- レイアウト読み込み -->
@extends('layouts.layout')

<!-- title設定 -->
@section('title', 'STEP一覧')

@section('content')
  <div class="l-content-wrapper">
    <div class="l-container">
      <div class="l-inner-container">
        <h2 class="u-text-center">
          STEP一覧
        </h2>
        <div id="app">
          <list :steps="{{ $steps }}" :categories="{{ $categories }}"></list>
        </div>
      </div>
    </div>
  </div>
@endsection
<!-- レイアウト読み込み -->
@extends('layouts.layout')

<!-- title設定 -->
@section('title', '500 Server Error')

@section('content')
    <div class="l-content-wrapper">
        <div class="l-container">
          <div class="l-content">
            <div class="l-inner-container">
              <div class="u-text-center">
                <h1 class="u-mb-5">500 Server Error</h1>
                <div>
                  サーバーでエラーが起きています。
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection

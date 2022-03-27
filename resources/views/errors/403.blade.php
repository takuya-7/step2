<!-- レイアウト読み込み -->
@extends('layouts.layout')

<!-- title設定 -->
@section('title', '403 Forbidden')

@section('content')
    <div class="l-content-wrapper">
        <div class="l-container">
          <div class="l-content">
            <div class="l-inner-container">
              <div class="u-text-center">
                <h1 class="u-mb-5">403 Forbidden</h1>
                <div>
                  アクセスが認められていません。
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection

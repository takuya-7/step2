<!-- レイアウト読み込み -->
@extends('layouts.layout')

<!-- title設定 -->
@section('title', '401 Unauthorized')

@section('content')
    <div class="l-content-wrapper">
        <div class="l-container">
          <div class="l-content">
            <div class="l-inner-container">
              <div class="u-text-center">
                <h1 class="u-mb-5">401 Unauthorized</h1>
                <div>
                  認証エラーが発生しています。
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection

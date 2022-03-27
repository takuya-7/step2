<!-- レイアウト読み込み -->
@extends('layouts.layout')

<!-- title設定 -->
@section('title', '429 Too Many Requests')

@section('content')
    <div class="l-content-wrapper">
        <div class="l-container">
          <div class="l-content">
            <div class="l-inner-container">
              <div class="u-text-center">
                <h1 class="u-mb-5">429 Too Many Requests</h1>
                <div>
                  リクエストが多すぎて処理できません。
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection

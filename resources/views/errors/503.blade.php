<!-- レイアウト読み込み -->
@extends('layouts.layout')

<!-- title設定 -->
@section('title', '503 Service Unavailable')

@section('content')
    <div class="l-content-wrapper">
        <div class="l-container">
          <div class="l-content">
            <div class="l-inner-container">
              <div class="u-text-center">
                <h1 class="u-mb-5">503 Service Unavailable</h1>
                <div>
                  サービスを利用できません。
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
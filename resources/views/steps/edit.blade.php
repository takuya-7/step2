<!-- レイアウト読み込み -->
@extends('layouts.layout')
<!-- title設定 -->
@section('title', 'STEP編集')

@section('content')
  <div class="l-content-wrapper">
    <div class="l-container">
      <div class="l-content">
        <div class="l-inner-container" id="app">
          <h2>STEP編集</h2>
          <step-form :csrf="{{json_encode(csrf_token())}}" :categories="{{ $categories }}" :old-inputs="{{ json_encode(Session::getOldInput()) }}" :errors= "{{ $errors }}" :step="{{ $step }}" :child-steps="{{ $child_steps }}"></step-form>
        </div>
      </div>
    </div>
  </div>
@endsection
@extends('layouts.layout')
@section('title', 'STEP詳細')

@section('content')
    <div class="l-content-wrapper">
        <div class="l-container">
          <div class="l-content">
            <div class="l-inner-container">
              <div id="app" class="p-step-content">

                <parent-step :step="{{ $step }}" created_at="{{ $created_at }}" updated_at="{{ $updated_at }}" category="{{ $category }}" estimated_achievement_day="{{ $estimated_achievement_day }}" estimated_achievement_hour="{{ $estimated_achievement_hour }}"></parent-step>

                <child-step-list :step="{{ $step }}" :child_steps="{{ $child_steps }}" :challenge="{{ $challenge }}"></child-step-list>

                <challenge-button :auth_check="{{ Auth::check() }}" :challenge="{{ $challenge }}" :step="{{ $step }}" :csrf="{{ json_encode(csrf_token()) }}"></challenge-button>

                <profile :author="{{ $author }}"></profile>
                
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
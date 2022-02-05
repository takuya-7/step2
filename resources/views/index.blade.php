<!-- レイアウト読み込み -->
@extends('layouts.layout')

<!-- titleにHOMEを設定 -->
@section('title', 'HOME')

<!-- トップページでは共通ヘッダーは表示させない -->
@section('header')
@endsection

@section('content')
<div class="p-top-wrap">
  <header class="l-header">
    <div class="l-container l-header__inner">
      <a class="l-header__icon" href="/">STEP</a>

      <div class="l-menu-trigger js-toggle-sp-menu">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <nav class="l-nav-menu js-toggle-sp-menu-target">
        <ul class="l-menu">
          @auth
            <li><a class="l-menu__link" href="{{ route('mypage') }}">マイページ</a></li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="l-menu__link" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                this.closest('form').submit();">
                  ログアウト
                </a>
              </form>  
            </li>
          @else
            <li><a class="l-menu__link" href="{{ route('register') }}">ユーザー登録</a></li>
            <li><a class="l-menu__link" href="{{ route('login') }}">ログイン</a></li>
          @endauth
        </ul>
      </nav>
    </div>
  </header>
  <div class="l-container">
    <div class="p-top-head">
      <h1 class="p-top-head__catch">
        あなたの人生の<br>
        STEPを共有しよう
      </h1>
    </div>
  </div>
</div>

<div class="l-content-wrapper">
  <div class="l-container">
    <section class="p-top-section">
      <div class="p-top-section__about">
        <h2 class="p-top-section__title">学びのSTEP、共有しよう。</h2>
        <img src="{{ asset('images/4430.jpg')}}" alt="" class="p-top-section__image">
        <span class="p-top-section__subtitle">STEP - 学び手順の共有サービス</span>
        <p>STEPは、先人の学んだ手順を参考に、効率よく学習を進めることができるアプリです。</p>
        <p>プログラミングや英語など、あなたがこれまで学んで良かった手順を共有でき、他の人はそれに「チャレンジ」することでゲーム感覚で学習を進められます。</p>
      </div>
    </section>

    <section class="p-top-section">
      <h2 class="p-top-section__title">STEP</h2>
      <div id="app">
        <list :steps="{{ $steps }}" :categories="{{ $categories }}"></list>
      </div>
      <a href="{{ route('steps') }}" class="c-button c-button--gray c-button--radius100">STEP一覧へ</a>
    </section>

    <section class="p-top-section">
      <h2 class="p-top-section__title">ユーザー登録してSTEP投稿、挑戦しよう！</h2>
      <a href="{{ route('register') }}" class="c-button c-button--green c-button--radius100">ユーザー登録する（無料）</a>
      <a href="{{ route('login') }}" class="p-top-section__login-link">ログインする</a>
    </section>

  </div>
</div>
@endsection
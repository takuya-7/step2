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
  </div>
</div>
@endsection
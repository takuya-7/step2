<!DOCTYPE html>
<html lang="ja">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>@yield('title', 'Home') | {{ config('app.name', 'STEP') }}</title>

      <!-- Fonts -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

      <!-- Styles -->
      <link rel="stylesheet" href="{{ mix('css/app.css') }}">

      <!-- Scripts -->
      <script src="{{ mix('js/app.js') }}" defer></script>
  </head>

  <body>
    <div class="l-all-wrapper">
      @section('header')
      <header class="l-header l-header--bg-theme">
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
      @show

      <!-- フラッシュメッセージ -->
      @if (session('flash_message'))
        <div class="alert alert-primary text-center" role="alert">
          {{ session('flash_message') }}
        </div>
      @endif
      
      <main>
        @yield('content')
      </main>

      @section('footer')
        <footer id="js-footer" class="l-footer">
          <div class="l-container">
            <div class="l-footer-container">
              <ul>
                <li><a href="/">HOME</a></li>
                <li><a href="{{ route('steps') }}">STEP一覧</a></li>
                <li><a href="{{ route('sitemap') }}">サイトマップ</a></li>
              </ul>
            </div>
          </div>

          <span class="l-footer__copyright">
            Copyright © STEP. All Rights Reserved.
          </span>
        </footer>
      @show
    </div>
  </body>
</html>
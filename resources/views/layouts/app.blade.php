<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  @yield('title')
  <meta name="format-detection" content="telephone=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @yield('no_index')
  @if(app('env') == 'production' || app('env') == 'staging')
    <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
  @else
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
  @endif
  <head prefix="og: http://ogp.me/ns#">
    @yield('meta')
    <link rel="icon alternate" href="/favicon.ico"/>
    @if(app('env') == 'production' || app('env') == 'staging')
      <link rel="icon" href="{{ secure_asset('/img/app-icon/favicon.svg') }}" type="image/svg+xml">
      <link rel="icon alternate" href="{{ secure_asset('/img/app-icon/favicon.png') }}" type="image/png">
      <link rel="apple-touch-icon" sizes="200x200" href="{{ secure_asset('/img/app-icon/touch_icon.png') }}">
    @else
      <link rel="icon" href="{{ asset('/img/app-icon/favicon.svg') }}" type="image/svg+xml">
      <link rel="icon alternate" href="{{ asset('/img/app-icon/favicon.png') }}" type="image/png">
      <link rel="apple-touch-icon" sizes="200x200" href="{{ asset('/img/app-icon/touch_icon.png') }}">
    @endif
  </head>
<body>
<div class="l-page">
  <header class="l-header">
    <div class="l-header_inner">
      <div class="p-header"><a class="p-header_brand" href="/">
          @if(app('env') == 'production' || app('env') == 'staging')
          <div class="p-header_brand-logo"><img src="{{ secure_asset('/img/site_logo.svg') }}" alt="{{ config('app.name', 'Laravel') }}" width="50" height="40"></div>
          @else
          <div class="p-header_brand-logo"><img src="{{ asset('/img/site_logo.svg') }}" alt="{{ config('app.name', 'Laravel') }}" width="50" height="40"></div>
          @endif
          <div class="p-header_brand-title">{{ config('app.name', 'Laravel') }}</div>
        </a>
        <div class="p-header_description">食べログの点数で探せる、<br>宅配サービス一括検索サイト</div>
      </div>
    </div>
  </header>
  <div class="l-contents">
    @yield('content')
  </div>
  <footer class="l-footer">
    <div class="l-footer_inner">
      <ul class="c-footer_menu-list">
        <li class="c-footer_menu-item"><a class="c-footer_menu-link" href="https://twitter.com/iemeci" target="_blank">Twitter</a></li>
        <li class="c-footer_menu-item"><a class="c-footer_menu-link" href="https://magazine.iemeci.com/" target="_blank">ブログ</a></li>
        <li class="c-footer_menu-item"><a class="c-footer_menu-link" href="{{ route('info.privacy_policy') }}">プライバシーポリシー</a></li>
        <li class="c-footer_menu-item"><a class="c-footer_menu-link" href="https://forms.gle/P5eHjissBb3iEeTX6" target="_blank">お問い合わせ</a></li>
      </ul>
    </div>
  </footer>
</div>
</body>
</html>

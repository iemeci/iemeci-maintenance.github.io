<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  @yield('title')
  <meta name="format-detection" content="telephone=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @yield('no_index')
  @inline('/css/common.css')
  @yield('page_css')
  @if(app('env') == 'production' || app('env') == 'staging')
    <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet" media="print" onload="this.media='all'">
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
  @else
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" media="print" onload="this.media='all'">
    <script src="{{ asset('js/app.js') }}" defer></script>
  @endif
  <head prefix="og: http://ogp.me/ns#">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
          new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-ML5C8CG');</script>
    <!-- End Google Tag Manager -->
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
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-ML5C8CG" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="l-page">
  <header class="l-header">
    <div class="l-header_inner">
      <div class="p-header"><a class="p-header_brand" href="/">
          <div class="p-header_brand-logo"><img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNTAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA1MCA0MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTMwLjcyMjEgOC40NjM4N0wyOC42NzQ5IDkuNjQ1ODJDMjQuNjQxNiA1LjUzNTkxIDE4LjIwOSA0LjQ4Nzc1IDEyLjk5MDQgNy41QzcuNzcyMzcgMTAuNTEzNCA1LjQ2MzgyIDE2LjYwODIgNy4wMDY0NSAyMi4xNTYxTDQuOTU5MjQgMjMuMzM4MUM0Ljk1OTI0IDIzLjMzODEgNy42MjY3IDMxLjM4NzYgMTguNDAxOSAzMS41ODY5QzE5LjExMDIgMzEuNjQ1MyAxOS44MjQzIDMxLjYzNzggMjAuNTM4NyAzMS41NzgzTDIyLjAxNTYgMzQuNzcyOUwzMi4wOTY4IDI4Ljk1MjZMMzAuMDY4NiAyNi4wNzYzQzMwLjQ3NzQgMjUuNDg3MiAzMC44NDA5IDI0Ljg3MjYgMzEuMTQ0NSAyNC4yM0MzNi4zNTk1IDE0Ljc5ODcgMzAuNzIyMSA4LjQ2Mzg3IDMwLjcyMjEgOC40NjM4N1pNMTcuODQwNyAxNS45MDFMOS4zMzE5OCAyMC44MTM1QzguOTk3MDQgMTkuMjExNSA5LjA0ODg3IDE3LjU3MiA5LjQ2MjkyIDE2LjAyMzJDMTAuMTUwNCAxMy40NjEyIDExLjgwNiAxMS4xNzE2IDE0LjI4MzggOS43NDAyOEMxNi43NjIzIDguMzEwMDcgMTkuNTcyOSA4LjAyMTA4IDIyLjEzNTQgOC43MDY3NUMyMy42ODM4IDkuMTIyNTcgMjUuMTI5NCA5Ljg5NzM1IDI2LjM0OTQgMTAuOTg4NUwxNy44NDA3IDE1LjkwMVoiIGZpbGw9IiNGRkE4MDAiLz4KPHJlY3QgeD0iMjcuMDIzMiIgeT0iMTAuNjgxNiIgd2lkdGg9IjEyIiBoZWlnaHQ9IjIiIHJ4PSIxIiBmaWxsPSIjRkZBODAwIi8+CjxyZWN0IHg9IjQxLjAyMzIiIHk9IjEwLjY4MTYiIHdpZHRoPSI0IiBoZWlnaHQ9IjIiIHJ4PSIxIiBmaWxsPSIjRkZBODAwIi8+CjxyZWN0IHg9IjIzLjAyMzIiIHk9IjIzLjY4MTYiIHdpZHRoPSIxNSIgaGVpZ2h0PSIyIiByeD0iMSIgZmlsbD0iI0ZGQTgwMCIvPgo8cmVjdCB4PSI0NS4wMjMyIiB5PSIyNi42ODE2IiB3aWR0aD0iNCIgaGVpZ2h0PSIyIiByeD0iMSIgZmlsbD0iI0ZGQTgwMCIvPgo8cmVjdCB4PSIyOS4wMjMyIiB5PSIxNi42ODE2IiB3aWR0aD0iMTUiIGhlaWdodD0iMiIgcng9IjEiIGZpbGw9IiNGRkE4MDAiLz4KPHJlY3QgeD0iMjkuMDIzMiIgeT0iMjYuNjgxNiIgd2lkdGg9IjE1IiBoZWlnaHQ9IjIiIHJ4PSIxIiBmaWxsPSIjRkZBODAwIi8+Cjwvc3ZnPgo=" alt="" width="50" height="40"></div>
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

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
<div class="l-page">
    <header class="l-header">
        <div class="l-header_inner">
            <div class="p-header"><a class="p-header_brand" href="/">
                    <div class="p-header_brand-logo"><img src="{{ asset('/img/site_logo.svg') }}" alt="{{ config('app.name', 'Laravel') }}" width="50" height="40"></div>
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
                <li class="c-footer_menu-item"><a class="c-footer_menu-link" href="/info/privacy_policy.html">プライバシーポリシー</a></li>
                <li class="c-footer_menu-item"><a class="c-footer_menu-link" href="https://forms.gle/P5eHjissBb3iEeTX6" target="_blank">お問い合わせ</a></li>
            </ul>
        </div>
    </footer>
</div>
</body>
</html>

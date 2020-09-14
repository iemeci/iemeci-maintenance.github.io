<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ config('app.name') }}{{ config('app.name_description') }}</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(app('env') == 'production' || app('env') == 'staging')
        <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
    @else
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
    @endif
    <head prefix="og: http://ogp.me/ns#">
    <meta property="og:title" content="{{ config('app.name') }}{{ config('app.name_description') }}。">
    <meta property="og:type" content="website">
{{--    <meta property="og:url" content="表示したいページのURL（絶対パス）">--}}
    <meta property="og:image" content="{{ secure_asset('/img/app-icon/ogp-image.png')  }}">
    <meta property="og:site_name" content="{{ config('app.name') }}{{ config('app.name_description') }}。">
    <meta property="og:description" content="お店に行かなくても美味しいご飯が食べたい！だけど、宅配サービスですぐに目につくのはチェーン店ばかり。しかも、宅配サービスごとに提供している...">
    <link rel="icon alternate" href="/favicon.ico" />
    @if(app('env') == 'production' || app('env') == 'staging')
    <link rel="icon" href="{{ secure_asset('/img/app-icon/favicon.svg') }}" type="image/svg+xml">
    <link rel="icon alternate" href="{{ secure_asset('/img/app-icon/favicon.png') }}" type="image/png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ secure_asset('/img/app-icon/favicon.png') }}">
    @else
    <link rel="icon" href="{{ asset('/img/app-icon/favicon.svg') }}" type="image/svg+xml">
    <link rel="icon alternate" href="{{ asset('/img/app-icon/favicon.png') }}" type="image/png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/img/app-icon/favicon.png') }}">
    @endif
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="iemeci">
    <meta name="twitter:title" content="{{ config('app.name') }}">
    <meta name="twitter:description" content="お店に行かなくても美味しいご飯が食べたい！だけど、宅配サービスですぐに目につくのはチェーン店ばかり。しかも、宅配サービスごとに提供している...">
    <meta name="twitter:image" content="{{ secure_asset('/img/app-icon/favicon.png')  }}">
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
                <li class="c-footer_menu-item"><a class="c-footer_menu-link" href="{{ route('info.privacy_policy') }}">プライバシーポリシー</a></li>
                <li class="c-footer_menu-item"><a class="c-footer_menu-link" href="https://forms.gle/P5eHjissBb3iEeTX6" target="_blank">お問い合わせ</a></li>
            </ul>
        </div>
    </footer>
</div>
</body>
</html>

@extends('layouts.app')

@section('title')
  <title>{{ config('app.name') }}{{ config('app.name_description') }}</title>
@endsection

@section('meta')
  <meta property="og:title" content="{{ config('app.name') }}{{ config('app.name_description') }}。">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ route('home') }}">
  <meta property="og:image" content="{{ secure_asset('/img/app-icon/ogp-image.png')  }}">
  <meta property="og:site_name" content="{{ config('app.name') }}{{ config('app.name_description') }}。">
  <meta property="og:description" content="お店に行かなくても美味しいご飯が食べたい！だけど、宅配サービスですぐに目につくのはチェーン店ばかり。しかも、宅配サービスごとに提供している...">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="iemeci">
  <meta name="twitter:title" content="{{ config('app.name') }}">
  <meta name="twitter:description" content="お店に行かなくても美味しいご飯が食べたい！だけど、宅配サービスですぐに目につくのはチェーン店ばかり。しかも、宅配サービスごとに提供している...">
  <meta name="twitter:image" content="{{ secure_asset('/img/app-icon/ogp-image.png')  }}">
@endsection

@section('content')
  <div class="l-contents_inner">
    <main class="l-main">
      <div class="l-content">
        <div class="c-catch">
          <div class="c-catch-copy"><h1>料理デリバリーを<br>まとめて検索しよう</h1></div>
          <div class="c-catch-search">
            <div class="c-catch-search-button"><button>現在地付近のお店を検索</button></div>
            <div class="c-catch-search-areas">
              <h2>利用可能エリア × サービス</h2>
              <p>関東</p>
            </div>
          </div>
        </div>
        <div class="c-home-area">
          <h2 class="c-home-area-title">エリアで探す</h2>
          <div class="c-home-area-col3-list-wrap">
          <ul class="c-home-area-col3-list c-home-area-col3-list__with-photo">
            <li class="c-home-area-col3-item">
              <a href="{{ route('m_pref.index', ["pref_id" => '13']) }}" class="c-home-area-col3-link">
                <div class="c-home-area-col3-pict"><img src="{{ app('env') == 'production' || app('env') == 'staging' ? secure_asset('/img/area_photo_tokyo.jpg') : asset('/img/area_photo_tokyo.jpg')}}" alt=""></div>
                <div class="c-home-area-col3-text">東京都</div>
              </a>
            </li>
            <li class="c-home-area-col3-item">
              <a href="{{ route('m_pref.index', ["pref_id" => '14']) }}" class="c-home-area-col3-link">
                <div class="c-home-area-col3-pict"><img src="{{ app('env') == 'production' || app('env') == 'staging' ? secure_asset('/img/area_photo_kanagawa.jpg') : asset('/img/area_photo_kanagawa.jpg') }}" alt=""></div>
                <div class="c-home-area-col3-text">神奈川県</div>
              </a>
            </li>
            <li class="c-home-area-col3-item">
              <a href="{{ route('m_pref.index', ["pref_id" => '12']) }}" class="c-home-area-col3-link">
                <div class="c-home-area-col3-pict"><img src="{{ app('env') == 'production' || app('env') == 'staging' ? secure_asset('/img/area_photo_chiba.png') : asset('/img/area_photo_chiba.png') }}" alt=""></div>
                <div class="c-home-area-col3-text">千葉県</div>
              </a>
            </li>
          </ul>
          </div>
          <div class="c-home-area-col3-list-wrap">
          <ul class="c-home-area-col3-list">
            <li class="c-home-area-col3-item"><a href="{{ route('m_pref.index', ["pref_id" => '11']) }}" class="c-home-area-col3-link"><div class="c-home-area-col3-text">埼玉県</div></a></li>
            <li class="c-home-area-col3-item"><a href="{{ route('m_pref.index', ["pref_id" => '09']) }}" class="c-home-area-col3-link"><div class="c-home-area-col3-text">栃木県</div></a></li>
            <li class="c-home-area-col3-item"><a href="{{ route('m_pref.index', ["pref_id" => '10']) }}" class="c-home-area-col3-link"><div class="c-home-area-col3-text">群馬県</div></a></li>
            <li class="c-home-area-col3-item"><a href="{{ route('m_pref.index', ["pref_id" => '08']) }}" class="c-home-area-col3-link"><div class="c-home-area-col3-text">茨城県</div></a></li>
          </ul>
          </div>
        </div>
      </div>
    </main>
  </div>
@endsection

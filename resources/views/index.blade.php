@extends('layouts.app')

@section('title')
  <title>【{{ config('app.name') }}】出前・デリバリー・宅配一括比較サイト</title>
@endsection

@section('meta')
  <meta name="description" content="【{{ config('app.name') }}】出前・デリバリー・宅配を一括検索できる宅配比較サイト。主要宅配サービスの美味しい飲食店を簡単に比較・検索できます。宅配サイトで直接予約できるため手数料無料です。取扱サービスは、Uber Eats（ウーバーイーツ）,ｄデリバリー,楽天デリバリー。">
  <meta property="og:title" content="【{{ config('app.name') }}】出前・デリバリー・宅配一括比較サイト">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ route('home') }}">
  <meta property="og:image" content="{{ secure_asset('/img/app-icon/ogp-image.png')  }}">
  <meta property="og:site_name" content="{{ config('app.name') }}{{ config('app.name_description') }}。">
  <meta property="og:description" content="【{{ config('app.name') }}】出前・デリバリー・宅配を一括検索できる宅配比較サイト。主要宅配サービスの美味しい飲食店を簡単に比較・検索できます。宅配サイトで直接予約できるため手数料無料です。取扱サービスは、Uber Eats（ウーバーイーツ）,ｄデリバリー,楽天デリバリー。">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="iemeci">
  <meta name="twitter:title" content="【{{ config('app.name') }}】出前・デリバリー・宅配一括比較サイト">
  <meta name="twitter:description" content="【{{ config('app.name') }}】出前・デリバリー・宅配を一括検索できる宅配比較サイト。主要宅配サービスの美味しい飲食店を簡単に比較・検索できます。宅配サイトで直接予約できるため手数料無料です。取扱サービスは、Uber Eats（ウーバーイーツ）,ｄデリバリー,楽天デリバリー。">
  <meta name="twitter:image" content="{{ secure_asset('/img/app-icon/ogp-image.png')  }}">
@endsection

@section('content')
  <div class="l-contents_inner">
    <main class="l-main">
      <div class="l-content">
        <div class="c-catch">
          <h1 class="c-catch-copy">料理デリバリーを<br>まとめて検索しよう</h1></h1>
          <div class="c-catch-search">
            <div class="c-catch-search-button-area">
              <form action="{{ route('shop.index') }}" name="submit_location">
                <input type="hidden" name="lat" value="">
                <input type="hidden" name="lng" value="">
                <button class="c-catch-search-button js-submit-location">現在地付近のお店を検索</button>
              </form>
            </div>
            <div class="c-catch-search-area">
              <h2 class="c-catch-search-area-title">利用可能エリア × サービス</h2>
              <p class="c-catch-search-area-body">
                @if(app('env') == 'production' || app('env') == 'staging')
                <img src="{{ secure_asset('/img/kanto_rakuten-delivery_d-delivery_uber-eats.png') }}" alt="関東×Uber Eats、楽天デリバリー、ｄデリバリー" width="100%">
                @else
                <img src="{{ asset('/img/kanto_rakuten-delivery_d-delivery_uber-eats.png') }}" alt="関東×Uber Eats、楽天デリバリー、ｄデリバリー" width="100%">
                @endif
              </p>
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
        <div class="c-sns">
          <h2 class="c-sns-title">このサービスをシェア</h2>
          <ul class="c-sns-list">
            @if(app('env') == 'production' || app('env') == 'staging')
              <li class="c-sns-item"><a href="https://social-plugins.line.me/lineit/share?url={{ config('app.url') }}/" target="blank"><img src="{{ secure_asset('img/btn_line.svg') }}" alt="LINE" width="50" height="50"></a></li>
              <li class="c-sns-item"><a href="https://www.facebook.com/sharer/sharer.php?u={{ config('app.url') }}/" target="blank"><img src="{{ secure_asset('img/btn_facebook.svg') }}" alt="Facebook" width="50" height="50"></a></li>
              <li class="c-sns-item"><a href="https://twitter.com/intent/tweet?url={{ config('app.url') }}/&text={{ config('app.name') . config('app.name_description') }}" target="blank"><img src="{{ secure_asset('img/btn_twitter.svg') }}" alt="Twitter" width="50" height="50"></a></li>
              <li class="c-sns-item"><a class="js-copy" href="javascript:void(0);" data-title="{{ config('app.name') . config('app.name_description') }}"><img src="{{ secure_asset('img/btn_link.svg') }}" alt="コピー" width="50" height="50"></a></li>
            @else
              <li class="c-sns-item"><a href="https://social-plugins.line.me/lineit/share?url={{ config('app.url') }}/" target="blank"><img src="{{ asset('img/btn_line.svg') }}" alt="LINE" width="50" height="50"></a></li>
              <li class="c-sns-item"><a href="https://www.facebook.com/sharer/sharer.php?u={{ config('app.url') }}/" target="blank"><img src="{{ asset('img/btn_facebook.svg') }}" alt="Facebook" width="50" height="50"></a></li>
              <li class="c-sns-item"><a href="https://twitter.com/intent/tweet?url={{ config('app.url') }}/&text={{ config('app.name') . config('app.name_description') }}" target="blank"><img src="{{ asset('img/btn_twitter.svg') }}" alt="Twitter" width="50" height="50"></a></li>
              <li class="c-sns-item"><a class="js-copy" href="javascript:void(0);" data-title="{{ config('app.name') . config('app.name_description') }}"><img src="{{ asset('img/btn_link.svg') }}" alt="コピー" width="50" height="50"></a></li>
            @endif
          </ul>
        </div>
      </div>
    </main>
  </div>
@endsection

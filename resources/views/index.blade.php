@extends('layouts.app')

@section('title')
  <title>【{{ config('app.name') }}】出前・デリバリー・宅配一括比較サイト</title>
@endsection

@section('page_css')
  @inline('/css/home.css')
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
                <img src="data:image/png;base64, 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" alt="全国×Uber Eats、ｄデリバリー、出前館、楽天デリバリー" width="100%">
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
                <div class="c-home-area-col3-pict"><img src="{{ app('env') == 'production' || app('env') == 'staging' ? secure_asset('/img/area_photo_chiba.jpg') : asset('/img/area_photo_chiba.jpg') }}" alt=""></div>
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

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
                <img src="data:image/png;base64, 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" alt="関東×Uber Eats、楽天デリバリー、ｄデリバリー" width="100%">
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

@extends('layouts.app')

@section('title')
  <title>【{{ config('app.name') }}】出前・デリバリー・宅配一括比較サイト</title>
@endsection

@section('page_css')
  @inline('/css/home.css')
@endsection

@section('meta')
  <meta name="description" content="【{{ config('app.name') }}】出前・デリバリー・宅配を一括検索できる宅配比較サイト。全国7サイト40,091店舗の美味しい飲食店を無料で簡単に比較・検索できます。取扱は、Uber Eats, 出前館, ｄデリバリー, 楽天デリバリー, menu, Wolt, foodpanda。">
  <meta property="og:title" content="【{{ config('app.name') }}】出前・デリバリー・宅配一括比較サイト">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ route('home') }}">
  <meta property="og:image" content="{{ secure_asset('/img/app-icon/ogp-image.png')  }}">
  <meta property="og:site_name" content="{{ config('app.name') }}{{ config('app.name_description') }}。">
  <meta property="og:description" content="【{{ config('app.name') }}】出前・デリバリー・宅配を一括検索できる宅配比較サイト。全国7サイト40,091店舗の美味しい飲食店を無料で簡単に比較・検索できます。取扱は、Uber Eats, 出前館, ｄデリバリー, 楽天デリバリー, menu, Wolt, foodpanda。">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="iemeci">
  <meta name="twitter:title" content="【{{ config('app.name') }}】出前・デリバリー・宅配一括比較サイト">
  <meta name="twitter:description" content="【{{ config('app.name') }}】出前・デリバリー・宅配を一括検索できる宅配比較サイト。全国7サイト40,091店舗の美味しい飲食店を無料で簡単に比較・検索できます。取扱は、Uber Eats, 出前館, ｄデリバリー, 楽天デリバリー, menu, Wolt, foodpanda。">
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
              <h2 class="c-catch-search-area-title">対応サービス</h2>
              <p class="c-catch-search-area-body">
                <img src="{{ app('env') == 'production' || app('env') == 'staging' ? secure_asset('/img/available.png') : asset('/img/available.png')}}" alt="Uber Eats、ｄデリバリー、出前館、楽天デリバリー、menu、Wolt、foodpanda" width="263" height="89">
              </p>
            </div>
          </div>
        </div>
        <div class="c-home-area">
          <h2 class="c-home-area-title">エリアで探す</h2>
          <div class="c-home-area-col3-list-wrap">
          <ul class="c-home-area-col3-list c-home-area-col3-list__with-photo">
            <li class="c-home-area-col3-item">
              <a href="{{ route('m_area.index', ["area_id" => '03']) }}" class="c-home-area-col3-link">
                <div class="c-home-area-col3-pict"><img src="{{ app('env') == 'production' || app('env') == 'staging' ? secure_asset('/img/area_photo_tokyo.jpg') : asset('/img/area_photo_tokyo.jpg')}}" alt=""></div>
                <div class="c-home-area-col3-text">関東</div>
              </a>
            </li>
            <li class="c-home-area-col3-item">
              <a href="{{ route('m_area.index', ["area_id" => '05']) }}" class="c-home-area-col3-link">
                <div class="c-home-area-col3-pict"><img src="{{ app('env') == 'production' || app('env') == 'staging' ? secure_asset('/img/area_photo_osaka.jpg') : asset('/img/area_photo_osaka.jpg') }}" alt=""></div>
                <div class="c-home-area-col3-text">近畿</div>
              </a>
            </li>
            <li class="c-home-area-col3-item">
              <a href="{{ route('m_area.index', ["area_id" => '04']) }}" class="c-home-area-col3-link">
                <div class="c-home-area-col3-pict"><img src="{{ app('env') == 'production' || app('env') == 'staging' ? secure_asset('/img/area_photo_nagoya.jpg') : asset('/img/area_photo_nagoya.jpg') }}" alt=""></div>
                <div class="c-home-area-col3-text">中部・東海</div>
              </a>
            </li>
          </ul>
          </div>
          <div class="c-home-area-col3-list-wrap">
          <ul class="c-home-area-col3-list">
            <li class="c-home-area-col3-item"><a href="{{ route('m_area.index', ["area_id" => '01']) }}" class="c-home-area-col3-link"><div class="c-home-area-col3-text">北海道</div></a></li>
            <li class="c-home-area-col3-item"><a href="{{ route('m_area.index', ["area_id" => '02']) }}" class="c-home-area-col3-link"><div class="c-home-area-col3-text">東北</div></a></li>
            <li class="c-home-area-col3-item"><a href="{{ route('m_area.index', ["area_id" => '06']) }}" class="c-home-area-col3-link"><div class="c-home-area-col3-text">中国・四国</div></a></li>
            <li class="c-home-area-col3-item"><a href="{{ route('m_area.index', ["area_id" => '07']) }}" class="c-home-area-col3-link"><div class="c-home-area-col3-text">九州・沖縄</div></a></li>
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

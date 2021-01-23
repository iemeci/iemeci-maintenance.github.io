@extends('layouts.app')

@section('title')
  <title>{{ $street->city_name . $street->town_name }}{{ $street->town_name === $street->street_name ? '' : $street->street_name }}でおすすめの出前・デリバリー・宅配を一括比較 - {{ config('app.name') }}</title>
@endsection

@section('no_index')
    @if(!count($shops))
        <meta name=”robots” content=”noindex,nofollow”>
    @endif
@endsection

@section('meta')
  @if(!isset($street_id))
    <link rel="canonical" href="{{ route('m_street.index', ['street_id' => $street->street_id]) }}">
  @endif
  <meta name="description" content="{{ $street->city_name . $street->town_name }}{{ $street->town_name === $street->street_name ? '' : $street->street_name }}の出前・デリバリー・宅配を一括検索するならいえメシへ。主要宅配サービスの美味しい飲食店を簡単に比較・検索できます。宅配サイトで直接予約できるため手数料無料です。取扱サービスは、Uber Eats, 出前館, ｄデリバリー, 楽天デリバリー, menu, Wolt, foodpanda。">
  <meta property="og:title" content="{{ $street->city_name . $street->town_name }}{{ $street->town_name === $street->street_name ? '' : $street->street_name }}でおすすめの出前・デリバリー・宅配を一括比較 - {{ config('app.name') }}">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ request()->fullUrl() }}">
  <meta property="og:image" content="{{ secure_asset('/img/app-icon/ogp-image.png')  }}">
  <meta property="og:site_name" content="{{ config('app.name') }}{{ config('app.name_description') }}。">
  <meta property="og:description" content="{{ $street->city_name . $street->town_name }}{{ $street->town_name === $street->street_name ? '' : $street->street_name }}の出前・デリバリー・宅配を一括検索するならいえメシへ。主要宅配サービスの美味しい飲食店を簡単に比較・検索できます。宅配サイトで直接予約できるため手数料無料です。取扱サービスは、Uber Eats, 出前館, ｄデリバリー, 楽天デリバリー, menu, Wolt, foodpanda。">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="iemeci">
  <meta name="twitter:title" content="{{ $street->city_name . $street->town_name }}{{ $street->town_name === $street->street_name ? '' : $street->street_name }}でおすすめの出前・デリバリー・宅配を一括比較 - {{ config('app.name') }}">
  <meta name="twitter:description" content="{{ $street->city_name . $street->town_name }}{{ $street->town_name === $street->street_name ? '' : $street->street_name }}の出前・デリバリー・宅配を一括検索するならいえメシへ。主要宅配サービスの美味しい飲食店を簡単に比較・検索できます。宅配サイトで直接予約できるため手数料無料です。取扱サービスは、Uber Eats, 出前館, ｄデリバリー, 楽天デリバリー, menu, Wolt, foodpanda。">
  <meta name="twitter:image" content="{{ secure_asset('/img/app-icon/ogp-image.png')  }}">
@endsection


@section('content')
    <div class="l-contents_inner">
        <main class="l-main">
            <div class="l-content">
                <div class="c-location-header">
                    <div class="c-location-area">
                      <div class="c-topic_path">
                        <ul class="c-topic_path-list" itemscope itemtype="https://schema.org/BreadcrumbList">
                          <li class="c-topic_path-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <a class="c-topic_path-link" itemprop="item" href="{{ route('home') }}"><span itemprop="name">トップ</span></a>
                            <meta itemprop="position" content="1">
                          </li>
                          <li class="c-topic_path-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <a class="c-topic_path-link" itemprop="item" href="{{ route('m_pref.index', ["pref_id" => $street->pref_id]) }}"><span itemprop="name">{{ $street->pref_name }}</span></a>
                            <meta itemprop="position" content="2">
                          </li>
                          <li class="c-topic_path-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <a class="c-topic_path-link" itemprop="item" href="{{ route('m_city.index', ["city_id" => $street->city_id]) }}"><span itemprop="name">{{ $street->city_name }}</span></a>
                            <meta itemprop="position" content="3">
                          </li>
                          <li class="c-topic_path-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <a class="c-topic_path-link" itemprop="item" href="{{ route('m_town.index', ["town_id" => $street->town_id]) }}"><span itemprop="name">{{ $street->town_name }}</span></a>
                            <meta itemprop="position" content="4">
                          </li>
                          <li class="c-topic_path-item">{{ $street->street_name }}</li>
                        </ul>
                      </div>
                    </div>
                    <div class="c-location-count"><span class="c-location-count_num">{{ $shops->total() }}</span><span class="c-location-count_unit">件</span></div>
                </div>
                @if($shops->total())
                    <div class="c-location-suggestion"><a href="https://forms.gle/vEtrG3QMQ1LwXFnz6" target="_blank">リンクの修正を提案</a></div>
                    <div class="c-location-app-download">
                      <div class="c-location-app-download_left">
                        <img src="{{ app('env') == 'production' || app('env') == 'staging' ? secure_asset('/img/cpn01_logo_menu.png') : asset('/img/cpn01_logo_menu.png') }}" alt="" width="64" height="64">
                      </div>
                      <div class="c-location-app-download_right">
                        <div class="c-location-app-download_title"><em>menu</em> : 初回1500円クーポン</div>
                        <div class="c-location-app-download_coupon">下のボタンからアプリをダウンロードし、クーポンコード<span>36801</span>を入力すると、デリバリーで使える750円OFFクーポンが2枚もらえます。</div>
                        <div class="c-location-app-download_coupon_buttons">
                          <ul class="c-location-app-download_links">
                            <li class="c-location-app-download_link-item"><a href="https://h.accesstrade.net/sp/cc?rk=0100o02u00kg6j" rel="nofollow"><img
                                  src="{{ app('env') == 'production' || app('env') == 'staging' ? secure_asset('/img/cpn01_btn_app_store.png') : asset('/img/cpn01_btn_app_store.png') }}"
                                  alt="" width="128" height="48"><img src="https://h.accesstrade.net/sp/rr?rk=0100o02u00kg6j" width="1" height="1"
                                              border="0" alt=""/></a></li>
                            <li class="c-location-app-download_link-item"><a href="https://h.accesstrade.net/sp/cc?rk=0100o02t00kg6j" rel="nofollow"><img
                                  src="{{ app('env') == 'production' || app('env') == 'staging' ? secure_asset('/img/cpn01_btn_google_play.png') : asset('/img/cpn01_btn_google_play.png') }}"
                                  alt="" width="128" height="48"><img src="https://h.accesstrade.net/sp/rr?rk=0100o02t00kg6j" width="1" height="1"
                                              border="0" alt=""/></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="c-shop">
                        <ul class="c-shop-list">
                            @foreach($shops as $shop)
                                <li class="c-shop-item">
                                    <div class="c-shop-link">
                                        <div class="c-shop-image"><img src="{{ $shop->shop_thumbnail_url }}" alt="">
                                        </div>
                                        <div class="c-shop-text">
                                            <div class="c-shop-name">{{ $shop->shop_name }}</div>
                                            <div class="c-shop-category">{{ $shop->shop_category_name }}</div>
                                            @if ($shop->shop_score)
                                                <div class="c-shop-review">
                                                    <div class="c-shop-review_star_bg">
                                                        <?php
                                                        $val = 0;
                                                        if ($shop->shop_score < 0.5) {
                                                            $val = 0;
                                                        } elseif ($shop->shop_score <= 1) {
                                                            $val = 1;
                                                        } elseif ($shop->shop_score < 1.5) {
                                                            $val = 2;
                                                        } elseif ($shop->shop_score <= 2) {
                                                            $val = 3;
                                                        } elseif ($shop->shop_score < 2.5) {
                                                            $val = 4;
                                                        } elseif ($shop->shop_score <= 3) {
                                                            $val = 5;
                                                        } elseif ($shop->shop_score < 3.5) {
                                                            $val = 6;
                                                        } elseif ($shop->shop_score <= 4) {
                                                            $val = 7;
                                                        } elseif ($shop->shop_score < 4.5) {
                                                            $val = 8;
                                                        } elseif ($shop->shop_score < 5) {
                                                            $val = 9;
                                                        } elseif ($shop->shop_score === 5) {
                                                            $val = 10;
                                                        }
                                                        ?>
                                                        <div
                                                            class="c-shop-review_star c-shop-review_star__val{{$val}}"></div>
                                                    </div>
                                                    <div class="c-shop-review_value">{{ $shop->shop_score }}</div>
                                                </div>
                                            @endif
                                            <div class="c-shop-enable">
                                                @if ( $shop->shop_url_d_delivery || $shop->shop_url_rakuten_delivery || $shop->shop_url_uber_eats || $shop->shop_url_demaekan || $shop->shop_id_menu || $shop->shop_id_wolt || $shop->shop_id_foodpanda || $shop->shop_id_foodneko )
                                                    <ul class="c-shop-enable_list">
                                                        @if ( $shop->shop_url_uber_eats )
                                                            <li class="c-shop-enable_item"><a class="c-shop-enable_link c-shop-enable_link__uber-eats" href="{{ 'https://www.ubereats.com' . $shop->shop_url_uber_eats }}" rel="nofollow">Uber <span>Eats</span></a></li>
                                                        @endif
                                                        @if ( $shop->shop_url_demaekan )
                                                            <li class="c-shop-enable_item"><a class="c-shop-enable_link c-shop-enable_link__demaekan" href="{{ 'https://demae-can.com' . $shop->shop_url_demaekan }}" rel="nofollow">出前館</a></li>
                                                        @endif
                                                        @if ( $shop->shop_url_d_delivery )
                                                            <li class="c-shop-enable_item"><a class="c-shop-enable_link c-shop-enable_link__d-delivery" href="https://px.a8.net/svt/ejp?a8mat=3BG3ZA+XXR16+3CLO+BW8O2&a8ejpredirect={{ urlencode('https://delivery.dmkt-sp.jp' . $shop->shop_url_d_delivery) }}" rel="nofollow">ｄデリバリー</a><img border="0" width="1" height="1" src="https://www11.a8.net/0.gif?a8mat=3BG3ZA+XXR16+3CLO+BW8O2" alt=""></li>
                                                        @endif
                                                        @if ( $shop->shop_url_rakuten_delivery )
                                                            <li class="c-shop-enable_item"><a class="c-shop-enable_link c-shop-enable_link__r-delivery" href="https://px.a8.net/svt/ejp?a8mat=3BG3ZA+XXR16+3CLO+BW8O2&a8ejpredirect={{ urlencode('https://delivery.rakuten.co.jp' . $shop->shop_url_rakuten_delivery) }}"><span>Ｒ</span>デリバリー</a><img border="0" width="1" height="1" src="https://www16.a8.net/0.gif?a8mat=2NQTU1+2MNYQI+2HOM+BW8O1" alt=""></li>
                                                        @endif
                                                        @if ( $shop->shop_id_menu )
                                                            <li class="c-shop-enable_item"><a class="c-shop-enable_link c-shop-enable_link__menu c-shop-enable_link__menu__sp" href="https://me.nu/s{{ $shop->shop_id_menu }}">menu</a><a class="c-shop-enable_link c-shop-enable_link__menu c-shop-enable_link__menu__pc" href="https://menu.jp/s{{ $shop->shop_id_menu }}">menu</a></li>
                                                        @endif
                                                        @if ( $shop->shop_id_wolt )
                                                            <li class="c-shop-enable_item"><a class="c-shop-enable_link c-shop-enable_link__wolt" href="https://wolt.com{{ $shop->shop_id_wolt }}">Wolt</a></li>
                                                        @endif
                                                        @if ( $shop->shop_id_foodpanda )
                                                            <li class="c-shop-enable_item"><a class="c-shop-enable_link c-shop-enable_link__foodpanda" href="https://www.foodpanda.co.jp/{{ $shop->shop_id_foodpanda }}">foodpanda</a></li>
                                                        @endif
                                                        @if ( $shop->shop_id_foodneko )
                                                            <li class="c-shop-enable_item"><a class="c-shop-enable_link c-shop-enable_link__foodneko" href="">foodneko</a></li>
                                                        @endif
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @if(isset($street_id))
                        {{ $shops->links('pagination::default') }}
                    @else
                        {{ $shops->appends(['lat' => $lat, 'lng' => $lng])->links('pagination::default') }}
                    @endif
                </div>
            @else
                <div class="c-shop-empty">
                    <h1 class="c-shop-empty_heading">配達可能なお店が見つかりませんでした</h1>
                    <p class="c-shop-empty_description">対応エリアの拡大をお待ちください。</p>
                </div>
            @endif
        </main>
    </div>
@endsection

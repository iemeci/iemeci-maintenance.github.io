@extends('layouts.app')

@section('title')
  <title>{{ $pref->pref_name }}でおすすめの出前・デリバリー・宅配を一括比較 - {{ config('app.name') }}</title>
@endsection

@section('meta')
  <meta name="description" content="{{ $pref->pref_name }}の出前・デリバリー・宅配を一括検索するならいえメシへ。全国7サイト38,452店舗のデリバリーを無料で簡単に比較・検索できます。取扱サービスは、Uber Eats, 出前館, ｄデリバリー, 楽天デリバリー, menu, Wolt, foodpanda。">
  <meta property="og:title" content="{{ $pref->pref_name }}でおすすめの出前・デリバリー・宅配を一括比較 - {{ config('app.name') }}">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:image" content="{{ secure_asset('/img/app-icon/ogp-image.png')  }}">
  <meta property="og:site_name" content="{{ config('app.name') }}{{ config('app.name_description') }}。">
  <meta property="og:description" content="{{ $pref->pref_name }}の出前・デリバリー・宅配を一括検索するならいえメシへ。全国7サイト38,452店舗のデリバリーを無料で簡単に比較・検索できます。取扱サービスは、Uber Eats, 出前館, ｄデリバリー, 楽天デリバリー, menu, Wolt, foodpanda。">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="iemeci">
  <meta name="twitter:title" content="{{ $pref->pref_name }}でおすすめの出前・デリバリー・宅配を一括比較 - {{ config('app.name') }}">
  <meta name="twitter:description" content="{{ $pref->pref_name }}の出前・デリバリー・宅配を一括検索するならいえメシへ。全国7サイト38,452店舗のデリバリーを無料で簡単に比較・検索できます。取扱サービスは、Uber Eats, 出前館, ｄデリバリー, 楽天デリバリー, menu, Wolt, foodpanda。">
  <meta name="twitter:image" content="{{ secure_asset('/img/app-icon/ogp-image.png')  }}">
@endsection

@section('content')
  <div class="l-contents_inner">
    <main class="l-main">
      <div class="l-content">
        <div class="c-page-header">
          <div class="c-topic_path">
            <ul class="c-topic_path-list" itemscope itemtype="https://schema.org/BreadcrumbList">
              <li class="c-topic_path-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a class="c-topic_path-link" itemprop="item" href="{{ route('home') }}"><span itemprop="name">トップ</span></a>
                <meta itemprop="position" content="1">
              </li>
              <li class="c-topic_path-item">{{ $pref->pref_name }}</li>
            </ul>
          </div>
          <h1 class="c-page-title">{{ $pref->pref_name }}の出前・デリバリー・宅配を一括比較</h1>
        </div>

        @if(count($arr_disp))
        <div class="c-area">
          <ul class="c-area-list">
          @foreach($arr_disp as $item)
          <li class="c-area-kana-item">
            <div class="c-area-kana-name js-accordion-label">{{ array_keys($item)[0] }}行</div>
            <div class="c-area-kana-content">
              <ul class="c-area-kana-content-list">
              @foreach($item[array_keys($item)[0]] as $subItem)
              <li class="c-area-kana-content-item"><a href="{{ route('m_city.index', ['city_id' => $subItem->city_id]) }}" class="c-area-kana-content-link">{{ $subItem->city_name }}</a></li>
              @endforeach
              </ul>
            </div>
          </li>
          @endforeach
          </ul>
        </div>
        @else
        <p>地域がありませんでした</p>
        @endif
        <div class="c-area">
          <h2 class="c-area-title">近くの都道府県を探す</h2>
          @if(count($other_areas))
          <ul class="c-area-list">
            @foreach($other_areas as $area)
            <li class="c-area-item"><a href="{{ route('m_pref.index', ['pref_id' => $area->pref_id]) }}" class="c-area-link">{{ $area->pref_name }}</a></li>
            @endforeach
          </ul>
          @endif
        </div>
      </div>
    </main>
  </div>
@endsection

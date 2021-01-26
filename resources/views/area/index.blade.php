@extends('layouts.app')

@section('title')
  <title>{{ $area->area_name }}でおすすめの出前・デリバリー・宅配を一括比較 - {{ config('app.name') }}</title>
@endsection

@section('meta')
  <meta name="description" content="{{ $area->area_name }}の出前・デリバリー・宅配を一括検索するならいえメシへ。全国7サイト39,907店舗のデリバリーを無料で簡単に比較・検索できます。取扱サービスは、Uber Eats, 出前館, ｄデリバリー, 楽天デリバリー, menu, Wolt, foodpanda。">
  <meta property="og:title" content="{{ $area->area_name }}でおすすめの出前・デリバリー・宅配を一括比較 - {{ config('app.name') }}">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:image" content="{{ secure_asset('/img/app-icon/ogp-image.png')  }}">
  <meta property="og:site_name" content="{{ config('app.name') }}{{ config('app.name_description') }}。">
  <meta property="og:description" content="{{ $area->area_name }}の出前・デリバリー・宅配を一括検索するならいえメシへ。全国7サイト39,907店舗のデリバリーを無料で簡単に比較・検索できます。取扱サービスは、Uber Eats, 出前館, ｄデリバリー, 楽天デリバリー, menu, Wolt, foodpanda。">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="iemeci">
  <meta name="twitter:title" content="{{ $area->area_name }}でおすすめの出前・デリバリー・宅配を一括比較 - {{ config('app.name') }}">
  <meta name="twitter:description" content="{{ $area->area_name }}の出前・デリバリー・宅配を一括検索するならいえメシへ。全国7サイト39,907店舗のデリバリーを無料で簡単に比較・検索できます。取扱サービスは、Uber Eats, 出前館, ｄデリバリー, 楽天デリバリー, menu, Wolt, foodpanda。">
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
              <li class="c-topic_path-item">{{ $area->area_name }}</li>
            </ul>
          </div>
          <h1 class="c-page-title">{{ $area->area_name }}の出前・デリバリー・宅配を一括比較</h1>
        </div>

        @if(count($prefs))
        <div class="c-area">
          <ul class="c-area-list">
          @foreach($prefs as $item)
          <li class="c-area-item">
            <a href="{{ route('m_pref.index', ['pref_id' => $item->pref_id]) }}" class="c-area-link">{{ $item->pref_name }}</a>
          </li>
          @endforeach
          </ul>
        </div>
        @else
        <p>地域がありませんでした</p>
        @endif
      </div>
    </main>
  </div>
@endsection

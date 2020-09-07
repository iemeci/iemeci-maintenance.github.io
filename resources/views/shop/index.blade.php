@extends('layouts.app')

@section('content')
    <div class="l-contents_inner">
        <main class="l-main">
            <div class="l-content">
                <div class="c-location-header">
                    <div class="c-location-area"><span class="c-location-post_number">〒 {{ $post_address[1] }}</span><span class="c-location-address">{{ $post_address[2] }}</span></div>
                    <div class="c-location-count"><span class="c-location-count_num">{{ $shops->total() }}</span><span class="c-location-count_unit">件</span></div>
                </div>
                @if($shops->total())
                    <div class="c-location-suggestion"><a href="https://forms.gle/vEtrG3QMQ1LwXFnz6" target="_blank">リンクの修正を提案</a></div>
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
                                                @if ( $shop->shop_url_d_delivery || $shop->shop_url_rakuten_delivery )
                                                    <ul class="c-shop-enable_list">
                                                        @if ( $shop->shop_url_d_delivery )
                                                            <li class="c-shop-enable_item"><a
                                                                    class="c-shop-enable_link c-shop-enable_link__line-delima"
                                                                    href="https://px.a8.net/svt/ejp?a8mat=3BG3ZA+XXR16+3CLO+BW8O2&a8ejpredirect={{ urlencode('https://delivery.dmkt-sp.jp' . $shop->shop_url_d_delivery) }}"
                                                                    rel="nofollow">dデリバリー</a>
                                                                <img border="0" width="1" height="1"
                                                                     src="https://www11.a8.net/0.gif?a8mat=3BG3ZA+XXR16+3CLO+BW8O2"
                                                                     alt="">
                                                            </li>
                                                        @endif
                                                        @if ( $shop->shop_url_rakuten_delivery )
                                                            <li class="c-shop-enable_item"><a
                                                                    class="c-shop-enable_link c-shop-enable_link__uber-eats"
                                                                    href="https://px.a8.net/svt/ejp?a8mat=3BG3ZA+XXR16+3CLO+BW8O2&a8ejpredirect={{ urlencode('https://delivery.rakuten.co.jp' . $shop->shop_url_rakuten_delivery) }}">楽天デリバリー</a>
                                                                <img border="0" width="1" height="1"
                                                                     src="https://www16.a8.net/0.gif?a8mat=2NQTU1+2MNYQI+2HOM+BW8O1"
                                                                     alt="">
                                                            </li>
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
                    {{ $shops->appends(['lat' => $lat, 'lng' => $lng])->links('pagination::default') }}
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

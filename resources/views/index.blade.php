@extends('layouts.app')

@section('content')
    <div class="l-contents_inner">
        <main class="l-main">
            <div class="l-content">
                <div class="c-catch">
                    <div class="c-catch-catch">
                        <div class="c-catch-visual"></div>
                        <div class="c-catch-button-wrap">
                            <div class="c-catch-button-area">
                                <form action="{{ route('shop.index') }}" name="submit_location">
                                    <input type="hidden" name="lat" value="">
                                    <input type="hidden" name="lng" value="">
                                    <button class="c-catch-button js-submit-location"><i class="c-catch-button-icon"></i><span class="c-catch-button-label">配達可能なお店を探す</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-sns">
                    <ul class="c-sns-list">
                        <li class="c-sns-item"><a href="https://social-plugins.line.me/lineit/share?url=https://iemeci.com/" target="blank"><img src="{{ asset('img/btn_line.svg') }}" alt="LINE" width="40" height="40"></a></li>
                        <li class="c-sns-item"><a href="https://www.facebook.com/sharer/sharer.php?u=https://iemeci.com/" target="blank"><img src="{{ asset('img/btn_facebook.svg') }}" alt="Facebook" width="40" height="40"></a></li>
                        <li class="c-sns-item"><a href="https://twitter.com/intent/tweet?url=https://iemeci.com/" target="blank"><img src="{{ asset('img/btn_twitter.svg') }}" alt="Twitter" width="40" height="40"></a></li>
                        <li class="c-sns-item"><a class="js-copy" href="javascript:void(0);" target=""><img src="{{ asset('img/btn_link.svg') }}" alt="コピー" width="40" height="40"></a></li>
                    </ul>
                </div>
                <div class="c-hero">
                    <h1 class="c-hero-heading">食べログの点数で探せる、<br>宅配サービス一括検索サイト</h1>
                    <div class="c-hero-content">
                        <p class="c-hero-paragraph">お店に行かなくても美味しいご飯が食べたい！</p>
                        <p class="c-hero-paragraph">だけど、宅配サービスですぐに目につくのはチェーン店ばかり。しかも、宅配サービスごとに提供しているお店が違うので、美味しいお店を見落としがち。<br></p>
                        <p class="c-hero-paragraph">そこで、普段使い慣れた食べログの情報を参照しながら、宅配サービスを横断してお店を探せるサービスを開発しました。お家にいながら、ぜひ美味しいご飯を開拓してみてください。</p>
                    </div>
                </div>
                <div class="c-services">
                    <h2 class="c-services-heading">現在対応している宅配サービス</h2>
                    <ul class="c-services-list">
                        <li class="c-services-item">出前館</li>
                        <li class="c-services-item">LINEデリマ</li>
                        <li class="c-services-item">dデリバリー</li>
                        <li class="c-services-item">Uber Eats</li>
                    </ul>
                </div>
            </div>
        </main>
    </div>
@endsection

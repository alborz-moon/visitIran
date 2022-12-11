@extends('layouts.structure')
@section('content')
<main class="page-content TopParentBannerMoveOnTop">
    <div class="container">
        <!-- start of product-detail-container -->
        <div class="product-detail-container mb-5">
            <div class="row">
                {{-- @include('shop.product.bookmark') --}}
                <div class="col-lg-9 col-md-12 mb-md-0 mb-4">
                    <!-- start of product-gallery -->
                    <div class="bold colorBlack fontSize20">{{ $event['title'] }}</div>
                    <div class="colorBlack fontSize15">کد : <span>17486931867</span></div>

                    <div
                        class="d-flex justify-content-center align-items-center customBoxShadowGallery mb-3 imgSizeEvent">
                        <img class="w-100 h-100 pt-0 p-4" src="{{ $event['img'] }}" alt="">
                    </div>
                    <div class="customBoxShadowGallery">
                        <div class="d-flex alignItemsCenter flexWrap spaceBetween mb-4">
                            <span class="ui-box-title fontSize20">
                                <img class="p-2" src="{{ asset('./theme-assets/images/svg/headlineTitle.svg') }}"
                                    alt="">ثبت نام حضوری
                                <span class="colorYellow fontSize12">مهلت ثبت نام تا
                                    {{ $event['end_registry'] }} ساعت {{ $event['end_registry_time'] }}</span>
                            </span>
                            @if ( $event['price'] != null)
                            <div>
                                <span class="textColor fontSize18 bold px-3">{{ $event['price'] }}</span>
                                <span class="yellowColor fontSize15">ت</span>
                            </div>
                            @endif
                        </div>
                        <div class="d-flex spaceBetween p-3">
                            <div>
                                <div class="bold textColor">{{ $event['title'] }}</div>
                                <div class="colorBlack">{{ $event['ticket_description'] }}</div>
                            </div>
                            <div>
                                <div class="product-seller-row product-remaining-in-stock spaceBetween">
                                    <div class="bold textColor d-flex align-items-center ">
                                        <div>تعداد شرکت کننده :</div>
                                    </div>
                                    <div class="num-block fa-num me-3">
                                        <span class="num-in">
                                            <span
                                                class="icon-visit-Exclusion1 countPlus customColorBlack d-flex justify-content-center align-items-center"></span>
                                            <input name="counter" type="text" value="1" readonly="">
                                            <span
                                                class="icon-visit-Exclusion2 countMinus customColorBlack d-flex justify-content-center align-items-center"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex flexWrap align-items-center spaceBetween p-3">
                            <div class="d-flex align-items-center">
                                <input style="min-width: 200px" class="form-control" placeholder="کد تخفیف ">
                                <button id=""
                                    class="btn btn-primary backgroundGray alignSelfEnd customBtnAddress mx-3">ثبت</button>
                            </div>
                            <div>
                                <button class="btn btn-primary px-5 p-sm-3">ثبت نام</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 p-0">
                    <div class="ui-sticky ui-sticky-top StickyMenuMoveOnTop">
                        {{-- <div class="d-flex justify-content-end">
                            <span>
                                <button
                                    class="ri-bookmark-line fontSize30 b-0 colorWhiteGray btnHover backColorWhite"></button>
                                <button
                                    class="ri-bookmark-fill fontSize30 b-0 colorYellow btnHover backColorWhite"></button>
                                <button data-remodal-target="share-modal"
                                    class="ri-stackshare-line fontSize30 b-0 colorWhiteGray btnHover backColorWhite"></button>
                            </span>
                        </div> --}}
                        {{-- @include('shop.product.write-comment', ['productId' => $product['id']]) --}}
                        {{-- @include('event.event.bookmark', ['is_bookmark' => $event['is_bookmark']]) --}}
                        <!-- start of product-seller-info -->
                        <div class="product-seller-info ui-box mb-3">
                            {{-- <div class="top30 position-absolute fontSize22 colorYellow">
                                        <i class="icon-visit-organization"></i>
                                    </div> --}}
                            <div class="seller-info-changeable">
                                <div class="d-flex align-items-center">
                                    <div class="userCircleSize backgroundYellow mx-3 position-relative">
                                        <i
                                            class="icon-visit-organization fontSize28 colorWhite position-absolute padding10 "></i>
                                    </div>
                                    <div class="d-flex flexDirectionColumn marginTop8">
                                        <div class="fontSize15 bold colorBlack">{{ $event['launcher_title'] }}</div>
                                        <div class="d-flex mt-2">
                                            <div class=" align-items-center px-2 px-2 fontSize15 colorYellow"><i
                                                    class=" fontSize15 icon-visit-star me-1 fontSize14 verticalAlign-2"></i>
                                                {{ $event['launcher_rate'] }}</div><span>(از {{ $event['launcher_rate_count'] }} رای)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-1 mb-2">
                                    <button class="buttonBasketEvent">
                                        <span class="colorWhiteGray fontSize13 paddingRight5 px-2">مشاهده</span>
                                        <i class="icon-visit-eye colorWhiteGray verticalAlign-2 px-2"></i>
                                    </button>
                                    <button id="followToggle" data-select="{{ $event['launcher_is_following'] ? 'on' : 'off' }}" class="buttonBasketEvent {{ $event['launcher_is_following'] ? 'backgroundYellow' : '' }}">
                                        <span class="colorWhiteGray fontSize13 paddingRight5 px-2">دنبال کردن</span>
                                        <i class="icon-visit-person colorWhiteGray verticalAlign-2 px-2"></i>
                                    </button>
                                </div>
                                <hr>
                                <div class="product-seller-row p-0">
                                    <div class="product-seller-row-icon marginTop9">
                                        <!-- <i class="ri-store-3-fill"></i> -->
                                        <i class="icon-visit-date colorYellow"></i>
                                    </div>
                                    <div class="product-seller-row-detail">
                                        <div class="seller-final-score-container p-2">
                                            <div class="seller-rate-container">
                                                <span class="colorYellow bold">از</span>
                                                <span>{{ $event['start'] }}</span>
                                            </div>
                                        </div>
                                        <div class="seller-final-score-container p-2">
                                            <div class="seller-rate-container">
                                                <span class="colorYellow bold">تا</span>
                                                <span>{{ $event['end'] }}</span>
                                            </div>
                                        </div>
                                        <a href="#" class="seller-info-link"></a>
                                    </div>
                                </div>
                                <hr>
                                <div class="product-seller-row p-0">
                                    <div class="product-seller-row-icon marginTop9">
                                        <!-- <i class="ri-store-3-fill"></i> -->
                                        <i class="icon-visit-location colorYellow"></i>
                                    </div>
                                    <div class="product-seller-row-detail">
                                        <div class="seller-final-score-container p-2">
                                            <div class="seller-rate-container">
                                                <span class="colorBlack fontSize15 ">تهران</span>
                                                @if ( $event['type'] == 'online' )
                                                <span class="colorBlack fontSize15 px-2">مجازی</span>
                                                @endif
                                                @if ( $event['type'] == 'offline' )
                                                <span class="colorBlack fontSize15 px-2">حضوری</span>
                                                @endif
                                            </div>
                                        </div>
                                        <a href="#" class="seller-info-link"></a>
                                    </div>
                                </div>
                                <hr>
                                @if($event['tags'] != null)
                                    <div class="product-seller-row p-0">
                                        <div class="product-seller-row-icon marginTop9">
                                            <!-- <i class="ri-store-3-fill"></i> -->
                                            <i class="icon-visit-hashtag colorYellow"></i>
                                        </div>
                                        <div class="product-seller-row-detail">
                                            <div class="seller-final-score-container p-2">
                                                <div class="seller-rate-container">
                                                    @foreach ( $event['tags'] as $tag )
                                                        <span class="fontSize13 colorBlack">{{ $tag}}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <a href="#" class="seller-info-link"></a>
                                        </div>
                                    </div>
                                @endif
                                <hr>
                                <div class="product-seller-row p-0">
                                    <div class="product-seller-row-icon marginTop9">
                                        <!-- <i class="ri-store-3-fill"></i> -->
                                        <i class="icon-visit-language colorYellow"></i>
                                    </div>
                                    <div class="product-seller-row-detail">
                                        <div class="seller-final-score-container p-2">
                                            <div class="seller-rate-container">
                                                @foreach ($event['language'] as $languages)
                                                @if ($languages == 'fa' )
                                                <span class="fontSize13 colorBlack">فارسی</span><span
                                                    class="mx-1">-</span>
                                                @endif
                                                @if ($languages == 'tr' )
                                                <span class="fontSize13 colorBlack">ترکی</span><span
                                                    class="mx-1">-</span>
                                                @endif
                                                @if ($languages == 'en' )
                                                <span class="fontSize13 colorBlack">انگلیسی</span><span
                                                    class="mx-1">-</span>
                                                @endif
                                                @if ($languages == 'gr' )
                                                <span class="fontSize13 colorBlack">آلمانی</span><span
                                                    class="mx-1">-</span>
                                                @endif
                                                @if ($languages == 'fr' )
                                                <span class="fontSize13 colorBlack">فرانسه</span><span
                                                    class="mx-1">-</span>
                                                @endif
                                                @if ($languages == 'ar' )
                                                <span class="fontSize13 colorBlack">عربی</span><span
                                                    class="mx-1">-</span>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <a href="#" class="seller-info-link"></a>
                                    </div>
                                </div>
                                <hr>
                                @if($event['facilities'] != null)
                                <div class="product-seller-row p-0">
                                    <div class="product-seller-row-detail">
                                        <div class="seller-final-score-container p-2">
                                            <div class="seller-rate-container">
                                                <span class="colorBlack fontSize13">امکانات ویژه برای شما :</span>
                                            </div>
                                        </div>
                                        <div class="seller-final-score-container p-2">
                                            <div class="seller-rate-container">
                                               
                                                    @foreach ($event['facilities'] as $facility)
                                                        <div class="colorBlack fontSize12 fontNormal">
                                                            {{ $facility }}
                                                        </div>
                                                    @endforeach
                                                
                                            </div>
                                        </div>
                                        <a href="#" class="seller-info-link"></a>
                                    </div>
                                </div>
                                <hr>
                                @endif
                                <div class="product-seller-row p-0 pb-2">
                                    <div class="product-seller-row-detail">
                                        <div class="seller-final-score-container p-2">
                                            <div class="seller-rate-container">
                                                <span class="colorBlack fontSize13">شرایط سنی:</span>
                                            </div>
                                        </div>
                                        <div class="seller-final-score-container p-2">
                                            <div class="seller-rate-container">
                                                @if ($event['age_description'] == 'teen' )
                                                <div class="colorBlack fontSize12 fontNormal">
                                                    نوجوانان ۱۰ تا ۱۸ سال
                                                </div>
                                                @endif
                                                @if ($event['age_description'] == 'all' )
                                                <div class="colorBlack fontSize12 fontNormal">
                                                    همه سنین
                                                </div>
                                                @endif
                                                @if ($event['age_description'] == 'child' )
                                                <div class="colorBlack fontSize12 fontNormal">
                                                    کودکان تا ۱۰ سال
                                                </div>
                                                @endif
                                                @if ($event['age_description'] == 'adult' )
                                                <div class="colorBlack fontSize12 fontNormal">
                                                    بزرگسال
                                                </div>
                                                @endif
                                                @if ($event['age_description'] == 'old' )
                                                <div class="colorBlack fontSize12 fontNormal">
                                                    بازنشستگان
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <a href="#" class="seller-info-link"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end of product-seller-info -->
                        <!-- start of product-seller-info -->
                       
                        <div class="product-seller-info ui-box p-0">
                            <div class="seller-info-changeable">
                                @if( $event['address'] != null)
                                <div class="product-seller-row p-0">
                                    <div class="product-seller-row-icon marginTop9">
                                        <!-- <i class="ri-store-3-fill"></i> -->
                                        <i class="icon-visit-location colorYellow"></i>
                                    </div>
                                    <div class="product-seller-row-detail">
                                        <div class="seller-final-score-container p-2">
                                            <div class="seller-rate-container">
                                                <span class="fontSize13 fontNormal colorBlack">
                                                    {{ $event['address'] }}
                                                </span>
                                            </div>
                                        </div>
                                        <a href="#" class="seller-info-link"></a>
                                    </div>
                                </div>
                                @endif
                                <div class="d-flex justify-content-end mt-1 mb-2">
                                    <button class="buttonBasketEvent">
                                        <span class="colorWhiteGray fontSize13 paddingRight5 px-2">مشاهده رو نقشه</span>
                                        <i class="icon-visit-eye colorWhiteGray verticalAlign-2 px-2"></i>
                                    </button>
                                    <button class="buttonBasketEvent">
                                        <span class="colorWhiteGray fontSize13 paddingRight5 px-2">مسیر یابی</span>
                                        <i class="icon-visit-location colorWhiteGray verticalAlign-2 px-2"></i>
                                    </button>
                                </div>
                                <hr>
                                @if($event['phone'] != null)
                                <div class="product-seller-row p-0">
                                    <div class="product-seller-row-icon marginTop9">
                                        <i class="icon-visit-phone colorYellow"></i>
                                    </div>
                                    <div class="product-seller-row-detail">
                                        <div class="seller-final-score-container p-2">
                                            <div class="seller-rate-container">
                                                @foreach ($event['phone'] as $phone)
                                                <span class="colorBlack">{{ $phone }}</span><span class="mx-1">-</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                @endif
                                 @if( $event['email'] != null)
                                <div class="product-seller-row p-0">
                                    <div class="product-seller-row-icon marginTop9">
                                        <i class="icon-visit-mail colorYellow"></i>
                                    </div>
                                    <div class="product-seller-row-detail">
                                        <div class="seller-final-score-container p-2">
                                            <div class="seller-rate-container ">
                                                <div class="colorBlack fontSize15 px-2 d-flex justify-content-end">
                                                    {{$event['email']}}</div>
                                            </div>
                                        </div>
                                        <a href="#" class="seller-info-link"></a>
                                    </div>
                                </div>
                                @endif
                                @if ( $event['site'] != null)
                                <hr>
                                <div class="product-seller-row p-0">
                                    <div class="product-seller-row-icon marginTop9">
                                        <i class="icon-visit-website colorYellow"></i>
                                    </div>
                                    <div class="product-seller-row-detail">
                                        <div class="seller-final-score-container p-2">
                                            <div class="seller-rate-container ">
                                                <div class="colorBlack fontSize15 px-2 d-flex justify-content-end">
                                                    {{$event['site']}}</div>
                                            </div>
                                        </div>
                                        <a href="#" class="seller-info-link"></a>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <!-- end of product-seller-info -->
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-12 mb-md-0 mb-4">
                <div class="ui-sticky ui-sticky-top mb-4 StickyMenuMoveOnTop">
                    <!-- start of product-tabs -->
                    <div class="product-tabs overFlowHidden">
                        <ul class="nav nav-pills">
                            <li id="checkNavLink" class="nav-item">
                                <a id="nav1" class="nav-link my-nav-link active" href="#scrollspyHeading1"
                                    data-scroll="scrollspyHeading1">توضیحات</a>
                            </li>
                            <li id="propertyNavLink" class="nav-item">
                                <a id="nav2" class="nav-link my-nav-link" href="#scrollspyHeading3"
                                    data-scroll="scrollspyHeading3">گالری عکس</a>
                            </li>
                            <li id="commentNavLink" class="nav-item">
                                <a id="nav3" class="nav-link my-nav-link" href="#scrollspyHeading4"
                                    data-scroll="scrollspyHeading4">دیدگاه ها</a>
                            </li>
                        </ul>
                    </div>
                    <!-- end of product-tabs -->
                </div>
                <!-- start of product-content-expert-summary -->
                <div class="details product-tab-content product-content-expert-summary tab-content pb-2 mb-4"
                    id="scrollspyHeading1">
                    <div class="product-tab-title">
                        <div class="fontSize18 bold ">بررسی بشقاب میناکاری گرد رنگ آبی طرح ستاره مدل 1000100013</div>
                    </div>
                    <div id="checkHeight" class="expandable-text pt-1 ">
                        <div class="expandable-text_text" id="getInnerHeight">
                            <p>
                                گوشی موبایل «iPhone 13» پرچم‌دار جدید شرکت اپل است که با چند ویژگی جدید و دوربین دوگانه
                                روانه بازار شده است. اپل برای ویژگی‌ها و طراحی کلی این گوشی از همان فرمول چند سال اخیرش
                                استفاده کرده است. نمایشگر آیفون 13 به پنل Super Retina مجهز ‌شده است تا تصاویر بسیار
                                مطلوبی را به کاربر عرضه کندوشی‌های iPhone خود پردازنده گرافیکی‌ای را قرار داده که از سری 12 گوشی‌های خود 30
                                درصد سریع‌تر است و این نویدبخش آن است که شما می‌توانید بازی‌هایی را با گرافیک و MAP
                                سنگین تر و بزرگ‌تر اجرا کنید. یکی از ویژگی‌هایی که در iPhone 13 شاهد هستیم سیستم
                                فیلمبرداری ProRes سینمایی آن است که می تواند انقلابی در فیلمبرداری گوشی‌های موبایل
                                به‌راه انداخته باشد. این قابلیت می‌تواند نسبت به صورت روبرو بین افراد و یا بین فرد و
                                اشیا فوکوس و بِلار داشته باشد.
                            </p>

                        </div>
                        <div
                            class="expandable-text-expand-btn justify-content-start text-sm d-flex justify-content-end">
                            <span class="show-more active">
                                ادامه مطلب <i class="ri-arrow-down-s-line ms-2"></i>
                            </span>
                            <span class="show-less d-none">
                                مشاهده کمتر <i class="ri-arrow-up-s-line ms-2"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- end of product-content-expert-summary -->
                <!-- start of product-params -->
                <div class="product-tab-content product-params tab-content pb-2 mb-4" id="scrollspyHeading3">
                    <div class="product-tab-title">
                        {{-- {{ $product['name'] }} --}}
                        <div class="fontSize18 bold">گالری عکس </div>
                    </div>
                    <div class="expandable-text pt-1" style="height: auto">
                        <div class="expandable-text_text fa-num">
                            <!-- start of params-list -->
                            <div class="params-list">
                                <ul id="params-list-div"></ul>
                            </div>
                            <!-- end of params-list -->
                        </div>
                    </div>
                </div>
                <!-- end of product-params -->
                <!-- start of product-params -->
                <div class="product-tab-content product-params tab-content pb-2 mb-4" id="scrollspyHeading4">
                    <div class="product-tab-title">
                        {{-- {{ $product['name'] }} --}}
                        <div class="fontSize18 bold mb-5">دیدگاه ها </div>
                        @include('shop.product.write-comment', ['itemId' => $event['id'], ])
                        {{-- @include('shop.product.write-comment', ['productId' => $product['id']]) --}}                        
                    </div>
                    <div class="expandable-text pt-1" style="height: auto">
                        <div class="expandable-text_text fa-num">
                            <!-- start of params-list -->
                            <div class="params-list">
                                <ul id="params-list-div"></ul>
                            </div>
                            <!-- end of params-list -->
                        </div>
                    </div>
                </div>
                <!-- end of product-params -->
                {{-- @include('shop.product.comments-show', [
                    'type' => 'event', 
                    'fetchUrl' => route('api.product.comment.list', ['product' => $product['id']]), 
                    'itemtId' => $product['id'],
                    'rate' => $product['rate'],
                    'rate_count' => $product['all_rates_count']
                ]) --}}
            </div>

        </div>
        <!-- end of product-detail-container -->
</main>
@stop

@section('footer')
@parent
@stop

@section('extraJS')
@parent
<script>
$(document).ready(function() {
    //getInnerHeight
    heightTag = $('#getInnerHeight').height();
    if (heightTag < 400) {
        $('#checkHeight').addClass('hidden').css('height', 'auto');
    } else {
        $('#checkHeight').css('height', '400px');
    }
    $('#nav1').on('click', function() {
        $(".my-nav-link").removeClass('active');
        $('#nav1').addClass('active');
    });

    $('#nav2').on('click', function() {
        $(".my-nav-link").removeClass('active');
        $('#nav2').addClass('active');
    });

    $('#nav3').on('click', function() {
        $(".my-nav-link").removeClass('active');
        $('#nav3').addClass('active');
    });

    var width = $(document).width();

    if (width < 768) {
        $('#commentNavLink').click(function() {
            $('html, body').animate({
                'scrollTop': $('#scrollspyHeading4').offset().top - 60
            });
        });

        $('#propertyNavLink').click(function() {
            $('html, body').animate({
                'scrollTop': $('#scrollspyHeading3').offset().top - 60
            });
        });

        $('#checkNavLink').click(function() {
            $('html, body').animate({
                'scrollTop': $('#scrollspyHeading1').offset().top - 60
            });
        });

    } else {
        $('#commentNavLink').click(function() {
            $('html, body').animate({
                'scrollTop': $('#scrollspyHeading4').offset().top - 210
            });
        });

        $('#propertyNavLink').click(function() {
            $('html, body').animate({
                'scrollTop': $('#scrollspyHeading3').offset().top - 210
            });
        });

        $('#checkNavLink').click(function() {
            $('html, body').animate({
                'scrollTop': $('#scrollspyHeading1').offset().top - 210
            });
        });
    }
    $('#followToggle').on('click',function(){
        if($(this).attr('data-select') === 'off')
            $('#followToggle').css('backgroundColor','#c59358').attr('data-select', 'on');
        else
            $('#followToggle').css('backgroundColor','transparent').attr('data-select', 'off');
    });
})


$(document).on("click", ".countPlus", function () {    
    let count = $('input[name=counter]').val();
    count++;
});

$(document).on("click", ".countMinus", function () {
    let count = $('input[name=counter]').val();
    count--;
});

</script>
@stop
@extends('layouts.structure')
@section('header')
    @parent
    <script src="https://cdn.parsimap.ir/third-party/mapbox-gl-js/v1.13.0/mapbox-gl.js"></script>
    <link
      href="https://cdn.parsimap.ir/third-party/mapbox-gl-js/v1.13.0/mapbox-gl.css"
      rel="stylesheet"
    />
@stop
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
                    <div class="d-flex justify-content-center align-items-center customBoxShadowGallery mb-3 imgSizeEvent overFlowHidden">
                        <img class="w-100 h-100 pt-0 p-4 objectFitCover" src="{{ $event['img'] }}" alt="">
                    </div>
                    <div class="customBoxShadowGallery">
                        <div class="d-flex alignItemsCenter flexWrap spaceBetween mb-4">
                            <span class="ui-box-title fontSize20">
                                <img class="p-2" src="{{ asset('./theme-assets/images/svg/headlineTitle.svg') }}"
                                    alt="">ثبت نام حضوری
                                <span class="colorYellow fontSize12">مهلت ثبت نام تا
                                    {{ $event['end_registry'] }} ساعت {{ $event['end_registry_time'] }}</span>
                            </span>
                        </div>
                        <div class="d-flex spaceBetween p-3">
                            <div>
                                <div class="bold textColor">{{ $event['title'] }}</div>
                                <div class="colorBlack">{{ $event['ticket_description'] }}</div>
                            </div>
                        </div>
                        <div class="spaceBetween p-3">
                            @if ( $event['price'] != null)
                                <div class="px-2">
                                    <span id="price" class="textColor fontSize18 bold">{{ $event['price'] }}</span>
                                    <span class="colorYellow fontSize22 bold">ت</span>
                                </div>
                            @endif
                            <div class="product-seller-row product-remaining-in-stock spaceBetween">
                                <div class="bold textColor d-flex align-items-center ">
                                    <div class="whiteSpaceNoWrap">تعداد شرکت کننده :</div>
                                </div>
                                <div class="num-block fa-num me-3">
                                    <span class="num-in b-0">
                                        <span
                                            class="icon-visit-Exclusion1 countPlus customColorBlack d-flex justify-content-center align-items-center"></span>
                                        <input id="counter" name="counter" type="text" value="1" readonly="">
                                        <span class="fontSize12 peopleCount">نفر</span>
                                        <span
                                            class="icon-visit-Exclusion2 countMinus customColorBlack d-flex justify-content-center align-items-center"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex flexWrap align-items-center spaceBetween p-3">
                            <div class="d-flex gap10 align-items-center">
                                <input style="min-width: 200px" class="form-control" placeholder="کد تخفیف">
                                <button class="btn btn-primary backgroundGray h-50">ثبت</button>
                            </div>
                            <button style="min-width: 290px" class="fontSize18 bold btn btn-primary h-50 ">ثبت نام 
                                <span id="allPrice" class="fontSize16 px-1"></span>
                                <span class="fontSize16 px-1">تومان</span>
                            </button>
                        </div>
                    </div>
                    <div id="customEventHandlerMobile">
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
                        <div class="product-seller-info ui-box mb-3 backColorWhite">
                            {{-- <div class="top30 position-absolute fontSize22 colorYellow">
                                        <i class="icon-visit-organization"></i>
                                    </div> --}}
                            <div class="seller-info-changeable">
                                <div class="d-flex align-items-center">
                                    <div class="userCircleSize backgroundYellow mx-3 position-relative">
                                        <i class="icon-visit-organization fontSize28 colorWhite position-absolute padding10 "></i>
                                    </div>
                                    <div class="d-flex flexDirectionColumn marginTop8">
                                        <div class="fontSize15 bold colorBlack">{{ $event['launcher_title'] }}</div>
                                        <div class="d-flex mt-2 spaceBetween">
                                            <div class="px-2 px-2 fontSize15 colorYellow">
                                                <i class=" fontSize15 icon-visit-star me-1 fontSize14 verticalAlign-2"></i>
                                                {{ $event['launcher_rate'] }}<span class="textColor">(از {{ $event['launcher_rate_count'] }} رای)</span></div>
                                                <div class="px-2 px-2 fontSize15 colorYellow"><i
                                                        class=" fontSize15 icon-visit-person me-1 fontSize14 verticalAlign-2"></i>
                                                    {{ $event['launcher_follower_count'] }}
                                                </div>
                                        </div>
                                        <div class="mt-2">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex spaceBetween mt-1 mb-2">
                                    <button class="whiteSpaceNoWrap buttonBasketEvent btnEventHover d-flex alignItemsCenter">
                                        <a href="{{ $launcherHref }}" class="colorWhiteGray fontSize13 px-2 d-flex">مشاهده</a>
                                        <i class="icon-visit-eye colorWhiteGray d-flex px-2"></i>
                                    </button>
                                    <button data-select="{{ $event['launcher_is_following'] ? 'on' : 'off' }}" class=" d-flex alignItemsCenter whiteSpaceNoWrap buttonBasketEvent followToggle {{ $event['launcher_is_following'] ? 'backgroundYellow' : '' }}">
                                        <span class="colorWhiteGray fontSize13 px-2 d-flex folllowText">دنبال کردن</span>
                                        <i class="icon-visit-person colorWhiteGray d-flex px-2"></i>
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
                                                        <span class="fontSize14 fontWight400 colorBlack">{{ $tag}}</span>
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
                                                <?php $i = 0 ?>
                                                @foreach ($event['language'] as $lang)
                                                    <span class="fontSize14 fontWight400 colorBlack">
                                                        @lang($lang)
                                                        @if($i < count($event['language']) - 1)
                                                            <span class="mx-1">-</span>
                                                        @endif
                                                    </span>
                                                    <?php $i++; ?>
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
                                                    <div class="colorBlack fontSize14 fontWight400">
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
                                                <div class="colorBlack fontSize14 fontWight400">
                                                    نوجوانان ۱۰ تا ۱۸ سال
                                                </div>
                                                @endif
                                                @if ($event['age_description'] == 'all' )
                                                <div class="colorBlack fontSize14 fontWight400">
                                                    همه سنین
                                                </div>
                                                @endif
                                                @if ($event['age_description'] == 'child' )
                                                <div class="colorBlack fontSize14 fontWight400">
                                                    کودکان تا ۱۰ سال
                                                </div>
                                                @endif
                                                @if ($event['age_description'] == 'adult' )
                                                <div class="colorBlack fontSize14 fontWight400">
                                                    بزرگسال
                                                </div>
                                                @endif
                                                @if ($event['age_description'] == 'old' )
                                                <div class="colorBlack fontSize14 fontWight400">
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
                                <div class="d-flex alignItemsCenter spaceBetween gap10 p-1">
                                    <button data-remodal-target="modal-map" class="buttonBasketEvent whiteSpaceNoWrap btnEventHover mapModalBtn">
                                        <span class="colorWhiteGray fontSize14 fontWight400 px-1">مشاهده رو نقشه</span>
                                        <i class="icon-visit-eye colorWhiteGray verticalAlign-2 px-1"></i>
                                    </button>
                                    <button class="buttonBasketEvent whiteSpaceNoWrap btnEventHover">
                                        <a target="_blank" href="https://www.google.com/maps/dir/?api=1&destination={{ $event['launcher_x'] . ',' . $event['launcher_y'] }}" class="colorWhiteGray fontSize14 fontWight400 px-1">مسیر یابی</a>
                                        <i class="icon-visit-location colorWhiteGray verticalAlign-2 px-1"></i>
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
                                                    <a href="tel:{{$phone}}" class="colorBlack fontSize14 fontWight400">{{ $phone }}</a><span class="mx-1">-</span>
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
                                                <a href="mailto:{{$event['email']}}" class="colorBlack fontSize14 fontWight400 px-2 d-flex justify-content-end">
                                                    {{$event['email']}}
                                                </a>
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
                                                <a href="{{ $event['site'] }}" class="ltr colorBlack fontSize14 fontWight400 px-2 d-flex justify-content-end">
                                                    {{$event['site']}}
                                                </a>
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
                    <div class="ui-sticky ui-sticky-top mb-4 StickyMenuMoveOnTop">
                    <!-- start of product-tabs -->
                    <div class="product-tabs overFlowHidden">
                        <ul class="nav nav-pills">
                            @if ($event['description'] != null)
                            <li id="checkNavLink" class="nav-item">
                                <a id="nav1" class="nav-link my-nav-link active" href="#scrollspyHeading1"
                                    data-scroll="scrollspyHeading1">توضیحات</a>
                            </li>
                            @endif
                            @if ( $galleries != null)
                            <li id="propertyNavLink" class="nav-item">
                                <a id="nav2" class="nav-link my-nav-link" href="#scrollspyHeading3"
                                    data-scroll="scrollspyHeading3">گالری عکس</a>
                            </li>
                            @endif
                            <li id="commentNavLink" class="nav-item">
                                <a id="nav3" class="nav-link my-nav-link" href="#scrollspyHeading4"
                                    data-scroll="scrollspyHeading4">دیدگاه ها</a>
                            </li>
                        </ul>
                    </div>
                    <!-- end of product-tabs -->
                </div>
                <!-- start of product-content-expert-summary -->
                @if ($event['description'] != null)
                        <div class="details product-tab-content product-content-expert-summary tab-content  pb-2 mb-4"
                            id="scrollspyHeading1">
                            <div class="product-tab-title">
                                <div class="fontSize18 bold ">توضیحات</div>
                            </div>
                            <div class="pt-1" id="intro-container-parent">
                                <div id="intro-container" class="expandable-text_text">
                                    {!! $event['description'] !!}
                                </div>
                                <div id="show-more-container-for-intro" class="expandable-text-expand-btn justify-content-start text-sm d-flex justify-content-end hidden">
                                    <span class="show-more active">
                                        ادامه مطلب <i class="ri-arrow-down-s-line ms-2"></i>
                                    </span>
                                    <span class="show-less d-none">
                                        مشاهده کمتر <i class="ri-arrow-up-s-line ms-2"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                @endif
                <!-- end of product-content-expert-summary -->
                <!-- start of product-params -->
                @if ( $galleries != null)
                <div class="product-tab-content product-params tab-content pb-2 mb-4" id="scrollspyHeading3">
                    <div class="product-tab-title">
                        {{-- {{ $product['name'] }} --}}
                    <div class="fontSize18 bold">گالری عکس </div>
                    </div>
                    <div class="expandable-text pt-1" style="height: auto">
                        <div class="expandable-text_text fa-num">
                            <div class="gap10">
                                <ul id="gallery" class="d-flex flexWrap gap10">
                                    @foreach ($galleries as $img)
                                        <div class="gallery-thumbs overFlowHidden">
                                            <li class="square cursorPointer customBoxShadowGallery" style="width: 130px; height:130px" data-fancybox="gallery-a" data-src="{{ $img['img']}}">
                                                <img class="w-100 h-100 objectFitCover m-0" src="{{ $img['img']}}" alt="">
                                            </li>
                                        </div>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <!-- end of product-params -->
                <!-- start of product-params -->
                <div class="product-tab-content product-params tab-content pb-2 mb-4" id="scrollspyHeading4">
                    <div class="product-tab-title">
                        {{-- {{ $product['name'] }} --}}
                        <div class="fontSize18 bold mb-5">دیدگاه ها </div>
                        @include('shop.product.write-comment', 
                        ['itemId' => $event['id'],
                        'itemImg' => $event['img'],
                        'itemName' => $event['title'], 
                        'sendComment' => route('event.event_comment.store', 
                        ['event' => $event['id']])])
                        
                        @include('shop.product.comments-show', [
                            'type' => 'event', 
                            'fetchUrl' => route('event.event_comment.list', 
                            ['event' => $event['id']]), 
                            'itemtId' => $event['id'],
                            'rate' => $event['launcher_rate'],
                            'rate_count' => $event['launcher_rate_count']
                        ])                     
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
                        @include('event.layouts.launcher', ['launcher' => null, 'launcherId' => $event['launcher_id']])
                </div>
                </div>
                <div class="col-xl-3 col-lg-3 p-0 customEventHandler">
                    <div class="ui-sticky ui-sticky-top StickyMenuMoveOnTop">
                        <div class="product-seller-info ui-box mb-3 backColorWhite">
                            <div class="seller-info-changeable">
                                <div class="d-flex align-items-center">
                                    <div class="userCircleSize backgroundYellow mx-3 position-relative">
                                        <i class="icon-visit-organization fontSize28 colorWhite position-absolute padding10 "></i>
                                    </div>
                                    <div class="d-flex flexDirectionColumn marginTop8">
                                        <div class="fontSize15 bold colorBlack">{{ $event['launcher_title'] }}</div>
                                        <div class="d-flex mt-2 spaceBetween">
                                            <div class="px-2 px-2 fontSize15 colorYellow"><i
                                                    class=" fontSize15 icon-visit-star me-1 fontSize14 verticalAlign-2"></i>
                                                {{ $event['launcher_rate'] }}<span class="textColor">(از {{ $event['launcher_rate_count'] }} رای)</span></div>
                                                <div class="px-2 px-2 fontSize15 colorYellow">
                                                    <i class=" fontSize15 icon-visit-person me-1 fontSize14 verticalAlign-2"></i>
                                                    {{ $event['launcher_follower_count'] }}
                                                </div>
                                        </div>
                                        <div class="mt-2">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex spaceBetween mt-1 mb-2">
                                    <button class="whiteSpaceNoWrap buttonBasketEvent btnEventHover d-flex alignItemsCenter">
                                        <a href="{{ $launcherHref }}" class="colorWhiteGray fontSize13 px-2 d-flex">مشاهده</a>
                                        <i class="icon-visit-eye colorWhiteGray d-flex px-2"></i>
                                    </button>
                                    <button data-select="{{ $event['launcher_is_following'] ? 'on' : 'off' }}" class=" d-flex alignItemsCenter whiteSpaceNoWrap buttonBasketEvent followToggle {{ $event['launcher_is_following'] ? 'backgroundYellow' : '' }}">
                                        <span class="colorWhiteGray fontSize13 px-2 d-flex folllowText">دنبال کردن</span>
                                        <i class="icon-visit-person colorWhiteGray d-flex px-2"></i>
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
                                                        <span class="fontSize14 fontWight400 colorBlack">{{ $tag}}</span>
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
                                                <?php $i = 0 ?>
                                                @foreach ($event['language'] as $lang)
                                                    <span class="fontSize14 fontWight400 colorBlack">
                                                        @lang($lang)
                                                        @if($i < count($event['language']) - 1)
                                                            <span class="mx-1">-</span>
                                                        @endif
                                                    </span>
                                                    <?php $i++; ?>
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
                                                        <div class="colorBlack fontSize14 fontWight400">
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
                                                <div class="colorBlack fontSize14 fontWight400">
                                                    نوجوانان ۱۰ تا ۱۸ سال
                                                </div>
                                                @endif
                                                @if ($event['age_description'] == 'all' )
                                                <div class="colorBlack fontSize14 fontWight400">
                                                    همه سنین
                                                </div>
                                                @endif
                                                @if ($event['age_description'] == 'child' )
                                                <div class="colorBlack fontSize14 fontWight400">
                                                    کودکان تا ۱۰ سال
                                                </div>
                                                @endif
                                                @if ($event['age_description'] == 'adult' )
                                                <div class="colorBlack fontSize14 fontWight400">
                                                    بزرگسال
                                                </div>
                                                @endif
                                                @if ($event['age_description'] == 'old' )
                                                <div class="colorBlack fontSize14 fontWight400">
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
                                                <span class="fontSize14 fontWight400 colorBlack">
                                                    {{ $event['address'] }}
                                                </span>
                                            </div>
                                        </div>
                                        <a href="#" class="seller-info-link"></a>
                                    </div>
                                </div>
                                @endif
                                <div class="d-flex alignItemsCenter spaceBetween gap10 p-1">
                                    <button data-remodal-target="modal-map" class="buttonBasketEvent whiteSpaceNoWrap btnEventHover mapModalBtn">
                                        <span class="colorWhiteGray fontSize14 fontWight400 px-1">مشاهده رو نقشه</span>
                                        <i class="icon-visit-eye colorWhiteGray verticalAlign-2 px-1"></i>
                                    </button>
                                    <button class="buttonBasketEvent whiteSpaceNoWrap btnEventHover">
                                        <a target="_blank" href="https://www.google.com/maps/dir/?api=1&destination={{ $event['launcher_x'] . ',' . $event['launcher_y'] }}" class="colorWhiteGray fontSize14 fontWight400 px-1">مسیر یابی</a>
                                        <i class="icon-visit-location colorWhiteGray verticalAlign-2 px-1"></i>
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
                                                    <a href="tel:{{$phone}}" class="colorBlack fontSize14 fontWight400">{{ $phone }}</a><span class="mx-1">-</span>
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
                                                <a href="mailto:{{$event['email']}}" class="colorBlack fontSize14 fontWight400 px-2 d-flex justify-content-end">
                                                    {{$event['email']}}
                                                </a>
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
                                                <a href="{{ $event['site'] }}" class="ltr colorBlack fontSize14 fontWight400 px-2 d-flex justify-content-end">
                                                    {{$event['site']}}
                                                </a>
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
        </div>
        <!-- end of product-detail-container -->
        <div class="remodal remodal-xl" data-remodal-id="modal-map" data-remodal-options="hashTracking: false">
            <div class="remodal-header">
                <div class="remodal-title">مشاهده نقشه</div>
                <button data-remodal-action="close" class="remodal-close"></button>
            </div>
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <div id="launchermap" style="height: 75vh">
                        
                    </div>
                </div>
            </div>
            <div class="remodal-footer">
                <button data-remodal-action="close" class="btn btn-sm btn-primary px-3">بستن</button>
            </div>
        </div>
</main>

<script src="https://cdn.parsimap.ir/third-party/mapbox-gl-js/plugins/parsimap-geocoder/v1.0.0/parsimap-geocoder.js"></script>
<link
  href="https://cdn.parsimap.ir/third-party/mapbox-gl-js/plugins/parsimap-geocoder/v1.0.0/parsimap-geocoder.css"
  rel="stylesheet"
/>

@stop

@section('footer')
@parent
@stop

@section('extraJS')
@parent
<script>
    var map = undefined;
function sendimg(img){
    $("#mainGalleryModal").attr('src', img);
}
$(document).ready(function() {
    let star="";
        let roundRatting=Math.floor('{{ $event['launcher_rate'] }}');
        for(var i = 5; i >= 1; i--) {
            if(i <= roundRatting)
                star += '<i class="icon-visit-star me-1 fontSize21"></i>';
            else
                star += '<i class="icon-visit-staroutline me-1 fontSize14"></i>';
        }
        $(".rattingToStar").empty().append(star);
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
    $('.followToggle').on('click',function() {
        
        @if(!$is_login)
            showErr('لطفا ابتدا ورود کنید');
            return;
        @endif

        let follow = $(this).attr('data-select') === 'off';
        $.ajax({
            type: 'post',
            url: '{{ route('launcher.follow.store', ['launcher' => $event['launcher_id']]) }}',
            data: {
                follow: follow ? 1 : 0
            },
            success: function(res) {

                if(res.status === 'ok') {

                    if(follow) {
                        showSuccess("برگزارکننده دنبال شد !");
                        $('.followToggle').css('backgroundColor','#c59358').attr('data-select', 'on');
                        $(".folllowText").text("دنبال شده");
                    } else{
                        showSuccess("برگزارکننده دنبال نشد !");
                        $('.followToggle').css('backgroundColor','transparent').attr('data-select', 'off');
                        $(".folllowText").text("دنبال کردن");
                    }

                }
                
            }
        });

    });

    let y = parseFloat('{{$event['y']}}');
    let x = parseFloat('{{$event['x']}}');

    $(document).on('click', '.mapModalBtn', function() {
        mapMaker();
    });

    function mapMaker(){
        if(map === undefined) {
        mapboxgl.setRTLTextPlugin(
            'https://cdn.parsimap.ir/third-party/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js',
            null,
        );
        map = new mapboxgl.Map({
            container: 'launchermap',
            style: 'https://api.parsimap.ir/styles/parsimap-streets-v11?key=p1c7661f1a3a684079872cbca20c1fb8477a83a92f',
            center: x !== undefined && y !== undefined ? [y, x] : [51.4, 35.7],
            zoom: 13,
        });
        var marker = undefined;

        if(x !== undefined && y !== undefined) {
            marker = new mapboxgl.Marker();
            marker.setLngLat({lng: y, lat: x}).addTo(map);
        }
    }
    }
    var count = 1; 
    price = parseInt($("#price").text().replaceAll(',', ''));
    updateCount();

    $(".countPlus").on('click', function() {
        count++;
        updateCount();
    });

    $(".countMinus").on('click', function() {
        if(count === 1)
        return;

        count--;
        updateCount();
    });

    function updateCount() { 
        $("#allPrice").text((count * price).formatPrice(0, ",", "."));
        $("#counter").val(count);
    }
    let introHeight = $('#intro-container').height();
        
        if (introHeight >= 400) {
            $("#show-more-container-for-intro").removeClass('hidden');
        }
            
        $("#show-more-container-for-intro .show-more").on('click', function() {
            $('#intro-container-parent').addClass('max-height-auto');
            $('#intro-container').addClass('max-height-auto');
        });
        
        $("#show-more-container-for-intro .show-less").on('click', function() {
            $('#intro-container-parent').removeClass('max-height-auto');
            $('#intro-container').removeClass('max-height-auto');
        });

});



</script>
@stop
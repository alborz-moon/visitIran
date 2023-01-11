@extends('layouts.structure')
@section('content')
{{-- TopParentBannerMoveOnTop --}}
    <div class="TopParentBannerMoveOnTop">
        <div class="w-100 h-240">
            <img src="{{ $launcher['back_img']}}" class="w-100 h-100 objectFitCover backgroundYellow overFlowHidden"  alt="">
            <div class="container">
                <div class="row">
                    <div class="col-12 position-relative">
                        <div class="followImage position-absolute backgroundColorBlue">
                            <img class="w-100 h-100 objectFitCover" src="{{ $launcher['img']}}" alt="">
                        </div>
                        <div class="followLabel position-absolute p-2 px-4">
                            <div class="fontSize22 bold">{{ $launcher['company_name']}}</div>
                            <div class="spaceBetween gap15">
                                <div style="display: flex!important" class="align-items-center px-2 fontSize14 fontWight400 colorYellow"><i class=" fontSize14 fontWight400 icon-visit-star me-1 fontSize14 verticalAlign-2"></i> {{ $launcher['rate']}}<span class="textColor mx-1">(از <span id="rate_count">{{ $launcher['rate_count']}}</span> رای)</span></div>
                            </div>
                        </div>
                        <div class="position-absolute zIndex2 followBtn">
                            <button id="followToggle" data-select="off" class="buttonBasketEvent">
                                <span class="colorWhiteGray fontSize13 paddingRight5 px-2">دنبال کردن</span>
                                <i class="icon-visit-person colorWhiteGray verticalAlign-2 px-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="product-detail-container">
                <div class="row">
                    <div class="col-lg-9">
                        <!-- end of product-params -->
                           <div class="mt-5 pt-5">
                             @include('event.layouts.launcher',['launcher' => null, 'launcherId' => $launcher['id'], 'showLauncher' => true])
                           </div>
                        <!-- end of product-gallery -->
                        <!-- start of product-comments -->
                        <div class="fontSize18 bold mb-5">دیدگاه ها </div>
                            @include('shop.product.write-comment', 
                            ['itemId' => $launcher['id'],
                            'itemImg' => $launcher['img'],
                            'itemName' => $launcher['company_name'], 
                            'sendComment' => route('launcher.launcher_comment.store', 
                            ['launcher' => $launcher['id']])])

                            @include('shop.product.comments-show', [
                                'type' => 'launcher', 
                                'fetchUrl' => route('launcher.launcher_comment.list', 
                                ['launcher' => $launcher['id']]), 
                                'itemtId' => $launcher['id'],
                                'rate' => $launcher['rate'],
                                'rate_count' => $launcher['rate_count']
                            ])
                            <!-- end of product-comments -->
                    </div>
                    <div class="col-lg-3 p-2">
                        <!-- start of product-seller-info -->
                        <div class="ui-sticky ui-sticky-top StickyMenuMoveOnTop zIndex0">
                            <div class="product-seller-info ui-box p-0 backColorWhite">
                                <div class="seller-info-changeable">
                                    <div class="product-seller-row p-0 d-flex">
                                        <div class="product-seller-row-icon marginTop9">
                                            <!-- <i class="ri-store-3-fill"></i> -->
                                            <i class="icon-visit-location fontSize29 colorYellow"></i>
                                        </div>
                                        <div class="product-seller-row-detail">
                                            <div class="seller-final-score-container">
                                                <div class="seller-rate-container">
                                                    <span class="fontSize13 fontNormal colorBlack">{{ $launcher['launcher_address']}}،</span>
                                                </div>
                                            </div>
                                            <a href="#" class="seller-info-link"></a>
                                        </div>
                                    </div>
                                        <div class="d-flex spaceAround mt-1 mb-2">
                                            <button class="buttonBasketEvent whiteSpaceNoWrap">
                                                <span class="colorWhiteGray fontSize13 paddingRight5 px-2">مشاهده رو نقشه</span>
                                                <i class="icon-visit-eye colorWhiteGray verticalAlign-2 px-2"></i>
                                            </button>
                                            <button class="buttonBasketEvent whiteSpaceNoWrap">
                                                <span class="colorWhiteGray fontSize13 paddingRight5 px-2">مسیر یابی</span>
                                                <i class="icon-visit-location colorWhiteGray verticalAlign-2 px-2"></i>
                                            </button>
                                        </div>
                                    <hr>
                                    <div class="product-seller-row p-0 spaceBetween bold">
                                        <div class="product-seller-row-icon marginTop9">
                                            <i class="icon-visit-phone fontSize29  colorYellow"></i>
                                        </div>
                                        <div class="product-seller-row-detail d-flex align-items-center justifyContentEnd">
                                            <div class="seller-final-score-container p-2">
                                                <div class="seller-rate-container">
                                                    <div class="colorBlack fontSize12">
                                                        @foreach ( $launcher['launcher_phone'] as $phone)
                                                            <a href="tel:{{$phone}}" class="colorBlack fontSize14 fontWight400">{{ $phone }}</a><span class="mx-1">-</span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="product-seller-row p-0 d-flex spaceBetween bold">
                                         <div class="product-seller-row-icon marginTop9">
                                            <i class="icon-visit-mail fontSize29 colorYellow"></i>
                                        </div>
                                        <div class="product-seller-row-detail d-flex align-items-center justify-content-end">
                                            <div class="seller-final-score-container p-2">
                                                <div class="seller-rate-container ">
                                                    <a href="mailto:{{$launcher['launcher_email']}}" class="colorBlack fontSize14 fontWight400 px-2 d-flex justify-content-end">
                                                        {{$launcher['launcher_email']}}
                                                    </a>
                                                </div>
                                            </div>
                                            <a href="#" class="seller-info-link"></a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="product-seller-row p-0 d-flex spaceBetween bold">
                                         <div class="product-seller-row-icon marginTop9">
                                            <i class="icon-visit-website fontSize29 colorYellow"></i>
                                        </div>
                                        <div class="product-seller-row-detail d-flex align-items-center justify-content-end">
                                            <div class="seller-final-score-container p-2">
                                                <div class="seller-rate-container ">
                                                    <a href="{{ $launcher['launcher_site']}}" class="colorBlack fontSize14 fontWight400 px-2 d-flex justify-content-end ltr">{{ $launcher['launcher_site']}}</a>
                                                </div>
                                            </div>
                                            <a href="#" class="seller-info-link"></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- end of product-seller-info -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    @parent
@stop

@section('extraJS')
    @parent
    <script>
    $('#followToggle').on('click',function(){
        if($(this).attr('data-select') === 'off')
            $('#followToggle').css('backgroundColor','#c59358').attr('data-select', 'on');
        else
            $('#followToggle').css('backgroundColor','transparent').attr('data-select', 'off');
    });
    </script>
@stop
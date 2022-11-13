
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
                            <div class="bold colorBlack">گردشگری چیست ?</div>
                            <div class="colorBlack">کد : <span>17486931867</span></div>

                            <div class="d-flex justify-content-center align-items-center customBoxShadowGallery mb-3 imgSizeEvent">
                                <img class="w-100 h-100 p-4" src="{{ asset('theme-assets/images/banner/013.jpg') }}" alt="">
                            </div>

                            <div class="customBoxShadowGallery">
                                <div class="d-flex alignItemsCenter mb-4">
                                    <span class="ui-box-title fontSize20"> 
                                        <img class="p-2" src="{{ asset('./theme-assets/images/svg/headlineTitle.svg') }}" alt="">ثبت نام حضوری
                                        <span class="colorYellow fontSize12">مهلت ثبت نام تا پنج شنبه 21 مهرماه 1401 </span>
                                    </span>
                                </div>
                                <div class="d-flex spaceBetween p-3">
                                    <div>
                                        <div class="bold textColor">رویداد حضوری و آنلاین </div>
                                        <div class="colorBlack">دریافت ویدیو و عکس یادگاری به همراه سرویس ایاب و ذهاب</div>
                                    </div>
                                    <div>
                                        <div class="product-seller-row product-remaining-in-stock spaceBetween">
                                            <div class="bold textColor d-flex align-items-center ">
                                                <div>تعداد شرکت کننده :</div>                                            
                                            </div>
                                            <div class="num-block fa-num me-3">
                                                <span class="num-in">
                                                    <span class="icon-visit-Exclusion1 countPlus customColorBlack d-flex justify-content-center align-items-center"></span>
                                                    <input name="counter" type="text" value="1" readonly="">
                                                    <span class="icon-visit-Exclusion2 countMinus customColorBlack d-flex justify-content-center align-items-center"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex spaceBetween p-3">
                                    <div>
                                        <div class="bold textColor">رویداد حضوری و آنلاین </div>
                                        <div class="colorBlack">دریافت ویدیو و عکس یادگاری به همراه سرویس ایاب و ذهاب</div>
                                    </div>
                                    <div>
                                        <div class="product-seller-row product-remaining-in-stock spaceBetween">
                                            <div class="bold textColor d-flex align-items-center ">
                                                <div>تعداد شرکت کننده :</div>                                            
                                            </div>
                                            <div class="num-block fa-num me-3">
                                                <span class="num-in">
                                                    <span class="icon-visit-Exclusion1 countPlus customColorBlack d-flex justify-content-center align-items-center"></span>
                                                    <input name="counter" type="text" value="1" readonly="">
                                                    <span class="icon-visit-Exclusion2 countMinus customColorBlack d-flex justify-content-center align-items-center"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center spaceBetween p-3">
                                    <div class="d-flex align-items-center">
                                        <input style="width: 350px" class="form-control" placeholder="کد تخفیف ">
                                        <button id="" class="btn btn-primary backgroundGray alignSelfEnd customBtnAddress mx-3">ثبت</button>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary px-5"> ثبت نام </button>
                                    </div>
                                </div>
                            </div>

                            <!-- end of product-gallery -->
                        </div>
                        <div class="col-xl-3 col-lg-3">
                            <div class="ui-sticky ui-sticky-top">
                                <div class="d-flex justify-content-end">
                                    <span>
                                        <button class="ri-bookmark-line fontSize30 b-0 colorWhiteGray btnHover backColorWhite"></button>
                                        <button class="ri-bookmark-fill fontSize30 b-0 colorYellow btnHover backColorWhite"></button>
                                        <button data-remodal-target="share-modal" class="ri-stackshare-line fontSize30 b-0 colorWhiteGray btnHover backColorWhite"></button>
                                    </span>
                                </div>
                                <!-- start of product-seller-info -->
                                <div class="product-seller-info ui-box mb-3">
                                    <div class="seller-info-changeable">
                                            <div class="d-flex align-items-center">
                                                <div class="userCircleSize backgroundYellow mx-3"></div>
                                                <div class="d-flex felxDirectionColumn">
                                                    <div class="fontSize15 bold colorBlack">Onix code</div>
                                                    <div class="d-flex mt-2">
                                                        <div class=" align-items-center px-2 px-2 fontSize15 colorYellow"><i class=" fontSize15 icon-visit-star me-1 fontSize14 verticalAlign-2"></i> 4.9</div>
                                                        <div class="mr-70 align-items-center px-2 fontSize15 colorYellow"><i class=" fontSize15 icon-visit-person colorYellow verticalAlign-2"></i> 15000</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end mt-1 mb-2">
                                                <button class="buttonBasketEvent">
                                                    <span class="colorWhiteGray fontSize13 paddingRight5 px-2">مشاهده</span>
                                                    <i class="icon-visit-eye colorWhiteGray verticalAlign-2 px-2"></i>
                                                </button>
                                                <button class="buttonBasketEvent">
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
                                                        <span>پنج شنبه 21 مهرماه 1401 ساعت 17</span>
                                                    </div>
                                                </div>
                                                <div class="seller-final-score-container p-2">
                                                    <div class="seller-rate-container">
                                                        <span class="colorYellow bold">تا</span>
                                                        <span>پنج شنبه 21 مهرماه 1401 ساعت 17</span>
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
                                                        <span class="colorBlack fontSize15 px-2">مجازی</span>
                                                    </div>
                                                </div>
                                                <a href="#" class="seller-info-link"></a>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="product-seller-row p-0">
                                            <div class="product-seller-row-icon marginTop9">
                                                <!-- <i class="ri-store-3-fill"></i> -->
                                                <i class="icon-visit-hashtag colorYellow"></i>
                                            </div>
                                            <div class="product-seller-row-detail">
                                                <div class="seller-final-score-container p-2">
                                                    <div class="seller-rate-container">
                                                        <span class="fontSize13 colorBlack">آموزش گردشگری</span>
                                                    </div>
                                                </div>
                                                <a href="#" class="seller-info-link"></a>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="product-seller-row p-0">
                                            <div class="product-seller-row-icon marginTop9">
                                                <!-- <i class="ri-store-3-fill"></i> -->
                                                <i class="icon-visit-language colorYellow"></i>
                                            </div>
                                            <div class="product-seller-row-detail">
                                                <div class="seller-final-score-container p-2">
                                                    <div class="seller-rate-container">
                                                        <span class="fontSize13 colorBlack">فارسی</span>
                                                    </div>
                                                </div>
                                                <a href="#" class="seller-info-link"></a>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="product-seller-row p-0">
                                            <div class="product-seller-row-detail">
                                                <div class="seller-final-score-container p-2">
                                                    <div class="seller-rate-container">
                                                        <span class="colorBlack fontSize13">امکانات ویژه برای شما :</span>
                                                    </div>
                                                </div>
                                                <div class="seller-final-score-container p-2">
                                                    <div class="seller-rate-container">
                                                        <div class="colorBlack fontSize12 fontNormal">راهنمای نابینایان</div>
                                                        <div class="colorBlack fontSize12 fontNormal">پخش فیلم</div>
                                                        <div class="colorBlack fontSize12 fontNormal">پذیرایی</div>
                                                    </div>
                                                </div>
                                                <a href="#" class="seller-info-link"></a>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="product-seller-row p-0 pb-2">
                                            <div class="product-seller-row-detail">
                                                <div class="seller-final-score-container p-2">
                                                    <div class="seller-rate-container">
                                                        <span class="colorBlack fontSize13">شرایط سنی:</span>
                                                    </div>
                                                </div>
                                                <div class="seller-final-score-container p-2">
                                                    <div class="seller-rate-container">
                                                        <div class="colorBlack fontSize12 fontNormal">نامحدود</div>
                                                    </div>
                                                </div>
                                                <a href="#" class="seller-info-link"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of product-seller-info -->
                                <!-- start of product-seller-info -->
                                <div class="product-seller-info ui-box">
                                    <div class="seller-info-changeable">
                                        <div class="product-seller-row p-0">
                                            <div class="product-seller-row-icon marginTop9">
                                                <!-- <i class="ri-store-3-fill"></i> -->
                                                <i class="icon-visit-location colorYellow"></i>
                                            </div>
                                            <div class="product-seller-row-detail">
                                                <div class="seller-final-score-container p-2">
                                                    <div class="seller-rate-container">
                                                        <span class="fontSize13 fontNormal colorBlack">تهران، میدان ونک، بزرگراه حقانی، مرکز رشد دانشگاه علامه طباطبائی، پلاک 40، طبقه سوم شرقی،</span>
                                                    </div>
                                                </div>
                                                <a href="#" class="seller-info-link"></a>
                                            </div>
                                        </div>
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
                                        <div class="product-seller-row p-0">
                                            <div class="product-seller-row-icon marginTop9">
                                                <i class="icon-visit-phone colorYellow"></i>
                                            </div>
                                            <div class="product-seller-row-detail">
                                                <div class="seller-final-score-container p-2">
                                                    <div class="seller-rate-container">
                                                        <span class="colorBlack">02188195360 - 02188196304 -0912456023417</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="product-seller-row p-0">
                                            <div class="product-seller-row-icon marginTop9">
                                                <i class="icon-visit-mail colorYellow"></i>
                                            </div>
                                            <div class="product-seller-row-detail">
                                                <div class="seller-final-score-container p-2">
                                                    <div class="seller-rate-container ">
                                                        <div class="colorBlack fontSize15 px-2 d-flex justify-content-end">info@onixcode.com</div>
                                                    </div>
                                                </div>
                                                <a href="#" class="seller-info-link"></a>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="product-seller-row p-0">
                                            <div class="product-seller-row-icon marginTop9">
                                                <i class="icon-visit-website colorYellow"></i>
                                            </div>
                                            <div class="product-seller-row-detail">
                                                <div class="seller-final-score-container p-2">
                                                    <div class="seller-rate-container ">
                                                        <div class="colorBlack fontSize15 px-2 d-flex justify-content-end">www.onixcode.com</div>
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
                <!-- end of product-detail-container --> 
        </main>
@stop

@section('footer')
    @parent
@stop

@section('extraJS')
    @parent
@stop
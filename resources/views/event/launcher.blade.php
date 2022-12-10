@extends('layouts.structure')
@section('content')
{{-- TopParentBannerMoveOnTop --}}
    <div class="TopParentBannerMoveOnTop">
        <div class="w-100 h-240">
            <img src="" class="w-100 h-100 backgroundYellow overFlowHidden"  alt="">
            <div class="container">
                <div class="row">
                    <div class="col-12 position-relative">
                        <div class="followImage position-absolute backgroundColorBlue"></div>
                        <div class="followLabel position-absolute p-2 px-4">
                            <div class="fontSize22 bold">Onix code</div>
                            <div class="spaceBetween gap15">
                                <div style="display: flex!important" class="align-items-center px-2 fontSize15 colorYellow"><i class=" fontSize15 icon-visit-star me-1 fontSize14 verticalAlign-2"></i> 4.9</div>
                                <div style="display: flex!important" class="align-items-center px-2 fontSize15 colorYellow"><i class=" fontSize15 icon-visit-person colorYellow verticalAlign-2"></i> 15000</div>
                                <div style="display: flex!important" class="align-items-center px-2 fontSize15 colorYellow"><i class=" fontSize15 icon-visit-person colorYellow verticalAlign-2"></i> 15000</div>
                            </div>
                        </div>
                        <div class="position-absolute zIndex2 followBtn">
                            <button class="buttonBasketEvent">
                                <span class="colorWhiteGray fontSize13 paddingRight5 px-2">دنبال کردن</span>
                                <i class="icon-visit-person colorWhiteGray verticalAlign-2 px-2"></i>
                            </button>
                        </div>
                                </div>
                            </div>
                        </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <!-- end of product-params -->
                        @include('event.layouts.launcher',['launcher' => null, 'launcherId' => $launcher_id])
                    <!-- end of product-gallery -->
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <!-- start of product-comments -->
                    <div class="comments">commnets</div>
                        {{-- @include('shop.product.write-comment')
                        @include('shop.product.comments-show') --}}
                        <!-- end of product-comments -->
                </div>
                <div class="col-lg-3 p-2">
                    <!-- start of product-seller-info -->
                    <div class="product-seller-info ui-box p-0">
                        <div class="seller-info-changeable">
                            <div class="product-seller-row p-0 d-flex">
                                <div class="product-seller-row-icon marginTop9">
                                    <!-- <i class="ri-store-3-fill"></i> -->
                                    <i class="icon-visit-location fontSize29 colorYellow"></i>
                                </div>
                                <div class="product-seller-row-detail">
                                    <div class="seller-final-score-container">
                                        <div class="seller-rate-container">
                                            <span class="fontSize13 fontNormal colorBlack">تهران، میدان ونک، بزرگراه حقانی، مرکز رشد دانشگاه علامه طباطبائی، پلاک 40، طبقه سوم شرقی،</span>
                                        </div>
                                    </div>
                                    <a href="#" class="seller-info-link"></a>
                                </div>
                            </div>
                                <div class="d-flex justify-content-end mt-1 mb-2">
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
                                <div class="product-seller-row-detail d-flex align-items-center">
                                    <div class="seller-final-score-container p-2">
                                        <div class="seller-rate-container">
                                            <span class="colorBlack fontSize12">02188195360 - 02188196304 -0912456023417</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="product-seller-row p-0 d-flex spaceBetween bold">
                                 <div class="product-seller-row-icon marginTop9">
                                    <i class="icon-visit-mail fontSize29 colorYellow"></i>
                                </div>
                                <div class="product-seller-row-detail d-flex align-items-center">
                                    <div class="seller-final-score-container p-2">
                                        <div class="seller-rate-container ">
                                            <div class="colorBlack fontSize15 px-2 d-flex justify-content-end">info@onixcode.com</div>
                                        </div>
                                    </div>
                                    <a href="#" class="seller-info-link"></a>
                                </div>
                            </div>
                            <hr>
                            <div class="product-seller-row p-0 d-flex spaceBetween bold">
                                <div class="product-seller-row-icon marginTop9 d-flex align-items-center">
                                    <i class="icon-visit-website fontSize29 colorYellow"></i>
                                </div>
                                <div class="product-seller-row-detail d-flex align-items-center justify-content-end">
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
@stop

@section('footer')
    @parent
@stop

@section('extraJS')
    @parent
    <script>

    $.ajax({
        type: 'get',
        url: '{{ route('api.launcher.show-user',['launcher' => $launcherId]) }}',
        headers: {
            'accept': 'application/json'
        },
        success: function(res) {
            var html= "";
            if(res.status === "ok") {                     
                if (res.data.about != null){
                    $('#about').empty().append(res.data.about);         
                }
                if (res.data.company_name != null){
                    $('#company_name').empty().append(res.data.company_name);         
                }
                if (res.data.img != null){
                    $('#imgLauncher').attr('src',res.data.img);         
                }
                if (res.data.launcher_address != null){
                    $('#launcherAddress').empty().append(res.data.launcher_address);         
                }
                if (res.data.launcher_email != null){
                    $('#launcherEmail').empty().append(res.data.launcher_email);         
                }
                if (res.data.launcher_site != null){
                    $('#launcherSite').empty().append(res.data.launcher_site);         
                }
                if (res.data.rate != null){
                    $('#rate').empty().append(res.data.rate);         
                }
                if (res.data.launcher_phone != null){
                    for(i = 0; i < res.data.launcher_phone.length; i++){
                        html += '<span class="fontSize13 fontNormal colorBlack mx-3">' + res.data.launcher_phone[i] + '</span>'
                    }
                    $('#launcher_phone').empty().append(html);         
                }
                if (res.data.rate_count != null){
                    $('#rate_count').empty().append(res.data.rate_count);         
                }
            }
        }
    });
</script>
@stop
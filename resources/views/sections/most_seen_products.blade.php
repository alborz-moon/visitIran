<!-- start of box -->
<div id="" class="w-100 mb-5 hidden">
    <div class="container">
                            <div class="d-flex spaceBetween alignItemsCenter">
        <span class="ui-box-title fontSize20"> 
            <img class="p-2" src="{{ asset('./theme-assets/images/svg/headlineTitle.svg') }}" alt="">پر بازدیدترین ها
        </span>
        <span class="alignItemsCenter colorBlue"><a class="hoverBold" href="">مشاهده همه</a></span>
    </div>
    <div class="ui-box-content">
        <!-- Slider main container -->
        <div class="swiper product-swiper-slider">
            <!-- Additional required wrapper -->
            <div id="mostSeenProductsSlider" class="swiper-wrapper">

                <!-- Slides -->
                <div id="mostSeenProductsSample" class="cursorPointer hidden">
                    <div class="swiper-slide customBox customWidthBox">
                        <!-- start of product-card -->
                        <div class="product-card customBorderBoxShadow">
                            <div class="product-thumbnail">
                                <a href="#" target="_blank">
                                    <img id="mostSeenProductImg">
                                </a>
                            </div>
                            <div class="product-card-body">
                                <h2 class="product-title">
                                    <a id="mostSeenProductHeader" class="textColor fontSize12"></a>
                                </h2>
                                <div class="product-variant">
                                    <span id="mostSeenProductTag" class="colorWhite customBoxLabel fontSize11"></span>
                                </div>
                                <div id="mostSeenProductMultiColor" class="colorCircle hidden"></div>
                                <div class="spaceBetween mt-3 mb-3">
                                    <span id="mostSeenProductCritical" class="fontSize11 invisible colorRed whiteSpaceNoWrap">
                                        <span>موجودی تنها</span>
                                        <span>&nbsp;</span>
                                        <span id="mostSeenProductCriticalCount"></span>
                                        <span>&nbsp;</span>
                                        <span>عدد</span>
                                    </span>
                                    <span id="mostSeenProductRate"></span>
                                </div>
                                <div class="product-price fa-num">
                                    <div id="mostSeenProductOffSection" class="hidden d-flex align-items-center">
                                        <span class="fontSize15 pl-10 position-relative">
                                            <img src="{{ asset('theme-assets/images/svg/off.svg') }}" alt="">
                                            <span id="mostSeenProductOff" class="position-absolute fontSize10 colorWhite r-0 customOff">20%</span>
                                        </span>
                                        <del id="mostSeenProductPriceBeforeOff" class="customlineText textColor fontSize15">26,900,000</del>
                                    </div>
                                    <div id="mostSeenProductPriceParent" class="fontSize20 hidden">
                                        <span id="mostSeenProductPrice">26,249,000</span>
                                        <span class="fontSize20 colorYellow">ت</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-card-footer mb-2">
                                <div id="mostSeenProductSellerParent" class="textColor hidden">
                                    <span class="bold">از</span>
                                    <span id="mostSeenProductSeller"></span>
                                </div>
                            </div>
                        </div>
                        <!-- end of product-card -->
                    </div>
                </div>
                
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
    </div>
</div>
<!-- end of box -->


<script>

    $(document).ready(function() {
        $.ajax({
            type: 'get',
            url: '{{ route('api.product.list', ['orderBy' => 'seen', 'limit' => 8]) }}',
            success: function(res) {
                let html = renderProductSlider(res.data, 'mostSeenProduct');
                $("#mostSeenProductsSlider").empty().append(html).removeClass('hidden');
            }
        });
    });

</script>
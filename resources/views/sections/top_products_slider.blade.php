<!-- start of box -->
<div id="{{ $id }}" class="w-100 my-slider mb-5 hidden">
    <div class="container">
                            <div class="d-flex spaceBetween alignItemsCenter">
        <span class="ui-box-title fontSize20"> 
            <img class="p-2" src="{{ asset('./theme-assets/images/svg/headlineTitle.svg') }}" alt="">{{ $title }}
        </span>
        <span class="alignItemsCenter colorBlue"><a class="hoverBold" href="">مشاهده همه</a></span>
    </div>
    <div class="ui-box-content">
        <!-- Slider main container -->
        <div class="swiper product-swiper-slider">
            <!-- Additional required wrapper -->
            <div id="{{ $key }}sSlider" class="swiper-wrapper">

                <!-- Slides -->
                <div id="{{ $key }}sSample" class="cursorPointer hidden">
                    <div class="swiper-slide customBox customWidthBox">
                        <!-- start of product-card -->
                        <div class="product-card customBorderBoxShadow">
                            <div class="product-thumbnail">
                                <a href="#" target="_blank">
                                    <img id="{{ $key }}Img">
                                </a>
                            </div>
                            <div class="product-card-body">
                                <h2 class="product-title">
                                    <a id="{{ $key }}Header" class="textColor fontSize12"></a>
                                </h2>
                                <div class="product-variant">
                                    <span id="{{ $key }}Tag" class="colorWhite customBoxLabel fontSize11"></span>
                                </div>
                                <div id="{{ $key }}MultiColor" class="colorCircle hidden"></div>
                                <div class="spaceBetween mt-3 mb-3">
                                    <span id="{{ $key }}Critical" class="fontSize11 invisible colorRed whiteSpaceNoWrap">
                                        <span>موجودی تنها</span>
                                        <span>&nbsp;</span>
                                        <span id="{{ $key }}CriticalCount"></span>
                                        <span>&nbsp;</span>
                                        <span>عدد</span>
                                    </span>
                                    <span id="{{ $key }}Rate"></span>
                                </div>
                                <div class="product-price fa-num">
                                    <div id="{{ $key }}OffSection" class="hidden d-flex align-items-center">
                                        <span class="fontSize15 pl-10 position-relative">
                                            <img src="{{ asset('theme-assets/images/svg/off.svg') }}" alt="">
                                            <span id="{{ $key }}Off" class="position-absolute fontSize10 colorWhite r-0 customOff">20%</span>
                                        </span>
                                        <del id="{{ $key }}PriceBeforeOff" class="customlineText textColor fontSize15">26,900,000</del>
                                    </div>
                                    <div id="{{ $key }}PriceParent" class="fontSize20 hidden">
                                        <span id="{{ $key }}Price"></span>
                                        <span class="fontSize20 colorYellow">ت</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-card-footer mb-2">
                                <div id="{{ $key }}SellerParent" class="textColor hidden">
                                    <span class="bold">از</span>
                                    <span id="{{ $key }}Seller"></span>
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
            url: '{{ route('api.product.list', ['orderBy' => $searchKey, 'limit' => 8]) }}',
            success: function(res) {
                let html = renderProductSlider(res.data, '{{ $key }}');
                $("#" + '{{ $key }}' + "sSlider").empty().append(html).removeClass('hidden');
                $("#" + '{{ $not_fill_id }}').remove();
                $("#" + '{{ $id }}').removeClass('hidden');
            }
        });
    });

</script>

@extends('layouts.structure')
@section('content')
        <main class="page-content TopParentBannerMoveOnTop">
            <div class="container">
                <div class="row mb-5">
                    @include('shop.profile.layouts.profile_menu')
                    <div class="col-xl-9 col-lg-9 col-md-8 px-0">
                        <button class="btn btn-primary mb-3 d-md-none toggle-responsive-sidebar">فیلتر پیشرفته
                            <i class="ri-equalizer-fill ms-1"></i></button>
                        <div class="listing-products">
                            <div class="listing-products-content">
                                <!-- start of tab-content -->
                                <div class="tab-content" id="sort-tabContent">
                                    <!-- start of tab-pane -->
                                    <div class="tab-pane fade show active" id="most-visited" role="tabpanel"
                                        aria-labelledby="most-visited-tab">
                                        <div class="ui-box customListUIBoxPadding mb-4">
                                            <div class="ui-box-content p-0">
                                                <div class="ui-box-title">کالاهای مورد علاقه</div>
                                                <div class="row mx-0">
                                                    <div id="nothingToShow" class="hidden">محصولی برای نمایش موجود نیست</div>
                                                    <div id="sample_product_div" class="hidden">
                                                        @include('shop.productCard', ['key' => 'sample'])
                                                    </div>

                                                    <div id="shimmer" style="display: flex; flex-wrap: wrap; gap: 0px;">
                                                        @for($i = 0; $i < 6; $i++)
                                                            <a href="#" class="cursorPointer">
                                                                <div class="swiper-slide customWidthBox">
                                                                <!-- start of product-card -->
                                                                <div class="product-card customBorderBoxShadow">
                                                                    <div class="SimmerParent">
                                                                    <div class="shimmerBG media pt-1">
                                                                    </div>
                                                                    <div class="p-32 mt-1">
                                                                    <div class="shimmerBG title-line"></div>
                                                                            <div class="shimmerBG content-line"></div>
                                                
                                                                    <div class="shimmerBG title-line"></div>
                                                                    <div class="shimmerBG title-line py-2"></div>
                                                                            <div class="shimmerBG content-line"></div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <!-- end of product-card -->
                                                                </div>
                                                            </a>
                                                        @endfor
                                                    </div>

                                                    <div id="products_div" class="hidden p-0" style="display: flex; flex-wrap: wrap; gap: 5px;">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of tab-pane -->
                                    <!-- start of tab-pane -->
                                    <div class="tab-pane fade" id="best-selling" role="tabpanel"
                                        aria-labelledby="best-selling-tab">
                                        <div class="ui-box pt-3 pb-0 px-0 mb-4">
                                            <div class="ui-box-content">
                                                <div class="row mx-0">
                                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of tab-pane -->
                                    <!-- start of tab-pane -->
                                    <div class="tab-pane fade" id="most-popular" role="tabpanel"
                                        aria-labelledby="most-popular-tab">
                                        <div class="ui-box pt-3 pb-0 px-0 mb-4">
                                            <div class="ui-box-content">
                                                <div class="row mx-0">
                                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                                                        <!-- start of product-card -->
                                                        <div class="product-card">
                                                            <div class="product-thumbnail">
                                                                <a href="#">
                                                                    <img src=""
                                                                        alt="product title">
                                                                </a>
                                                            </div>
                                                            <div class="product-card-body">
                                                                <h2 class="product-title">
                                                                    <a href="#">گوشی موبایل اپل مدل iPhone 12 Pro Max
                                                                        A2412 دو
                                                                        سیم‌
                                                                        کارت
                                                                        ظرفیت
                                                                        256 گیگابایت
                                                                    </a>
                                                                </h2>
                                                                <div class="product-variant">
                                                                    
                                                                </div>
                                                                <div class="product-price fa-num">
                                                                    <span class="price-now">36,300,000 <span
                                                                            class="currency">تومان</span></span>
                                                                </div>
                                                            </div>
                                                            <div class="product-card-footer">
                                                                <div
                                                                    class="d-flex align-items-center justify-content-between border-top mt-2 py-2">
                                                                    <div class="product-actions">
                                                                        <ul>
                                                                            <li><a href="#" data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top" title=""
                                                                                    data-bs-original-title="افزودن به سبد خرید"
                                                                                    aria-label="افزودن به سبد خرید"><i
                                                                                        class="ri-shopping-cart-line"></i></a>
                                                                            </li>
                                                                            <li><a href="#" data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top" title=""
                                                                                    data-bs-original-title="مشاهده سریع"
                                                                                    aria-label="مشاهده سریع"
                                                                                    data-remodal-target="quick-view-modal"><i
                                                                                        class="ri-search-line"></i></a>
                                                                            </li>
                                                                            <li><a href="#" data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top" title=""
                                                                                    data-bs-original-title="افزودن به علاقمندی"
                                                                                    aria-label="افزودن به علاقمندی"><i
                                                                                        class="ri-heart-3-line"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="product-rating fa-num">
                                                                        <i class="ri-star-fill star"></i>
                                                                        <strong>۴.۴</strong>
                                                                        <span>(۴۳۶)</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end of product-card -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of tab-pane -->
                                </div>
                            </div>
                        </div>
                        <div class="responsive-sidebar-overlay"></div>
                    </div>
                </div>
            </div>
        </main>
            <!-- start of remove-from-favorite-modal -->
            <div class="remodal remodal-xs" data-remodal-id="remove-from-favorite-modal"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <div class="remodal-content">
                    <div class="text-muted fs-7 fw-bold mb-3">
                        آیا مطمئنید که این محصول از لیست مورد علاقه شما حذف شود؟
                    </div>
                </div>
                <div class="remodal-footer">
                    <button data-remodal-action="cancel" class="btn btn-sm btn-outline-light px-3 me-2">خیر</button>
                    <button class="btn btn-sm btn-primary px-3">بله</button>
                </div>
            </div>
            <!-- end of remove-from-favorite-modal -->
@stop

@section('footer')
    @parent
@stop

@section('extraJS')
    @parent
    <script>
        $(document).ready(function(){

            $("#products_div").addClass('hidden');
            $("#shimmer").removeClass('hidden');

            $.ajax({
                type: 'get',
                url: '{{ route('api.product.my') }}',
                success: function(res) {
                    
                    if(res.status !== "ok")
                        return;
                    
                    var length = res.data.length
                    if (length == 0){
                        $("#shimmer").addClass('hidden');
                        $('#nothingToShow').removeClass('hidden')
                        return
                    }
                    let html = renderProducts(res.data, 'sample');
                    $("#products_div").empty().append(html).removeClass('hidden');
                    $("#shimmer").addClass('hidden');  
                }
            })
        });
        function renderProducts(data, prefix) {
            let html = "";
            if (data === undefined) return "";

            data.forEach((elem) => {
                $("#" + prefix + "Img")
                    .attr("src", elem.img)
                    .attr("alt", elem.alt);
                $("#" + prefix + "Header").text(elem.name);
                $("#" + prefix + "Tag").text(elem.category);

                if (elem.seller !== "") {
                    $("#" + prefix + "SellerParent").removeClass("hidden");
                    $("#" + prefix + "Seller").text(elem.seller);
                }

                let starHtml = "";

                for (let i = 0; i < 5 - elem.rate; i++)
                    starHtml += '<i class="icon-visit-staroutline"></i>';

                for (let i = 0; i < elem.rate; i++)
                    starHtml += '<i class="icon-visit-star"></i>';

                $("#" + prefix + "Rate")
                    .empty()
                    .append(starHtml);

                if (elem.has_multi_color)
                    $("#" + prefix + "MultiColor").removeClass("hidden");
                else $("#" + prefix + "MultiColor").addClass("hidden");

                let zeroAvailableCount = false;

                if (elem.is_in_critical) {
                    $("#" + prefix + "CriticalCount").text(elem.available_count);
                    if (elem.available_count == 0) zeroAvailableCount = true;
                    $("#" + prefix + "Critical").removeClass("invisible");
                    if (zeroAvailableCount) $("#" + prefix + "Critical").text("اتمام موجودی");
                } else $("#" + prefix + "Critical").addClass("invisible");

                if (elem.off != null && !zeroAvailableCount) {
                    $("#" + prefix + "OffSection").removeClass("hidden");
                    $("#" + prefix + "PriceBeforeOff").text(elem.price);
                    if (elem.off.type === "percent")
                        $("#" + prefix + "Off").text(elem.off.value + "%");
                    else $("#" + prefix + "Off").text(elem.off.value + " تومان");

                    $("#" + prefix + "Price").text(elem.priceAfterOff);
                } else {
                    $("#" + prefix + "OffSection").addClass("hidden");
                    if (!zeroAvailableCount) $("#" + prefix + "Price").text(elem.price);
                }
                if (!zeroAvailableCount)
                    $("#" + prefix + "PriceParent").removeClass("hidden");

                let id = elem.id;
                var newElem = $("#sample_product_div").html();

                newElem = newElem
                    .replace(prefix + "Img", prefix + "Img_" + id)
                    .replace(prefix + "Header", prefix + "Header_" + id)
                    .replace(prefix + "Tag", prefix + "Tag_" + id)
                    .replace(prefix + "Critical", prefix + "Critical_" + id)
                    .replace(prefix + "CriticalCount", prefix + "CriticalCount_" + id)
                    .replace(prefix + "Rate", prefix + "Rate_" + id)
                    .replace(prefix + "MultiColor", prefix + "MultiColor_" + id);

                html +=
                    "<div onclick=\"redirect('" +
                    id +
                    "', '" +
                    elem.slug +
                    '\')" class="cursorPointer handleInMedia">' +
                    newElem +
                    "</div>";
            });

            return html;
        }
        function redirect(id, name) {
            window.open('{{ route('home') }}' + "/product/" + id + "/" + name, "_blank");
        }
    </script>        
@stop

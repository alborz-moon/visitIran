
@extends('layouts.structure')
@section('seo')
    <title>ویزیت ایران | از ایران ویزیت</title>
    <meta property="og:title" content="از ایران ویزیت" />
    <meta name="twitter:title" content="از ایران ویزیت" />
    <meta property="og:site_name" content="از ایران ویزیت" />

    <meta property="og:image" content="از ایران ویزیت"/>
    <meta property="og:image:secure_url" content="از ایران ویزیت"/>
    <meta name="twitter:image" content="از ایران ویزیت"/>
    <meta property="og:description" content="از ایران ویزیت" />
    <meta name="twitter:description" content="از ایران ویزیت" />
    <meta name="description" content="از ایران ویزیت"/>

    <style>

    </style>

    <meta name="keywords" content="از ایران ویزیت" />
    {{-- <meta property="article:tag" content="{{ $product['tags'] }}"/> --}}
@stop
@section('content')
        <main class="page-content TopParentBannerMoveOnTop">
            <div class="container mt-3">
                <div class="row">
                        <!-- start of breadcrumb -->
                            <ol class="breadcrumb mt-1">
                                @foreach ($path as $itr)
                                    <li class="breadcrumb-item">
                                        <a href="{{ $itr['href'] }}">{{ $itr['label'] }}</a>
                                    </li>
                                @endforeach
                            </ol>
                        <!-- end of breadcrumb -->

                    @if($has_sub)
                        @include('layouts.tiles', ['category' => $id, 'mode' => 'list'])
                    @endif

                    <div class="col-xl-3 col-lg-3 col-md-4 responsive-sidebar">
                        
                        <div class="ui-sticky ui-sticky-top">
                            <div class="ui-box sidebar-widgets customFilter ">
                                <!-- start of widget -->
                                <div class="widget mb-3">
                                    <div class="spaceBetween">
                                        <div class="widget-title m-0 b-0">فیلتر <span class="fontSize12 colorBlue">3 فیلتر</span></div>
                                        <a href="#" class="colorRed fontSize12 align-self-center">حذف نتایج</a>
                                    </div>
                                    <div id="total_count" class="colorBlue fontSize12 align-self-center"></div>
                                    <div class="widget-content widget--category-results">
                                        <ul>
                                            <li class="category--arrow-left">
                                                <a href="#">دسته بندی کالا ها</a>
                                                <ul>
                                                    <li class="category--arrow-down">
                                                        @if(isset($parent) && $parent != null)
                                                            <a href="{{ $parent['href'] }}">{{ $parent['label'] }}</a>
                                                        @endif
                                                        <ul>
                                                            <li class="current">{{ $name }}</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            <!-- start of widget -->
                                <div class="widget widget-collapse mb-3">
                                    <div class="widget-title widget-title--collapse-btn d-flex gap10 align-items-center" data-bs-toggle="collapse"
                                        data-bs-target="#collapseGrouping9" aria-expanded="false"
                                        aria-controls="collapseGrouping9" role="button">فروشنده<i class="circle colorBlue align-self-center"></i><span class="colorBlue fontSize12">1 فیلتر</span></div>
                                    <div class="widget-content widget--search collapse" id="collapseGrouping9">
                                        <form action="#" class="pt-2">
                                            <div class="filter-options do-simplebar pt-2 mt-2">
                                                @foreach ($features as $feature)
                                                    <div class="parent form-check">
                                                        <input class="form-check-input" type="checkbox" value=""/>{{ $feature['name'] }}
                                                        <ul class="child form-check">
                                                            @foreach ($feature['choices'] as $choice)
                                                                <li class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" />{{ $choice['key'] }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endforeach
                                                <div id="brands"></div>
                                                <div id="sellers"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- start of widget -->
                                <!-- start of widget -->
                                <div class="widget widget-collapse mb-3">
                                    <div class="widget-title widget-title--collapse-btn d-flex gap10 align-items-center" data-bs-toggle="collapse"
                                        data-bs-target="#collapseGrouping8" aria-expanded="false"
                                        aria-controls="collapseGrouping8" role="button">برند<i class="circle colorBlue align-self-center"></i><span class="colorBlue fontSize12">1 فیلتر</span></div>
                                    <div class="widget-content widget--search collapse" id="collapseGrouping8">
                                        <form action="#" class="pt-2">
                                            <div class="filter-options do-simplebar pt-2 mt-2">
                                                @foreach ($features as $feature)
                                                    <div class="parent form-check">
                                                        <input class="form-check-input" type="checkbox" value=""/>{{ $feature['name'] }}
                                                        <ul class="child form-check">
                                                            @foreach ($feature['choices'] as $choice)
                                                                <li class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" />{{ $choice['key'] }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endforeach
                                                <div id="brands"></div>
                                                <div id="sellers"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- start of widget -->
                                <!-- start of widget -->
                                <div class="widget mb-3">
                                    <div class="widget-title b-0" > نحوه نمایش :</div>
                                        <form action="#">
                                            <div class="form-element-row">
                                                <select id="orderBy" class="form-select b-0 p-2" aria-label="Default select example">
                                                  <option {{isset($orderBy) && $orderBy === 'price' ? 'selected' : ''}} value="price_desc">گران ترین</option>
                                                  <option {{isset($orderBy) && $orderBy === 'price' ? 'selected' : ''}} value="price_asc">ارزان ترین</option>
                                                  <option {{isset($orderBy) && $orderBy === 'createdAt' ? 'selected' : ''}} value="createdAt_desc">جدید ترین</option>
                                                  <option {{isset($orderBy) && $orderBy === 'rate' ? 'selected' : ''}} value="rate_desc">محبوب ترین</option>
                                                  <option {{isset($orderBy) && $orderBy === 'sellCount' ? 'selected' : ''}} value="sell_count_desc">پرفروش ترین</option>
                                                  <option {{isset($orderBy) && $orderBy === 'seen' ? 'selected' : ''}} value="seen_desc">پربازدید ترین</option>
                                                </select>
                                            </div>
                                        </form>
                                </div>
                                <!-- end of widget --> 
                                <!-- start of widget -->
                                <div class="widget mb-3">
                                    <div class="widget-title b-0">جستجو :</div>
                                    <div class="widget-content widget--search">
                                        <form action="#">
                                            <div class="form-element-row">
                                                <input type="text" name="s" class="form-control"
                                                    placeholder="نام محصول یا…">
                                                <i class="ri-search-line icon"></i>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end of widget -->
                                <!-- start of widget -->
                                <div class="widget widget-collapse mb-3">
                                    <div class="widget-title widget-title--collapse-btn d-flex gap10 align-items-center" data-bs-toggle="collapse"
                                        data-bs-target="#collapseGrouping" aria-expanded="false"
                                        aria-controls="collapseGrouping" role="button">دسته بندی <i class="circle colorBlue align-self-center"></i><span class="colorBlue fontSize12">1 فیلتر</span></div>
                                    <div class="widget-content widget--search collapse" id="collapseGrouping">
                                        <form action="#" class="pt-2">
                                            <div class="filter-options do-simplebar pt-2 mt-2">
                                                @foreach ($features as $feature)
                                                    <div class="parent form-check">
                                                        <input class="form-check-input" type="checkbox" value=""/>{{ $feature['name'] }}
                                                        <ul class="child form-check">
                                                            @foreach ($feature['choices'] as $choice)
                                                                <li class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" />{{ $choice['key'] }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endforeach
                                                <div id="brands"></div>
                                                <div id="sellers"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- start of widget -->
                                <div class="widget widget-collapse">
                                    <div class="widget-title widget-title--collapse-btn" data-bs-toggle="collapse"
                                        data-bs-target="#collapsePriceFilter" aria-expanded="false"
                                        aria-controls="collapsePriceFilter" role="button">محدوده قیمت </div>
                                    <div class="widget-content widget--search fa-num collapse" id="collapsePriceFilter">
                                        <form action="#" class="pt-2">
                                            <div class="filter-price">
                                                <div class="filter-slider">
                                                    <div id="slider-non-linear-step" class="price-slider"></div>
                                                </div>
                                                <ul class="filter-range mb-4">
                                                    <li>
                                                        <input type="text" data-value="0" value="0" name="price[min]"
                                                            data-range="0" class="js-slider-range-from"
                                                            id="skip-value-lower" disabled>
                                                        <span class="fontSize20 colorYellow">ت</span>
                                                    </li>
                                                    <li class="label fw-bold">تا</li>
                                                    <li>
                                                        <input type="text" data-value="2100000000" value="2100000000"
                                                            name="price[max]" data-range="2100000000"
                                                            class="js-slider-range-to" id="skip-value-upper" disabled>
                                                        <span class="fontSize20 colorYellow">ت</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end of widget -->
                               
                                <!-- start of widget -->
                                <div class="widget py-1 mt-3 mb-3">
                                    <div class="widget-content widget--filter-switcher">
                                        <div class="form-check form-switch mb-0">
                                            <input class="form-check-input" type="checkbox" id="has_selling_stock">
                                            <label class="form-check-label" for="has_selling_stock">فقط کالاهای
                                                موجود</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of widget -->
                                                                <!-- start of widget -->
                                <div class="widget py-1 mb-3">
                                    <div class="widget-content widget--filter-switcher">
                                        <div class="form-check form-switch mb-0">
                                            <input class="form-check-input" type="checkbox" id="has_selling_offs">
                                            <label class="form-check-label" for="has_sellingoffs">فقط کالاهای
                                                دارای تخفیف</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of widget -->
                                <!-- start of widget -->

                                <!-- end of widget -->
                            </div>
                        </div>
                    </div>
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
                                                                    <img src="./theme-assets/images/products/05.jpg"
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
                                                                        256 گیگابایت</a>
                                                                </h2>
                                                                <div class="product-variant">
                                                                    <span class="color"
                                                                        style="background-color: #d4d4d4;"></span>
                                                                    <span class="color"
                                                                        style="background-color: #e86841;"></span>
                                                                    <span class="color"
                                                                        style="background-color: #b82c32;"></span>
                                                                    <span>+</span>
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
@stop

@section('footer')
    @parent
@stop

@section('extraJS')
    @parent
<script>
$(".parent input").on('click',function(){
  var _parent=$(this);
  var nextli=$(this).parent().next().children().children();
  
  if(_parent.prop('checked')){
     console.log('parent checked');
     nextli.each(function(){
       $(this).children().prop('checked',true);
     });
    
  }
  else{
    console.log('parent un checked');
     nextli.each(function(){
       $(this).children().prop('checked',false);
     });
  
  }
});

$(".child input").on('click',function(){
  
  var ths=$(this);
  var parentinput=ths.closest('div').prev().children();
  var sibblingsli=ths.closest('ul').find('li');
  
  if(ths.prop('checked')){
    console.log('child checked');
    parentinput.prop('checked',true);
  }
  else{
    console.log('child unchecked');
       var status=true;
     sibblingsli.each(function(){
       console.log('sibb');
       if($(this).children().prop('checked')) status=false;
     });
       if(status) parentinput.prop('checked',false);
  }
});
    function buildQuery() {
        
        let query = new URLSearchParams();
        @if(isset($id))
            query.append('parent', '{{ $id }}');
        @endif

        // let brand = $("#brandFilter").val();
        let off = $("#has_selling_offs").prop('checked') ? 1 : 0;
        let min = $("#has_selling_stock").prop('checked') ? 1 : 0;
        let minPrice = $("#skip-value-lower").val().replaceAll(",", "");
        let maxPrice = $("#skip-value-upper").val().replaceAll(",", "");
        let orderBy = $("#orderBy").val();

        // if(brand !== 'all')
        //     query.append('brand', brand);
            
        if(min > 0)
            query.append('min', min);

        if(minPrice !== '')
            query.append('minPrice', minPrice);

        if(maxPrice !== '')
            query.append('maxPrice', maxPrice);

        if(off !== 0)
            query.append('off', off);

        if(orderBy === 'sell_count_desc') {
            query.append('orderBy', 'sell_count');
            query.append('orderByType', 'desc');
        }
        else {
            let s = orderBy.split('_');
            query.append('orderBy', s[0]);
            query.append('orderByType', s[1]);
        }

        return query;
    }

        $(document).ready(function() {
            filter();

            $("#orderBy").on('change', function() {
                filter();
            });

            $("#has_selling_stock").on('change', function() {
                filter();
            });
            
            $("#has_selling_offs").on('change', function() {
                filter();
            });

            $(document).on('mouseup', ".noUi-handle-upper", function(){
                filter();
            });
            
            $(document).on('mouseup', ".noUi-handle-lower", function(){
                filter();
            });

        });

        function filter() {
            
            $("#products_div").addClass('hidden');
            $("#shimmer").removeClass('hidden');

            $.ajax({
                type: 'get',
                url: '{{ route('api.product.list') }}' + '?' + buildQuery().toString(),
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
                    $("#total_count").empty().append(res.count + " کالا");

                    html = '<div class="parent form-check">';
                    html += '<input class="form-check-input" type="checkbox" value=""/>برند';
                    html += '<ul class="child form-check">';

                    for(var i = 0; i < res.brands.length; i++) {
                        html += '<li class="form-check">';
                        html += '<input class="form-check-input" type="checkbox" value="" />' + res.brands[i]['name'];
                        html += '</li>';
                    }

                    html += '</ul>';
                    html += '</div>';

                    $("#brands").empty().append(html);

                    html = '<div class="parent form-check">';
                    html += '<input class="form-check-input" type="checkbox" value=""/>فروشنده';
                    html += '<ul class="child form-check">';
                        
                    for(var i = 0; i < res.sellers.length; i++) {
                        html += '<li class="form-check">';
                        html += '<input class="form-check-input" type="checkbox" value="" />' + res.sellers[i]['name'];
                        html += '</li>';
                    }
                    
                    html += '</ul>';
                    html += '</div>';
                    
                    $("#sellers").empty().append(html);
                }
            })

        }

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
                    '\')" class="cursorPointer">' +
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
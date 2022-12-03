
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
        .top-cat::before {
            content: none !important;
        }

        .down-arrow::before {
            content: "\EA76" !important;
        }
        #top-categories-parent {
            cursor: pointer;
        }
    </style>

    <meta name="keywords" content="از ایران ویزیت" />
    {{-- <meta property="article:tag" content="{{ $product['tags'] }}"/> --}}

    <script>

        let LIST_API = '{{ route('api.product.list') }}';
        let HOME_API = '{{ route('home') }}';
        
        let catId = '{{ isset($id) ? $id : -1 }}';

    </script>
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
                                        
                                        @if(isset($tops))
                                            <ul>
                                                <li class="category--arrow-left">
                                                    <a data-drop-down="false" id="top-categories-parent">دسته بندی کالا ها</a>
                                                    <ul id="top-categories-container" class="hidden">
                                                        {{-- <li class="category--arrow-down"> --}}
                                                            {{-- @if(isset($parent) && $parent != null)
                                                                <a href="{{ $parent['href'] }}">{{ $parent['label'] }}</a>
                                                            @endif --}}
                                                            {{-- <ul> --}}
                                                            @foreach ($tops as $top)
                                                                <a class="top-cat" href="{{ route('single-category', ['category' => $top['id'], 'slug' => $top['slug']]) }}">{{ $top['name'] }}</a>
                                                            @endforeach
                                                            {{-- </ul> --}}
                                                        {{-- </li> --}}
                                                    </ul>
                                                </li>
                                            </ul>
                                        @endif
                                    </div>
                                </div>

                                @if(isset($sellers) && count($sellers) > 0)
                                    <!-- start of widget -->
                                    <div class="widget widget-collapse mb-3">
                                        <div class="widget-title widget-title--collapse-btn d-flex gap10 align-items-center" data-bs-toggle="collapse"
                                            data-bs-target="#collapseGrouping9" aria-expanded="false"
                                            aria-controls="collapseGrouping9" role="button">فروشنده<i class="circle colorBlue align-self-center"></i><span class="colorBlue fontSize12">1 فیلتر</span>
                                        </div>
                                        <div class="widget-content widget--search collapse" id="collapseGrouping9">
                                            <div class="filter-options do-simplebar pt-2 mt-2">
                                                <div id="sellers">
                                                    @foreach ($sellers as $seller)
                                                        <li class="form-check">
                                                            <input name="sellers" class="form-check-input" type="checkbox" value="{{ $seller->id }}" />
                                                            {{ $seller->name }}
                                                        </li>    
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- end of widget -->

                                @endif


                                @if(isset($brands) && count($brands) > 0)
                                    <!-- start of widget -->
                                    <div class="widget widget-collapse mb-3">
                                        <div class="widget-title widget-title--collapse-btn d-flex gap10 align-items-center" data-bs-toggle="collapse"
                                            data-bs-target="#collapseGrouping8" aria-expanded="false"
                                            aria-controls="collapseGrouping8" role="button">برند<i class="circle colorBlue align-self-center"></i><span class="colorBlue fontSize12">1 فیلتر</span>
                                        </div>
                                        <div class="widget-content widget--search collapse" id="collapseGrouping8">
                                            <div class="filter-options do-simplebar pt-2 mt-2">
                                                <div id="brands">
                                                    @foreach ($brands as $brand)
                                                        <li class="form-check">
                                                            <input name="brands" class="form-check-input" type="checkbox" value="{{ $brand->id }}" />
                                                            {{ $brand->name }}
                                                        </li>    
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of widget -->
                                @endif

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
                                                <input id="searchBoxInput" type="text" name="s" class="form-control"
                                                    placeholder="نام محصول یا…">
                                                <i onclick="filter()" class="ri-search-line icon cursorPointer"></i>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end of widget -->

                                @if(isset($categories))
                                    <!-- start of widget -->
                                    <div class="widget widget-collapse mb-3">
                                        <div class="widget-title widget-title--collapse-btn d-flex gap10 align-items-center" data-bs-toggle="collapse"
                                            data-bs-target="#collapseGrouping" aria-expanded="false"
                                            aria-controls="collapseGrouping" role="button">دسته بندی <i class="circle colorBlue align-self-center"></i><span class="colorBlue fontSize12">1 فیلتر</span>
                                        </div>
                                        <div class="widget-content widget--search collapse" id="collapseGrouping">
                                            <div class="filter-options do-simplebar pt-2 mt-2">
                                                <div id="categories">
                                                    @foreach ($categories as $category)
                                                        <li class="form-check">
                                                            <input name="categories" class="form-check-input" type="checkbox" value="{{ $category->id }}" />
                                                            {{ $category->name }}
                                                        </li>    
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of widget -->
                                @endif

                                @if(isset($features) && count($features) > 0)
                                    <!-- start of widget -->
                                    <div id="categories_filter_container" class="widget widget-collapse mb-3">
                                        <div class="widget-title widget-title--collapse-btn d-flex gap10 align-items-center" data-bs-toggle="collapse"
                                            data-bs-target="#collapseGrouping" aria-expanded="false"
                                            aria-controls="collapseGrouping" role="button">ویژگی ها <i class="circle colorBlue align-self-center"></i><span class="colorBlue fontSize12">1 فیلتر</span></div>
                                        <div class="widget-content widget--search collapse" id="collapseGrouping">
                                            <div class="filter-options do-simplebar pt-2 mt-2">
                                                @foreach ($features as $feature)
                                                    <select name="feature_filter" data-id="{{ $feature['id'] }}" onchange="filter()" id="feature_{{ $feature['id'] }}">
                                                        <option value="all">{{ $feature['name'] }}</option>
                                                        @foreach ($feature['choices'] as $choice)
                                                            <option value="{{ $choice['key'] }}">{{ $choice['key'] }}</option>
                                                        @endforeach
                                                    </select>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of widget -->
                                @endif
                                <!-- start of widget -->
                                <div class="widget widget-collapse">
                                    <div class="widget-title widget-title--collapse-btn" data-bs-toggle="collapse"
                                        data-bs-target="#collapsePriceFilter" aria-expanded="false"
                                        aria-controls="collapsePriceFilter" role="button">محدوده قیمت </div>
                                    <div class="widget-content widget--search fa-num collapse" id="collapsePriceFilter">
                                        <div class="filter-price">
                                            <div class="filter-slider">
                                                <div id="slider-non-linear-step" class="price-slider"></div>
                                            </div>
                                            <ul class="filter-range mb-4">
                                                <li>
                                                    <input type="text" data-value="{{ $minPrice }}" value="{{ $minPrice }}" name="price[min]"
                                                        data-range="{{ $minPrice }}" class="js-slider-range-from"
                                                        id="skip-value-lower" disabled>
                                                    <span class="fontSize20 colorYellow">ت</span>
                                                </li>
                                                <li class="label fw-bold">تا</li>
                                                <li>
                                                    <input type="text" data-value="{{ $maxPrice }}" value="{{ $maxPrice }}"
                                                        name="price[max]" data-range="{{ $maxPrice }}"
                                                        class="js-slider-range-to" id="skip-value-upper" disabled>
                                                    <span class="fontSize20 colorYellow">ت</span>
                                                </li>
                                            </ul>
                                        </div>
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
    <script src="{{ asset('theme-assets/js/lazyLoading.js') }}"></script>
    <script src="{{ asset('theme-assets/js/productList.js') }}"></script>

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


        $(document).ready(function() {
                
            $("#top-categories-parent").on('click', function() {
                if($(this).attr('data-drop-down') === 'true') {
                    $("#top-categories-container").addClass('hidden');
                    $(this).attr('data-drop-down', 'false').removeClass('down-arrow');
                }
                else {
                    $("#top-categories-container").removeClass('hidden');
                    $(this).attr('data-drop-down', 'true').addClass('down-arrow');
                }
            });

            filter();

            init_lazy_loading('products_div', 400, fetchMore);

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

        
    </script>
@stop
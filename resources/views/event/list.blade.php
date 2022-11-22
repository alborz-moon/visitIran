@extends('layouts.structure')
@section('content')
        <main class="page-content TopParentBannerMoveOnTop">
            <div class="container mt-3">
                <div class="row">
                    @include('event.layouts.searchbar')
                    <div class="col-xl-3 col-lg-3 col-md-4 responsive-sidebar">
                        {{-- @include('sections.top_categories_products') --}}
                        <!-- start of breadcrumb -->
                                <ol class="breadcrumb mt-1">
                                    {{-- @foreach ($path as $itr) --}}
                                    <li class="breadcrumb-item">
                                        <a href=""></a>
                                    </li>
                                    {{-- @endforeach --}}
                                </ol>
                                <!-- end of breadcrumb -->
                        <div class="ui-sticky ui-sticky-top">
                            <div class="ui-box sidebar-widgets customFilter ">
                                <!-- start of widget -->
                                <div class="widget mb-3">
                                    <div class="spaceBetween">
                                        <div class="widget-title m-0 b-0">فیلتر <span class="fontSize12 colorBlue">3 فیلتر</span></div>
                                        <a href="#" class="colorRed fontSize12 align-self-center">حذف نتایج</a>
                                    </div>
                                    <div id="total_count" class="colorBlue fontSize12 align-self-center"></div>
                                    {{-- <div class="widget-content widget--category-results">
                                        <ul>
                                            <li class="category--arrow-left">
                                                <a href="#">دسته بندی کالا ها</a>
                                                <ul>
                                                    <li class="category--arrow-down">
                                                        @if($parent != null)
                                                            <a href="{{ $parent['href'] }}">{{ $parent['label'] }}</a>
                                                        @endif
                                                        <ul>
                                                            <li class="current">{{ $name }}</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div> --}}
                                </div>
                                <!-- start of widget -->
                                <div class="widget mb-3">
                                    <div class="widget-title b-0" > نحوه نمایش :</div>
                                        <form action="#">
                                            <div class="form-element-row">
                                                <select id="orderBy" class="form-select b-0 p-2" aria-label="Default select example">
                                                  <option selected value="price_desc">گران ترین</option>
                                                  <option value="price_asc">ارزان ترین</option>
                                                  <option value="createdAt_desc">جدید ترین</option>
                                                  <option value="rate_desc">محبوب ترین</option>
                                                  <option value="sell_count_desc">پرفروش ترین</option>
                                                  <option value="seen_desc">پربازدید ترین</option>
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
                                                    <div class="parent form-check">
                                                        <input class="form-check-input" type="checkbox" value=""/>
                                                        <ul class="child form-check">
                                                                <li class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" />
                                                                </li>
                                                        </ul>
                                                    </div>
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
                                        <div class="ui-box pt-3 pb-0 px-0 mb-4">
                                            <div class="ui-box-content p-0">
                                                <div class="row mx-0">
                                                    {{-- class hidden --}}
                                                    <div id="sample_product_div" class="">
                                                        {{-- @include('event.productCard', ['key' => 'sample']) --}}
                                                        <div class="d-flex gap10 flexWrap">
                                                                                                                    <div class="customEventWidthBox ml-0">
                                                            <div>
                                                                <!-- start of product-card -->
                                                                <div class="product-card customEventBorderBox">
                                                                    <div class="product-thumbnail mx-n15">
                                                                        <a>
                                                                            <img style="width: 300px;height: 180px;max-width: 300px !important;">
                                                                        </a>
                                                                    </div>
                                                                    <div class="product-card-body">
                                                                        <h2 class="product-title">
                                                                            <a class="textColor fontSize14 bold"></a>
                                                                        </h2>
                                                                        <h2 class="product-title">
                                                                            <span class="fontSize14">شروع</span>
                                                                            <a class="textColor fontSize14"></a>
                                                                        </h2>
                                                                        <div class="product-variant">
                                                                            <span class="colorWhite customBoxLabel fontSize11"></span>
                                                                        </div>
                                                                        <div class="colorCircle"></div>
                                                                        <div class="product-price fa-num">
                                                                            <div class="d-flex align-items-center">
                                                                                <span class="fontSize15 pl-10 position-relative">
                                                                                    <img src="{{ asset('theme-assets/images/svg/off.svg') }}" alt="">
                                                                                    <span class="position-absolute fontSize10 colorWhite r-0 customOff">20%</span>
                                                                                </span>
                                                                                <del class="customlineText textColor fontSize15">26,900,000</del>
                                                                            </div>
                                                                            <div class="fontSize20">
                                                                                <span></span>
                                                                                <span class="fontSize20 colorYellow">ت</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-card-footer mb-2">
                                                                        <div class="textColor">
                                                                            <span class="bold">مکان </span>
                                                                            <span</span>
                                                                        </div>
                                                                        <div class="textColor">
                                                                            <span class="bold">برگزار کننده</span>
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end of product-card -->
                                                            </div>
                                                        </div>


                                                        <div class="customEventWidthBox ml-0">
                                                            <div>
                                                                <!-- start of product-card -->
                                                                <div class="product-card customEventBorderBox">
                                                                    <div class="product-thumbnail mx-n15">
                                                                        <a>
                                                                            <img style="width: 300px;height: 180px;max-width: 300px !important;">
                                                                        </a>
                                                                    </div>
                                                                    <div class="product-card-body">
                                                                        <h2 class="product-title">
                                                                            <a class="textColor fontSize14 bold"></a>
                                                                        </h2>
                                                                        <h2 class="product-title">
                                                                            <span class="fontSize14">شروع</span>
                                                                            <a class="textColor fontSize14"></a>
                                                                        </h2>
                                                                        <div class="product-variant">
                                                                            <span class="colorWhite customBoxLabel fontSize11"></span>
                                                                        </div>
                                                                        <div class="colorCircle"></div>
                                                                        <div class="product-price fa-num">
                                                                            <div class="d-flex align-items-center">
                                                                                <span class="fontSize15 pl-10 position-relative">
                                                                                    <img src="{{ asset('theme-assets/images/svg/off.svg') }}" alt="">
                                                                                    <span class="position-absolute fontSize10 colorWhite r-0 customOff">20%</span>
                                                                                </span>
                                                                                <del class="customlineText textColor fontSize15">26,900,000</del>
                                                                            </div>
                                                                            <div class="fontSize20">
                                                                                <span></span>
                                                                                <span class="fontSize20 colorYellow">ت</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-card-footer mb-2">
                                                                        <div class="textColor">
                                                                            <span class="bold">مکان </span>
                                                                            <span</span>
                                                                        </div>
                                                                        <div class="textColor">
                                                                            <span class="bold">برگزار کننده</span>
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end of product-card -->
                                                            </div>
                                                        </div>


                                                        <div class="customEventWidthBox ml-0">
                                                            <div>
                                                                <!-- start of product-card -->
                                                                <div class="product-card customEventBorderBox">
                                                                    <div class="product-thumbnail mx-n15">
                                                                        <a>
                                                                            <img style="width: 300px;height: 180px;max-width: 300px !important;">
                                                                        </a>
                                                                    </div>
                                                                    <div class="product-card-body">
                                                                        <h2 class="product-title">
                                                                            <a class="textColor fontSize14 bold"></a>
                                                                        </h2>
                                                                        <h2 class="product-title">
                                                                            <span class="fontSize14">شروع</span>
                                                                            <a class="textColor fontSize14"></a>
                                                                        </h2>
                                                                        <div class="product-variant">
                                                                            <span class="colorWhite customBoxLabel fontSize11"></span>
                                                                        </div>
                                                                        <div class="colorCircle"></div>
                                                                        <div class="product-price fa-num">
                                                                            <div class="d-flex align-items-center">
                                                                                <span class="fontSize15 pl-10 position-relative">
                                                                                    <img src="{{ asset('theme-assets/images/svg/off.svg') }}" alt="">
                                                                                    <span class="position-absolute fontSize10 colorWhite r-0 customOff">20%</span>
                                                                                </span>
                                                                                <del class="customlineText textColor fontSize15">26,900,000</del>
                                                                            </div>
                                                                            <div class="fontSize20">
                                                                                <span></span>
                                                                                <span class="fontSize20 colorYellow">ت</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-card-footer mb-2">
                                                                        <div class="textColor">
                                                                            <span class="bold">مکان </span>
                                                                            <span</span>
                                                                        </div>
                                                                        <div class="textColor">
                                                                            <span class="bold">برگزار کننده</span>
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end of product-card -->
                                                            </div>
                                                        </div>


                                                        <div class="customEventWidthBox ml-0">
                                                            <div>
                                                                <!-- start of product-card -->
                                                                <div class="product-card customEventBorderBox">
                                                                    <div class="product-thumbnail mx-n15">
                                                                        <a>
                                                                            <img style="width: 300px;height: 180px;max-width: 300px !important;">
                                                                        </a>
                                                                    </div>
                                                                    <div class="product-card-body">
                                                                        <h2 class="product-title">
                                                                            <a class="textColor fontSize14 bold"></a>
                                                                        </h2>
                                                                        <h2 class="product-title">
                                                                            <span class="fontSize14">شروع</span>
                                                                            <a class="textColor fontSize14"></a>
                                                                        </h2>
                                                                        <div class="product-variant">
                                                                            <span class="colorWhite customBoxLabel fontSize11"></span>
                                                                        </div>
                                                                        <div class="colorCircle"></div>
                                                                        <div class="product-price fa-num">
                                                                            <div class="d-flex align-items-center">
                                                                                <span class="fontSize15 pl-10 position-relative">
                                                                                    <img src="{{ asset('theme-assets/images/svg/off.svg') }}" alt="">
                                                                                    <span class="position-absolute fontSize10 colorWhite r-0 customOff">20%</span>
                                                                                </span>
                                                                                <del class="customlineText textColor fontSize15">26,900,000</del>
                                                                            </div>
                                                                            <div class="fontSize20">
                                                                                <span></span>
                                                                                <span class="fontSize20 colorYellow">ت</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-card-footer mb-2">
                                                                        <div class="textColor">
                                                                            <span class="bold">مکان </span>
                                                                            <span</span>
                                                                        </div>
                                                                        <div class="textColor">
                                                                            <span class="bold">برگزار کننده</span>
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end of product-card -->
                                                            </div>
                                                        </div>


                                                        <div class="customEventWidthBox ml-0">
                                                            <div>
                                                                <!-- start of product-card -->
                                                                <div class="product-card customEventBorderBox">
                                                                    <div class="product-thumbnail mx-n15">
                                                                        <a>
                                                                            <img style="width: 300px;height: 180px;max-width: 300px !important;">
                                                                        </a>
                                                                    </div>
                                                                    <div class="product-card-body">
                                                                        <h2 class="product-title">
                                                                            <a class="textColor fontSize14 bold"></a>
                                                                        </h2>
                                                                        <h2 class="product-title">
                                                                            <span class="fontSize14">شروع</span>
                                                                            <a class="textColor fontSize14"></a>
                                                                        </h2>
                                                                        <div class="product-variant">
                                                                            <span class="colorWhite customBoxLabel fontSize11"></span>
                                                                        </div>
                                                                        <div class="colorCircle"></div>
                                                                        <div class="product-price fa-num">
                                                                            <div class="d-flex align-items-center">
                                                                                <span class="fontSize15 pl-10 position-relative">
                                                                                    <img src="{{ asset('theme-assets/images/svg/off.svg') }}" alt="">
                                                                                    <span class="position-absolute fontSize10 colorWhite r-0 customOff">20%</span>
                                                                                </span>
                                                                                <del class="customlineText textColor fontSize15">26,900,000</del>
                                                                            </div>
                                                                            <div class="fontSize20">
                                                                                <span></span>
                                                                                <span class="fontSize20 colorYellow">ت</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-card-footer mb-2">
                                                                        <div class="textColor">
                                                                            <span class="bold">مکان </span>
                                                                            <span</span>
                                                                        </div>
                                                                        <div class="textColor">
                                                                            <span class="bold">برگزار کننده</span>
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end of product-card -->
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="customEventWidthBox ml-0">
                                                            <div>
                                                                <!-- start of product-card -->
                                                                <div class="product-card customEventBorderBox">
                                                                    <div class="product-thumbnail mx-n15">
                                                                        <a>
                                                                            <img style="width: 300px;height: 180px;max-width: 300px !important;">
                                                                        </a>
                                                                    </div>
                                                                    <div class="product-card-body">
                                                                        <h2 class="product-title">
                                                                            <a class="textColor fontSize14 bold"></a>
                                                                        </h2>
                                                                        <h2 class="product-title">
                                                                            <span class="fontSize14">شروع</span>
                                                                            <a class="textColor fontSize14"></a>
                                                                        </h2>
                                                                        <div class="product-variant">
                                                                            <span class="colorWhite customBoxLabel fontSize11"></span>
                                                                        </div>
                                                                        <div class="colorCircle"></div>
                                                                        <div class="product-price fa-num">
                                                                            <div class="d-flex align-items-center">
                                                                                <span class="fontSize15 pl-10 position-relative">
                                                                                    <img src="{{ asset('theme-assets/images/svg/off.svg') }}" alt="">
                                                                                    <span class="position-absolute fontSize10 colorWhite r-0 customOff">20%</span>
                                                                                </span>
                                                                                <del class="customlineText textColor fontSize15">26,900,000</del>
                                                                            </div>
                                                                            <div class="fontSize20">
                                                                                <span></span>
                                                                                <span class="fontSize20 colorYellow">ت</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-card-footer mb-2">
                                                                        <div class="textColor">
                                                                            <span class="bold">مکان </span>
                                                                            <span</span>
                                                                        </div>
                                                                        <div class="textColor">
                                                                            <span class="bold">برگزار کننده</span>
                                                                            <span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end of product-card -->
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div id="shimmer" class="hidden" style="display: flex; flex-wrap: wrap; gap: 10px;">
                                                        @for($i = 0; $i < 4; $i++)
                                                            <!-- Slides -->
                                                            <a href="#" class="cursorPointer">
                                                                <div class="swiper-slide customEventWidthBox ml-0">
                                                                <!-- start of product-card -->
                                                                <div class="product-card customEventBorderBox">
                                                                    <div class="SimmerParent">
                                                                    <div class="shimmerBG media pt-1">
                                                                    </div>
                                                                    <div class="p-32 mt-4">
                                                                        <div class="shimmerBG title-line mt-3"></div>
                                                                        <div class="shimmerBG content-line mt-3"></div>
                                                                        <div class="shimmerBG title-line mt-3"></div>
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
            <!-- start of quick-view-modal -->
            {{-- <div class="remodal remodal-lg" data-remodal-id="quick-view-modal"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <div class="remodal-content">
                    <div class="product-detail-container">
                        <div class="row">
                            <div class="col-md-5 mb-md-0 mb-4">
                                <!-- start of product-gallery -->
                                <div class="product-gallery">
                                    <div class="gallery-img-container">
                                        <!-- Slider main container -->
                                        <div class="swiper gallery-swiper-slider">
                                            <!-- Additional required wrapper -->
                                            <div class="swiper-wrapper">
                                                <!-- Slides -->
                                                <div class="swiper-slide">
                                                    <div class="gallery-img">
                                                        <img src="./theme-assets/images/gallery/01.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="gallery-img">
                                                        <img src="./theme-assets/images/gallery/02.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="gallery-img">
                                                        <img src="./theme-assets/images/gallery/03.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="gallery-img">
                                                        <img src="./theme-assets/images/gallery/04.png" alt="">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- If we need navigation buttons -->
                                            <div class="swiper-button-prev"></div>
                                            <div class="swiper-button-next"></div>
                                        </div>
                                        <!-- Slider main container -->
                                        <div class="swiper gallery-thumbs-swiper-slider">
                                            <!-- Additional required wrapper -->
                                            <div class="swiper-wrapper">
                                                <!-- Slides -->
                                                <div class="swiper-slide">
                                                    <div class="gallery-thumb">
                                                        <img src="./theme-assets/images/gallery/01.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="gallery-thumb">
                                                        <img src="./theme-assets/images/gallery/02.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="gallery-thumb">
                                                        <img src="./theme-assets/images/gallery/03.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="gallery-thumb">
                                                        <img src="./theme-assets/images/gallery/04.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of product-gallery -->
                            </div>
                            <div class="col-md-7 mb-md-0 mb-4">
                                <!-- start of breadcrumb -->
                                <nav class="mb-2" aria-label="breadcrumb">
                                    <ol class="breadcrumb fs-7">
                                        <li class="breadcrumb-item"><a href="#">اپل</a></li>
                                        <li class="breadcrumb-item"><a href="#">گوشی موبایل اپل</a></li>
                                    </ol>
                                </nav>
                                <!-- end of breadcrumb -->
                                <!-- start of product-detail -->
                                <h2 class="product-title">گوشی موبایل اپل مدل iPhone 13 A2634 دو سیم کارت ظرفیت 128
                                    گیگابایت و رم 4 گیگابایت</h2>
                                <div class="product-en mb-3">
                                    <span>Apple iPhone 13 A2634 Dual SIM 128GB And 4GB RAM Mobile Phone</span>
                                </div>
                                <div class="product-user-suggestion mb-2">
                                    <i class="ri-thumb-up-fill text-success me-1"></i>
                                    <span class="fs-7 me-2">۷۹٪ (۱۷۰ نفر) از خریداران، این کالا را پیشنهاد کرده
                                        اند.</span>
                                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="خریداران کالا با انتخاب یکی از گزینه‌های پیشنهاد یا عدم پیشنهاد، تجربه خرید خود را با کاربران به اشتراک می‌گذارند."><i
                                            class="ri-information-line"></i></span>
                                </div>
                                <div class="product-user-meta fa-num mb-4">
                                    <span class="product-users-rating">
                                        <i class="ri-star-fill icon me-1"></i>
                                        <span class="fw-bold me-1">4.4</span>
                                        <span class="text-muted fs-7">(742)</span>
                                    </span>
                                    <span class="divider"></span>
                                    <a href="#" class="link border-bottom-0 fs-7">۶۳۷ دیدگاه کاربران</a>
                                </div>
                                <div class="product-variants-container mb-3">
                                    <div class="product-variant-selected-container">
                                        <span class="product-variant-selected-label">رنگ:</span>
                                        <span class="product-variant-selected">آبی</span>
                                    </div>
                                    <div class="product-variants">
                                        <div class="product-variant-item">
                                            <div class="custom-radio-circle">
                                                <input type="radio" class="custom-radio-circle-input"
                                                    name="productColor" id="productColor01" checked>
                                                <label for="productColor01" class="custom-radio-circle-label"
                                                    data-variant-label="آبی">
                                                    <span class="color" style="background-color: #2196f3;"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="آبی"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="product-variant-item">
                                            <div class="custom-radio-circle">
                                                <input type="radio" class="custom-radio-circle-input"
                                                    name="productColor" id="productColor02">
                                                <label for="productColor02" class="custom-radio-circle-label"
                                                    data-variant-label="سفید">
                                                    <span class="color" style="background-color: #fff;"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="سفید"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="product-variant-item">
                                            <div class="custom-radio-circle">
                                                <input type="radio" class="custom-radio-circle-input"
                                                    name="productColor" id="productColor03">
                                                <label for="productColor03" class="custom-radio-circle-label"
                                                    data-variant-label="صورتی">
                                                    <span class="color" style="background-color: #ff80ab;"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="صورتی"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="expandable-text mb-3" style="height: 95px;">
                                    <div class="expandable-text_text">
                                        <div class="product-params">
                                            <ul>
                                                <li>
                                                    <span class="label">حافظه داخلی:</span>
                                                    <span class="title">128 گیگابایت</span>
                                                </li>
                                                <li>
                                                    <span class="label">مقدار RAM:</span>
                                                    <span class="title">چهار گیگابایت</span>
                                                </li>
                                                <li>
                                                    <span class="label">بازه‌ی اندازه صفحه نمایش:</span>
                                                    <span class="title">6.0 اینچ و بزرگتر</span>
                                                </li>
                                                <li>
                                                    <span class="label">شبکه های ارتباطی:</span>
                                                    <span class="title">2G، 3G، 4G، 5G</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="expandable-text-expand-btn">
                                        <span class="show-more">
                                            بیشتر بخوانید <i class="ri-arrow-down-s-line"></i>
                                        </span>
                                        <span class="show-less d-none">
                                            بستن <i class="ri-arrow-up-s-line"></i>
                                        </span>
                                    </div>
                                </div>
                                <!-- end of product-detail -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="remodal-footer">
                    <button data-remodal-action="cancel" class="btn btn-sm btn-outline-light px-3 me-2">بستن</button>
                    <a href="#" class="btn btn-sm btn-primary px-3">دیدن محصول</a>
                </div>
            </div> --}}
            <!-- end of quick-view-modal -->
        </main>
@stop

@section('footer')
    @parent
@stop

@section('extraJS')
    @parent
@stop
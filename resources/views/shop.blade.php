
@extends('layouts.structure')
@section('content')
        <main class="page-content TopParentBannerMoveOnTop">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-5 responsive-sidebar">
                        @include('sections.top_categories_products')
                        <div class="ui-sticky ui-sticky-top">
                            <div class="ui-box sidebar-widgets customFilter ">
                                <!-- start of breadcrumb -->
                                {{-- @include('layouts.breadcrumb') --}}
                                <!-- end of breadcrumb -->
                                <!-- start of widget -->
                                <div class="widget mb-3">
                                    <div class="spaceBetween">
                                        <div class="widget-title m-0 b-0">فیلتر <span class="fontSize8 colorBlue">3 فیلتر</span></div>
                                        <a href="#" class="colorRed fontSize12 align-self-center">حذف نتایج</a>
                                    </div>
                                    <div class="colorBlue fontSize8 align-self-center">300 کالا</div>
                                    {{-- <div class="widget-content widget--category-results">
                                        <ul>
                                            <li class="category--arrow-left">
                                                <a href="#">دسته بندی کالا ها</a>
                                                <ul>
                                                    <li class="category--arrow-down">
                                                        <a href="#">فرش</a>
                                                        <ul>
                                                            <li class="current">فرش دست بافت</li>
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
                                                <select class="form-select b-0 p-2" aria-label="Default select example">
                                                  <option selected value="expensive">گران ترین</option>
                                                  <option value="cheap">ارزان ترین</option>
                                                  <option value="new">جدید ترین</option>
                                                  <option value="popular">محبوب ترین</option>
                                                  <option value="best">پرفروش ترین</option>
                                                  <option value="popular">پربازدید ترین</option>
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
                                        aria-controls="collapseGrouping" role="button">دسته بندی <i class="circle colorBlue align-self-center"></i><span class="colorBlue fontSize8">1 فیلتر</span></div>
                                    <div class="widget-content widget--search collapse" id="collapseGrouping">
                                        <form action="#" class="pt-2">
                                            <div class="filter-options do-simplebar pt-2 mt-2">
                                                <div class="parent form-check">
                                                    <input class="form-check-input" type="checkbox" value=""/>والد دسته اول
                                                </div>
                                                <div>
                                                    <ul class="child form-check">
                                                        <li class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" />دسته اول
                                                        </li>
                                                        <li class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" />دسته دوم
                                                        </li>
                                                        <li class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" />دسته سوم
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="parent form-check mt-3">
                                                    <input class="form-check-input" type="checkbox" value=""/>والد دسته دوم
                                                </div>
                                                <div>
                                                    <ul class="child form-check">
                                                        <li class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" />دسته اول
                                                        </li>
                                                        <li class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" />دسته دوم
                                                        </li>
                                                        <li class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" />دسته سوم
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
                    <div class="col-xl-9 col-lg-8 col-md-7">
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
                                            <div class="ui-box-content">
                                                <div class="row mx-0">
                                                    {{-- <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                                                        <!-- start of product-card -->
                                                        <div class="product-card customBorderBoxShadow">
                                                            <div class="product-thumbnail">
                                                                <a>
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
                                                    </div> --}}
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
                                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                                                        <!-- start of product-card -->
                                                        <div class="product-card">
                                                            <div class="product-thumbnail">
                                                                <a href="#">
                                                                    <img src="./theme-assets/images/products/06.jpg"
                                                                        alt="product title">
                                                                </a>
                                                            </div>
                                                            <div class="product-card-body">
                                                                <h2 class="product-title">
                                                                    <a href="#">گوشی موبایل شیائومی مدل Mi 11i 5G
                                                                        M2012K11G دو
                                                                        سیم‌
                                                                        کارت
                                                                        ظرفیت
                                                                        256 گیگابایت و 8 گیگابایت رم</a>
                                                                </h2>
                                                                <div class="product-variant">
                                                                    <span class="color"
                                                                        style="background-color: #4d5b63;"></span>
                                                                    <span class="color"
                                                                        style="background-color: #57415f;"></span>
                                                                    <span class="color"
                                                                        style="background-color: #984638;"></span>
                                                                    <span>+</span>
                                                                </div>
                                                                <div class="product-price fa-num">
                                                                    <span class="price-now">16,199,000 <span
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
                                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                                                        <!-- start of product-card -->
                                                        <div class="product-card">
                                                            <div class="product-thumbnail">
                                                                <a href="#">
                                                                    <img src="./theme-assets/images/products/01.jpg"
                                                                        alt="product title">
                                                                </a>
                                                            </div>
                                                            <div class="product-card-body">
                                                                <h2 class="product-title">
                                                                    <a href="#">گوشی موبایل اپل مدل iPhone 13 A2634 دو
                                                                        سیم‌ کارت
                                                                        ظرفیت 128
                                                                        گیگابایت و رم 4 گیگابایت</a>
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
                                                                    <div class="d-flex align-items-center">
                                                                        <del class="price-old">26,900,000</del>
                                                                        <span class="discount ms-2">%2</span>
                                                                    </div>
                                                                    <span class="price-now">26,249,000 <span
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
                                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                                                        <!-- start of product-card -->
                                                        <div class="product-card">
                                                            <div class="product-thumbnail">
                                                                <a href="#">
                                                                    <img src="./theme-assets/images/products/02.jpg"
                                                                        alt="product title">
                                                                </a>
                                                            </div>
                                                            <div class="product-card-body">
                                                                <h2 class="product-title">
                                                                    <a href="#">گوشی موبایل شیائومی مدل 11 lite 5G NE
                                                                        2109119DG
                                                                        دو
                                                                        سیم‌ کارت
                                                                        ظرفیت 256 گیگابایت و رم 8 گیگابایت</a>
                                                                </h2>
                                                                <div class="product-variant">
                                                                    <span class="color"
                                                                        style="background-color: #4d5b63;"></span>
                                                                    <span class="color"
                                                                        style="background-color: #57415f;"></span>
                                                                    <span class="color"
                                                                        style="background-color: #984638;"></span>
                                                                    <span>+</span>
                                                                </div>
                                                                <div class="product-price fa-num">
                                                                    <span class="price-now">8,239,000 <span
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
                                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                                                        <!-- start of product-card -->
                                                        <div class="product-card">
                                                            <div class="product-thumbnail">
                                                                <a href="#">
                                                                    <img src="./theme-assets/images/products/03.jpg"
                                                                        alt="product title">
                                                                </a>
                                                            </div>
                                                            <div class="product-card-body">
                                                                <h2 class="product-title">
                                                                    <a href="#">گوشی موبایل شیائومی مدل Redmi Note 10
                                                                        pro
                                                                        M2101K6G
                                                                        دو سیم‌
                                                                        کارت
                                                                        ظرفیت 128 گیگابایت و رم 6</a>
                                                                </h2>
                                                                <div class="product-variant">
                                                                    <span class="color"
                                                                        style="background-color: #24476e;"></span>
                                                                    <span class="color"
                                                                        style="background-color: #12505b;"></span>
                                                                    <span class="color"
                                                                        style="background-color: #e4a793;"></span>
                                                                    <span>+</span>
                                                                </div>
                                                                <div class="product-price fa-num">
                                                                    <span class="price-now">7,599,000 <span
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
                                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                                                        <!-- start of product-card -->
                                                        <div class="product-card">
                                                            <div class="product-thumbnail">
                                                                <a href="#">
                                                                    <img src="./theme-assets/images/products/04.jpg"
                                                                        alt="product title">
                                                                </a>
                                                            </div>
                                                            <div class="product-card-body">
                                                                <h2 class="product-title">
                                                                    <a href="#">گوشی موبایل سامسونگ مدل Galaxy Z Flip3
                                                                        5G ظرفیت
                                                                        256
                                                                        گیگابایت
                                                                        و
                                                                        رم 8 گیگابایت</a>
                                                                </h2>
                                                                <div class="product-variant">
                                                                    <span class="color"
                                                                        style="background-color: #24476e;"></span>
                                                                    <span class="color"
                                                                        style="background-color: #12505b;"></span>
                                                                    <span class="color"
                                                                        style="background-color: #e4a793;"></span>
                                                                    <span>+</span>
                                                                </div>
                                                                <div class="product-price fa-num">
                                                                    <span class="price-now">22,499,000 <span
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
                                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                                                        <!-- start of product-card -->
                                                        <div class="product-card">
                                                            <div class="product-thumbnail">
                                                                <a href="#">
                                                                    <img src="./theme-assets/images/products/07.jpg"
                                                                        alt="product title">
                                                                </a>
                                                            </div>
                                                            <div class="product-card-body">
                                                                <h2 class="product-title">
                                                                    <a href="#">گوشی موبایل سامسونگ مدل Galaxy S9 Plus
                                                                        دو سیم
                                                                        کارت
                                                                        ظرفیت 64
                                                                        گیگابایت</a>
                                                                </h2>
                                                                <div class="product-variant">
                                                                    <span class="color"
                                                                        style="background-color: #24476e;"></span>
                                                                    <span class="color"
                                                                        style="background-color: #12505b;"></span>
                                                                    <span class="color"
                                                                        style="background-color: #e4a793;"></span>
                                                                    <span>+</span>
                                                                </div>
                                                                <div class="product-price fa-num">
                                                                    <span class="price-now">12,890,000 <span
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
                                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                                                        <!-- start of product-card -->
                                                        <div class="product-card">
                                                            <div class="product-thumbnail">
                                                                <a href="#">
                                                                    <img src="./theme-assets/images/products/08.jpg"
                                                                        alt="product title">
                                                                </a>
                                                            </div>
                                                            <div class="product-card-body">
                                                                <h2 class="product-title">
                                                                    <a href="#">گوشی موبایل سامسونگ مدل Galaxy Note 20
                                                                        5G
                                                                        SM-N981B/DS دو سیم
                                                                        کارت ظرفیت 256 گیگابایت و رم 8</a>
                                                                </h2>
                                                                <div class="product-variant">
                                                                    <span class="color"
                                                                        style="background-color: #24476e;"></span>
                                                                    <span class="color"
                                                                        style="background-color: #12505b;"></span>
                                                                    <span class="color"
                                                                        style="background-color: #e4a793;"></span>
                                                                    <span>+</span>
                                                                </div>
                                                                <div class="product-price fa-num">
                                                                    <div class="d-flex align-items-center">
                                                                        <del class="price-old">23,570,000</del>
                                                                        <span class="discount ms-2">%3</span>
                                                                    </div>
                                                                    <span class="price-now">22,799,000 <span
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
                                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                                                        <!-- start of product-card -->
                                                        <div class="product-card">
                                                            <div class="product-thumbnail">
                                                                <a href="#">
                                                                    <img src="./theme-assets/images/products/01.jpg"
                                                                        alt="product title">
                                                                </a>
                                                            </div>
                                                            <div class="product-card-body">
                                                                <h2 class="product-title">
                                                                    <a href="#">گوشی موبایل اپل مدل iPhone 13 A2634 دو
                                                                        سیم‌ کارت
                                                                        ظرفیت 128
                                                                        گیگابایت و رم 4 گیگابایت</a>
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
                                                                    <div class="d-flex align-items-center">
                                                                        <del class="price-old">26,900,000</del>
                                                                        <span class="discount ms-2">%2</span>
                                                                    </div>
                                                                    <span class="price-now">26,249,000 <span
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
                                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                                                        <!-- start of product-card -->
                                                        <div class="product-card">
                                                            <div class="product-thumbnail">
                                                                <a href="#">
                                                                    <img src="./theme-assets/images/products/02.jpg"
                                                                        alt="product title">
                                                                </a>
                                                            </div>
                                                            <div class="product-card-body">
                                                                <h2 class="product-title">
                                                                    <a href="#">گوشی موبایل شیائومی مدل 11 lite 5G NE
                                                                        2109119DG
                                                                        دو
                                                                        سیم‌ کارت
                                                                        ظرفیت 256 گیگابایت و رم 8 گیگابایت</a>
                                                                </h2>
                                                                <div class="product-variant">
                                                                    <span class="color"
                                                                        style="background-color: #4d5b63;"></span>
                                                                    <span class="color"
                                                                        style="background-color: #57415f;"></span>
                                                                    <span class="color"
                                                                        style="background-color: #984638;"></span>
                                                                    <span>+</span>
                                                                </div>
                                                                <div class="product-price fa-num">
                                                                    <span class="price-now">8,239,000 <span
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
                                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                                                        <!-- start of product-card -->
                                                        <div class="product-card">
                                                            <div class="product-thumbnail">
                                                                <a href="#">
                                                                    <img src="./theme-assets/images/products/03.jpg"
                                                                        alt="product title">
                                                                </a>
                                                            </div>
                                                            <div class="product-card-body">
                                                                <h2 class="product-title">
                                                                    <a href="#">گوشی موبایل شیائومی مدل Redmi Note 10
                                                                        pro
                                                                        M2101K6G
                                                                        دو سیم‌
                                                                        کارت
                                                                        ظرفیت 128 گیگابایت و رم 6</a>
                                                                </h2>
                                                                <div class="product-variant">
                                                                    <span class="color"
                                                                        style="background-color: #24476e;"></span>
                                                                    <span class="color"
                                                                        style="background-color: #12505b;"></span>
                                                                    <span class="color"
                                                                        style="background-color: #e4a793;"></span>
                                                                    <span>+</span>
                                                                </div>
                                                                <div class="product-price fa-num">
                                                                    <span class="price-now">7,599,000 <span
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
                                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                                                        <!-- start of product-card -->
                                                        <div class="product-card">
                                                            <div class="product-thumbnail">
                                                                <a href="#">
                                                                    <img src="./theme-assets/images/products/04.jpg"
                                                                        alt="product title">
                                                                </a>
                                                            </div>
                                                            <div class="product-card-body">
                                                                <h2 class="product-title">
                                                                    <a href="#">گوشی موبایل سامسونگ مدل Galaxy Z Flip3
                                                                        5G ظرفیت
                                                                        256
                                                                        گیگابایت
                                                                        و
                                                                        رم 8 گیگابایت</a>
                                                                </h2>
                                                                <div class="product-variant">
                                                                    <span class="color"
                                                                        style="background-color: #24476e;"></span>
                                                                    <span class="color"
                                                                        style="background-color: #12505b;"></span>
                                                                    <span class="color"
                                                                        style="background-color: #e4a793;"></span>
                                                                    <span>+</span>
                                                                </div>
                                                                <div class="product-price fa-num">
                                                                    <span class="price-now">22,499,000 <span
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
            <div class="remodal remodal-lg" data-remodal-id="quick-view-modal"
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
            </div>
            <!-- end of quick-view-modal -->
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
</script>
{{-- <script>

    $(document).ready(function() {

        let productId;
        
        try {
            productId = location.pathname.split('/product/')[1].split('/')[0];
        }
        catch(e) {
            document.location.href = '{{ route('home') }}';
        }
        
        $.ajax({
            type: 'get',
            url: '{{ route('api.product.show') }}' + '/' + productId,
            headers: {
                'accept': 'application/json'
            },
            success: function(res) {
                
                let html = '';
                for(var i = 0; i < res.galleries.length; i++) {
                    html += '<li data-fancybox="gallery-a " data-src="' + res.galleries[i].img + '">'
                    html += '<img class="customBoxShadowGallery" src="' + res.galleries[i].img + '" alt="' + res.galleries[i].alt + '"></li>'
                }
                $("#gallery").empty().append(html);

                let options = '';
                let colors = '';
                let property = '';
                let params = '';
                for (var i = 0; i < res.features.length; i++) {

                    if(res.features[i].name === 'multicolor') {
                        
                        $("#color-div").removeClass('hidden');
                        let val_label = res.features[i].value.split('__');
                        let prices = res.features[i].price !== undefined && 
                            res.features[i].price !== null && res.features[i].price != '' ? 
                                res.features[i].price.split('$$') : [];

                        let colors_keys = val_label[0].split('$$');
                        let colors_labels = val_label[1].split('$$');

                        for(var j = 0; j < colors_keys.length; j++) {

                            colors += '<div class="product-variant-item"><div class="custom-radio-circle">';
                            colors += '<input data-label="' + colors_labels[j] + '" data-val="' + colors_keys[j] + '"" type="radio" class="custom-radio-circle-input" name="productColor"';
                            if(j == 0) {

                                if(prices.length > j)
                                    colors += 'data-price="' + prices[j] + '" id="productColor0' + j + '" checked>';
                                else
                                    colors += 'data-price="" id="productColor0' + j + '" checked>';
                                
                                let html = '<div class="product-option">';
                                html += '<span class="color" style="background-color: ' + colors_labels[j] + ';"></span>';
                                html += '<span class="color-label ms-2">' + colors_keys[j] + '</span>';
                                html += '</div>';

                                $("#product_options").empty().append(html);

                                $(".price").empty().append(prices[j]);
                                $("#product-color-variant-selected").empty().append(colors_keys[j]);
                            }
                            else {
                                
                                if(prices.length > j)
                                    colors += 'data-price="' + prices[j] + '" id="productColor0' + j + '">';
                                else
                                    colors += 'data-price="" id="productColor0' + j + '">';
                            }

                            colors += '<label for="productColor0' + j + '" class="custom-radio-circle-label"';
                            colors += 'data-variant-label="' + colors_keys[j] + '">';
                            colors += '<span class="color" style="background-color: ' + colors_labels[j] +';"';
                            colors += 'data-bs-toggle="tooltip" data-bs-placement="bottom"';
                            colors += 'title="' + colors_keys[j] + '" data-bs-original-title="' + colors_keys[j] + '" aria-label="' + colors_keys[j] + '"></span>';
                            colors += '</label></div></div></div>';
                        }

                    }
                    else if(res.features[i].available_count !== null || 
                        res.features[i].price !== null
                    ) {
                        
                        $("#dynamic_multi_choice_features").append(
                            '<div class="product-variant-selected-container spaceBetween hidden" >' +
                            '<div class="product-variant-selected-label bold mb-3 seller d-flex justify-content-center align-items-center pl-2 fontSize18">' + res.features[i].name + '</div>' +
                            '<div class="line mr-15 ml-15"></div>' +
                            '<div id="selected_option_for_feature_' + res.features[i].id + '"></div>' +
                            '</div>'
                        );

                        let vals = res.features[i].value.split('__')[0].split("$$");
                        
                        let prices = res.features[i].price == null ? null : res.features[i].price.split("$$");
                        let counts = res.features[i].available_count == null ? null : res.features[i].available_count.split("$$");

                        options = '<div class="flex">'
                        for(var j = 0; j < vals.length; j++) {

                            options += '<button data-id="' + res.features[i].id + '" data-val="' + vals[j] + '" name="productOption"';
                            if(j == 0) {

                                $('#selected_option_for_feature_' + res.features[i].id).empty().append(vals[0]);

                                if(prices != null) {
                                    options += 'data-price="' + prices[j] + '" id="productOption0' + j + '" class="selected">';
                                    $(".price").empty().append(prices[j]);
                                }
                                else {
                                    options += 'data-count="' + counts[j] + '" id="productOption0' + j + '" class="selected">';
                                    $("#availableCount").empty().append(counts[j]);
                                }
                                
                            }
                            else {
                                if(prices != null)
                                    options += 'data-price="' + prices[j] + '" id="productOption0' + j + '">';
                                else
                                    options += 'data-count="' + counts[j] + '" id="productOption0' + j + '">';
                            }

                            options += vals[j] + "</button>";

                        }

                        options += "</div>";

                    }
                    else {
                        if(res.features[i].show_in_top == 1) {
                            property += '<li><span class="label colorBlueWhite px-1">' + res.features[i].name + '</span><span> : </span>';
                            property += '<span class="title px-1">' + res.features[i].value + '</span></li>';
                        }
                        params += '<li>';
                        params += '<span class="param-title colorBlueWhite font600">' + res.features[i].name + '</span>';
                        params += '<span class="param-value fontSize16">' + res.features[i].value + '</span>';
                        params += '</li>';
                    }

                }
                $("#params-list-div").empty().append(params);
                $("#property").empty().append(property);

                if(colors != '')
                    $("#product-colors-variants").empty().append(colors);

                if(options !== '')
                    $("#property").append(options);
            }
        });

        $(document).on("click","input[name='productColor']", function() {
            

            if($(this).attr('data-price') !== undefined) {
                $(".price").empty().append($(this).attr('data-price'));
            }
            else {
                $("#availableCount").empty().append($(this).attr('data-count'));
            }

            let html = '<div class="product-option">';
            html += '<span class="color" style="background-color: ' + $(this).attr('data-label') + ';"></span>';
            html += '<span class="color-label ms-2">' + $(this).attr('data-val') + '</span>';
            html += '</div>';

            $("#product_options").empty().append(html);
            $(".price").empty().append($(this).attr('data-price'));
            $("#product-color-variant-selected").empty().append($(this).attr('data-val'));
        });

        $(document).on("click","button[name='productOption']", function() {

            if($(this).attr('data-price') !== undefined)
                $(".price").empty().append($(this).attr('data-price'));
            else
                $("#availableCount").empty().append($(this).attr('data-count'));
            
            $('#selected_option_for_feature_' + $(this).attr('data-id')).empty().append($(this).attr('data-val'));
        });
        let star="";
        let roundRatting=Math.floor('{{ $product['rate'] }}');
        for(var i = 5; i >= 1; i--) {
            if(i <= roundRatting)
                star += '<i class="icon-visit-star me-1 fontSize21"></i>';
            else
                star += '<i class="icon-visit-staroutline me-1 fontSize14"></i>';
        }
        $(".rattingToStar").empty().append(star);
        $('#commentNavLink').click(function(){
             $('html, body').animate({
                'scrollTop': $('#scrollspyHeading4').offset().top - 210
            });
        });
        
        $('#propertyNavLink').click(function(){
             $('html, body').animate({
                'scrollTop': $('#scrollspyHeading3').offset().top - 210
            });
        });
        
        $('#checkNavLink').click(function(){
             $('html, body').animate({
                'scrollTop': $('#scrollspyHeading1').offset().top - 210
            });
        });
});
</script> --}}
    <script>
        function buildQuery() {
            
            let query = new URLSearchParams();
            
            let visibility = $("#visibilityFilter").val();
            let isInTopList = $("#isInTopListFilter").val();
            let brand = $("#brandFilter").val();
            let category = $("#categoryFilter").val();
            let off = $("#offFilter").val();
            let comment = $("#commentFilter").val();
            let max = $("#maxFilter").val();
            let min = $("#minFilter").val();
            let orderBy = $("#orderBy").val();
            let orderByType = $("#orderByType").val();

            let toCreatedAt = $("#toCreatedAt").val();
            let fromCreatedAt = $("#fromCreatedAt").val();

            if(visibility !== 'all')
                query.append('visibility', visibility);
                
            if(isInTopList !== 'all')
                query.append('isInTopList', isInTopList);
                
             if(brand !== 'all')
                query.append('brand', brand);
               
            if(category !== 'all')
                query.append('category', category);

            if(max !== '')
                query.append('max', max);
                
            if(min !== '')
                query.append('min', min);

            if(off !== 'all')
                query.append('off', off);

            if(comment !== 'all')
                query.append('comment', comment);
                
            if(toCreatedAt !== '')
                query.append('toCreatedAt', toCreatedAt);
                
            if(fromCreatedAt !== '')
                query.append('fromCreatedAt', fromCreatedAt);

            query.append('orderBy', orderBy);
            query.append('orderByType', orderByType);

            return query;
        }

        function filter() {
            document.location.href = '{{ route('product.index') }}' + '?' + buildQuery().toString();
        }
        
        function excel() {
            window.open('{{ route('product.excel') }}' + '?' + buildQuery().toString(), '_blank');
        }

    </script>

    <script src="{{ asset('theme-assets/js/theme.js') }}"></script>
    <script src="{{ asset('theme-assets/js/custom.js') }}"></script>
@stop
@extends('layouts.structure')

@section('seo')
    <title>ویزیت ایران | خانه</title>

    <script>

        let LIST_API = '{{ route('api.event.list') }}';
        let HOME_API = '{{ route('event.home') }}';
        let defaultMinPrice=  '{{ number_format($minPrice) }}';
        let defaultMaxPrice=  '{{ number_format($maxPrice) }}';
        let eventPrefixRoute = HOME_API + "/event";
        
        let cat = '{{ isset($name) ? $name : -1 }}';

    </script>

@stop


@section('content')
        <main class="page-content TopParentBannerMoveOnTop">
            <div class="container">
                <div class="row">
                    @include('event.layouts.searchbar', ['forList' => true])
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
                                                <input id="searchBoxInput" type="text" name="s" class="form-control"
                                                    placeholder="نام محصول یا…">
                                                <i onclick="filter()" class="ri-search-line icon cursorPointer"></i>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end of widget -->
                                
                                <!-- start of widget -->
                                <div class="widget widget-collapse mb-3">
                                    <div class="widget-title widget-title--collapse-btn d-flex gap10 align-items-center" data-bs-toggle="collapse"
                                        data-bs-target="#collapseGroupingFacil" aria-expanded="false"
                                        aria-controls="collapseGroupingFacil" role="button">امکانات ویژه 
                                        
                                        <div id="facilities_filters_count_container" class="hidden">
                                            <i class="circle colorBlue align-self-center"></i>
                                            <span class="colorBlue fontSize12">
                                                <span id="facilities_filters_count" ></span><span> فیلتر</span>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="widget-content widget--search collapse" id="collapseGroupingFacil">
                                        
                                        <div class="filter-options do-simplebar pt-2 mt-2">
                                            <div id="facilities">
                                                @foreach ($facilities as $facil)
                                                    <li class="form-check">
                                                        <input name="facilities" class="form-check-input" type="checkbox" value="{{ $facil }}" />
                                                        {{ $facil }}
                                                    </li>
                                                @endforeach
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- end of widget -->


                                <!-- start of widget -->
                                <div class="widget widget-collapse mb-3">
                                    <div class="widget-title widget-title--collapse-btn d-flex gap10 align-items-center" data-bs-toggle="collapse"
                                        data-bs-target="#collapseGroupingLang" aria-expanded="false"
                                        aria-controls="collapseGroupingLang" role="button">زبان
                                        
                                        <div id="langs_filters_count_container" class="hidden">
                                            <i class="circle colorBlue align-self-center"></i>
                                            <span class="colorBlue fontSize12">
                                                <span id="langs_filters_count" ></span><span> فیلتر</span>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="widget-content widget--search collapse" id="collapseGroupingLang">
                                        
                                        <div class="filter-options do-simplebar pt-2 mt-2">
                                            <div id="langs">
                                                @foreach ($langs as $lang)
                                                    <li class="form-check">
                                                        <input name="langs" class="form-check-input" type="checkbox" value="{{ $lang }}" />
                                                        <div>
                                                            @lang($lang)
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- end of widget -->


                                <!-- start of widget -->
                                <div class="widget widget-collapse mb-3">
                                    <div class="widget-title widget-title--collapse-btn d-flex gap10 align-items-center" data-bs-toggle="collapse"
                                        data-bs-target="#collapseGroupingLevel" aria-expanded="false"
                                        aria-controls="collapseGroupingLevel" role="button">سطح
                                        
                                        <div id="levels_filters_count_container" class="hidden">
                                            <i class="circle colorBlue align-self-center"></i>
                                            <span class="colorBlue fontSize12">
                                                <span id="levels_filters_count" ></span><span> فیلتر</span>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="widget-content widget--search collapse" id="collapseGroupingLevel">
                                        
                                        <div class="filter-options do-simplebar pt-2 mt-2">
                                            <div id="levels">
                                                @foreach ($levels as $level)
                                                    <li class="form-check">
                                                        <input name="levels" class="form-check-input" type="checkbox" value="{{ $level }}" />
                                                        <div>
                                                            @level_description($level)
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- end of widget -->

                                <!-- start of widget -->
                                <div class="widget widget-collapse mb-3">
                                    <div class="widget-title widget-title--collapse-btn d-flex gap10 align-items-center" data-bs-toggle="collapse"
                                        data-bs-target="#collapseGroupingCity" aria-expanded="false"
                                        aria-controls="collapseGroupingCity" role="button">شهر
                                        
                                        <div id="cities_filters_count_container" class="hidden">
                                            <i class="circle colorBlue align-self-center"></i>
                                            <span class="colorBlue fontSize12">
                                                <span id="cities_filters_count" ></span><span> فیلتر</span>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="widget-content widget--search collapse" id="collapseGroupingCity">
                                        
                                        <div class="filter-options do-simplebar pt-2 mt-2">
                                            <div id="levels">
                                                @foreach ($cities as $city)
                                                    <li class="form-check">
                                                        <input name="cities" class="form-check-input" type="checkbox" value="{{ $city->id }}" />
                                                        {{ $city->name }}
                                                    </li>
                                                @endforeach
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- end of widget -->

                                <!-- start of widget -->
                                <div class="widget widget-collapse mb-3">
                                    <div class="widget-title widget-title--collapse-btn d-flex gap10 align-items-center" data-bs-toggle="collapse"
                                        data-bs-target="#collapseGroupingLauncher" aria-expanded="false"
                                        aria-controls="collapseGroupingLauncher" role="button">برگزار کننده
                                        
                                        <div id="launchers_filters_count_container" class="hidden">
                                            <i class="circle colorBlue align-self-center"></i>
                                            <span class="colorBlue fontSize12">
                                                <span id="launchers_filters_count" ></span><span> فیلتر</span>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="widget-content widget--search collapse" id="collapseGroupingLauncher">
                                        
                                        <div class="filter-options do-simplebar pt-2 mt-2">
                                            <div id="launchers">
                                                @foreach ($launchers as $launcher)
                                                    <li class="form-check">
                                                        <input name="launchers" class="form-check-input" type="checkbox" value="{{ $launcher->id }}" />
                                                        {{ $launcher->company_name }}
                                                    </li>
                                                @endforeach
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- end of widget -->


                                <!-- start of widget -->
                                <div class="widget widget-collapse mb-3">
                                    <div class="widget-title widget-title--collapse-btn d-flex gap10 align-items-center" data-bs-toggle="collapse"
                                        data-bs-target="#collapseGroupingType" aria-expanded="false"
                                        aria-controls="collapseGroupingType" role="button">نوع رویداد
                                        
                                        <div id="type_filters_count_container" class="hidden">
                                            <i class="circle colorBlue align-self-center"></i>
                                            <span class="colorBlue fontSize12">
                                                <span id="type_filters_count" ></span><span> فیلتر</span>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="widget-content widget--search collapse" id="collapseGroupingType">
                                        
                                        <div class="filter-options do-simplebar pt-2 mt-2">
                                            <div id="types">
                                                <li class="form-check">
                                                    <input name="types" class="form-check-input" type="checkbox" value="online" />
                                                    مجازی
                                                </li>
                                                <li class="form-check">
                                                    <input name="types" class="form-check-input" type="checkbox" value="not_online" />
                                                    حضوری
                                                </li>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- end of widget -->


                                @if(isset($tags))
                                    <!-- start of widget -->
                                    <div class="widget widget-collapse mb-3">
                                        <div class="widget-title widget-title--collapse-btn d-flex gap10 align-items-center" data-bs-toggle="collapse"
                                            data-bs-target="#collapseGroupingTag" aria-expanded="false"
                                            aria-controls="collapseGroupingTag" role="button">دسته بندی
                                            
                                            <div id="tags_filters_count_container" class="hidden">
                                                <i class="circle colorBlue align-self-center"></i>
                                                <span class="colorBlue fontSize12">
                                                    <span id="tags_filters_count" ></span><span> فیلتر</span>
                                                </span>
                                            </div>

                                        </div>
                                        <div class="widget-content widget--search collapse" id="collapseGroupingTag">
                                            
                                            <div class="filter-options do-simplebar pt-2 mt-2">
                                                <div id="tags">
                                                    @foreach ($tags as $tag)
                                                        <li class="form-check">
                                                            <input name="tags" class="form-check-input" type="checkbox" value="{{ $level }}" />
                                                            {{ $tag }}
                                                        </li>
                                                    @endforeach
                                                </div>
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
                                            <label class="form-check-label" for="has_selling_stock">رویداد های دارای ظرفیت</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of widget -->
                                                                <!-- start of widget -->
                                <div class="widget py-1 mb-3">
                                    <div class="widget-content widget--filter-switcher">
                                        <div class="form-check form-switch mb-0">
                                            <input class="form-check-input" type="checkbox" id="has_selling_offs">
                                            <label class="form-check-label" for="has_sellingoffs">فقط رویداد های دارای تخفیف</label>
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
                            <i class="ri-equalizer-fill ms-1"></i>
                        </button>

                        <div class="listing-products">
                            <div class="listing-products-content">
                                <!-- start of tab-content -->
                                <div class="tab-content marginTopNegative5" id="sort-tabContent">
                                    <!-- start of tab-pane -->
                                    <div class="tab-pane fade show active" id="most-visited" role="tabpanel"
                                        aria-labelledby="most-visited-tab">
                                        <div class="ui-box p-1 mb-4">
                                            <div class="ui-box-content p-0">
                                                <div class="row mx-0">
                                                    
                                                    <div id="sample_event_div" class="hidden">
                                                        @include('event.event.event_card', ['key' => 'sampleEvent'])
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

                                                    <div id="events_div" class="hidden p-0" style="display: flex; flex-wrap: wrap; gap: 5px;">
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

    {{-- <script src="{{ asset('theme-assets/js/lazyLoading.js') }}"></script> --}}
    <script src="{{ asset('theme-assets/js/home.js') }}"></script>
    <script src="{{ asset('theme-assets/js/eventList.js') }}"></script>

    <script>

        $(document).ready(function() {
             $(".customEventBorderBox").addClass("minWidth250");

            let minMaxChange = false;
            let minMaxFetch = false;
            let currValues = [defaultMinPrice, defaultMaxPrice];

            document.body.onmouseup = function() {
                if(minMaxChange && !minMaxFetch) {
                    console.log(minMaxChange);
                    minMaxChange = false;
                    minMaxFetch = true;
                    filter();
                }
            }

            var skipSlider = document.getElementById("slider-non-linear-step");

            skipSlider.noUiSlider.on("update", function (values, handle) {
                
                if(parseInt(values[0]) != parseInt(currValues[0]) || parseInt(values[1] != parseInt(currValues[1]))) {
                    minMaxChange = true;
                    minMaxFetch = false;
                    currValues = values;
                }
            });

            $("#orderBy").on('change', function() {
                filter();
            });

            $("#has_selling_stock").on('change', function() {
                filter();
            });
            
            $("#has_selling_offs").on('change', function() {
                filter();
            });

            @if(!isset($initialSet))
                filter();
            @else
                let data = JSON.parse('{!! json_encode($initialSet) !!}');
                let html = renderEvents(data, "sampleEvent");
                $("#events_div").empty().append(html).removeClass("hidden");
                $("#shimmer").addClass("hidden");
                $("#nothingToShow").addClass("hidden");
                $("#total_count")
                    .empty()
                    .append(data.length + " رویداد");
                $("#");
            @endif

        });

    </script>

@stop
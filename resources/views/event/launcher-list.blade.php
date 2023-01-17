@extends('layouts.structure')

@section('seo')
    <title>ویزیت ایران | خانه</title>
@stop


@section('content')
        <main class="page-content TopParentBannerMoveOnTop">
            <div class="container">
                <div class="row">
                    {{-- @include('event.layouts.searchbar', ['forMarginTop' => true]) --}}
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
                                        <div class="widget-title m-0 b-0">فیلتر 
                                            <span id="total_filters" class="fontSize12 colorBlue hidden">
                                                <span id="total_filters_count"></span>
                                                <span>فیلتر</span>
                                            </span>
                                        </div>
                                        <a id="remove_all_filters" onclick="clearAllFilters()" class="hidden colorRed cursorPointer fontSize12 align-self-center">حذف نتایج</a>
                                    </div>
                                    <div id="total_count" class="colorBlue fontSize12 align-self-center"></div>
                                    
                                </div>
                                <!-- start of widget -->
                                <div class="widget widget-collapse mb-3">
                                    <div class="widget-title widget-title--collapse-btn d-flex gap10 align-items-center" data-bs-toggle="collapse"
                                        data-bs-target="#collapseGroupingStar" aria-expanded="false"
                                        aria-controls="collapseGroupingStar" role="button">امتیاز

                                        <div id="star_filters_count_container" class="hidden">
                                            <i class="circle colorBlue align-self-center"></i>
                                            <span class="colorBlue fontSize12">
                                                <span id="star_filters_count" ></span><span> فیلتر</span>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="widget-content widget--search collapse" id="collapseGroupingStar">
                                        
                                        <div class="filter-options do-simplebar pt-2 mt-2">
                                            <div id="levels">
                                                    <li class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" />
                                                        بیشتر از 4 ستاره    
                                                    </li>
                                                    <li class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" />
                                                        بیشتر از 3 ستاره
                                                    </li>
                                                    <li class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" />
                                                        بیشتر از 2 ستاره
                                                    </li>
                                                    <li class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" />
                                                        بیشتر از 1 ستاره
                                                    </li>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- end of widget -->
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
                                            {{-- <div id="levels">
                                                @foreach ($cities as $city)
                                                    <li class="form-check">
                                                        <input name="cities" class="form-check-input" type="checkbox" value="{{ $city->id }}" />
                                                        {{ $city->name }}
                                                    </li>
                                                @endforeach
                                            </div> --}}
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- end of widget -->

                                <!-- start of widget -->
                                <div class="widget widget-collapse">
                                    <div class="widget-title widget-title--collapse-btn" data-bs-toggle="collapse"
                                        data-bs-target="#collapsePriceFilter" aria-expanded="false"
                                        aria-controls="collapsePriceFilter" role="button">تعداد دنبال کننده</div>
                                    <div class="widget-content widget--search fa-num collapse" id="collapsePriceFilter">
                                        <div class="filter-price">
                                            <div class="filter-slider">
                                                <div id="slider-non-linear-step" class="price-slider"></div>
                                            </div>
                                            <ul class="filter-range mb-4 d-none">
                                                <li>
                                                    <input type="text" data-value="" value="" name="price[min]"
                                                        data-range="12" class="js-slider-range-from"
                                                        id="skip-value-lower" disabled>
                                                    <span class="fontSize20 colorYellow">ت</span>
                                                </li>
                                                <li class="label fw-bold">تا</li>
                                                <li>
                                                    <input type="text" data-value="" value=""
                                                        name="price[max]" data-range="0"
                                                        class="js-slider-range-to" id="skip-value-upper" disabled>
                                                    <span class="fontSize20 colorYellow">ت</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of widget -->
                                                                <!-- start of widget -->
                                <div class="widget py-1 mb-3">
                                    <div class="widget-content widget--filter-switcher">
                                        <div class="form-check form-switch mb-0">
                                            <input class="form-check-input" type="checkbox" id="has_selling_offs">
                                            <label clas="form-check-label" for="has_sellingoffs">فقط رویداد های در حال اجرا</label>
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
                                                    <!-- از اینجا -->
                                                    <div id="launcher_list_div" class="p-0" style="display: flex; flex-wrap: wrap; gap: 5px;">
                                                        <div onclick="" class="cursorPointer handleInMedia">
                                                        <!-- start of launcher-card -->
                                                            <div class="product-card customBorderBoxShadow minWidth200">
                                                                <div class="product-thumbnail">
                                                                    <a>
                                                                        <img id="sampleImg_17" src="https://hcshop.taci.ir/storage/products//Io711aN5wcgXw2kDJeXF2SXYDOQbqea8qI45MCbZ.jpg">
                                                                    </a>
                                                                </div>
                                                                <div class="product-card-body">
                                                                    <h2 class="product-title">
                                                                        <a id="sampleHeader_17" class="textColor fontSize12">روتختي قلمكار عطريان طرح خشتي مدل G278</a>
                                                                    </h2>
                                                                    <div class="product-variant">
                                                                        <span id="sampleTag_17" class="colorWhite customBoxLabel fontSize11">پارچه قلمکار</span>
                                                                    </div>
                                                                    <div id="sampleMultiColor_17" class="colorCircle hidden"></div>
                                                                    <div class="spaceBetween mt-3 mb-3">
                                                                        <span id="sampleCritical_17" class="fontSize11 colorRed whiteSpaceNoWrap d-flex alignSelfCenter">
                                                                            <span id="sampleAvailableJust" class="">
                                                                                <span class="d-flex alignSelfCenter alignItemsCenter">تعداد فالورها<span class="px-1">عدد</span></span>
                                                                                {{-- <span>&nbsp;</span>
                                                                                <span id="sampleCriticalCount_17">3</span>
                                                                                <span>&nbsp;</span> --}}
                                                                                
                                                                            </span>
                                                                            <span id="sampleFinishAvailable" class="hidden">اتمام موجودی</span>
                                                                        </span>
                                                                        <span id="sampleRate_17"><i class="icon-visit-staroutline fontSize18"></i><i class="icon-visit-star fontSize25"></i><i class="icon-visit-star fontSize25"></i><i class="icon-visit-star fontSize25"></i><i class="icon-visit-star fontSize25"></i></span>
                                                                    </div>
                                                                </div>
                                                                <div class="product-card-footer mb-2">
                                                                    <div id="mostSeenEventLauncherParent" class="textColor">
                                                                        <span class="bold">تعداد رویداد های فعال </span>
                                                                        <span id="mostSeenEventLauncher">تهران -منطقه 1</span>
                                                                    </div>
                                                                    <div id="mostSeenEventLauncherParent2" class="textColor">
                                                                        <span class="bold">کل رویداد ها</span>
                                                                        <span id="mostSeenEventLauncher2">آکادمی صدای اصفهان</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end of launcher-card -->                                                    
                                                        </div>
                                                    </div>
                                                    <!-- تا اینجا -->
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
    <script src="{{ asset('theme-assets/js/eventList.js?v=1.2') }}"></script>

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
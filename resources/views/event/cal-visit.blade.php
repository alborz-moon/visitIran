@extends('layouts.structure')
@section('header')
    @parent
    <link rel="stylesheet" href="{{ URL::asset('theme-assets/bootstrap-datepicker.css?v=1') }}">
    <script src="{{ URL::asset('theme-assets//bootstrap-datepicker.js') }}"></script> 
@stop
@section('content')
    <main class="page-content TopParentBannerMoveOnTop">
        <div class="w-100 backgroundWhite marginTopNegative5">
            <div class="container pb-1 pt-3">
                <span class="ui-box-title fontSize20 mb-3">
                    <img class="p-2" src="http://myshop.com/./theme-assets/images/svg/headlineTitle.svg" alt="">
                    رویداد خود را بیابید
                </span>
                <div class="row">
                    <div class="col-xs-12 col-md-2 marginBottom5">
                        <input type="text" class="form-control customBackgroundWhite w-100" placeholder="نام رویداد">
                    </div>
                    <div class="col-xs-12 col-md-2 marginBottom5">
                        <select class="select2 seachbar-select" aria-placeholder="" id="launcherFilter">
                            <option selected value="0">نوع رویداد</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-md-2 marginBottom5">
                        <select class="select2 seachbar-select" aria-placeholder="" id="cityFilter">
                            <option selected value="0">محل برگزاری</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-md-4 marginBottom5">
                        <label class="tripCalenderSection w-100">
                            <span class="calendarIcon"></span>
                            <input id="date_input_launcher" class="tripDateInput form-control customBackgroundWhite w-100"
                                placeholder="تاریخ برگزاری" required readonly type="text">
                        </label>
                    </div>
                    <div class="col-xs-12 col-md-2 marginBottom5">
                        <button onclick="goToListPage()" class="btn btn-primary whiteSpaceNoWrap w-100">جست و جو</button>
                    </div>
                </div>
            </div>
        </div>
        <input id="date_input_start_formatted_search" type="hidden" />
        <div class="container">
            <!-- start-container -->
            <div class="w-100 h-60 backgroundWhite mt-3 spaceBetween alignItemsCenter">
                <div class="d-flex alignItemsCenter">
                    <i class="icon-visit-date colorYellow fontSize30 px-2"></i>
                    <div class="d-flex fontSize14 bold"> پنج شنبه 21 اردیبهشت ماه 1401</div>
                    <div class="d-flex fontSize12 bold colorRed px-2">تعطیل رسمی</div>
                </div>
                <ul class="nav nav-pills d-flex alignItemsCenter tabPaneCal" id="pills-tab" role="tablist">
                    <li class="nav-item d-flex alignItemsCenter" role="presentation">
                        <button class="active b-0 backgroundWhite" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">رویداد های امروز</button>
                        <span class="mx-2" style="width: 1px;background-color: #c0c0c0;height: 49px"></span>
                    </li>
                    <li class="nav-item d-flex alignItemsCenter" role="presentation">
                        <button class=" b-0 backgroundWhite" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">روزانه</button>
                        <span class="mx-2" style="width: 1px;background-color: #c0c0c0;height: 49px"></span>
                    </li>
                    <li class="nav-item d-flex alignItemsCenter mr-2" role="presentation">
                        <button class=" b-0 backgroundWhite" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">ماهیانه</button>
                    </li>
                </ul>
            </div>
            <div class="row">

                <div class="col-xl-3 col-lg-3 col-md-4 responsive-sidebar mt-md-4 mt-sm-0" style="margin-top: -5px">

                    <div class="ui-sticky ui-sticky-top StickyMenuMoveOnTop zIndex0">
                        <div class="ui-box sidebar-widgets customFilter">
                            <!-- start of widget -->
                            <div class="widget mb-3">
                                <div class="spaceBetween">
                                    <div class="widget-title m-0 b-0">فیلتر
                                        <span id="total_filters" class="fontSize12 colorBlue hidden">
                                            <span id="total_filters_count"></span>
                                            <span>فیلتر</span>
                                        </span>
                                    </div>
                                    <a id="remove_all_filters" onclick="clearAllFilters()"
                                        class="hidden colorRed cursorPointer fontSize12 align-self-center">حذف نتایج</a>
                                </div>
                                <div id="total_count" class="colorBlue fontSize12 align-self-center"></div>

                            </div>
                            <!-- start of widget -->
                            <div class="widget widget-collapse mb-3">
                                <div class="widget-title widget-title--collapse-btn d-flex gap10 align-items-center"
                                    data-bs-toggle="collapse" data-bs-target="#collapseGroupingStar" aria-expanded="false"
                                    aria-controls="collapseGroupingStar" role="button">دسته بندی
                                    <div id="star_filters_count_container" class="hidden">
                                        <i class="circle colorBlue align-self-center"></i>
                                        <span class="colorBlue fontSize12">
                                            <span id="star_filters_count"></span><span> فیلتر</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="widget-content widget--search collapse" id="collapseGroupingStar">
                                    <div class="filter-options do-simplebar pt-2 mt-2">
                                        <div>
                                            <li class="form-check">
                                                <input class="form-check-input" type="checkbox"/>
                                                مناسبت های تقویمی
                                            </li>
                                            <li class="form-check">
                                                <input class="form-check-input" type="checkbox"/>
                                                مناسبت های ملی
                                            </li>
                                            <li class="form-check">
                                                <input class="form-check-input" type="checkbox"/>
                                                رویدادها
                                            </li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of widget -->
                            
                            <!-- start of widget -->
                            <div class="widget widget-collapse mb-3">
                                <div class="widget-title widget-title--collapse-btn d-flex gap10 align-items-center"
                                    data-bs-toggle="collapse" data-bs-target="#collapseGroupingCity"
                                    aria-expanded="false" aria-controls="collapseGroupingCity" role="button">محل برگزاری

                                    <div id="cities_filters_count_container" class="hidden">
                                        <i class="circle colorBlue align-self-center"></i>
                                        <span class="colorBlue fontSize12">
                                            <span id="cities_filters_count"></span><span> فیلتر</span>
                                        </span>
                                    </div>

                                </div>
                                <div class="widget-content widget--search collapse" id="collapseGroupingCity">

                                    <div class="filter-options do-simplebar pt-2 mt-2">
                                        <div id="levels">
                                            {{-- @foreach ($cities as $city)
                                                <li class="form-check">
                                                    <input name="cities" class="form-check-input" type="checkbox"
                                                        value="{{ $city->id }}" />
                                                    {{ $city->name }}
                                                </li>
                                            @endforeach --}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- end of widget -->
                            <!-- start of widget -->
                            <div class="widget py-1 mb-3">
                                <div class="widget-content widget--filter-switcher">
                                    <div class="form-check form-switch mb-0">
                                        <input class="form-check-input" type="checkbox" id="has_selling_offs">
                                        <label clas="form-check-label" for="has_sellingoffs">فقط آنلاین
                                            </label>
                                    </div>
                                </div>
                            </div>
                            <!-- end of widget -->
                            <!-- start of widget -->
                            <div class="widget py-1 mb-3">
                                <div class="widget-content widget--filter-switcher">
                                    <label class="form-check-label widget-title b-0" for="has_sellingoffs">محدوده زمانی </label>
                                    <div class="d-flex alignItemsCenter p-1">
                                        <div id="date_btn_start_edit" class="label fs-7 font600 px-2">از</div>
                                        <label class="tripCalenderSection w-100">
                                           <input style="direction: rtl" id="date_input_start" class="tripDateInput w-100 form-control directionLtr backColorWhite" placeholder="تاریخ شروع" required readonly type="text">
                                        </label>
                                    </div>
                                    <div class="d-flex alignItemsCenter p-1">
                                        <div id="date_btn_start_edit" class="label fs-7 font600 px-2">تا</div>
                                        <label class="tripCalenderSection w-100">
                                           <input style="direction: rtl" id="date_input_stop" class="tripDateInput w-100 form-control directionLtr backColorWhite" placeholder="تاریخ پایان" required readonly type="text">
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <!-- end of widget -->

                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-8 px-0">
                    <div class="d-md-none">
                    <div class="d-flex justifyContentSpaceBetween alignItemsCenter p-2">
                        <div>
                            <button class="btn btn-primary mb-3 d-md-none toggle-responsive-sidebar mt-3">فیلتر پیشرفته
                                <i class="ri-equalizer-fill ms-1"></i>
                            </button>
                            <span id="total_filters_count_mobile" class="remove_all_filters me-1 colorBlue fontSize12"></span><span class="remove_all_filters colorBlue fontSize12">فیلتر</span>
                        </div>
                        <div>
                            <a onclick="clearAllFilters()" class="colorRed cursorPointer fontSize12 align-self-center remove_all_filters hidden">حذف نتایج</a>
                        </div>
                    </div>
                    </div>
                    <div class="listing-products">
                        <div class="listing-products-content">
                            <!-- start of tab-content -->
                            <div class="tab-content marginTopNegative5" id="sort-tabContent">
                                <!-- start of tab-pane -->
                                <div class="tab-pane fade show active mt-4" id="most-visited" role="tabpanel"
                                    aria-labelledby="most-visited-tab">
                                    <div class="p-1 mb-4">
                                        <div class="ui-box-content p-0">
                                            <div class="row mx-0">
                                                <div class="tab-content p-0" id="pills-tabContent">
                                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">1</div>
                                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                        <div class="d-flex alignItemsCenter p-1 gap10">
                                                            <div class="boxShadow backgroundColorWhite position-relative">
                                                                <div class="position-absolute l-0 colorWhite" style="top: 15px">
                                                                    <span class="px-3 backgroundColorYellow">مناسبت تقویمی</span>
                                                                </div>
                                                                <div class="d-flex ">
                                                                    <img width="211" class="objectFitCover p-1 borderRadius10" src="data:image/png;base64,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" alt="">
                                                                    <div class="p-2">
                                                                        <div class="fontSize20">نام رویداد <span></span></div>
                                                                    <p>
                                                                        با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این 
                                                                    </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex flexDirectionColumn gap10 alignSelfEnd">
                                                                    <div style="width: 53px;height: 53px;border-radius:0" class="boxShadow overFlowHidden">
                                                                        <div style="height: 20px;border-radius: 0;" class="backgroundColorYellow colorWhite fontSize12 w-100 overFlowHidden d-flex justifyContentCenter">پنج شنبه</div>
                                                                        <div class="d-flex justifyContentCenter fontSize20" style="margin-top: -5px">21</div>
                                                                        <div class="d-flex justifyContentCenter fontSize12" style="margin-top: -12px">اردیبهشت</div>
                                                                    </div>
                                                                    <div style="width: 53px;height: 53px;border-radius:0" class="boxShadow overFlowHidden">
                                                                        <div style="height: 20px;border-radius: 0;" class="backgroundColorRed colorWhite fontSize12 w-100 overFlowHidden d-flex justifyContentCenter">پنج شنبه</div>
                                                                        <div class="d-flex justifyContentCenter fontSize20" style="margin-top: -5px">21</div>
                                                                        <div class="d-flex justifyContentCenter fontSize12" style="margin-top: -12px">اردیبهشت</div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">3</div>
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
            <!-- end-container -->
        </div>
    </main>

    <input id="date_input_start_formatted" type="hidden" />
    <input id="date_input_stop_formatted" type="hidden" />
@stop


@section('extraJS')
    @parent
        <script>
        var dateStart ='';
        var dateStop = '';
            
        var datePickerOptions = {
            numberOfMonths: 1,
            showButtonPanel: true,
            dateFormat: "DD d M سال yy",
            altFormat: "yy/mm/dd",
            altField: $("#date_input_start_formatted_search")
        };

        $("#date_input_launcher").datepicker(datePickerOptions);

        var datePickerOptionsStart = {
            numberOfMonths: 1,
            showButtonPanel: true,
            dateFormat: "DD d M سال yy",
            altFormat:"yy/mm/dd",
            altField: $("#date_input_start_formatted")
        };

        var datePickerOptionsEnd = {
            numberOfMonths: 1,
            showButtonPanel: true,
            dateFormat: "DD d M سال yy",
            altFormat:"yy/mm/dd",
            altField: $("#date_input_stop_formatted")
        };

        $("#date_input_start").datepicker(datePickerOptionsStart);
        $("#date_input_stop").datepicker(datePickerOptionsEnd);

        function goToListPage() {

            let query = new URLSearchParams();

            let tag = $('#tagFilter').val();
            let launcher = $('#launcherFilter').val();
            let city = $('#cityFilter').val();

            if (tag != 0)
                query.append('tag', tag);

            if (launcher != 0)
                query.append('launcher', launcher);

            if (city != 0)
                query.append('city', city);

            document.location.href = '{{ route('event.category.list', ['orderBy' => 'createdAt']) }}' + "?" + query
                .toString();
        }
    </script>
@stop

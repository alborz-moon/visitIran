@extends('layouts.structure')
@section('header')
    @parent
    <link rel="stylesheet" href="{{ URL::asset('theme-assets/bootstrap-datepicker.css?v=1') }}">
    <script src="{{ URL::asset('theme-assets//bootstrap-datepicker.js') }}"></script>
    <style>
        /* @media only screen and (max-width: 400px) {
                                                                                                     .dateTopic {
                                                                                                      display: none
                                                                                                     }
                                                                                                    } */
    </style>
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
            <div class="w-100 h-60 backgroundWhite mt-3 spaceBetween alignItemsCenter advanceFilter">
                <div class="d-flex alignItemsCenter flexDirectionColumn">
                    <div class="d-flex ">

                        <i class="icon-visit-date colorYellow fontSize30 px-2"></i>
                        <div>

                            <div class="d-flex fontSize14 bold whiteSpaceNoWrap"> پنج شنبه 21 اردیبهشت ماه 1401</div>
                            <div class="d-flex fontSize12 bold colorRed px-2">تعطیل رسمی</div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary  d-md-none toggle-responsive-sidebar advanceFilterBtn"
                            style=" padding:4px; min-height:24px">فیلتر
                            پیشرفته
                            <i class="ri-equalizer-fill ms-1"></i>
                        </button>
                    </div>
                </div>
                <ul class="nav nav-pills d-flex alignItemsCenter tabPaneCal noWrap moblieCal" id="pills-tab" role="tablist">
                    <li class="nav-item d-flex alignItemsCenter whiteSpaceNoWrap" role="presentation">
                        <button class="active b-0 backgroundWhite" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">رویداد های امروز</button>
                        <span class="mx-2" style="width: 1px;background-color: #c0c0c0;height: 49px"></span>
                    </li>
                    <li class="nav-item d-flex alignItemsCenter" role="presentation">
                        <button class="b-0 backgroundWhite" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">روزانه</button>
                        <span class="mx-2" style="width: 1px;background-color: #c0c0c0;height: 49px"></span>
                    </li>
                    <li class="nav-item d-flex alignItemsCenter mr-2" role="presentation">
                        <button class=" b-0 backgroundWhite" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">ماهیانه</button>
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
                                    data-bs-toggle="collapse" data-bs-target="#collapseGroupingStar"
                                    aria-expanded="false" aria-controls="collapseGroupingStar" role="button">دسته بندی
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
                                                <input class="form-check-input" type="checkbox" />
                                                مناسبت های تقویمی
                                            </li>
                                            <li class="form-check">
                                                <input class="form-check-input" type="checkbox" />
                                                مناسبت های ملی
                                            </li>
                                            <li class="form-check">
                                                <input class="form-check-input" type="checkbox" />
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
                                    <label class="form-check-label widget-title b-0" for="has_sellingoffs">محدوده زمانی
                                    </label>
                                    <div class="d-flex alignItemsCenter p-1">
                                        <div id="date_btn_start_edit" class="label fs-7 font600 px-2">از</div>
                                        <label class="tripCalenderSection w-100">
                                            <input style="direction: rtl" id="date_input_start"
                                                class="tripDateInput w-100 form-control directionLtr backColorWhite"
                                                placeholder="تاریخ شروع" required readonly type="text">
                                        </label>
                                    </div>
                                    <div class="d-flex alignItemsCenter p-1">
                                        <div id="date_btn_start_edit" class="label fs-7 font600 px-2">تا</div>
                                        <label class="tripCalenderSection w-100">
                                            <input style="direction: rtl" id="date_input_stop"
                                                class="tripDateInput w-100 form-control directionLtr backColorWhite"
                                                placeholder="تاریخ پایان" required readonly type="text">
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <!-- end of widget -->

                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-8 px-0">
                    <div style="display:none " class="d-md-none">
                        <div class="d-flex justifyContentSpaceBetween alignItemsCenter p-2">
                            <div>
                                <button class="btn btn-primary mb-3 d-md-none toggle-responsive-sidebar mt-3">فیلتر پیشرفته
                                    <i class="ri-equalizer-fill ms-1"></i>
                                </button>
                                <span id="total_filters_count_mobile"
                                    class="remove_all_filters me-1 colorBlue fontSize12"></span><span
                                    class="remove_all_filters colorBlue fontSize12">فیلتر</span>
                            </div>
                            <div>
                                <a onclick="clearAllFilters()"
                                    class="colorRed cursorPointer fontSize12 align-self-center remove_all_filters hidden">حذف
                                    نتایج</a>
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
                                                    <div class="tab-pane fade show active" id="pills-home"
                                                        role="tabpanel" aria-labelledby="pills-home-tab">

                                                        <div class="container">
                                                            <div class="row">
                                                                @include('event.layouts.a')
                                                                @include('event.layouts.a')
                                                                @include('event.layouts.a')
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                                        aria-labelledby="pills-profile-tab">
                                                        <div class="d-flex alignItemsCenter p-1 gap10 ">
                                                            <div class="boxShadow backgroundColorWhite position-relative">
                                                                <div class="position-absolute l-0 colorWhite"
                                                                    style="top: 15px">
                                                                    <span class="px-3 backgroundColorYellow">تست
                                                                        ۲</span>
                                                                </div>
                                                                <div class="d-flex ">
                                                                    <img width="211"
                                                                        class="objectFitCover p-1 borderRadius10"
                                                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsxkI07nHexe_9vS8jw7OKUzSFQzTuZv77VA&usqp=CAU">
                                                                    <div class="p-2">
                                                                        <div class="fontSize20">
                                                                            روزانه <span></span>
                                                                        </div>
                                                                        <p>
                                                                            با تولید سادگی نامفهوم
                                                                            از صنعت چاپ و با استفاده
                                                                            از طراحان گرافیک است.
                                                                            چاپگرها و متون بلکه
                                                                            روزنامه و
                                                                            مجله در ستون و سطرآنچنان
                                                                            که لازم است و برای شرایط
                                                                            فعلی تکنولوژی مورد نیاز
                                                                            و کاربردهای متنوع با
                                                                            هدف
                                                                            بهبود ابزارهای کاربردی
                                                                            می باشد. کتابهای زیادی
                                                                            در شصت و سه درصد گذشته،
                                                                            حال و آینده شناخت فراوان
                                                                            جامعه و
                                                                            متخصصان را می طلبد تا با
                                                                            نرم افزارها شناخت بیشتری
                                                                            را برای طراحان رایانه ای
                                                                            علی الخصوص طراحان
                                                                            خلاقی
                                                                            و
                                                                            فرهنگ پیشرو در زبان
                                                                            فارسی ایجاد کرد. در این
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex flexDirectionColumn gap10 alignSelfEnd">
                                                                <div style="width: 53px;height: 53px;border-radius:0"
                                                                    class="boxShadow overFlowHidden">
                                                                    <div style="height: 20px;border-radius: 0;"
                                                                        class="backgroundColorYellow colorWhite fontSize12 w-100 overFlowHidden d-flex justifyContentCenter">
                                                                        پنج شنبه</div>
                                                                    <div class="d-flex justifyContentCenter fontSize20"
                                                                        style="margin-top: -5px">21
                                                                    </div>
                                                                    <div class="d-flex justifyContentCenter fontSize12"
                                                                        style="margin-top: -12px">
                                                                        اردیبهشت</div>
                                                                </div>
                                                                <div style="width: 53px;height: 53px;border-radius:0"
                                                                    class="boxShadow overFlowHidden">
                                                                    <div style="height: 20px;border-radius: 0;"
                                                                        class="backgroundColorRed colorWhite fontSize12 w-100 overFlowHidden d-flex justifyContentCenter">
                                                                        پنج
                                                                        شنبه</div>
                                                                    <div class="d-flex justifyContentCenter fontSize20"
                                                                        style="margin-top: -5px">21
                                                                    </div>
                                                                    <div class="d-flex justifyContentCenter fontSize12"
                                                                        style="margin-top: -12px">
                                                                        اردیبهشت</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                                        aria-labelledby="pills-contact-tab">
                                                        <div class="d-flex alignItemsCenter p-1 gap10">
                                                            <div class="boxShadow backgroundColorWhite position-relative">
                                                                <div class="position-absolute l-0 colorWhite"
                                                                    style="top: 15px">
                                                                    <span class="px-3 backgroundColorYellow">مناسبت
                                                                        تقویمی</span>
                                                                </div>
                                                                <div class="d-flex ">
                                                                    <img width="210" style=" max-height:210px"
                                                                        class="objectFitCover p-1 borderRadius10"
                                                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpOCIPOxKGbMo_LhjiZ3kQquwhDkjuNWNPUg&usqp=CAU">
                                                                    <div class="p-2">
                                                                        <div class="fontSize20">
                                                                            ماهانه <span></span>
                                                                        </div>
                                                                        <p>
                                                                            با تولید سادگی نامفهوم
                                                                            از صنعت چاپ و با استفاده
                                                                            از طراحان گرافیک است.
                                                                            چاپگرها و متون بلکه
                                                                            روزنامه و
                                                                            مجله در ستون و سطرآنچنان
                                                                            که لازم است و برای شرایط
                                                                            فعلی تکنولوژی مورد نیاز
                                                                            و کاربردهای متنوع با
                                                                            هدف
                                                                            بهبود ابزارهای کاربردی
                                                                            می باشد. کتابهای زیادی
                                                                            در شصت و سه درصد گذشته،
                                                                            حال و آینده شناخت فراوان
                                                                            جامعه و
                                                                            متخصصان را می طلبد تا با
                                                                            نرم افزارها شناخت بیشتری
                                                                            را برای طراحان رایانه ای
                                                                            علی الخصوص طراحان
                                                                            خلاقی
                                                                            و
                                                                            فرهنگ پیشرو در زبان
                                                                            فارسی ایجاد کرد. در این
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex flexDirectionColumn gap10 alignSelfEnd">
                                                                <div style="width: 53px;height: 53px;border-radius:0"
                                                                    class="boxShadow overFlowHidden">
                                                                    <div style="height: 20px;border-radius: 0;"
                                                                        class="backgroundColorYellow colorWhite fontSize12 w-100 overFlowHidden d-flex justifyContentCenter">
                                                                        پنج شنبه</div>
                                                                    <div class="d-flex justifyContentCenter fontSize20"
                                                                        style="margin-top: -5px">21
                                                                    </div>
                                                                    <div class="d-flex justifyContentCenter fontSize12"
                                                                        style="margin-top: -12px">
                                                                        اردیبهشت</div>
                                                                </div>
                                                                <div style="width: 53px;height: 53px;border-radius:0"
                                                                    class="boxShadow overFlowHidden">
                                                                    <div style="height: 20px;border-radius: 0;"
                                                                        class="backgroundColorRed colorWhite fontSize12 w-100 overFlowHidden d-flex justifyContentCenter">
                                                                        پنج
                                                                        شنبه</div>
                                                                    <div class="d-flex justifyContentCenter fontSize20"
                                                                        style="margin-top: -5px">21
                                                                    </div>
                                                                    <div class="d-flex justifyContentCenter fontSize12"
                                                                        style="margin-top: -12px">
                                                                        اردیبهشت</div>
                                                                </div>
                                                            </div>
                                                        </div>
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
            <!-- end-container -->
        </div>
    </main>

    <input id="date_input_start_formatted" type="hidden" />
    <input id="date_input_stop_formatted" type="hidden" />
@stop

@section('extraJS')
    @parent
    <script>
        var dateStart = '';
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
            altFormat: "yy/mm/dd",
            altField: $("#date_input_start_formatted")
        };

        var datePickerOptionsEnd = {
            numberOfMonths: 1,
            showButtonPanel: true,
            dateFormat: "DD d M سال yy",
            altFormat: "yy/mm/dd",
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

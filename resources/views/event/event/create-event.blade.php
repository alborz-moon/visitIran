@extends('layouts.structure')
@section('header')
<style>
.tabs {
    display: flex;
    flex-wrap: wrap;
}

.tabs label {
    order: 1;
    padding: 10px 15px;
    cursor: pointer;
    border: 1px solid #dfdfdf;
    font-weight: bold;
    margin-left: 10px;
    transition: background ease 0.2s;
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    min-height: 40px;
    border-radius: 10px;
    -webkit-box-shadow: unset !important;
    box-shadow: unset !important;
}

.tabs .tab {
    order: 99;
    flex-grow: 1;
    width: 100%;
    display: none;
    padding: 1rem;
    background: #fff;
}

.tabs input[type="checkbox"] {
    display: none;
}

.tabs input[type="checkbox"]:checked+label {
    background-color: #00b2bc;
    color: #fff;
}

.tabs input[type="checkbox"]:checked+label+.tab {
    display: block;
}

@media (max-width: 45em) {

    .tabs .tab,
    .tabs label {
        order: initial;
    }

    .tabs label {
        width: 100%;
        margin-right: 0;
        margin-top: 0.2rem;
    }
}
</style>
@parent
<script src="https://cdn.parsimap.ir/third-party/mapbox-gl-js/v1.13.0/mapbox-gl.js"></script>
<link href="https://cdn.parsimap.ir/third-party/mapbox-gl-js/v1.13.0/mapbox-gl.css" rel="stylesheet" />

<script>
var initialing = false;
var GET_CITIES_URL = '{{ route('api.cities') }}';
</script>
@stop
@section('content')
<main class="page-content TopParentBannerMoveOnTop">
    <div class="container">
        <div class="row mb-5">
            @include('event.launcher.launcher-menu')
            <div class="col-xl-9 col-lg-8 col-md-7">
                <div class="d-flex spaceBetween align-items-center">
                    <span class="colorBlack  fontSize15 bold d-none d-md-block">ایجاد رویداد </span>
                    <ul class="checkout-steps mt-4 mb-3 w-100">
                        <li class="checkout-step-active">
                            <a href="{{ route('create-event') }}"><span class="checkout-step-title"
                                    data-title="اطلاعات کلی"></span></a>
                        </li>
                        <li>
                            <a href="{{ isset($id) ? route('addSessionsInfo', ['event' => $id]) : route('addSessionsInfo') }}">
                                <span class="checkout-step-title" data-title="زمان برگزاری"></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ isset($id) ? route('addPhase2Info', ['event' => $id]) : route('addPhase2Info') }}">
                                <span class="checkout-step-title" data-title="ثبت نام و تماس"></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ isset($id) ? route('addGalleryToEvent', ['event' => $id]) : route('addGalleryToEvent') }}">
                                <span class="checkout-step-title" data-title="اطلاعات تکمیلی"></span>
                            </a>
                        </li>
                    </ul>
                    <a href="#" class="px-3 b-0 btnHover backColorWhite colorBlack fontSize18">بازگشت</a>
                </div>
                <div class="ui-box bg-white mb-5 boxShadow">
                    <div class="ui-box-title">اطلاعات کلی</div>
                    <div class="ui-box-content">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <div class="py-2">
                                    <div class="fs-7 text-dark">نام رویداد</div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <input data-editable="true" id="eventName" type="text" class="form-control" style="direction: rtl"
                                            placeholder="نام رویداد">
                                        <button data-input-id="eventName" class="toggle-editable-btn btn btn-circle btn-outline-light"><i
                                                class="ri-ball-pen-fill"></i></button>
                                    </div>
                                    <div class="fs-6 fw-bold text-muted"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="py-2">
                                    <div class="fs-7 text-dark">شرایط سنی</div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <select id="ageCondi" class="select2 w-100">
                                            <option value="all" selected>همه سنین</option>
                                            <option value="child">کودکان تا ۱۰ سال</option>
                                            <option value="teen">نوجوانان ۱۰ تا ۱۸ سال</option>
                                            <option value="adult">بزرگسال</option>
                                            <option value="old">بازنشستگان</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="py-2">
                                    <div class="fs-7 text-dark">سطح برگزاری</div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <select id="level" class="select2 w-100">
                                            <option value="0">انتخاب کنید</option>
                                            <option value="national">ملی</option>
                                            <option value="state">استانی</option>
                                            <option value="local">محلی</option>
                                            <option value="pro">تخصصی</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="py-2">
                                    <div class="fs-7 text-dark">موضوع</div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <select class="select2 w-100" name="" id="topicEvent">
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex flexWrap gap15 mt-2 flexWrap" id="addTopic">

                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="py-2">
                                    <div class="fs-7 text-dark">زبان</div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <select class="select2 w-100" name="" id="lang">
                                            <option value="0" selected>انتخاب کنید</option>
                                            <option value="fa">فارسی</option>
                                            <option value="tr">ترکی</option>
                                            <option value="en">انگلیسی</option>
                                            <option value="fr">فرانسه</option>
                                            <option value="gr">آلمانی</option>
                                            <option value="ar">عربی</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="addLang" class="d-flex gap15 mt-2 flexWrap">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui-box bg-white mb-5 boxShadow">
                    <div class="ui-box-title">امکانات ویژه 
                        <span class="fontSize12 mx-2 fontNormal">
                        از موارد زیر انتخاب کنید
                        </span>
                    </div>
                    <div class="ui-box-content">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <div class="py-2">
                                    <div class="tabs gap10" id="facility">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui-box bg-white mb-5 boxShadow">
                    <div class="ui-box-title">نوع برگزاری</div>
                    <div class="ui-box-content">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <div class="py-2">
                                    <div class="fs-7 text-dark">نوع رویداد</div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <select id="onlineOrOffline" class="selectStyle select2">
                                            <option value="0" selected>انتخاب کنید</option>
                                            <option value="online">آنلاین</option>
                                            <option value="offline">آفلاین</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui-box bg-white mb-5 boxShadow hidden_all_fields">
                    <div class="ui-box-title">اطلاعات رویداد</div>
                    <div class="ui-box-content">
                        <div class="row">
                            <div class="col-lg-6 mb-3 hidden_online_fields">
                                <!-- start of form-element -->
                                <div class="form-element-row">
                                    <label class="label fs-7">استان</label>

                                    <select onchange="initialing ? a = 1 : getCities($(this).val())" class="select2"
                                        name="state02" id="state02">
                                        <option value="0">انتخاب کنید</option>
                                        @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- end of form-element -->
                            </div>
                            <div id="ha" class="col-lg-6 mb-3 hidden_online_fields">
                                <!-- start of form-element -->
                                <div class="form-element-row">
                                    <div class="form-element-row">
                                        <label class="label fs-7">شهر</label>
                                        <select class="select2 launcherCityID" name="city02" id="city02">
                                        </select>
                                    </div>
                                </div>
                                <!-- end of form-element -->
                            </div>
                            <div class="col-lg-6 mb-3 hidden_online_fields">
                                <div class="py-1">
                                    <div class="fs-7 text-dark">کد پستی</div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <input data-editable="true" id="postalCode" onkeypress="return isNumber(event)" minlength="10"
                                            maxlength="10" type="text" class="form-control" style="direction: rtl"
                                            placeholder="کد پستی">
                                        <button data-input-id="postalCode" class="toggle-editable-btn btn btn-circle btn-outline-light">
                                            <i class="ri-ball-pen-fill"></i>
                                        </button>
                                    </div>
                                    <div class="fs-6 fw-bold text-muted"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3 hidden_url_fields hidden">
                                <div class="py-1">
                                    <div class="fs-7 text-dark">لینک جلسه مجازی</div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <input id="link" type="url" class="form-control" style="direction: rtl"
                                            placeholder=" به عنوان مثال: http://www.site.ir حتما http را وارد کنید">
                                        <button class="btn btn-circle btn-outline-light">
                                            <i class="ri-ball-pen-fill"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="py-1 hidden_online_fields hidden">
                                    <div class="fs-7 text-dark">آدرس</div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <textarea data-editable="true" id="address" type="text" class="form-control" style="direction: rtl"
                                            placeholder="آدرس"></textarea>
                                        <button data-input-id="launcherAddress" class="toggle-editable-btn btn btn-circle btn-outline-light">
                                            <i class="ri-ball-pen-fill"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3 hidden_map_fields">
                                <div class="py-1">
                                    <div class="fs-7 text-dark">نقشه</div>
                                    <div id="launchermap" style="width: 100%; height: 250px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="spaceBetween mb-2">
                    <button class="px-5 b-0 btnHover backColorWhite colorBlack fontSize18">انصراف</button>
                    <a id="nextBtn" class="btn btn-sm btn-primary px-5">مرحله بعد</a>
                </div>
                <div class="d-flex justify-content-end">
                    <p class="colorBlue fontSize14">ذخیره و ادامه در زمانی دیگر</p>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- start of personal-info-fullname-modal -->
<div class="remodal remodal-xs" data-remodal-id="personal-info-fullname-modal"
    data-remodal-options="hashTracking: false">
    <div class="remodal-header">
        <div class="remodal-title">نام و نام خانوادگی</div>
        <button data-remodal-action="close" class="remodal-close"></button>
    </div>
    <div class="remodal-content">
        <div class="form-element-row mb-3">
            <label class="label fs-7">نام</label>
            <input value="" type="text" class="form-control" placeholder="نام">
        </div>
        <div class="form-element-row">
            <label class="label fs-7">نام خانوادگی</label>
            <input type="text" class="form-control" placeholder="نام خانوادگی">
        </div>
    </div>
    <div class="remodal-footer">
        <button class="btn btn-sm btn-primary px-3">ثبت اطلاعات</button>
    </div>
</div>
<!-- end of personal-info-fullname-modal -->
<!-- start of personal-info-birth-modal -->
<div class="remodal remodal-xs" data-remodal-id="personal-info-birth-modal" data-remodal-options="hashTracking: false">
    <div class="remodal-header">
        <div class="remodal-title">تولد</div>
        <button data-remodal-action="close" class="remodal-close"></button>
    </div>
    <div class="remodal-content">
        <div class="row">
            <div class="col-4">
                <div class="form-element-row">
                    <label class="label fs-7">سال</label>
                    <input onkeypress="return isNumber(event)" value="" id="Brithday_year" type="text"
                        class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-4">
                <div class="form-element-row">
                    <label class="label fs-7">ماه</label>
                    <select class="select2" name="month" id="Brithday_month">
                        <option value="0">ماه</option>
                        <option value="1">فروردین</option>
                        <option value="2">اردیبهشت</option>
                        <option value="3">خرداد</option>
                        <option value="4">تیر</option>
                        <option value="5">مرداد</option>
                        <option value="6">شهریور</option>
                        <option value="7">مهر</option>
                        <option value="8">آبان</option>
                        <option value="9">آ‌ذر</option>
                        <option value="10">دی</option>
                        <option value="11">بهمن</option>
                        <option value="12">اسفند</option>
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-element-row">
                    <label class="label fs-7">روز</label>
                    <input onkeypress="return isNumber(event)" id="Brithday_day" value="" type="text"
                        class="form-control" placeholder="">
                </div>
            </div>
        </div>
    </div>
    <div class="remodal-footer">
        <button onclick="setValBrithday()" class="btn btn-sm btn-primary px-3">ثبت تاریخ تولد</button>
    </div>
</div>
<!-- end of personal-info-birth-modal -->
<!-- start of personal-info-fullname-modal -->
<div class="remodal remodal-xs" data-remodal-id="personal-add-file-modal" data-remodal-options="hashTracking: false">
    <div class="remodal-header">
        <div class="remodal-title">انتخاب فایل</div>
        <button data-remodal-action="close" class="remodal-close"></button>
    </div>
    <div class="remodal-content">
        <div class="form-element-row mb-3">
            <input onclick="" value="" type="text" class="form-control" disabled placeholder="انتخاب فایل">
        </div>
    </div>
    <div class="remodal-footer">
        <button onclick="window.location.href = '{{ route('addSessionsInfo') }}';"
            class="btn btn-sm btn-primary px-3">ثبت اطلاعات</button>
    </div>
</div>
<!-- end of personal-info-fullname-modal -->
<!-- start of personal-info-fullname-modal -->
<div class="remodal remodal-xs" data-remodal-id="personal-compare-file-modal"
    data-remodal-options="hashTracking: false">
    <div class="remodal-header">
        <div class="remodal-title">انتخاب فایل</div>
        <button data-remodal-action="close" class="remodal-close"></button>
    </div>
    <div class="remodal-content">
        <div class="form-element-row mb-3">
            <input onclick="" value="" type="text" class="form-control" disabled placeholder="انتخاب فایل">
        </div>
    </div>
    <div class="remodal-footer">
        <button class="btn btn-sm btn-primary px-3">ثبت اطلاعات</button>
    </div>
</div>
<!-- end of personal-info-fullname-modal -->
@stop

@section('footer')
@parent
@stop

@section('extraJS')
@parent
<script src="https://cdn.parsimap.ir/third-party/mapbox-gl-js/plugins/parsimap-geocoder/v1.0.0/parsimap-geocoder.js">
</script>
<link href="https://cdn.parsimap.ir/third-party/mapbox-gl-js/plugins/parsimap-geocoder/v1.0.0/parsimap-geocoder.css"
    rel="stylesheet" />
<script src="{{asset('theme-assets/js/Utilities.js')}}"></script>
<script>
var topic_arr = [];
var lang_arr = [{
        key: "fa",
        value: "فارسی"
    },
    {
        key: "tr",
        value: "ترکی"
    },
    {
        key: "en",
        value: "انگلیسی"
    },
    {
        key: "fr",
        value: "فرانسه"
    },
    {
        key: "gr",
        value: "آلمانی"
    },
    {
        key: "ar",
        value: "عربی"
    },
];
var map = undefined;
var x;
var y;
var topicList = [];
var langList = [];
var onlineOrOffline;
var idxTopic = 1;
var idx = 1;
var facilitiesList = undefined;
var tagsList = undefined;
var selectedFacility = [];

$(document).ready(function(){
    $('#launcherPhone').attr("data-editable", "true");
    $('input').attr("data-editable", "true");
    $('textarea').attr("data-editable", "true");
    $('.toggle-editable-btn').addClass('hidden');
});

function watchList(selectorId, arr, increamentor, elemId, resultPaneId) {

    $('#' + selectorId).on('change', function() {
        var wantedElem = $('#' + selectorId).val();

        let tmp = arr.find((elem, index) => {
            return elem.value == wantedElem;
        });

        if (tmp !== undefined)
            return;

        let wantedElemCaption = $('#' + selectorId + ' option:selected').text();

        if (wantedElem != 0) {

            increamentor++;
            arr.push({
                id: increamentor,
                value: wantedElem
            });
            var html = '<div id="' + elemId + '-' + increamentor +
                '" class="item-button spaceBetween colorBlack">' + wantedElemCaption + '';
            html += '<button data-id="' + increamentor + '" class="remove-' + elemId +
                '-btn btn btn-outline-light borderRadius50 marginLeft3 b-0">';
            html += '<i class="ri-close-line"></i>'
            html += '</button></div>';

            $('#' + resultPaneId).append(html);
            setTimeout(() => {
                $('#' + selectorId).val("0").change();
            }, 500);
        }
    });
    $(document).on('click', '.remove-' + elemId + '-btn', function() {
        let id = $(this).attr('data-id');
        arr = arr.filter((elem, index) => {
            return elem.id != id;
        });
        $("#" + elemId + "-" + id).remove();
    });
}

@if(!isset($id))
$(document).ready(function() {
    watchList('topicEvent', topicList, idxTopic, 'topic', 'addTopic');
    watchList('lang', langList, idx, 'lang', 'addLang');
});
@endif

$('#onlineOrOffline').on('change', function() {
    onlineOrOffline = $('#onlineOrOffline').val();
    if (onlineOrOffline === '0') {
        $(".hidden_all_fields").addClass('hidden');
    } else if (onlineOrOffline === 'online') {
        $(".hidden_all_fields").removeClass('hidden');
        $(".hidden_url_fields").removeClass('hidden');
        $(".hidden_online_fields").addClass('hidden');
        $(".hidden_map_fields").addClass('hidden');

    } else if (onlineOrOffline === 'offline') {
        $(".hidden_address_fields").removeClass('hidden');
        $(".hidden_all_fields").removeClass('hidden');
        $(".hidden_online_fields").removeClass('hidden');
        $(".hidden_url_fields").addClass('hidden');
        $(".hidden_map_fields").removeClass('hidden');
    }
});

$.ajax({
    type: 'get',
    url: '{{url('api/eventTags/list ')}}',
    headers: {
        'accept': 'application/json'
    },
    success: function(res) {

        if (res.status === "ok") {

            var eventTag = "";
            tagsList = res.data;

            if (res.data.length != 0) {
                eventTag += '<option value="0">انتخاب کنید</option>';

                for (var i = 0; i < res.data.length; i++)
                    eventTag += '<option name="eventTag" value="' + res.data[i].id + '">' + res.data[i]
                    .label + '</option>';
                $("#topicEvent").empty().append(eventTag);
            }
        }
    }
});

$.ajax({
    type: 'get',
    url: "{{route('facilities.show')}}",
    headers: {
        'accept': 'application/json'
    },
    success: function(res) {

        if (res.status === "ok") {

            facilitiesList = res.data;

            if (res.data.length != 0) {

                var facility = "";
                for (var i = 0; i < res.data.length; i++) {
                    facility += '<input type="checkbox" name="facility" id="' + res.data[i].id + '">';
                    facility += '<label for="' + res.data[i].id + '" class="ml-0">' + res.data[i].label +
                        '</label>';
                }
                $("#facility").empty().append(facility);
            }
        }
    }
});

$("#nextBtn").on('click', function() {
    var eventName = $('#eventName').val();
    var ageCondi = $('#ageCondi').val();
    var level = $('#level').val();
    var state = $('#state02').val();
    var city = $('#city02').val();
    var postalCode = $('#postalCode').val();
    var address = $('#address').val();
    var link = $('#link').val();
    $('input[name=facility]').each(function() {
        if ($(this).is(":checked")) {
            selectedFacility.push($(this).attr('id'));
        }
    });
    var required_list = ['eventName', 'postalCode' , 'link'];
    var required_list_Select = ['level', 'state02', 'onlineOrOffline'];
    var required_Arr = ['topicEvent', 'lang'];
    var Arr = [topicList, langList];

    var inputList = checkInputs(required_list);
    var selectList = checkSelect(required_list_Select);
    var selectAddBox = checkArr(required_Arr, Arr);

    if(!inputList || !selectList || !selectAddBox){
        // return;
    }
    let data = {
        title: eventName,
        facilities_arr: selectedFacility,
        tags_arr: topicList.map((elem, index) => {
            return elem.id;
        }),
        language_arr: langList.map((elem, index) => {
            return elem.value;
        }),
        age_description: ageCondi,
        level_description: level,
        type: onlineOrOffline,
    };
    if (onlineOrOffline == "offline") {
        data.city_id = city;
        data.postal_code = postalCode;
        data.address = address;
        data.x = x;
        data.y = y;
    } else if (onlineOrOffline == "online") {
        data.link = link;
    }
    $.ajax({
        type: 'post',
        url: "{{isset($id) ?  route('event.update', ['event' => $id]) : route('event.store')}}",
        data: data,
        success: function(res) {
            if (res.status === "ok") {
                showSuccess("عملیات موردنظر با موفقیت انجام شد.");
                window.location.href = "{{isset($id) ? route('addSessionsInfo', ['event' => $id]) : route('addSessionsInfo') }}";
            } else {
                alert(res.msg);
            }
        }
    });
});

@if(isset($id))

function checkFetchData() {
    if (tagsList === undefined || facilitiesList === undefined)
        setTimeout(checkFetchData, [500]);
    else
        getPhase1Info();
}

setTimeout(checkFetchData, [500]);


function getPhase1Info() {
    $.ajax({
        type: 'get',
        url: "{{route('event.getPhase1Info',['event' => $id])}}",
        headers: {
            'accept': 'application/json'
        },
        success: function(res) {

            if (res.status === "ok") {
                if (res.data.length != 0) {

                    $('#eventName').val(res.data.title);
                    $('#ageCondi').val(res.data.age_description).change();
                    $('#level').val(res.data.level_description).change();
                    $('#onlineOrOffline').val(res.data.type).change();

                    if (res.data.type === "offline") {
                        initialing = true;
                        x = res.data.x;
                        y = res.data.y;
                        $('#state02').val(res.data.state_id).change();
                        $('#address').val(res.data.address);
                        $('#postalCode').val(res.data.postal_code);
                        createMap();
                        getCities(res.data.state_id, res.data.city_id);
                    } else {

                    }

                    var language = '';
                    if (res.data.language.length != 0) {
                        for (var i = 0; i < res.data.language.length; i++) {
                            let elem = lang_arr.find(itr => itr.key == res.data.language[i]);
                            language += '<div id="lang-' + idx +
                                '" class="item-button spaceBetween colorBlack">' + elem.value + '';
                            language += '<button data-id="' + idx +
                                '" class="remove-lang-btn btn btn-outline-light borderRadius50 marginLeft3 b-0">';
                            language += '<i class="ri-close-line"></i>';
                            language += '</button></div>';

                            langList.push({
                                id: idx,
                                value: elem.key
                            });
                        }

                        idx = res.data.language.length + 1;
                        $("#addLang").append(language);
                    }
                    var tags = '';
                    if (res.data.tags.length != 0) {
                        for (var i = 0; i < res.data.tags.length; i++) {

                            let elem = tagsList.find(itr => itr.label == res.data.tags[i]);

                            if (elem === undefined)
                                continue;

                            tags += '<div id="topic-' + elem.id +
                                '" class="item-button spaceBetween colorBlack">' + res.data.tags[i] + '';
                            tags += '<button data-id="' + elem.id + '" class="remove-topic-btn remove-' +
                                elem.id + '-btn btn btn-outline-light borderRadius50 marginLeft3 b-0">';
                            tags += '<i class="ri-close-line"></i>';
                            tags += '</button></div>';

                            topicList.push({
                                id: elem.id,
                                value: elem.label
                            });
                        }
                        idxTopic = res.data.tags.length + 1;
                        $("#addTopic").append(tags);
                    }

                    watchList('topicEvent', topicList, idxTopic, 'topic', 'addTopic');
                    watchList('lang', langList, idx, 'lang', 'addLang');

                    if (res.data.tags.length != 0) {
                        for (var i = 0; i < res.data.facilities.length; i++) {

                            let elem = facilitiesList.find(itr => itr.label == res.data.facilities[i]);
                            $("input[name='facility'][id='" + elem.id + "']").prop('checked', true);

                        }
                    }

                }
            }
        }
    });
}
@else
createMap();
@endif


function createMap() {
    if (map === undefined) {
        mapboxgl.setRTLTextPlugin(
            'https://cdn.parsimap.ir/third-party/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js',
            null,
        );
        map = new mapboxgl.Map({
            container: 'launchermap',
            style: 'https://api.parsimap.ir/styles/parsimap-streets-v11?key=p1c7661f1a3a684079872cbca20c1fb8477a83a92f',
            center: x !== undefined && y !== undefined ? [y, x] : [51.4, 35.7],
            zoom: 13,
        });
        var marker = undefined;

        if (x !== undefined && y !== undefined) {
            marker = new mapboxgl.Marker();
            marker.setLngLat({
                lng: y,
                lat: x
            }).addTo(map);
        }

        function addMarker(e) {
            if (marker !== undefined)
                marker.remove();
            //add marker
            marker = new mapboxgl.Marker();
            marker.setLngLat(e.lngLat).addTo(map);
            x = e.lngLat.lat;
            y = e.lngLat.lng;
        }
        map.on('click', addMarker);
        const control = new ParsimapGeocoder();
        map.addControl(control);
    }
}
</script>
@stop

@extends('layouts.structure')
@section('header')
<style>
    /**
 * Tabs
 */
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
.tabs input[type="checkbox"]:checked + label {
	background-color: #00b2bc;
    color: #fff;
}
.tabs input[type="checkbox"]:checked + label + .tab {
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
    <link
      href="https://cdn.parsimap.ir/third-party/mapbox-gl-js/v1.13.0/mapbox-gl.css"
      rel="stylesheet"
    />
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
                                <a><span class="checkout-step-title" data-title="اطلاعات کلی"></span></a>
                            </li>
                            <li>
                                <a href="{{ route('create-time') }}"><span class="checkout-step-title" data-title="زمان برگزاری"></span></a>
                            </li>
                            <li>
                                <a href="{{ route('create-contact') }}"><span class="checkout-step-title" data-title="ثبت نام و تماس"></span></a>
                            </li>
                            <li>
                                <a href="{{ route('create-info') }}"><span class="checkout-step-title" data-title="اطلاعات تکمیلی"></span></a>
                            </li>
                        </ul>
                        <a href="#" class="px-3 b-0 btnHover backColorWhite colorBlack fontSize18 d-none">بازگشت</a>
                    </div>
                        <div class="ui-box bg-white mb-5 boxShadow">
                            <div class="ui-box-title">اطلاعات کلی</div>
                            <div class="ui-box-content">
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <div class="py-2">
                                            <div  class="fs-7 text-dark">نام رویداد</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input type="text" class="form-control" style="direction: rtl" placeholder="نام رویداد">
                                                <button class="btn btn-circle btn-outline-light hidden"><i
                                                        class="ri-ball-pen-fill"></i></button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-2">
                                            <div  class="fs-7 text-dark">شرایط سنی</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <select class="selectStyle">
                                                    <option value="">شرایط 1</option>
                                                    <option value="">شرایط 2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-2">
                                            <div  class="fs-7 text-dark">سطح برگزاری</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <select class="selectStyle">
                                                    <option value="">1</option>
                                                    <option value="">1</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-2">
                                            <div  class="fs-7 text-dark">موضوع</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <select class="select2 w-100" name="" id="topicEvent">
                                                    <option value="0" selected>انتخاب کنید</option>
                                                    <option value="1">1موضوع</option>
                                                    <option value="2">2موضوع</option>
                                                    <option value="3">3موضوع</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex flexWrap gap15 mt-2" id="addTopic">
                                
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-2">
                                            <div  class="fs-7 text-dark">زبان</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <select class="select2 w-100" name="" id="lang">
                                                    <option value="0" selected>انتخاب کنید</option>
                                                    <option value="1">ترکی</option>
                                                    <option value="2">فارسی</option>
                                                    <option value="3">انگلیسی</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="addLang" class="d-flex gap15 mt-2">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui-box bg-white mb-5 boxShadow">
                            <div class="ui-box-title">امکانات ویژه <span class="fontSize12 mx-2 fontNormal">از موارد زیر انتخاب کنید</span></div>
                            <div class="ui-box-content">
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <div class="py-2">
                                            <div class="tabs">
                                                <input type="checkbox" name="facility" id="tabone">
                                                <label for="tabone">امکان یک</label>
                                                <input type="checkbox" name="facility" id="tabtwo">
                                                <label for="tabtwo">امکان دو</label>
                                                <input type="checkbox" name="facility" id="tabfour">
                                                <label for="tabfour">امکان سه</label>
                                                <input type="checkbox" name="facility" id="tabfive">
                                                <label for="tabfive">امکان چهار</label>
                                                <input type="checkbox" name="facility" id="tabsix">
                                                <label for="tabsix">امکان پنج</label>
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
                                        <div class="border-bottom py-2">
                                            <div  class="fs-7 text-dark">نوع رویداد</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <select id="onlineOrOffline" class="selectStyle select2">
                                                    <option value="0"selected>انتخاب کنید</option>
                                                    <option value="online">آنلاین</option>
                                                    <option value="offline">آفلاین</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <div class="ui-box bg-white mb-5 boxShadow hidden_all_fields hidden">
                            <div class="ui-box-title">اطلاعات رویداد</div>
                            <div class="ui-box-content">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <!-- start of form-element -->
                                        <div class="form-element-row">
                                            <label class="label fs-7">استان</label>
                                            
                                            <select onchange="getCities($(this).val())" class="select2" name="state02" id="state02">
                                                <option value="0">انتخاب کنید</option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- end of form-element -->
                                    </div>
                                    <div id="ha" class="col-lg-6 mb-3">
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
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">کد ملی</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input  type="text" class="form-control" style="direction: rtl" placeholder="کد ملی">
                                                <button class="btn btn-circle btn-outline-light hidden">
                                                    <i class="ri-ball-pen-fill"></i>
                                                </button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">کد پستی</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input  type="text" class="form-control" style="direction: rtl" placeholder="کد پستی">
                                                <button class="btn btn-circle btn-outline-light hidden">
                                                    <i class="ri-ball-pen-fill"></i>
                                                </button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3 hidden_url_fields hidden">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">آدرس خانه مجازی</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input type="url" class="form-control" style="direction: rtl" placeholder=" آدرس سایت"></input>
                                                <button class="btn btn-circle btn-outline-light hidden">
                                                    <i class="ri-ball-pen-fill"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <div class="border-bottom py-1 hidden_address_fields hidden">
                                            <div  class="fs-7 text-dark">آدرس</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <textarea  type="text" class="form-control" style="direction: rtl" placeholder="آدرس"></textarea>
                                                <button class="btn btn-circle btn-outline-light hidden">
                                                    <i class="ri-ball-pen-fill"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">نقشه</div>
                                            <div id="launchermap" style="width: 100%; height: 250px"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="spaceBetween mb-2">
                            <button class="px-5 b-0 btnHover backColorWhite colorBlack fontSize18">انصراف</button>
                            <a href="{{ route('create-time') }}" class="btn btn-sm btn-primary px-5">مرحله بعد</a>
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
                        <input  value="" type="text" class="form-control" placeholder="نام">
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
            <div class="remodal remodal-xs" data-remodal-id="personal-info-birth-modal"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <div class="remodal-title">تولد</div>
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <div class="remodal-content">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-element-row">
                                <label class="label fs-7">سال</label>
                                <input value="" id="Brithday_year" type="text" class="form-control" placeholder="">
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
                                <input id="Brithday_day" value="" type="text" class="form-control" placeholder="">
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
            <div class="remodal remodal-xs" data-remodal-id="personal-add-file-modal"
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
                    <button onclick="window.location.href = '{{ route('create-time') }}';" class="btn btn-sm btn-primary px-3">ثبت اطلاعات</button>
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
    <script src="https://cdn.parsimap.ir/third-party/mapbox-gl-js/plugins/parsimap-geocoder/v1.0.0/parsimap-geocoder.js"></script>
    <link
      href="https://cdn.parsimap.ir/third-party/mapbox-gl-js/plugins/parsimap-geocoder/v1.0.0/parsimap-geocoder.css"
      rel="stylesheet"
    />
    <script>    

        var map = undefined;
        var x;
        var y;
        var topicList = [];
        var langList = [];

        $(document).ready(function(){

            var topic = '';
            var addTopic = '';
            
            var i = 0;

            $('#topicEvent').on('change',function(){
                topic = $('#topicEvent').val();

                let tmp = topicList.find((elem, index) => {
                    return elem.value == topic;
                });

                if(tmp !== undefined)
                    return;

                let topicCaption = $('#topicEvent option:selected').text();

                if (topic != 0){
                    i++;
                    topicList.push({
                        id: i,
                        value: topic
                    });
                    addTopic += '<div id="topic-' + i + '" class="item-button spaceBetween colorBlack">' + topicCaption + '';
                    addTopic +='<button data-id="' + i + '" class="remove-topic-btn btn btn-outline-light">'; 
                    addTopic += '<i class="ri-close-line"></i>'
                    addTopic += '</button></div>';
                
                    $('#addTopic').empty().append(addTopic);
                }
            })

            $(document).on('click','.remove-topic-btn',function(){
                
                let id = $(this).attr('data-id');
                topicList = topicList.filter((elem, index) => {
                    return elem.id != id;
                });
                $("#topic-" + id).remove();
                
            })

            var lang = '';
            var addLang= '';
            $('#lang').on('change',function(){
                lang = $('#lang').val();

                let tmp = langList.find((elem, index) => {
                    return elem.value == lang;
                });

                if(tmp !== undefined)
                    return;
                
                var langCaption = $('#lang option:selected').text();

                if (lang != 0){
                    
                    i++;
                    langList.push({
                        id: i,
                        value: lang
                    });

                    addLang += '<div id="lang-' + i + '" class="item-button spaceBetween colorBlack">' + langCaption + '';
                    addLang +='<button data-id="' + i + '" class="remove-lang-btn btn btn-outline-light">'; 
                    addLang += '<i class="ri-close-line"></i>'
                    addLang += '</button></div>';

                    $('#addLang').empty().append(addLang);
                }

            })
             $(document).on('click','.remove-lang-btn',function(){
                
                let id = $(this).attr('data-id');
                langList = langList.filter((elem, index) => {
                    return elem.id != id;
                });
                $("#lang-" + id).remove();
                
            })

        })
        function getCities(stateId, selectedCity = undefined) {
            if(stateId == 0) {
                $("#city02").empty();
                return;
            }
            $.ajax({
                type: 'get',
                url: '{{ route('api.cities') }}',
                data: {
                    state_id: stateId
                },
                success: function(res) {    
                    if(res.status !== 'ok') {
                        $("#city02").empty();
                        return;
                    }   
                    let html = '<option value="0">انتخاب کنید</option>';
                    res.data.forEach(elem => {
                        if(selectedCity !== undefined && elem.id === selectedCity)
                            html += '<option selected value="' + elem.id + '">' + elem.name + '</option>';
                        else
                            html += '<option value="' + elem.id + '">' + elem.name + '</option>';
                    });
                    $("#city02").empty().append(html);
                }
            });
        }
        $('#onlineOrOffline').on('change',function(){
            onlineOrOffline = $('#onlineOrOffline').val();
            if (onlineOrOffline=== '0'){
                $(".hidden_all_fields").addClass('hidden');
            }else if(onlineOrOffline=== 'online'){
                $(".hidden_all_fields").removeClass('hidden');
                $(".hidden_url_fields").removeClass('hidden');
                $(".hidden_address_fields").addClass('hidden');
            }else if(onlineOrOffline=== 'offline'){
                $(".hidden_address_fields").removeClass('hidden');
                $(".hidden_all_fields").removeClass('hidden');
                $(".hidden_url_fields").addClass('hidden');
            }
            if(map === undefined) {
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
                
                if(x !== undefined && y !== undefined) {
                    marker = new mapboxgl.Marker();
                    marker.setLngLat({lng: y, lat: x}).addTo(map);
                }
                function addMarker(e){
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
        })
    </script>
@stop

@extends('layouts.structure')
@section('header')
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
                                        <div class="border-bottom py-2">
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
                                                <select class="select2 w-100" name="" id="">
                                                    <option value="0"selected>انتخاب کنید</option>
                                                    <option value="1">فارسی</option>
                                                    <option value="2">ترکی</option>
                                                    <option value="3">انگلیسی</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex gap15 mt-2">
                                            <div id="removeItem1" class="item-button spaceBetween colorBlack">
                                                آموووووزش1
                                                <button onclick="removeItem1()" class="btn btn-outline-light">
                                                    <i class="ri-close-line"></i>
                                                </button>
                                            </div>
                                            <div id="removeItem1" class="item-button spaceBetween colorBlack">
                                                آموووووزش1
                                                <button onclick="removeItem1()" class="btn btn-outline-light">
                                                    <i class="ri-close-line"></i>
                                                </button>
                                            </div>
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
                                        <div class="border-bottom py-2">
                                            <div class="d-flex gap15">
                                                <div id="removeItem1" class="item-button spaceBetween colorBlack">
                                                    آموووووزش1
                                                    <button onclick="removeItem1()" class="btn btn-outline-light">
                                                        <i class="ri-close-line"></i>
                                                    </button>
                                                </div>
                                                <div id="removeItem2" class="item-button spaceBetween colorBlack">
                                                        آموووووزش2
                                                        <button onclick="removeItem2()" class="btn btn-outline-light">
                                                            <i class="ri-close-line"></i>
                                                        </button>
                                                </div>
                                                <div id="removeItem3" class="item-button spaceBetween colorBlack">
                                                    آموووووزش3
                                                    <button onclick="removeItem3()" class="btn btn-outline-light">
                                                        <i class="ri-close-line"></i>
                                                    </button>
                                                </div>
                                                <div id="removeItem4" class="item-button spaceBetween colorBlack">
                                                    آموووووزش4
                                                    <button onclick="removeItem4()" class="btn btn-outline-light">
                                                        <i class="ri-close-line"></i>
                                                    </button>
                                                </div>
                                                <div id="removeItem5" class="item-button spaceBetween colorBlack">
                                                    آموووووزش5
                                                    <button onclick="removeItem5()" class="btn btn-outline-light">
                                                        <i class="ri-close-line"></i>
                                                    </button>
                                                </div>
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
                                                <select id="onlineOrOffline" class="selectStyle">
                                                    <option value="online">آنلاین</option>
                                                    <option value="offline">آفلاین</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <div class="ui-box bg-white mb-5 boxShadow">
                            <div class="ui-box-title">اطلاعات رویداد حضوری</div>
                            <div class="ui-box-content">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-2">
                                            <div  class="fs-7 text-dark">استان</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <select class="selectStyle">
                                                    <option value="card">انتخاب</option>
                                                    <option value="table">شیراز</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-2">
                                            <div  class="fs-7 text-dark">شهر</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <select class="selectStyle">
                                                    <option value="card">تهران</option>
                                                    <option value="table">کرج</option>
                                                </select>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">شناسه ملی</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input  type="text" class="form-control" style="direction: rtl" placeholder="شناسه ملی">
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
                                    <div class="col-lg-12 mb-3">
                                        <div class="border-bottom py-1">
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
                            <button class="btn btn-sm btn-primary px-5">مرحله بعد</button>
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
        
        $(document).ready(function(){
            var topic ="";
            var addTopic = '';
            var arryTopic = [];
            var i = 0;
            $('#topicEvent').on('change',function(){
                topic = $('#topicEvent').val();

                if (topic != 0){
                    i++;
                    arryTopic.push(
                        {
                            id: i,
                            value: topic
                        }
                    )
                    addTopic += '<div id="removeItem ' + topic + '" class="item-button spaceBetween colorBlack">' + topic + '';
                    addTopic +='<button onclick="removeItem()" class="btn btn-outline-light">'; 
                    addTopic += '<i class="ri-close-line"></i>'
                    addTopic += '</button></div>';
                
                    $('#addTopic').empty().append(addTopic);
                }
            })
            function removeItam(){

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
        $('#onlineOrOffline').on('change',function(){
            onlineOrOffline = $('#onlineOrOffline').val();
            if (onlineOrOffline=== 'online'){
                // show or hide class for online
            }else if(onlineOrOffline=== 'offline'){
                // show or hide class for offline
            }else{
                // hide All
            }
        })
    </script>
@stop
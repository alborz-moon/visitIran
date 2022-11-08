
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
        <main class="page-content">
        <div class="container">
            <div class="row mb-5">
                @include('event.launcher.launcher-menu')     
                    <div class="col-xl-9 col-lg-8 col-md-7">
                        <div class="alert alert-warning alert-dismissible fade show mb-5 d-flex align-items-center spaceBetween" role="alert">
                            <div>
                                در حال حاضر حساب کاربری شما غیر فعال است. پس از بررسی مدارک و تایید از سوی ادمین حساب شما فعال خواهد شد.
                            </div> 
                            <a href="#" class="btn btn-sm btn-primary mx-3">تیکت ها</a>                        
                        </div>
                        <div class="ui-box bg-white mb-5 boxShadow">
                            <div class="ui-box-title">اطلاعات شخصی</div>
                            <div class="ui-box-content">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">نام و نام خانوادگی</div>
                                            <div data-remodal-target="personal-info-fullname-modal" class="d-flex align-items-center justify-content-between">
                                                <input type="text" class="form-control setName" style="direction: rtl" placeholder="نام و نام خانوادگی">
                                                <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="personal-info-fullname-modal"><i
                                                        class="ri-ball-pen-fill"></i></button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">شماره تلفن همراه</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input type="tel" maxlength="11" class="form-control" style="direction: rtl" placeholder="شماره تلفن همراه">
                                                <button class="btn btn-circle btn-outline-light hidden">
                                                    <i class="ri-ball-pen-fill"></i>
                                                </button>
                                            </div>
                                            <div id="phoneVal" class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">پست الکترونیک</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input  id="userEmail" type="email" class="form-control" style="direction: rtl" placeholder="پست الکترونیک">
                                                <button class="btn btn-circle btn-outline-light hidden" >
                                                    <i class="ri-ball-pen-fill"></i>
                                                </button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">تاریخ تولد</div>
                                            <div data-remodal-target="personal-info-birth-modal" class="d-flex align-items-center justify-content-between">
                                                <input type="text" class="form-control userBirthDay" style="direction: rtl" placeholder="تاریخ تولد">
                                                <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="personal-info-birth-modal"><i
                                                        class="ri-ball-pen-fill"></i></button>
                                            </div>
                                            <div id="brithdayVal" class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">کد ملی</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input id="nid" type="text" class="form-control" style="direction: rtl" placeholder="کد ملی">
                                                <button class="btn btn-circle btn-outline-light hidden">
                                                    <i class="ri-ball-pen-fill"></i>
                                                </button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui-box bg-white mb-5 boxShadow">
                            <div class="ui-box-title">نوع برگزار کننده</div>
                            <div class="ui-box-content">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-2">
                                            <div  class="fs-7 text-dark">نوع شخصیت</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <select id="launcherType" class="selectStyle">
                                                    <option value="haghighi">حقیقی</option>
                                                    <option value="hoghoghi">حقوقی</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui-box bg-white mb-5 boxShadow">
                            <div class="ui-box-title">اطلاعات برگزار کننده</div>
                            <div class="ui-box-content">
                                <div class="row">
                                    <div class="col-lg-6 mb-3 hoghoghi_fields">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">نام حقوقی</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input id="companyName" type="text" class="form-control" style="direction: rtl" placeholder="نام حقوقی">
                                                <button class="btn btn-circle btn-outline-light hidden">
                                                    <i class="ri-ball-pen-fill"></i>
                                                </button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3 haghighi_fields">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">نام برگزار کننده</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input id="companyName" type="text" class="form-control" style="direction: rtl" placeholder="نام برگزار کننده">
                                                <button class="btn btn-circle btn-outline-light hidden">
                                                    <i class="ri-ball-pen-fill"></i>
                                                </button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3 hoghoghi_fields">
                                        <div class="border-bottom py-2">
                                            <div  class="fs-7 text-dark">نوع شرکت</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <select id="companyType" class="selectStyle">
                                                    <option value="card">نوع شرکت</option>
                                                    <option value="table">نوع شرکت 2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3 hoghoghi_fields">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">شماره اقتصادی</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input id="code" type="text" class="form-control" style="direction: rtl" placeholder="شماره اقتصادی">
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
                                                <input id="postalCode" type="text" class="form-control" style="direction: rtl" placeholder="کد پستی">
                                                <button class="btn btn-circle btn-outline-light hidden">
                                                    <i class="ri-ball-pen-fill"></i>
                                                </button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                    </div>
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
                                    <div class="col-lg-12 mb-3">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">آدرس</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <textarea id="launcherAddress" type="text" class="form-control" style="direction: rtl" placeholder="آدرس"></textarea>
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
                        <div class="ui-box bg-white mb-5 boxShadow">
                            <div class="ui-box-title">اطلاعات تماس</div>
                            <div class="ui-box-content">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">وب سایت</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input id="launcherSite" type="text" class="form-control" style="direction: rtl" placeholder="وب سایت">
                                                <button class="btn btn-circle btn-outline-light hidden">
                                                    <i class="ri-ball-pen-fill"></i>
                                                </button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-1">
                                            <div class="fs-7 text-dark">ایمیل</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input id="launcherEmail" type="text" class="form-control" style="direction: rtl" placeholder="ایمیل">
                                                <button class="btn btn-circle btn-outline-light hidden">
                                                    <i class="ri-ball-pen-fill"></i>
                                                </button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">تلفن</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input id="LauncherPhone" type="text" class="form-control" style="direction: rtl" placeholder="تلفن">
                                                <button class="btn btn-circle btn-outline-light hidden">
                                                    <i class="ri-ball-pen-fill"></i>
                                                </button>
                                            </div>
                                            <div class="fontSize14 colorBlack">در صورت وجود بیش از یک تلفن، آن ها را با فاصله از هم جدا نمایید.همچنین پیش شماره کشور و شهر نیز وارد شود. مانند +982111111111</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="spaceBetween mb-2">
                            <button class="px-5 b-0 btnHover backColorWhite colorBlack fontSize18">بازگشت</button>
                            <button id="sumbmit" onclick="{{ route('document') }}" class="btn btn-sm btn-primary px-5">مرحله بعد</button>
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
                        <input id="name" value="" type="text" class="form-control" placeholder="نام">
                    </div>
                    <div class="form-element-row">
                        <label class="label fs-7">نام خانوادگی</label>
                        <input id="last" type="text" class="form-control" placeholder="نام خانوادگی">
                    </div>
                </div>
                <div class="remodal-footer">
                    <button id="getName" class="btn btn-sm btn-primary px-3">ثبت اطلاعات</button>
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
                    <button id="setUserBirthDay" class="btn btn-sm btn-primary px-3">ثبت تاریخ تولد</button>
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
                    <button class="btn btn-sm btn-primary px-3">ثبت اطلاعات</button>
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
        
<script src="https://cdn.parsimap.ir/third-party/mapbox-gl-js/plugins/parsimap-geocoder/v1.0.0/parsimap-geocoder.js"></script>
<link
  href="https://cdn.parsimap.ir/third-party/mapbox-gl-js/plugins/parsimap-geocoder/v1.0.0/parsimap-geocoder.css"
  rel="stylesheet"
/>
    <script>
        let x;
        let y;
            function getCities(stateId, selectedCity=undefined) {
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
        $(document).ready(function(){
            $('#getName').on('click',function(){
                var name = $('#name').val();
                var last = $('#last').val();
                $('.setName').val(name +' ' + last );
                $(".remodal-close").click();
            })
            $('#setUserBirthDay').on('click',function(){
                var year = $('#Brithday_year').val();
                var month = $('#Brithday_month').val();
                var day =$('#Brithday_day').val();
                $('.userBirthDay').val(year + '/' + month + '/' + day);
                $(".remodal-close").click();
            })
            $('#launcherType').on('change',function(){
                var LauncherType = $('#launcherType').val();
                if (LauncherType === 'haghighi'){
                    // show or hide class for haghighi
                    $(".hoghoghi_fields").addClass('hidden');
                    $(".haghighi_fields").removeClass('hidden');
                }else if(LauncherType === 'hoghoghi'){
                    // show or hide class for hoghoghi
                    $(".hoghoghi_fields").removeClass('hidden');
                    $(".haghighi_fields").addClass('hidden');
                }else{
                    // hide All
                }
            })
            $('#sumbmit').on('click',function(){
                var setName = $('.setName').val();
                var userEmail = $('#userEmail').val();
                var userBirthDay = $('.userBirthDay').val();
                var nid = $('#nid').val();
                var companyName = $('#companyName').val();
                var launcherType = $('#launcherType').val();
                var companyType = $('#companyType').val();
                var code = $('#code').val();
                var postalCode = $('#postalCode').val();
                var launcherCityID = $('.launcherCityID').val();
                var launcherSite = $('#launcherSite').val();
                var launcherEmail = $('#launcherEmail').val();
                var LauncherPhone = $('#LauncherPhone').val();
                var launcherAddress = $('#launcherAddress').val();
                // var setName = "Alborz";
                // var userEmail = "Moon@yahoo.com";
                // var userBirthDay = "1374/11/03";
                // var nid = "0018374921";
                // var companyName = "mooon";
                // var launcherType = "hoghoghi";
                // var companyType = "شرکت2";
                // var code = "1000000000";
                // var postalCode = "1234567890";
                // var launcherCityID = 1;
                // var launcherSite = "www.google.com";
                // var launcherEmail = "alborz@gmail.com";
                // var LauncherPhone = "09224786125";
                // var launcherAddress = "شسیتمشس یمنشس بسشی شسیهخب شسیب  سیشتنمبتنشسیابتناتناطزرات شتسیاب تنسارتنزط نتشسبنتسشی";
                if(x === undefined || y === undefined) {
                    showErr("لطفا مکان موردنظر خود را از روی نقضه انتخاب کنید");
                    return;
                }
                $.ajax({
                    type: 'post',
                    url: '{{ route('launcher.store') }}',
                    data: {
                        launcher_x: x,
                        launcher_y: y,
                        user_email: userEmail,
                        user_birth_day: userBirthDay,
                        user_NID: nid,
                        company_name: companyName,
                        code: code,
                        postal_code: postalCode,
                        launcher_city_id: launcherCityID,
                        launcher_site: launcherSite,
                        launcher_email: launcherEmail,
                        launcher_phone: LauncherPhone,
                        launcher_type: launcherType,
                        launcher_address: launcherAddress,
                        company_type:companyType,
                    },
                    success: function(res) {
                        if(res.status === "ok") {
                            window.location.href = '{{ route('document') }}';
                        }
                        else
                            showErr(res.msg);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        
                        var errs = XMLHttpRequest.responseJSON.errors;

                        if(errs instanceof Object) {
                            var errsText = '';

                            Object.keys(errs).forEach(function(key) {
                                errsText += key + " : " + errs[key];
                            });
                            showErr(errsText);    
                        }
                        else {
                            var errsText = '';

                            for(let i = 0; i < errs.length; i++)
                                errsText += errs[i].value;
                            
                            showErr(errsText);
                        }
                    }
                });
            })
        })
        
        mapboxgl.setRTLTextPlugin(
            'https://cdn.parsimap.ir/third-party/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js',
            null,
        );
        const map = new mapboxgl.Map({
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
    </script>
@stop

@section('footer')
    @parent
@stop

@section('extraJS')
    @parent
    
    @if($mode == 'edit')
        <script>
            // {{$formId}}
        </script>
    @endif

@stop

@extends('layouts.structure')
@section('header')

    @parent

    <link rel="stylesheet" href="{{URL::asset('theme-assets/bootstrap-datepicker.css?v=1')}}">
    <script src="{{URL::asset("theme-assets//bootstrap-datepicker.js")}}"></script>
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
                                <a href="{{ route('create-event') }}"><span class="checkout-step-title" data-title="اطلاعات کلی"></span></a>
                            </li>
                            <li class="checkout-step-active">
                                <a href="{{ route('create-time') }}"><span class="checkout-step-title" data-title="زمان برگزاری"></span></a>
                            </li>
                            <li class="checkout-step-active">
                                <a><span class="checkout-step-title" data-title="ثبت نام و تماس"></span></a>
                            </li>
                            <li>
                                <a href="{{ route('create-info') }}"><span class="checkout-step-title" data-title="اطلاعات تکمیلی"></span></a>
                            </li>
                        </ul>
                        <a href="{{ route('create-time') }}" class="px-3 b-0 btnHover backColorWhite colorBlack fontSize18">بازگشت</a>
                    </div>
                        <div class="ui-box bg-white mb-5 boxShadow">
                            <div class="ui-box-title">تاریخ ثبت نام</div>
                            <div class="ui-box-content">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div data-remodal-target="time-and-date-start-modal" class="fs-7 text-dark">تاریخ و ساعت شروع</div>
                                        <div class="border-bottom py-2">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input id="setDateStart" data-remodal-target="time-and-date-start-modal" type="text" class="form-control" style="direction: rtl" placeholder="تاریخ و ساعت شروع">
                                                <button data-remodal-target="time-and-date-start-modal" class="btn btn-circle btn-outline-light d-none">
                                                    <i class="ri-ball-pen-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-2">
                                            <div data-remodal-target="time-and-date-stop-modal" class="fs-7 text-dark">تاریخ و ساعت پایان</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input id="setDateStop" data-remodal-target="time-and-date-stop-modal" type="text" class="form-control" style="direction: rtl" placeholder="تاریخ و ساعت پایان">
                                                <button data-remodal-target="time-and-date-stop-modal" class="btn btn-circle btn-outline-light d-none"><i
                                                        class="ri-ball-pen-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui-box bg-white mb-5 boxShadow">
                            <div class="ui-box-title">هزینه</div>
                            <div class="ui-box-content">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">توضیحات</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input type="text" class="form-control" style="direction: rtl" placeholder="توضیحات">
                                                <button class="btn btn-circle btn-outline-light hidden">
                                                    <i class="ri-ball-pen-fill"></i>
                                                </button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">قیمت به تومان</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input onkeypress="return isNumber(event)" type="text" class="form-control" style="direction: rtl" placeholder="قیمت به تومان">
                                                <button class="btn btn-circle btn-outline-light hidden">
                                                    <i class="ri-ball-pen-fill"></i>
                                                </button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">ظرفیت</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input onkeypress="return isNumber(event)" type="text" class="form-control" style="direction: rtl" placeholder="ظرفیت">
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
                            <div class="ui-box-title">اطلاعات تماس</div>
                            <div class="ui-box-content">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">وب سایت</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input type="url" class="form-control" style="direction: rtl" placeholder="وب سایت">
                                                <button class="btn btn-circle btn-outline-light hidden">
                                                    <i class="ri-ball-pen-fill"></i>
                                                </button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">ایمیل</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input type="email" class="form-control" style="direction: rtl" placeholder="ایمیل">
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
                                                <input onkeypress="return isNumber(event)" minlength="7" maxlength="11" id="launcherPhone" type="text" class="form-control setEnter" style="direction: rtl" placeholder="تلفن">
                                                <button class="btn btn-circle btn-outline-light hidden">
                                                    <i class="ri-ball-pen-fill"></i>
                                                </button>
                                            </div>
                                            <div id="addTell" class="d-flex gap15"></div>
                                            <div class="fontSize14 colorBlack">در صورت وجود بیش از یک تلفن، آن ها را با فاصله از هم جدا نمایید.همچنین پیش شماره کشور و شهر نیز وارد شود. مانند +982111111111</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="spaceBetween mb-2">
                            <button class="px-5 b-0 btnHover backColorWhite colorBlack fontSize18">انصراف</button>
                            <button onclick="window.location.href = '{{ route('create-info') }}';" class="btn btn-sm btn-primary px-5">مرحله بعد</button>
                        </div> 
                        <div class="d-flex justify-content-end">
                            <p class="colorBlue fontSize14">ذخیره و ادامه در زمانی دیگر</p>
                        </div>
                    </div>
            </div>
        </div>
    </main>
        <!-- start of personal-info-fullname-modal -->
            <div class="remodal remodal-xs" data-remodal-id="time-and-date-start-modal"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <div class="remodal-title">تاریخ و ساعت شروع</div>
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <div class="remodal-content">
                    <div>
                        <div id="date_btn_start_edit" class="label fs-7 font600">تاریخ شروع</div>
                        <label class="tripCalenderSection w-100">
                            <span class="calendarIcon"></span>
                            <input id="date_input_start" class="tripDateInput w-100 form-control directionLtr backColorWhite" placeholder="13xx/xx/xx" required readonly type="text">
                        </label>
                    </div>
                    <div class="form-element-row">
                        <label class="label fs-7">زمان شروع</label>
                        <input id="time_input_start" type="time" data-clear-btn="true" class="form-control" placeholder="؟؟:؟؟">
                    </div>
                </div>
                <div class="remodal-footer">
                    <button id="startSessionBtn" class="btn btn-sm btn-primary px-3">ثبت اطلاعات</button>
                </div>
            </div>
        <!-- end of personal-info-fullname-modal -->
        <!-- start of personal-info-fullname-modal -->
            <div class="remodal remodal-xs" data-remodal-id="time-and-date-stop-modal"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <div class="label fs-7">تاریخ و ساعت پایان</div>
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <div class="remodal-content">
                    <div class="form-element-row mb-3">
                        <label class="label fs-7 font600">تاریخ پایان</label>
                        <label class="tripCalenderSection w-100">
                            <span class="calendarIcon"></span>
                            <input id="date_input_stop" class="tripDateInput w-100 form-control directionLtr backColorWhite" placeholder="13xx/xx/xx" required readonly type="text">
                        </label>
                    </div>
                    <div class="form-element-row">
                        <label class="label fs-7">زمان پایان</label>
                        <input id="time_input_stop" type="time" class="form-control" placeholder="؟؟:؟؟">
                    </div>
                </div>
                <div class="remodal-footer">
                    <button id="stopSessionBtn" class="btn btn-sm btn-primary px-3">ثبت اطلاعات</button>
                </div>
            </div>
        <!-- end of personal-info-fullname-modal -->

@stop

@section('footer')
    @parent
@stop

@section('extraJS')
    @parent
    <script> 
        $(document).ready(function(){
            var tels = [];
            var i = 1;
            $(document).on('click', '.remove-tel-btn', function () { 
                let id = $(this).attr('data-id');
                tels = tels.filter((elem, index) => {
                    return elem.id != id;
                });
                $("#tel-modal-" + id).remove();
             });

            $(".setEnter").keyup(function (e) {
                var html= '';
                if ($(".setEnter").is(":focus") && (e.keyCode == 13)) {
                    var launchPhone = $(".setEnter").val();
                    if(launchPhone.length < 7 || launchPhone.length > 11) {
                        showErr('شماره موردنظر معتبر نمی باشد.');
                        return;
                    }
                    i++;
                    tels.push({
                        id: i,
                        val: launchPhone
                    });
                    html += '<div id="tel-modal-' + i + '" class="item-button spaceBetween colorBlack">' + launchPhone + '';
                    html += '<button class="btn btn-outline-light">';
                    html += '<i data-id="' + i + '" class="remove-tel-btn ri-close-line"></i>';
                    html += '</button>';
                    html += '</div>';
                    $("#addTell").append(html);
                    $('.setEnter').val('');
                }
            });

            
            $(document).on('click', "#startSessionBtn", function () {
                var timeStart =$('#time_input_start').val();
                var dateStart = $('#date_input_start').val();
                alert(timeStart + ' ' + dateStart);
                    $('#setDateStart').val(timeStart + ' ' + dateStart);                
                    $(".remodal-close").click();
            });
            $(document).on('click', "#stopSessionBtn", function () {
                var timeStop = $('#time_input_stop').val();
                var dateStop = $('#date_input_stop').val();
                alert(timeStop + ' ' + dateStop);
                    $('#setDateStop').val(timeStop + ' ' + dateStop);
                    $$(".remodal-close").click();               
            });
        });
        var datePickerOptions = {
            numberOfMonths: 1,
            showButtonPanel: true,
            dateFormat: "yy/mm/dd"
        };
        $("#date_input_start").datepicker(datePickerOptions);
        $("#date_input_stop").datepicker(datePickerOptions);
    </script>
@stop
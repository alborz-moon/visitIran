
@extends('layouts.structure')
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
                                <a href="#"><span class="checkout-step-title" data-title="اطلاعات کلی"></span></a>
                            </li>
                            <li class="checkout-step-active">
                                <a href="#"><span class="checkout-step-title" data-title="زمان برگزاری"></span></a>
                            </li>
                            <li>
                                <a href="#"><span class="checkout-step-title" data-title="ثبت نام و تماس"></span></a>
                            </li>
                            <li>
                                <a href="#"><span class="checkout-step-title" data-title="اطلاعات تکمیلی"></span></a>
                            </li>
                        </ul>
                        <a href="{{ route('create-event') }}" class="px-3 b-0 btnHover backColorWhite colorBlack fontSize18">بازگشت</a>
                    </div>
                        <div class="ui-box bg-white mb-5 boxShadow">
                            <div class="ui-box-title">جلسات برگزاری</div>
                            <div class="ui-box-content">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div data-remodal-target="time-and-date-start-modal" class="fs-7 text-dark">تاریخ و ساعت شروع</div>
                                        <div class="border-bottom py-2">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input data-remodal-target="time-and-date-start-modal" type="text" class="form-control" style="direction: rtl" placeholder="تاریخ و ساعت شروع">
                                                <button data-remodal-target="time-and-date-start-modal" class="btn btn-circle btn-outline-light"><i
                                                        class="ri-ball-pen-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-2">
                                            <div data-remodal-target="time-and-date-stop-modal" class="fs-7 text-dark">تاریخ و ساعت پایان</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input data-remodal-target="time-and-date-stop-modal" type="text" class="form-control" style="direction: rtl" placeholder="تاریخ و ساعت پایان">
                                                <button data-remodal-target="time-and-date-stop-modal" class="btn btn-circle btn-outline-light"><i
                                                        class="ri-ball-pen-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-sm btn-primary px-3">افزودن</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui-box bg-white mb-5">
                            <div class="ui-box-title align-items-center justify-content-between">
                                شماره حساب های موجود
                            </div>
                            <div class="ui-box-content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>شماره</th>
                                                <th>شماره عملیات </th>
                                                <th> تاریخ شروع  </th>
                                                <th> تاریخ پایان  </th>
                                                <th>وضعیت</th>
                                                <th>آخرین بروزرسانی</th>
                                                <th>عملیات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="fa-num">1</td>
                                                <td class="fa-num">1400 دی 25</td>
                                                <td class="fa-num">پشتیبانی</td>
                                                <td class="fa-num">کالای غیراصل</td>
                                                <td class="fa-num"><span class="badge bg-success rounded-pill">پاسخ داده
                                                        شد</span></td>
                                                <td class="fa-num">1400 دی 26</td>
                                                <td>
                                                    <a href="#" class="btn btn-circle btn-info my-1"><i
                                                            class="ri-eye-line"></i></a>
                                                    <a href="#" class="btn btn-circle btn-danger my-1"><i
                                                            class="ri-close-line"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fa-num">1</td>
                                                <td class="fa-num">1400 دی 25</td>
                                                <td class="fa-num">پشتیبانی</td>
                                                <td class="fa-num">کالای غیراصل</td>
                                                <td class="fa-num"><span
                                                        class="badge bg-danger rounded-pill">بسته</span></td>
                                                <td class="fa-num">1400 دی 26</td>
                                                <td>
                                                    <a href="#" class="btn btn-circle btn-info my-1"><i
                                                            class="ri-eye-line"></i></a>
                                                    <a href="#" class="btn btn-circle btn-danger my-1"><i
                                                            class="ri-close-line"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fa-num">1</td>
                                                <td class="fa-num">1400 دی 25</td>
                                                <td class="fa-num">پشتیبانی</td>
                                                <td class="fa-num">کالای غیراصل</td>
                                                <td class="fa-num"><span class="badge bg-warning rounded-pill">در حال
                                                        بررسی</span></td>
                                                <td class="fa-num">1400 دی 26</td>
                                                <td>
                                                    <a href="#" class="btn btn-circle btn-info my-1"><i
                                                            class="ri-eye-line"></i></a>
                                                    <a href="#" class="btn btn-circle btn-danger my-1"><i
                                                            class="ri-close-line"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="spaceBetween mb-2">
                            <button class="px-5 b-0 btnHover backColorWhite colorBlack fontSize18">انصراف</button>
                            <button onclick="window.location.href = '{{ route('create-contact') }}';" class="btn btn-sm btn-primary px-5">مرحله بعد</button>
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
                    <div class="form-element-row mb-3">
                        <label class="label fs-7">تاریخ</label>
                        <input  value="" type="date" class="form-control" placeholder="؟؟/؟؟/؟؟؟؟">
                    </div>
                    <div class="form-element-row">
                        <label class="label fs-7">زمان شروع</label>
                        <input type="time" class="form-control" placeholder="؟؟:؟؟">
                    </div>
                </div>
                <div class="remodal-footer">
                    <button class="btn btn-sm btn-primary px-3">ثبت اطلاعات</button>
                </div>
            </div>
        <!-- end of personal-info-fullname-modal -->
        <!-- start of personal-info-fullname-modal -->
            <div class="remodal remodal-xs" data-remodal-id="time-and-date-stop-modal"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <div class="remodal-title">تاریخ و ساعت پایان</div>
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <div class="remodal-content">
                    <div class="form-element-row mb-3">
                        <label class="label fs-7">تاریخ پایان</label>
                        <input  value="" type="date" class="form-control" placeholder="؟؟/؟؟/؟؟؟؟">
                    </div>
                    <div class="form-element-row">
                        <label class="label fs-7">زمان پایان</label>
                        <input type="time" class="form-control" placeholder="؟؟:؟؟">
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
    <script>
        function removeItem1(){
            $('#removeItem1').remove();
        }
        function removeItem2(){
            $('#removeItem2').remove();
        }
        function removeItem3(){
            $('#removeItem3').remove();
        }
        function removeItem4(){
            $('#removeItem4').remove();
        }
        function removeItem5(){
            $('#removeItem5').remove();
        }
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
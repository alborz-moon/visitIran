
@extends('layouts.structure')
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
                                        <div class="border-bottom py-2">
                                            <div  class="fs-7 text-dark">نام و نام خانوادگی</div>
                                            <div data-remodal-target="personal-info-fullname-modal" class="d-flex align-items-center justify-content-between">
                                                <div class="fs-7 fw-bold text-dark">نام و نام خانوادگی</div>
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
                                                <input id="phone_info" type="tel" maxlength="11" class="form-control" style="direction: rtl" placeholder="شماره تلفن همراه">
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
                                                <input id="email_info" type="email" class="form-control" style="direction: rtl" placeholder="پست الکترونیک">
                                                <button class="btn btn-circle btn-outline-light hidden" >
                                                    <i class="ri-ball-pen-fill"></i>
                                                </button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-2">
                                            <div  class="fs-7 text-dark">تاریخ تولد</div>
                                            <div data-remodal-target="personal-info-birth-modal" class="d-flex align-items-center justify-content-between">
                                                <div class="fs-7 fw-bold text-dark">تاریخ تولد</div>
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
                                                <input  type="text" class="form-control" style="direction: rtl" placeholder="کد ملی">
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
                                                <select class="selectStyle">
                                                    <option value="real">حقیقی</option>
                                                    <option value="unreal">حقوقی</option>
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
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">نام حقوقی</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input  type="text" class="form-control" style="direction: rtl" placeholder="نام حقوقی">
                                                <button class="btn btn-circle btn-outline-light hidden">
                                                    <i class="ri-ball-pen-fill"></i>
                                                </button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-2">
                                            <div  class="fs-7 text-dark">نوع شرکت</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <select class="selectStyle">
                                                    <option value="card">نوع شرکت</option>
                                                    <option value="table">نوع شرکت 2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">شماره اقتصادی</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input  type="text" class="form-control" style="direction: rtl" placeholder="شماره اقتصادی">
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
                                            <div class="w-100 d-flex justify-content-center align-items-center colorWhite" style="height: 250px;background-color:#00b2bc">نقشه</div>
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
                                                <input  type="text" class="form-control" style="direction: rtl" placeholder="وب سایت">
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
                                                <input  type="text" class="form-control" style="direction: rtl" placeholder="ایمیل">
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
                                                <input  type="text" class="form-control" style="direction: rtl" placeholder="تلفن">
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
                        <div class="ui-box bg-white mb-5 boxShadow">
                            <div class="ui-box-title">مدارک <span class="fontNormal fontSize12 mx-2">حداکثر 6 مگابایت و در فرمت های jpg, zip , pdf</span></div>
                            <div class="ui-box-content">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">روزنامه تاسیس</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input  type="file" class="form-control" style="direction: rtl" placeholder="روزنامه تاسیس">
                                                <button class="btn btn-circle btn-outline-light">
                                                    <i class="ri-ball-pen-fill"></i>
                                                </button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">آخرین تغییرات</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input  type="file" class="form-control" style="direction: rtl" placeholder="آخرین تغییرات">
                                                <button class="btn btn-circle btn-outline-light">
                                                    <i class="ri-ball-pen-fill"></i>
                                                </button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">مجوز - در صورت وجود</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input  type="file" class="form-control" style="direct placeholder="انتخاب فایل">
                                                <button class="btn btn-circle btn-outline-light">
                                                    <i class="ri-ball-pen-fill"></i>
                                                </button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">کارت ملی رابط</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input  type="file" class="form-control" style="direct placeholder="کارت ملی رابط">
                                                <button class="btn btn-circle btn-outline-light">
                                                    <i class="ri-ball-pen-fill"></i>
                                                </button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-sm btn-primary px-3">ارسال برای بازبینی</button>
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
@stop

@section('footer')
    @parent
@stop

@section('extraJS')
    @parent
@stop
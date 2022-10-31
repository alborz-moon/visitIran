@extends('layouts.structure')

@section('content')
        <main class="page-content">
            <div class="container">
                <div class="row mb-5">
                    @include('shop.profile.layouts.profile_menu')
                                        <div class="col-xl-9 col-lg-8 col-md-7">
                        <div class="ui-box bg-white mb-5">
                            <div class="ui-box-title">اطلاعات شخصی</div>
                            <div class="ui-box-content">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-2">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="fs-7 fw-bold text-dark">نام و نام خانوادگی</div>
                                                <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="personal-info-fullname-modal"><i
                                                        class="ri-ball-pen-fill"></i></button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted">{{ $user->first_name . ' ' . $user->last_name }}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-2">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="fs-7 fw-bold text-dark">کد ملی</div>
                                                <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="personal-info-national-id-modal"><i
                                                        class="ri-ball-pen-fill"></i></button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted">-</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-2">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="fs-7 fw-bold text-dark">شماره تلفن همراه</div>
                                                <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="personal-info-phone-number-modal"><i
                                                        class="ri-ball-pen-fill"></i></button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted">09xxxxxxxxx</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-2">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="fs-7 fw-bold text-dark">پست الکترونیک</div>
                                                <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="personal-info-email-modal"><i
                                                        class="ri-ball-pen-fill"></i></button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted">{{ $user->mail }}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-2">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="fs-7 fw-bold text-dark">تاریخ تولد</div>
                                                <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="personal-info-birth-modal"><i
                                                        class="ri-ball-pen-fill"></i></button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted">-</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-2">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="fs-7 fw-bold text-dark">روش بازگرداندن وجه</div>
                                                <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="personal-info-returned-modal"><i
                                                        class="ri-ball-pen-fill"></i></button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted">-</div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-2">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="fs-7 fw-bold text-dark">رمز عبور</div>
                                                <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="personal-info-change-password-modal"><i
                                                        class="ri-ball-pen-fill"></i></button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted">-</div>
                                        </div>
                                    </div> --}}
                                    
                                    <div>
                                        <button onclick="submit()" class="btn btn-sm btn-primary px-3">ثبت</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                        <input id="first_name" value="{{ $user->first_name }}" type="text" class="form-control" placeholder="نام">
                    </div>
                    <div class="form-element-row">
                        <label class="label fs-7">نام خانوادگی</label>
                        <input id="last_name" value="{{ $user->last_name }}" type="text" class="form-control" placeholder="نام خانوادگی">
                    </div>
                </div>
                <div class="remodal-footer">
                    <button class="btn btn-sm btn-primary px-3">ثبت اطلاعات</button>
                </div>
            </div>
            <!-- end of personal-info-fullname-modal -->
            <!-- start of personal-info-national-id-modal -->
            <div class="remodal remodal-xs" data-remodal-id="personal-info-national-id-modal"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <div class="remodal-title">کد ملی</div>
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <div class="remodal-content">
                    <div class="form-element-row mb-3">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-element-row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="foreigner">
                            <label class="form-check-label fs-7 fw-bold" for="foreigner">
                                تبعه غیر‌ایرانی فاقد کد ملی هستم.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="remodal-footer">
                    <button class="btn btn-sm btn-primary px-3">ثبت اطلاعات</button>
                </div>
            </div>
            <!-- end of personal-info-national-id-modal -->
            <!-- start of personal-info-phone-number-modal -->
            <div class="remodal remodal-xs" data-remodal-id="personal-info-phone-number-modal"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <div class="remodal-title">شماره موبایل</div>
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <div class="remodal-content">
                    <div class="form-element-row mb-3">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="remodal-footer">
                    <button class="btn btn-sm btn-primary px-3">دریافت کد تایید و تغییر شماره</button>
                </div>
            </div>
            <!-- end of personal-info-phone-number-modal -->
            <!-- start of personal-info-email-modal -->
            <div class="remodal remodal-xs" data-remodal-id="personal-info-email-modal"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <div class="remodal-title">ایمیل</div>
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <div class="remodal-content">
                    <div class="form-element-row mb-3">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="remodal-footer">
                    <button class="btn btn-sm btn-primary px-3">تایید</button>
                </div>
            </div>
            <!-- end of personal-info-email-modal -->
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
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-element-row">
                                <label class="label fs-7">ماه</label>
                                <select class="select2" name="month" id="month">
                                    <option value="0">ماه</option>
                                    <option value="0">فروردین</option>
                                    <option value="0">اردیبهشت</option>
                                    <option value="0">خرداد</option>
                                    <option value="0">تیر</option>
                                    <option value="0">مرداد</option>
                                    <option value="0">شهریور</option>
                                    <option value="0">مهر</option>
                                    <option value="0">آبان</option>
                                    <option value="0">آ‌ذر</option>
                                    <option value="0">دی</option>
                                    <option value="0">بهمن</option>
                                    <option value="0">اسفند</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-element-row">
                                <label class="label fs-7">روز</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="remodal-footer">
                    <button class="btn btn-sm btn-primary px-3">ثبت تاریخ تولد</button>
                </div>
            </div>
            <!-- end of personal-info-birth-modal -->
            <!-- start of personal-info-returned-modal -->
            <div class="remodal remodal-xs" data-remodal-id="personal-info-returned-modal"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <div class="remodal-content">
                    <div class="fs-7 fw-bold mb-4">
                        لطفا روش بازگرداندن وجوه خود را انتخاب نمایید. همچنین برای کسب اطلاعات بیشتر لطفا ملاحظات بازگشت
                        وجه را مطالعه نمایید.
                    </div>
                    <div class="custom-radio-outline">
                        <input type="radio" class="custom-radio-outline-input" name="checkoutPayment"
                            id="checkoutPayment01">
                        <label for="checkoutPayment01" class="custom-radio-outline-label">
                            <span class="label">
                                <span class="icon"><i class="ri-secure-payment-fill"></i></span>
                                <span class="detail">
                                    <span class="title">واریز به حساب بانکی</span>
                                </span>
                            </span>
                        </label>
                    </div>
                    <div class="custom-radio-outline">
                        <input type="radio" class="custom-radio-outline-input" name="checkoutPayment"
                            id="checkoutPayment02">
                        <label for="checkoutPayment02" class="custom-radio-outline-label">
                            <span class="label">
                                <span class="icon"><i class="ri-wallet-3-fill"></i></span>
                                <span class="detail">
                                    <span class="title">واریز به کیف پول</span>
                                </span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="remodal-footer">
                    <button class="btn btn-sm btn-primary px-3">ثبت</button>
                </div>
            </div>
            <!-- end of personal-info-returned-modal -->
            <!-- start of personal-info-change-password-modal -->
            <div class="remodal remodal-xs" data-remodal-id="personal-info-change-password-modal"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <div class="remodal-title">ویرایش رمز عبور</div>
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <div class="remodal-content">
                    <div class="form-element-row mb-3">
                        <label class="label fs-7">رمز عبور فعلی</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-element-row mb-3">
                        <label class="label fs-7">رمز عبور جدید</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-element-row mb-3">
                        <label class="label fs-7">تکرار رمز عبور جدید</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="remodal-footer">
                    <button class="btn btn-sm btn-primary px-3">ثبت</button>
                </div>
                
            </div>
            <!-- end of personal-info-change-password-modal -->

        </main>
        
@stop

@section('footer')
    @parent
@stop

@section('extraJS')
    @parent
    <script src="{{ asset('theme-assets/js/theme.js') }}"></script>
    <script src="{{ asset('theme-assets/js/custom.js') }}"></script>

    <script>

        function submit() {
            $.ajax({
                type: 'post',
                url: '{{ route('api.editInfo') }}',
                data: {
                    'first_name': $('#first_name').val(),
                    'last_name': $('#last_name').val(),
                },
                success: function(res) {
                    if(res.status === 'ok')
                        showSuccess('عملیات موردنظر باموفقیت انجام شد.');
                }
            })
        }

    </script>
@stop
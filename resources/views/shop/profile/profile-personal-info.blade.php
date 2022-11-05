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
                                                <div  class="fs-7 fw-bold text-dark">نام و نام خانوادگی</div>
                                                <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="personal-info-fullname-modal"><i
                                                        class="ri-ball-pen-fill"></i></button>
                                            </div>
                                            <div id="nameVal" class="fs-6 fw-bold text-muted">{{ $user->first_name . ' ' . $user->last_name }}</div>
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
                                            <div id="nid" class="fs-6 fw-bold text-muted">{{ $user->nid != null ? $user->nid : '-' }}</div>
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
                                            <div id="phoneVal" class="fs-6 fw-bold text-muted">{{ $user->phone != null ? $user->phone : '-' }}</div>
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
                                            <div id="emailVal" class="fs-6 fw-bold text-muted">
                                                {{ $user->mail != null ? $user->mail : '-' }}
                                            </div>
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
                                            <div id="brithdayVal" class="fs-6 fw-bold text-muted">{{ $birth_day == null ? '' : $user->birth_day }}</div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-2">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="fs-7 fw-bold text-dark">روش بازگرداندن وجه</div>
                                                <button class="btn btn-circle btn-outline-light"
                                                    data-remodal-target="personal-info-returned-modal"><i
                                                        class="ri-ball-pen-fill"></i></button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted">-</div>
                                        </div>
                                    </div> --}}
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
                    <button onclick="setValName()" class="btn btn-sm btn-primary px-3">ثبت اطلاعات</button>
                </div>
            </div>
            <!-- end of personal-info-fullname-modal -->
            <!-- start of personal-info-national-id-modal -->
            <div class="remodal remodal-xs" data-remodal-id="personal-info-national-id-modal"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <div  class="remodal-title">کد ملی</div>
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <div class="remodal-content">
                    <div class="form-element-row mb-3">
                        <input id="personal_code" type="tel" maxlength="10" class="form-control" placeholder="">
                    </div>
                    <div class="form-element-row">
                        <div class="form-check">
                            <input id="personal_code_checkbox" class="form-check-input" type="checkbox" value="" id="foreigner">
                            <label class="form-check-label fs-7 fw-bold" for="foreigner">
                                تبعه غیر‌ایرانی فاقد کد ملی هستم.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="remodal-footer">
                    <button onclick="setValPersonal_code()" class="btn btn-sm btn-primary px-3">ثبت اطلاعات</button>
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
                        <input id="phone_info" type="tel" maxlength="11" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="remodal-footer">
                    <button onclick="setValPhone()" class="btn btn-sm btn-primary px-3">تغییر شماره</button>
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
                        <input id="email_info" type="email" class="form-control" placeholder="">
                    </div>
                </div>

                <div class="remodal-footer">
                    <button onclick="setValEmail()" class="btn btn-sm btn-primary px-3">تایید</button>
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
                                <input value="{{ $birth_day != null ? $birth_day[0] : '' }}" id="Brithday_year" type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-element-row">
                                <label class="label fs-7">ماه</label>
                                <select class="select2" name="month" id="Brithday_month">
                                    <option value="0">ماه</option>
                                    <option {{ ($birth_day != null && $birth_day[1] == 1) ? 'selected' : '' }} value="1">فروردین</option>
                                    <option {{ ($birth_day != null && $birth_day[1] == 2) ? 'selected' : '' }} value="2">اردیبهشت</option>
                                    <option {{ ($birth_day != null && $birth_day[1] == 3) ? 'selected' : '' }} value="3">خرداد</option>
                                    <option {{ ($birth_day != null && $birth_day[1] == 4) ? 'selected' : '' }} value="4">تیر</option>
                                    <option {{ ($birth_day != null && $birth_day[1] == 5) ? 'selected' : '' }} value="5">مرداد</option>
                                    <option {{ ($birth_day != null && $birth_day[1] == 6) ? 'selected' : '' }} value="6">شهریور</option>
                                    <option {{ ($birth_day != null && $birth_day[1] == 7) ? 'selected' : '' }} value="7">مهر</option>
                                    <option {{ ($birth_day != null && $birth_day[1] == 8) ? 'selected' : '' }} value="8">آبان</option>
                                    <option {{ ($birth_day != null && $birth_day[1] == 9) ? 'selected' : '' }} value="9">آ‌ذر</option>
                                    <option {{ ($birth_day != null && $birth_day[1] == 10) ? 'selected' : '' }} value="10">دی</option>
                                    <option {{ ($birth_day != null && $birth_day[1] == 11) ? 'selected' : '' }} value="11">بهمن</option>
                                    <option {{ ($birth_day != null && $birth_day[1] == 12) ? 'selected' : '' }} value="12">اسفند</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-element-row">
                                <label class="label fs-7">روز</label>
                                <input id="Brithday_day" value="{{ $birth_day != null ? $birth_day[2] : '' }}" type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="remodal-footer">
                    <button onclick="setValBrithday()" class="btn btn-sm btn-primary px-3">ثبت تاریخ تولد</button>
                </div>
            </div>
            <!-- end of personal-info-birth-modal -->
            <!-- start of personal-info-returned-modal -->
            {{-- <div class="remodal remodal-xs" data-remodal-id="personal-info-returned-modal"
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
                        <input  type="radio" class="custom-radio-outline-input" name="checkoutPayment"
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
            </div> --}}
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
    <script>
        function setValName() {
            var name = $('#first_name').val();
            var last = $('#last_name').val();
            $('#nameVal').text(name + ' ' + last);
            $(".remodal-close").click();
        }

        function setValPhone() {
            $('#phoneVal').text($('#phone_info').val());
            $(".remodal-close").click();
        }

        function setValBrithday() {
            
            var year = $('#Brithday_year').val();
            var month = $('#Brithday_month').val();
            var day =$('#Brithday_day').val();

            $('#brithdayVal').text(year + '/' + month + '/' + day);
            $(".remodal-close").click();
        }

        function setValPersonal_code() {
            $('#nid').text($('#personal_code').val());
            $(".remodal-close").click();
        }

        function setValEmail() {
            $('#emailVal').text($('#email_info').val());
            $(".remodal-close").click();
        }

        function submit() {

            let data = {};
            
            let first_name = $("#first_name").val();
            let last_name = $('#last_name').val();
            let nid = $('#personal_code').val();
            let mail = $('#email_info').val();
            let phone = $('#phone_info').val();
            let birthday = $('#brithdayVal').text();
            
            if(birthday !== undefined && birthday !== '')
                data.birth_day = birthday;

            if(nid !== undefined && nid !== '')
                data.nid = nid;

            if(mail !== undefined && mail !== '')
                data.mail = mail;
                
            if(phone !== undefined && phone !== '')
                data.phone = phone;
            
            if(first_name !== undefined && first_name !== '')
                data.first_name = first_name;
                
            if(last_name !== undefined && last_name !== '')
                data.last_name = last_name;

            $.ajax({
                type: 'post',
                url: '{{ route('api.editInfo') }}',
                data: data,
                success: function(res) {
                    if(res.status === 'ok')
                        showSuccess('عملیات موردنظر باموفقیت انجام شد.');
                }
            })
        }

    </script>
@stop
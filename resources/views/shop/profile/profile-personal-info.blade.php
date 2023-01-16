@extends('layouts.structure')
@section('header')
    @parent
    <script src="{{asset('theme-assets/js/Utilities.js')}}"></script>
@stop
@section('content')
    <main class="page-content TopParentBannerMoveOnTop">
        <div class="container mt-4">
            <div class="row mb-5">
                    @include('shop.profile.layouts.profile_menu')     
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <div class="ui-box bg-white mb-5">
                        <div class="ui-box-title">اطلاعات شخصی</div>
                        <div class="ui-box-content">
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <div class="py-1">
                                        <div  class="fs-7 text-dark">نام و نام خانوادگی</div>
                                        <div data-remodal-target="personal-info-fullname-modal" class="d-flex align-items-center justify-content-between">
                                            <input value="{{ $user->first_name != null ? $user->first_name . ' ' . $user->last_name  : '' }}" id="nameVal" type="text" class="form-control setName" style="direction: rtl" placeholder="نام و نام خانوادگی" disabled>
                                            <button data-input-id="nameVal" class="toggle-editable-btn btn btn-circle btn-outline-light hidden"
                                                data-remodal-target="personal-info-fullname-modal "><i class="ri-ball-pen-fill"></i>
                                            </button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="py-1">
                                        <div  class="fs-7 text-dark">کد ملی</div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <input value="{{ $user->nid != null ? $user->nid : ''}}" data-editable="true" onkeypress="return isNumber(event)" minlength="10" maxlength="10" id="nid" type="text" class="form-control" style="direction: rtl" placeholder="کد ملی">
                                            <button data-input-id="nid" class="toggle-editable-btn btn btn-circle btn-outline-light hidden">
                                                <i class="ri-ball-pen-fill"></i>
                                            </button>
                                        </div>
                                        {{-- {{ $user->phone != null ? $user->phone : ''}} --}}
                                        <div class="fs-6 fw-bold text-muted"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="py-1">
                                        <div  class="fs-7 text-dark">شماره تلفن همراه</div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <input value="{{$user->phone != null ? $user->phone : ''}}" data-editable="true" onkeypress="return isNumber(event)" id="phone" type="tel" minlength="7"  maxlength="11" class="form-control" style="direction: rtl" placeholder="شماره تلفن همراه">
                                            <button data-input-id="phone" class=" toggle-editable-btn btn btn-circle btn-outline-light">
                                                <i class="ri-ball-pen-fill"></i>
                                            </button>
                                        </div>
                                        {{-- {{ $user->nid != null ? $user->nid : ''}} --}}
                                        <div class="fs-6 fw-bold text-muted"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="py-1">
                                        <div  class="fs-7 text-dark">پست الکترونیک</div>
                                        <div class="d-flex align-items-center justify-content-between position-relative">
                                            <input value="{{ $user->mail != null ? $user->mail : ''}}" data-editable="true" onkeypress="return isEmail(event) || isNumber(event)" id="mail" type="email" class="form-control" style="direction: rtl" placeholder="پست الکترونیک">
                                            <button data-input-id="mail" class=" toggle-editable-btn btn btn-circle btn-outline-light hidden">
                                                <i class="ri-ball-pen-fill"></i>
                                            </button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="py-1">
                                        <div  class="fs-7 text-dark">تاریخ تولد</div>
                                        <div data-remodal-target="personal-info-birth-modal" class="d-flex align-items-center justify-content-between">
                                            <input value="{{ $user->birth_day != null ? $user->birth_day : ''}}" id="brithdayVal" type="text" class="form-control userBirthDay" style="direction: rtl" placeholder="تاریخ تولد" disabled>
                                            <button data-input-id="mainBrithday" class="toggle-editable-btn btn btn-circle btn-outline-light hidden"
                                                data-remodal-target="personal-info-birth-modal">
                                                <i class="ri-ball-pen-fill"></i>
                                            </button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                </div>                                
                                <div>
                                    <button onclick="submit()" class="btn btn-sm btn-primary px-3">ثبت</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('event.layouts.personalInfoFullName')
        @include('event.layouts.personalInfoBirthDay')

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
            var nameVal = $('#nameVal');
            nameVal.val(name + ' ' + last);
            $('#editBtnName').removeClass('hidden');
            $(".remodal-close").click();
        }

        function setValBrithday() {
            var year = $('#Brithday_year').val();
            var month = $('#Brithday_month').val();
            var day =$('#Brithday_day').val();
            // $('#editBtnBirdthday').removeClass('hidden');
            $('#brithdayVal').val(year + '/' + month + '/' + day);
            $(".remodal-close").click();
        }
        function submit() {

            // let data = {};
            
            let first_name = $("#first_name").val();
            let last_name = $('#last_name').val();
            let nid = $('#nid').val();
            let mail = $('#mail').val();
            let phone = $('#phone').val();
            let birthday = $('#brithdayVal').val();
            
            // if(birthday !== undefined && birthday !== '')
            //     data.birth_day = birthday;

            // if(nid !== undefined && nid !== '')
            //     data.nid = nid;

            // if(mail !== undefined && mail !== '')
            //     data.mail = mail;
                
            // if(phone !== undefined && phone !== '')
            //     data.phone = phone;
            
            // if(first_name !== undefined && first_name !== '')
            //     data.first_name = first_name;
                
            // if(last_name !== undefined && last_name !== '')
            //     data.last_name = last_name;

            $.ajax({
                type: 'post',
                url: '{{ route('api.editInfo') }}',
                data: {
                    birth_day: birthday,
                    nid: nid,
                    mail: mail,
                    phone: phone,
                    first_name: first_name,
                    last_name: last_name, 
                },
                success: function(res) {
                    if(res.status === 'ok')
                        // $('#editBtnName').removeClass('hidden');
                        // $('#editBtnBirdthday').removeClass('hidden');
                        showSuccess('عملیات موردنظر باموفقیت انجام شد.');

                }
            })
        }

    </script>
@stop

@extends('layouts.structure-login')
@section('content')
            <main class="page-content page-auth">
            <!-- start of auth-container -->
            <div class="auth-container">
                <div class="auth-title mb-3">تایید شماره موبایل</div>
                <!-- start of auth-box -->
                <div class="auth-box ui-box">
                    <!-- start of auth-form -->
                    <form action="#" class="auth-form">
                        <!-- start of form-element -->
                        <div class="form-element-row mb-3">
                            <p>
                                حساب کاربری با شماره موبایل <span class="border-bottom">۰۹۰۰۰۰۰۰۰۰۰</span> وجود ندارد.
                                برای ایجاد
                                حساب
                                کاربری، لطفا
                                کد ارسال شده را وارد نمایید.
                            </p>
                        </div>
                        <!-- end of form-element -->
                        <!-- start of form-element -->
                        <div class="form-element-row mb-3">
                            <div class="form-input-code-container fa-num">
                                <input type="text" maxlength="2" class="form-control input-code" id="input-code-0"
                                    data-next="1" autocomplete="off" autofocus>
                                <span class="divider">-</span>
                                <input type="text" maxlength="2" class="form-control input-code" id="input-code-1"
                                    data-next="2" autocomplete="off">
                                <span class="divider">-</span>
                                <input type="text" maxlength="2" class="form-control input-code" id="input-code-2"
                                    autocomplete="off">
                            </div>
                        </div>
                        <!-- end of form-element -->
                        <!-- start of verify-code-wrapper -->
                        <div  class="verify-code-wrapper mt-3 mb-5">
                            <div id="timer" class="d-flex align-items-center" dir="ltr">
                                <span class="text-sm">مدت زمان باقیمانده</span>
                                <span class="mx-2">|</span>
                                <div id="timer--verify-code"></div>
                            </div>
                            <a href="#" class="send-again link">ارسال مجدد</a>
                        </div>
                        <!-- end of verify-code-wrapper -->
                        <!-- start of form-element -->
                        <div class="form-element-row mb-3">
                            <button type="submit" class="btn btn-primary">پیوستن به خانواده ما</button>
                        </div>
                        <!-- end of form-element -->
                        <!-- start of form-element -->
                        <div class="form-element-row">
                            <a href="#" class="link mx-auto">ویرایش شماره موبایل <i class="ri-pencil-fill ms-1"></i></a>
                        </div>
                        <!-- end of form-element -->
                    </form>
                    <!-- end of auth-form -->
                </div>
                <!-- end of auth-box -->
            </div>
            <!-- end of auth-container -->
        </main>
    <script>
         $.ajax({
             type: 'get',
             url: '{{ route('api.login') }}',
             headers: {
                 'accept': 'application/json'
             },
             success: function(res) {
                
                if(res.status === "ok") {
                    timer = window.localStorage.getItem(key);
                    $('#timer--verify-code').attr('data-seconds-left', 'timer');
                }
            }
         });

    </script>
@stop
@section('extraJS')
    @parent
    <script src="{{ asset('theme-assets/js/theme.js') }}"></script>
    <script src="{{ asset('theme-assets/js/custom.js') }}"></script>
@stop
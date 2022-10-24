
@extends('layouts.structure-login')
@section('content')
        <main class="page-content page-auth">
            <!-- start of auth-container -->
            <div class="auth-container">
                <div class="auth-title mb-3">ورود / ثبت نام</div>
                <!-- start of auth-box -->
                <div class="auth-box ui-box">
                    <!-- start of auth-form -->
                    {{-- <form action="api/auth" class="auth-form" method=""> --}}
                        <!-- start of form-element -->
                        <div class="form-element-row mb-5">
                            <input id="phone" type="text" class="form-control" placeholder="شماره موبایل یا ایمیل">
                        </div>
                        <!-- end of form-element -->
                        <!-- start of form-element -->
                        <div class="form-element-row mb-3">
                            <button id="login_submit" class="btn btn-primary">ادامه</button>
                        </div>
                        <!-- end of form-element -->
                        <!-- start of form-element -->
                        <div class="form-element-row">
                            <div>با ورود و یا ثبت نام در سایت شما <a href="#" class="link">شرایط و
                                    قوانین</a> استفاده
                                از تمام سرویس های
                                سایت و <a href="#" class="link">قوانین حریم خصوصی</a> آن را می‌پذیرید.
                            </div>
                        </div>
                        <!-- end of form-element -->
                    {{-- </form> --}}
                    <!-- end of auth-form -->
                </div>
                <!-- end of auth-box -->
            </div>
            <!-- start of auth-container -->
        </main>
        <script>
            let phone = $('#phone').value();

            // $(document).ready(function() {
            //     $("#login_submit").click(function(event) {
            //         event.preventDefault();
            //         $.ajax({
            //             type: 'post',
            //             url: '{{ route('api.login') }}',
            //             headers: {
            //                 'accept': 'application/json'
            //             },
            //             success: function(res) {
            //                 window.localStorage.setItem(res, value);
            //                 if(res.status === "ok") {               
            //             }}
            //         });
            //     });
            // });
        </script>
@stop
@section('extraJS')
    @parent
    <script src="{{ asset('theme-assets/js/theme.js') }}"></script>
    <script src="{{ asset('theme-assets/js/custom.js') }}"></script>
@stop

@extends('layouts.structure-login')
@section('content')
            <main class="page-content page-auth">
            <!-- start of auth-container -->
            <div class="auth-container">
                <div class="auth-title mb-3">خوش آمدید</div>
                <!-- start of auth-box -->
                <div class="auth-box ui-box">
                    <div class="fs-6 fw-bold text-dark text-center mb-3">حساب کاربری شما ساخته شد</div>
                    <div class="fs-7 fw-bold text-muted text-center mb-3">
                        اکنون می‌توانید به صفحه‌ای که در آن بودید بازگردید و یا با تکمیل اطلاعات حساب کاربری خود به کلیه
                        امکانات و سرویس‌ها و سرویس‌های وابسته به آن دسترسی داشته باشید
                    </div>
                    <a href='{{ route('profile.personal-info') }}' class="btn btn-block btn-primary mb-3"><i class="ri-user-6-fill me-2"></i> تکمیل حساب
                        کاربری</a>
                    <div class="text-center">
                        <a href='{{ route('home') }}' class="link">بازگشت به صفحه‌ای که در آن بودید</a>
                    </div>
                </div>
                <!-- end of auth-box -->
            </div>
            <!-- end of auth-container -->
        </main>
@stop

@section('extraJS')
    @parent
    <script src="{{ asset('theme-assets/js/theme.js') }}"></script>
    <script src="{{ asset('theme-assets/js/custom.js') }}"></script>
@stop
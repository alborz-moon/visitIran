
@extends('layouts.structure-login')
@section('content')
            <main class="page-content page-auth">
            <!-- start of auth-container -->
            <div class="auth-container">
                <div class="d-flex">
                    <div class="logo-container logo-box me-3 logoImgFromTop">
                            <img src="{{ asset('theme-assets/images/menuImage.png') }}" width="120" alt="">
                    </div>
                    <div>
                        <div class="notification-item--text colorYellow bold"> ویزیت ایران </div>
                        <div class="notification-item--text fontSize12"> سامانه فروش صنایع دستی و هنرهای تزئینی </div>
                        <div class="notification-item--text fontSize18 bold mt-3 mb-3">خوش آمدید</div>
                    </div>
                </div>
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
                        <a href='{{ route('home') }}' class="hoverBoldYellow colorYellow">بازگشت به صفحه‌ای که در آن بودید</a>
                    </div>
                </div>
                <!-- end of auth-box -->
            </div>
            <!-- end of auth-container -->
        </main>
@stop

@section('extraJS')
    @parent
@stop
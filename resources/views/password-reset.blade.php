
@extends('layouts.structure-login')
@section('content')
            <main class="page-content page-auth">
            <!-- start of auth-container -->
            <div class="auth-container">
                <div class="d-flex">
                    <div class="logo-container logo-box me-3 logoImgFromTop">
                            <img src="{{ asset('theme-assets/images/menuImage2.svg') }}" width="120" alt="">
                    </div>
                    <div>
                        <div class="notification-item--text colorYellow bold"> بازارگاه صنایع دستی </div>
                        <div class="notification-item--text fontSize12"> سامانه فروش صنایع دستی و هنرهای تزئینی </div>
                        <div class="notification-item--text fontSize18 bold mt-3 mb-3">بازیابی رمز عبور</div>
                    </div>
                </div>
                <!-- start of auth-box -->
                <div class="auth-box ui-box">
                    <!-- start of auth-form -->
                    <form action="#" class="auth-form">
                        <!-- start of form-element -->
                        <div class="form-element-row mb-3">
                            <label class="label">رمز عبور جدید</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <!-- end of form-element -->
                        <!-- start of form-element -->
                        <div class="form-element-row mb-3">
                            <label class="label">تکرار رمز عبور جدید</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <!-- end of form-element -->
                        <!-- start of form-element -->
                        <div class="form-element-row">
                            <button class="btn btn-primary">بازیابی رمز عبور</button>
                        </div>
                        <!-- end of form-element -->
                    </form>
                    <!-- end of auth-form -->
                </div>
                <!-- end of auth-box -->
            </div>
            <!-- end of auth-container -->
        </main>
@stop
@section('extraJS')
    @parent
@stop
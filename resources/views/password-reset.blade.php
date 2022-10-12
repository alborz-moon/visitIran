
@extends('layouts.structure-login')
@section('content')
            <main class="page-content page-auth">
            <!-- start of auth-container -->
            <div class="auth-container">
                <div class="auth-title mb-3">بازیابی رمز عبور</div>
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
    <script src="{{ asset('theme-assets/js/theme.js') }}"></script>
    <script src="{{ asset('theme-assets/js/custom.js') }}"></script>
@stop
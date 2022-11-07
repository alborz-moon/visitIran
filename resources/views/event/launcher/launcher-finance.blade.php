
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
                            <div class="ui-box-title">اطلاعات مالی <span class="fontSize12 colorBlack">شماره شبا حتما باید به نام برگزار کننده بوده و بدون IR وارد شود</span></div>
                            <div class="ui-box-content">                  
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <div class="border-bottom py-2">
                                            <div  class="fs-7 text-dark">شماره شبا</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input type="text" class="form-control" style="direction: rtl" placeholder="شماره شبا">
                                                <button class="btn btn-circle btn-outline-light hidden"
                                                    data-remodal-target="personal-info-fullname-modal"><i
                                                        class="ri-ball-pen-fill"></i></button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="border-bottom py-1">
                                            <div  class="fs-7 text-dark">نام بانک</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input id="phone_info" type="tel" maxlength="11" class="form-control" style="direction: rtl" placeholder="نام بانک">
                                                <button class="btn btn-circle btn-outline-light hidden">
                                                    <i class="ri-ball-pen-fill"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-sm btn-primary px-3">افزودن</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui-box bg-white mb-5">
                            <div class="ui-box-title align-items-center justify-content-between">
                                شماره حساب های موجود
                            </div>
                            <div class="ui-box-content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>شماره</th>
                                                <th>شماره عملیات </th>
                                                <th>شماره شبا</th>
                                                <th>نام بانک</th>
                                                <th>وضعیت</th>
                                                <th>آخرین بروزرسانی</th>
                                                <th>عملیات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="fa-num">1</td>
                                                <td class="fa-num">1400 دی 25</td>
                                                <td class="fa-num">پشتیبانی</td>
                                                <td class="fa-num">کالای غیراصل</td>
                                                <td class="fa-num"><span class="badge bg-success rounded-pill">پاسخ داده
                                                        شد</span></td>
                                                <td class="fa-num">1400 دی 26</td>
                                                <td>
                                                    <a href="#" class="btn btn-circle btn-info my-1"><i
                                                            class="ri-eye-line"></i></a>
                                                    <a href="#" class="btn btn-circle btn-danger my-1"><i
                                                            class="ri-close-line"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fa-num">1</td>
                                                <td class="fa-num">1400 دی 25</td>
                                                <td class="fa-num">پشتیبانی</td>
                                                <td class="fa-num">کالای غیراصل</td>
                                                <td class="fa-num"><span
                                                        class="badge bg-danger rounded-pill">بسته</span></td>
                                                <td class="fa-num">1400 دی 26</td>
                                                <td>
                                                    <a href="#" class="btn btn-circle btn-info my-1"><i
                                                            class="ri-eye-line"></i></a>
                                                    <a href="#" class="btn btn-circle btn-danger my-1"><i
                                                            class="ri-close-line"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fa-num">1</td>
                                                <td class="fa-num">1400 دی 25</td>
                                                <td class="fa-num">پشتیبانی</td>
                                                <td class="fa-num">کالای غیراصل</td>
                                                <td class="fa-num"><span class="badge bg-warning rounded-pill">در حال
                                                        بررسی</span></td>
                                                <td class="fa-num">1400 دی 26</td>
                                                <td>
                                                    <a href="#" class="btn btn-circle btn-info my-1"><i
                                                            class="ri-eye-line"></i></a>
                                                    <a href="#" class="btn btn-circle btn-danger my-1"><i
                                                            class="ri-close-line"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
            </div>
        </div>
    </main>
@stop

@section('footer')
    @parent
@stop

@section('extraJS')
    @parent
@stop
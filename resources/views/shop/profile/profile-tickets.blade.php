
@extends('layouts.structure')
@section('content')
        <main class="page-content">
            <div class="container">
                <div class="row mb-5">
                    @include('shop.profile.layouts.profile_menu')
                                        <div class="col-xl-9 col-lg-8 col-md-7">
                        <div class="ui-box bg-white mb-5">
                            <div class="ui-box-title align-items-center justify-content-between">
                                تیکتهای شما
                                <a href="{{ route('profile.tickets-add') }}" class="btn btn-outline-light">تیکت جدید <i class="ri-add-line ms-2"></i></a>
                            </div>
                            <!-- <div class="ui-box-empty-content">
                                <div class="ui-box-empty-content-icon">
                                    <img src="./theme-assets/images/theme/orders.svg" alt="">
                                </div>
                                <div class="ui-box-empty-content-message">تیکتی تا به الان ایجاد نکرده اید.
                                </div>
                            </div> -->
                            <div class="ui-box-content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>زمان ایجاد</th>
                                                <th>بخش</th>
                                                <th>موضوع</th>
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
                                                <td class="fa-num"><span class="badge bg-warning rounded-pill">در حال
                                                        بررسی</span></td>
                                                <td class="fa-num">1400 دی 26</td>
                                                <td>
                                                    <a href="{{ route('profile.tickets-detail') }}" class="btn btn-circle btn-info my-1"><i
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
                                                <td class="fa-num"><span class="badge bg-success rounded-pill">پاسخ داده
                                                        شد</span></td>
                                                <td class="fa-num">1400 دی 26</td>
                                                <td>
                                                    <a href="{{ route('profile.tickets-detail') }}" class="btn btn-circle btn-info my-1"><i
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
                                                    <a href="{{ route('profile.tickets-detail') }}" class="btn btn-circle btn-info my-1"><i
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
                                                    <a href="{{ route('profile.tickets-detail') }}" class="btn btn-circle btn-info my-1"><i
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
                                                    <a href="{{ route('profile.tickets-detail') }}" class="btn btn-circle btn-info my-1"><i
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
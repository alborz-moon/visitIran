
@extends('layouts.structure')
@section('content')
        <main class="page-content">
            <div class="container">
                <div class="row mb-5">
                        @include('shop.profile.layouts.profile_menu')     
                    <div class="col-xl-9 col-lg-8 col-md-7">
                        <div class="ui-box bg-white">
                            <div class="ui-box-title">تاریخچه سفارشات</div>
                            <div class="ui-box-content">
                                <!-- start of order-tabs -->
                                <div class="order-tabs">
                                    <ul class="nav nav-tabs fa-num" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link d-inline-flex align-items-center"
                                                id="paid-in-progress-tab" data-bs-toggle="tab"
                                                data-bs-target="#paid-in-progress" type="button" role="tab"
                                                aria-controls="paid-in-progress" aria-selected="false">در حال پردازش
                                                <span class="badge rounded-pill bg-danger ms-1">0</span></button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link d-inline-flex align-items-center" id="delivered-tab"
                                                data-bs-toggle="tab" data-bs-target="#delivered" type="button"
                                                role="tab" aria-controls="delivered" aria-selected="false">تحویل شده
                                                <span class="badge rounded-pill bg-danger ms-1">0</span></button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link d-inline-flex align-items-center active"
                                                id="canceled-tab" data-bs-toggle="tab" data-bs-target="#canceled"
                                                type="button" role="tab" aria-controls="canceled"
                                                aria-selected="true">لغو
                                                شده <span class="badge rounded-pill bg-danger ms-1">15</span></button>
                                        </li>
                                    </ul>
                                </div>
                                <!-- end of order-tabs -->
                                <!-- start of tab-content -->
                                <div class="tab-content" id="myTabContent">
                                    <!-- start of tab-pane -->
                                    <div class="tab-pane fade" id="paid-in-progress" role="tabpanel"
                                        aria-labelledby="paid-in-progress-tab">
                                        <div class="user-order-items">
                                            <div class="user-order-item">
                                                <div class="user-order-item-header">
                                                    <div class="mb-3">
                                                        <div class="row">
                                                            <div class="col-xl-3 col-lg-4 col-md-auto col-sm-6">
                                                                <span class="user-order-meta fa-num">23 آبان 1400</span>
                                                            </div>
                                                            <div class="col-xl-3 col-lg-4 col-md-auto col-sm-6">
                                                                <span class="user-order-meta">DKC-233189114</span>
                                                            </div>
                                                            <div class="col-xl-3 col-lg-4 col-md-auto col-sm-6">
                                                                <span class="user-order-meta">سفارش درحال ارسال</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <span class="text-muted fw-bold">مبلغ کل:</span>
                                                        <span class="fw-bold fa-num">۴۲,۴۱۵,۰۰۰
                                                            <span>تومان</span></span>
                                                    </div>
                                                    <a href="{{ route('profile.my-order-detail') }}"
                                                        class="btn btn-link fw-bold user-order-detail-link colorBlue">جزئیات
                                                        سفارش <i class="ri-arrow-left-s-fill"></i></a>
                                                </div>
                                                <div class="user-order-item-content">
                                                    <div class="mb-3">
                                                        <span class="text-dark fa-num">مرسوله 1 از 1</span>
                                                    </div>
                                                    <div class="user-order-item-products">
                                                        <a href="#">
                                                            <img src="./theme-assets/images/carts/01.jpg" alt="">
                                                        </a>
                                                        <a href="#">
                                                            <img src="./theme-assets/images/carts/02.jpg" alt="">
                                                        </a>
                                                        <a href="#">
                                                            <img src="./theme-assets/images/carts/03.jpg" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of tab-pane -->
                                    <!-- start of tab-pane -->
                                    <div class="tab-pane fade" id="delivered" role="tabpanel"
                                        aria-labelledby="delivered-tab">
                                        <div class="user-order-items">
                                            <div class="user-order-item">
                                                <div class="user-order-item-header">
                                                    <div class="mb-3">
                                                        <div class="row">
                                                            <div class="col-xl-3 col-lg-4 col-md-auto col-sm-6">
                                                                <span class="user-order-meta fa-num">23 آبان 1400</span>
                                                            </div>
                                                            <div class="col-xl-3 col-lg-4 col-md-auto col-sm-6">
                                                                <span class="user-order-meta">DKC-233189114</span>
                                                            </div>
                                                            <div class="col-xl-3 col-lg-4 col-md-auto col-sm-6">
                                                                <span class="user-order-meta">ارسال شده</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <span class="text-muted fw-bold">مبلغ کل:</span>
                                                        <span class="fw-bold fa-num">۴۲,۴۱۵,۰۰۰
                                                            <span>تومان</span></span>
                                                    </div>
                                                    <a href="{{ route('profile.my-order-detail') }}"
                                                        class="btn btn-link fw-bold user-order-detail-link colorBlue">جزئیات
                                                        سفارش <i class="ri-arrow-left-s-fill"></i></a>
                                                </div>
                                                <div class="user-order-item-content">
                                                    <div class="mb-3">
                                                        <span class="text-dark fa-num">مرسوله 1 از 1</span>
                                                    </div>
                                                    <div class="user-order-item-products">
                                                        <a href="#">
                                                            <img src="./theme-assets/images/carts/01.jpg" alt="">
                                                        </a>
                                                        <a href="#">
                                                            <img src="./theme-assets/images/carts/02.jpg" alt="">
                                                        </a>
                                                        <a href="#">
                                                            <img src="./theme-assets/images/carts/03.jpg" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of tab-pane -->
                                    <!-- start of tab-pane -->
                                    <div class="tab-pane fade show active" id="canceled" role="tabpanel"
                                        aria-labelledby="canceled-tab">
                                        <div class="user-order-items">
                                            <div class="user-order-item">
                                                <div class="user-order-item-header">
                                                    <div class="mb-3">
                                                        <div class="row">
                                                            <div class="col-xl-3 col-lg-4 col-md-auto col-sm-6">
                                                                <span class="user-order-meta fa-num">23 آبان 1400</span>
                                                            </div>
                                                            <div class="col-xl-3 col-lg-4 col-md-auto col-sm-6">
                                                                <span class="user-order-meta">DKC-233189114</span>
                                                            </div>
                                                            <div class="col-xl-3 col-lg-4 col-md-auto col-sm-6">
                                                                <span class="user-order-meta">سفارش لغو شده</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <span class="text-muted fw-bold">مبلغ کل:</span>
                                                        <span class="fw-bold fa-num">۴۲,۴۱۵,۰۰۰
                                                            <span>تومان</span></span>
                                                    </div>
                                                    <a href="{{ route('profile.my-order-detail') }}"
                                                        class="btn btn-link fw-bold user-order-detail-link colorBlue">جزئیات
                                                        سفارش <i class="ri-arrow-left-s-fill"></i></a>
                                                </div>
                                                <div class="user-order-item-content">
                                                    <div class="mb-3">
                                                        <span class="text-dark fa-num">مرسوله 1 از 1</span>
                                                    </div>
                                                    <div class="user-order-item-products">
                                                        <a href="#">
                                                            <img src="./theme-assets/images/carts/01.jpg" alt="">
                                                        </a>
                                                        <a href="#">
                                                            <img src="./theme-assets/images/carts/02.jpg" alt="">
                                                        </a>
                                                        <a href="#">
                                                            <img src="./theme-assets/images/carts/03.jpg" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of tab-pane -->
                                </div>
                                <!-- end of tab-content -->
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
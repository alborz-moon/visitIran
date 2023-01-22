@extends('layouts.structure')
@section('content')
    <main class="page-content TopParentBannerMoveOnTop">
        <div class="container">
            <div class="row mb-5">
                @include('shop.profile.layouts.profile_menu')
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <div class="ui-box bg-white mb-5 p-0">
                        <div class="ui-box-title align-items-center justify-content-between">
                            تیکتهای شما
                            <a href="{{ route('profile.tickets-add') }}"
                                class="btn btn-outline-light marginLeft3">تیکت جدید <i
                                    class="ri-add-line ms-2"></i></a>
                        </div>
                        <!-- <div class="ui-box-empty-content">
                                    <div class="ui-box-empty-content-icon">
                                        <img src="./theme-assets/images/theme/orders.svg" alt="">
                                    </div>
                                    <div class="ui-box-empty-content-message">تیکتی تا به الان ایجاد نکرده اید.
                                    </div>
                                </div> -->
                        {{-- <div class="ui-box-content">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>شماره</th>
                                            <th>شماره شبا </th>
                                            <th>پیش فرض</th>
                                            <th>وضعیت</th>
                                            <th>تاریخ ایجاد</th>
                                            <th>عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="fa-num">1</td>
                                            <td class="fa-num">13245647987897251367894564</td>
                                            <td class="fa-num">
                                                <button class="btn btn-circle borderCircle my-1">
                                                    <i class="icon-visit-check marginTop7"></i>
                                                </button>
                                            </td>
                                            <td class="fa-num">
                                                <span class="badge bg-danger rounded-pill">نیازمند</span>
                                                <span class="badge bg-warning rounded-pill">در حال بررسی</span>
                                                <span class="badge bg-success rounded-pill">تایید</span>
                                            </td>
                                            <td class="fa-num">1400 دی 26</td>
                                            <td>
                                                <button class="btn btn-circle borderCircle my-1">
                                                    <i class="icon-visit-edit marginTop7"></i>
                                                </button>
                                                <button class="btn btn-circle borderCircle my-1">
                                                    <i class="icon-visit-delete marginTop7"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> --}}
                        <div class="py-2">
                            <div class="table-responsive dropdown">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>زمان ایجاد</th>
                                            <th>بخش</th>
                                            <th>موضوع</th>
                                            <th>وضعیت</th>
                                            <th>آخرین بروزرسانی</th>
                                            <th>عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTickets">
                                        <tr>
                                            <td>رویداد من</td>
                                            <td>اصغر فرهادی</td>
                                            <td>1401</td>
                                            <td>1402</td>
                                            <td>10</td>
                                            <td>
                                                <button class="btn btn-circle borderCircle my-1 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="icon-visit-menu"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item fontSize12 btnHover" href="#">مشاهده</a></li>
                                                    <li><a class="dropdown-item fontSize12 btnHover" href="#">حذف</a></li>
                                                </ul>
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

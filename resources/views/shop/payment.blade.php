
@extends('layouts.structure')
@section('content')
            <main class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8 mb-lg-0 mb-4">
                        <div class="row">
                            <div class="col-xl-6">
                                <!-- start of box => payment-methods -->
                                <div class="ui-box bg-white payment-methods mb-5">
                                    <div class="ui-box-title">شیوه پرداخت</div>
                                    <div class="ui-box-content">
                                        <!-- start of custom-radio-outline -->
                                        <div class="custom-radio-outline">
                                            <input type="radio" class="custom-radio-outline-input" name="checkoutPayment"
                                                id="checkoutPayment01">
                                            <label for="checkoutPayment01" class="custom-radio-outline-label">
                                                <span class="label">
                                                    <span class="icon"><i class="ri-secure-payment-fill"></i></span>
                                                    <span class="detail">
                                                        <span class="title">پرداخت اینترنتی</span>
                                                        <span class="subtitle">آنلاین با تمامی کارت‌های بانکی</span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <!-- end of custom-radio-outline -->
                                        <!-- start of custom-radio-outline -->
                                        <div class="custom-radio-outline">
                                            <input type="radio" class="custom-radio-outline-input" name="checkoutPayment"
                                                id="checkoutPayment02">
                                            <label for="checkoutPayment02" class="custom-radio-outline-label">
                                                <span class="label">
                                                    <span class="icon"><i class="ri-wallet-3-fill"></i></span>
                                                    <span class="detail">
                                                        <span class="title">پرداخت از طریق کیف پول</span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <!-- end of custom-radio-outline -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                                        <!-- start of box => coupon-gift -->
                            <div class="ui-box-title"> افزودن کد تخفیف </div>
                            <div class="ui-box-content">
                                <div class="coupon-gift--container">
                                    <!-- start of coupon -->
                                    <div class="coupon">
                                        <!-- start of coupon-form -->
                                        <form action="#" class="coupon-form">
                                            <!-- start of form-element -->
                                            <div class="form-element-row with-btn">
                                                <input type="text" class="form-control" placeholder="افزودن کد تخفیف">
                                                <button class="btn btn-primary">ثبت</button>
                                            </div>
                                            <!-- end of form-element -->
                                        </form>
                                        <!-- end of coupon-form -->
                                    </div>
                                    <!-- end of coupon -->
                                    <!-- start of divider -->
                                    {{-- <div class="divider-container">
                                        <span class="divider"></span>
                                    </div> --}}
                                    <!-- end of divider -->
                                </div>
                            </div>
                        <!-- end of box => coupon-gift -->
                            </div>
                        </div>
                        <!-- end of box => payment-methods -->
                        <a href='{{ route('shipping') }}' class="link border-bottom-0"><i class="ri-arrow-right-s-fill"></i> بازگشت به شیوه ی
                            ارسال</a>
                    </div>
                    @include('shop.cart.basket_cart', ['nextUrl' => route('event.home')])
                </div>
            </div>
        </main>
@stop

@section('footer')
    @parent
@stop

@section('extraJS')
    @parent
    <script src="{{ asset('theme-assets/js/theme.js') }}"></script>
    <script src="{{ asset('theme-assets/js/custom.js') }}"></script>
@stop
@extends('layouts.structure')
@section('content')
        <main class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8 mb-lg-0 mb-4">
                        <!-- start of box => user-address-selected -->
                        <div class="ui-box bg-white user-address-selected mb-5">
                            <div class="ui-box-title">آدرس تحویل سفارش</div>
                            <div class="ui-box-content">
                                <!-- start of user-addresses-container -->
                                <div class="user-addresses-container">
                                    <!-- start of user-address -->
                                    <div class="user-address">
                                        <div class="user-address-recipient mb-2">خراسان شمالی،بجنورد</div>
                                        <span class="d-block user-contact-items fa-num mb-3">
                                            <span class="user-contact-item">
                                                <i class="ri-user-line icon"></i>
                                                <span class="value">جلال بهرامی راد</span>
                                            </span>
                                        </span>
                                        <a href="#" class="link border-bottom-0 fs-7 fw-bold" data-btn-box
                                            data-parent=".user-address-selected"
                                            data-target="#change-user-address">تغییر یا ویرایش آدرس <i
                                                class="ri-arrow-left-s-fill"></i></a>
                                    </div>
                                    <!-- end of user-address -->
                                </div>
                                <!-- end of user-addresses-container -->
                            </div>
                        </div>
                        <!-- end of box => user-address-selected -->
                        <!-- start of box => user-addresses -->
                        <div class="ui-box bg-white user-addresses d-none mb-5" id="change-user-address">
                            <div class="ui-box-title">
                                آدرس تحویل سفارش را انتخاب نمایید:
                                <button class="ui-box-close" data-btn-box-close data-parent="#change-user-address"
                                    data-show=".user-address-selected"><i class="ri-close-line"></i></button>
                            </div>
                            <div class="ui-box-content">
                                <!-- start of nav-tabs -->
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link fs-6 fw-bold active" id="nav-1-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-1" type="button" role="tab" aria-controls="nav-1"
                                            aria-selected="true">
                                            آدرس های شما
                                        </button>
                                    </div>
                                </nav>
                                <!-- end of nav-tabs -->
                                <!-- start of tab-content -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- start of tab-pane -->
                                    <div class="tab-pane py-4 fade show active" id="nav-1" role="tabpanel"
                                        aria-labelledby="nav-1-tab">
                                        <!-- start of user-address-items -->
                                        <div class="user-address-items">
                                            <!-- start of user-address-item -->
                                            <div class="user-address-item">
                                                <div class="custom-radio-box">
                                                    <input type="radio" class="custom-radio-box-input"
                                                        name="userAddress" id="userAddress01" checked>
                                                    <label for="userAddress01" class="custom-radio-box-label"
                                                        data-placeholder="انتخاب به عنوان آدرس پیش فرض"
                                                        data-placeholder-checked="آدرس پیش فرض من است">
                                                        <span class="d-block user-address-recipient mb-2">خراسان
                                                            شمالی،بجنورد
                                                        </span>
                                                        <span class="d-block user-contact-items fa-num mb-3">
                                                            <span class="user-contact-item">
                                                                <i class="ri-mail-line icon"></i>
                                                                <span class="value">9999999999</span>
                                                            </span>
                                                            <span class="user-contact-item">
                                                                <i class="ri-phone-line icon"></i>
                                                                <span class="value">09xxxxxxxxx</span>
                                                            </span>
                                                            <span class="user-contact-item">
                                                                <i class="ri-user-line icon"></i>
                                                                <span class="value">جلال بهرامی راد</span>
                                                            </span>
                                                        </span>
                                                        <span class="d-flex align-items-center justify-content-end">
                                                            <a href="#" class="link border-bottom-0 fs-7 fw-bold"
                                                                data-remodal-target="remove-from-addresses-modal">حذف</a>
                                                            <span class="text-secondary mx-2">|</span>
                                                            <a href="#" class="link border-bottom-0 fs-7 fw-bold"
                                                                data-remodal-target="edit-address-modal">ویرایش</a>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- end of user-address-item -->
                                            <!-- start of user-add-address-btn-container -->
                                            <div class="user-address-item user-add-address-btn-container">
                                                <!-- <button class="user-add-address-btn"
                                                    data-remodal-target="add-address-modal-without-map">
                                                    <i class="ri-add-line icon"></i>
                                                    <span>آدرس جدید</span>
                                                </button> -->
                                                <!-- <button class="user-add-address-btn"
                                                    data-remodal-target="add-address-modal-without-fields">
                                                    <i class="ri-add-line icon"></i>
                                                    <span>آدرس جدید</span>
                                                </button> -->
                                                <button class="user-add-address-btn"
                                                    data-remodal-target="add-address-modal-fields-with-map">
                                                    <i class="ri-add-line icon"></i>
                                                    <span>آدرس جدید</span>
                                                </button>
                                            </div>
                                            <!-- end of user-add-address-btn-container -->
                                        </div>
                                        <!-- end of user-address-items -->
                                    </div>
                                    <!-- end of tab-pane -->
                                    <!-- start of tab-pane -->
                                    <div class="tab-pane py-4 fade" id="nav-2" role="tabpanel"
                                        aria-labelledby="nav-2-tab">
                                        <!-- start of user-address-items -->
                                        <div class="user-address-items">
                                            <!-- start of user-address-item -->
                                            <div class="user-address-item">
                                                <div class="custom-radio-box">
                                                    <input type="radio" class="custom-radio-box-input"
                                                        name="userAddress" id="userAddress04" checked>
                                                    <label for="userAddress04" class="custom-radio-box-label"
                                                        data-placeholder="انتخاب به عنوان آدرس پیش فرض"
                                                        data-placeholder-checked="آدرس پیش فرض من است">
                                                        <span class="d-block user-address-recipient mb-2">خراسان
                                                            شمالی،بجنورد
                                                        </span>
                                                        <span class="d-block user-contact-items fa-num mb-3">
                                                            <span class="user-contact-item">
                                                                <i class="ri-mail-line icon"></i>
                                                                <span class="value">9999999999</span>
                                                            </span>
                                                            <span class="user-contact-item">
                                                                <i class="ri-phone-line icon"></i>
                                                                <span class="value">09xxxxxxxxx</span>
                                                            </span>
                                                            <span class="user-contact-item">
                                                                <i class="ri-user-line icon"></i>
                                                                <span class="value">جلال بهرامی راد</span>
                                                            </span>
                                                        </span>
                                                        <span class="d-flex align-items-center justify-content-end">
                                                            <a href="#" class="link border-bottom-0 fs-7 fw-bold"
                                                                data-remodal-target="remove-from-addresses-modal">حذف</a>
                                                            <span class="text-secondary mx-2">|</span>
                                                            <a href="#" class="link border-bottom-0 fs-7 fw-bold"
                                                                data-remodal-target="edit-address-modal">ویرایش</a>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- end of user-address-item -->
                                            <!-- start of user-address-item -->
                                            <div class="user-address-item">
                                                <div class="custom-radio-box">
                                                    <input type="radio" class="custom-radio-box-input"
                                                        name="userAddress" id="userAddress05">
                                                    <label for="userAddress05" class="custom-radio-box-label"
                                                        data-placeholder="انتخاب به عنوان آدرس پیش فرض"
                                                        data-placeholder-checked="آدرس پیش فرض من است">
                                                        <span class="d-block user-address-recipient mb-2">خراسان
                                                            شمالی،بجنورد
                                                        </span>
                                                        <span class="d-block user-contact-items fa-num mb-3">
                                                            <span class="user-contact-item">
                                                                <i class="ri-mail-line icon"></i>
                                                                <span class="value">9999999999</span>
                                                            </span>
                                                            <span class="user-contact-item">
                                                                <i class="ri-phone-line icon"></i>
                                                                <span class="value">09xxxxxxxxx</span>
                                                            </span>
                                                            <span class="user-contact-item">
                                                                <i class="ri-user-line icon"></i>
                                                                <span class="value">جلال بهرامی راد</span>
                                                            </span>
                                                        </span>
                                                        <span class="d-flex align-items-center justify-content-end">
                                                            <a href="#" class="link border-bottom-0 fs-7 fw-bold"
                                                                data-remodal-target="remove-from-addresses-modal">حذف</a>
                                                            <span class="text-secondary mx-2">|</span>
                                                            <a href="#" class="link border-bottom-0 fs-7 fw-bold"
                                                                data-remodal-target="edit-address-modal">ویرایش</a>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- end of user-address-item -->
                                        </div>
                                        <!-- end of user-address-items -->
                                    </div>
                                    <!-- end of tab-pane -->
                                </div>
                                <!-- end of tab-content -->
                            </div>
                        </div>
                        <!-- end of box => user-addresses -->
                        <!-- start of box => shipment-type -->
                        <div class="ui-box bg-white shipment-type mb-3">
                            <div class="ui-box-title">شیوه و زمان ارسال</div>
                            <div class="ui-box-content">
                                <!-- start of tab-content -->
                                <div class="tab-content" id="shipping-type-tabContent">
                                    <!-- start of tab-pane -->
                                    <div class="tab-pane py-4 fade show active" id="shipping-type-1" role="tabpanel"
                                        aria-labelledby="shipping-type-1">
                                        <!-- start of checkout-pack -->
                                        <div class="checkout-pack">
                                            <div class="checkout-pack-content">
                                                <div class="d-flex align-items-center mb-4"><i
                                                        class="ri-time-line text-muted me-2"></i> انتخاب زمان ارسال
                                                </div>
                                                <!-- Slider main container -->
                                                <div class="swiper checkout-time-swiper-slider mb-5">
                                                    <!-- Additional required wrapper -->
                                                    <div class="swiper-wrapper">
                                                        <!-- Slides -->
                                                        <div class="swiper-slide">
                                                            <div class="checkout-time fa-num">
                                                                <div class="checkout-time-label">پنج شنبه</div>
                                                                <div class="checkout-time-date">30 دی</div>
                                                                <div class="custom-radio-btn">
                                                                    <input type="radio" class="custom-radio-btn-input"
                                                                        name="checkoutTime" id="checkoutTime02">
                                                                    <label for="checkoutTime02"
                                                                        class="custom-radio-btn-label">
                                                                        <span class="label">
                                                                            بازه 10 تا 23
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="checkout-time fa-num">
                                                                <div class="checkout-time-label text-danger">جمعه</div>
                                                                <div class="checkout-time-date">1 بهمن</div>
                                                                <div class="custom-radio-btn">
                                                                    <input type="radio" class="custom-radio-btn-input"
                                                                        name="checkoutTime" id="checkoutTime03">
                                                                    <label for="checkoutTime03"
                                                                        class="custom-radio-btn-label">
                                                                        <span class="label">
                                                                            بازه 10 تا 23
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="checkout-time fa-num">
                                                                <div class="checkout-time-label">شنبه</div>
                                                                <div class="checkout-time-date">2 بهمن</div>
                                                                <div class="custom-radio-btn">
                                                                    <input type="radio" class="custom-radio-btn-input"
                                                                        name="checkoutTime" id="checkoutTime04">
                                                                    <label for="checkoutTime04"
                                                                        class="custom-radio-btn-label">
                                                                        <span class="label">
                                                                            بازه 10 تا 23
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- If we need navigation buttons -->
                                                    <div class="swiper-button-prev"></div>
                                                    <div class="swiper-button-next"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end of checkout-pack -->
                                    </div>
                                    <!-- end of tab-pane -->
                                </div>
                                <!-- end of tab-content -->
                            </div>
                        </div>
                        <!-- end of box => shipment-type -->
                        <a href='{{ route('cart') }}' class="link border-bottom-0"><i class="ri-arrow-right-s-fill"></i> بازگشت به سبد
                            خرید</a>
                    </div>
                    @include('shop.cart.basket_cart', ['nextUrl' => route('payment')])
                </div>
            </div>
            <!-- start of remove-from-addresses-modal -->
            <div class="remodal remodal-xs" data-remodal-id="remove-from-addresses-modal"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <div class="remodal-content">
                    <div class="text-muted fs-7 fw-bold mb-3">
                        آیا مطمئنید که این آدرس حذف شود؟
                    </div>
                </div>
                <div class="remodal-footer">
                    <button data-remodal-action="cancel" class="btn btn-sm btn-outline-light px-3 me-2">خیر</button>
                    <button class="btn btn-sm btn-primary px-3">بله</button>
                </div>
            </div>
            <!-- end of remove-from-addresses-modal -->
            <!-- start of add-address-modal-fields-with-map -->
            <div class="remodal remodal-lg" data-remodal-id="add-address-modal-fields-with-map"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <button data-remodal-action="close" class="remodal-close"></button>
                    <div class="remodal-title">افزودن آدرس جدید</div>
                </div>
                <div class="remodal-content">
                    <div class="row">
                        <div class="col-md-8 mb-md-0 mb-4">
                            <!-- start of add-address-form -->
                            <form action="#" class="add-address-form">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <!-- start of form-element -->
                                        <div class="form-element-row">
                                            <label class="label fs-7">نام گیرنده</label>
                                            <input type="text" class="form-control" placeholder="نام">
                                        </div>
                                        <!-- end of form-element -->
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <!-- start of form-element -->
                                        <div class="form-element-row">
                                            <label class="label fs-7">نام خانوادگی گیرنده</label>
                                            <input type="text" class="form-control" placeholder="نام خانوادگی">
                                        </div>
                                        <!-- end of form-element -->
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <!-- start of form-element -->
                                        <div class="form-element-row">
                                            <label class="label fs-7">استان</label>
                                            <select class="select2" name="state02" id="state02">
                                                <option value="0">انتخاب کنید</option>
                                                <option value="0">خراسان شمالی</option>
                                            </select>
                                        </div>
                                        <!-- end of form-element -->
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <!-- start of form-element -->
                                        <div class="form-element-row">
                                            <label class="label fs-7">شهر</label>
                                            <select class="select2" name="city02" id="city02">
                                                <option value="0">انتخاب کنید</option>
                                                <option value="0">بجنورد</option>
                                            </select>
                                        </div>
                                        <!-- end of form-element -->
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <!-- start of form-element -->
                                        <div class="form-element-row">
                                            <label class="label fs-7">شماره موبایل</label>
                                            <input type="text" class="form-control" placeholder="مثال: ۰۹۱۲۳۴۵۶۷۸۹">
                                        </div>
                                        <!-- end of form-element -->
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <!-- start of form-element -->
                                        <div class="form-element-row">
                                            <label class="label fs-7">کدپستی</label>
                                            <input type="text" class="form-control"
                                                placeholder="کدپستی باید ۱۰ رقم و بدون خط تیره باشد">
                                        </div>
                                        <!-- end of form-element -->
                                    </div>
                                    <div class="col-12 mb-3">
                                        <!-- start of form-element -->
                                        <div class="form-element-row">
                                            <label class="label fs-7">آدرس</label>
                                            <textarea rows="5" class="form-control" placeholder="آدرس کامل"></textarea>
                                        </div>
                                        <!-- end of form-element -->
                                    </div>
                                </div>
                            </form>
                            <!-- end of add-address-form -->
                        </div>
                        <div class="col-md-4">
                            <div class="map-container bg-light my-3">
                                <!-- map -->
                                <div class="hoverBoxShadow backgroundColorBlue textColor w-100 h-100 d-flex justify-content-center align-items-center colorWhite">نقشه</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="remodal-footer">
                    <button data-remodal-action="cancel" class="btn btn-sm btn-outline-light px-3 me-2">بستن</button>
                    <button data-remodal-action="confirm" class="btn btn-sm btn-primary px-3">ثبت</button>
                </div>
            </div>
            <!-- end of add-address-modal-fields-with-map -->
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
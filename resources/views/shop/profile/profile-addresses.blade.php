
@extends('layouts.structure')
@section('content')
        <main class="page-content">
            <div class="container">
                <div class="row mb-5">
                    @include('shop.profile.layouts.profile_menu')     
                                        <div class="col-xl-9 col-lg-8 col-md-7">
                        <div class="ui-box bg-white mb-5">
                            <div class="ui-box-title">آدرس ها</div>
                            <div class="ui-box-content">
                                <!-- start of user-address-items -->
                                <div class="user-address-items">
                                    <!-- start of user-address-item -->
                                    <div class="user-address-item">
                                        <div class="custom-radio-box">
                                            <input type="radio" class="custom-radio-box-input" name="userAddress"
                                                id="userAddress01" checked>
                                            <label for="userAddress01" class="custom-radio-box-label"
                                                data-placeholder="انتخاب به عنوان آدرس پیش فرض"
                                                data-placeholder-checked="آدرس پیش فرض من است">
                                                <span class="d-block user-address-recipient mb-2">خراسان شمالی،بجنورد
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
                                            <input type="radio" class="custom-radio-box-input" name="userAddress"
                                                id="userAddress02">
                                            <label for="userAddress02" class="custom-radio-box-label"
                                                data-placeholder="انتخاب به عنوان آدرس پیش فرض"
                                                data-placeholder-checked="آدرس پیش فرض من است">
                                                <span class="d-block user-address-recipient mb-2">خراسان شمالی،بجنورد
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
                                            <input type="radio" class="custom-radio-box-input" name="userAddress"
                                                id="userAddress03">
                                            <label for="userAddress03" class="custom-radio-box-label"
                                                data-placeholder="انتخاب به عنوان آدرس پیش فرض"
                                                data-placeholder-checked="آدرس پیش فرض من است">
                                                <span class="d-block user-address-recipient mb-2">خراسان شمالی،بجنورد
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
            <!-- start of add-address-modal-without-map -->
            <div class="remodal remodal-sm" data-remodal-id="add-address-modal-without-map"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <button data-remodal-action="close" class="remodal-close"></button>
                    <div class="remodal-title">افزودن آدرس جدید</div>
                </div>
                <div class="remodal-content">
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
                                    <select class="select2" name="state01" id="state01">
                                        <option value="0">انتخاب کنید</option>
                                        <option value="0">خراسان شمالی</option>
                                        <option value="0">خراسان رضوی</option>
                                        <option value="0">تهران</option>
                                        <option value="0">شیراز</option>
                                        <option value="0">اصفهان</option>
                                        <option value="0">تبریز</option>
                                        <option value="0">مازندران</option>
                                    </select>
                                </div>
                                <!-- end of form-element -->
                            </div>
                            <div class="col-lg-6 mb-3">
                                <!-- start of form-element -->
                                <div class="form-element-row">
                                    <label class="label fs-7">شهر</label>
                                    <select class="select2" name="city01" id="city01">
                                        <option value="0">انتخاب کنید</option>
                                        <option value="0">بجنورد</option>
                                        <option value="0">شیروان</option>
                                        <option value="0">اسفراین</option>
                                        <option value="0">فاروج</option>
                                        <option value="0">گرمه</option>
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
                <div class="remodal-footer">
                    <button data-remodal-action="cancel" class="btn btn-sm btn-outline-light px-3 me-2">بستن</button>
                    <button data-remodal-action="confirm" class="btn btn-sm btn-primary px-3">ثبت</button>
                </div>
            </div>
            <!-- end of add-address-modal-without-map -->
            <!-- start of add-address-modal-without-fields -->
            <div class="remodal remodal-sm" data-remodal-id="add-address-modal-without-fields"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <button data-remodal-action="close" class="remodal-close"></button>
                    <div class="remodal-title">افزودن آدرس جدید</div>
                </div>
                <div class="remodal-content">
                    <!-- start of search -->
                    <div class="search-container w-full">
                        <!-- start of search-form -->
                        <form action="#" class="search-form">
                            <input type="text" class="form-control search-field" placeholder="جستجو کنید..">
                            <button class="btn btn-primary btn-search btn-action">
                                <i class="ri-search-2-line"></i>
                            </button>
                            <button class="btn btn-primary btn-close-search-result btn-action d-none">
                                <i class="ri-close-line"></i>
                            </button>
                        </form>
                        <!-- end of search-form -->
                        <!-- start of search-result -->
                        <div class="search-result-container">
                            <div class="search-result-tags-container">
                                <div class="search-result-tags-label"><i class="ri-fire-line"></i> بیشترین جستجوهای اخیر
                                </div>
                                <ul class="search-result-tags">
                                    <li><a href="#" class="search-result-tag">گوشی موبایل</a></li>
                                    <li><a href="#" class="search-result-tag">لوازم خانگی برقی</a></li>
                                    <li><a href="#" class="search-result-tag">لپ تاپ</a></li>
                                    <li><a href="#" class="search-result-tag">کنسول بازی</a></li>
                                    <li><a href="#" class="search-result-tag">دوچرخه</a></li>
                                </ul>
                            </div>
                            <div class="border-bottom my-3"></div>
                            <ul class="search-result-items">
                                <li><a href="#">گوشی موبایل</a></li>
                                <li><a href="#">گوشی موبایل شیائومی</a></li>
                                <li><a href="#">گوشی موبایل سامسونگ</a></li>
                                <li><a href="#">قاب گوشی موبایل</a></li>
                                <li><a href="#">گوشی موبایل اپل</a></li>
                            </ul>
                        </div>
                        <!-- end of search-result -->
                    </div>
                    <!-- end of search -->
                    <div class="map-container bg-light my-3">
                        <!-- map -->
                    </div>
                </div>
                <div class="remodal-footer">
                    <button data-remodal-action="cancel" class="btn btn-sm btn-outline-light px-3 me-2">بستن</button>
                    <button data-remodal-action="confirm" class="btn btn-sm btn-primary px-3">ثبت</button>
                </div>
            </div>
            <!-- end of add-address-modal-without-fields -->
            <!-- start of add-address-modal-fields-with-map -->
            <div class="remodal remodal-lg" data-remodal-id="add-address-modal-fields-with-map"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <button data-remodal-action="close" class="remodal-close"></button>
                    <div class="remodal-title">افزودن آدرس جدید</div>
                </div>
                <div class="remodal-content">
                    <div class="row">
                        <div class="col-md-6 mb-md-0 mb-4">
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
                                            {{-- onchange="getCities($(this).val())" --}}
                                            <select class="select2" name="state02" id="state02">
                                                <option value="0">انتخاب کنید</option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- end of form-element -->
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <!-- start of form-element -->
                                        <div class="form-element-row">
                                            <label class="label fs-7">شهر</label>
                                            <select onchange="submitAjax($(this).val())" class="select2" name="city02" id="city02">
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
                        <div class="col-md-6">
                            <!-- start of search -->
                            <div class="search-container w-full">
                                <!-- start of search-form -->
                                <form action="#" class="search-form">
                                    <input type="text" class="form-control search-field" placeholder="جستجو کنید..">
                                    <button class="btn btn-primary btn-search btn-action">
                                        <i class="ri-search-2-line"></i>
                                    </button>
                                    <button class="btn btn-primary btn-close-search-result btn-action d-none">
                                        <i class="ri-close-line"></i>
                                    </button>
                                </form>
                                <!-- end of search-form -->
                                <!-- start of search-result -->
                                <div class="search-result-container">
                                    <div class="search-result-tags-container">
                                        <div class="search-result-tags-label"><i class="ri-fire-line"></i> بیشترین
                                            جستجوهای اخیر
                                        </div>
                                        <ul class="search-result-tags">
                                            <li><a href="#" class="search-result-tag">گوشی موبایل</a></li>
                                            <li><a href="#" class="search-result-tag">لوازم خانگی برقی</a></li>
                                            <li><a href="#" class="search-result-tag">لپ تاپ</a></li>
                                            <li><a href="#" class="search-result-tag">کنسول بازی</a></li>
                                            <li><a href="#" class="search-result-tag">دوچرخه</a></li>
                                        </ul>
                                    </div>
                                    <div class="border-bottom my-3"></div>
                                    <ul class="search-result-items">
                                        <li><a href="#">گوشی موبایل</a></li>
                                        <li><a href="#">گوشی موبایل شیائومی</a></li>
                                        <li><a href="#">گوشی موبایل سامسونگ</a></li>
                                        <li><a href="#">قاب گوشی موبایل</a></li>
                                        <li><a href="#">گوشی موبایل اپل</a></li>
                                    </ul>
                                </div>
                                <!-- end of search-result -->
                            </div>
                            <!-- end of search -->
                            <div class="map-container bg-light my-3">
                                <!-- map -->
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
            <!-- start of edit-address-modal -->
            <div class="remodal remodal-lg" data-remodal-id="edit-address-modal"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <button data-remodal-action="close" class="remodal-close"></button>
                    <div class="remodal-title">ویرایش آدرس</div>
                </div>
                <div class="remodal-content">
                    <div class="row">
                        <div class="col-md-6 mb-md-0 mb-4">
                            <!-- start of add-address-form -->
                            <form action="#" class="add-address-form">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <!-- start of form-element -->
                                        <div class="form-element-row">
                                            <label class="label fs-7">نام گیرنده</label>
                                            <input type="text" class="form-control" placeholder="نام" value="جلال">
                                        </div>
                                        <!-- end of form-element -->
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <!-- start of form-element -->
                                        <div class="form-element-row">
                                            <label class="label fs-7">نام خانوادگی گیرنده</label>
                                            <input type="text" class="form-control" placeholder="نام خانوادگی"
                                                value="بهرامی راد">
                                        </div>
                                        <!-- end of form-element -->
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <!-- start of form-element -->
                                        <div class="form-element-row">
                                            <label class="label fs-7">استان</label>
                                            <select class="select2" name="state03" id="state03">
                                                <option value="0">انتخاب کنید</option>
                                                <option value="0" selected>خراسان شمالی</option>
                                                <option value="0">خراسان رضوی</option>
                                                <option value="0">تهران</option>
                                                <option value="0">شیراز</option>
                                                <option value="0">اصفهان</option>
                                                <option value="0">تبریز</option>
                                                <option value="0">مازندران</option>
                                            </select>
                                        </div>
                                        <!-- end of form-element -->
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <!-- start of form-element -->
                                        <div class="form-element-row">
                                            <label class="label fs-7">شهر</label>
                                            <select class="select2" name="city03" id="city03">
                                                <option value="0">انتخاب کنید</option>
                                                <option value="0" selected>بجنورد</option>
                                                <option value="0">شیروان</option>
                                                <option value="0">اسفراین</option>
                                                <option value="0">فاروج</option>
                                                <option value="0">گرمه</option>
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
                                                placeholder="کدپستی باید ۱۰ رقم و بدون خط تیره باشد" value="1234567890">
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
                        <div class="col-md-6">
                            <!-- start of search -->
                            <div class="search-container w-full">
                                <!-- start of search-form -->
                                <form action="#" class="search-form">
                                    <input type="text" class="form-control search-field" placeholder="جستجو کنید..">
                                    <button class="btn btn-primary btn-search btn-action">
                                        <i class="ri-search-2-line"></i>
                                    </button>
                                    <button class="btn btn-primary btn-close-search-result btn-action d-none">
                                        <i class="ri-close-line"></i>
                                    </button>
                                </form>
                                <!-- end of search-form -->
                                <!-- start of search-result -->
                                <div class="search-result-container">
                                    <div class="search-result-tags-container">
                                        <div class="search-result-tags-label"><i class="ri-fire-line"></i> بیشترین
                                            جستجوهای اخیر
                                        </div>
                                        <ul class="search-result-tags">
                                            <li><a href="#" class="search-result-tag">گوشی موبایل</a></li>
                                            <li><a href="#" class="search-result-tag">لوازم خانگی برقی</a></li>
                                            <li><a href="#" class="search-result-tag">لپ تاپ</a></li>
                                            <li><a href="#" class="search-result-tag">کنسول بازی</a></li>
                                            <li><a href="#" class="search-result-tag">دوچرخه</a></li>
                                        </ul>
                                    </div>
                                    <div class="border-bottom my-3"></div>
                                    <ul class="search-result-items">
                                        <li><a href="#">گوشی موبایل</a></li>
                                        <li><a href="#">گوشی موبایل شیائومی</a></li>
                                        <li><a href="#">گوشی موبایل سامسونگ</a></li>
                                        <li><a href="#">قاب گوشی موبایل</a></li>
                                        <li><a href="#">گوشی موبایل اپل</a></li>
                                    </ul>
                                </div>
                                <!-- end of search-result -->
                            </div>
                            <!-- end of search -->
                            <div class="map-container bg-light my-3">
                                <!-- map -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="remodal-footer">
                    <button data-remodal-action="cancel" class="btn btn-sm btn-outline-light px-3 me-2">بستن</button>
                    <button data-remodal-action="confirm" class="btn btn-sm btn-primary px-3">ثبت</button>
                </div>
            </div>
            <!-- end of edit-address-modal -->              
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

    <script>

        //Edit route: route('address.update') + "/" + addressId
        //delete route: route('address.destroy') + "/" + addressId
        // notice: delete route ajax type should be delete

        function getCities(stateId) {

            if(stateId == 0) {
                $("#city02").empty();
                return;
            }

            $.ajax({
                type: 'get',
                url: '{{ route('api.cities') }}',
                data: {
                    state_id: stateId
                },
                success: function(res) {

                    if(res.status !== 'ok') {
                        $("#city02").empty();
                        return;
                    }

                    let html = '<option value="0">انتخاب کنید</option>';
                    res.data.forEach(elem => {
                        html += '<option value="' + elem.id + '">' + elem.name + '</option>';
                    });
                    
                    $("#city02").empty().append(html);
                }
            })

        }

        $(document).ready(function() {
            $.ajax({
                type: 'get',
                url: '{{ route('address.index') }}',
                headers: {
                    'accept': 'application/json'
                },
                success: function(res) {
                    console.log(res);
                }
            });
        });

        function submitAjax(cityId) {
            
            $.ajax({
                type: 'post',
                url: '{{ route('address.store') }}',
                data: {
                    x: 23.3,
                    y: 43.44,
                    name: 'خانه',
                    postal_code: '1971932997',
                    address: 'asdqwdqw',
                    recv_name: 'asdwq',
                    recv_last_name: 'sadwqeq',
                    recv_phone: '09213234323',
                    city_id: cityId,
                },
                success: function(res) {
                    console.log(res);
                }
            });
        }

    </script>

@stop

@extends('layouts.structure')
@section('content')
            <main class="page-content">
            <div class="container">
                <!-- start of box => contact-us -->
                <div class="ui-box bg-white">
                    <div class="ui-box-title fs-5 fw-bold">تماس با ما</div>
                    <div class="ui-box-subtitle flex-wrap">
                        لطفاً پیش از ارسال ایمیل یا تماس تلفنی، ابتدا <a href="#" class="link mx-2">پرسش های متداول</a>
                        را
                        مشاهده کنید.
                    </div>
                    <div class="ui-box-content">
                        <div class="fs-7 text-secondary mb-5">برای پیگیری یا سوال درباره سفارش و ارسال پیام بهتر است از
                            فرم
                            زیر استفاده کنید.</div>
                        <!-- start of contact-us-form -->
                        <form action="#" class="contact-us-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- start of form-element -->
                                    <div class="form-element-row mb-5">
                                        <label class="label">موضوع</label>
                                        <select class="select2" name="subject" id="subject">
                                            <option value="0">انتخاب موضوع</option>
                                            <option value="0">پیشنهاد</option>
                                            <option value="0">انتقاد یا شکایت</option>
                                            <option value="0">پیگیری سفارش</option>
                                            <option value="0">خدمات پس از فروش</option>
                                            <option value="0">استعلام گارانتی</option>
                                            <option value="0">مدیریت</option>
                                            <option value="0">حسابداری و امور مالی</option>
                                            <option value="0">سایر موضوعات</option>
                                        </select>
                                    </div>
                                    <!-- end of form-element -->
                                </div>
                                <div class="col-md-6">
                                    <!-- start of form-element -->
                                    <div class="form-element-row mb-5">
                                        <label class="label">نام و نام خانوادگی</label>
                                        <input type="text" class="form-control" placeholder="نام کامل">
                                    </div>
                                    <!-- end of form-element -->
                                </div>
                                <div class="col-md-6">
                                    <!-- start of form-element -->
                                    <div class="form-element-row mb-5">
                                        <label class="label">ایمیل</label>
                                        <input type="text" class="form-control" placeholder="example@example.com">
                                    </div>
                                    <!-- end of form-element -->
                                </div>
                                <div class="col-md-6">
                                    <!-- start of form-element -->
                                    <div class="form-element-row mb-5">
                                        <label class="label">تلفن تماس</label>
                                        <input type="text" class="form-control" placeholder="09xxxxxxxxx">
                                    </div>
                                    <!-- end of form-element -->
                                </div>
                                <div class="col-12">
                                    <!-- start of form-element -->
                                    <div class="form-element-row mb-5">
                                        <label class="label">پیام</label>
                                        <textarea rows="5" class="form-control" placeholder="متن پیام"></textarea>
                                    </div>
                                    <!-- end of form-element -->
                                </div>
                                <div class="col-12">
                                    <!-- start of form-element -->
                                    <div class="form-element-row form-element-row-file mb-5">
                                        <div class="text-center">
                                            <div class="fs-6 fw-bold text-dark">عکس یا ویدیو خود را بارگذاری کنید.</div>
                                            <div class="fs-7 fw-bold text-muted mb-4">( حداکثر ۵ تصویر jpeg یا PNG
                                                حداکثر یک
                                                مگابایت، یک ویدیو MP4 حداکثر ۵۰ مگابایت )</div>
                                        </div>
                                        <div class="custom-input-file">
                                            <input type="file" class="custom-input-file-input" name="attachment"
                                                id="attachment">
                                            <label for="attachment" class="custom-input-file-label">
                                                <span class="label">
                                                    <i class="ri-arrow-up-fill me-1"></i> انتخاب عکس یا ویدئو
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- end of form-element -->
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-primary px-4">ثبت و ارسال</button>
                                </div>
                            </div>
                        </form>
                        <!-- end of contact-us-form -->
                    </div>
                </div>
                <!-- end of box => contact-us -->
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
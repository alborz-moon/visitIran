
@extends('layouts.structure')
@section('content')
        <main class="page-content">
            <div class="container">
                <div class="row mb-5">
                    @include('shop.profile.layouts.profile_menu')
                                        <div class="col-xl-9 col-lg-8 col-md-7">
                        <div class="ui-box bg-white mb-5">
                            <div class="ui-box-title">ایجاد تیکت جدید</div>
                            <div class="ui-box-subtitle">فرم زیر را پر کنید (توضیحات کامل تر روند پاسخ دهی را کوتاه تر
                                می
                                کند.)</div>
                            <div class="ui-box-content">
                                <!-- start of add-ticket-form -->
                                <form action="#" class="add-ticket-form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- start of form-element -->
                                            <div class="form-element-row mb-5">
                                                <label class="label">موضوع</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                            <!-- end of form-element -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- start of form-element -->
                                            <div class="form-element-row mb-5">
                                                <label class="label">بخش</label>
                                                <select class="select2" name="department" id="department">
                                                    <option value="0">-</option>
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
                                                <label class="label">اولویت</label>
                                                <select class="select2" name="priority" id="priority">
                                                    <option value="0">انتخاب کنید</option>
                                                    <option value="0">عادی</option>
                                                    <option value="0">مهم</option>
                                                    <option value="0">خیلی مهم</option>
                                                </select>
                                            </div>
                                            <!-- end of form-element -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- start of form-element -->
                                            <div class="form-element-row mb-5">
                                                <label class="label">پیام</label>
                                                <textarea rows="5" class="form-control"
                                                    placeholder="متن پیام"></textarea>
                                            </div>
                                            <!-- end of form-element -->
                                        </div>
                                        <div class="col-12">
                                            <!-- start of form-element -->
                                            <div class="form-element-row form-element-row-file mb-5">
                                                <div class="text-center">
                                                    <div class="fs-6 fw-bold text-dark">عکس یا ویدیو خود را بارگذاری
                                                        کنید.</div>
                                                    <div class="fs-7 fw-bold text-muted mb-4">( حداکثر ۵ تصویر jpeg یا
                                                        PNG
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
                                            <button type="submit" class="btn btn-primary px-4">ثبت و ارسال <i
                                                    class="ri-ball-pen-line ms-2"></i></button>
                                        </div>
                                    </div>
                                </form>
                                <!-- end of add-ticket-form -->
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
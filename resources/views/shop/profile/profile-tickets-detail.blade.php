
@extends('layouts.structure')
@section('content')
        <main class="page-content">
            <div class="container">
                <div class="row mb-5">
                    @include('shop.profile.layouts.profile_menu')
                                        <div class="col-xl-9 col-lg-8 col-md-7">
                        <div class="ui-box bg-white mb-5">
                            <div class="ui-box-title">
                                کالای غیراصل
                            </div>
                            <div class="ui-box-content">
                                <!-- start of tickets -->
                                <div class="tickets">
                                    <!-- start of ticket -->
                                    <div class="ticket fa-num">
                                        <div class="avatar"></div>
                                        <div class="text">
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از
                                            طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                                            لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف
                                            بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و
                                            آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت
                                            بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در
                                            زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود
                                            در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل
                                            حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی
                                            اساسا مورد استفاده قرار گیرد.
                                        </div>
                                        <div class="date">25 دی 1400</div>
                                    </div>
                                    <!-- end of ticket -->
                                    <!-- start of ticket -->
                                    <div class="ticket reply fa-num">
                                        <div class="avatar staff"></div>
                                        <div class="text">
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                            طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                                            لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود
                                            ابزارهای کاربردی می باشد.
                                        </div>
                                        <div class="date">26 دی 1400</div>
                                    </div>
                                    <!-- end of ticket -->
                                </div>
                                <!-- end of tickets -->
                                <div class="border-bottom my-4"></div>
                                <div class="ui-box-title p-0 mb-4">
                                    ارسال پاسخ
                                </div>
                                <!-- start of add-ticket-form -->
                                <form action="#" class="add-ticket-form">
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
                                            <button type="submit" class="btn btn-primary">ارسال پاسخ <i
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
    <script src="{{ asset('theme-assets/js/theme.js') }}"></script>
    <script src="{{ asset('theme-assets/js/custom.js') }}"></script>
@stop
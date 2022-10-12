@extends('layouts.structure')

@section('seo')
    <title>غذاهای محلی یا جاهای دیدنی کیش | تونل باد میکامال</title>
    <meta property="og:title" content="غذاهای محلی یا جاهای دیدنی کیش | تونل باد میکامال" />
    <meta name="twitter:title" content="غذاهای محلی یا جاهای دیدنی کیش | تونل باد میکامال" />
    <meta property="og:site_name" content="غذاهای محلی یا جاهای دیدنی کیش | تونل باد میکامال" />

    
        <meta property="og:image" content="https://micamall.com/storage/post-pic/images/UxiMI3IXfTQBMO0p4H4MrXMLkmYwTTzVJ1O8QTPQ.jpg"/>
        <meta property="og:image:secure_url" content="https://micamall.com/storage/post-pic/images/UxiMI3IXfTQBMO0p4H4MrXMLkmYwTTzVJ1O8QTPQ.jpg"/>
        <meta name="twitter:image" content="https://micamall.com/storage/post-pic/images/UxiMI3IXfTQBMO0p4H4MrXMLkmYwTTzVJ1O8QTPQ.jpg"/>

    
    

    <meta property="og:description" content="جاهای دیدنی کیش و غذاهای این جزیره از جمله جاذبه های گردشگری کیش هستند که مثل تونل باد میکامال می‌تواند تجربه لذت‌بخشی به شما هدیه دهد." />
    <meta name="twitter:description" content="جاهای دیدنی کیش و غذاهای این جزیره از جمله جاذبه های گردشگری کیش هستند که مثل تونل باد میکامال می‌تواند تجربه لذت‌بخشی به شما هدیه دهد." />
    <meta name="description" content="جاهای دیدنی کیش و غذاهای این جزیره از جمله جاذبه های گردشگری کیش هستند که مثل تونل باد میکامال می‌تواند تجربه لذت‌بخشی به شما هدیه دهد."/>

    {{-- <meta name="keywords" content="{{ $product['keywords'] }}" /> --}}
    <meta property="article:tag" content="تونل باد, جاهای دیدنی کیش، غذاهای کیش"/>
@stop

@section('content')
<div class="container">
        <main class="page-content TopParentBannerMoveOnTop">
            <div class="container">
                <!-- start of product-detail-container -->
                <!-- start of breadcrumb -->
                <div class="product-detail-container mb-3">
                <nav aria-label="breadcrumb" style="display: flex;justify-content:space-between;">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item"><a href="#">منسوجات </a></li>
                        <li class="breadcrumb-item"><a href="#">فرش</a></li>
                    </ol>
                <span>
                    <button class="ri-stackshare-line fontSize30 b-0 colorWhiteGray btnHover"></button>
                    <button class="ri-bookmark-line fontSize30 b-0 colorWhiteGray btnHover"></button>
                    <button class="ri-bookmark-fill fontSize30 b-0 colorWhiteGray btnHover"></button>
                </span>
                </nav>
                <!-- end of breadcrumb -->
                    <div class="row">
                        <div class="col-lg-4 col-md-5 mb-md-0 mb-4">
                            <div class="ui-sticky ui-sticky-top">
                                <!-- start of product-gallery -->
                                <div class="product-gallery">
                                    
                                    <div class="gallery-img-container">
                                        <div class="gallery-img" id="galleryMain">
                                            <img src="{{ $product['img'] }}" alt="{{ $product['alt'] }}" />
                                        </div>
                                        <div class="gallery-thumbs">
                                            <ul id="gallery">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of product-gallery -->
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-4 col-md-7 mb-lg-0 mb-4">
                            <!-- start of product-detail -->
                            <h2 id="productTitle" class="product-title">{{ $product['name'] }}</h2>
                            <div class="product-user-meta fa-num mb-4 spaceBetween">
                                <span class="product-users-rating">
                                    <i class="ri-star-fill icon me-1"></i>
                                    <span class="fw-bold me-1">4.4</span>
                                    <span class="text-muted fs-7">(742)</span>
                                </span>
                                <a href="#" class="link border-bottom-0 fs-7">۶۳۷ دیدگاه کاربران</a>
                            </div>
                            <div class="product-variant-selected-label bold mb-3">سازنده</div>
                            <div class="mb-3">سنگ تراشان برادران احتشام</div>
                            <div class="product-variants-container mb-3">
                                <div class="product-variant-selected-container spaceBetween">
                                    <span class="product-variant-selected-label">رنگ:</span>
                                    <span class="product-variant-selected">آبی</span>
                                </div>
                                <div class="product-variants">
                                    <div class="product-variant-item">
                                        <div class="custom-radio-circle">
                                            <input type="radio" class="custom-radio-circle-input" name="productColor"
                                                id="productColor01" checked>
                                            <label for="productColor01" class="custom-radio-circle-label"
                                                data-variant-label="آبی">
                                                <span class="color" style="background-color: #2196f3;"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="آبی"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="product-variant-item">
                                        <div class="custom-radio-circle">
                                            <input type="radio" class="custom-radio-circle-input" name="productColor"
                                                id="productColor02">
                                            <label for="productColor02" class="custom-radio-circle-label"
                                                data-variant-label="سفید">
                                                <span class="color" style="background-color: #fff;"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="سفید"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="product-variant-item">
                                        <div class="custom-radio-circle">
                                            <input type="radio" class="custom-radio-circle-input" name="productColor"
                                                id="productColor03">
                                            <label for="productColor03" class="custom-radio-circle-label"
                                                data-variant-label="صورتی">
                                                <span class="color" style="background-color: #ff80ab;"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="صورتی"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 spaceBetween">
                                <div class="bold">سایز</div>
                                <div>30*20*40cm</div>
                            </div>
                            <div class="mb-3 spaceBetween">
                                <div class="bold">ویژگی‌ها</div>
                            </div>
                            <div class="expandable-text mb-3" style="height: 95px;">
                                <div class="expandable-text_text">
                                    <div class="product-params">
                                        <ul id="property">
                                        </ul>
                                    </div>
                                </div>
                            <div class="mb-3 mt-3 spaceBetween">
                                <div class="bold">توضیحات</div>
                            </div>
                            {{-- <p>{{ $product['img'] }}</p> --}}
                            <div class="product-additional-info-container mb-3">
                                <span class="icon">
                                    <i class="ri-information-line"></i>
                                </span>
                                <div class="product-additional-info">
                                    <p>هشدار سامانه همتا: در صورت انجام معامله، از فروشنده کد فعالسازی را
                                        گرفته
                                        و حتما در حضور ایشان، دستگاه را از طریق #7777*، برای سیمکارت خود
                                        فعالسازی نمایید. آموزش تصویری در آدرس اینترنتی hmti.ir/06</p>
                                    <p>امکان برگشت کالا در گروه موبایل با دلیل "انصراف از خرید" تنها در
                                        صورتی
                                        مورد قبول است که پلمپ کالا باز نشده باشد.</p>
                                </div>
                            </div>
                                <div class="expandable-text-expand-btn">
                                    <span class="show-more">
                                        بیشتر بخوانید <i class="ri-arrow-down-s-line"></i>
                                    </span>
                                    <span class="show-less d-none">
                                        بستن <i class="ri-arrow-up-s-line"></i>
                                    </span>
                                </div>
                            </div>
                            <!-- end of product-detail -->
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <!-- start of product-seller-info -->
                            <div class="product-seller-info ui-box">
                                <div class="seller-info-changeable">
                                    <div class="product-seller-row">
                                        <div class="product-seller-row-icon marginTop10">
                                            <i class="icon-visit-store colorYellow  productIcon"></i>
                                        </div>
                                        <div class="product-seller-row-detail">
                                            <div class="product-seller-row-detail-title">سنگ تراشان برادران احتشام</div>
                                        </div>
                                    </div>
                                    <div class="product-seller-row">
                                        <div class="product-seller-row-icon marginTop10">
                                            <i class="icon-visit-verified colorYellow  productIcon"></i>
                                        </div>
                                        <div class="product-seller-row-detail">
                                            <div class="product-seller-row-detail-title">گارانتی ۱۸ ماهه</div>
                                        </div>
                                    </div>
                                    <div class="product-seller-row product-seller-row--clickable">
                                        <div class="product-seller-row-icon marginTop10">
                                            <i class="icon-visit-original colorYellow  productIcon"></i>
                                        </div>
                                        <div class="product-seller-row-detail">
                                            <div class="product-seller-row-detail-title">تضمین اصالت</div>                                        </div>
                                    </div>
                                    <div class="product-seller-row">
                                        <div class="product-seller-row-icon marginTop10">
                                            <i class="icon-visit-truck colorYellow  productIcon"></i>
                                        </div>
                                        <div class="product-seller-row-detail">
                                            <div class="product-seller-row-detail-title">
                                                ارسال : <span class="fontNormal"> 2 تا 7 روز کاری</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-seller-row product-seller-row--price">
                                        <div class="product-seller-row--price-now fa-num">
                                            <span class="price">{{ $product['price'] }}</span>
                                            <span class="currency">تومان</span>
                                        </div>
                                    </div>
                                    <div class="product-seller-row product-remaining-in-stock">
                                        <span>تنها <span class="mx-2">{{ $product['available_count'] }}</span> عدد در انبار باقیست - پیش از
                                            اتمام بخرید</span>
                                    </div>
                                    <div class="product-seller-row product-remaining-in-stock">
                                        <span class="bold colorBlack">تعداد سفارش :<span><i class="icon-visit-minus"></i> 1 کالا<i class="icon-visit-plus"></i></span></span>
                                    </div>
                                </div>
                                <div class="product-seller--add-to-cart">
                                    <a href="#" class="btn btn-primary w-100" data-toast data-toast-type="success"
                                        data-toast-color="green" data-toast-position="topRight"
                                        data-toast-icon="ri-check-fill" data-toast-title="موفق!"
                                        data-toast-message="به سبد اضافه شد!">
                                        افزودن به سبد خرید
                                    </a>
                                </div>
                            </div>
                            <!-- end of product-seller-info -->
                        </div>
                    </div>
                </div>
                <!-- end of product-detail-container -->
                @include('layouts.box')
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="ui-sticky ui-sticky-top mb-4 ">
                            <!-- start of product-tabs -->
                            <div class="product-tabs">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#scrollspyHeading1"
                                            data-scroll="scrollspyHeading1">نقد و بررسی</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#scrollspyHeading3"
                                            data-scroll="scrollspyHeading3">مشخصات</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#scrollspyHeading4"
                                            data-scroll="scrollspyHeading4">دیدگاه کاربران</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end of product-tabs -->
                        </div>
                        <!-- start of product-content-expert-summary -->
                        <div class="product-tab-content product-content-expert-summary tab-content border-bottom pb-2 mb-4"
                            id="scrollspyHeading1">
                            <div class="product-tab-title">
                                <h2>نقد و بررسی اجمالی</h2>
                                <h3 class="subtitle">Apple iPhone 13 A2634 Dual SIM 128GB And 4GB RAM Mobile Phone</h3>
                            </div>
                            <div class="expandable-text pt-1" style="height: 250px;">
                                <div class="expandable-text_text">
                                    <p>
                                        گوشی موبایل «iPhone 13» پرچم‌دار جدید شرکت اپل است که با چند ویژگی جدید و دوربین
                                        دوگانه روانه بازار شده است. اپل برای ویژگی‌ها و طراحی کلی این
                                    </p>
                                </div>
                                <div class="expandable-text-expand-btn justify-content-start text-sm">
                                    <span class="show-more active">
                                        ادامه مطلب <i class="ri-arrow-down-s-line ms-2"></i>
                                    </span>
                                    <span class="show-less d-none">
                                        مشاهده کمتر <i class="ri-arrow-up-s-line ms-2"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- end of product-content-expert-summary -->
                        <!-- start of product-params -->
                        <div class="product-tab-content product-params tab-content border-bottom pb-2 mb-4"
                            id="scrollspyHeading3">
                            <div class="product-tab-title">
                                <h2>مشخصات کالا</h2>
                                <h3 class="subtitle">Apple iPhone 13 A2634 Dual SIM 128GB And 4GB RAM Mobile Phone</h3>
                            </div>
                            <div class="expandable-text pt-1" style="height: 540px;">
                                <div class="expandable-text_text fa-num">
                                    <!-- start of params-list -->
                                    <div class="params-list">
                                        <div class="params-list-title">مشخصات کلی</div>
                                        <ul>
                                            <li>
                                                <span class="param-title">وزن</span>
                                                <span class="param-value">191 گرم</span>
                                            </li>
                                            <li>
                                                <span class="param-title">ساختار بدنه</span>
                                                <span class="param-value">
                                                    <span>قاب جلو ساخته شده از شیشه با پوشش محافظ Gorilla Glass 3</span>
                                                    <span>قاب پشتی و فریم ساخته شده از پلاستیک</span>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="param-title">شناسه کالا</span>
                                                <span class="param-value">2800000350215</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end of params-list -->
                                </div>
                                <div class="expandable-text-expand-btn justify-content-start text-sm">
                                    <span class="show-more active">
                                        نمایش همه مشخصات کالا <i class="ri-arrow-down-s-line ms-2"></i>
                                    </span>
                                    <span class="show-less d-none">
                                        فقط نمایش مشخصات کلی کالا <i class="ri-arrow-up-s-line ms-2"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- end of product-params -->
                        <!-- start of product-comments -->
                        <div class="product-tab-content product-comments tab-content border-bottom pb-2 mb-4"
                            id="scrollspyHeading4">
                            <div class="product-tab-title mb-0">
                                <h2>امتیاز و دیدگاه کاربران</h2>
                                <h3 class="subtitle">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</h3>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-5 mb-3">
                                </div>
                                <div class="col-xl-9 col-lg-8 col-md-7 pt-5">
                                    <!-- start of comments -->
                                    <div class="comments">
                                        <!-- start of comment -->
                                        <div class="comment">
                                            <div class="comment-header">
                                                <span>۱۵ تیر ۱۴۰۰</span>
                                                <span>امیر محمد اکبرپور</span>
                                            </div>
                                            <div class="comment-body">
                                                <p>گوشی مناسبی هست نسبت به قیمتش من خودم با ایفون X مقایسه کردم که در
                                                    بعضی از برنامه ها عقب میموند بسیار گوشی خوبی هست در کل</p>
                                                <ul>
                                                    <li class="comment-evaluation positive">دوربین قوی</li>
                                                    <li class="comment-evaluation positive">باتری 6000</li>
                                                    <li class="comment-evaluation positive">خوش دست</li>
                                                    <li class="comment-evaluation positive">مناسب برای کار های حدودا
                                                        سنگین و بالاتر</li>
                                                    <li class="comment-evaluation negative">حسگر اثر انگشت کمی ضعیفه
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="comment-footer">
                                                <span class="me-2">آیا این دیدگاه برایتان مفید بود؟</span>
                                                <button class="comment-like">۷</button>
                                                <button class="comment-dislike">۲</button>
                                            </div>
                                        </div>
                                        <!-- end of comment -->
                                    </div>
                                    <!-- end of comments -->
                                </div>
                            </div>
                        </div>
                        <!-- end of product-comments -->
                    </div>
                    <div class="col-xl-3 col-lg-4 d-lg-block d-none">
                        <div class="ui-sticky ui-sticky-top">
                            <!-- start of mini-buy-box -->
                            <div class="mini-buy-box ui-box bg-transparent p-4">
                                <div class="d-flex border-bottom pb-3 mb-3">
                                    <div class="product-thumbnail">
                                        <img src="./theme-assets/images/gallery/main.jpg" alt="product title">
                                    </div>
                                    <div class="product-details">
                                        <div class="product-title">
                                            <h1>گوشی موبایل اپل مدل iPhone 13 A2634 دو سیم کارت ظرفیت 128 گیگابایت و رم
                                                4 گیگابایت
                                            </h1>
                                        </div>
                                        <div class="product-options">
                                            <div class="product-option">
                                                <span class="color" style="background-color: #2196f3;"></span>
                                                <span class="color-label ms-2">آبی</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-features">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="ri-store-3-line text-success me-2"></i>
                                        <span>ویزیت ایران</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="ri-shield-check-line text-info me-2"></i>
                                        <span>گارانتی ۱۸ ماهه آوات</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="ri-checkbox-multiple-line text-primary me-2"></i>
                                        <span>موجود در انبار فروشنده</span>
                                    </div>
                                </div>
                                <div class="product-price">
                                    <span class="price-value">{{ $product['price'] }}</span>
                                    <span class="currency ms-1">تومان</span>
                                </div>
                                <a href="#" class="btn btn-block btn-primary fw-bold">افزودن به
                                    سبد خرید</a>
                            </div>
                            <!-- end of mini-buy-box -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- start of notification-modal -->
            <div class="remodal remodal-sm" data-remodal-id="notification-modal"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <div class="remodal-title">به من اطلاع بده</div>
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <div class="remodal-content">
                    <div class="text-muted fs-7 mb-2">اطلاع به من در زمان:</div>
                    <div class="text-dark fs-6">پیشنهاد شگفت‌انگیز</div>
                    <div class="border-bottom my-3"></div>
                    <div class="text-muted fs-7 mb-2">از طریق:</div>
                    <div class="form-element-row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="notificationCheckDefault1">
                            <label class="form-check-label" for="notificationCheckDefault1">
                                ایمیل به <span>example@example.com</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-element-row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="notificationCheckDefault2">
                            <label class="form-check-label" for="notificationCheckDefault2">
                                پیامک به <span>09xxxxxxxxx</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-element-row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="notificationCheckDefault3">
                            <label class="form-check-label" for="notificationCheckDefault3">
                                سیستم پیام شخصی
                            </label>
                        </div>
                    </div>
                </div>
                <div class="remodal-footer">
                    <button data-remodal-action="cancel" class="btn btn-sm btn-outline-light px-3 me-2">بستن</button>
                    <button class="btn btn-sm btn-primary px-3">ثبت</button>
                </div>
            </div>
            <!-- end of notification-modal -->
            <!-- start of add-question-modal -->
            <div class="remodal remodal-sm" data-remodal-id="add-question-modal"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <div class="remodal-title">پرسش خود را در مورد کالا مطرح کنید</div>
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <div class="remodal-content">
                    <form action="#">
                        <div class="form-element-row mb-3">
                            <textarea rows="3" class="form-control" placeholder="متن سوال"></textarea>
                        </div>
                    </form>
                    <div class="fs-7 fw-bold">
                        ثبت پرسش به معنی موافقت با <a href="#" class="link border-bottom-0">قوانین انتشار</a>
                        است.
                    </div>
                </div>
                <div class="remodal-footer">
                    <button class="btn btn-sm btn-primary px-3">ثبت پرسش</button>
                </div>
            </div>
            <!-- end of add-question-modal -->
            <!-- start of share-modal -->
            <div class="remodal remodal-xs" data-remodal-id="share-modal" data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <div class="remodal-title">اشتراک‌گذاری</div>
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <div class="remodal-content">
                    <div class="text-muted fs-7 fw-bold mb-3">
                        با استفاده از روش‌های زیر می‌توانید این صفحه را با دوستان خود به اشتراک بگذارید.
                    </div>
                    <div class="d-flex align-items-center border-top border-bottom py-3 mb-3">
                        <div class="widget flex-grow-1 border-0 p-0 me-2">
                            <div class="widget-content widget-socials">
                                <ul class="align-items-center">
                                    <li><a href="#" class="d-inline-flex"><i class="ri-facebook-circle-fill"></i></a>
                                    </li>
                                    <li><a href="#" class="d-inline-flex"><i class="ri-instagram-fill"></i></a></li>
                                    <li><a href="#" class="d-inline-flex"><i class="ri-twitter-fill"></i></a></li>
                                    <li><a href="#" class="d-inline-flex"><i class="ri-telegram-fill"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="btn btn-sm btn-primary copy-url-btn" data-copy="https://www.google.com">کپی لینک
                        </div>
                    </div>
                    <div class="text-dark fs-7 fw-bold mb-3">جایزه شما</div>
                    <div class="d-flex justify-content-between">
                        <div class="text-muted fs-7 fw-bold">
                            با دعوت دوستانتان، پس از اولین خریدشان، کدتخفیف و امتیاز هدیه بگیرید.
                        </div>
                        <img src="./theme-assets/images/theme/club.svg" width="100" alt="">
                    </div>
                </div>
            </div>
            <!-- end of share-modal -->
        </main>
</div>


<script>

    $(document).ready(function() {
        
        let productId;
        
        try {
            productId = location.pathname.split('/product/')[1].split('/')[0];
        }
        catch(e) {
            document.location.href = '{{ route('home') }}';
        }
        
        $.ajax({
            type: 'get',
            url: '{{ route('api.product.show') }}' + '/' + productId,
            headers: {
                'accept': 'application/json'
            },
            success: function(res) {
                
                let html = '';
                for(var i = 0; i < res.data.galleries.length; i++) {
                    html += '<li data-fancybox="gallery-a" data-src="' + res.data.galleries[i].img + '">'
                    html += '<img src="' + res.data.galleries[i].img + '" alt="' + res.data.galleries[i].alt + '"></li>'
                }
                $("#gallery").empty().append(html);

                let property = '';
                for (var i=0; i < res.data.features.length;i++){
                    property += '<li><span class="label colorBlueWhite">' + res.data.features[i].name + '</span><span>" : "</span>'
                    property += '<span class="title">' + res.data.features[i].value + '</span></li>'
                }
                $("#property").empty().append(property);
                
            }
        });

    });

</script>
@stop

@section('footer')
    @parent
@stop

@section('extraJS')
    @parent
    <script src="{{ asset('theme-assets/js/theme.js') }}"></script>
    <script src="{{ asset('theme-assets/js/custom.js') }}"></script>
@stop
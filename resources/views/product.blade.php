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
                        <?php $i = 1; ?>
                        @foreach($product['parentPath'] as $path)
                            <li>
                                <span>{{ $path }}</span>
                                @if($i != count($product['parentPath']))
                                    <span> / </span>
                                @endif
                            </li>
                            <?php $i++; ?>
                        @endforeach
                    </ol>
                <span>
                    <button class="ri-stackshare-line fontSize30 b-0 colorWhiteGray btnHover backColorWhite"></button>
                    <button class="ri-bookmark-line fontSize30 b-0 colorWhiteGray btnHover backColorWhite"></button>
                    <button class="ri-bookmark-fill fontSize30 b-0 colorWhiteGray btnHover backColorWhite"></button>
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
                                <span class="product-users-rating" >
                                    <span class="rattingToStar">
                                    </span>
                                    <span class="fw-bold me-1">{{ $product['rate'] }}</span>
                                    <span class="text-muted fs-7">(از <span>{{ $product['all_rates_count'] }}</span> رای)</span>
                                </span>
                                <a href="#" class="link border-bottom-0 fs-7 me-1"> دیدگاه کاربران <span class="mr-1">({{ $product['all_rates_count'] }})</span></a>
                            </div>
                            @if($product['seller'] !== '')
                                <div class="product-variant-selected-label bold mb-3 seller">سازنده : <span  class="mb-3 ">{{ $product['seller'] }}</span></div>
                            @endif
                            <div id="color-div" class="product-variants-container mb-3 hidden">
                                <div class="product-variant-selected-container spaceBetween" >
                                    <span class="product-variant-selected-label"> رنگ : </span>
                                    <span id="product-color-variant-selected" class="product-variant-selected"></span>
                                </div>
                                <div id="product-colors-variants" class="product-variants">
                                </div>
                            </div>
                            {{-- <div class="mb-3 spaceBetween">
                                <div class="bold">سایز : </div>
                                <div>30*20*40cm</div>
                            </div> --}}
                            <div class="mb-3 spaceBetween">
                                <div class="bold">ویژگی‌ها : </div>
                            </div>
                            <div class="expandable-text mb-3" style="height: 95px;">
                                <div class="expandable-text_text">
                                    <div class="product-params">
                                        <ul id="property">
                                        </ul>
                                    </div>
                                </div>
                            <div class="mb-3 mt-3 spaceBetween">
                                <div class="bold">توضیحات :</div>
                            </div>
                            {{-- <p>{{ $product['description'] }}</p> --}}
                            <div class="product-additional-info-container mb-3">
                                <span class="icon">
                                    <i class="ri-information-line"></i>
                                </span>
                                <div class="product-additional-info">
                                    <p>{{ $product['description'] }}</p>
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
                                    @if($product['seller'] !== '')
                                        <div class="product-seller-row seller">
                                            <div class="product-seller-row-icon marginTop10">
                                                <i class="icon-visit-store colorYellow  productIcon"></i>
                                            </div>
                                            <div class="product-seller-row-detail">
                                                <div class="product-seller-row-detail-title">{{ $product['seller'] }}</div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($product['gaurantee'] !== null)
                                        <div class="product-seller-row">
                                            <div class="product-seller-row-icon marginTop10">
                                                <i class="icon-visit-verified colorYellow  productIcon"></i>
                                            </div>
                                            <div class="product-seller-row-detail">
                                                <div class="product-seller-row-detail-title">گارانتی {{$product['gaurantee']}} ماهه</div>
                                            </div>
                                        </div>
                                    @endif
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
                                                ارسال : <span class="fontNormal"> 2 تا 7 روز کاری </span>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($product['available_count'] != 0)
                                    <div class="product-seller-row product-seller-row--price spaceBetween">
                                        @if($product['off'] != null)
                                            <div class="product-price fa-num">
                                                <div id="OffSection" class="d-flex align-items-center">
                                                    <div class="fontSize15 pl-10 position-relative">
                                                        <img src="{{ asset('theme-assets/images/svg/off.svg') }}" alt="" width="45">
                                                        <span id="Off" class="position-absolute fontSize10 colorWhite r-0 customOff">
                                                            @if ($product['off'] != null && $product['off']['type'] == 'percent')
                                                                <span>%</span>{{ $product['off']['value'] }}
                                                            @elseif ($product['off']!= null && $product['off']['type'] == 'value') 
                                                                {{ $product['off']['value'] }}<span class="fontSize10 px-1 colorYellow">ت</span>
                                                            @endif
                                                        </span>
                                                    </div>
                                                    <del id="PriceBeforeOff" class="customlineText textColor fontSize15">{{ $product['price'] }}</del>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="product-seller-row--price-now fa-num justifyContentEnd">
                                            <span class="price">{{ $product['price'] }}</span>
                                            <span class="currency fontSize18 colorYellow">ت</span>
                                        </div>
                                    </div>
   
                                    @endif
                                    {{-- @if ($product['available_count'] != 0) --}}
                                    
                                    {{-- @endif --}}
                                    @if($product['available_count']  > 0)
                                        <div id="availableCount" class="product-seller-row product-remaining-in-stock">
                                            <span>تنها <span class="mx-2">{{ $product['available_count'] }}</span> عدد در انبار باقیست - پیش از
                                                اتمام بخرید</span>
                                        </div>
                                    @elseif($product['available_count'] == 0)
                                        <div id="availableCount" class="product-seller-row product-remaining-in-stock">
                                            <span>اتمام موجودی</span>
                                        </div>
                                    @endif
                                    
                                    <div class="product-seller-row product-remaining-in-stock spaceBetween">
                                        <div class="bold colorBlack d-flex align-items-center ">
                                            <div>تعداد سفارش :</div>                                            
                                        </div>
                                        <div class="num-block fa-num me-3">
                                            <span class="num-in">
                                                <span class="plus"></span>
                                                <input type="text" class="in-num" value="1" readonly="">
                                                <span class="minus dis"></span>
                                            </span>
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
                @include('sections.top_products_slider', ['id' => 'most_seen_products_when_filled', 'api' => route('api.product.similars', ['product' => $product['id']]),
                    'key' => 'mostSeenProduct', 'title' => 'محصولات مشابه', 'not_fill_id' => 'most_seen_products_when_not_filled'])

                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="ui-sticky ui-sticky-top mb-4 StickyMenuMoveOnTop">
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
                            </div>
                            <div class="expandable-text pt-1" style="height: 250px;">
                                <div class="expandable-text_text">
                                    <p>
                                        {!! $product['introduce'] !!}
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
                            </div>
                            <div class="expandable-text pt-1" style="height: auto">
                                <div class="expandable-text_text fa-num">
                                    <!-- start of params-list -->
                                    <div class="params-list">
                                        <div class="params-list-title">مشخصات کلی</div>
                                        <ul id="params-list-div"></ul>
                                    </div>
                                    <!-- end of params-list -->
                                </div>
                                {{-- <div class="expandable-text-expand-btn justify-content-start text-sm">
                                    <span class="show-more active">
                                        نمایش همه مشخصات کالا <i class="ri-arrow-down-s-line ms-2"></i>
                                    </span>
                                    <span class="show-less d-none">
                                        فقط نمایش مشخصات کلی کالا <i class="ri-arrow-up-s-line ms-2"></i>
                                    </span>
                                </div> --}}
                            </div>
                        </div>
                        <!-- end of product-params -->
                        <!-- start of product-comments -->
                        <div class="product-tab-content product-comments tab-content border-bottom pb-2 mb-4"
                            id="scrollspyHeading4">
                            <div class="row">
                            <div class="product-user-meta fa-num mb-4 spaceBetween">
                                <span class="product-users-rating">
                                    <span class="product-title fontSize15 marginLeft15">دیدگاه کاربران</span>
                                    <span class="rattingToStar"></span>
                                    <span class="fw-bold me-1">{{ $product['rate'] }}</span>
                                    <span class="text-muted fs-7">(از <span>{{ $product['all_rates_count'] }}</span> رای)</span>
                                </span>
                                <span style="gap15">
                                    <a class="marginLeft15 btnHover colorBlack" href=""><i class="icon-visit-sort align-middle fontSize20 marginLeft15"></i>جدید ترین</a>
                                    <a class="marginLeft15 btnHover colorBlack" href="">کمترین امتیاز</a>
                                    <a class="marginLeft15 btnHover colorBlack" href="">بیشترین امتیاز</a>
                                </span>
                            </div>
                                <div class="col-xl-3 col-lg-4 col-md-5 mb-3">
                                    <p class="bold">امتیاز شما</p>
                                    @include('layouts.ratting')
                                </div>
                                <div class="col-xl-9 col-lg-8 col-md-7 pt-0">
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
                        <div class="ui-sticky ui-sticky-top StickyMenuMoveOnTop">
                            <!-- start of mini-buy-box -->
                            <div class="mini-buy-box ui-box bg-transparent p-4">
                                <div class="d-flex border-bottom pb-3 mb-3">
                                    <div class="product-thumbnail">
                                            <img src="{{ $product['img'] }}" alt="{{ $product['alt'] }}" />
                                    </div>
                                    <div class="product-details">
                                        <div class="product-title">
                                            <h1>{{ $product['name'] }}</h1>
                                        </div>
                                        <div id="product_options" class="product-options">
                                        </div>
                                    </div>
                                </div>
                                <div class="product-features">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="ri-store-3-line text-success me-2"></i>
                                        <span>ویزیت ایران</span>
                                    </div>
                                    @if ($product['gaurantee'] !== null)
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="ri-shield-check-line text-info me-2"></i>
                                            <span>گارانتی {{$product['gaurantee']}} ماهه</span>
                                        </div>
                                    @endif
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="ri-checkbox-multiple-line text-primary me-2"></i>
                                        <span>موجود در انبار فروشنده</span>
                                    </div>
                                </div>
                                <div class="product-price">
                                    <span class="price price-value">{{ $product['price'] }}</span>
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
                for(var i = 0; i < res.galleries.length; i++) {
                    html += '<li data-fancybox="gallery-a" data-src="' + res.galleries[i].img + '">'
                    html += '<img src="' + res.galleries[i].img + '" alt="' + res.galleries[i].alt + '"></li>'
                }
                $("#gallery").empty().append(html);

                let colors = '';
                let property = '';
                let params = '';
                for (var i = 0; i < res.features.length; i++) {

                    if(res.features[i].name === 'multicolor') {
                        
                        $("#color-div").removeClass('hidden');
                        let val_label = res.features[i].value.split('__');
                        let prices = res.features[i].price !== undefined && 
                            res.features[i].price !== null && res.features[i].price != '' ? 
                                res.features[i].price.split('$$') : [];

                        let colors_keys = val_label[0].split('$$');
                        let colors_labels = val_label[1].split('$$');

                        for(var j = 0; j < colors_keys.length; j++) {

                            colors += '<div class="product-variant-item"><div class="custom-radio-circle">';
                            colors += '<input data-label="' + colors_labels[j] + '" data-val="' + colors_keys[j] + '"" type="radio" class="custom-radio-circle-input" name="productColor"';
                            if(j == 0) {

                                if(prices.length > j)
                                    colors += 'data-price="' + prices[j] + '" id="productColor0' + j + '" checked>';
                                else
                                    colors += 'data-price="" id="productColor0' + j + '" checked>';
                                
                                let html = '<div class="product-option">';
                                html += '<span class="color" style="background-color: ' + colors_labels[j] + ';"></span>';
                                html += '<span class="color-label ms-2">' + colors_keys[j] + '</span>';
                                html += '</div>';

                                $("#product_options").empty().append(html);

                                $(".price").empty().append(prices[j]);
                                $("#product-color-variant-selected").empty().append(colors_keys[j]);
                            }
                            else {
                                
                                if(prices.length > j)
                                    colors += 'data-price="' + prices[j] + '" id="productColor0' + j + '">';
                                else
                                    colors += 'data-price="" id="productColor0' + j + '">';
                            }

                            colors += '<label for="productColor0' + j + '" class="custom-radio-circle-label"';
                            colors += 'data-variant-label="' + colors_keys[j] + '">';
                            colors += '<span class="color" style="background-color: ' + colors_labels[j] +';"';
                            colors += 'data-bs-toggle="tooltip" data-bs-placement="bottom"';
                            colors += 'title="' + colors_keys[j] + '" data-bs-original-title="' + colors_keys[j] + '" aria-label="' + colors_keys[j] + '"></span>';
                            colors += '</label></div></div></div>';
                        }

                    }
                    else {
                        property += '<li><span class="label colorBlueWhite">' + res.features[i].name + '</span><span> : </span>';
                        property += '<span class="title">' + res.features[i].value + '</span></li>';

                        params += '<li>';
                        params += '<span class="param-title">' + res.features[i].name + '</span>';
                        params += '<span class="param-value">' + res.features[i].value + '</span>';
                        params += '</li>';
                    }

                }
                $("#params-list-div").empty().append(params);
                $("#property").empty().append(property);

                if(colors != '')
                    $("#product-colors-variants").empty().append(colors);
            }
        });

        $(document).on("click","input[name='productColor']", function() {
            
            let html = '<div class="product-option">';
            html += '<span class="color" style="background-color: ' + $(this).attr('data-label') + ';"></span>';
            html += '<span class="color-label ms-2">' + $(this).attr('data-val') + '</span>';
            html += '</div>';

            $("#product_options").empty().append(html);
            $(".price").empty().append($(this).attr('data-price'));
            $("#product-color-variant-selected").empty().append($(this).attr('data-val'));
        });
        
        // $.ajax({
        //     type: 'post',
        //     url: '{{ route('api.product.comment.store', ['product' => $product['id']]) }}',
        //     data: {
        //         'rate': 3,
        //         'is_bookmark': 1,
        //         'msg': 'sasds'
        //     },  
        //     success: function(res) {
        //         alert(res);
        //     }
        // });
        
        let star="";
        let roundRatting=Math.floor('{{ $product['rate'] }}');
        for(var i = 5; i >= 1; i--) {
            if(i <= roundRatting)
                star += '<i class="icon-visit-star me-1 fontSize15"></i>';
            else
                star += '<i class="icon-visit-staroutline me-1 fontSize15"></i>';
        }
        $(".rattingToStar").empty().append(star);

        // if ('{{ $product['seller'] }}' !== ''){
        //     $('.seller').removeClass('hidden');
        // }
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
    <script src="{{ asset('theme-assets/js/home.js') }}"></script>
@stop
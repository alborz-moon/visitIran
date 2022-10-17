@extends('layouts.structure')

@section('seo')
    <title>غذاهای محلی یا جاهای دیدنی کیش | تونل باد میکامال</title>
    <meta property="og:title" content="غذاهای محلی یا جاهای دیدنی کیش | تونل باد میکامال" />
    <meta name="twitter:title" content="غذاهای محلی یا جاهای دیدنی کیش | تونل باد میکامال" />
    <meta property="og:site_name" content="غذاهای محلی یا جاهای دیدنی کیش | تونل باد میکامال" />

    
    <meta property="og:image" content="{{ $product['img'] }}"/>
    <meta property="og:image:secure_url" content="{{ $product['img'] }}"/>
    <meta name="twitter:image" content="{{ $product['img'] }}"/>
    <meta property="og:description" content="{{ $product['digest'] }}" />
    <meta name="twitter:description" content="{{ $product['digest'] }}" />
    <meta name="description" content="{{ $product['digest'] }}"/>

    <meta name="keywords" content="{{ $product['keywords'] }}" />
    {{-- <meta property="article:tag" content="{{ $product['tags'] }}"/> --}}

    <script>var productPrefixRoute = '{{ route('home') }}' + "/product";</script>

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
                    @include('layouts.bookmark', ['product' => $product])
                </nav>
                <!-- end of breadcrumb -->
                    <div class="row">
                        <div class="col-lg-4 col-md-5 mb-md-0 mb-4">
                            <div class="ui-sticky ui-sticky-top">
                                <!-- start of product-gallery -->
                                <div class="product-gallery">
                                    
                                    <div class="gallery-img-container">
                                        <div class="gallery-img" id="galleryMain">
                                            <img class="zoom-img" src="{{ $product['img'] }}" alt="{{ $product['alt'] }}" />
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
                            @include('product.product_basket_card', ['product' => $product])
                            <!-- end of product-seller-info -->
                        </div>
                    </div>
                </div>
                  {{-- "is_bookmark" => false
                        "user_rate" => null
                        "has_comment" => false
                        "is_login" => true --}}
                <!-- end of product-detail-container -->
                @include('sections.top_products_slider', ['id' => 'most_seen_products_when_filled', 'api' => route('api.product.similars', ['product' => $product['id']]),
                    'key' => 'mostSeenProduct', 'title' => 'محصولات مشابه', 'not_fill_id' => 'most_seen_products_when_not_filled'])

                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="ui-sticky ui-sticky-top mb-4 StickyMenuMoveOnTop">
                            <!-- start of product-tabs -->
                            <div class="product-tabs overflowHidden">
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
                                    <p class="bold fontSize12">شما هم درباره این کالا دیدگاه ثبت کنید</p>
                                    <button class="btn btn-primary w-100 mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal"> ثبت دیدگاه </button>
                                    <!-- Modal -->

                                    {{-- @include('layouts.ratting') --}}
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
                            <!-- start of product-seller-info -->
                            @include('product.product_basket_card', ['product' => $product])
                            <!-- end of product-seller-info -->
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
                        <img src="{{ asset('theme-assets/images/theme/club.svg') }}" width="100" alt="">
                    </div>
                </div>
            </div>
            <!-- end of share-modal -->
        </main>
        {{-- Modal     --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">دیدگاه شما</h5>
                {{-- <div class="d-flex" style="flex-direction:column">
                    <img src="#">
                    <p>عکس محصول</p>
                </div> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body p-0">
        <main class="page-content p-0">
            <div class="container">
                <!-- start of box -->
                <div class="ui-box bg-white product-detail-container p-0 b-0">
                    <div class="ui-box-content">
                        <div class="row">
                            <div class="col-md-6 mb-md-0 mb-4">
                                <form action="#" class="add-comment-product">
                                    <!-- start of form-element -->
                                    <div class="d-flex justify-content-center align-items-center">
                                        @include('layouts.ratting')
                                    </div>
                                    <div class="form-element-row mb-3">
                                        <label class="label">عنوان نظر شما</label>
                                        <input type="text" class="form-control"
                                            placeholder="عنوان نظر خود را بنویسید..">
                                    </div>
                                    <!-- end of form-element -->
                                    <!-- start of form-element -->
                                    <div class="form-element-row mb-3">
                                        <label class="label">نقاط قوت</label>
                                        <div class="add-point-container" id="advantages">
                                            <div class="add-point-field">
                                                <input type="text" class="form-control" id="advantage-input"
                                                    autocomplete="off">
                                                <button type="button"
                                                    class="btn btn-primary btn-add-point js-icon-form-add"><i
                                                        class="ri-add-line"></i></button>
                                            </div>
                                            <div class="comment-dynamic-labels js-advantages-list"></div>
                                        </div>
                                    </div>
                                    <!-- end of form-element -->
                                    <!-- start of form-element -->
                                    <div class="form-element-row mb-3">
                                        <label class="label">نقاط ضعف</label>
                                        <div class="add-point-container" id="disadvantages">
                                            <div class="add-point-field">
                                                <input type="text" class="form-control" id="disadvantage-input"
                                                    autocomplete="off">
                                                <button type="button"
                                                    class="btn btn-primary btn-add-point js-icon-form-add"><i
                                                        class="ri-add-line"></i></button>
                                            </div>
                                            <div class="comment-dynamic-labels js-disadvantages-list"></div>
                                        </div>
                                    </div>
                                    <!-- end of form-element -->
                                    <!-- start of form-element -->
                                    <div class="form-element-row mb-3">
                                        <label class="label">متن نظر شما (اجباری)</label>
                                        <textarea rows="5" class="form-control"
                                            placeholder="متن نظر خود را بنویسید.."></textarea>
                                    </div>
                                    <!-- end of form-element -->
                                </form>
                                
                            </div>
                            <div class="col-md-6 p-0">
                                <div class="fs-8 fw-bold text-dark mb-3">
                                    دیگران را با نوشتن نظرات خود، برای انتخاب این محصول راهنمایی کنید.
                                </div>
                                <div class="fs-7 fw-bold text-info mb-3">
                                    لطفا پیش از ارسال نظر، خلاصه قوانین زیر را مطالعه کنید:
                                </div>
                                <ul class="ps-4 text-secondary">
                                    <li class="mb-3">لازم است محتوای ارسالی منطبق برعرف و شئونات جامعه و با بیانی رسمی و
                                        عاری از لحن
                                        تند، تمسخرو توهین باشد.</li>
                                    <li class="mb-3">از ارسال لینک‌های سایت‌های دیگر و ارایه‌ی اطلاعات شخصی خودتان مثل
                                        شماره تماس،
                                        ایمیل و آی‌دی شبکه‌های اجتماعی پرهیز کنید.</li>
                                    <li class="mb-3">در نظر داشته باشید هدف نهایی از ارائه‌ی نظر درباره‌ی کالا ارائه‌ی
                                        اطلاعات مشخص و
                                        دقیق برای راهنمایی سایر کاربران در فرآیند خرید یک محصول توسط ایشان است.</li>
                                    <li class="mb-3">با توجه به ساختار بخش نظرات، از پرسیدن سوال یا درخواست راهنمایی در
                                        این بخش
                                        خودداری کرده و سوالات خود را در بخش «پرسش و پاسخ» مطرح کنید.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of box -->
            </div>
        </main>
              </div>
              <div class="modal-footer between">
                  <div class="d-flex align-items-center justify-content-between flex-wrap">
                    <div>
                      با “ثبت نظر” موافقت خود را با <a href="#" class="link">قوانین انتشار نظرات</a>
                      در سایت اعلام می‌کنم.
                    </div>
                    <div>
                        <a href="#" class="link">انصراف و بازگشت</a>
                    </div>
                </div>
                <div class="text-end">
                    <button class="btn btn-primary">ثبت نظر 
                        <i class="ri-send-plane-fill ms-2"></i>
                    </button>
                </div>
                </div>
            </div>
          </div>
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

                let options = '';
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
                    else if(res.features[i].available_count !== null || 
                        res.features[i].price !== null
                    ) {
                        let vals = res.features[i].value.split('__')[0].split("$$");
                        
                        let prices = res.features[i].price == null ? null : res.features[i].price.split("$$");
                        let counts = res.features[i].available_count == null ? null : res.features[i].available_count.split("$$");

                        options = '<div class="flex">'
                        for(var j = 0; j < vals.length; j++) {

                            options += '<button data-val="' + vals[j] + '" name="productOption"';
                            if(j == 0) {

                                if(prices != null) {
                                    options += 'data-price="' + prices[j] + '" id="productOption0' + j + '" class="selected">';
                                    $(".price").empty().append(prices[j]);
                                }
                                else {
                                    options += 'data-count="' + counts[j] + '" id="productOption0' + j + '" class="selected">';
                                    $("#availableCount").empty().append(counts[j]);
                                }
                                
                            }
                            else {
                                if(prices != null)
                                    options += 'data-price="' + prices[j] + '" id="productOption0' + j + '">';
                                else
                                    options += 'data-count="' + counts[j] + '" id="productOption0' + j + '">';
                            }

                            options += vals[j] + "</button>";

                        }

                        options += "</div>";
                    }
                    else {
                        if(res.features[i].show_in_top == 1) {
                            property += '<li><span class="label colorBlueWhite px-1">' + res.features[i].name + '</span><span> : </span>';
                            property += '<span class="title px-1">' + res.features[i].value + '</span></li>';
                        }
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

                if(options !== '')
                    $("#property").append(options);
            }
        });

        $(document).on("click","input[name='productColor']", function() {
            

            if(prices != null) {
                options += 'data-price="' + prices[j] + '" id="productOption0' + j + '" class="selected">';
                $(".price").empty().append(prices[j]);
            }
            else {
                options += 'data-count="' + counts[j] + '" id="productOption0' + j + '" class="selected">';
                $("#availableCount").empty().append(counts[j]);
            }

            let html = '<div class="product-option">';
            html += '<span class="color" style="background-color: ' + $(this).attr('data-label') + ';"></span>';
            html += '<span class="color-label ms-2">' + $(this).attr('data-val') + '</span>';
            html += '</div>';

            $("#product_options").empty().append(html);
            $(".price").empty().append($(this).attr('data-price'));
            $("#product-color-variant-selected").empty().append($(this).attr('data-val'));
        });

        $(document).on("click","button[name='productOption']", function() {

            if($(this).attr('data-price') !== undefined)
                $(".price").empty().append($(this).attr('data-price'));
            else
                $("#availableCount").empty().append($(this).attr('data-count'));
            
            
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
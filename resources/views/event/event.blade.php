
@extends('layouts.structure')
@section('content')
        <main class="page-content TopParentBannerMoveOnTop">
            <div class="container">
                <!-- start of product-detail-container -->
                <div class="product-detail-container mb-5">
                    <div class="row">
                        {{-- @include('shop.product.bookmark') --}}
                        <div class="col-lg-9 col-md-12 mb-md-0 mb-4">
                            <!-- start of product-gallery -->
                            <div class="bold colorBlack fontSize20">گردشگری چیست ?</div>
                            <div class="colorBlack fontSize15">کد : <span>17486931867</span></div>

                            <div class="d-flex justify-content-center align-items-center customBoxShadowGallery mb-3 imgSizeEvent">
                                <img class="w-100 h-100 pt-0 p-4" src="{{ asset('theme-assets/images/banner/013.jpg') }}" alt="">
                            </div>
                            <div class="customBoxShadowGallery">
                                <div class="d-flex alignItemsCenter mb-4">
                                    <span class="ui-box-title fontSize20"> 
                                        <img class="p-2" src="{{ asset('./theme-assets/images/svg/headlineTitle.svg') }}" alt="">ثبت نام حضوری
                                        <span class="colorYellow fontSize12">مهلت ثبت نام تا پنج شنبه 21 مهرماه 1401 </span>
                                    </span>
                                </div>
                                <div class="d-flex spaceBetween p-3">
                                    <div>
                                        <div class="bold textColor">رویداد حضوری و آنلاین </div>
                                        <div class="colorBlack">دریافت ویدیو و عکس یادگاری به همراه سرویس ایاب و ذهاب</div>
                                    </div>
                                    <div>
                                        <div class="product-seller-row product-remaining-in-stock spaceBetween">
                                            <div class="bold textColor d-flex align-items-center ">
                                                <div>تعداد شرکت کننده :</div>                                            
                                            </div>
                                            <div class="num-block fa-num me-3">
                                                <span class="num-in">
                                                    <span class="icon-visit-Exclusion1 countPlus customColorBlack d-flex justify-content-center align-items-center"></span>
                                                    <input name="counter" type="text" value="1" readonly="">
                                                    <span class="icon-visit-Exclusion2 countMinus customColorBlack d-flex justify-content-center align-items-center"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex spaceBetween p-3">
                                    <div>
                                        <div class="bold textColor">رویداد حضوری و آنلاین </div>
                                        <div class="colorBlack">دریافت ویدیو و عکس یادگاری به همراه سرویس ایاب و ذهاب</div>
                                    </div>
                                    <div>
                                        <div class="product-seller-row product-remaining-in-stock spaceBetween">
                                            <div class="bold textColor d-flex align-items-center ">
                                                <div>تعداد شرکت کننده :</div>                                            
                                            </div>
                                            <div class="num-block fa-num me-3">
                                                <span class="num-in">
                                                    <span class="icon-visit-Exclusion1 countPlus customColorBlack d-flex justify-content-center align-items-center"></span>
                                                    <input name="counter" type="text" value="1" readonly="">
                                                    <span class="icon-visit-Exclusion2 countMinus customColorBlack d-flex justify-content-center align-items-center"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center spaceBetween p-3">
                                    <div class="d-flex align-items-center">
                                        <input style="width: 350px" class="form-control" placeholder="کد تخفیف ">
                                        <button id="" class="btn btn-primary backgroundGray alignSelfEnd customBtnAddress mx-3">ثبت</button>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary px-5"> ثبت نام </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 p-0">
                            <div class="ui-sticky ui-sticky-top StickyMenuMoveOnTop">
                                <div class="d-flex justify-content-end">
                                    <span>
                                        <button class="ri-bookmark-line fontSize30 b-0 colorWhiteGray btnHover backColorWhite"></button>
                                        <button class="ri-bookmark-fill fontSize30 b-0 colorYellow btnHover backColorWhite"></button>
                                        <button data-remodal-target="share-modal" class="ri-stackshare-line fontSize30 b-0 colorWhiteGray btnHover backColorWhite"></button>
                                    </span>
                                </div>
                                <!-- start of product-seller-info -->
                                <div class="product-seller-info ui-box mb-3">
                                    {{-- <div class="top30 position-absolute fontSize22 colorYellow">
                                        <i class="icon-visit-organization"></i>
                                    </div> --}}
                                    <div class="seller-info-changeable">
                                            <div class="d-flex align-items-center">
                                                <div class="userCircleSize backgroundYellow mx-3 position-relative">
                                                    <i class="icon-visit-organization fontSize28 colorWhite position-absolute padding10 "></i>
                                                </div>
                                                <div class="d-flex flexDirectionColumn marginTop8">
                                                    <div class="fontSize15 bold colorBlack">Onix code</div>
                                                    <div class="d-flex mt-2">
                                                        <div class=" align-items-center px-2 px-2 fontSize15 colorYellow"><i class=" fontSize15 icon-visit-star me-1 fontSize14 verticalAlign-2"></i> 4.9</div>
                                                        <div class="mr-70 align-items-center px-2 fontSize15 colorYellow"><i class=" fontSize15 icon-visit-person colorYellow verticalAlign-2"></i> 15000</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end mt-1 mb-2">
                                                <button class="buttonBasketEvent">
                                                    <span class="colorWhiteGray fontSize13 paddingRight5 px-2">مشاهده</span>
                                                    <i class="icon-visit-eye colorWhiteGray verticalAlign-2 px-2"></i>
                                                </button>
                                                <button class="buttonBasketEvent">
                                                    <span class="colorWhiteGray fontSize13 paddingRight5 px-2">دنبال کردن</span>
                                                    <i class="icon-visit-person colorWhiteGray verticalAlign-2 px-2"></i>
                                                </button>
                                            </div>
                                        <hr>
                                        <div class="product-seller-row p-0">
                                            <div class="product-seller-row-icon marginTop9">
                                                <!-- <i class="ri-store-3-fill"></i> -->
                                                <i class="icon-visit-date colorYellow"></i>
                                            </div>
                                            <div class="product-seller-row-detail">
                                                <div class="seller-final-score-container p-2">
                                                    <div class="seller-rate-container">
                                                        <span class="colorYellow bold">از</span>
                                                        <span>پنج شنبه 21 مهرماه 1401 ساعت 17</span>
                                                    </div>
                                                </div>
                                                <div class="seller-final-score-container p-2">
                                                    <div class="seller-rate-container">
                                                        <span class="colorYellow bold">تا</span>
                                                        <span>پنج شنبه 21 مهرماه 1401 ساعت 17</span>
                                                    </div>
                                                </div>
                                                <a href="#" class="seller-info-link"></a>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="product-seller-row p-0">
                                            <div class="product-seller-row-icon marginTop9">
                                                <!-- <i class="ri-store-3-fill"></i> -->
                                                <i class="icon-visit-location colorYellow"></i>
                                            </div>
                                            <div class="product-seller-row-detail">
                                                <div class="seller-final-score-container p-2">
                                                    <div class="seller-rate-container">
                                                        <span class="colorBlack fontSize15 ">تهران</span>
                                                        <span class="colorBlack fontSize15 px-2">مجازی</span>
                                                    </div>
                                                </div>
                                                <a href="#" class="seller-info-link"></a>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="product-seller-row p-0">
                                            <div class="product-seller-row-icon marginTop9">
                                                <!-- <i class="ri-store-3-fill"></i> -->
                                                <i class="icon-visit-hashtag colorYellow"></i>
                                            </div>
                                            <div class="product-seller-row-detail">
                                                <div class="seller-final-score-container p-2">
                                                    <div class="seller-rate-container">
                                                        <span class="fontSize13 colorBlack">آموزش گردشگری</span>
                                                    </div>
                                                </div>
                                                <a href="#" class="seller-info-link"></a>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="product-seller-row p-0">
                                            <div class="product-seller-row-icon marginTop9">
                                                <!-- <i class="ri-store-3-fill"></i> -->
                                                <i class="icon-visit-language colorYellow"></i>
                                            </div>
                                            <div class="product-seller-row-detail">
                                                <div class="seller-final-score-container p-2">
                                                    <div class="seller-rate-container">
                                                        <span class="fontSize13 colorBlack">فارسی</span>
                                                    </div>
                                                </div>
                                                <a href="#" class="seller-info-link"></a>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="product-seller-row p-0">
                                            <div class="product-seller-row-detail">
                                                <div class="seller-final-score-container p-2">
                                                    <div class="seller-rate-container">
                                                        <span class="colorBlack fontSize13">امکانات ویژه برای شما :</span>
                                                    </div>
                                                </div>
                                                <div class="seller-final-score-container p-2">
                                                    <div class="seller-rate-container">
                                                        <div class="colorBlack fontSize12 fontNormal">راهنمای نابینایان</div>
                                                        <div class="colorBlack fontSize12 fontNormal">پخش فیلم</div>
                                                        <div class="colorBlack fontSize12 fontNormal">پذیرایی</div>
                                                    </div>
                                                </div>
                                                <a href="#" class="seller-info-link"></a>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="product-seller-row p-0 pb-2">
                                            <div class="product-seller-row-detail">
                                                <div class="seller-final-score-container p-2">
                                                    <div class="seller-rate-container">
                                                        <span class="colorBlack fontSize13">شرایط سنی:</span>
                                                    </div>
                                                </div>
                                                <div class="seller-final-score-container p-2">
                                                    <div class="seller-rate-container">
                                                        <div class="colorBlack fontSize12 fontNormal">نامحدود</div>
                                                    </div>
                                                </div>
                                                <a href="#" class="seller-info-link"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of product-seller-info -->
                                <!-- start of product-seller-info -->
                                <div class="product-seller-info ui-box p-0">
                                    <div class="seller-info-changeable">
                                        <div class="product-seller-row p-0">
                                            <div class="product-seller-row-icon marginTop9">
                                                <!-- <i class="ri-store-3-fill"></i> -->
                                                <i class="icon-visit-location colorYellow"></i>
                                            </div>
                                            <div class="product-seller-row-detail">
                                                <div class="seller-final-score-container p-2">
                                                    <div class="seller-rate-container">
                                                        <span class="fontSize13 fontNormal colorBlack">تهران، میدان ونک، بزرگراه حقانی، مرکز رشد دانشگاه علامه طباطبائی، پلاک 40، طبقه سوم شرقی،</span>
                                                    </div>
                                                </div>
                                                <a href="#" class="seller-info-link"></a>
                                            </div>
                                        </div>
                                            <div class="d-flex justify-content-end mt-1 mb-2">
                                                <button class="buttonBasketEvent">
                                                    <span class="colorWhiteGray fontSize13 paddingRight5 px-2">مشاهده رو نقشه</span>
                                                    <i class="icon-visit-eye colorWhiteGray verticalAlign-2 px-2"></i>
                                                </button>
                                                <button class="buttonBasketEvent">
                                                    <span class="colorWhiteGray fontSize13 paddingRight5 px-2">مسیر یابی</span>
                                                    <i class="icon-visit-location colorWhiteGray verticalAlign-2 px-2"></i>
                                                </button>
                                            </div>
                                        <hr>
                                        <div class="product-seller-row p-0">
                                            <div class="product-seller-row-icon marginTop9">
                                                <i class="icon-visit-phone colorYellow"></i>
                                            </div>
                                            <div class="product-seller-row-detail">
                                                <div class="seller-final-score-container p-2">
                                                    <div class="seller-rate-container">
                                                        <span class="colorBlack">02188195360 - 02188196304 -0912456023417</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="product-seller-row p-0">
                                             <div class="product-seller-row-icon marginTop9">
                                                <i class="icon-visit-mail colorYellow"></i>
                                            </div>
                                            <div class="product-seller-row-detail">
                                                <div class="seller-final-score-container p-2">
                                                    <div class="seller-rate-container ">
                                                        <div class="colorBlack fontSize15 px-2 d-flex justify-content-end">info@onixcode.com</div>
                                                    </div>
                                                </div>
                                                <a href="#" class="seller-info-link"></a>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="product-seller-row p-0">
                                            <div class="product-seller-row-icon marginTop9">
                                                <i class="icon-visit-website colorYellow"></i>
                                            </div>
                                            <div class="product-seller-row-detail">
                                                <div class="seller-final-score-container p-2">
                                                    <div class="seller-rate-container ">
                                                        <div class="colorBlack fontSize15 px-2 d-flex justify-content-end">www.onixcode.com</div>
                                                    </div>
                                                </div>
                                                <a href="#" class="seller-info-link"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of product-seller-info -->
                            </div>
                        </div>
                    </div>
                    
                        <div class="col-lg-9 col-md-12 mb-md-0 mb-4">
                            <div class="ui-sticky ui-sticky-top mb-4 StickyMenuMoveOnTop">
                                    <!-- start of product-tabs -->
                                    <div class="product-tabs overFlowHidden">
                                        <ul class="nav nav-pills">
                                            <li id="checkNavLink" class="nav-item">
                                                <a id="nav1" class="nav-link my-nav-link active"  href="#scrollspyHeading1"
                                            data-scroll="scrollspyHeading1">توضیحات</a>
                                            </li>
                                            <li id="propertyNavLink" class="nav-item">
                                                <a id="nav2" class="nav-link my-nav-link"  href="#scrollspyHeading3"
                                            data-scroll="scrollspyHeading3">گالری عکس</a>
                                            </li>
                                            <li id="commentNavLink" class="nav-item">
                                                <a id="nav3" class="nav-link my-nav-link"  href="#scrollspyHeading4"
                                            data-scroll="scrollspyHeading4">دیدگاه ها</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end of product-tabs -->
                                </div>
                                <!-- start of product-content-expert-summary -->
                                <div class="details product-tab-content product-content-expert-summary tab-content pb-2 mb-4"
                                    id="scrollspyHeading1">
                                    <div class="product-tab-title">
                                        {{-- {{ $product['name'] }} --}}
                                        <div class="fontSize18 bold ">بررسی بشقاب میناکاری گرد رنگ آبی طرح ستاره مدل 1000100013</div>
                                    </div>
                                    <div id="checkHeight" class="expandable-text pt-1 ">
                                        <div class="expandable-text_text" id="getInnerHeight">
                                                {{-- {!! $product['introduce'] !!} --}}
                                            <p>
                                                    گوشی موبایل «iPhone 13» پرچم‌دار جدید شرکت اپل است که با چند ویژگی جدید و دوربین دوگانه روانه بازار شده است. اپل برای ویژگی‌ها و طراحی کلی این گوشی از همان فرمول چند سال اخیرش استفاده کرده است. نمایشگر آیفون 13 به پنل Super Retina مجهز ‌شده است تا تصاویر بسیار مطلوبی را به کاربر عرضه کند. این نمایشگر رزولوشن بسیار بالایی دارد؛ به‌طوری‌که در اندازه­‌ی 6.1 اینچی‌اش، حدود 460 پیکسل را در هر اینچ جا داده است. امکان شارژ بی‌‌سیم باتری در این گوشی وجود دارد. روکش سرامیکی صفحه‌نمایش این گوشی می‌تواند انقلابی در محافظت به‌پا کند. این گوشی ضدآب و ضد گردوخاک است. بدنه­ زیبا iPhone 13 در مقابل خط‌‌وخش مقاومت زیادی دارد؛ پس خیالتان از این بابت که آب و گردوغبار به‌‌راحتی روی آیفون 13 تأثیر نمی‌‌گذارد، راحت باشد. علاوه‌براین لکه و چربی هم روی این صفحه‌نمایش باکیفیت تأثیر چندانی ندارند. تشخیص چهره با استفاده از دوربین جلو دیگر ویژگی است که در آیفون جدید اپل به کار گرفته شده است. قابلیت اتصال به شبکه­‌های 4G و 5G، بلوتوث نسخه‌ 5، نسخه­‌ 15 از iOS دیگر ویژگی‌های این گوشی هستند. ازنظر سخت‌‌افزاری هم این گوشی از تراشه­‌ی جدید A15 بهره می‌برد که دارای 15 میلیارد ترانزیستور است که دارای کنترل گرمای مطلوبی بوده که تا بتواند علاوه بر کارهای معمول، از قابلیت‌های جدید واقعیت مجازی که اپل این روزها روی آن تمرکز خاصی دارد، پشتیبانی کند. به گفته خود شرکت اپل این گوشی دارای سرعتی 50 برابر نسخه 12 خود است. پردازنده دارای ماژولار جدیدی است که مصرف باتری را بسیار پایین‌تر آورده است و شما دارای حفظ باتری بالاتری هستید. کیفیت نمایش شما در iPhone 13 دارای 120 هرتز است و کسفیت بالایی را شاهد خواهید بود. اپل در این سری از گوشی‌های iPhone خود پردازنده گرافیکی‌ای را قرار داده که از سری 12 گوشی‌های خود 30 درصد سریع‌تر است و این نویدبخش آن است که شما می‌توانید بازی‌هایی را با گرافیک و MAP سنگین تر و بزرگ‌تر اجرا کنید. یکی از ویژگی‌هایی که در iPhone 13 شاهد هستیم سیستم فیلمبرداری ProRes سینمایی آن است که می تواند انقلابی در فیلمبرداری گوشی‌های موبایل به‌راه انداخته باشد. این قابلیت می‌تواند نسبت به صورت روبرو بین افراد و یا بین فرد و اشیا فوکوس و بِلار داشته باشد.گوشی موبایل «iPhone 13» پرچم‌دار جدید شرکت اپل است که با چند ویژگی جدید و دوربین دوگانه روانه بازار شده است. اپل برای ویژگی‌ها و طراحی کلی این گوشی از همان فرمول چند سال اخیرش استفاده کرده است. نمایشگر آیفون 13 به پنل Super Retina مجهز ‌شده است تا تصاویر بسیار مطلوبی را به کاربر عرضه کند. این نمایشگر رزولوشن بسیار بالایی دارد؛ به‌طوری‌که در اندازه­‌ی 6.1 اینچی‌اش، حدود 460 پیکسل را در هر اینچ جا داده است. امکان شارژ بی‌‌سیم باتری در این گوشی وجود دارد. روکش سرامیکی صفحه‌نمایش این گوشی می‌تواند انقلابی در محافظت به‌پا کند. این گوشی ضدآب و ضد گردوخاک است. بدنه­ زیبا iPhone 13 در مقابل خط‌‌وخش مقاومت زیادی دارد؛ پس خیالتان از این بابت که آب و گردوغبار به‌‌راحتی روی آیفون 13 تأثیر نمی‌‌گذارد، راحت باشد. علاوه‌براین لکه و چربی هم روی این صفحه‌نمایش باکیفیت تأثیر چندانی ندارند. تشخیص چهره با استفاده از دوربین جلو دیگر ویژگی است که در آیفون جدید اپل به کار گرفته شده است. قابلیت اتصال به شبکه­‌های 4G و 5G، بلوتوث نسخه‌ 5، نسخه­‌ 15 از iOS دیگر ویژگی‌های این گوشی هستند. ازنظر سخت‌‌افزاری هم این گوشی از تراشه­‌ی جدید A15 بهره می‌برد که دارای 15 میلیارد ترانزیستور است که دارای کنترل گرمای مطلوبی بوده که تا بتواند علاوه بر کارهای معمول، از قابلیت‌های جدید واقعیت مجازی که اپل این روزها روی آن تمرکز خاصی دارد، پشتیبانی کند. به گفته خود شرکت اپل این گوشی دارای سرعتی 50 برابر نسخه 12 خود است. پردازنده دارای ماژولار جدیدی است که مصرف باتری را بسیار پایین‌تر آورده است و شما دارای حفظ باتری بالاتری هستید. کیفیت نمایش شما در iPhone 13 دارای 120 هرتز است و کسفیت بالایی را شاهد خواهید بود. اپل در این سری از گوشی‌های iPhone خود پردازنده گرافیکی‌ای را قرار داده که از سری 12 گوشی‌های خود 30 درصد سریع‌تر است و این نویدبخش آن است که شما می‌توانید بازی‌هایی را با گرافیک و MAP سنگین تر و بزرگ‌تر اجرا کنید. یکی از ویژگی‌هایی که در iPhone 13 شاهد هستیم سیستم فیلمبرداری ProRes سینمایی آن است که می تواند انقلابی در فیلمبرداری گوشی‌های موبایل به‌راه انداخته باشد. این قابلیت می‌تواند نسبت به صورت روبرو بین افراد و یا بین فرد و اشیا فوکوس و بِلار داشته باشد.
                                            </p>
                                            
                                        </div>
                                        <div class="expandable-text-expand-btn justify-content-start text-sm d-flex justify-content-end">
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
                                <div class="product-tab-content product-params tab-content pb-2 mb-4"
                                    id="scrollspyHeading3">
                                    <div class="product-tab-title">
                                        {{-- {{ $product['name'] }} --}}
                                         <div class="fontSize18 bold">گالری عکس </div>
                                    </div>
                                    <div class="expandable-text pt-1" style="height: auto">
                                        <div class="expandable-text_text fa-num">
                                            <!-- start of params-list -->
                                            <div class="params-list">
                                                <ul id="params-list-div"></ul>
                                            </div>
                                            <!-- end of params-list -->
                                        </div>
                                    </div>
                                </div>
                                <!-- end of product-params -->
                                <!-- start of product-params -->
                                <div class="product-tab-content product-params tab-content pb-2 mb-4"
                                    id="scrollspyHeading4">
                                    <div class="product-tab-title">
                                        {{-- {{ $product['name'] }} --}}
                                         <div class="fontSize18 bold">دیدگاه ها </div>
                                    </div>
                                    <div class="expandable-text pt-1" style="height: auto">
                                        <div class="expandable-text_text fa-num">
                                            <!-- start of params-list -->
                                            <div class="params-list">
                                                <ul id="params-list-div"></ul>
                                            </div>
                                            <!-- end of params-list -->
                                        </div>
                                    </div>
                                </div>
                                <!-- end of product-params -->
                                <div class="mb-5">
                                    <div class="d-flex spaceBetween align-items-center">
                                        <div class="fontSize18 bold mb-3">برگزار کننده</div>
                                        <div>
                                            <div class="d-flex justify-content-end mt-1 mb-2">
                                                <button class="buttonBasketEvent">
                                                    <span class="colorWhiteGray fontSize13 paddingRight5 px-2">مشاهده</span>
                                                    <i class="icon-visit-eye colorWhiteGray verticalAlign-2 px-2"></i>
                                                </button>
                                                <button class="buttonBasketEvent">
                                                    <span class="colorWhiteGray fontSize13 paddingRight5 px-2">دنبال کردن</span>
                                                    <i class="icon-visit-person colorWhiteGray verticalAlign-2 px-2"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="userCircleSize backgroundYellow mx-3"></div>
                                            <div class="d-flex flexDirectionColumn">
                                                <div class="d-flex mt-2">
                                                    <div class="fontSize15 bold colorBlack">Onix code</div>
                                                    <div class=" align-items-center px-2 px-2 fontSize15 colorYellow"><i class=" fontSize15 icon-visit-star me-1 fontSize14 verticalAlign-2"></i> 4.9</div>
                                                    <div class="mr-70 align-items-center px-2 fontSize15 colorYellow"><i class=" fontSize15 icon-visit-person colorYellow verticalAlign-2"></i> 15000</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="textStyle">
                                             اتصال به شبکه­‌های 4G و 5G، بلوتوث نسخه‌ 5، نسخه­‌ 15 از iOS دیگر ویژگی‌های این گوشی هستند. ازنظر سخت‌‌افزاری هم این گوشی از تراشه­‌ی جدید A15 بهره می‌برد که دارای 15 میلیارد ترانزیستور است که دارای کنترل گرمای مطلوبی بوده که تا بتواند علاوه بر کارهای معمول، از قابلیت‌های جدید واقعیت مجازی که اپل این روزها روی آن تمرکز خاصی دارد، پشتیبانی کند. به گفته خود شرکت اپل این گوشی دارای سرعتی 50 برابر نسخه 12 خود است. پردازنده دارای ماژولار جدیدی است که مصرف باتری را بسیار پایین‌تر آورده است و شما دارای حفظ باتری بالاتری هستید. کیفیت نمایش شما در iPhone 13 دارای 120 هرتز است و کسفیت بالایی را شاهد خواهید بود. اپل در این سری از گوشی‌های iPhone خود پردازنده گرافیکی‌ای را قرار داده که از سری 12 گوشی‌های خود 30 درصد سریع‌تر است و این نویدبخش آن است که شما می‌توانید بازی‌هایی را با گرافیک و MAP سنگین تر و بزرگ‌تر اجرا کنید. یکی از ویژگی‌هایی که در iPhone 13 شاهد هستیم سیستم فیلمبرداری ProRes سینمایی آن است که می تواند انقلابی در فیلمبرداری گوشی‌های موبایل به‌راه انداخته باشد. این قابلیت می‌تواند نسبت به صورت روبرو بین افراد و یا بین فرد و اشیا فوکوس و بِلار داشته باشد.
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="icon-visit-location colorYellow fontSize35 marginTop10"></i>
                                            <span class="fontSize13 fontNormal colorBlack mx-3">تهران، میدان ونک، بزرگراه حقانی، مرکز رشد دانشگاه علامه طباطبائی، پلاک 40، طبقه سوم شرقی،</span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="icon-visit-phone colorYellow fontSize35 marginTop10"></i>
                                            <span class="fontSize13 fontNormal colorBlack mx-3">02188195360 - 02188196304 -09124560234</span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="icon-visit-mail colorYellow fontSize35 marginTop10"></i>
                                            <span class="fontSize13 fontNormal colorBlack mx-3">info@onixcode.com</span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="icon-visit-website colorYellow fontSize35 marginTop10"></i>
                                            <span class="fontSize13 fontNormal colorBlack mx-3">www.onixcode.com</span>
                                        </div>
                                </div>
                            <!-- end of product-gallery -->
                        </div>
                    
                </div>
                <!-- end of product-detail-container --> 
        </main>
@stop

@section('footer')
    @parent
@stop

@section('extraJS')
    @parent
    <script>
        $(document).ready(function(){
            //getInnerHeight
            heightTag = $('#getInnerHeight').height();
            if (heightTag < 400) {
                $('#checkHeight').addClass('hidden').css('height','auto');
            }else{
                $('#checkHeight').css('height','400px');
            }
            $('#nav1').on('click',function(){
                $(".my-nav-link").removeClass('active');    
                $('#nav1').addClass('active');
            });

            $('#nav2').on('click',function(){
                $(".my-nav-link").removeClass('active');
                $('#nav2').addClass('active');
            });

            $('#nav3').on('click',function(){
                $(".my-nav-link").removeClass('active');
                $('#nav3').addClass('active');
            });

            var width= $(document).width();

            if (width < 768){
                $('#commentNavLink').click(function(){
                     $('html, body').animate({
                        'scrollTop': $('#scrollspyHeading4').offset().top - 60
                    });
                });
                
                $('#propertyNavLink').click(function(){
                     $('html, body').animate({
                        'scrollTop': $('#scrollspyHeading3').offset().top - 60
                    });
                });
                
                $('#checkNavLink').click(function(){
                     $('html, body').animate({
                        'scrollTop': $('#scrollspyHeading1').offset().top - 60
                    });
                });
                
            }else{
                $('#commentNavLink').click(function(){
                     $('html, body').animate({
                        'scrollTop': $('#scrollspyHeading4').offset().top - 210
                    });
                });

                $('#propertyNavLink').click(function(){
                     $('html, body').animate({
                        'scrollTop': $('#scrollspyHeading3').offset().top - 210
                    });
                });

                $('#checkNavLink').click(function(){
                     $('html, body').animate({
                        'scrollTop': $('#scrollspyHeading1').offset().top - 210
                    });
                });
            } 
        })

    </script>
@stop
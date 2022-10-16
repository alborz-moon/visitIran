<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0089B7">
    <meta name="msapplication-navbutton-color" content="#0089B7">
    <meta name="apple-mobile-web-app-status-bar-style" content="#0089B7">
    {{-- logo --}}
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('theme-assets/images/logo/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('theme-assets/images/logo/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('theme-assets/images/logo/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('theme-assets/images/logo/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('theme-assets/images/logo/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('theme-assets/images/logo/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('theme-assets/images/logo/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('theme-assets/images/logo/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('theme-assets/images/logo/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('theme-assets/images/logo/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('theme-assets/images/logo/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('theme-assets/images/logo/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('theme-assets/images/logo/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('manifest.json')}}">
    <meta name="msapplication-TileColor" content="#00B2BC">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#00B2BC">
    {{-- logo --}}
    <title>ویزیت ایران | خانه</title>
    <link rel="stylesheet" href="{{ asset('theme-assets/css/dependencies.css') }}">
    <link rel="stylesheet" href="{{ asset('theme-assets/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('theme-assets/css/visitiran.css') }}">
    <link rel="stylesheet" href="{{ asset('theme-assets/css/custom.css') }}">
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="{{ asset('theme-assets/js/dependencies/jquery-3.6.0.min.js') }}"></script>

    @section('seo')
    @show

    @section('header')
    @show
</head>

<body>


    <div class="page-wrapper">
        <!-- start of page-header -->
        <header class="page-header d-md-block d-none customFixedMenu">
            @include('layouts.top-banner')
                        <!-- start of page-header-middle -->
            <div class="page-header--middle customBackgroundWhite">
                <div class="container heightHeader customBackgroundWhite">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center flex-grow-1 pe-3 zIndex3 position-relative">
                            <div class="logo-container logo-box me-3 positionAbsolute logoImgFromTop">
                                    <img src="{{ asset('theme-assets/images/menuImage.png') }}" width="120" alt="">
                            </div>
                            <div class="marginFromRightHeader">
                                <div class="notification-item--text colorYellow bold"> ویزیت ایران </div>
                                <div class="notification-item--text fontSize12 bold"> سامانه فروش صنایع دستی و هنرهای تزئینی </div>
                            </div>
                        </div>
                        <div class="user-options heightHeader customFilterGray">
                            <div class="user-option user-option--search customBorderLeft1">
                                <a href="profile.html" class="user-option-btn user-option-btn--search gap10">
                                    <i class="icon-visit-search customHeader textColor"></i>
                                </a>
                            </div>
                            <div class="user-option user-option--cart customBorderLeft1">
                                <a href="{{route('cart')}}" class="user-option-btn user-option-btn--cart">
                                    <i class="icon-visit-basket customHeader colorYellow"></i>
                                </a>
                                <div class="mini-cart">
                                    <div class="mini-cart-header">
                                        <span class="mini-cart-products-count fa-num">4 کالا</span>
                                        <a href="{{route('cart')}}" class="btn btn-link px-0">مشاهده سبد خرید <i
                                                class="ri-arrow-left-s-fill"></i></a>
                                    </div>
                                    <div class="mini-cart-products do-simplebar">
                                        <div class="mini-cart-product">
                                            <div class="mini-cart-product-thumbnail">
                                                <a href="#"><img src="#" alt=""></a>
                                            </div>
                                            <div class="mini-cart-product-detail">
                                                <div class="mini-cart-product-brand"><a href="#">apple</a></div>
                                                <div class="mini-cart-product-title">
                                                    <a href="product-v1.html">گوشی موبایل اپل مدل iPhone 13 A2634 دو
                                                        سیم‌ کارت ظرفیت 128
                                                        گیگابایت و رم 4 گیگابایت</a>
                                                </div>
                                                <div class="mini-cart-purchase-info">
                                                    <div class="mini-cart-product-meta">
                                                        <span class="fa-num">1 عدد</span>
                                                        <span class="color" style="background-color: #d4d4d4;"></span>
                                                    </div>
                                                    <div class="mini-cart-product-price fa-num">26,249,000 <span
                                                            class="currency">تومان</span></div>
                                                </div>
                                                <button class="mini-cart-product-remove"></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mini-cart-footer">
                                        <div class="mini-cart-total">
                                            <span class="mini-cart-total-label">مبلغ قابل پرداخت:</span>
                                            <span class="mini-cart-total-value fa-num">83,678,000 <span
                                                    class="currency">تومان</span></span>
                                        </div>
                                        <a href="#" class="btn btn-primary">ورود و ثبت سفارش</a>
                                    </div>
                                </div>
                            </div>
                            <div class="user-option user-option--account  paddingRight15">
                                <a href="profile.html" class="user-option-btn user-option-btn--account gap10 btnHover textColor">
                                    <i class="icon-visit-person customHeader"></i>ورود / ثبت نام
                                </a>
                                <div class="user-option--dropdown user-option--dropdown-right">
                                    <div class="profile-user-info ui-box">
                                        <div class="profile-detail">
                                            <div class="d-flex align-items-center">
                                                <div class="profile-avatar me-3">
                                                    <img src="#" alt="avatar">
                                                </div>
                                                <div class="profile-info">
                                                    <a href="#" class="text-decoration-none text-dark fw-bold mb-2">
                                                        جلال
                                                        بهرامی
                                                        راد
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="nav nav-items-with-icon flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('cart-empty')}}"><i
                                                        class="nav-link-icon ri-file-list-3-line"></i>
                                                    سفارش
                                                    های من
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#"><i
                                                        class="nav-link-icon ri-logout-box-r-line"></i>
                                                    خروج
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of page-header-middle -->
            <!-- start of page-header-top -->
            <div class="page-header--top backGray">
                <div class="container">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="page-header--top-right">
                                        <!-- start of page-header-bottom -->
            <div class="page-header--bottom marginFromRightHeader">
                <div class="container">
                    <div class="d-flex align-items-center">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link colorWhite" href="{{ route('home') }}"><img class="iconSvg" src="{{ asset('theme-assets/images/svg/home.svg') }}" alt="">صفحه اصلی</a>
                            </li>
                            <li class="nav-item align-self-center">
                            <div class="vertical-menu minWidthUnset">
                            <a href="#" class="vertical-menu-btn p-0 m-0 colorWhite fontNormal"><img class="iconSvg" src="{{ asset('theme-assets/images/svg/headline.svg') }}" alt="">دسته بندی کالاها</a>
                            <div class="vertical-menu-items marginFromRightHeaderNegative custom-vertical-menu-items zIndex2 mt-10">
                                <ul>
                                    <li class="mega-menu-category show">
                                        <a href="#">صفحه های طراحی شده</a>
                                        <ul class="mega-menu">
                                            <li class="parent"><a class="colorBlue customBold" href="#">صفحه زده شده </a></li>
                                            <li><a href="{{route('404')}}"">404</a></li>
                                            <li><a href="{{route('cart-empty')}}">سبد خرید خالی</a></li>
                                            <li><a href="{{route('checkout-successful')}}">خرید موفق</a></li>
                                            <li><a href="{{route('checkout-unsuccessful')}}">سبد ناموفق</a></li>
                                            <li><a href="{{route('come')}}">حوش آمد گویی</a></li>
                                            <li><a href="{{route('contact-us')}}">تماس با ما</a></li>
                                            <li><a href="{{route('home')}}">خانه</a></li>
                                            <li><a href="{{route('login-register')}}">ورود / ثبت نام</a></li>
                                            <li><a href="{{route('password-reset')}}">پسورد</a></li>
                                            
                                            <li><a href="{{route('profile')}}">پروفایل</a></li>
                                            <li><a href="{{route('shop')}}">لیست محصول</a></li>
                                            <li><a href="{{route('verification')}}">کد ارسالی ورفیکشن</a></li>
                                            <li><a href="{{route('welcome')}}">صحفه اصلی</a></li>
                                    </ul>
                                    </li>
                                    <li class="mega-menu-category">
                                        <a href="#">دسته بندی محصولات</a>
                                        <ul class="mega-menu">
                                            <li class="parent"><a class="colorBlue customBold" href="#">فرش</a></li>
                                            <li><a href="#">منسوجات</a></li>
                                            <li><a href="#">منزل و دکوراسیون</a></li>
                                            <li><a href="#">ابزار</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">فرش</a></li>
                                    <li><a href="#">ابزار</a></li>
                                    <li><a href="#">منزل و دکوراسیون</a></li>
                                    <li><a href="#">منسوجات</a></li>
                                    <li><a href="#">مینا کاری</a></li>
                                    <li><a href="#">منبت کاری</a></li>
                                </ul>
                            </div>
                        </div>                            
                    </li>
                            <li class="nav-item">
                                <a class="nav-link colorWhite fontNormal" href="index-1.html"><img class="iconSvg customIconTag" src="{{ asset('theme-assets/images/svg/label.svg') }}" alt="">پیشنهاد های ویژه</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end of page-header-bottom -->
                        </div>
                        <div class="page-header--top-left">
                            <ul class="nav nav-light justify-content-end">
                                <li class="nav-item d-md-none d-lg-block">
                                    <a class="nav-link" href="#">تازه‌ها</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">درباره ما</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of page-header-top -->

        </header>
        <!-- end of page-header -->
        <header class="page-header-responsive d-md-none p-0">
            @include('layouts.top-banner')
            <div class="page-header-responsive-row">
                <div class="d-flex align-items-center">
                    <div class="navigation-container">
                        <div class="navigation">
                            <div class="navigation-header">
                                <div class="logo-container logo-box p-0">
                                    <a href="#" class="logo">
                                        <img src="{{ asset('theme-assets/images/menuImage.png') }}"  width="110" alt="">
                                        <span class="logo-text colorBlue">دسته بندی کالاها<img class="iconSvg" src="{{ asset('theme-assets/images/svg/headline.svg') }}" alt=""></span>
                                    </a>
                                </div>
                            </div>
                            <div class="navigation-body">
                                <ul class="menu">
                                    <li>
                                        <a href="#" class="toggle-submenu">
                                            <span>فرش</span>
                                        </a>
                                        <ul class="submenu">
                                            <li class="close-submenu">
                                                <i class="ri-arrow-right-s-line"></i>
                                                منسوجات 
                                            </li>
                                            <li>
                                                <a href="#" class="toggle-submenu">
                                                    منسوجات
                                                </a>
                                                <ul class="submenu">
                                                    <li class="close-submenu">
                                                        <i class="ri-arrow-right-s-line"></i>
                                                        منسوجات
                                                    </li>
                                                    <li>
                                                        <a href="#">لوازم</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">فرش دست بافت</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">رو فرشی</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">زیر فرش</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">خانه طراحان ایرانی</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="navigation-overlay"></div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center flex-grow-1 pe-3 position-relative">
                            <div class="logo-container logo-box customLogoBoxInMobile me-3 positionAbsolute logoImgFromTop">
                                    <img src="{{ asset('theme-assets/images/menuImage.png') }}"  width="70" alt="">
                            </div>
                            <div class="marginFromRightHeaderMobile">
                                <div class="notification-item--text colorYellow bold"> ویزیت ایران </div>
                                <div class="notification-item--text fontSize10 bold"> سامانه فروش صنایع دستی و هنرهای تزئینی </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="toggle-navigation"></button>
            </div>
            <div class="page-header--top backGray">
                <div class="container">
                    <div class="d-flex align-items-center justify-content-between" style="height: 50px">
                        <div class="page-header--top-right d-flex gap10">
                            <a href="profile.html" class="user-option-btn user-option-btn--search gap10">
                                <img class="customIconHeadLine" src="{{ asset('theme-assets/images/svg/search.svg') }}" alt="">
                            </a>
                            <a href="{{route('cart')}}" class="user-option-btn user-option-btn--cart">
                                <img class="customIconHeadLine" src=""{{ asset('theme-assets/images/svg/basket.svg') }} alt="">
                            </a>
                        </div>
                        <div class="page-header--top-left">
                            <a href="profile.html" class="user-option-btn user-option-btn--account gap10 d-flex ">
                                    <span class=" d-flex colorWhite fontSize10 align-self-center btnHover pl-2"> <i class="icon-visit-person customHeader"></i>ورود / ثبت نام </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- start of page-content -->
       <div id="mainPageContent" class="mt-md-110">
            @yield('content')
        </div>
        <!-- end of page-content -->
        @section('footer')
            @include('layouts.footer')
        @show
        
    </div>

    <script src="{{ asset('theme-assets/js/dependencies/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('theme-assets/js/dependencies/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('theme-assets/js/dependencies/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('theme-assets/js/dependencies/jquery.simple.timer.min.js') }}"></script>
    <script src="{{ asset('theme-assets/js/dependencies/iziToast.min.js') }}"></script>
    <script src="{{ asset('theme-assets/js/dependencies/fancybox.umd.js') }}"></script>
    <script src="{{ asset('theme-assets/js/dependencies/nouislider.min.js') }}"></script>
    <script src="{{ asset('theme-assets/js/dependencies/wNumb.js') }}"></script>
    <script src="{{ asset('theme-assets/js/dependencies/remodal.min.js') }}"></script>
    <script src="{{ asset('theme-assets/js/dependencies/select2.min.js') }}"></script>
    <script src="{{ asset('theme-assets/js/dependencies/simplebar.min.js') }}"></script>
    <script src="{{ asset('theme-assets/js/dependencies/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('theme-assets/js/dependencies/zoomsl.min.js') }}"></script>    
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>        
    </script>
    @section('extraJS')
    @show
</body>
</html>
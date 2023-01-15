<div class="col-xl-3 col-lg-4 col-md-5 mb-md-0 mb-3 {{ isset($mobileMenu) && $mobileMenu == 'true' ? '' : 'd-none d-md-block'}} ">
    <div class="ui-sticky ui-sticky-top">
        <div class="profile-user-info py-3 ui-box bg-white">
            <div class="profile-detail">
                <div class="d-flex align-items-center">
                    
                    @if(Auth::check())
                        <div class="profile-info">
                            <a class="text-decoration-none text-dark fw-bold mb-2">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</a>
                            <div class="text-muted fw-bold bold">{{ Auth::user()->phone}}</div>
                        </div>
                    @endif
                </div>
            </div>
            @if (request()->getHost() == \App\Http\Controllers\Controller::$EVENT_SITE)
                @include('event.launcher.launcher-menu',['desktopMenu' => true])
            @else 
            <ul class="nav nav-items-with-icon flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.my-orders') }}"><i class="nav-link-icon ri-file-list-3-line"></i>
                        سفارش
                        های من</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.favorites') }}"><i class="nav-link-icon ri-heart-3-line"></i> لیست
                        ها</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.comments') }}"><i class="nav-link-icon ri-chat-1-line"></i>
                        نظرات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.addresses') }}"><i class="nav-link-icon ri-map-pin-line"></i> نشانی
                        ها</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.tickets') }}"><i class="nav-link-icon ri-notification-line"></i>
                        پشتیبانی</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.personal-info') }}"><i class="nav-link-icon ri-user-line"></i> اطلاعات
                        حساب</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="nav-link-icon ri-logout-box-r-line"></i>
                        خروج</a>
                </li>
            </ul>
            @endif
        </div>
    </div>
</div>
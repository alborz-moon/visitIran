<div class="col-xl-3 col-lg-4 col-md-5 mb-md-0 mb-3 zIndex0">
    <div class="ui-sticky ui-sticky-top StickyMenuMoveOnTop">
        <div class="profile-user-info py-3 ui-box bg-white">
            <div class="profile-detail">
                <div class="d-flex align-items-center">
                    <div class="profile-avatar me-3"><img
                            src="./theme-assets/images/avatar/default.png" alt="avatar">
                    </div>
                    <div class="profile-info">
                        <a href="#" class="text-decoration-none text-dark fw-bold mb-2">جلال
                            بهرامی
                            راد</a>
                        <div class="text-muted fs-7 fw-bold">۰۹xxxxxxxxx</div>
                    </div>
                </div>
                <div class="user-options">
                    <ul>
                        <li class="d-block">
                            <div class="label fontSize14 colorBlack whiteSpaceNoWrap">تعداد رویدادها</div>
                            <div class="colorBlue text-align-end mr-90">
                                3 رویداد
                            </div>
                        </li>
                         <li class="d-block">
                            <div class="label fontSize14 colorBlack whiteSpaceNoWrap">مبلغ تسویه نشده</div>
                            <div class="colorBlue text-align-end mr-90">
                                50000000 <span class="colorYellow">ت</span>
                            </div>
                        </li>
                        {{-- <div class="d-flex justifyContentEnd my-3">
                            <button id="launcherProducer" class="btn btn-primary whiteSpaceNoWrap">ارتقا به برگزار کننده</button>
                            <button id="simpleProducer" class="btn backgroundYellow colorWhite  whiteSpaceNoWrap hidden">بازگشت به پروفایل عادی</button>                            
                        </div> --}}
                    </ul>
                </div>
            </div>
            <ul class="nav nav-items-with-icon flex-column" style="border-bottom: 1px solid #dedede;padding-bottom: 15px;">
                <li id="goLauncher" class="nav-item hidden">
                    <a role="button" class="nav-link whiteSpaceNoWrap textColor"><i class="nav-link-icon ri-user-line"></i>
                    ارتقا به برگزار کننده
                    </a>
                </li>
                <li id="simpleProducer" class="nav-item hidden">
                    <a role="button" class="nav-link whiteSpaceNoWrap textColor"><i class="nav-link-icon ri-user-line"></i>
                    بازگشت به پروفایل عادی
                    </a>
                </li>
                <li id="launcherProducer" class="nav-item hidden">
                    <a role="button" class="nav-link whiteSpaceNoWrap textColor"><i class="nav-link-icon ri-user-line"></i>
                        رفتن به پروفایل برگذار کننده
                    </a>
                </li>
            </ul>
            
            <ul id="simpleProfileHidden" class="nav nav-items-with-icon flex-column hidden">
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="nav-link-icon ri-file-list-3-line"></i>
                        بلیط های من    
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="nav-link-icon ri-heart-3-line"></i> 
                        علاقه مندی ها
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="nav-link-icon ri-chat-1-line"></i>
                        نظرات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="nav-link-icon ri-notification-line"></i>
                        پشتیبانی</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="nav-link-icon ri-user-line"></i> اطلاعات
                        حساب</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="nav-link-icon ri-logout-box-r-line"></i>
                        خروج</a>
                </li>
            </ul>
            <ul id="launcherProfileHidden" class="nav nav-items-with-icon flex-column hidden">
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="nav-link-icon ri-file-list-3-line"></i>
                        ایجاد رویداد
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="nav-link-icon ri-heart-3-line"></i> 
                        رویداد ها ی من
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="nav-link-icon ri-chat-1-line"></i>
                    اطلاعات بانی
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="nav-link-icon ri-notification-line"></i>
                        گزارشات مالی
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="nav-link-icon ri-user-line"></i> اطلاعات
                    اطلاعات برگذار کننده
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="nav-link-icon ri-logout-box-r-line"></i>
                        خروج</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#goLauncher').removeClass('hidden').on('click',function(){
            window.location.href = "{{route('launcher') }}";
        });
        $('#simpleProfileHidden').removeClass('hidden');
        $('#launcherProducer').on('click',function(){
            $('#simpleProfileHidden').addClass('hidden');
            $('#launcherProfileHidden').removeClass('hidden');
            $('#simpleProducer').removeClass('hidden');
            $('#launcherProducer').addClass('hidden');
        });
        $('#simpleProducer').on('click',function(){
            $('#launcherProducer').removeClass('hidden');
            $('#simpleProducer').addClass('hidden');
            $('#simpleProfileHidden').removeClass('hidden');
            $('#launcherProfileHidden').addClass('hidden');
        });
     });
</script>
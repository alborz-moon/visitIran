<button id="closeUser" type="button" class="btn-close customCloseIconBanner hidden p-0 position-absolute l-0 zIndex5"></button>
<div id="parentUserMobile" class="pt-4">
    
    <div id="container-user" class="hidden">
       
        @if (request()->getHost() == \App\Http\Controllers\Controller::$EVENT_SITE)
            @include('event.launcher.launcher-menu')
        @else 
            @include('shop.profile.layouts.profile_menu',['mobileMenu' => true])
        @endif
    </div>
    
</div>
<script>
    $('#userToggleMobile').on('click',function(){
        $('#closeUser').removeClass('hidden');
        $('#hiddenCat').removeClass('hidden');
        $('#parentUserMobile').addClass('user-wrapper-mobile').css('right','0');
        $('#userToggleMobile').removeClass('hidden');
        $('#container-user').removeClass('hidden');
        $('body').css('overflow','hidden');
    });
    $('#closeUser').on('click',function(){
        $('#closeUser').addClass('hidden');
        $('#hiddenCat').addClass('hidden');
        $('#container-user').addClass('hidden');
        $('#parentUserMobile').addClass('user-wrapper-mobile').css('right','-100%');
        $('body').css('overflow','auto');
    });
</script>
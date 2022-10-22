<ul id='menu'>
    {{-- <li class="mega-menu-category show">
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
    <li><a href="#">منبت کاری</a></li> --}}
</ul>


<script>
     $(document).ready(function() {
        $.ajax({
            type: 'get',
            url: '{{ route('api.category') }}',
            headers: {
                'accept': 'application/json'
            },
            success: function(res) {
                var html= "";
                if(res.status === "ok") {
                    for(var i = 0; i < res.data.menu.length; i++) {
                        if (i==0) {
                            html += '<li class="mega-menu-category show">';
                        }
                        else{
                            html += '<li class="mega-menu-category">';
                        }
                        html += '<a href="#">' + res.data.menu[i].name + '</a>';
                        html += '<ul class="mega-menu">';
                        for(var j = 0; j < res.data.menu[i].subs.length; j++) {
                            if(j=0){
                                html += '<li class="parent"><a class="colorBlue customBold" href="#">' + res.data.menu[i].subs[j].name + '</a></li>';
                            }else{
                                html += '<li><a href="#">' + res.data.menu[i].subs[j].name + '</a></li>';
                            }
                        }
                        html += '</ul>';
                        html += '</li>';
                    }
                    $("#menu").empty().append(html);
                }
            }
        });
    });
</script>
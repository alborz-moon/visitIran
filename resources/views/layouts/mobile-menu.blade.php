{{-- <ul class="menu">
    <li>
        <a href="#" class="toggle-submenu">
            <span>زنانه</span>
        </a>
        <ul class="submenu">
            <li class="close-submenu">
                <i class="ri-arrow-right-s-line"></i>
                زنانه
            </li>
            <li>
                <a href="#" class="toggle-submenu">
                    لباس
                </a>
                <ul class="submenu">
                    <li class="close-submenu">
                        <i class="ri-arrow-right-s-line"></i>
                        لباس
                    </li>
                    <li>
                        <a href="#">تی شرت و پولوشرت</a>
                    </li>
                    <li>
                        <a href="#">لباس راحتی و خواب</a>
                    </li>
                    <li>
                        <a href="#">مانتو، پانچو و رویه</a>
                    </li>
                    <li>
                        <a href="#">شومیز و پیراهن</a>
                    </li>
                    <li>
                        <a href="#">بلوز</a>
                    </li>
                    <li>
                        <a href="#">پیراهن و لباس مجلسی</a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <a href="#" class="toggle-submenu">
            <span>مردانه</span>
        </a>
    </li>
    <li>
        <a href="#" class="toggle-submenu">
            <span>بچگانه</span>
        </a>
    </li>
    <li>
        <a href="#" class="toggle-submenu">
            <span>زیبایی و سلامت</span>
        </a>
    </li>
    <li>
        <a href="#">فروش ویژه</a>
    </li>
    <li>
        <a href="#">برندها</a>
    </li>
    <li>
        <a href="#">خانه طراحان ایرانی</a>
    </li>
</ul> --}}
<script>
     $(document).ready(function() {
        $.ajax({
            type: 'get',
            url: '{{ route('api.category.menu') }}',
            headers: {
                'accept': 'application/json'
            },
            success: function(res) {
                var htmlMobile= "";
                if(res.status == "ok") {
                    console.log('====================================');
                    console.log(res);
                    console.log('====================================');
                    for(var i = 0; i < res.data.length; i++) {
                        htmlMobile +='<li>';
                        htmlMobile +='<a onclick="selectMenu(' + res.data[i].id + ')" href="#" class="toggle-submenu"><span>' + res.data[i].name + '</span></a>';
                        if (res.data[i].subs.length != 0){
                            
                            htmlMobile +='<ul id="subMenu_oldFather_' + res.data[i].id + '" class="submenu">';
                            htmlMobile +='<li onclick="backMenu(' + res.data[i].id + ')" class="close-submenu"><i class="ri-arrow-right-s-line"></i>' + res.data[i].name + '</li>';
                            for (var j = 0; j < res.data[i].subs.length; j++){   
                                htmlMobile += '<li><a href="#" onclick="selectMenu(' + res.data[i].subs[j].id + ')" class="toggle-submenu">' + res.data[i].subs[j].name + '</a>';
                                if (res.data[i].subs[j].subs.length != 0){
                                    htmlMobile += '<ul id="subMenu_Father_' + res.data[i].subs[j].id + '" class="submenu">';
                                    htmlMobile += '<li onclick="backMenu(' + res.data[i].subs[j].id + ')" class="close-submenu"><i class="ri-arrow-right-s-line"></i>' + res.data[i].subs[j].name + '</li>';
                                    for (var k = 0; k < res.data[i].subs[j].subs.length; k++){   
                                        htmlMobile += '<li><a href="#" onclick="selectMenu(' + res.data[i].subs[j].subs[k].id + ')" class="toggle-submenu">' + res.data[i].subs[j].subs[k].name + '</a>';
                                    }
                                htmlMobile += '</ul>';
                                }   
                                htmlMobile += '</li>';
                            }
                            htmlMobile +='</ul>';
                        }
                        htmlMobile +='</li>';
                    }
                    $("#moblieMenu").append(htmlMobile);
                }
            }
        });
    });  

    function selectMenu(idx){
        $("#subMenu_oldFather_" + idx).addClass('toggle');
        $("#subMenu_Father_" + idx).addClass('toggle');
    }
    function backMenu(idx){
        $("#subMenu_oldFather_" + idx).removeClass('toggle');
        $("#subMenu_Father_" + idx).removeClass('toggle');
    }

</script>
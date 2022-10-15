<div class="w-100 backgroundWhite">
    <div class="container">
    <div id="topCategoriesDiv" class="mb-5 p-0">
       <div class="ui-box-content p-0 pb-1">
           <!-- Slider main container -->
           <div class="swiper product-swiper-slider">
               <!-- Additional required wrapper -->
               <div id="cat" class="swiper-wrapper">
               </div>
               <!-- If we need pagination -->
               <div class="swiper-pagination"></div>
               <!-- If we need navigation buttons -->
               <div class="swiper-button-prev"></div>
               <div class="swiper-button-next"></div>
           </div>
       </div>
    </div>
</div>
</div>

<script>
    $.ajax({
        type: 'get',
        url: '{{ route('api.category') }}',
        headers: {
            'accept': 'application/json'
        },
        success: function(res) {
            var html='';
            if(res.status === "ok") {
                if(res.data.top.length === 0) {
                    $("#topCategoriesDiv").remove();
                    $("#cat").empty();
                    return;
                }                         
                for(var i = 0; i < res.data.top.length; i++) {
                    html += '<div class="swiper-slide d-flex justify-content-center width-200">';
                    html += '<div class="banner-img ">';
                    html += '<a target="_blank" href="#" class="tiles">';
                    html +='<img class="imgResponsive borderRadius20" src="' + res.data.top[i].img + '" alt="' + res.data.top[i].alt + '">';
                    html += '<div class="catDetails"><div class="catTitle"></div><div class="catText mb-3"><div class="heightcategory">' + res.data.top[i].digest + '</div></div>                            <div class="arrowLeftIcon backgroundGray p-0 customCategoryIconBack"><img src="{{ asset('theme-assets/images/svg/ionic-ios-arrow-round-back.svg') }}"></div></div>'
                    html += '<div class="text-category position-absolute labelForCat"><h4 class="colorWhite fontSize14">' + res.data.top[i].name + '</h4></div>';
                    html +='</a></div></div>';
                }
                    $("#cat").empty().append(html);
        }}
    });
</script>
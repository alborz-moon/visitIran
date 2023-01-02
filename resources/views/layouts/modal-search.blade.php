<!-- start of personal-info-fullname-modal -->
    <div class="remodal remodal-xl" data-remodal-id="search-modal"
        data-remodal-options="hashTracking: false">
        <div class="remodal-content">
            <div class="search-container">
              <form action="#" class="search-form">
                <input min="3" id="searchInput" type="text" class="form-control search-field marginLeft48 searchInput" placeholder="جستجو کنید..">
              </form>
              
            </div>
            <button id="searchBtn" data-remodal-action="close" class="btn-search btn-action b-0 customSearch colorblue d-flex">
              <i class="icon-visit-close customSearch"></i>
            </button>
            
            @if(isset($top_categories))
              <div class="d-flex flexWrap gap10 my-3">
                  <div id="defaultCatgories">
                    @foreach ($top_categories as $cat)
                      <a href="{{ route('single-category', ['category' => $cat['id'], 'slug' => $cat['slug']]) }}" class="btn btn-search-modal">
                        {{ $cat['name'] }}
                      </a>
                    @endforeach
                  </div>
                  <div class="d-flex afterCatgories">
                  </div>
              </div>
            @endif
            <hr>
            <div id="searchDetails" class="searchDetails">
            </div>
        </div>
    </div>
    <div id="parentSearchMobile" class="pt-4">
        <button id="closeSearch" onclick='$("#mainPageContent").css("marginTop", "-25px")' type="button" class="btn-close customCloseIconBanner p-0 position-absolute l-0 hidden zIndex1"></button>
        <div id="container-search" class="search-container p-2 hidden">
        <form action="#" class="search-form">
          <input min="3" id="searchInput" type="text" class="form-control search-field marginLeft48 searchInput" placeholder="جستجو کنید..">
        </form>
        @if(isset($top_categories))
          <div id="hiddenCat" class="d-flex flexWrap gap10 my-3 hidden">
            <div id="defaultCatgoriesMobile d-flex flexWrap gap10">
              @foreach ($top_categories as $cat)
                <div class="d-flex flexWrap gap10">
                  <a href="{{ route('single-category', ['category' => $cat['id'], 'slug' => $cat['slug']]) }}" class="btn btn-search-modal whiteSpaceNoWrap">
                      {{ $cat['name'] }}
                  </a>
                </div>  
              @endforeach
            </div>
            <div class="d-flex afterCatgories">

            </div>
          </div>
        @endif
        <hr>
        <div id="searchDetails" class="searchDetails">
        </div>
        </div>
    </div>
<!-- end of personal-info-fullname-modal -->
<script>
    $('.searchInput').on('keyup',function(){
      console.log('====================================');
      console.log(this.value.length);
      console.log('====================================');
        if (this.value.length > 3){
          $.ajax({
             type: 'post',
             url:  '{{ $route }}' ,
             data: {
                key: this.value,
                return_type: 'card' 
             },
             success: function(res) {
                var html= "";
                $('#defaultCatgories').addClass('hidden');
                if(res.status === "ok") {
                  if (res.data.length != 0){
                    for (var i = 0; i < res.data.length; i++){
                      html += '<div class="d-flex my-2 padding15">';
                      html += '<div class="icon-visit-search fontSize15 padding5"></div>';
                      html += '<div class="d-flex flexDirectionColumn">';
                      html += '<a href="' + res.data[i].href + '" class="fontSize14 colorBlack">' + res.data[i].name + '</a>';
                      html += '<div class="fontSize12 colorBlue">' + res.data[i].category + '</div>';
                      html += '</div>';
                      html += '</div>';
                    }
                  }
                  $(".searchDetails").empty().append(html);
                }
             }
         });
         
         $.ajax({
          type: 'post',
          url:  '{{  $routeCat }}' ,
          data: {
             key: this.value,
          },
          success: function(res) {
            var html= "";
            if(res.status === "ok") {
               if(res.data.length != 0){
                 for(var i = 0; i < res.data.length; i++) {
                     html += '<a href="' + res.data[i].href + '" class="btn btn-search-modal whiteSpaceNoWrap">' + res.data[i].name + '</a>';
                 }
               }
            }
            $(".afterCatgories").empty().append(html);
          }
        });
        }


    });

    $('#searchMobile').on('click',function(){
        $('#closeSearch').removeClass('hidden');
        $('#hiddenCat').removeClass('hidden');
        $('#parentSearchMobile').addClass('search-mobile').css('bottom','0');
        $('#searchMobile').removeClass('hidden');
        $('#container-search').removeClass('hidden');
        $('body').css('overflow','hidden');
    });
    $('#closeSearch').on('click',function(){
        $('#closeSearch').addClass('hidden');
        $('#hiddenCat').addClass('hidden');
        $('#container-search').addClass('hidden');
        $('#parentSearchMobile').addClass('search-mobile').css('bottom','-100%');
        $('body').css('overflow','auto');
    });
</script>
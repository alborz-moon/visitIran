<!-- start of personal-info-fullname-modal -->
    <div class="remodal remodal-xl" data-remodal-id="search-modal"
        data-remodal-options="hashTracking: false">
        <div class="remodal-content">
            <div class="search-container">
              <form action="#" class="search-form">
                <input id="searchInput" type="text" class="form-control search-field marginLeft48" placeholder="جستجو کنید..">
              </form>
              
            </div>
            <button id="searchBtn" data-remodal-action="close" class="btn-search btn-action b-0 customSearch colorblue d-flex">
              <i class="icon-visit-close customSearch"></i>
            </button>
<<<<<<< HEAD
            <div class="d-flex flexwrap gap10 my-3">
              @foreach ($top_categories as $cat)
                <a href="{{ route('single-category', ['category' => $cat['id'], 'slug' => $cat['slug']]) }}" class="btn btn-primary backgroundColorBlue ">
                  {{ $cat['name'] }}
                </a>  
              @endforeach
=======
            <div class="d-flex flexWrap gap10 my-3">
              <a href="#" class="btn btn-primary backgroundColorBlue whiteSpaceNoWrap">
                لورم
              </a>
              <a href="#" class="btn btn-primary backgroundColorBlue whiteSpaceNoWrap">
                لورم لورم
              </a>
              <a href="#" class="btn btn-primary backgroundColorBlue whiteSpaceNoWrap">
                لورم لورم لورم
              </a>
              <a href="#" class="btn btn-primary backgroundColorBlue whiteSpaceNoWrap">
                لورم
              </a>
              <a href="#" class="btn btn-primary backgroundColorBlue whiteSpaceNoWrap">
                لورم
              </a>
              <a href="#" class="btn btn-primary backgroundColorBlue whiteSpaceNoWrap">
                لورم لورم
              </a>
              <a href="#" class="btn btn-primary backgroundColorBlue whiteSpaceNoWrap">
                لورم لورم لورم
              </a>
              <a href="#" class="btn btn-primary backgroundColorBlue whiteSpaceNoWrap">
                لورم
              </a>
              <a href="#" class="btn btn-primary backgroundColorBlue whiteSpaceNoWrap">
                لورم
              </a>
              <a href="#" class="btn btn-primary backgroundColorBlue whiteSpaceNoWrap">
                لورم لورم
              </a>
              <a href="#" class="btn btn-primary backgroundColorBlue whiteSpaceNoWrap">
                لورم لورم لورم
              </a>
              <a href="#" class="btn btn-primary backgroundColorBlue whiteSpaceNoWrap">
                لورم
              </a>
>>>>>>> a7fd98c1694034a469e1b366973fc01fcdd3c4da
            </div>
            <hr>
            <div class="d-flex my-2 padding15">
                <div class="icon-visit-search fontSize15 padding5"></div>
                <div class="d-flex flexDirectionColumn">
                    <a href="#" class="fontSize14 colorBlack">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است
                    </a>
                    <div class="fontSize12 colorBlue">در فرش دست بافت</div>
                </div>
            </div>
            <div class="d-flex my-2 padding15">
                <div class="icon-visit-search fontSize15 padding5"></div>
                <div class="d-flex flexDirectionColumn">
                    <a href="#" class="fontSize14 colorBlack">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است
                    </a>
                    <div class="fontSize12 colorBlue">در فرش دست بافت</div>
                </div>
            </div>
            <div class="d-flex my-2 padding15">
                <div class="icon-visit-search fontSize15 padding5"></div>
                <div class="d-flex flexDirectionColumn">
                    <a href="#" class="fontSize14 colorBlack">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است
                    </a>
                    <div class="fontSize12 colorBlue">در فرش دست بافت</div>
                </div>
            </div>
        </div>
    </div>
<!-- end of personal-info-fullname-modal -->
<script>
  $('#searchInput').on('change',function(){
    $('#searchBtn').css('display','flex');
  });
</script>
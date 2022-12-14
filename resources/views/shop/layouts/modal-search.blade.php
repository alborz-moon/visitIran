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
              <div class="d-flex flexwrap gap10 my-3">
                @foreach ($top_categories as $cat)
                  <a href="{{ route('single-category', ['category' => $cat['id'], 'slug' => $cat['slug']]) }}" class="btn btn-search-modal">
                    {{ $cat['name'] }}
                  </a>  
                @endforeach
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
        if (this.value.length > 2){
          $.ajax({
             type: 'post',
             url: '{{ route('product-search') }}',
             data: {
                key: this.value,
                return_type: 'card' 
             },
             success: function(res) {
                var html= "";
                
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
        }
        $('#searchBtn').css('display','flex');
    });
</script>
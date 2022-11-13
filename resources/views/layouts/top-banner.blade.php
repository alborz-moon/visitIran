            <!-- start banner -->
            <div class="alert banner-container alert-dismissible fade show showTopBanner" role="alert" id="topBanner">
                <a href="#" target="_blank" id="" class="banner-placement rounded-0 infobox"
                    style="height: 60px;"></a>
                <button id="close" type="button" class="btn-close customCloseIconBanner p-0" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script>
                $(document).ready(function() {
                    $('#close').on('click', function() {
                        $('#SliderParent').addClass('marginTopMediaQuaryForSlider');
                        $('.TopParentBannerMoveOnTop').addClass('marginTopMediaQuaryForSlider');
                        $('.StickyMenuMoveOnTop').addClass('stickyTop')
                    })
                });
            </script>
            
       <script>
            var width = window.innerWidth;
              $.ajax({
                  type: 'get',
                  url: '{{ route('api.infobox') }}',
                  headers: {
                      'accept': 'application/json'
                  },
                  success: function(res) {
                      if(res.status === "ok") {
                            if(res.data.length === 0) {
                                $(".showTopBanner").remove();
                                $('.TopParentBannerMoveOnTop').css('marginTop','-60px');
                                return;
                            }
                           if (width > 1000) {
                               $(".infobox").css('background-image', "url(" + res.data.img_large + ")").attr('href', res.data.href);
                           }else if(width > 768){
                              $(".infobox").css('background-image', "url(" + res.data.img_mid + ")").attr('href', res.data.href);
                           }else{
                              $(".infobox").css('background-image', "url(" + res.data.img_small + ")").attr('href', res.data.href);
                           }
                      }
                  }
              });

    </script>
             
            <!-- end banner -->
            <!-- start banner -->
            <div class="alert banner-container alert-dismissible fade show" role="alert" id="topBanner">
                <a href="#" target="_blank" id="" class="banner-placement rounded-0 infobox"
                    style="height: 60px;"></a>
                <button id="close" type="button" class="btn-close customCloseIconBanner p-0" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script>
                $(document).ready(function() {
                    $('#close').on('click', function() {
                        $('#SliderParent').addClass('marginTopMediaQuaryForSlider');
                        $('.TopParentBannerMoveOnTop').addClass('marginTopMediaQuaryForSlider');
                    })
                });
            </script>
             
            <!-- end banner -->
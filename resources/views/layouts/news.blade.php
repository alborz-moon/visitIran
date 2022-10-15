                <!-- start of box -->
                <div class="w-100 mb-5 backgroundWhite">
                    <div class="container pt-2 ">
                    <div class="ui-box-content backgroundWhite ">
                        <div class="d-flex spaceBetween alignItemsCenter">
                            <span class="ui-box-title fontSize20"> <img class="p-2" src="{{ asset('./theme-assets/images/svg/headlineTitle.svg') }}" alt="">تازه ها</span>
                            <span class="alignItemsCenter colorBlue"><a class="hoverBold" href="">مشاهده همه</a></span>
                        </div>
                        <!-- Slider main container -->
                        <div class="swiper product-swiper-slider">
                            <!-- Additional required wrapper -->
                            <div id="topNewsSlider" class="swiper-wrapper hidden">

                                <!-- Slides -->
                                <div id="customCardNewsSample" class="swiper-slide customCardNews">
                                    <!-- start of product-card -->
                                    <div class="product-card customBoxNews">
                                        <div class="product-thumbnail">
                                            <a id="newsHref" class="marginRight4" href="#">
                                                <img id="newsImg" class="customImgNews">
                                            </a>
                                        </div>
                                        <div class="product-card-body">
                                            <h2 class="product-title">
                                                <a id="newsHeader" class="textColor fontSize18 bold" href="#"></a>
                                            </h2>
                                            <div class="product-variant">
                                                <span id="newsTag" class="colorWhite customBoxLabel"></span>
                                            </div>
                                            <div class="mt-3 mb-3 heightTextNews">
                                                <div id="newsDigest" class="fontSize12 textColor textAlignJustify"></div>
                                            </div>
                                        </div>
                                        <div class="product-card-footer d-flex justify-content-end">
                                                <div class="cursorPointer arrowLeftIcon positionAbsolute customArrowLeftIcon backGray customIconBottom12">
                                                <img src="{{ asset('theme-assets/images/svg/ionic-ios-arrow-round-back.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of product-card -->
                                </div>

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
                <!-- end of box -->

<script>

    $(document).ready(function() {

        $.ajax({
            type: 'get',
            url: '{{ route('api.blog.list') }}',
            success: function(res) {
                let data = res.data;
                let html = '';
                data.forEach(elem => {
                    $("#newsHref").attr('href', '{{ route('api.blog.show') }}' + '/' + elem.id);
                    $("#newsImg").attr('src', elem.img).attr('alt', elem.alt);
                    $("#newsHeader").text(elem.header);
                    $("#newsDigest").text(elem.digest);
                    $("#newsTag").text(elem.tags);
                    let id = elem.id;
                    var newElem = $("#customCardNewsSample").html();
                    newElem.replace("newsHref", "newsHref_" + id);
                    newElem.replace("newsImg", "newsImg_" + id);
                    newElem.replace("newsHeader", "newsHeader_" + id);
                    newElem.replace("newsTag", "newsTag_" + id);
                    newElem.replace("newsDigest", "newsDigest_" + id);
                    html += newElem;
                });
                
                $("#topNewsSlider").empty().append(html).removeClass('hidden');
            }
        });
    });

</script>
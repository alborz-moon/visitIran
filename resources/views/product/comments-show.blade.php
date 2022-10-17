                    <!-- start of product-comments -->
                    <div class="product-tab-content product-comments tab-content border-bottom pb-2 mb-4"
                        id="scrollspyHeading4">
                        <div class="row">
                        <div class="product-user-meta fa-num mb-4 spaceBetween">
                            <span class="product-users-rating">
                                <span class="product-title fontSize15 marginLeft15">دیدگاه کاربران</span>
                                <span class="rattingToStar"></span>
                                <span class="fw-bold me-1">{{ $product['rate'] }}</span>
                                <span class="text-muted fs-7">(از <span>{{ $product['all_rates_count'] }}</span> رای)</span>
                            </span>
                            <span style="gap15">
                                <a class="marginLeft15 btnHover colorBlack" href=""><i class="icon-visit-sort align-middle fontSize20 marginLeft15"></i>جدید ترین</a>
                                <a class="marginLeft15 btnHover colorBlack" href="">کمترین امتیاز</a>
                                <a class="marginLeft15 btnHover colorBlack" href="">بیشترین امتیاز</a>
                            </span>
                        </div>
                            <div class="col-xl-3 col-lg-4 col-md-5 mb-3">
                                <p class="bold fontSize12">شما هم درباره این کالا دیدگاه ثبت کنید</p>
                                <button class="btn btn-primary w-100 mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal"> ثبت دیدگاه </button>
                                <!-- Modal -->
                                {{-- @include('layouts.ratting') --}}
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7 pt-0">
                                <!-- start of comments -->
                                <div class="comments">
                                    <!-- start of comment -->
                                    <div id="comment" class="comment">

                                    </div>
                                    <!-- end of comment -->
                                </div>
                                <!-- end of comments -->
                            </div>
                        </div>
                    </div>
                    <!-- end of product-comments -->
<script>
    $.ajax({
        type: 'get',
        url: '{{ route('api.product.comment.list', ['product' => $productId]) }}',
        headers: {
            'accept': 'application/json'
        },
        success: function(res) {
            var html= "";
            if(res.status === "ok") {
               for(var i = 0; i < res.data.length; i++) {
                   html += '<div class="comment"><div class="comment-header"><span>۱۵ تیر ۱۴۰۰</span>';
                   html += '<span>امیر محمد اکبرپور</span></div><div class="comment-body">';
                   html += '<p>گوشی مناسبی هست نسبت به قیمتش من خودم با ایفون X مقایسه کردم که دربعضی از برنامه ها عقب میموند بسیار گوشی خوبی هست در کل</p>';
                   html += '<ul><li class="comment-evaluation positive">دوربین قوی</li>';
                   html += '<li class="comment-evaluation positive">مناسب برای کار های حدودا سنگین و بالاتر</li>';
                   html += '<li class="comment-evaluation negative">حسگر اثر انگشت کمی عیف</li>';
                   html += '</ul></div><div class="comment-footer">';
                   html += '<span class="me-2">آیا این دیدگاه برایتان مفید بود؟</span>';
                   html += '<button class="comment-like">۷</button><button class="comment-dislike">۲</button>';
                   html += '</div></div>';
               }
               $("#comment").empty().append(html);
            }
        }
    });

</script>